<?php
/*
 * OrderSort
 * Copyright (C) 2012 Bratech CO.,LTD. All Rights Reserved.
 * http://www.bratech.co.jp/
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */
 
require_once PLUGIN_UPLOAD_REALDIR . "OrderSort/plg_OrderSort_Utils.php";

/**
 * プラグインのメインクラス
 *
 * @package OrderSort
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class OrderSort extends SC_Plugin_Base {

    /**
     * コンストラクタ
     */
    public function __construct(array $arrSelfInfo) {
        parent::__construct($arrSelfInfo);
    }
    
    /**
     * インストール
     * installはプラグインのインストール時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin plugin_infoを元にDBに登録されたプラグイン情報(dtb_plugin)
     * @return void
     */
    function install($arrPlugin) {
        // ロゴファイルをhtmlディレクトリにコピーします.
        copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/logo.png", PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/logo.png");
		
        $objQuery =& SC_Query_Ex::getSingletonInstance();
		$objQuery->query("CREATE TABLE plg_ordersort_mail_status (mail_template_id int,payment_id int, order_status_id int)");
    }
    
    /**
     * アンインストール
     * uninstallはアンインストール時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     * 
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function uninstall($arrPlugin) {
		$objQuery =& SC_Query_Ex::getSingletonInstance();
		$objQuery->query("DROP TABLE plg_ordersort_mail_status");
    }
    
    /**
     * 稼働
     * enableはプラグインを有効にした際に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function enable($arrPlugin) {
		copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/basis/mailcomb.php", HTML_REALDIR . ADMIN_DIR ."basis/mailcomb.php");
    }

    /**
     * 停止
     * disableはプラグインを無効にした際に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function disable($arrPlugin) {
		SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR ."basis/mailcomb.php");
    }

    /**
     * 処理の介入箇所とコールバック関数を設定
     * registerはプラグインインスタンス生成時に実行されます
     * 
     * @param SC_Helper_Plugin $objHelperPlugin 
     */
    function register(SC_Helper_Plugin $objHelperPlugin) {
		if(plg_OrderSort_Utils::getECCUBEVer() >= 2130){
			$version = '213';
		}else{
			$version = '212';
		}
		require_once PLUGIN_UPLOAD_REALDIR . 'OrderSort/class/'.$version.'/plg_OrderSort_LC_Template_Ex.php';
		require_once PLUGIN_UPLOAD_REALDIR . 'OrderSort/class/'.$version.'/plg_OrderSort_LC_Page_Admin_Order_Ex.php';
		require_once PLUGIN_UPLOAD_REALDIR . 'OrderSort/class/'.$version.'/plg_OrderSort_LC_Page_Admin_Order_Edit_Ex.php';
		require_once PLUGIN_UPLOAD_REALDIR . 'OrderSort/class/'.$version.'/plg_OrderSort_LC_Page_Admin_Order_Mail_Ex.php';
		if(file_exists(PLUGIN_UPLOAD_REALDIR . 'ExpressLink/class/'.$version.'/plg_ExpressLink_LC_Page_Admin_Order_Ex.php'))
		require_once PLUGIN_UPLOAD_REALDIR . 'ExpressLink/class/'.$version.'/plg_ExpressLink_LC_Page_Admin_Order_Ex.php';
		
		$objHelperPlugin->addAction("prefilterTransform",array("plg_OrderSort_LC_Template_Ex","prefilterTransform"),$this->arrSelfInfo['priority']);
		$objHelperPlugin->addAction("loadClassFileChange", array(&$this, "loadClassFileChange"), $this->arrSelfInfo['priority']);
		$objHelperPlugin->addAction("SC_FormParam_construct",array(&$this,"addParam"),$this->arrSelfInfo['priority']);
		if(class_exists('plg_ExpressLink_LC_Page_Admin_Order_Ex')){
			$objHelperPlugin->addAction("LC_Page_Admin_Order_action_before",array("plg_ExpressLink_LC_Page_Admin_Order_Ex","before"),$this->arrSelfInfo['priority']);
		}else{
			$objHelperPlugin->addAction("LC_Page_Admin_Order_action_before",array("plg_OrderSort_LC_Page_Admin_Order_Ex","before"),$this->arrSelfInfo['priority']);
		}
		$objHelperPlugin->addAction("LC_Page_Admin_Order_action_after",array("plg_OrderSort_LC_Page_Admin_Order_Ex","after"),$this->arrSelfInfo['priority']);
		$objHelperPlugin->addAction("LC_Page_Admin_Order_Edit_action_before",array("plg_OrderSort_LC_Page_Admin_Order_Edit_Ex","before"),$this->arrSelfInfo['priority']);
		$objHelperPlugin->addAction("LC_Page_Admin_Order_Edit_action_after",array("plg_OrderSort_LC_Page_Admin_Order_Edit_Ex","after"),$this->arrSelfInfo['priority']);
		$objHelperPlugin->addAction("LC_Page_Admin_Order_Mail_action_after",array("plg_OrderSort_LC_Page_Admin_Order_Mail_Ex","after"),$this->arrSelfInfo['priority']);
		$objHelperPlugin->addAction("LC_Page_Admin_Order_Mail_action_send",array("plg_OrderSort_LC_Page_Admin_Order_Mail_Ex","send"),$this->arrSelfInfo['priority']);
    }

	
	function loadClassFileChange(&$classname,&$classpath){
		if($classname == 'SC_Helper_CSV_Ex'){
			if(plg_OrderSort_Utils::getECCUBEVer() < 2130){
				$classpath = PLUGIN_UPLOAD_REALDIR . "OrderSort/class/plg_OrderSort_SC_Helper_CSV.php";
				$classname = "plg_OrderSort_SC_Helper_CSV";
			}
		}	
	}
	
	function addParam($class_name,$param){
		if(strpos($class_name,'LC_Page_Admin_Order_Edit') !== false){
			plg_OrderSort_Utils::addOrderSortParam($param);
		}
	}	
}
?>
