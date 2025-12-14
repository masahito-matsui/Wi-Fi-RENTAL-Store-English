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
 * ゆうパックプリントRインストール用
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plg_ExpressLink_install_yupriR
{

    function installCSV()
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $in_transaction = $objQuery->inTransaction();
        if (!$in_transaction) {
            $objQuery->begin();
        }

        //ゆうパックプリントR
        $arrYuCSV = array();
        $arrYuCSV[] = array("col_mysql" => "(lpad(dtb_order.order_id,8,0) || '_' || lpad(shipping_id,6,0))",
            "col_pgsql" => "(ltrim(to_char(dtb_order.order_id,'00000000')) || '_' || ltrim(to_char(shipping_id,'000000')))",
            "disp_name" => "お客様側管理番号"
        );
        $arrYuCSV[] = array("col" => "plg_expresslink_slip_number", "disp_name" => "お問い合わせ番号");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "代表お問い合わせ番号");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "発送予定日");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "発送予定時間区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "出荷期限日");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "到着期限日");
        $arrYuCSV[] = array("col" => "('0')", "disp_name" => "郵便種別", "record_col" => "yur_deliv_type");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "保冷種別", "record_col" => "yur_cool_type");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "元／着払／代引", "record_col" => "yur_payment_method");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "書留／セキュリティ種別");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "配達時間帯指定郵便種別", "record_col" => "yur_time_type");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "送り状種別", "record_col" => "yur_send_type");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "お届け先 コード");
        $arrYuCSV[] = array("col" => "shipping_zip01|| shipping_zip02", "disp_name" => "お届け先 郵便番号");
        $arrYuCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 from 1 for 50)", "disp_name" => "お届け先 住所１");
        $arrYuCSV[] = array("col" => "substring(shipping_addr02 from 1 for 50)", "disp_name" => "お届け先 住所２");
        $arrYuCSV[] = array("col" => "substring(shipping_addr02 from 51 for 50)", "disp_name" => "お届け先 住所３");
        if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
            $arrYuCSV[] = array("col" => "(case when CHARACTER_LENGTH(shipping_company_name) > 0 then shipping_company_name else (shipping_name01 || shipping_name02) end)", "disp_name" => "お届け先 名称１");
            $arrYuCSV[] = array("col" => "(case when CHARACTER_LENGTH(shipping_company_name) > 0 then (shipping_name01 || shipping_name02) else NULL end)", "disp_name" => "お届け先 名称２");
        } else {
            $arrYuCSV[] = array("col" => "shipping_name01 || shipping_name02", "disp_name" => "お届け先 名称１");
            $arrYuCSV[] = array("col" => "NULL", "disp_name" => "お届け先 名称２");
        }
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "お届け先 敬称区分", "record_col" => "yur_compellation");
        $arrYuCSV[] = array("col" => "shipping_tel01 || '-' || shipping_tel02 || '-' || shipping_tel03", "disp_name" => "お届け先 電話番号");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "お届け先 メールアドレス１");
        $arrYuCSV[] = array("col" => "(case when plg_expresslink_center_stop = 1 then '1' else '0' end)", "disp_name" => "お届け先 局留め区分");
        $arrYuCSV[] = array("col" => "plg_expresslink_center_code", "disp_name" => "お届け先 局留め郵便局名");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "お届け先 局留めメール使用区分");
        $arrYuCSV[] = array("col" => "plg_expresslink_center_zip", "disp_name" => "お届け先 局留め郵便番号");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "お届け先 配達予告メール使用区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "お届け先 再配達予告メール使用区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ご依頼主 コード");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ご依頼主 集荷先と同一区分");
        $arrYuCSV[] = array("col" => "order_zip01|| order_zip02", "disp_name" => "ご依頼主 郵便番号", "record_col" => "yur_order_zip");
        $arrYuCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 from 1 for 50)", "disp_name" => "ご依頼主 住所１", "record_col" => "yur_order_addr1");
        $arrYuCSV[] = array("col" => "substring(order_addr02 from 1 for 50)", "disp_name" => "ご依頼主 住所２", "record_col" => "yur_order_addr2");
        $arrYuCSV[] = array("col" => "substring(order_addr02 from 51 for 50)", "disp_name" => "ご依頼主 住所３", "record_col" => "yur_order_addr3");
        if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
            $arrYuCSV[] = array("col" => "order_company_name", "disp_name" => "ご依頼主 名称１", "record_col" => "yur_order_name1");
            $arrYuCSV[] = array("col" => "order_name01 || order_name02", "disp_name" => "ご依頼主 名称２", "record_col" => "yur_order_name2");
        } else {
            $arrYuCSV[] = array("col" => "order_name01 || order_name02", "disp_name" => "ご依頼主 名称１", "record_col" => "yur_order_name1");
            $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ご依頼主 名称２", "record_col" => "yur_order_name2");
        }
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ご依頼主 敬称区分", "record_col" => "yur_compellation2");
        $arrYuCSV[] = array("col" => "order_tel01 || '-' || order_tel02 || '-' || order_tel03", "disp_name" => "ご依頼主 電話番号", "record_col" => "yur_order_tel");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ご依頼主 メールアドレス１");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ご依頼主 荷送人指図区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ご依頼主 お届け通知メール使用区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ご依頼主 お届け通知はがき使用区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 コード");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 連携可否区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 会社コード");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 依頼先店所名");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 郵便番号");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 住所１");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 住所２");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 住所３");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 名称１");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 名称２");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 敬称");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷先 電話番号");
        $arrYuCSV[] = array("col" => "dtb_order.order_id", "disp_name" => "受注番号");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "こわれもの区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "なまもの区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ビン類区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "逆さま厳禁区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "下積み厳禁区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品サイズ区分", "record_col" => "yur_size");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "重量（ｇ）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "25kg超重量物区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "損害要償額");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "速達種別");
        $arrYuCSV[] = array("col_mysql" => "date_format(shipping_date,'%Y%m%d')",
            "col_pgsql" => "to_char(shipping_date,'YYYYMMDD')",
            "disp_name" => "配達希望日"
        );
        $arrYuCSV[] = array("col" => "(case when time_id = 1 then '61' when time_id = 2 then '62' when time_id = 3 then '63' else '00' end)", "disp_name" => "配達希望時間帯区分", "record_col" => "yur_shipping_time");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "差出方法区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ゆうパック複数個割引");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "ゆうパック同一割引");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "セット商品コード");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "セット品名ラベル印字区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "複数個口数");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "記事名１", "record_col" => "yur_article");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "記事名２");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "フリー項目０１");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "フリー項目０２");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "フリー項目０３");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "フリー項目０４");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "フリー項目０５");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "フリー項目０６");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "フリー項目０７");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "フリー項目０８");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "フリー項目０９");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "フリー項目１０");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "空港利用区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "空港・局／支店名");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "航空会社名");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "利用便名");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "レジャー区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "プレー・搭乗日");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "プレー・搭乗時間");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "クラブ本数");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "復路集貸日");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "出荷先登録名");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷希望区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷日付");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "集荷時間帯区分");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "支店連携先選択用名称");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "代引金額", "record_col" => "yur_cod_payment");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "代引消費税金額", "record_col" => "yur_cod_tax");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "送り状発行年月日");
        $arrYuCSV[] = array("col" => "(select product_id from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1)", "disp_name" => "商品番号（明細）", "record_col" => "yur_product_id");
        $arrYuCSV[] = array("col" => "(select product_name from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1)", "disp_name" => "品名（明細）", "record_col" => "yur_productname");
        $arrYuCSV[] = array("col" => "(select quantity from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1)", "disp_name" => "個数（明細）", "record_col" => "yur_productquantity");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "重量（ｇ）（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "単価（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "金額（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品備考０１（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品備考０２（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品備考０３（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品備考０４（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品備考０５（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品備考０６（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品備考０７（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品備考０８（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品備考０９（明細）");
        $arrYuCSV[] = array("col" => "NULL", "disp_name" => "商品備考１０（明細）");


        $i = 1;
        foreach ($arrYuCSV as $item) {
            $max = $objQuery->max('no', 'dtb_csv') + 1;
            $next = $objQuery->nextVal('dtb_csv_no');
            if ($max > $next) {
                $no = $max;
            } else {
                $no = $next;
            }
            $sqlval_csv['no'] = $no;
            $sqlval_csv['csv_id'] = 17;
            if (isset($item['col'])) {
                $sqlval_csv['col'] = $item['col'] . " as YUR" . $i;
            } else {
                if (DB_TYPE == "mysql") {
                    $sqlval_csv['col'] = $item['col_mysql'] . " as YUR" . $i;
                } else {
                    $sqlval_csv['col'] = $item['col_pgsql'] . " as YUR" . $i;
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
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_payment_method_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_deliv_type_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_send_type_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_compellation_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_order_zip_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_order_addr1_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_order_addr2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_order_addr3_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_order_name1_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_order_name2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_compellation2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_order_tel_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_shipping_time_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_cod_payment_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_cod_tax_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_product_id_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_productname_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_productquantity_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_article_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_size_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_cool_type_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_time_type_no int");
    }

}
