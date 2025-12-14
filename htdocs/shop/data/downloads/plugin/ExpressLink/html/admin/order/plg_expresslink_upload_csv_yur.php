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
// {{{ requires
require_once '../require.php';
require_once PLUGIN_UPLOAD_REALDIR . 'ExpressLink/class/LC_Page_Admin_Order_UploadCSVYupackR.php';

// }}}
// {{{ generate page

$objPage = new LC_Page_Admin_Order_UploadCSVYupackR();
register_shutdown_function(array($objPage, "destroy"));
$objPage->init();
$objPage->process();
