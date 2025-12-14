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
class plg_ExpressLink_install_yupri4
{

    function installCSV()
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $in_transaction = $objQuery->inTransaction();
        if (!$in_transaction) {
            $objQuery->begin();
        }

        //ゆうパックプリント
        $arrYuCSV = array();
        $arrYuCSV[] = array("col" => "NULL as U1", "disp_name" => "レコード番号");
        $arrYuCSV[] = array("col" => "NULL as U2", "disp_name" => "ユーザーコード");
        $arrYuCSV[] = array("col" => "NULL as U3", "disp_name" => "料金計算区分");
        $arrYuCSV[] = array("col" => "NULL as U4", "disp_name" => "料金計算フラグ");
        $arrYuCSV[] = array("col" => "NULL as U5", "disp_name" => "料金計算エラーフラグ");
        $arrYuCSV[] = array("col" => "NULL as U6", "disp_name" => "お届け先郵便番号エラー");
        $arrYuCSV[] = array("col" => "NULL as U7", "disp_name" => "お届け先顧客コード");
        $arrYuCSV[] = array("col" => "shipping_zip01|| shipping_zip02 as U8", "disp_name" => "お届け先郵便番号");
        $arrYuCSV[] = array("col" => "substring((SELECT name FROM mtb_pref WHERE mtb_pref.id = dtb_shipping.shipping_pref) || shipping_addr01 || shipping_addr02 from 1 for 120) as U9", "disp_name" => "お届け先住所");
        $arrYuCSV[] = array("col" => "NULL as U10", "disp_name" => "お届け先都道府県コード");
        $arrYuCSV[] = array("col" => "NULL as U11", "disp_name" => "お届け先市区町村コード");
        $arrYuCSV[] = array("col" => "NULL as U12", "disp_name" => "お届け先カスタマーバーコード");
        $arrYuCSV[] = array("col" => "shipping_name01 || shipping_name02 as U13", "disp_name" => "お届け先氏名");
        $arrYuCSV[] = array("col" => "shipping_kana01 || shipping_kana02 as U14", "disp_name" => "お届け先カナ名称");
        $arrYuCSV[] = array("col" => "NULL as U15", "disp_name" => "お届け先敬称", "record_col" => "yu_compellation");
        $arrYuCSV[] = array("col" => "shipping_tel01 || '-' || shipping_tel02 || '-' || shipping_tel03 as U16", "disp_name" => "お届け先電話番号");
        $arrYuCSV[] = array("col" => "NULL as U17", "disp_name" => "お届け先メールアドレス");
        $arrYuCSV[] = array("col" => "NULL as U18", "disp_name" => "お届け先会員番号");
        $arrYuCSV[] = array("col" => "NULL as U19", "disp_name" => "ご依頼主郵便番号エラー");
        $arrYuCSV[] = array("col" => "NULL as U20", "disp_name" => "ご依頼主顧客コード");
        $arrYuCSV[] = array("col" => "order_zip01|| order_zip02 as U21", "disp_name" => "ご依頼主郵便番号", "record_col" => "yu_order_zip");
        $arrYuCSV[] = array("col" => "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 56) as U22", "disp_name" => "ご依頼主住所", "record_col" => "yu_order_addr");
        $arrYuCSV[] = array("col" => "NULL as U23", "disp_name" => "ご依頼主カスタマーバーコード");
        $arrYuCSV[] = array("col" => "order_name01 || order_name02 as U24", "disp_name" => "ご依頼主氏名", "record_col" => "yu_order_name");
        $arrYuCSV[] = array("col" => "order_kana01 || order_kana02 as U25", "disp_name" => "ご依頼主カナ名称", "record_col" => "yu_order_kana");
        $arrYuCSV[] = array("col" => "NULL as U26", "disp_name" => "ご依頼主敬称", "record_col" => "yu_compellation2");
        $arrYuCSV[] = array("col" => "order_tel01 || '-' || order_tel02 || '-' || order_tel03 as U27", "disp_name" => "ご依頼主電話番号", "record_col" => "yu_order_tel");
        $arrYuCSV[] = array("col" => "NULL as U28", "disp_name" => "ご依頼主メール利用フラグ");
        $arrYuCSV[] = array("col" => "NULL as U29", "disp_name" => "ご依頼主メールアドレス");
        $arrYuCSV[] = array("col" => "NULL as U30", "disp_name" => "ご依頼主会員番号");
        $arrYuCSV[] = array("col" => "NULL as U31", "disp_name" => "お届け先／ご依頼主同一フラグ", "record_col" => "yu_order_duplicate_flg");
        $arrYuCSV[] = array("col" => "NULL as U32", "disp_name" => "ご依頼主／ユーザー同一フラグ");
        $arrYuCSV[] = array("col" => "('0') as U33", "disp_name" => "郵便種別");
        $arrYuCSV[] = array("col" => "NULL as U34", "disp_name" => "送り状コード");
        $arrYuCSV[] = array("col" => "NULL as U35", "disp_name" => "お届け通知ハガキ使用フラグ");
        $arrYuCSV[] = array("col" => "NULL as U36", "disp_name" => "お届け通知メール使用フラグ");
        $arrYuCSV[] = array("col" => "(select product_id from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1) as U37", "disp_name" => "商品番号");
        $arrYuCSV[] = array("col" => "(select product_name from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1) as U38", "disp_name" => "商品名称", "record_col" => "yu_productname");
        $arrYuCSV[] = array("col" => "(select price from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1) as U39", "disp_name" => "商品金額");

