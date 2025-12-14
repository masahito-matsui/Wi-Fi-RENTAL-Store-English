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
require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/class/plg_ExpressLink_LC_Template.php";

class plg_ExpressLink_LC_Template_Ex extends plg_ExpressLink_LC_Template
{

    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename)
    {
        parent::prefilterTransform($source, $objPage, $filename);
    }

}
