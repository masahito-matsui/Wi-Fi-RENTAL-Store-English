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

/**
 * プラグイン のアップデート用クラス.
 *
 * @package OrderSort
 * @author Bratech CO.,LTD.
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
		$version = floor(str_replace('.','',$arrPlugin['plugin_version']));
    	$plugin_dir_path = PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . '/';
		SC_Utils_Ex::copyDirectory(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR, $plugin_dir_path);
		
		$sqlval_plugin = array();
		$sqlval_plugin['plugin_version'] = "1.2.0";
		$sqlval_plugin['update_date'] = 'CURRENT_TIMESTAMP';
		
		$objQuery =& SC_Query_Ex::getSingletonInstance();
		$objQuery->update('dtb_plugin', $sqlval_plugin, "plugin_code = ?", array($arrPlugin['plugin_code']));
		
		if($version <= 111){
			copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/basis/mailcomb.php", HTML_REALDIR . ADMIN_DIR ."basis/mailcomb.php");
			$objQuery->query("ALTER TABLE plg_ordersort_mail_status ADD COLUMN payment_id int");
			$objQuery->delete("plg_ordersort_mail_status");
			SC_Helper_FileManager_Ex::deleteFile($plugin_dir_path ."config.php");
			SC_Helper_FileManager_Ex::deleteFile($plugin_dir_path ."LC_Page_Plugin_OrderSort_Config");
		}
		
		if($version <= 114){
			if($arrPlugin['enable'] == 1){
				copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/html/admin/basis/mailcomb.php", HTML_REALDIR . ADMIN_DIR ."basis/mailcomb.php");
			}
		}
    }
}
?>