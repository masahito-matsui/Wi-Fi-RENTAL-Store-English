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

require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/plg_ExpressLink_Utils.php";
require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/class/plg_ExpressLink_LC_Page.php";

class plg_ExpressLink_LC_Page_Shopping_Payment extends plg_ExpressLink_LC_Page
{

    /**
     * @param LC_Page_Shopping_Payment $objPage 購入支払のページクラス
     * @return void
     */
    function before($objPage)
    {
        if (plg_ExpressLink_Center_Stop == 1) {
            if ($objPage->getMode() == "confirm") {
                $objFormParam = new SC_FormParam_Ex();
                $objPurchase = new SC_Helper_Purchase_Ex();
                $objCartSess = new SC_CartSession_Ex();
                $objCustomer = new SC_Customer_Ex();
                $cart_key = $objCartSess->getKey();

                $arrShipping = & $objPurchase->getShippingTemp();
                $objPage->setFormParams($objFormParam, $_POST, false, $arrShipping);
                self::lfInitParam($objFormParam, $_POST, false, $arrShipping);

                if ($objCustomer->isLoginSuccess(true)) {
                    $tpl_user_point = $objCustomer->getValue('point');
                }
                $arrPrices = $objCartSess->calculate($cart_key, $objCustomer);
                $arrErr = $objPage->lfCheckError($objFormParam, $arrPrices['subtotal'], $tpl_user_point);
                if (count($arrErr) > 0) {
                    $_POST['mode'] = $_GET['mode'] = $_REQUEST['mode'] = '';
                }

                foreach ($arrShipping as $index => $shipping) {
                    if ($_POST['plg_expresslink_center_stop' . $index] == 1) {
                        if (strlen($_POST['plg_expresslink_center_code' . $index]) == 0) {
                            $_POST['mode'] = $_GET['mode'] = $_REQUEST['mode'] = '';
                            break;
                        }
                    }
                }
            }
        }
    }

    /**
     * @param LC_Page_Shopping_Payment $objPage 購入支払のページクラス
     * @return void
     */
    function after($objPage)
    {
        if (plg_ExpressLink_Center_Stop == 1) {
            $objPage->arrStop = array("0" => "留置きしない", "1" => "留置きする");
            $objPage->yamato_url = plg_ExpressLink_Utils::getConfig("yamato_center_search_url");
            $objPage->sagawa_url = plg_ExpressLink_Utils::getConfig("sagawa_center_search_url");
            $objPage->jpost_url = plg_ExpressLink_Utils::getConfig("post_search_url");
            $objPage->seino_url = plg_ExpressLink_Utils::getConfig("seino_search_url");

            $objPurchase = new SC_Helper_Purchase_Ex();
            $objFormParam = new SC_FormParam_Ex();

            $arrOrderTemp = $objPurchase->getOrderTemp($objPage->tpl_uniqid);

            switch ($objPage->getMode()) {

                //             * 配送業者選択時のアクション
                //             * モバイル端末以外の場合は, JSON 形式のデータを出力し, ajax で取得する.
                //             
                case 'select_deliv':
                    $objPage->setFormParams($objFormParam, $arrOrderTemp, true, $objPage->arrShipping);
                    self::lfInitParam($objFormParam, $arrOrderTemp, true, $objPage->arrShipping);
                    $objFormParam->setParam($_POST);
                    break;

                default:
                    // FIXME 前のページから戻ってきた場合は別パラメーター(mode)で処理分岐する必要があるのかもしれない
                    if (plg_ExpressLink_Utils::getECCUBEVer() >= 2132) {
                        $objPage->setFormParams($objFormParam, $arrOrderTemp, $objPage->is_download, $objPage->arrShipping);
                    } else {
                        $objPage->setFormParams($objFormParam, $arrOrderTemp, false, $objPage->arrShipping);
                    }
                    self::lfInitParam($objFormParam, $arrOrderTemp, false, $objPage->arrShipping);
                    $objFormParam->setParam($_POST);

                    if (!$objPage->is_single_deliv) {
                        $deliv_id = $objFormParam->getValue('deliv_id');
                    } else {
                        $deliv_id = $objPage->arrDeliv[0]['deliv_id'];
                    }

                    if (!SC_Utils_Ex::isBlank($deliv_id)) {
                        $objFormParam->setValue('deliv_id', $deliv_id);
                    }
                    break;
            }

            foreach ($objPage->arrShipping as $index => $shipping) {
                if ($_POST['plg_expresslink_center_stop' . $index] == 1) {
                    if (strlen($_POST['plg_expresslink_center_code' . $index]) == 0 && strlen($shipping['plg_expresslink_center_code']) == 0) {
                        $objPage->arrErr['plg_expresslink_center_code' . $index] = "営業店コード・郵便局名が未入力です<br>";
                    }
                }
            }

            $objPage->arrForm = $objFormParam->getFormParamList();
        }
    }

