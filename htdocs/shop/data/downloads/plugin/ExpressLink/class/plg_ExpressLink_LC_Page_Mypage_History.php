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

class plg_ExpressLink_LC_Page_Mypage_History extends plg_ExpressLink_LC_Page
{

    /**
     * @param LC_Page_Mypage_History $objPage 注文履歴詳細のページクラス
     * @return void
     */
    function after($objPage)
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        foreach ($objPage->arrShipping as $key => $value) {
            $objPage->arrShipping[$key]['confirm_url'] = $objQuery->get('dtb_deliv.confirm_url', 'dtb_deliv INNER JOIN dtb_order ON dtb_deliv.deliv_id = dtb_order.deliv_id', 'dtb_order.order_id = ?', array($value['order_id']));
        }
    }

}
