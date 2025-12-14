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
require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/class/plg_ExpressLink_LC_Page_Mypage_History.php";

class plg_ExpressLink_LC_Page_Mypage_History_Ex extends plg_ExpressLink_LC_Page_Mypage_History
{
    /**
     * @param LC_Page_Mypage_History $objPage 注文履歴詳細のページクラス
     * @return void
     */
    function after($objPage)
    {
        parent::after($objPage);
    }
}
