<?php
/*
 * Copyright(c) 2012 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 */

// {{{ requires
require_once CLASS_EX_REALDIR . 'page_extends/mypage/LC_Page_AbstractMypage_Ex.php';
require_once(MDL_PG_MULPAY_CLASSEX_PATH . 'client_extends/SC_Mdl_PG_MULPAY_Client_Member_Ex.php');
require_once(MDL_PG_MULPAY_CLASSEX_PATH . 'client_extends/SC_Mdl_PG_MULPAY_Client_Member_Ex.php');
require_once(MDL_PG_MULPAY_PAGE_HELPEREX_PATH . 'LC_PageHelper_Mdl_PG_MULPAY_Base_Ex.php');

/**
 * カード登録内容変更 のページクラス.
 *
 * @package PgMulpayUtils
 * @author GMO Payment Gateway, Inc.
 */
class LC_Page_Mypage_ChangeCard extends LC_Page_AbstractMypage_Ex {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $this->tpl_subtitle = 'カード情報登録内容変更';
        $this->tpl_mypageno = 'change_card';

        $this->httpCacheControl('nocache');
        $objDate = new SC_Date_Ex(date('Y'), date('Y') + 15);
        $this->arrYear = $objDate->getZeroYear();
        $this->arrMonth = $objDate->getZeroMonth();
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        parent::process();
    }

    /**
     * Page のプロセス
     * @return void
     */
    function action() {

        $objCustomer = new SC_Customer_Ex();
        $customer_id = $objCustomer->getValue('customer_id');

        // パラメーター管理クラス,パラメーター情報の初期化
        $objFormParam = new SC_FormParam_Ex();

        $objClient = new SC_Mdl_PG_MULPAY_Client_Member_Ex();
        $arrCustomer = SC_Helper_Customer_Ex::sfGetCustomerData($customer_id);

        switch ($this->getMode()) {
            case 'delete':
                $this->lfInitDeleteParam($objFormParam);
                $objFormParam->setParam($_POST);
                $this->arrErr = $objFormParam->checkError();
                if (SC_Utils_Ex::isBlank($this->arrErr)) {
                    $arrForm  = $objFormParam->getHashArray();
                    $ret = $objClient->deleteCard($arrCustomer, $arrForm);
                    if ($ret) {
                        $this->tpl_is_success = true;
                    } else {
                        $arrErr = $objClient->getError();
                        $this->arrErr['error'] = '※ 削除でエラーが発生しました。<br />' . implode('<br />', $arrErr);
                    }
                }
                $objFormParam = new SC_FormParam_Ex();
                $this->lfInitRegistParam($objFormParam);
                $this->arrForm = $objFormParam->getFormParamList();
                break;
            case 'regist':
                $this->lfInitRegistParam($objFormParam);
                $objFormParam->setParam($_POST);
                $this->arrErr = $objFormParam->checkError();
                if (SC_Utils_Ex::isBlank($this->arrErr)) {
                    $arrForm  = $objFormParam->getHashArray();
                    $ret = $objClient->saveCard($arrCustomer, $arrForm);
                    if ($ret) {
                        $this->tpl_is_success = true;
                    } else {
                        $arrErr = $objClient->getError();
                        $this->arrErr['error2'] = '※ 登録でエラーが発生しました。<br />' . implode('<br />', $arrErr);
                        $this->checkErrorLimit();
                    }
                }
                $this->arrForm = $objFormParam->getFormParamList();
                break;
            default:
                $this->checkCreditLock();
                $this->lfInitRegistParam($objFormParam);
                $this->arrForm = $objFormParam->getFormParamList();
                break;
        }

        $objClient = new SC_Mdl_PG_MULPAY_Client_Member_Ex(); 
        $ret = $objClient->getMember($arrCustomer);
        if (!$ret) {
            $objClient->saveMember($arrCustomer);
        } else {
            $ret = $objClient->searchCard($arrCustomer);
            if ($ret) {
                $this->arrData = $objClient->arrResults;
            }
        }
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::destroy();
    }

    function lfInitRegistParam(&$objFormParam) {
        $this->enable_token = SC_Util_PG_MULPAY_Ex::isTokenCardPaymentEnable();

        if ($this->enable_token) {
            $objFormParam->addParam("カード番号", "CardNo", 16, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
            $objFormParam->addParam("カード有効期限年", "Expire_year", 2, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
            $objFormParam->addParam("カード有効期限月", "Expire_month", 2, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
            $objFormParam->addParam("カード名義:名", "card_name1", 25, 'a', array("MAX_LENGTH_CHECK", "ALNUM_CHECK"), "");
            $objFormParam->addParam("カード名義:姓", "card_name2", 24, 'a', array("MAX_LENGTH_CHECK", "ALNUM_CHECK"), "");

            $objFormParam->addParam("トークン", "token", '', '', array('EXIST_CHECK'));

            $objFormParam->addParam("JSパス名", "js_urlpath");
            $objFormParam->addParam("ショップID", "ShopID");

            $objMdl =& SC_Mdl_PG_MULPAY_Ex::getInstance();
            $arrMdlSetting = $objMdl->getUserSettings();
            $objFormParam->setValue('js_urlpath', SC_Util_PG_MULPAY_Ex::getJsUrlPath($arrMdlSetting['server_url']));
            $objFormParam->setValue('ShopID', $arrMdlSetting['ShopID']);
        } else {
            $objFormParam->addParam("カード番号", "CardNo", 16, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
            $objFormParam->addParam("カード有効期限年", "Expire_year", 2, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
            $objFormParam->addParam("カード有効期限月", "Expire_month", 2, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
            $objFormParam->addParam("カード名義:名", "card_name1", 25, 'a', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "ALNUM_CHECK"), "");
            $objFormParam->addParam("カード名義:姓", "card_name2", 24, 'a', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "ALNUM_CHECK"), "");
        }
    }

    function lfInitDeleteParam(&$objFormParam) {
        $objFormParam->addParam("カード登録番号", "CardSeq", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK", "EXIST_CHECK"));
    }

    function checkErrorLimit() {
        $arrPaymentInfo = SC_Util_PG_MULPAY_Ex::getCreditConfig();
        $base = new LC_PageHelper_MDL_PG_MULPAY_Base();
        $base->checkErrorLimit($arrPaymentInfo, true);
    }

    function checkCreditLock() {
        $arrPaymentInfo = SC_Util_PG_MULPAY_Ex::getCreditConfig();
        $base = new LC_PageHelper_MDL_PG_MULPAY_Base();
        $base->checkCreditLock($arrPaymentInfo, true);
    }
}
