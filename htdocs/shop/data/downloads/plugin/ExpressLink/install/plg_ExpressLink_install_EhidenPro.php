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
 * e飛伝ProCSVインストール用
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plg_ExpressLink_install_EhidenPro
{

    function installCSV()
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $in_transaction = $objQuery->inTransaction();
        if (!$in_transaction) {
            $objQuery->begin();
        }

        //e飛伝pro用
        $arrSagawaCSV = array();
        $arrSagawaCSV[] = array("col" => "NULL as SP1", "disp_name" => "ご依頼主コード", "record_col" => "sagawa_owner_code_pro");
        $arrSagawaCSV[] = array("col" => "NULL as SP2", "disp_name" => "部署ご担当者コード", "record_col" => "sagawa_dept_code");
        $arrSagawaCSV[] = array("col" => "NULL as SP3", "disp_name" => "部署ご担当者名", "record_col" => "sagawa_dept_pro");
        $arrSagawaCSV[] = array("col" => "(SELECT tel01 || tel02 || tel03 FROM dtb_baseinfo) as SP4", "disp_name" => "ご依頼主電話");
        $arrSagawaCSV[] = array("col" => "NULL as SP5", "disp_name" => "お届け先コード");
        $arrSagawaCSV[] = array("col" => "shipping_zip01|| shipping_zip02 as SP6", "disp_name" => "お届け先郵便番号");
        $arrSagawaCSV[] = array("col" => "substring(shipping_name01 || shipping_name02 from 1 for 16) as SP7", "disp_name" => "お届け先名１");
        $arrSagawaCSV[] = array("col" => "substring(shipping_name01 || shipping_name02 from 17 for 16) as SP8", "disp_name" => "お届け先名２");
        $arrSagawaCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 1 for 16) as SP9", "disp_name" => "お届け先住所１");
        $arrSagawaCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 17 for 16) as SP10", "disp_name" => "お届け先住所２");
        $arrSagawaCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 33 for 16) as SP11", "disp_name" => "お届け先住所３");
        $arrSagawaCSV[] = array("col" => "shipping_tel01 || '-' || shipping_tel02 || '-' || shipping_tel03 as SP12", "disp_name" => "お届け先電話");
        $arrSagawaCSV[] = array("col" => "NULL as SP13", "disp_name" => "ご不在連絡先");
        $arrSagawaCSV[] = array("col" => "order_email as SP14", "disp_name" => "メールアドレス");
        $arrSagawaCSV[] = array("col" => "NULL as SP15", "disp_name" => "代行ご依頼主コード", "record_col" => "sagawa_agent_code");
        $arrSagawaCSV[] = array("col" => "order_zip01 || order_zip02 as SP16", "disp_name" => "代行ご依頼主郵便番号", "record_col" => "sagawa_order_zip_pro");
        $arrSagawaCSV[] = array("col" => "order_name01 as SP17", "disp_name" => "代行ご依頼主名１", "record_col" => "sagawa_order_name01_pro");
        $arrSagawaCSV[] = array("col" => "order_name02 as SP18", "disp_name" => "代行ご依頼主名２", "record_col" => "sagawa_order_name02_pro");
        $arrSagawaCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 16) as SP19", "disp_name" => "代行ご依頼主住所１", "record_col" => "sagawa_order_addr01_pro");
        $arrSagawaCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 17 for 16) as SP20", "disp_name" => "代行ご依頼主住所２", "record_col" => "sagawa_order_addr02_pro");
        $arrSagawaCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 33 for 16) as SP21", "disp_name" => "代行ご依頼主住所３", "record_col" => "sagawa_order_addr03_pro");
        $arrSagawaCSV[] = array("col" => "order_tel01 || order_tel02 || order_tel03 as SP22", "disp_name" => "代行ご依頼主電話", "record_col" => "sagawa_order_tel_pro");
        $arrSagawaCSV[] = array("col_mysql" => "date_format(commit_date,'%Y%m%d') as SP23",
            "col_pgsql" => "to_char(commit_date,'YYYYMMDD') as SP23",
            "disp_name" => "出荷日");
        $arrSagawaCSV[] = array("col" => "NULL as SP24", "disp_name" => "発送日");
        $arrSagawaCSV[] = array("col_mysql" => "date_format(shipping_date,'%Y%m%d') as SP25",
            "col_pgsql" => "to_char(shipping_date,'YYYYMMDD') as SP25",
            "disp_name" => "配達指定日"
        );
        $arrSagawaCSV[] = array("col" => "NULL as SP26", "disp_name" => "セット数");
        $arrSagawaCSV[] = array("col" => "NULL as SP27", "disp_name" => "個数");
        $arrSagawaCSV[] = array("col" => "NULL as SP28", "disp_name" => "元着区分");
        $arrSagawaCSV[] = array("col" => "NULL as SP29", "disp_name" => "保険金額");
        $arrSagawaCSV[] = array("col" => "NULL as SP30", "disp_name" => "決済種別", "record_col" => "sagawa_payment_method_pro");
        $arrSagawaCSV[] = array("col" => "NULL as SP31", "disp_name" => "代引金額", "record_col" => "sagawa_cod_payment_pro");
        $arrSagawaCSV[] = array("col" => "NULL as SP32", "disp_name" => "代引税込金額", "record_col" => "sagawa_cod_tax_pro");
        $arrSagawaCSV[] = array("col" => "0 as SP33", "disp_name" => "消費税区分");
        $arrSagawaCSV[] = array("col" => "plg_expresslink_slip_number as SP34", "disp_name" => "問い合せNo.");
        $arrSagawaCSV[] = array("col" => "NULL as SP35", "disp_name" => "旧問い合せNo.");
        $arrSagawaCSV[] = array("col_mysql" => "(lpad(dtb_order.order_id,9,0) || '-' || lpad(shipping_id,6,0)) as SP36",
            "col_pgsql" => "(ltrim(to_char(dtb_order.order_id,'000000000')) || '-' || ltrim(to_char(shipping_id,'000000'))) as SP36",
            "disp_name" => "顧客管理番号"
        );
        $arrSagawaCSV[] = array("col" => "plg_expresslink_center_stop as SP37", "disp_name" => "営止め区分");
        $arrSagawaCSV[] = array("col" => "plg_expresslink_center_code as SP38", "disp_name" => "営止清算店コード");
        $arrSagawaCSV[] = array("col" => "NULL as SP39", "disp_name" => "クール指定区分", "record_col" => "sagawa_product_type_pro");
        $arrSagawaCSV[] = array("col" => "NULL as SP40", "disp_name" => "便種コード", "record_col" => "sagawa_speed_type_pro");
        $arrSagawaCSV[] = array("col" => "(case when time_id = 1 then '01' when time_id = 2 then '12' when time_id = 3 then '14' when time_id = 4 then '16' when time_id = 5 then '04' else '' end) as SP41", "disp_name" => "配達指定時間帯", "record_col" => "sagawa_shipping_time_pro");
        $arrSagawaCSV[] = array("col" => "NULL as SP42", "disp_name" => "配達時間指定");
        $arrSagawaCSV[] = array("col" => "(CASE WHEN time_id > 0 AND time_id < 6 THEN '007' WHEN shipping_date IS NOT NULL THEN '005' ELSE NULL END) as SP43", "disp_name" => "シールコード１", "record_col" => "sagawa_seal1_pro");
        $arrSagawaCSV[] = array("col" => "NULL as SP44", "disp_name" => "シールコード２", "record_col" => "sagawa_seal2_pro");
        $arrSagawaCSV[] = array("col" => "(CASE WHEN plg_expresslink_center_stop = 1 THEN '004' ELSE NULL END) as SP45", "disp_name" => "シールコード３", "record_col" => "sagawa_seal3_pro");
        $arrSagawaCSV[] = array("col" => "NULL as SP46", "disp_name" => "シールコード４", "record_col" => "sagawa_seal4_pro");
        $arrSagawaCSV[] = array("col" => "NULL as SP47", "disp_name" => "出荷区分", "record_col" => "sagawa_send_type");
        $arrSagawaCSV[] = array("col" => "NULL as SP48", "disp_name" => "出荷用印字区分");
        $arrSagawaCSV[] = array("col" => "NULL as SP49", "disp_name" => "保険金額印字区分");
        $arrSagawaCSV[] = array("col" => "NULL as SP50", "disp_name" => "集約解除指定区分");
        $arrSagawaCSV[] = array("col" => "NULL as SP51", "disp_name" => "編集０１");
        $arrSagawaCSV[] = array("col" => "NULL as SP52", "disp_name" => "編集０２");
        $arrSagawaCSV[] = array("col" => "NULL as SP53", "disp_name" => "編集０３");
        $arrSagawaCSV[] = array("col" => "NULL as SP54", "disp_name" => "編集０４");
        $arrSagawaCSV[] = array("col" => "NULL as SP55", "disp_name" => "編集０５");
        $arrSagawaCSV[] = array("col" => "NULL as SP56", "disp_name" => "編集０６");
        $arrSagawaCSV[] = array("col" => "NULL as SP57", "disp_name" => "編集０７");
        $arrSagawaCSV[] = array("col" => "NULL as SP58", "disp_name" => "編集０８");
        $arrSagawaCSV[] = array("col" => "NULL as SP59", "disp_name" => "編集０９");
        $arrSagawaCSV[] = array("col" => "NULL as SP60", "disp_name" => "編集１０");
        $arrSagawaCSV[] = array("col" => "NULL as SP61", "disp_name" => "重量１個数");
        $arrSagawaCSV[] = array("col" => "NULL as SP62", "disp_name" => "重量２個数");
        $arrSagawaCSV[] = array("col" => "NULL as SP63", "disp_name" => "重量３個数");
        $arrSagawaCSV[] = array("col" => "NULL as SP64", "disp_name" => "重量４個数");
        $arrSagawaCSV[] = array("col" => "NULL as SP65", "disp_name" => "重量５個数");
        $arrSagawaCSV[] = array("col" => "NULL as SP66", "disp_name" => "重量６個数");
        $arrSagawaCSV[] = array("col" => "NULL as SP67", "disp_name" => "重量７（値）");
        $arrSagawaCSV[] = array("col" => "NULL as SP68", "disp_name" => "重量７単位");
        $arrSagawaCSV[] = array("col" => "NULL as SP69", "disp_name" => "重量７個数");
        $arrSagawaCSV[] = array("col" => "NULL as SP70", "disp_name" => "重量８（値）");
        $arrSagawaCSV[] = array("col" => "NULL as SP71", "disp_name" => "重量８単位");
        $arrSagawaCSV[] = array("col" => "NULL as SP72", "disp_name" => "重量８個数");

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
            $sqlval_csv['csv_id'] = 15;
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
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_owner_code_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_dept_code_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_dept_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_payment_method_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_cod_payment_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_cod_tax_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_product_type_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_speed_type_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_shipping_time_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_send_type_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_agent_code_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_tel_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_zip_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_name01_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_name02_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_addr01_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_addr02_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_addr03_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal1_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal2_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal3_pro_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal4_pro_no int");
    }

}
