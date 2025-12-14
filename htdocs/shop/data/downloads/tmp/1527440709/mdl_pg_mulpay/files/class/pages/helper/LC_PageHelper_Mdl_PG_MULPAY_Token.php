<?php
/*
 * Copyright(c) 2012 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 */

// {{{ requires
require_once(MDL_PG_MULPAY_PAGE_HELPEREX_PATH . 'LC_PageHelper_Mdl_PG_MULPAY_Base_Ex.php');
require_once(MDL_PG_MULPAY_CLASSEX_PATH . 'client_extends/SC_Mdl_PG_MULPAY_Client_Token_Ex.php');
require_once(MDL_PG_MULPAY_CLASSEX_PATH . 'client_extends/SC_Mdl_PG_MULPAY_Client_Util_Ex.php');

/**
 * 決済モジュール 決済画面ヘルパー：クレジット決済（トークン方式）
 */
class LC_PageHelper_Mdl_PG_MULPAY_Token extends LC_PageHelper_Mdl_PG_MULPAY_Base_Ex {

    /**
     * コンストラクタ
     *
     * @return void
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * パラメーター情報の初期化を行う.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @param array $arrSetting モジュール設定情報
     * @param array $arrOrder 受注情報
     * @return void
     */
    function initParam(&$objFormParam, &$arrPaymentInfo, &$arrOrder) {
        $arrPaymentInfo['enable_customer_regist'] = SC_Util_PG_MULPAY_Ex::isRegistCardPaymentEnable();

        $objFormParam->addParam("カード番号", "CardNo", 16, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("カード有効期限年", "Expire_year", 2, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("カード有効期限月", "Expire_month", 2, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("カード名義:名", "card_name1", 25, 'a', array("MAX_LENGTH_CHECK", "ALNUM_CHECK"), "");
        $objFormParam->addParam("カード名義:姓", "card_name2", 24, 'a', array("MAX_LENGTH_CHECK", "ALNUM_CHECK"), "");
        if ($arrPaymentInfo['use_securitycd']) {
            $objFormParam->addParam("セキュリティコード", "SecurityCode", 4, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"), "");
        }

        $objFormParam->addParam("トークン", "token", '', '', array('EXIST_CHECK'));
        $objFormParam->addParam("お支払い方法", "Method", '', '', array('EXIST_CHECK'));

        if ($arrPaymentInfo['enable_customer_regist']) {
            $objFormParam->addParam("カード情報登録", "register_card");
        }

        $objFormParam->addParam("JSパス名", "js_urlpath");
        $objFormParam->addParam("ショップID", "ShopID");

        $isCheck = "0";
        if ($arrPaymentInfo['use_securitycd'] == "1" &&
            $arrPaymentInfo['use_securitycd_option'] == "0") {
            $isCheck = "1";
        }
        $objFormParam->addParam("セキュリティコードチェック",
                                "security_code_check", '', '',
                                array(), $isCheck);
    }

    /**
     * 入力内容のチェックを行なう.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return array 入力チェック結果の配列
     */
    function checkError(&$objFormParam) {
        $arrParam = $objFormParam->getHashArray();
        $objErr = new SC_CheckError_Ex($arrParam);
        $objErr->arrErr = $objFormParam->checkError();

        return $objErr->arrErr;
    }


    /**
     * 画面モード毎のアクションを行う
     *
     * @param text $mode Mode値
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @param array $arrOrder 受注情報
     * @param LC_Page $objPage 呼出元ページオブジェクト
     * @return void
     */
    function modeAction($mode, &$objFormParam, &$arrOrder, &$objPage) {
        $objDate = new SC_Date_Ex(date('Y'), date('Y') + 15);
        $objPage->arrYear = $objDate->getZeroYear();
        $objPage->arrMonth = $objDate->getZeroMonth();

        $arrPayMethod = SC_Util_PG_MULPAY_Ex::getCreditPayMethod();
        $objPage->arrPayMethod = array();
        foreach ($objPage->arrPaymentInfo['credit_pay_methods'] as $pay_method) {
            if(!SC_Utils_Ex::isBlank($arrPayMethod[$pay_method])) {
                $objPage->arrPayMethod[$pay_method] = $arrPayMethod[$pay_method];
            }
        }

        $objPurchase = new SC_Helper_Purchase_Ex();

        if ($objPage->arrPaymentInfo['enable_customer_regist'] && !SC_Utils_Ex::isBlank($arrOrder['customer_id']) && $arrOrder['customer_id'] != 0) {
            $objPage->tpl_pg_regist_card_form = true;

            $objClientMember = new SC_Mdl_PG_MULPAY_Client_Member_Ex();
            $ret = $objClientMember->searchCard($arrOrder);
            if ($ret) {
                if(count($objClientMember->arrResults) >= MDL_PG_MULPAY_REGIST_CARD_NUM) {
                    $objPage->tpl_pg_regist_card_form = false;
                    $objPage->tpl_pg_regist_card_max = true;
                }
            }
        }

        $objMdl =& SC_Mdl_PG_MULPAY_Ex::getInstance();
        $arrMdlSetting = $objMdl->getUserSettings();
        $objFormParam->setValue('js_urlpath', SC_Util_PG_MULPAY_Ex::getJsUrlPath($arrMdlSetting['server_url']));
        $objFormParam->setValue('ShopID', $arrMdlSetting['ShopID']);

        switch($mode) {
        case 'next':
            $objPage->arrErr = $this->checkError($objFormParam);
            if (SC_Utils_Ex::isBlank($objPage->arrErr)) {
                // 決済実行
                $objClient = new SC_Mdl_PG_MULPAY_Client_Token_Ex();
                $result = $objClient->doPaymentRequest($arrOrder, $objFormParam->getHashArray(), $objPage->arrPaymentInfo);

                if ($result) {
                    if ($objFormParam->getValue('register_card') == '1') {
                        $arrParam[0]['register_card'] = '1';
                        $arrParam[0]['HolderName'] = $objFormParam->getValue('card_name1') . ' ' . $objFormParam->getValue('card_name2');
                        SC_Util_PG_MULPAY_Ex::setOrderPayData($arrOrder, $arrParam);
                        $arrOrder['register_card'] = '1';
                    }

                    $arrResults = $objClient->getResults();
                    if ($arrResults['ACS'] == '1') {
                        $objPage->arrTdData = $arrResults;
                        $objPage->tpl_url = $arrResults['ACSUrl'];
                        $objPage->tpl_is_td_tran = true;
                        $objPage->tpl_is_loding = true;
                        $objPage->tpl_btn_next = true;
                        $objPage->tpl_payment_onload = "send = false; fnModeSubmit('next','','');";
                        $term_url = substr_replace(SHOPPING_MODULE_URLPATH, '', 0, strlen(ROOT_URLPATH));
                        $objPage->arrTdData['TermUrl'] =  SC_Utils_Ex::sfRmDupSlash(HTTPS_URL . $term_url . '?mode=SecureTran&order_id=' . $arrOrder['order_id']);
                        $objFormParam = new SC_FormParam_Ex();
                    } else {
                        $order_status = ORDER_NEW;
                        $objQuery =& SC_Query_Ex::getSingletonInstance();
                        $objQuery->begin();
                        $objPurchase->sfUpdateOrderStatus($arrOrder['order_id'], $order_status, null, null, $sqlval);
                        $objQuery->commit();
                        $objPurchase->sendOrderMail($arrOrder['order_id']);
                        if ($arrOrder['register_card']) {
                            $this->lfRegistCard($arrOrder, $objFormParam->getHashArray());
                        }
                        SC_Response_Ex::sendRedirect(SHOPPING_COMPLETE_URLPATH);
                        $objPage->actionExit();
                    }
                } else {
                    $arrErr = $objClient->getError();
                    $objPage->arrErr['payment'] = '※ 決済でエラーが発生しました。<br />' . implode('<br />', $arrErr);
                    $this->checkErrorLimit($objPage->arrPaymentInfo);
                }
            } else {
                if (SC_Display_Ex::detectDevice() == DEVICE_TYPE_MOBILE
                        && !SC_Utils_Ex::isBlank($objPage->arrErr['CardNo'])
                        && !SC_Utils_Ex::isBlank($objPage->arrErr['Expire_year'])
                        && !SC_Utils_Ex::isBlank($objPage->arrErr['Expire_month'])
                        && !SC_Utils_Ex::isBlank($objPage->arrErr['card_name1'])
                        && !SC_Utils_Ex::isBlank($objPage->arrErr['card_name2']) ) {
                    $objPage->arrErr = array();
                }
            }
        break;
        case 'SecureTran':
            $objClient = new SC_Mdl_PG_MULPAY_Client_Token_Ex();
            $result = $objClient->doSecureTran($arrOrder, $_REQUEST, $objPage->arrPaymentInfo);
            if ($result) {
                $order_status = ORDER_NEW;
                $objQuery =& SC_Query_Ex::getSingletonInstance();
                $objQuery->begin();
                $objPurchase->sfUpdateOrderStatus($arrOrder['order_id'], $order_status, null, null, $sqlval);
                $objQuery->commit();
                $objPurchase->sendOrderMail($arrOrder['order_id']);
                $arrParam = SC_Util_PG_MULPAY_Ex::getOrderPayData($arrOrder['order_id']);
                if ($arrParam['register_card'] == '1') {
                    $this->lfRegistCard($arrOrder, $arrParam);
                }
                SC_Response_Ex::sendRedirect(SHOPPING_COMPLETE_URLPATH);
                $objPage->actionExit();
            } else {
                $arrErr = $objClient->getError();
                if (!SC_Utils_Ex::isBlank($arrErr)) {
                    $objPage->arrErr['payment'] = '※ 決済でエラーが発生しました。<br />' . implode('<br />', $arrErr);
                    $this->checkErrorLimit($objPage->arrPaymentInfo);
                }
            }
        break;
        case 'return':
            $objPurchase->rollbackOrder($_SESSION['order_id'], ORDER_CANCEL, true);
            SC_Response_Ex::sendRedirect(SHOPPING_CONFIRM_URLPATH);
            SC_Response_Ex::actionExit();
        break;
        default:
            $this->checkCreditLock($objPage->arrPaymentInfo);
        break;
        }
    }

    function lfRegistCard($arrOrder, $arrParam = array()) {
        $objClient = new SC_Mdl_PG_MULPAY_Client_Util_Ex();
        $objClient->saveOrderCard($arrOrder, $arrParam);
    }

    /**
     * 画面に設定するテンプレート名を返す
     *
     * @return text テンプレートファイル名
     */
    function getFormBloc() {
        $objMdl =& SC_Mdl_PG_MULPAY_Ex::getInstance();
        $arrBlocId = $objMdl->getSubData('bloc_setting');
        $device_type_id = SC_Display_Ex::detectDevice();
        $bloc_id =  $arrBlocId['pg_mulpay_token'][ $device_type_id ];
        if ($bloc_id) {
            $objLayout = new SC_Helper_PageLayout_Ex();
            $arrBloc = $objLayout->getBlocs($device_type_id, 'bloc_id = ?', array($bloc_id), true);
            return $arrBloc[0]['tpl_path'];
        }
        return;
    }
}
