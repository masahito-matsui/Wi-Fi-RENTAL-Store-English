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


require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/plg_ExpressLink_Utils.php";

class ExpressLink extends SC_Plugin_Base
{

    public function __construct(array $arrSelfInfo)
    {
        parent::__construct($arrSelfInfo);

        if (plg_ExpressLink_Utils::getConfig("use_b2") == 1) {
            define("plg_ExpressLink_Use_B2", 1);
        } else {
            define("plg_ExpressLink_Use_B2", 0);
        }
        if (plg_ExpressLink_Utils::getConfig("use_ehiden2") == 1) {
            define("plg_ExpressLink_Use_Ehiden2", 1);
        } else {
            define("plg_ExpressLink_Use_Ehiden2", 0);
        }
        if (plg_ExpressLink_Utils::getConfig("use_ehiden2mail") == 1) {
            define("plg_ExpressLink_Use_Ehiden2Mail", 1);
        } else {
            define("plg_ExpressLink_Use_Ehiden2Mail", 0);
        }
        if (plg_ExpressLink_Utils::getConfig("use_ehidenpro") == 1) {
            define("plg_ExpressLink_Use_EhidenPro", 1);
        } else {
            define("plg_ExpressLink_Use_EhidenPro", 0);
        }
        if (plg_ExpressLink_Utils::getConfig("use_yupack4") == 1) {
            define("plg_ExpressLink_Use_YuPack4", 1);
        } else {
            define("plg_ExpressLink_Use_YuPack4", 0);
        }
        if (plg_ExpressLink_Utils::getConfig("use_yupackr") == 1) {
            define("plg_ExpressLink_Use_YuPackR", 1);
        } else {
            define("plg_ExpressLink_Use_YuPackR", 0);
        }
        if (plg_ExpressLink_Utils::getConfig("use_ebusiness") == 1) {
            define("plg_ExpressLink_Use_Ebusiness", 1);
        } else {
            define("plg_ExpressLink_Use_Ebusiness", 0);
        }
        if (plg_ExpressLink_Utils::getConfig("use_bizlogidepo") == 1) {
            define("plg_ExpressLink_Use_BizLogiDEPO", 1);
        } else {
            define("plg_ExpressLink_Use_BizLogiDEPO", 0);
        }
        if (plg_ExpressLink_Utils::getConfig("use_km2") == 1) {
            define("plg_ExpressLink_Use_KangarooMagic2", 1);
        } else {
            define("plg_ExpressLink_Use_KangarooMagic2", 0);
        }

        if (plg_ExpressLink_Utils::getConfig("center_stop") == 1) {
            define("plg_ExpressLink_Center_Stop", 1);
        } else {
            define("plg_ExpressLink_Center_Stop", 0);
        }

        if (plg_ExpressLink_Utils::getConfig("csv_quote") == 1) {
            define("plg_ExpressLink_Quote_Flg", 1);
        } else {
            define("plg_ExpressLink_Quote_Flg", 0);
        }
    }

    /**
     * インストール
     * installはプラグインのインストール時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin plugin_infoを元にDBに登録されたプラグイン情報(dtb_plugin)
     * @return void
     */
    function install($arrPlugin)
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $objQuery->query("CREATE TABLE plg_expresslink_config_no (id int)");
        $objQuery->insert("plg_expresslink_config_no", array("id" => 1));

        $objQuery->query("CREATE TABLE plg_expresslink_config (name text, value text)");

        $objQuery->query("ALTER TABLE dtb_shipping ADD COLUMN plg_expresslink_slip_number text DEFAULT NULL");
        $objQuery->query("ALTER TABLE dtb_shipping ADD COLUMN plg_expresslink_center_stop int DEFAULT 0");
        $objQuery->query("ALTER TABLE dtb_shipping ADD COLUMN plg_expresslink_center_code text DEFAULT NULL");
        $objQuery->query("ALTER TABLE dtb_shipping ADD COLUMN plg_expresslink_center_zip text DEFAULT NULL");

        $objQuery->begin();

