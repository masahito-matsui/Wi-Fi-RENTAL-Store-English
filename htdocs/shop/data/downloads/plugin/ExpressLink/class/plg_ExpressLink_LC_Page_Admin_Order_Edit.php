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

class plg_ExpressLink_LC_Page_Admin_Order_Edit extends plg_ExpressLink_LC_Page
{

    /**
     * @param LC_Page_Admin_Order_Edit $objPage 受注管理編集のページクラス
     * @return void
     */
    function before($objPage)
    {
        $objPage->arrStop = array("0" => "留置きしない", "1" => "留置きする");
        $objPage->use_center_stop = plg_ExpressLink_Utils::getConfig("center_stop");

        $objPage->arrShippingKeys[] = 'plg_expresslink_slip_number';
        $objPage->arrShippingKeys[] = 'plg_expresslink_center_stop';
        $objPage->arrShippingKeys[] = 'plg_expresslink_center_code';
        $objPage->arrShippingKeys[] = 'plg_expresslink_center_zip';
    }

    /**
     * @param LC_Page_Admin_Order_Edit $objPage 受注管理編集のページクラス
     * @return void
     */
    function after($objPage)
    {
        parent::after($objPage);
    }

}
