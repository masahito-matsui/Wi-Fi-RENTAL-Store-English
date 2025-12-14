<?php
/*
 * Copyright(c) 2012 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 */

// {{{ requires
require_once(MDL_PG_MULPAY_CLASSEX_PATH . 'util_extends/SC_Util_PG_MULPAY_AccountLock_Ex.php');

/**
 * 決済モジュール 決済画面ヘルパー：ベース
 */
class LC_PageHelper_MDL_PG_MULPAY_Base {
    /**
     * コンストラクタ
     *
     * @return void
     */
    function __construct() {
    }

    /**
     * パラメーター情報の初期化を行う.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @param array $arrPaymentInfo 決済設定情報
     * @param array $arrOrder 受注情報
     * @return void
     */
    function initParam(&$objFormParam, $arrPaymentInfo, &$arrOrder) {
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
    }

    /**
     * 画面に設定するテンプレート名を返す
     *
     * @return text テンプレートファイル名
     */
    function getTemplate() {
        return "";
    }

    /**
     * 画面に設定するフォーム用ブロック名を返す
     *
     * @return text テンプレートブロック名
     */
    function getFormBloc() {
        return "";
    }

    /**
     * クレジットカードの決済エラーを管理し規定回数を超える場合は、
     * 入力内容の確認画面にリダイレクトする
     */
    function checkErrorLimit($arrPaymentInfo, $isMypage = false) {
        $objMdl =& SC_Mdl_PG_MULPAY_Ex::getInstance();

        // 入力回数制限機能を利用しない場合はここまで
        if (!isset($arrPaymentInfo['use_limit']) ||
            $arrPaymentInfo['use_limit'] != "1") {
            return;
        }

        $limitMin   = $arrPaymentInfo['limit_min'];
        $limitCount = $arrPaymentInfo['limit_count'];
        $lockMin    = $arrPaymentInfo['lock_min'];

        $objAL =& SC_Util_PG_MULPAY_AccountLock_Ex::getInstance
            ($limitMin, $limitCount, $lockMin);

        $objAL->errCount();

        $objMdl->printLog(print_r($objAL->getAccountInfo(), true));

        // ロック中である旨を表示する画面を表示する
        $this->checkCreditLock($arrPaymentInfo, $isMypage);
    }

    /**
     * クレジット決済がロック状態かどうかを確認する
     * ロック中の場合はその旨画面表示する
     */
    function checkCreditLock($arrPaymentInfo, $isMypage = false) {
        $objMdl =& SC_Mdl_PG_MULPAY_Ex::getInstance();

        // 入力回数制限機能を利用しない場合はここまで
        if (!isset($arrPaymentInfo['use_limit']) ||
            $arrPaymentInfo['use_limit'] != "1") {
            return;
        }

        $limitMin   = $arrPaymentInfo['limit_min'];
        $limitCount = $arrPaymentInfo['limit_count'];
        $lockMin    = $arrPaymentInfo['lock_min'];

        $objAL =& SC_Util_PG_MULPAY_AccountLock_Ex::getInstance
            ($limitMin, $limitCount, $lockMin);

        // ロックされていない場合はここまで
        if (!$objAL->isLock()) {
            return;
        }

        if (!$isMypage) {
            $objPurchase = new SC_Helper_Purchase_Ex();
            $objPurchase->rollbackOrder($_SESSION['order_id'], ORDER_CANCEL, true);
        }

        $msg =<<< EOS
アカウント[{$objAL->getRemoteAddr()}]がロックされています。
詳細についてはショップサポートまでお問い合わせください。
EOS;
        SC_Utils_Ex::sfDispSiteError(FREE_ERROR_MSG, "", true, nl2br($msg));
        SC_Response_Ex::actionExit();
    }
}
