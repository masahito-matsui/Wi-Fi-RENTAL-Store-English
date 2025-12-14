<?php
/*
 * GAECommerceUA: UA版 Google Analytics eコマース対応 プラグイン
 * Copyright (C) 2013 C-Rowl Co.,Ltd. All Rights Reserved.
 * http://www.c-rowl.com/
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

require_once PLUGIN_UPLOAD_REALDIR . 'GAECommerceUA/inc/include.php';

/**
 * 汎用関数クラス
 *
 * @package GAECommerceUA
 * @author C-Rowl, Inc.
 * @version $Id: $
 */
class plg_GAECommerceUA_SC_Util {

    /**
     * Google AnalyticsのトラッキングIDを取得する
     *
     * @return string  ショップID
     */
    function sfGetGaTrackingId() {
        return plg_GAECommerceUA_SC_Util_Ex::sfGetConfigParam('ga_tid');
    }

    /**
     * コンフィグ値のうち、指定したキーの値を取得する
     *
     * @param  string $key コンフィグのキー値
     * @return mixed       コンフィグの設定値(無効なキー値の場合はfalse)
     */
    function sfGetConfigParam($key) {
        $arrConfig = plg_GAECommerceUA_SC_Util_Ex::sfGetConfigData();
        return (isset($arrConfig[$key])) ? $arrConfig[$key] : false;
    }

    /**
     * データベースへの初期データの登録
     */
    function sfInitDbRecords() {

        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->begin();

        // プラグイン用テーブルに初期データを登録
        plg_GAECommerceUA_SC_Util_Ex::sfSetDefaultToPluginRecords($objQuery);

        $objQuery->commit();
    }

    /**
     * プラグイン用ファイルを指定の場所へコピーする
     *
     * @return void
     */
    function sfCopyFiles() {
        // フロント側用ディレクトリのコピー
        SC_Utils_Ex::copyDirectory(PLG_CC_GAECUA_PATH . 'copy/html/plugin/' . PLG_CC_GAECUA_CODE . '/',
                                   PLG_CC_GAECUA_HTML_PATH);
    }

    /**
     * プラグイン用ファイルを削除する
     *
     * @return void
     */
    function sfDeleteFiles() {
        // プラグイン用ファイルの削除
        SC_Helper_FileManager_Ex::deleteFile(PLG_CC_GAECUA_HTML_PATH);
    }

    /**
     * プラグインテーブルに初期データを登録する
     *
     * @param  SC_Query_Ex $objQuery SC_Query_Exインスタンス
     */
    function sfSetDefaultToPluginRecords(&$objQuery) {
        $table = 'dtb_plugin';

        $arrConfig = array();
        $arrConfig['ga_tid'] = '';
        $arrConfig['op_category'] = PLG_CC_GAECUA_OP_CATEGORY_DEFAULT;
        $arrConfig['op_name_with_class'] = PLG_CC_GAECUA_OP_NAME_WITH_CLASS_DEFAULT;

        $arrUpdate = array();
        $arrUpdate['free_field1'] = serialize($arrConfig);
        $arrUpdate['update_date'] = 'CURRENT_TIMESTAMP';

        $objQuery->update($table, $arrUpdate, 'plugin_code = ?', array(PLG_CC_GAECUA_CODE));
    }

    /**
     * コンフィグデータ（コンフィグ画面の設定値）を取得する
     *
     * @return array  コンフィグデータの配列
     */
    function sfGetConfigData() {
        $plugin = SC_Plugin_Util_Ex::getPluginByPluginCode(PLG_CC_GAECUA_CODE);
        $arrConfig = unserialize($plugin['free_field1']);
        return $arrConfig;
    }

    /**
     * コンフィグデータ（コンフィグ画面の設定値）を登録する
     *
     * @param array $arrConfig コンフィグデータの配列
     */
    function sfRegistConfigData(array $arrConfig) {
        $table = 'dtb_plugin';

        $arrUpdate = array();
        $arrUpdate['free_field1'] = serialize($arrConfig);
        $arrUpdate['update_date'] = 'CURRENT_TIMESTAMP';

        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->update($table, $arrUpdate, 'plugin_code = ?', array(PLG_CC_GAECUA_CODE));
    }

    /**
     * 指定したカテゴリIDのカテゴリを取得する.
     *
     * @param integer $category_id カテゴリID
     * @return array 指定したカテゴリIDのカテゴリ
     */
    function sfGetCat($category_id) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();

        // カテゴリを取得する
        $arrVal = array($category_id);
        $res = $objQuery->select('category_id AS id, category_name AS name', 'dtb_category', 'category_id = ?', $arrVal);

        return $res[0];
    }
}
