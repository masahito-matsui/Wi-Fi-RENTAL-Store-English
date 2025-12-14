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
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plugin_update
{

    /**
     * アップデート
     * updateはアップデート時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function update($arrPlugin)
    {
        $version = floor(str_replace('.', '', $arrPlugin['plugin_version']));
        $plugin_dir_path = PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . '/';
        SC_Utils_Ex::copyDirectory(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR, $plugin_dir_path);

        require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/plg_ExpressLink_Utils.php";

        $sqlval_plugin = array();
        $sqlval_plugin['plugin_version'] = "1.7.1";
        $sqlval_plugin['update_date'] = 'CURRENT_TIMESTAMP';

        $objQuery = & SC_Query_Ex::getSingletonInstance();

        // 設定項目の追加
        $objQuery->begin();

        if ($version <= 101) {
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_tel_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_zip_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_name_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_kana_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_addr01_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_order_addr02_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_tel_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_zip_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_name01_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_name02_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_addr01_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_order_addr02_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_tel_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_zip_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_addr_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_name_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_kana_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_order_duplicate_flg_no int");

            //B2
            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主電話番号", 11));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yamato_order_tel_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主郵便番号", 11));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yamato_order_zip_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主住所", 11));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yamato_order_addr01_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主住所（アパートマンション名）", 11));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yamato_order_addr02_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主名", 11));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yamato_order_name_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主略称カナ", 11));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yamato_order_kana_no" => $no), "id = 1");

            //e飛電II
            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主電話番号", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_order_tel_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主郵便番号", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_order_zip_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主住所１", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_order_addr01_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主住所２", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_order_addr02_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主名称１", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_order_name01_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主名称２", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_order_name02_no" => $no), "id = 1");

            //ゆうパックv4
            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主電話番号", 13));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yu_order_tel_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主郵便番号", 13));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yu_order_zip_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主住所", 13));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yu_order_addr_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主氏名", 13));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yu_order_name_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("ご依頼主カナ名称", 13));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yu_order_kana_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("お届け先／ご依頼主同一フラグ", 13));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yu_order_duplicate_flg_no" => $no), "id = 1");
        }

        if ($version <= 103) {
            $objQuery->insert("plg_expresslink_config", array("name" => "use_b2", "value" => "1"));
            $objQuery->insert("plg_expresslink_config", array("name" => "use_ehiden2", "value" => "1"));
            $objQuery->insert("plg_expresslink_config", array("name" => "use_yupack4", "value" => "1"));
        }

        if ($version <= 104) {
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal1_no int");
            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("指定シール１", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_seal1_no" => $no), "id = 1");
        }

        if ($version <= 105) {
            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("お届け先名略称カナ", 11));
            if ($no > 0)
                $objQuery->update("dtb_csv", array("col" => "shipping_kana01 || shipping_kana02 as yamato_shipping_kana"), "no = ?", array($no));
        }

        if ($version <= 106) {
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_productname1_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_productname2_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_productname1_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_productname2_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_productname3_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_productname4_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_productname5_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_productname_no int");
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal2_no int");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("品名１", 11));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yamato_productname1_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("品名２", 11));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yamato_productname2_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("品名１", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_productname1_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("品名２", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_productname2_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("品名３", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_productname3_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("品名４", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_productname4_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("品名５", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_productname5_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("商品名称", 13));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yu_productname_no" => $no), "id = 1");

            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("指定シール２", 12));
            if ($no > 0) {
                $objQuery->update("plg_expresslink_config_no", array("sagawa_seal2_no" => $no), "id = 1");
                $objQuery->update("dtb_csv", array("col" => "NULL as S37"), "no = ? AND csv_id = ?", array($no, 12));
            }

            $objQuery->update("dtb_csv", array("col" => "(CASE WHEN plg_expresslink_center_stop = 1 THEN '004' ELSE NULL END) as S38"), "disp_name = ? AND csv_id = ?", array("指定シール３", 12));

            require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_EhidenIIMail.php";
            plg_ExpressLink_install_EhidenIIMail::updateConfigTable();
            plg_ExpressLink_install_EhidenIIMail::installCSV();

            require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_EhidenPro.php";
            plg_ExpressLink_install_EhidenPro::updateConfigTable();
            plg_ExpressLink_install_EhidenPro::installCSV();
        }


        if ($version <= 110) {
            if (DB_TYPE == "mysql") {
                $update_val = array("col" => "(lpad(dtb_order.order_id,10,0) || '_' || lpad(shipping_id,7,0)) as Y1");
            } else {
                $update_val = array("col" => "(ltrim(to_char(dtb_order.order_id,'0000000000')) || '_' || ltrim(to_char(shipping_id,'0000000'))) as Y1");
            }
            $objQuery->update("dtb_csv", $update_val, "disp_name = ? AND csv_id = ?", array("お客様管理番号", 11));

            if (DB_TYPE == "mysql") {
                $update_val = array("col" => "(lpad(dtb_order.order_id,9,0) || '_' || lpad(shipping_id,6,0)) as Y1");
            } else {
                $update_val = array("col" => "(ltrim(to_char(dtb_order.order_id,'000000000')) || '_' || ltrim(to_char(shipping_id,'000000'))) as Y1");
            }
            $objQuery->update("dtb_csv", $update_val, "disp_name = ? AND csv_id = ?", array("お客様管理ナンバー", 12));

            if (DB_TYPE == "mysql") {
                $update_val = array("col" => "(lpad(dtb_order.order_id,9,0) || '_' || lpad(shipping_id,6,0)) as Y1");
            } else {
                $update_val = array("col" => "(ltrim(to_char(dtb_order.order_id,'000000000')) || '_' || ltrim(to_char(shipping_id,'000000'))) as Y1");
            }
            $objQuery->update("dtb_csv", $update_val, "disp_name = ? AND csv_id = ?", array("顧客管理番号", 15));

            if (DB_TYPE == "mysql") {
                $update_val = array("col" => "(lpad(dtb_order.order_id,10,0) || '_' || lpad(shipping_id,7,0)) as Y1");
            } else {
                $update_val = array("col" => "(ltrim(to_char(dtb_order.order_id,'0000000000')) || '_' || ltrim(to_char(shipping_id,'0000000'))) as Y1");
            }
            $objQuery->update("dtb_csv", $update_val, "disp_name = ? AND csv_id = ?", array("フリー項目１", 13));
        }


        if ($version <= 123) {
            require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_ebusiness.php";
            plg_ExpressLink_install_ebusiness::updateConfigTable();
            plg_ExpressLink_install_ebusiness::installCSV();

            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yamato_message_no int");
            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("記事", 11));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yamato_message_no" => $no), "id = 1");

            $objQuery->update("dtb_plugin", array("free_field1" => "101"), "plugin_code = ?", array($arrPlugin['plugin_code']));

            if ($arrPlugin['enable'] == 1) {
                copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_b2.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_b2.php");
                copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_eh.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_eh.php");
                copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_eh_pro.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_eh_pro.php");
                copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_yu.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_yu.php");
                copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_ebis.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_ebis.php");
            }
        }

        if ($version <= 130) {
            require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_yupriR.php";

            plg_ExpressLink_install_yupriR::updateConfigTable();
            plg_ExpressLink_install_yupriR::installCSV();
            $objQuery->query("ALTER TABLE dtb_shipping ADD COLUMN plg_expresslink_center_zip text DEFAULT NULL");
            if ($arrPlugin['enable'] == 1) {
                copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_yur.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_yur.php");
            }
        }

        if ($version <= 141) {
            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yu_cool_type_no int");
            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("保冷種別", 13));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("yu_cool_type_no" => $no), "id = 1");

            if ($version > 130) {
                $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_cool_type_no int");
                $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("保冷種別", 17));
                if ($no > 0)
                    $objQuery->update("plg_expresslink_config_no", array("yur_cool_type_no" => $no), "id = 1");
            }

            $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal3_no int");
            $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("指定シール３", 12));
            if ($no > 0)
                $objQuery->update("plg_expresslink_config_no", array("sagawa_seal3_no" => $no), "id = 1");

            if ($version > 106) {
                $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal3_pro_no int");
                $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("シールコード３", 15));
                if ($no > 0)
                    $objQuery->update("plg_expresslink_config_no", array("sagawa_seal3_pro_no" => $no), "id = 1");

                $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN sagawa_seal4_pro_no int");
                $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("シールコード４", 15));
                if ($no > 0)
                    $objQuery->update("plg_expresslink_config_no", array("sagawa_seal4_pro_no" => $no), "id = 1");
            }

            $objQuery->insert("plg_expresslink_config", array("name" => "yamato_center_search_url", "value" => "http://sneko2.kuronekoyamato.co.jp/sneko2/contents/jsp/sn2/SNTPJS0010.jsp"));
            $objQuery->insert("plg_expresslink_config", array("name" => "sagawa_center_search_url", "value" => "http://www.sagawa-exp.co.jp/search/branch_search/"));
            $objQuery->insert("plg_expresslink_config", array("name" => "post_search_url", "value" => "http://www.post.japanpost.jp/office_search/"));
        }

        if ($version <= 150) {
            copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_b2.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_b2.php");
        }

        if ($version <= 152) {
            if ($version > 130) {
                $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_article_no int");
                $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("記事名１", 17));
                if ($no > 0)
                    $objQuery->update("plg_expresslink_config_no", array("yur_article_no" => $no), "id = 1");
            }
        }

        if ($version <= 153) {
            require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_BizLogi.php";
            plg_ExpressLink_install_BizLogi::updateConfigTable();
            plg_ExpressLink_install_BizLogi::installCSV();

            require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_KangarooMagic2.php";
            plg_ExpressLink_install_KangarooMagic2::updateConfigTable();
            plg_ExpressLink_install_KangarooMagic2::installCSV();
            if ($arrPlugin['enable'] == 1) {
                copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_bizlogi_depo.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_bizlogi_depo.php");
                copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_km2.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_km2.php");
            }

            if ($version > 130) {
                $objQuery->query("ALTER TABLE plg_expresslink_config_no ADD COLUMN yur_time_type_no int");
                $no = $objQuery->get("no", "dtb_csv", "disp_name = ? AND csv_id = ?", array("配達時間帯指定郵便種別", 17));
                if ($no > 0)
                    $objQuery->update("plg_expresslink_config_no", array("yur_time_type_no" => $no), "id = 1");
            }
        }

        if ($version <= 162) {
            require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_B2.php";
            plg_ExpressLink_install_B2::installaddCSV();
        }

        if ($version <= 168) {
            $objQuery->update("dtb_csv", array("col" => "(case when time_id = 1 then '0812' when time_id = 2 then '1416' when time_id = 3 then '1618' when time_id = 4 then '1820' when time_id = 5 then '1921' else '' end) as Y7"),"disp_name = ? AND csv_id = ?", array("配達時間帯", 11));
        }

        $objQuery->update('dtb_plugin', $sqlval_plugin, "plugin_code = ?", array($arrPlugin['plugin_code']));
        $objQuery->commit();
    }

}

?>