        require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_B2.php";
        plg_ExpressLink_install_B2::updateConfigTable();
        plg_ExpressLink_install_B2::installCSV();
        plg_ExpressLink_install_B2::installaddCSV();

        require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_EhidenII.php";
        plg_ExpressLink_install_EhidenII::updateConfigTable();
        plg_ExpressLink_install_EhidenII::installCSV();

        require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_EhidenIIMail.php";
        plg_ExpressLink_install_EhidenIIMail::updateConfigTable();
        plg_ExpressLink_install_EhidenIIMail::installCSV();

        require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_EhidenPro.php";
        plg_ExpressLink_install_EhidenPro::updateConfigTable();
        plg_ExpressLink_install_EhidenPro::installCSV();

        require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_ebusiness.php";
        plg_ExpressLink_install_ebusiness::updateConfigTable();
        plg_ExpressLink_install_ebusiness::installCSV();

        require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_yupri4.php";
        plg_ExpressLink_install_yupri4::updateConfigTable();
        plg_ExpressLink_install_yupri4::installCSV();

        require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_yupriR.php";
        plg_ExpressLink_install_yupriR::updateConfigTable();
        plg_ExpressLink_install_yupriR::installCSV();

        require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_BizLogi.php";
        plg_ExpressLink_install_BizLogi::updateConfigTable();
        plg_ExpressLink_install_BizLogi::installCSV();

        require_once PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/install/plg_ExpressLink_install_KangarooMagic2.php";
        plg_ExpressLink_install_KangarooMagic2::updateConfigTable();
        plg_ExpressLink_install_KangarooMagic2::installCSV();


        $objQuery->insert("plg_expresslink_config", array("name" => "yamato_center_search_url", "value" => "http://sneko2.kuronekoyamato.co.jp/sneko2/contents/jsp/sn2/SNTPJS0010.jsp"));
        $objQuery->insert("plg_expresslink_config", array("name" => "sagawa_center_search_url", "value" => "http://www.sagawa-exp.co.jp/search/branch_search/"));
        $objQuery->insert("plg_expresslink_config", array("name" => "post_search_url", "value" => "http://www.post.japanpost.jp/office_search/"));
        $objQuery->insert("plg_expresslink_config", array("name" => "seino_search_url", "value" => "http://www.seino.co.jp/seino/branch/"));

        $objQuery->commit();

