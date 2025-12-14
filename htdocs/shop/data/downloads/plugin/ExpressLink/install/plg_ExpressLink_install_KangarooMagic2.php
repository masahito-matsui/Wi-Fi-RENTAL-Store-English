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
 * カンガルー・マジックIIインストール用
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plg_ExpressLink_install_KangarooMagic2
{

    function installCSV()
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $in_transaction = $objQuery->inTransaction();
        if (!$in_transaction) {
            $objQuery->begin();
        }

        //Biz-Logi DEPO
        $arrCSV = array();
        $arrCSV[] = array("col" => "NULL", "disp_name" => "荷送人コード", "record_col" => "km2_owner_code");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "西濃発店コード");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "出荷予定日");
        $arrCSV[] = array("col" => "plg_expresslink_slip_number", "disp_name" => "お問合せ番号");
        $arrCSV[] = array("col_mysql" => "(lpad(dtb_order.order_id,10,0) || '_' || lpad(shipping_id,8,0))",
            "col_pgsql" => "(ltrim(to_char(dtb_order.order_id,'0000000000')) || '_' || ltrim(to_char(shipping_id,'00000000')))",
            "disp_name" => "管理番号"
        );
        $arrCSV[] = array("col" => "('1')", "disp_name" => "元着区分");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "原票区分", "record_col" => "km2_send_type");
        $arrCSV[] = array("col" => "('1')", "disp_name" => "個数");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "重量区分");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "重量(K)");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "重量(才)");
        $arrCSV[] = array("col" => "order_name01 || order_name02", "disp_name" => "荷送人名称", "record_col" => "km2_order_name");
        $arrCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 20)", "disp_name" => "荷送人住所１", "record_col" => "km2_order_addr01");
        $arrCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 21 for 20)", "disp_name" => "荷送人住所２", "record_col" => "km2_order_addr02");
        $arrCSV[] = array("col" => "order_tel01 || order_tel02 || order_tel03", "disp_name" => "荷送人電話番号", "record_col" => "km2_order_tel");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "部署コード", "record_col" => "km2_dept_code");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "部署名", "record_col" => "km2_dept_name");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "重量契約区分");
        $arrCSV[] = array("col" => "shipping_zip01|| shipping_zip02", "disp_name" => "お届け先郵便番号");
        $arrCSV[] = array("col" => "substring(shipping_name01 || shipping_name02 from 1 for 30) ", "disp_name" => "お届け先名称１");
        $arrCSV[] = array("col" => "substring(shipping_name01 || shipping_name02 from 31 for 30)", "disp_name" => "お届け先名称２");
        $arrCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 1 for 30)", "disp_name" => "お届け先住所１");
        $arrCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 31 for 30)", "disp_name" => "お届け先住所２");
        $arrCSV[] = array("col" => "shipping_tel01 || shipping_tel02 || shipping_tel03", "disp_name" => "お届け先電話番号");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "お届け先コード");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "お届け先JIS市町村コード");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "着店コード付け区分");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "着地コード");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "着店コード");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "保険金額");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "輸送指示１");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "輸送指示２");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事１", "record_col" => "km2_article1");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事２", "record_col" => "km2_article2");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事３", "record_col" => "km2_article3");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事４", "record_col" => "km2_article4");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事５", "record_col" => "km2_article5");
        $arrCSV[] = array("col_mysql" => "(case when shipping_date IS NULL AND time_id IS NULL then '' else (case when shipping_date IS NOT NULL then date_format(shipping_date,'%m%d') else '0000' end) || (case when time_id = 1 then '1' when time_id = 2 then '2' else '0' end) end)",
            "col_pgsql" => "(case when shipping_date IS NULL AND time_id IS NULL then '' else (case when shipping_date IS NOT NULL then to_char(shipping_date,'MMDD') else '0000' end) || (case when time_id = 1 then '1' when time_id = 2 then '2' else '0' end) end)",
            "disp_name" => "輸送指示（配達指定日付）",
            "record_col" => "km2_shipping_datetime"
        );
        $arrCSV[] = array("col" => "(case when shipping_date IS NOT NULL OR time_id IS NOT NULL then '02' else '' end)", "disp_name" => "輸送指示コード１", "record_col" => "km2_operate_code1");
        $arrCSV[] = array("col" => "(case when plg_expresslink_center_stop = 1 then '01' else '' end)", "disp_name" => "輸送指示コード２", "record_col" => "km2_operate_code2");
        $arrCSV[] = array("col" => "(case when plg_expresslink_center_stop = 1 then plg_expresslink_center_code else '' end)", "disp_name" => "輸送指示（止め店所名）");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "予備");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "品代金", "record_col" => "km2_cod_payment");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "消費税等", "record_col" => "km2_cod_tax");


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
            $sqlval_csv['csv_id'] = 19;
            if (isset($item['col'])) {
                $sqlval_csv['col'] = $item['col'];
            } else {
                if (DB_TYPE == "mysql") {
                    $sqlval_csv['col'] = $item['col_mysql'];
                } else {
                    $sqlval_csv['col'] = $item['col_pgsql'];
                }
            }
            $sqlval_csv['col'] .= " as KM2" . $i;
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
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_owner_code_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_send_type_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_order_name_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_order_addr01_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_order_addr02_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_order_tel_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_dept_code_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_dept_name_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_article1_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_article2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_article3_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_article4_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_article5_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_shipping_datetime_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_operate_code1_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_operate_code2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_cod_payment_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN km2_cod_tax_no int");
    }

}
