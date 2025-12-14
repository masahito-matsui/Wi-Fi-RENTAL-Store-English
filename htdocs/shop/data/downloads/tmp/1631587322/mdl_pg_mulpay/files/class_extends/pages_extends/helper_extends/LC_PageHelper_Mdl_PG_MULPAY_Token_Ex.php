<?php
/*
 * Copyright(c) 2012 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 */

// {{{ requires
require_once(MDL_PG_MULPAY_PAGE_HELPER_PATH . 'LC_PageHelper_Mdl_PG_MULPAY_Token.php');

/**
 * 決済モジュール 決済画面ヘルパー：トークン方式クレジット決済
 */
class LC_PageHelper_Mdl_PG_MULPAY_Token_Ex extends LC_PageHelper_Mdl_PG_MULPAY_Token {

    /**
     * コンストラクタ
     *
     * @return void
     */
    function __construct() {
        parent::__construct();
    }

}
?>