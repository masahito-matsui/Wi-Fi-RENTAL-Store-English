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
 * Biz-Logi DEPOインストール用
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plg_ExpressLink_install_BizLogi
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
        $arrCSV[] = array("col" => "NULL", "disp_name" => "お届け先コード");
        $arrCSV[] = array("col" => "shipping_zip01|| shipping_zip02", "disp_name" => "お届け先郵便番号");
        $arrCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 1 for 16)", "disp_name" => "お届け先住所１");
        $arrCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 17 for 16)", "disp_name" => "お届け先住所２");
        $arrCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 33 for 16)", "disp_name" => "お届け先住所３");
        $arrCSV[] = array("col" => "substring(shipping_name01 || shipping_name02 from 1 for 16) ", "disp_name" => "お届け先名１");
        $arrCSV[] = array("col" => "substring(shipping_name01 || shipping_name02 from 17 for 16)", "disp_name" => "お届け先名２");
        $arrCSV[] = array("col" => "shipping_tel01 || shipping_tel02 || shipping_tel03", "disp_name" => "お届け先電話");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "お届け先メールアドレス");
        $arrCSV[] = array("col" => "order_zip01 || order_zip02", "disp_name" => "代行ご依頼主郵便番号", "record_col" => "sagawa_order_zip_bizlogi");
        $arrCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 16)", "disp_name" => "代行ご依頼主住所１", "record_col" => "sagawa_order_addr01_bizlogi");
        $arrCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 17 for 16)", "disp_name" => "代行ご依頼主住所２", "record_col" => "sagawa_order_addr02_bizlogi");
        $arrCSV[] = array("col" => "order_name01", "disp_name" => "代行ご依頼主名１", "record_col" => "sagawa_order_name01_bizlogi");
        $arrCSV[] = array("col" => "order_name02", "disp_name" => "代行ご依頼主名２", "record_col" => "sagawa_order_name02_bizlogi");
        $arrCSV[] = array("col" => "order_tel01 || order_tel02 || order_tel03", "disp_name" => "代行ご依頼主電話", "record_col" => "sagawa_order_tel_bizlogi");
        $arrCSV[] = array("col" => "order_email", "disp_name" => "代行ご依頼主メールアドレス", "record_col" => "sagawa_order_email_bizlogi");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "佐川急便顧客コード", "record_col" => "sagawa_owner_code_bizlogi");
        $arrCSV[] = array("col" => "plg_expresslink_slip_number", "disp_name" => "問い合せNo.");
        $arrCSV[] = array("col_mysql" => "date_format(commit_date,'%Y%m%d')",
            "col_pgsql" => "to_char(commit_date,'YYYYMMDD')",
            "disp_name" => "発送日");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "個数");
        $arrCSV[] = array("col_mysql" => "(lpad(dtb_order.order_id,9,0) || '_' || lpad(shipping_id,6,0))",
            "col_pgsql" => "(ltrim(to_char(dtb_order.order_id,'000000000')) || '_' || ltrim(to_char(shipping_id,'000000')))",
            "disp_name" => "顧客管理番号"
        );
        $arrCSV[] = array("col" => "NULL", "disp_name" => "便種コード", "record_col" => "sagawa_send_type_bizlogi");
        $arrCSV[] = array("col_mysql" => "date_format(shipping_date,'%Y%m%d')",
            "col_pgsql" => "to_char(shipping_date,'YYYYMMDD')",
            "disp_name" => "配達指定日"
        );
        $arrCSV[] = array("col" => "(case when time_id = 1 then '01' when time_id = 2 then '12' when time_id = 3 then '14' when time_id = 4 then '16' when time_id = 5 then '04' else '00' end)", "disp_name" => "時間帯コード", "record_col" => "sagawa_shipping_time_bizlogi");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "代引金額", "record_col" => "sagawa_cod_payment_bizlogi");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "代引消費税", "record_col" => "sagawa_cod_tax_bizlogi");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "保険金額");
        $arrCSV[] = array("col" => "('01')", "disp_name" => "元着区分");
        $arrCSV[] = array("col" => "plg_expresslink_center_stop", "disp_name" => "営止め区分");
        $arrCSV[] = array("col" => "plg_expresslink_center_code", "disp_name" => "営止清算店コード");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "営止清算店ローカルコード");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄０１", "record_col" => "sagawa_article1_bizlogi");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄０２", "record_col" => "sagawa_article2_bizlogi");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄０３", "record_col" => "sagawa_article3_bizlogi");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄０４", "record_col" => "sagawa_article4_bizlogi");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄０５", "record_col" => "sagawa_article5_bizlogi");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄０６", "record_col" => "sagawa_article6_bizlogi");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄０７");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄０８");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄０９");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄１０");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄１１");
        $arrCSV[] = array("col" => "NULL", "disp_name" => "記事欄１２");



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
            $sqlval_csv['csv_id'] = 18;
            if (isset($item['col'])) {
                $sqlval_csv['col'] = $item['col'] . " as BizLogiDEPO" . $i;
            } else {
                if (DB_TYPE == "mysql") {
                    $sqlval_csv['col'] = $item['col_mysql'] . " as BizLogiDEPO" . $i;
                } else {
                    $sqlval_csv['col'] = $item['col_pgsql'] . " as BizLogiDEPO" . $i;
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
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_zip_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_addr01_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_addr02_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_name01_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_name02_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_tel_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_email_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_owner_code_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_send_type_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_shipping_time_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_cod_payment_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_cod_tax_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_article1_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_article2_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_article3_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_article4_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_article5_bizlogi_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_article6_bizlogi_no int");
    }

}
