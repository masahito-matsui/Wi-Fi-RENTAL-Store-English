<?php
/*
 * Copyright(c) 2017 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 */

// {{{ requires
require_once(MODULE_REALDIR . 'mdl_pg_mulpay/inc/include.php');
require_once(CLASS_EX_REALDIR . "page_extends/admin/LC_Page_Admin_Ex.php");
require_once(MDL_PG_MULPAY_CLASSEX_PATH . "util_extends/SC_Util_PG_MULPAY_Ex.php");
require_once(MDL_PG_MULPAY_CLASSEX_PATH . "util_extends/SC_Util_PG_MULPAY_AccountLock_Ex.php");

/**
 *
 */
class LC_Page_Admin_Order_PgMulpayUtils_Use_Limit_Unlock extends LC_Page_Admin_Ex {
    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $this->tpl_mainpage = MDL_PG_MULPAY_TEMPLATE_PATH . 'admin/order_use_limit_unlock.tpl';
        $this->tpl_mainno = 'order';
        $this->tpl_subno = 'use_limit_unlock';
        $this->tpl_maintitle = '受注管理';
        $this->tpl_subtitle = 'クレジット入力ロック解除';
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {
        // パラメータ管理クラス
        $objFormParam = new SC_FormParam_Ex();
        // パラメータ情報の初期化
        $this->lfInitParam($objFormParam);
        $objFormParam->setParam($_POST);
        // 入力値の変換
        $objFormParam->convParam();

        $this->arrForm = $objFormParam->getFormParamList();

        switch ($this->getMode()) {
        case 'unlock':
            $this->lfUnlockAccount($objFormParam->getValue('ipaddress'));
        case 'search':
            // 検索結果の表示
            $this->lfAccountDisp($objFormParam->getValue('search_ipaddress'));
            break;

        default:
            break;
        }
    }

    /**
     *  パラメーター情報の初期化
     *  @param SC_FormParam
     */
    function lfInitParam(&$objFormParam) {
        $objFormParam->addParam("IPアドレス", "search_ipaddress", 15, '', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("IPアドレス", "ipaddress", 15, '', array("MAX_LENGTH_CHECK"));
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::destroy();
    }

    //ステータス一覧の表示
    function lfAccountDisp($ipAddr) {
        $paymentInfo = SC_Util_PG_MULPAY_Ex::getCreditConfig();

        if (empty($paymentInfo)) {
            $this->tpl_linemax = 0;
            $this->arrAccounts = array();
            return;
        }

        $limitMin   = $paymentInfo['limit_min'];
        $limitCount = $paymentInfo['limit_count'];
        $lockMin    = $paymentInfo['lock_min'];

        $objAL =& SC_Util_PG_MULPAY_AccountLock::getInstance
            ($limitMin, $limitCount, $lockMin);

        $accounts = $objAL->getLockList($ipAddr);
        $this->tpl_linemax = count($accounts);

        $sort = array();
        foreach ($accounts as $key => &$account) {
            $sort[$key] = $account['date_time'];

            $dt = DateTime::createFromFormat('YmdHis', $account['date_time']);
            $account['date_time'] = $dt->format('Y/m/d H:i:s');

            $dt->add(new DateInterval('PT' . $lockMin . 'M'));
            $account['unlock_date_time'] = $dt->format('Y/m/d H:i:s');

            $isLock = $objAL->isLock($account['ipaddress']);
            $account['lock_status'] = $isLock ? "ロック中" : "";
            $account['is_lock'] = $isLock;
        }

        // エラー検出日時の降順でソート
        array_multisort($sort, SORT_DESC, $accounts);

        // 検索結果の取得
        $this->arrAccounts = $accounts;
    }

    /**
     * ロック中のアカウントをロック解除します
     */
    function lfUnlockAccount($ipAddr) {
        $paymentInfo = SC_Util_PG_MULPAY_Ex::getCreditConfig();

        if (empty($ipAddr) || empty($paymentInfo)) {
            return;
        }

        $limitMin   = $paymentInfo['limit_min'];
        $limitCount = $paymentInfo['limit_count'];
        $lockMin    = $paymentInfo['lock_min'];

        $objAL =& SC_Util_PG_MULPAY_AccountLock::getInstance
            ($limitMin, $limitCount, $lockMin);

        $objAL->unLock($ipAddr);
    }
}
?>
