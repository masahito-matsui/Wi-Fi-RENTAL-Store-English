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

/**
 * 共通関数
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plg_ExpressLink_Utils
{

    function getECCUBEVer()
    {
        return floor(str_replace('.', '', ECCUBE_VERSION));
    }

    function checkEnableOrderSortPlugin()
    {
        $objQuery = SC_Query_Ex::getSingletonInstance();
        return $objQuery->get("enable", "dtb_plugin", "plugin_code = ?", array("OrderSort"));
    }

    function checkEnableDelivCoolPlugin()
    {
        $objQuery = SC_Query_Ex::getSingletonInstance();
        return $objQuery->get("enable", "dtb_plugin", "plugin_code = ?", array("DelivCool"));
    }

    function addExpressParam(&$objFormParam)
    {
        $objFormParam->addParam("営業店・郵便局留め", "plg_expresslink_center_stop", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("営業店コード・郵便局名", "plg_expresslink_center_code", 6, '', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("局留め郵便番号", "plg_expresslink_center_zip", 7, 'n', array("SPTAB_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("伝票番号", "plg_expresslink_slip_number", MTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
    }

    function getConfig($name)
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        return $objQuery->get("value", "plg_expresslink_config", "name = ?", array($name));
    }

}
