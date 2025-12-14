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
 * e飛伝IICSVインストール用
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plg_ExpressLink_install_EhidenII
{

    function installCSV()
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $in_transaction = $objQuery->inTransaction();
        if (!$in_transaction) {
            $objQuery->begin();
        }

        //e飛伝II用
        $arrSagawaCSV = array();
        $arrSagawaCSV[] = array("col" => "NULL as S1", "disp_name" => "住所録コード");
        $arrSagawaCSV[] = array("col" => "shipping_tel01 || '-' || shipping_tel02 || '-' || shipping_tel03 as S2", "disp_name" => "お届け先電話番号");
        $arrSagawaCSV[] = array("col" => "shipping_zip01|| shipping_zip02 as S3", "disp_name" => "お届け先郵便番号");
        $arrSagawaCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 1 for 16) as S4", "disp_name" => "お届け先住所１");
        $arrSagawaCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 17 for 16) as S5", "disp_name" => "お届け先住所２");
        $arrSagawaCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 33 for 16) as S6", "disp_name" => "お届け先住所３");
        $arrSagawaCSV[] = array("col" => "substring(shipping_name01 || shipping_name02 from 1 for 16) as S7", "disp_name" => "お届け先名称１");
        $arrSagawaCSV[] = array("col" => "substring(shipping_name01 || shipping_name02 from 17 for 16) as S8", "disp_name" => "お届け先名称２");
        $arrSagawaCSV[] = array("col_mysql" => "(lpad(dtb_order.order_id,9,0) || '_' || lpad(shipping_id,6,0)) as S9",
            "col_pgsql" => "(ltrim(to_char(dtb_order.order_id,'000000000')) || '_' || ltrim(to_char(shipping_id,'000000'))) as S9",
            "disp_name" => "お客様管理ナンバー"
        );
        $arrSagawaCSV[] = array("col" => "NULL as S10", "disp_name" => "お客様コード", "record_col" => "sagawa_owner_code");
        $arrSagawaCSV[] = array("col" => "NULL as S11", "disp_name" => "部署・担当者", "record_col" => "sagawa_dept");
        $arrSagawaCSV[] = array("col" => "NULL as S12", "disp_name" => "荷送人電話番号", "record_col" => "sagawa_owner_tel");
        $arrSagawaCSV[] = array("col" => "order_tel01 || order_tel02 || order_tel03 as S13", "disp_name" => "ご依頼主電話番号", "record_col" => "sagawa_order_tel");
        $arrSagawaCSV[] = array("col" => "order_zip01 || order_zip02 as S14", "disp_name" => "ご依頼主郵便番号", "record_col" => "sagawa_order_zip");
        $arrSagawaCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 16) as S15", "disp_name" => "ご依頼主住所１", "record_col" => "sagawa_order_addr01");
        $arrSagawaCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 17 for 16) as S16", "disp_name" => "ご依頼主住所２", "record_col" => "sagawa_order_addr02");
        $arrSagawaCSV[] = array("col" => "order_name01 as S17", "disp_name" => "ご依頼主名称１", "record_col" => "sagawa_order_name01");
        $arrSagawaCSV[] = array("col" => "order_name02 as S18", "disp_name" => "ご依頼主名称２", "record_col" => "sagawa_order_name02");
        $arrSagawaCSV[] = array("col" => "NULL as S19", "disp_name" => "荷姿コード", "record_col" => "sagawa_packaging_code");
        $arrSagawaCSV[] = array("col" => "substring((select product_name from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1) from 1 for 16) as sagawa_productname1", "disp_name" => "品名１", "record_col" => "sagawa_productname1");
        $arrSagawaCSV[] = array("col" => "NULL as sagawa_productname2", "disp_name" => "品名２", "record_col" => "sagawa_productname2");
        $arrSagawaCSV[] = array("col" => "NULL as sagawa_productname3", "disp_name" => "品名３", "record_col" => "sagawa_productname3");
        $arrSagawaCSV[] = array("col" => "NULL as sagawa_productname4", "disp_name" => "品名４", "record_col" => "sagawa_productname4");
        $arrSagawaCSV[] = array("col" => "NULL as sagawa_productname5", "disp_name" => "品名５", "record_col" => "sagawa_productname5");
        $arrSagawaCSV[] = array("col" => "NULL as S25", "disp_name" => "出荷個数");
        $arrSagawaCSV[] = array("col" => "NULL as S26", "disp_name" => "便種(スピードで選択)", "record_col" => "sagawa_speed_type");
        $arrSagawaCSV[] = array("col" => "NULL as S27", "disp_name" => "便種(商品)", "record_col" => "sagawa_product_type");
        $arrSagawaCSV[] = array("col_mysql" => "date_format(shipping_date,'%Y%m%d') as S28",
            "col_pgsql" => "to_char(shipping_date,'YYYYMMDD') as S28",
            "disp_name" => "配達日"
        );
        $arrSagawaCSV[] = array("col" => "(case when time_id = 1 then '01' when time_id = 2 then '12' when time_id = 3 then '14' when time_id = 4 then '16' when time_id = 5 then '04' else '' end) as S29", "disp_name" => "配達指定時間帯", "record_col" => "sagawa_shipping_time");
        $arrSagawaCSV[] = array("col" => "NULL as S30", "disp_name" => "配達指定時間（時分）");
        $arrSagawaCSV[] = array("col" => "NULL as S31", "disp_name" => "代引金額", "record_col" => "sagawa_cod_payment");
        $arrSagawaCSV[] = array("col" => "NULL as S32", "disp_name" => "消費税", "record_col" => "sagawa_cod_tax");
        $arrSagawaCSV[] = array("col" => "NULL as S33", "disp_name" => "決済種別", "record_col" => "sagawa_payment_method");
        $arrSagawaCSV[] = array("col" => "NULL as S34", "disp_name" => "保険金額");
        $arrSagawaCSV[] = array("col" => "NULL as S35", "disp_name" => "保険金額印字");
        $arrSagawaCSV[] = array("col" => "(CASE WHEN time_id > 0 AND time_id < 6 THEN '007' WHEN shipping_date IS NOT NULL THEN '005' ELSE NULL END) as S36", "disp_name" => "指定シール１", "record_col" => "sagawa_seal1");
        $arrSagawaCSV[] = array("col" => "NULL as S37", "disp_name" => "指定シール２", "record_col" => "sagawa_seal2");
        $arrSagawaCSV[] = array("col" => "(CASE WHEN plg_expresslink_center_stop = 1 THEN '004' ELSE NULL END) as S38", "disp_name" => "指定シール３", "record_col" => "sagawa_seal3");
        $arrSagawaCSV[] = array("col" => "plg_expresslink_center_stop as S39", "disp_name" => "営業店止め");
        $arrSagawaCSV[] = array("col" => "NULL as S40", "disp_name" => "ＳＲＣ区分");
        $arrSagawaCSV[] = array("col" => "plg_expresslink_center_code as S41", "disp_name" => "営業店コード");
        $arrSagawaCSV[] = array("col" => "NULL as S42", "disp_name" => "元着区分");

        $i = 1;
        foreach ($arrSagawaCSV as $item) {
            $max = $objQuery->max('no', 'dtb_csv') + 1;
            $next = $objQuery->nextVal('dtb_csv_no');
            if ($max > $next) {
                $no = $max;
            } else {
                $no = $next;
            }
            $sqlval_csv['no'] = $no;
            $sqlval_csv['csv_id'] = 12;
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
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_dept_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_addr01_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_addr02_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_owner_tel_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_name01_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_name02_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_tel_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_zip_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_packaging_code_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_speed_type_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_product_type_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_owner_code_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_shipping_time_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_cod_payment_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_cod_tax_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_payment_method_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal1_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal3_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_productname1_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_productname2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_productname3_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_productname4_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_productname5_no int");
    }

}
