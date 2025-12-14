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
 * B2CSVインストール用
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plg_ExpressLink_install_B2
{

    function installCSV()
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $in_transaction = $objQuery->inTransaction();
        if (!$in_transaction) {
            $objQuery->begin();
        }

        //クロネコB2用
        $arrKuronekoCSV = array();
        $arrKuronekoCSV[] = array("col_mysql" => "(lpad(dtb_order.order_id,10,0) || '_' || lpad(shipping_id,7,0)) as Y1",
            "col_pgsql" => "(ltrim(to_char(dtb_order.order_id,'0000000000')) || '_' || ltrim(to_char(shipping_id,'0000000'))) as Y1",
            "disp_name" => "お客様管理番号"
        );
        $arrKuronekoCSV[] = array("col" => "NULL as Y2", "disp_name" => "送り状種別", "record_col" => "yamato_send_type");
        $arrKuronekoCSV[] = array("col" => "NULL as Y3", "disp_name" => "クール区分", "record_col" => "yamato_cool_type");
        $arrKuronekoCSV[] = array("col" => "plg_expresslink_slip_number as Y4", "disp_name" => "伝票番号");
        $arrKuronekoCSV[] = array("col_mysql" => "date_format(now(),'%Y/%m/%d') as Y5",
            "col_pgsql" => "to_char(now(),'yyyy/mm/dd') as Y5",
            "disp_name" => "出荷予定日"
        );
        $arrKuronekoCSV[] = array("col_mysql" => "date_format(shipping_date,'%Y/%m/%d') as Y6",
            "col_pgsql" => "to_char(shipping_date,'yyyy/mm/dd') as Y6",
            "disp_name" => "お届け予定（指定）日"
        );
        $arrKuronekoCSV[] = array("col" => "(case when time_id = 1 then '0812' when time_id = 2 then '1416' when time_id = 3 then '1618' when time_id = 4 then '1820' when time_id = 5 then '1921' else '' end) as Y7", "disp_name" => "配達時間帯", "record_col" => "yamato_shipping_time");
        $arrKuronekoCSV[] = array("col" => "NULL as Y8", "disp_name" => "お届け先コード");
        $arrKuronekoCSV[] = array("col" => "shipping_tel01 || '-' || shipping_tel02 || '-' || shipping_tel03 as Y9", "disp_name" => "お届け先電話番号");
        $arrKuronekoCSV[] = array("col" => "NULL as Y10", "disp_name" => "お届け先電話番号枝番");
        $arrKuronekoCSV[] = array("col" => "shipping_zip01|| shipping_zip02 as Y11", "disp_name" => "お届け先郵便番号");
        $arrKuronekoCSV[] = array("col" => "(SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 as Y12", "disp_name" => "お届け先住所");
        $arrKuronekoCSV[] = array("col" => "shipping_addr02 as Y13", "disp_name" => "お届け先住所（アパートマンション名）");
        if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
            $arrKuronekoCSV[] = array("col" => "shipping_company_name as Y14", "disp_name" => "お届け先会社・部門名１");
        } else {
            $arrKuronekoCSV[] = array("col" => "NULL as Y14", "disp_name" => "お届け先会社・部門名１");
        }
        $arrKuronekoCSV[] = array("col" => "NULL as Y15", "disp_name" => "お届け先会社・部門名２");
        $arrKuronekoCSV[] = array("col" => "shipping_name01 || shipping_name02 as Y16", "disp_name" => "お届け先名");
        $arrKuronekoCSV[] = array("col" => "shipping_kana01 || shipping_kana02 as yamato_shipping_kana", "disp_name" => "お届け先名略称カナ");
        $arrKuronekoCSV[] = array("col" => "NULL as Y18", "disp_name" => "敬称", "record_col" => "yamato_compellation");
        $arrKuronekoCSV[] = array("col" => "NULL as Y19", "disp_name" => "ご依頼主コード");
        $arrKuronekoCSV[] = array("col" => "order_tel01 || order_tel02 || order_tel03 as Y20", "disp_name" => "ご依頼主電話番号", "record_col" => "yamato_order_tel");
        $arrKuronekoCSV[] = array("col" => "NULL as Y21", "disp_name" => "ご依頼主電話番号枝番");
        $arrKuronekoCSV[] = array("col" => "order_zip01 || order_zip02 as Y22", "disp_name" => "ご依頼主郵便番号", "record_col" => "yamato_order_zip");
        $arrKuronekoCSV[] = array("col" => "((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01)  as Y23", "disp_name" => "ご依頼主住所", "record_col" => "yamato_order_addr01");
        $arrKuronekoCSV[] = array("col" => "order_addr02 as Y24", "disp_name" => "ご依頼主住所（アパートマンション名）", "record_col" => "yamato_order_addr02");
        $arrKuronekoCSV[] = array("col" => "order_name01 || order_name02 as Y25", "disp_name" => "ご依頼主名", "record_col" => "yamato_order_name");
        $arrKuronekoCSV[] = array("col" => "order_kana01 || order_kana02 as yamato_order_kana", "disp_name" => "ご依頼主略称カナ", "record_col" => "yamato_order_kana");
        $arrKuronekoCSV[] = array("col" => "NULL as Y27", "disp_name" => "品名コード１");
        $arrKuronekoCSV[] = array("col" => "(select product_name from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1)  as Y28", "disp_name" => "品名１", "record_col" => "yamato_productname1");
        $arrKuronekoCSV[] = array("col" => "NULL as Y29", "disp_name" => "品名コード２");
        $arrKuronekoCSV[] = array("col" => "NULL as Y30", "disp_name" => "品名２", "record_col" => "yamato_productname2");
        $arrKuronekoCSV[] = array("col" => "NULL as Y31", "disp_name" => "荷扱い１", "record_col" => "yamato_handling1");
        $arrKuronekoCSV[] = array("col" => "NULL as Y32", "disp_name" => "荷扱い２", "record_col" => "yamato_handling2");
        $arrKuronekoCSV[] = array("col" => "NULL as Y33", "disp_name" => "記事", "record_col" => "yamato_message");
        $arrKuronekoCSV[] = array("col" => "NULL as Y34", "disp_name" => "コレクト代金引換額（税込）", "record_col" => "yamato_cod_payment");
        $arrKuronekoCSV[] = array("col" => "NULL as Y35", "disp_name" => "コレクト内消費税額等", "record_col" => "yamato_cod_tax");
        $arrKuronekoCSV[] = array("col" => "plg_expresslink_center_stop as Y36", "disp_name" => "営業所止置き");
        $arrKuronekoCSV[] = array("col" => "plg_expresslink_center_code as Y37", "disp_name" => "営業所コード");
        $arrKuronekoCSV[] = array("col" => "NULL as Y38", "disp_name" => "発行枚数", "record_col" => "yamato_publish_num");
        $arrKuronekoCSV[] = array("col" => "NULL as Y39", "disp_name" => "個数口枠の印字", "record_col" => "yamato_print_flg");
        $arrKuronekoCSV[] = array("col" => "NULL as Y40", "disp_name" => "ご請求先顧客コード", "record_col" => "yamato_owner_code");
        $arrKuronekoCSV[] = array("col" => "NULL as Y41", "disp_name" => "ご請求先分類コード", "record_col" => "yamato_class_code");
        $arrKuronekoCSV[] = array("col" => "NULL as Y42", "disp_name" => "運賃管理番号", "record_col" => "yamato_cost_code");
        $arrKuronekoCSV[] = array("col" => "NULL as Y43", "disp_name" => "注文時カード払いデータ登録");
        $arrKuronekoCSV[] = array("col" => "NULL as Y44", "disp_name" => "注文時カード払い加盟店番号");
        $arrKuronekoCSV[] = array("col" => "NULL as Y45", "disp_name" => "注文時カード払い申込受付番号１");
        $arrKuronekoCSV[] = array("col" => "NULL as Y46", "disp_name" => "注文時カード払い申込受付番号２");
        $arrKuronekoCSV[] = array("col" => "NULL as Y47", "disp_name" => "注文時カード払い申込受付番号３");
        $arrKuronekoCSV[] = array("col" => "NULL as Y48", "disp_name" => "お届け予定ｅメール利用区分");
        $arrKuronekoCSV[] = array("col" => "NULL as Y49", "disp_name" => "お届け予定ｅメールe-mailアドレス");
        $arrKuronekoCSV[] = array("col" => "NULL as Y50", "disp_name" => "入力機種");
        $arrKuronekoCSV[] = array("col" => "NULL as Y51", "disp_name" => "お届け予定eメールメッセージ");
        $arrKuronekoCSV[] = array("col" => "NULL as Y52", "disp_name" => "お届け完了ｅメール利用区分");
        $arrKuronekoCSV[] = array("col" => "NULL as Y53", "disp_name" => "お届け完了ｅメールe-mailアドレス");
        $arrKuronekoCSV[] = array("col" => "NULL as Y54", "disp_name" => "お届け完了eメールメッセージ");
        $arrKuronekoCSV[] = array("col" => "NULL as Y55", "disp_name" => "クロネコ収納代行利用区分");
        $arrKuronekoCSV[] = array("col" => "NULL as Y56", "disp_name" => "収納代行決済ＱＲコード印刷");
        $arrKuronekoCSV[] = array("col" => "NULL as Y57", "disp_name" => "収納代行請求金額(税込)");
        $arrKuronekoCSV[] = array("col" => "NULL as Y58", "disp_name" => "収納代行内消費税額等");
        $arrKuronekoCSV[] = array("col" => "NULL as Y59", "disp_name" => "収納代行請求先郵便番号");
        $arrKuronekoCSV[] = array("col" => "NULL as Y60", "disp_name" => "収納代行請求先住所");
        $arrKuronekoCSV[] = array("col" => "NULL as Y61", "disp_name" => "収納代行請求先住所（アパートマンション名）");
        $arrKuronekoCSV[] = array("col" => "NULL as Y62", "disp_name" => "収納代行請求先会社・部門名１");
        $arrKuronekoCSV[] = array("col" => "NULL as Y63", "disp_name" => "収納代行請求先会社・部門名２");
        $arrKuronekoCSV[] = array("col" => "NULL as Y64", "disp_name" => "収納代行請求先名(漢字)");
        $arrKuronekoCSV[] = array("col" => "NULL as Y65", "disp_name" => "収納代行請求先名(カナ)");
        $arrKuronekoCSV[] = array("col" => "NULL as Y66", "disp_name" => "収納代行問合せ先名(漢字)");
        $arrKuronekoCSV[] = array("col" => "NULL as Y67", "disp_name" => "収納代行問合せ先郵便番号");
        $arrKuronekoCSV[] = array("col" => "NULL as Y68", "disp_name" => "収納代行問合せ先住所");
        $arrKuronekoCSV[] = array("col" => "NULL as Y69", "disp_name" => "収納代行問合せ先住所（アパートマンション名）");
        $arrKuronekoCSV[] = array("col" => "NULL as Y70", "disp_name" => "収納代行問合せ先電話番号");
        $arrKuronekoCSV[] = array("col" => "NULL as Y71", "disp_name" => "収納代行管理番号");
        $arrKuronekoCSV[] = array("col" => "NULL as Y72", "disp_name" => "収納代行品名");
        $arrKuronekoCSV[] = array("col" => "NULL as Y73", "disp_name" => "収納代行備考");

        $i = 1;
        foreach ($arrKuronekoCSV as $item) {
            $max = $objQuery->max('no', 'dtb_csv') + 1;
            $next = $objQuery->nextVal('dtb_csv_no');
            if ($max > $next) {
                $no = $max;
            } else {
                $no = $next;
            }
            $sqlval_csv['no'] = $no;
            $sqlval_csv['csv_id'] = 11;
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
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_zip_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_name_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_kana_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_addr01_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_addr02_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_tel_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_cod_payment_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_cod_tax_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_productname1_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_productname2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_send_type_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_cool_type_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_compellation_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_owner_code_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_class_code_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_publish_num_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_print_flg_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_cost_code_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_handling1_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_handling2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_shipping_time_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_message_no int");
    }

    function installaddCSV()
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $in_transaction = $objQuery->inTransaction();
        if (!$in_transaction) {
            $objQuery->begin();
        }

        $arrKuronekoCSV = array();
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備０１");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備０２");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備０３");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備０４");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備０５");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備０６");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備０７");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備０８");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備０９");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備１０");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備１１");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備１２");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "予備１３");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "投函予定メール利用区分");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "投函予定メールe-mailアドレス");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "投函予定メールメッセージ");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "投函完了メール(受人宛て)利用区分");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "投函完了メール(受人)e-mailアドレス");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "投函完了メール(受人)メッセージ");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "投函完了メール(出人宛て)利用区分");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "投函完了メール(出人)e-mailアドレス");
        $arrKuronekoCSV[] = array("col" => "NULL", "disp_name" => "投函完了メール(出人)メッセージ");


        $i = 74;
        foreach ($arrKuronekoCSV as $item) {
            $max = $objQuery->max('no', 'dtb_csv') + 1;
            $next = $objQuery->nextVal('dtb_csv_no');
            if ($max > $next) {
                $no = $max;
            } else {
                $no = $next;
            }
            $sqlval_csv['no'] = $no;
            $sqlval_csv['csv_id'] = 11;
            if (isset($item['col'])) {
                $sqlval_csv['col'] = $item['col'] . " as Y" . $i;
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

}
