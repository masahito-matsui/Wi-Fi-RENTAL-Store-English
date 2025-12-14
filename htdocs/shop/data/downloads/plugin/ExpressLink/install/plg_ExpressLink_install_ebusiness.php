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
 * e発行businessインストール用
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plg_ExpressLink_install_ebusiness
{

    function installCSV()
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $in_transaction = $objQuery->inTransaction();
        if (!$in_transaction) {
            $objQuery->begin();
        }

        //e-business発行用
        $arrCSV = array();
        if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
            $arrCSV[] = array("col" => "shipping_company_name as EBIS1", "disp_name" => "お届け先名称１");
            $arrCSV[] = array("col" => "shipping_name01 || shipping_name02 as EBIS2", "disp_name" => "お届け先名称２");
        } else {
            $arrCSV[] = array("col" => "shipping_name01 || shipping_name02 as EBIS1", "disp_name" => "お届け先名称１");
            $arrCSV[] = array("col" => "NULL as EBIS2", "disp_name" => "お届け先名称２");
        }
        $arrCSV[] = array("col" => "shipping_zip01 || '-' || shipping_zip02 as EBIS3", "disp_name" => "お届け先郵便番号");
        $arrCSV[] = array("col" => "(SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 as EBIS4", "disp_name" => "お届け先住所１");
        $arrCSV[] = array("col" => "shipping_addr02 as EBIS5", "disp_name" => "お届け先住所２");
        $arrCSV[] = array("col" => "shipping_tel01 || '-' || shipping_tel02 || '-' || shipping_tel03 as EBIS6", "disp_name" => "お届け先電話番号");
        if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
            $arrCSV[] = array("col" => "order_company_name as EBIS7", "disp_name" => "荷送人名称１", "record_col" => "ebusiness_order_name01");
            $arrCSV[] = array("col" => "order_name01 || order_name02 as EBIS8", "disp_name" => "荷送人名称２", "record_col" => "ebusiness_order_name02");
        } else {
            $arrCSV[] = array("col" => "order_name01 || order_name02 as EBIS7", "disp_name" => "荷送人名称１", "record_col" => "ebusiness_order_name01");
            $arrCSV[] = array("col" => "NULL as EBIS8", "disp_name" => "荷送人名称２", "record_col" => "ebusiness_order_name02");
        }
        $arrCSV[] = array("col" => "order_zip01 || '-' || order_zip02 as EBIS9", "disp_name" => "荷送人郵便番号", "record_col" => "ebusiness_order_zip");
        $arrCSV[] = array("col" => "((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01)  as EBIS10", "disp_name" => "荷送人住所１", "record_col" => "ebusiness_order_addr01");
        $arrCSV[] = array("col" => "order_addr02 as EBIS11", "disp_name" => "荷送人住所２", "record_col" => "ebusiness_order_addr02");
        $arrCSV[] = array("col" => "order_tel01 || '-' || order_tel02 || '-' || order_tel03 as EBIS12", "disp_name" => "荷送人電話番号", "record_col" => "ebusiness_order_tel");
        $arrCSV[] = array("col_mysql" => "(lpad(dtb_order.order_id,8,0) || '_' || lpad(shipping_id,6,0)) as EBIS13",
            "col_pgsql" => "(ltrim(to_char(dtb_order.order_id,'00000000')) || '_' || ltrim(to_char(shipping_id,'000000'))) as EBIS13",
            "disp_name" => "お客様専用番号"
        );
        $arrCSV[] = array("col" => "(select product_name from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1)  as EBIS14", "disp_name" => "品名１", "record_col" => "ebusiness_productname1");
        $arrCSV[] = array("col" => "NULL as EBIS15", "disp_name" => "品名２", "record_col" => "ebusiness_productname2");
        $arrCSV[] = array("col" => "NULL as EBIS16", "disp_name" => "品名３", "record_col" => "ebusiness_productname3");
        $arrCSV[] = array("col" => "NULL as EBIS17", "disp_name" => "記事１", "record_col" => "ebusiness_message");
        $arrCSV[] = array("col_mysql" => "date_format(shipping_date,'%Y/%m/%d') as EBIS18",
            "col_pgsql" => "to_char(shipping_date,'yyyy/mm/dd') as EBIS18",
            "disp_name" => "お届け指定年月日"
        );
        $arrCSV[] = array("col" => "(SELECT deliv_time FROM dtb_delivtime INNER JOIN dtb_order ON dtb_delivtime.deliv_id = dtb_order.deliv_id WHERE dtb_shipping.order_id = dtb_order.order_id AND dtb_delivtime.time_id = dtb_shipping.time_id) as ebusiness_shipping_time", "disp_name" => "お届け指定時間帯", "record_col" => "ebusiness_shipping_time");
        $arrCSV[] = array("col" => "(SELECT name FROM dtb_deliv INNER JOIN dtb_order ON dtb_deliv.deliv_id = dtb_order.deliv_id WHERE dtb_shipping.order_id = dtb_order.order_id) as EBIS20", "disp_name" => "送り状種別");
        $arrCSV[] = array("col" => "NULL as EBIS21", "disp_name" => "クール区分", "record_col" => "ebusiness_cool_type");
        $arrCSV[] = array("col" => "NULL as EBIS22", "disp_name" => "サイズ区分", "record_col" => "ebusiness_size");
        $arrCSV[] = array("col" => "NULL as EBIS23", "disp_name" => "登録品代金", "record_col" => "ebusiness_cod_payment");
        $arrCSV[] = array("col" => "NULL as EBIS24", "disp_name" => "登録品代金消費税", "record_col" => "ebusiness_cod_tax");

        $i = 1;
        foreach ($arrCSV as $item) {
            $max = $objQuery->max('no', 'dtb_csv') + 1;
            $next = $objQuery->nextVal('dtb_csv_no');
            if ($max > $next) {
                $no = $max;
            } else {
                $no = $next;
            }
            $sqlval_csv['no'] = $no;
            $sqlval_csv['csv_id'] = 16;
            if (isset($item['col'])) {
                $sqlval_csv['col'] = $item['col'];
            } else {
                if (DB_TYPE == "mysql") {
                    $sqlval_csv['col'] = $item['col_mysql'];
                } else {
                    $sqlval_csv['col'] = $item['col_pgsql'];
                }
            }
            $sqlval_csv['disp_name'] = $item['disp_name'];
            $sqlval_csv['rank'] = $i;
            $sqlval_csv['rw_flg'] = 1;
            $sqlval_csv['status'] = 1;
            $sqlval_csv['create_date'] = "CURRENT_TIMESTAMP";
            $sqlval_csv['update_date'] = "CURRENT_TIMESTAMP";
            $sqlval_csv['mb_convert_kana_option'] = "";
            $sqlval_csv['size_const_type'] = "";
            $sqlval_csv['error_check_types'] = "";
            $objQuery->insert("dtb_csv", $sqlval_csv);
            if (isset($item['record_col'])) {
                $objQuery->update("plg_expresslink_config_no", array($item['record_col'] . "_no" => $sqlval_csv['no']), "id=1");
            }
            $i++;
        }

        if (!$in_transaction) {
            $objQuery->commit();
        }
    }

    function updateConfigTable()
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_order_name01_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_order_name02_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_order_zip_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_order_addr01_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_order_addr02_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_order_tel_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_productname1_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_productname2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_productname3_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_message_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_shipping_time_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_cool_type_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_size_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_cod_payment_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN ebusiness_cod_tax_no int");
    }

}
