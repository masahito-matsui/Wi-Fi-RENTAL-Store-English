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

// {{{ requires
require_once DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR . 'inc/include.php';
require_once DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR . 'plugin_info.php';

/**
 * プラグイン のアップデート用クラス.
 *
 * @package GAECommerceUA
 * @author C-Rowl, Inc.
 * @version $Id: $
 */
class plugin_update{
   /**
     * アップデート
     * updateはアップデート時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function update($arrPlugin) {
        // プラグインフォルダへ新規ファイルをコピー
        SC_Utils_Ex::copyDirectory(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR, PLG_CC_GAECUA_PATH);

        // ファイルを展開
        plg_GAECommerceUA_SC_Util_Ex::sfCopyFiles();

        // プラグイン情報の更新
        plugin_update::lfUpdatePlugin($arrPlugin);
    }


    /**
     * プラグインに関連するデータベース内容を更新する
     *
     * @param  array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function lfUpdatePlugin($arrPlugin) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->begin();

        // プラグイン情報の更新
        plugin_update::lfUpdatePluginInfo($objQuery, $arrPlugin);

        // フックポイントの更新
        plugin_update::lfUpdateHookPoints($objQuery, $arrPlugin);

        $objQuery->commit();
    }


    /**
     * 新しいプラグイン情報でプラグインテーブルを更新する
     * コンフィグ設定値は保持する
     *
     * @param object $objQuery  SC_Query_Exインスタンス
     * @param array  $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function lfUpdatePluginInfo($objQuery, $arrPlugin) {

        // プラグイン情報の更新
        $arrInfo = array();
        // $arrInfo[''] = plugin_info::$PLUGIN_CODE;
        $arrInfo['plugin_name'] = plugin_info::$PLUGIN_NAME;
        $arrInfo['class_name'] = plugin_info::$CLASS_NAME;
        $arrInfo['author'] = plugin_info::$AUTHOR;
        $arrInfo['author_site_url'] = plugin_info::$AUTHOR_SITE_URL;
        $arrInfo['plugin_site_url'] = plugin_info::$PLUGIN_SITE_URL;
        $arrInfo['plugin_version'] = plugin_info::$PLUGIN_VERSION;
        $arrInfo['compliant_version'] = plugin_info::$COMPLIANT_VERSION;
        $arrInfo['plugin_description'] = plugin_info::$DESCRIPTION;
        $arrInfo['update_date'] = 'CURRENT_TIMESTAMP';

        $table = 'dtb_plugin';
        $where = 'plugin_code = ? ';
        $arrWhere = array($arrPlugin['plugin_code']);

        $objQuery->update($table, $arrInfo, $where, $arrWhere);
    }

    /**
     * フックポイントを更新する
     *
     * @param object $objQuery  SC_Query_Exインスタンス
     * @param array  $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function lfUpdateHookPoints($objQuery, $arrPlugin) {

        // 既存フックポイントを削除
        $table = 'dtb_plugin';
        $where = 'plugin_code = ? ';
        $arrWhere = array($arrPlugin['plugin_code']);
        $plugin_id = $objQuery->get('plugin_id', $table, $where, $arrWhere);
        $objQuery->delete('dtb_plugin_hookpoint', 'plugin_id = ? ', array($plugin_id));

        // フックポイントをDB登録
        $hook_point = plugin_info::$HOOK_POINTS;
        if ($hook_point !== null) {
            // フックポイントが配列で定義されている場合
            if (is_array($hook_point)) {
                foreach ($hook_point as $h) {
                    $arr_sqlval_plugin_hookpoint = array();
                    $id = $objQuery->nextVal('dtb_plugin_hookpoint_plugin_hookpoint_id');
                    $arr_sqlval_plugin_hookpoint['plugin_hookpoint_id'] = $id;
                    $arr_sqlval_plugin_hookpoint['plugin_id'] = $plugin_id;
                    $arr_sqlval_plugin_hookpoint['hook_point'] = $h[0];
                    $arr_sqlval_plugin_hookpoint['callback'] = $h[1];
                    $arr_sqlval_plugin_hookpoint['update_date'] = 'CURRENT_TIMESTAMP';
                    $objQuery->insert('dtb_plugin_hookpoint', $arr_sqlval_plugin_hookpoint);
                }
            // 文字列定義の場合
            } else {
                $array_hook_point = explode(',', $hook_point);
                foreach ($array_hook_point as $h) {
                    $arr_sqlval_plugin_hookpoint = array();
                    $id = $objQuery->nextVal('dtb_plugin_hookpoint_plugin_hookpoint_id');
                    $arr_sqlval_plugin_hookpoint['plugin_hookpoint_id'] = $id;
                    $arr_sqlval_plugin_hookpoint['plugin_id'] = $plugin_id;
                    $arr_sqlval_plugin_hookpoint['hook_point'] = $h;
                    $arr_sqlval_plugin_hookpoint['update_date'] = 'CURRENT_TIMESTAMP';
                    $objQuery->insert('dtb_plugin_hookpoint', $arr_sqlval_plugin_hookpoint);
                }
            }
        }
    }
}