    /**
     * @param LC_Page_Shopping_Payment $objPage 購入支払のページクラス
     * @return void
     */
    function confirm($objPage)
    {
        if (plg_ExpressLink_Center_Stop == 1) {
            $objFormParam = new SC_FormParam_Ex();
            $objPage->setFormParams($objFormParam, $_POST, false, $objPage->arrShipping);
            self::lfInitParam($objFormParam, $_POST, false, $objPage->arrShipping);

            $objPage->arrErr = $objPage->lfCheckError($objFormParam, $objPage->arrPrices['subtotal'], $objPage->tpl_user_point);

            if (empty($objPage->arrErr)) {
                self::saveShippings($objFormParam, $objPage->arrDelivTime, $objPage);
                $arrData = $objFormParam->getHashArray();
            }
        }
    }

    /**
     * パラメーター情報の初期化を行う.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @param boolean $deliv_only 必須チェックは deliv_id のみの場合 true
     * @param array $arrShipping 配送先情報の配列
     * @return void
     */
    function lfInitParam(&$objFormParam, $arrParam, $deliv_only, &$arrShipping)
    {
        if (!$deliv_only) {
            foreach ($arrShipping as $val) {
                $objFormParam->addParam("営業店・郵便局留め", "plg_expresslink_center_stop" . $val['shipping_id'], INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
                $objFormParam->addParam("営業店コード・郵便局名", "plg_expresslink_center_code" . $val['shipping_id'], 20, '', array());
                $objFormParam->addParam("郵便局 郵便番号", "plg_expresslink_center_zip" . $val['shipping_id'], 7, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
            }
        }

        $objFormParam->setParam($arrParam);
        $objFormParam->convParam();
    }

    /**
     * 配送情報を保存する.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @param array $arrDelivTime 配送時間の配列
     */
    function saveShippings(&$objFormParam, $arrDelivTime, $objPage)
    {
        // ダウンロード商品の場合は配送先が存在しない
        if ($objPage->is_download)
            return;
        $deliv_id = $objFormParam->getValue('deliv_id');

        /* TODO
         * SC_Purchase::getShippingTemp() で取得して,
         * リファレンスで代入すると, セッションに添字を追加できない？
         */
        foreach ($_SESSION['shipping'] as $key => $value) {
            $shipping_id = $_SESSION['shipping'][$key]['shipping_id'];
            $center_stop = $objFormParam->getValue('plg_expresslink_center_stop' . $shipping_id);
            $_SESSION['shipping'][$key]['plg_expresslink_center_stop'] = $center_stop;
            $_SESSION['shipping'][$key]['plg_expresslink_center_code'] = $objFormParam->getValue('plg_expresslink_center_code' . $shipping_id);
            $_SESSION['shipping'][$key]['plg_expresslink_center_zip'] = $objFormParam->getValue('plg_expresslink_center_zip' . $shipping_id);
        }
    }

}
