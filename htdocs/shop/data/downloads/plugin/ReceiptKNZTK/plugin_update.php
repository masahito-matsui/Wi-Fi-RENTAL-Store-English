<?php
/**
 * プラグイン のアップデート用クラス.
 *
 * @package Receipt
 * @author Takenori Kanazawa
 * @version $Id: $1.1.1
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
         // バージョン1.1.0からのアップデート
         if ($arrPlugin['plugin_version'] == "v1.1.0") {
            plugin_update::update110($arrPlugin);
         }
     }
     /**
      * 1.1.0からのアップデートを実行します.
      * @param type $param 
      */
     function update110($arrPlugin) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        
        $objQuery->begin();
        try 
        {
			if (DB_TYPE === "mysql") {
				// MYSQL
				$objQuery->query("ALTER TABLE dtb_published_receipt ADD company text AFTER order_id");
			
			} else {
				// Postgres
				$objQuery->query("ALTER TABLE dtb_published_receipt ADD company text");
			
			}
		 
		 
	 		// 変更のあったファイルを上書きします.
			copy(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR . "/data/class/SC_Fpdfr.php",                  PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/data/class/SC_Fpdfr.php");
			copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/data/class/SC_Fpdfr.php", DATA_REALDIR . "class/SC_Fpdfr.php");

			copy(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR . "/tpls/a/order/pdf_input_ex.tpl",                      PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/tpls/a/order/pdf_input_ex.tpl");
			copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/tpls/a/order/pdf_input_ex.tpl", 	   DATA_REALDIR . "Smarty/templates/admin/order/pdf_input_ex.tpl");

			copy(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR . "/data/class_ex/LC_Page_Admin_Order_Pdf_Ex.php", PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/data/class_ex/LC_Page_Admin_Order_Pdf_Ex.php");
			copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/data/class_ex/LC_Page_Admin_Order_Pdf_Ex.php", DATA_REALDIR . "class_extends/page_extends/admin/order/LC_Page_Admin_Order_Pdf_Ex.php");
		
	        $objQuery->commit();
		}
	    catch (Exception $e)
	    {
	        $objQuery->rollback();
			throw $e;
	    }		
     }
	 
	 
}
?>