<?php
/* 
 * 領収書発行インストールクラス
 */
class Receipt extends SC_Plugin_Base {

    /**
     * コンストラクタ
     * プラグイン情報(dtb_plugin)をメンバ変数をセットします.
		 * @param array $arrSelfInfo dtb_pluginの情報配列
     * @return void
     */
    public function __construct(array $arrSelfInfo) {
        parent::__construct($arrSelfInfo);
    }

    /**
     * インストール時に実行される処理を記述します.
     * @param array $arrPlugin dtb_pluginの情報配列
     * @return void
     */
    function install($arrPlugin) {
    	$queSelPluginId = $arrPlugin['plugin_id'];
    	$queStrDir = "plugin/" . $arrPlugin['plugin_code'] . "/";
    	// dtb_blocに必要なカラムを追加します.
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        
        $objQuery->begin();
        try 
        {
			// 領収書発行履歴保存用テーブル作成
			if (DB_TYPE === "mysql") {
				// MYSQL
				$objQuery->query("CREATE TABLE dtb_published_receipt (order_id int(11) NOT NULL,company text,address text,proviso text,create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, update_date timestamp NOT NULL DEFAULT 0, PRIMARY KEY (order_id))");
				
			} else {
				// Postgres
				$objQuery->query("CREATE TABLE dtb_published_receipt (order_id integer NOT NULL,company text,address text,proviso text,create_date timestamp without time zone NOT NULL DEFAULT now(),update_date timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,PRIMARY KEY (order_id))");
				
			}
			

            // ロゴファイルをhtmlディレクトリにコピーします.
            copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/logo.png", PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/logo.png");
			
			
			// 既存ファイルバックアップ
            mkdir(PLUGIN_HTML_REALDIR .  $arrPlugin['plugin_code'] . "/backup",         0755);
            copy(DATA_REALDIR . "class_extends/page_extends/admin/order/LC_Page_Admin_Order_Pdf_Ex.php",         PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/backup/LC_Page_Admin_Order_Pdf_Ex.php");
	
			// ファイル移動
			copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/data/class/SC_Fpdfr.php", 	                 DATA_REALDIR . "class/SC_Fpdfr.php");
			//copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/class_ex/LC_Page_Admin_Order_Pdf_Ex.php", DATA_REALDIR . "class_extends/page_extends/admin/order/LC_Page_Admin_Order_Pdf_Ex.php");

			copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/tpls/a/order/pdf_input_ex.tpl", 	         DATA_REALDIR . "Smarty/templates/admin/order/pdf_input_ex.tpl");
			copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/tpls/a/pdf/ryosyusho1.pdf",               DATA_REALDIR . "Smarty/templates/admin/pdf/ryosyusho1.pdf");
			
            $objQuery->commit();
		}
        catch (Exception $e)
        {
            $objQuery->rollback();
			throw $e;
        }
        
    }

    /**
     * 削除時に実行される処理を記述します.
     * @param array $arrPlugin dtb_pluginの情報配列
     * @return void
     */
    function uninstall($arrPlugin) {
    	$queSelPluginId = $arrPlugin['plugin_id'];
    	
        // dtb_blocから不要なカラムを削除します.
    	$objQuery =& SC_Query_Ex::getSingletonInstance();
		
		$dbFactory = SC_DB_DBFactory::getInstance();
		
		$dropTableList = $dbFactory->findTableNames("dtb_published_receipt");

		$objQuery->begin();		
		
		foreach ($dropTableList as $dropTable) {
			$objQuery->query("DROP TABLE " . $dropTable);
		}
        $objQuery->commit();

		// ファイル差し替え
        rename(PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/backup/LC_Page_Admin_Order_Pdf_Ex.php", DATA_REALDIR . "class_extends/page_extends/admin/order/LC_Page_Admin_Order_Pdf_Ex.php");

		unlink(DATA_REALDIR . "class/SC_Fpdfr.php");
		unlink(DATA_REALDIR . "Smarty/templates/admin/order/pdf_input_ex.tpl");
		unlink(DATA_REALDIR . "Smarty/templates/admin/pdf/ryosyusho1.pdf");
		
    }
    
    /**
     * 有効にした際に実行される処理を記述します.
     * @param array $arrPlugin dtb_pluginの情報配列
     * @return void
     */
    function enable($arrPlugin) {
    	$queSelPluginId = $arrPlugin['plugin_id'];
		// ファイル差し替え
		copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/data/class_ex/LC_Page_Admin_Order_Pdf_Ex.php", DATA_REALDIR . "class_extends/page_extends/admin/order/LC_Page_Admin_Order_Pdf_Ex.php");
    }

    /**
     * 無効にした際に実行される処理を記述します.
     * @param array $arrPlugin dtb_pluginの情報配列
     * @return void
     */
    function disable($arrPlugin) {
    	$queSelPluginId = $arrPlugin['plugin_id'];
		// ファイル差し替え
        copy(PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/backup/LC_Page_Admin_Order_Pdf_Ex.php", DATA_REALDIR . "class_extends/page_extends/admin/order/LC_Page_Admin_Order_Pdf_Ex.php");
    }

}
?>