        $arrYuCSV[] = array("col" => "NULL as U40", "disp_name" => "こわれもの");
        $arrYuCSV[] = array("col" => "NULL as U41", "disp_name" => "なまもの");
        $arrYuCSV[] = array("col" => "NULL as U42", "disp_name" => "ビン類");
        $arrYuCSV[] = array("col" => "NULL as U43", "disp_name" => "逆さま厳禁");
        $arrYuCSV[] = array("col" => "NULL as U44", "disp_name" => "不在留め置き期間");
        $arrYuCSV[] = array("col" => "('60') as U45", "disp_name" => "サイズ", "record_col" => "yu_size");
        $arrYuCSV[] = array("col" => "NULL as U46", "disp_name" => "商品重量");
        $arrYuCSV[] = array("col" => "NULL as U47", "disp_name" => "閾値重量");
        $arrYuCSV[] = array("col" => "NULL as U48", "disp_name" => "支払方法区分");
        $arrYuCSV[] = array("col" => "NULL as U49", "disp_name" => "適用特別料金種別");
        $arrYuCSV[] = array("col" => "NULL as U50", "disp_name" => "料金体系");
        $arrYuCSV[] = array("col" => "NULL as U51", "disp_name" => "料金計算用サイズまたは重量");
        $arrYuCSV[] = array("col" => "NULL as U52", "disp_name" => "郵便番号エラー");
        $arrYuCSV[] = array("col" => "NULL as U53", "disp_name" => "差出／集荷局郵便番号");
        $arrYuCSV[] = array("col" => "NULL as U54", "disp_name" => "差出／集荷局都道府県コード");
        $arrYuCSV[] = array("col" => "NULL as U55", "disp_name" => "差出／集荷局市区町村コード");
        $arrYuCSV[] = array("col" => "NULL as U56", "disp_name" => "地帯番号");
        $arrYuCSV[] = array("col" => "(CASE WHEN shipping_date IS NOT NULL THEN '3' ELSE '0' END) as U57", "disp_name" => "速達・配達日指定種別");
        $arrYuCSV[] = array("col_mysql" => "date_format(shipping_date,'%Y%m%d') as U58",
            "col_pgsql" => "to_char(shipping_date,'YYYYMMDD') as U58",
            "disp_name" => "配達指定日／希望日"
        );
        $arrYuCSV[] = array("col" => "NULL as U59", "disp_name" => "配達指定日曜日種別");
        $arrYuCSV[] = array("col" => "(case when time_id = 1 then '0' when time_id = 2 then '1' when time_id = 3 then '2' when time_id = 4 then '3' when time_id = 5 then '4' else '8' end) as U60", "disp_name" => "配達希望時間", "record_col" => "yu_shipping_time");
        $arrYuCSV[] = array("col" => "NULL as U61", "disp_name" => "書留／セキュリティ種別");
        $arrYuCSV[] = array("col" => "NULL as U62", "disp_name" => "保冷種別", "record_col" => "yu_cool_type");
        $arrYuCSV[] = array("col" => "NULL as U63", "disp_name" => "元／着払い種別");
        $arrYuCSV[] = array("col" => "NULL as U64", "disp_name" => "差出方法");
        $arrYuCSV[] = array("col" => "NULL as U65", "disp_name" => "割引区分");
        $arrYuCSV[] = array("col" => "NULL as U66", "disp_name" => "書留／セキュリティ損害要償額");
        $arrYuCSV[] = array("col" => "NULL as U67", "disp_name" => "基本料金");
        $arrYuCSV[] = array("col" => "NULL as U68", "disp_name" => "速達・配達日指定料金");
        $arrYuCSV[] = array("col" => "NULL as U69", "disp_name" => "保冷料金");
        $arrYuCSV[] = array("col" => "discount as U70", "disp_name" => "割引料金");
        $arrYuCSV[] = array("col" => "deliv_fee as U71", "disp_name" => "運賃等");
        $arrYuCSV[] = array("col" => "NULL as U72", "disp_name" => "書留／セキュリティ料金");
        $arrYuCSV[] = array("col" => "NULL as U73", "disp_name" => "代引引換手数料");
        $arrYuCSV[] = array("col" => "NULL as U74", "disp_name" => "その他料金");
        $arrYuCSV[] = array("col" => "NULL as U75", "disp_name" => "領収金額");
        $arrYuCSV[] = array("col" => "NULL as U76", "disp_name" => "代引利用区分");
        $arrYuCSV[] = array("col" => "NULL as U77", "disp_name" => "消費税課税負担者フラグ");
        $arrYuCSV[] = array("col" => "NULL as U78", "disp_name" => "消費税計算区分");
        $arrYuCSV[] = array("col" => "NULL as U79", "disp_name" => "交付種別");
        $arrYuCSV[] = array("col" => "NULL as U80", "disp_name" => "代引種別", "record_col" => "yu_payment_method");
        $arrYuCSV[] = array("col" => "NULL as U81", "disp_name" => "代引送金方法");
        $arrYuCSV[] = array("col" => "NULL as U82", "disp_name" => "代引金額", "record_col" => "yu_cod_payment");
        $arrYuCSV[] = array("col" => "NULL as U83", "disp_name" => "代引消費税金額", "record_col" => "yu_cod_tax");
        $arrYuCSV[] = array("col" => "NULL as U84", "disp_name" => "代引課税対象額");
        $arrYuCSV[] = array("col" => "NULL as U85", "disp_name" => "代引印紙税額");
        $arrYuCSV[] = array("col" => "NULL as U86", "disp_name" => "代引送金手数料");
        $arrYuCSV[] = array("col" => "NULL as U87", "disp_name" => "代引送金金額");
        $arrYuCSV[] = array("col" => "NULL as U88", "disp_name" => "加入者名");
        $arrYuCSV[] = array("col" => "NULL as U89", "disp_name" => "振替口座１");
        $arrYuCSV[] = array("col" => "NULL as U90", "disp_name" => "振替口座２");
        $arrYuCSV[] = array("col" => "NULL as U91", "disp_name" => "振替口座３");
        $arrYuCSV[] = array("col" => "NULL as U92", "disp_name" => "総合口座１");
        $arrYuCSV[] = array("col" => "NULL as U93", "disp_name" => "総合口座２");
        $arrYuCSV[] = array("col" => "NULL as U94", "disp_name" => "総合口座３");
        $arrYuCSV[] = array("col" => "NULL as U95", "disp_name" => "データ通知サービス利用区分");
        $arrYuCSV[] = array("col" => "NULL as U96", "disp_name" => "コマーシャルデータ");
        $arrYuCSV[] = array("col" => "dtb_order.order_id as U97", "disp_name" => "受注番号");
        $arrYuCSV[] = array("col" => "NULL as U98", "disp_name" => "代引まとめ利用区分");
        $arrYuCSV[] = array("col" => "NULL as U99", "disp_name" => "代引まとめバーコード");
        $arrYuCSV[] = array("col" => "NULL as U100", "disp_name" => "代引まとめ清算代引金額");
        $arrYuCSV[] = array("col" => "NULL as U101", "disp_name" => "代引まとめ清算代引消費税金額");
        $arrYuCSV[] = array("col" => "NULL as U102", "disp_name" => "代引まとめ代引課税対象額");
        $arrYuCSV[] = array("col" => "NULL as U103", "disp_name" => "代引まとめ代引印紙税額");
        $arrYuCSV[] = array("col" => "NULL as U104", "disp_name" => "代引まとめ代引送金手数料");
        $arrYuCSV[] = array("col" => "NULL as U105", "disp_name" => "代引まとめ代引送金金額");
        $arrYuCSV[] = array("col" => "NULL as U106", "disp_name" => "代引まとめ差出データ作成済フラグ");
        $arrYuCSV[] = array("col" => "NULL as U107", "disp_name" => "代引まとめ清算データ書き込み日付");
        $arrYuCSV[] = array("col" => "NULL as U108", "disp_name" => "代引まとめ代金入金日");
        $arrYuCSV[] = array("col" => "NULL as U109", "disp_name" => "代引まとめ計理日");
        $arrYuCSV[] = array("col" => "NULL as U110", "disp_name" => "代引まとめ決済手段コード");
        $arrYuCSV[] = array("col" => "NULL as U111", "disp_name" => "配達ステータス集約コード");
        $arrYuCSV[] = array("col" => "NULL as U112", "disp_name" => "配達ステータス明細コード");
        $arrYuCSV[] = array("col_mysql" => "(lpad(dtb_order.order_id,10,0) || '_' || lpad(shipping_id,7,0)) as U113",
            "col_pgsql" => "(ltrim(to_char(dtb_order.order_id,'0000000000')) || '_' || ltrim(to_char(shipping_id,'0000000'))) as U113",
            "disp_name" => "フリー項目１"
        );
        $arrYuCSV[] = array("col" => "NULL as U114", "disp_name" => "フリー項目２");
        $arrYuCSV[] = array("col" => "NULL as U115", "disp_name" => "フリー項目３");
        $arrYuCSV[] = array("col" => "NULL as U116", "disp_name" => "フリー項目４");
        $arrYuCSV[] = array("col" => "NULL as U117", "disp_name" => "フリー項目５");
        $arrYuCSV[] = array("col" => "NULL as U118", "disp_name" => "日付 出荷予定日");
        $arrYuCSV[] = array("col" => "NULL as U119", "disp_name" => "日付 出荷日");
        $arrYuCSV[] = array("col" => "NULL as U120", "disp_name" => "日付 出荷予定データ作成日");
        $arrYuCSV[] = array("col" => "NULL as U121", "disp_name" => "日付 大口FD出力日付");
        $arrYuCSV[] = array("col" => "NULL as U122", "disp_name" => "料金印刷指示フラグ");
        $arrYuCSV[] = array("col" => "NULL as U123", "disp_name" => "大口FD出力フラグ");
        $arrYuCSV[] = array("col" => "NULL as U124", "disp_name" => "お届け先メール作成済フラグ");
        $arrYuCSV[] = array("col" => "NULL as U125", "disp_name" => "ご依頼主メール作成済フラグ");
        $arrYuCSV[] = array("col" => "NULL as U126", "disp_name" => "テストIDフラグ");
        $arrYuCSV[] = array("col" => "plg_expresslink_slip_number as U127", "disp_name" => "お問い合わせ番号");
        $arrYuCSV[] = array("col" => "NULL as U128", "disp_name" => "データ種別");
        $arrYuCSV[] = array("col" => "NULL as U129", "disp_name" => "出荷予定データ作成日時");
        $arrYuCSV[] = array("col" => "NULL as U130", "disp_name" => "送り状印刷日時");
        $arrYuCSV[] = array("col" => "NULL as U131", "disp_name" => "下積み厳禁");
        $arrYuCSV[] = array("col" => "NULL as U132", "disp_name" => "仕分けコード");

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
            $sqlval_csv['csv_id'] = 13;
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
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_compellation_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_compellation2_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_shipping_time_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_payment_method_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_cod_payment_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_cod_tax_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_size_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_tel_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_zip_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_addr_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_name_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_kana_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_duplicate_flg_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_productname_no int");
        $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_cool_type_no int");
    }

}
