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
require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/class/plg_ExpressLink_LC_Page_Shopping_Confirm.php";

class plg_ExpressLink_LC_Page_Shopping_Confirm_Ex extends plg_ExpressLink_LC_Page_Shopping_Confirm
{

    /**
     * @param LC_Page_Shopping_Confirm $objPage 購入確認のページクラス
     * @return void
     */
    function before($objPage)
    {
        parent::before($objPage);
    }

    /**
     * @param LC_Page_Shopping_Confirm $objPage 購入確認のページクラス
     * @return void
     */
    function after($objPage)
    {
        parent::after($objPage);
    }

}
