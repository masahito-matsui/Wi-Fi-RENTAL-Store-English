<?php

/*
* Plugin Code : ExpressLink
*
* Copyright (C) 2016 BraTech Co., Ltd. All Rights Reserved.
* http://www.bratech.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

require_once CLASS_REALDIR . 'helper/SC_Helper_Mail.php';

class plg_ExpressLink_SC_Helper_Mail extends SC_Helper_Mail
{
    /* 受注完了メール送信 */

    function sfSendOrderMail($order_id, $template_id, $subject = '', $header = '', $footer = '', $send = true)
    {

        $arrTplVar = new stdClass();
        $arrInfo = SC_Helper_DB_Ex::sfGetBasisData();
        $arrTplVar->arrInfo = $arrInfo;

        $arrTplVar->arrDeliv = SC_Helper_DB_Ex::sfGetIDValueList('dtb_deliv', 'deliv_id', 'service_name');

        $objQuery = & SC_Query_Ex::getSingletonInstance();

        if ($subject == '' && $header == '' && $footer == '') {
            // メールテンプレート情報の取得
            $where = 'template_id = ?';
            $arrRet = $objQuery->select('subject, header, footer', 'dtb_mailtemplate', $where, array($template_id));
            $arrTplVar->tpl_header = $arrRet[0]['header'];
            $arrTplVar->tpl_footer = $arrRet[0]['footer'];
            $tmp_subject = $arrRet[0]['subject'];
        } else {
            $arrTplVar->tpl_header = $header;
            $arrTplVar->tpl_footer = $footer;
            $tmp_subject = $subject;
        }

        // 受注情報の取得
        $where = 'order_id = ? AND del_flg = 0';
        $arrOrder = $objQuery->getRow('*', 'dtb_order', $where, array($order_id));

        if (empty($arrOrder)) {
            trigger_error("該当する受注が存在しない。(注文番号: $order_id)", E_USER_ERROR);
        }

        $where = 'order_id = ?';
        $objQuery->setOrder('order_detail_id');
        $arrTplVar->arrOrderDetail = $objQuery->select('*', 'dtb_order_detail', $where, array($order_id));

        $objProduct = new SC_Product_Ex();
        $objQuery->setOrder('shipping_id');
        $arrRet = $objQuery->select('*', 'dtb_shipping', 'order_id = ?', array($order_id));
        foreach ($arrRet as $key => $value) {
            $objQuery->setOrder('shipping_id');
            $arrItems = $objQuery->select('*', 'dtb_shipment_item', 'order_id = ? AND shipping_id = ?', array($order_id, $arrRet[$key]['shipping_id']));
            foreach ($arrItems as $arrDetail) {
                foreach ($arrDetail as $detailKey => $detailVal) {
                    $arrRet[$key]['shipment_item'][$arrDetail['product_class_id']][$detailKey] = $detailVal;
                }

                $arrRet[$key]['shipment_item'][$arrDetail['product_class_id']]['productsClass'] = & $objProduct->getDetailAndProductsClass($arrDetail['product_class_id']);
            }
            $objQuery->setOrder('dtb_deliv.deliv_id');
            $arrRet[$key]['confirm_url'] = $objQuery->get('dtb_deliv.confirm_url', 'dtb_deliv INNER JOIN dtb_order ON dtb_deliv.deliv_id = dtb_order.deliv_id', 'dtb_order.order_id = ?', array($arrRet[$key]['order_id']));
        }
        $arrTplVar->arrShipping = $arrRet;

        $arrTplVar->Message_tmp = $arrOrder['message'];

        // 会員情報の取得
        $customer_id = $arrOrder['customer_id'];
        $objQuery->setOrder('customer_id');
        $arrRet = $objQuery->select('point', 'dtb_customer', 'customer_id = ?', array($customer_id));
        $arrCustomer = isset($arrRet[0]) ? $arrRet[0] : '';

        $arrTplVar->arrCustomer = $arrCustomer;
        $arrTplVar->arrOrder = $arrOrder;

        //その他決済情報
        if ($arrOrder['memo02'] != '') {
            $arrOther = unserialize($arrOrder['memo02']);

            foreach ($arrOther as $other_key => $other_val) {
                if (SC_Utils_Ex::sfTrim($other_val['value']) == '') {
                    $arrOther[$other_key]['value'] = '';
                }
            }

            $arrTplVar->arrOther = $arrOther;
        }

        // 都道府県変換
        $arrTplVar->arrPref = $this->arrPref;

        $objCustomer = new SC_Customer_Ex();
        $arrTplVar->tpl_user_point = $objCustomer->getValue('point');

        $objMailView = null;
        if ($template_id == 2) {
            $objMailView = new SC_MobileView_Ex();
        } else {
            $objMailView = new SC_SiteView_Ex();
        }
        // メール本文の取得
        $objMailView->setPage($this->getPage());
        $objMailView->assignobj($arrTplVar);
        $body = $objMailView->fetch($this->arrMAILTPLPATH[$template_id]);

        // メール送信処理
        $objSendMail = new SC_SendMail_Ex();
        $bcc = $arrInfo['email01'];
        $from = $arrInfo['email03'];
        $error = $arrInfo['email04'];
        $tosubject = $this->sfMakeSubject($tmp_subject, $objMailView);

        $objSendMail->setItem('', $tosubject, $body, $from, $arrInfo['shop_name'], $from, $error, $error, $bcc);
        $objSendMail->setTo($arrOrder['order_email'], $arrOrder['order_name01'] . ' ' . $arrOrder['order_name02'] . ' 様');

        // 送信フラグ:trueの場合は、送信する。
        if ($send) {
            if ($objSendMail->sendMail()) {
                $this->sfSaveMailHistory($order_id, $template_id, $tosubject, $body);
            }
        }

        return $objSendMail;
    }

}
