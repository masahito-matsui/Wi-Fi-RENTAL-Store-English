<?php
/*
 *
 * BlackIPList
 * Copyright(c) 2014  Cyber Area Research,Inc. All Rights Reserved.
 *
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

/**
 * プラグインのメインクラス
 *
 * @package BlackIPList
 * @author Cyber Area Research, Inc.
 * @version $Id: $
 */
class BlackIPList extends SC_Plugin_Base {

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
         self::copyFiles($arrPlugin);
         self::insertColumn();
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
        self::deleteFiles($arrPlugin);
        self::dropColumn();
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
        // nop
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
        // nop
    }

    /**
     * プラグイン用ファイルをコピー 
     * @param array $arrPlugin dtb_pluginの情報配列
     * @return void
     */
    static function copyFiles($arrPlugin){
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        //ロゴ
        if(copy(PLUGIN_UPLOAD_REALDIR . 'BlackIPList/logo.png', PLUGIN_HTML_REALDIR . 'BlackIPList/logo.png') === false);
        //必要なファイルをコピー
        if(copy(PLUGIN_UPLOAD_REALDIR . 'BlackIPList/templates/plg_BlackIPList_snip_admin_order_edit_tr.tpl', TEMPLATE_ADMIN_REALDIR . 'order/plg_BlackIPList_snip_admin_order_edit_tr.tpl') === false);
    }
    
    /**
     * プラグイン用ファイルを削除
     * @param array $arrPlugin dtb_pluginの情報配列
     * @return void
     */
    static function deleteFiles($arrPlugin){
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        //ロゴ
        if(SC_Helper_FileManager_Ex::deleteFile(PLUGIN_HTML_REALDIR . 'BlackIPList/logo.png') === false);
        //ファイルを削除
        if(SC_Helper_FileManager_Ex::deleteFile(TEMPLATE_REALDIR . 'order/plg_BlackIPList_snip_admin_order_edit_tr.tpl') === false);
    }
    
    /**
     * カラムの追加
     * 
     */
    static function insertColumn(){
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $qry = 'ALTER TABLE dtb_order ADD plg_blackiplist_ip text';
        $objQuery->query($qry);
    }
    
    /**
     * カラムの削除
     * 
     */
    public static function dropColumn(){
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $qry = 'ALTER TABLE dtb_order DROP plg_blackiplist_ip';
        $objQuery->query($qry);
    }

    /**
     * 購入時にクライアントのIPアドレスを記録します。
     *
     * @param LC_Page_Shopping_Confirm $objPage <フロント画面>購入確認画面.
     * @return void
     */
    function shopping_ip_set($objPage) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $arrValues['plg_blackiplist_ip'] = $_SERVER['REMOTE_ADDR'];
        $where = 'order_id = ?';
        $arrWhereVal = array($objPage->arrForm['order_id']);
        $objQuery->update('dtb_order', $arrValues, $where, $arrWhereVal);
    }

    /**
     * 購入時のクライアントのIPアドレス属性を取得します。
     *
     * @param LC_Page_Admin_Order_Edit $objPage <管理画面>受注修正.
     * @return void
     */
    function order_ip_get($objPage) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $where = 'order_id = ?';
        $arrWhereVal = array($_REQUEST['order_id']);
        $array_order = $objQuery->select('plg_blackiplist_ip','dtb_order', $where, $arrWhereVal);
        $objPage->arrForm['plg_blackiplist_ip'] = array( 'keyname' => 'plg_blackiplist_ip' , 'disp_name' => 'IPアドレス' , 'value' => $array_order[0]['plg_blackiplist_ip']);
    }

    /**
     * 処理の介入箇所とコールバック関数を設定
     * registerはプラグインインスタンス生成時に実行されます
     * 
     * @param SC_Helper_Plugin $objHelperPlugin 
     */
    function register(SC_Helper_Plugin $objHelperPlugin) {
        // IPアドレス記録側フックポイント
        $objHelperPlugin->addAction('LC_Page_Shopping_Confirm_action_confirm', array($this, 'shopping_ip_set'), $this->arrSelfInfo['priority']);
        $objHelperPlugin->addAction('LC_Page_Shopping_Confirm_action_confirm_module', array($this, 'shopping_ip_set'), $this->arrSelfInfo['priority']);
        // IPアドレス表示側フックポイント
        $objHelperPlugin->addAction('LC_Page_Admin_Order_Edit_action_after', array($this, 'order_ip_get'), $this->arrSelfInfo['priority']);
        $objHelperPlugin->addAction('prefilterTransform', array(&$this, 'prefilterTransform'), $this->arrSelfInfo['priority']);
    }
    
    /**
     * プレフィルタコールバック関数
     *
     * @param string &$source テンプレートのHTMLソース
     * @param LC_Page_Ex $objPage ページオブジェクト
     * @param string $filename テンプレートのファイル名
     * @return void
     */
    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
        $objTransform = new SC_Helper_Transform($source);
        $template_dir = PLUGIN_UPLOAD_REALDIR . 'BlackIPList/templates/';
        switch($objPage->arrPageLayout['device_type_id']){
            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_PC:
                break;
            case DEVICE_TYPE_ADMIN:
            default:
                // 受注修正画面
                if (strpos($filename, 'order/edit.tpl') !== false) {
                    $objTransform->select('h2')->appendChild(file_get_contents($template_dir . 'plg_BlackIPList_snip_admin_order_edit_tr.tpl'));
                }
                break;
        }
        //トランスフォームされた値で書き換え
        $source = $objTransform->getHTML();
    }

}
?>