        //メール関係
        if (copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/templates/default/mail_templates/plg_expresslink_shipping_mail.tpl", TEMPLATE_REALDIR . "mail_templates/plg_expresslink_shipping_mail.tpl") === false)
            ;

        if (copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/logo.png", PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/logo.png") === false)
            ;
    }

    /**
     * アンインストール
     * uninstallはアンインストール時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function uninstall($arrPlugin)
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $objQuery->delete('dtb_csv', 'csv_id = ?', array(11));
        $objQuery->delete('dtb_csv', 'csv_id = ?', array(12));
        $objQuery->delete('dtb_csv', 'csv_id = ?', array(13));
        $objQuery->delete('dtb_csv', 'csv_id = ?', array(14));
        $objQuery->delete('dtb_csv', 'csv_id = ?', array(15));
        $objQuery->delete('dtb_csv', 'csv_id = ?', array(16));
        $objQuery->delete('dtb_csv', 'csv_id = ?', array(17));
        $objQuery->delete('dtb_csv', 'csv_id = ?', array(18));
        $objQuery->delete('dtb_csv', 'csv_id = ?', array(19));

        $objQuery->query("ALTER TABLE dtb_shipping DROP COLUMN plg_expresslink_slip_number");
        $objQuery->query("ALTER TABLE dtb_shipping DROP COLUMN plg_expresslink_center_stop");
        $objQuery->query("ALTER TABLE dtb_shipping DROP COLUMN plg_expresslink_center_code");
        $objQuery->query("ALTER TABLE dtb_shipping DROP COLUMN plg_expresslink_center_zip");

        $objQuery->query("DROP TABLE plg_expresslink_config_no");
        $objQuery->query("DROP TABLE plg_expresslink_config");

        SC_Helper_FileManager_Ex::deleteFile(TEMPLATE_REALDIR . "mail_templates/plg_expresslink_shipping_mail.tpl");
    }

    /**
     * 稼働
     * enableはプラグインを有効にした際に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function enable($arrPlugin)
    {
        copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_b2.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_b2.php");
        copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_eh.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_eh.php");
        copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_eh_pro.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_eh_pro.php");
        copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_yu.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_yu.php");
        copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_yur.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_yur.php");
        copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_ebis.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_ebis.php");
        copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_bizlogi_depo.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_bizlogi_depo.php");
        copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/order/plg_expresslink_upload_csv_km2.php", HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_km2.php");
        $mode = fileperms(HTML_REALDIR . ADMIN_DIR . "order/index.php");
        if($mode != false){
            chmod(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_b2.php", $mode);
            chmod(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_eh.php", $mode);
            chmod(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_eh_pro.php", $mode);
            chmod(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_yu.php", $mode);
            chmod(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_yur.php", $mode);
            chmod(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_ebis.php", $mode);
            chmod(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_bizlogi_depo.php", $mode);
            chmod(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_km2.php", $mode);
        }

        $masterData = new SC_DB_MasterData_Ex();

        //マスターデータ処理
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $masterData = new SC_DB_MasterData_Ex();

        $rank = $objQuery->max('rank', 'mtb_mail_tpl_path') + 1;
        $id = $objQuery->max('id', 'mtb_mail_tpl_path') + 1;
        $objQuery->insert("mtb_mail_tpl_path", array("id" => $id, "name" => "mail_templates/plg_expresslink_shipping_mail.tpl", "rank" => $rank));
        $masterData->createCache('mtb_mail_tpl_path');

        $rank = $objQuery->max('rank', 'mtb_mail_template') + 1;
        $objQuery->insert("mtb_mail_template", array("id" => $id, "name" => "発送メール", "rank" => $rank));
        $masterData->createCache('mtb_mail_template');

        $sqlval = array();
        $sqlval['template_id'] = $id;
        $sqlval['subject'] = "発送完了致しました。";
        $sqlval['header'] = "発送が完了しましたのでお知らせいたします。";
        $sqlval['footer'] = "今後ともよろしくお願い致します。";
        $sqlval['creator_id'] = 0;
        $sqlval['create_date'] = "CURRENT_TIMESTAMP";
        $sqlval['update_date'] = "CURRENT_TIMESTAMP";
        $objQuery->insert("dtb_mailtemplate", $sqlval);

        $objQuery->update("dtb_plugin", array("free_field1" => $id), "plugin_code = ?", array($arrPlugin['plugin_code']));
    }

    /**
     * 停止
     * disableはプラグインを無効にした際に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function disable($arrPlugin)
    {
        SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv.php");
        SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_b2.php");
        SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_eh.php");
        SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_eh_pro.php");
        SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_yu.php");
        SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_yur.php");
        SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_ebis.php");
        SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_bizlogi_depo.php");
        SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . "order/plg_expresslink_upload_csv_km2.php");

        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $masterData = new SC_DB_MasterData_Ex();

        $mail_id = $objQuery->get("free_field1", "dtb_plugin", "plugin_code = ?", array($arrPlugin['plugin_code']));

        $objQuery->delete("mtb_mail_tpl_path", "id = ?", array($mail_id));
        $masterData->createCache('mtb_mail_tpl_path');

        $objQuery->delete("mtb_mail_template", "id = ?", array($mail_id));
        $masterData->createCache('mtb_mail_template');

        $objQuery->delete("dtb_mailtemplate", "template_id = ?", array($mail_id));
    }

    /**
     * 処理の介入箇所とコールバック関数を設定
     * registerはプラグインインスタンス生成時に実行されます
     *
     * @param SC_Helper_Plugin $objHelperPlugin
     */
    function register(SC_Helper_Plugin $objHelperPlugin)
    {
        if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
            $version = '213';
        } else {
            $version = '212';
        }
        require_once PLUGIN_UPLOAD_REALDIR . 'ExpressLink/class/' . $version . '/plg_ExpressLink_LC_Template_Ex.php';
        require_once PLUGIN_UPLOAD_REALDIR . 'ExpressLink/class/' . $version . '/plg_ExpressLink_LC_Page_Admin_Order_Ex.php';
        require_once PLUGIN_UPLOAD_REALDIR . 'ExpressLink/class/' . $version . '/plg_ExpressLink_LC_Page_Admin_Order_Edit_Ex.php';
        require_once PLUGIN_UPLOAD_REALDIR . 'ExpressLink/class/' . $version . '/plg_ExpressLink_LC_Page_Shopping_Payment_Ex.php';
        require_once PLUGIN_UPLOAD_REALDIR . 'ExpressLink/class/' . $version . '/plg_ExpressLink_LC_Page_Shopping_Confirm_Ex.php';
        require_once PLUGIN_UPLOAD_REALDIR . 'ExpressLink/class/' . $version . '/plg_ExpressLink_LC_Page_Mypage_History_Ex.php';

        $objHelperPlugin->addAction('LC_Page_Admin_Order_action_before', array('plg_ExpressLink_LC_Page_Admin_Order_Ex', 'before'), $this->arrSelfInfo['priority']);
        if (plg_ExpressLink_Utils::checkEnableOrderSortPlugin() != 1) {
            $objHelperPlugin->addAction('LC_Page_Admin_Order_action_after', array('plg_ExpressLink_LC_Page_Admin_Order_Ex', 'after'), $this->arrSelfInfo['priority']);
        }
        $objHelperPlugin->addAction('LC_Page_Admin_Order_Edit_action_before', array('plg_ExpressLink_LC_Page_Admin_Order_Edit_Ex', 'before'), $this->arrSelfInfo['priority']);
        if (plg_ExpressLink_Center_Stop == 1) {
            $objHelperPlugin->addAction('LC_Page_Shopping_Payment_action_before', array('plg_ExpressLink_LC_Page_Shopping_Payment_Ex', 'before'), $this->arrSelfInfo['priority']);
            $objHelperPlugin->addAction('LC_Page_Shopping_Payment_action_after', array('plg_ExpressLink_LC_Page_Shopping_Payment_Ex', 'after'), $this->arrSelfInfo['priority']);
            $objHelperPlugin->addAction('LC_Page_Shopping_Payment_action_confirm', array('plg_ExpressLink_LC_Page_Shopping_Payment_Ex', 'confirm'), $this->arrSelfInfo['priority']);
            $objHelperPlugin->addAction('LC_Page_Shopping_Confirm_action_after', array('plg_ExpressLink_LC_Page_Shopping_Confirm_Ex', 'after'), $this->arrSelfInfo['priority']);
        }
        $objHelperPlugin->addAction('LC_Page_Mypage_History_action_after', array('plg_ExpressLink_LC_Page_Mypage_History_Ex', 'after'), $this->arrSelfInfo['priority']);
        $objHelperPlugin->addAction('prefilterTransform', array('plg_ExpressLink_LC_Template_Ex', 'prefilterTransform'), $this->arrSelfInfo['priority']);
        $objHelperPlugin->addAction("loadClassFileChange", array($this, "loadClassFileChange"), $this->arrSelfInfo['priority']);
        $objHelperPlugin->addAction("SC_FormParam_construct", array($this, "addParam"), $this->arrSelfInfo['priority']);
    }

    function loadClassFileChange(&$classname, &$classpath)
    {
        if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
            $version = '213';
        } else {
            $version = '212';
        }
        if ($classname == 'SC_Helper_Mail_Ex') {
            $classpath = PLUGIN_UPLOAD_REALDIR . "ExpressLink/class/" . $version . "/plg_ExpressLink_SC_Helper_Mail_Ex.php";

            $classname = "plg_ExpressLink_SC_Helper_Mail_Ex";
        }
    }

    /**
     * SC_FormParamフック関数
     * @access public
     */
    function addParam($class_name, $param)
    {
        if (strpos($class_name, 'LC_Page_Admin_Order_Edit') !== false) {
            plg_ExpressLink_Utils::addExpressParam($param);
            $param->addParam('配送方法', 'search_deliv_id', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        }
    }

}

?>
