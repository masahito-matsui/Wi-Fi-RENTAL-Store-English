<?php
/*
 * やさしいGoogleAnalytics表示プラグイン
 * Copyright (C) 2014 株式会社アラタナ
 * info@aratana.jp
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

/**
 * プラグインのメインクラス
 *
 * @package self::CLASS_NAME
 * @author takami@aratana
 * @version $Id: $
 */
class GoogleAnalyticsAdmin extends SC_Plugin_Base {
    // 定数宣言
    const CLASS_NAME = 'GoogleAnalyticsAdmin';

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
        // プラグイン用のロゴ画像をアップ
        $pluginData = PLUGIN_UPLOAD_REALDIR . '/' . self::CLASS_NAME . '/';
        $pluginHtml = PLUGIN_HTML_REALDIR   . '/' . self::CLASS_NAME . '/';

        copy($pluginData . "html_copy/logo.png" , $pluginHtml . "logo.png");
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
        SC_Helper_FileManager_Ex::deleteFile(PLUGIN_HTML_REALDIR   . self::CLASS_NAME);
        SC_Helper_FileManager_Ex::deleteFile(PLUGIN_UPLOAD_REALDIR . self::CLASS_NAME);
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
     * 処理の介入箇所とコールバック関数を設定
     * registerはプラグインインスタンス生成時に実行されます
     *
     * @param SC_Helper_Plugin $objHelperPlugin
     */
    function register(SC_Helper_Plugin $objHelperPlugin) {
        return parent::register($objHelperPlugin, $this->arrSelfInfo['priority']);
    }

    /**
     * GAPIとの連携
     * 当月データを取得する関数
     *
     * @param objPage
     */
    function lfGoogleAnalyticsGraph($objPage) {
        $arrParam = $this->loadData($objPage);

        if (empty($arrParam['ga_id']) || empty($arrParam['ga_pw'])) {
            return false;
        }

      /* GAPI Google Analytics Data Set */
      require 'gapi.class.php';

      try{
            $ga = new gapi($arrParam['ga_id'] , $arrParam['ga_pw']);
        }catch(Exception $e){
            $objPage->strGoogleAnalyticsError = "認証に失敗しました。アカウントでアプリケーション認証が済んでいないか、ID・パスワードが間違っています。";
        };

        if (!empty($ga)) {
            $ga_profile_id = $arrParam['ga_view'];
            $dimensions    = array('year','month','day');
            $metrics       = array('pageviews','visits', 'visitors', 'pageviews');
            $sort_metric   = array('year','month','day');
            $filter        = '';
            $start_date    = date("Y-m-01");
            $end_date      = date("Y-m-t");
            $start_index   = 1;
            $max_results   = 10000;

            $ga->requestReportData(
                $ga_profile_id,
                $dimensions,
                $metrics,
                $sort_metric,
                $filter,
                $start_date,
                $end_date,
                $start_index,
                $max_results
            );
            $arrGoogleAnalyticsGraph = $ga->getResults();

            /* 売上情報取得 */
            $objQuery = SC_Query_Ex::getSingletonInstance();
            $where    = ' del_flg = 0';
            $where   .= ' AND create_date >= ?';
            $where   .= ' AND create_date <= ?';
            $where   .= ' AND status <> ?';

            $arrWhereVal[] = $start_date;
            $arrWhereVal[] = $end_date;
            $arrWhereVal[] = ORDER_CANCEL;

            $objQuery->setGroupBy('str_date');
            $objQuery->setOrder('str_date');

            $dbFactory = SC_DB_DBFactory_Ex::getInstance();
            $col = $dbFactory->getOrderTotalDaysWhereSql('');

            $arrTotalResults = $objQuery->select($col, 'dtb_order', $where, $arrWhereVal);
            $arrTotalMerge = array();

            /* GA DATA and Salse Data Merge */
            foreach ($arrGoogleAnalyticsGraph as $row) {
                $strDate = $row->getYear() . '-' .$row->getMonth() . '-' . $row->getDay();
                $arrTotalMerge[]['total'] = 0;
                foreach ($arrTotalResults as $data) {
                    if ($data['str_date'] === $strDate) {
                      $arrTotalMerge[]['total'] = $data['total'];
                      break;
                    }
                }
            }

            $objPage->arrGoogleAnalyticsGraph = $arrGoogleAnalyticsGraph;
            $objPage->arrTotalMerge = $arrTotalMerge;
            $objPage->strGoogleAnalyticsStartDate = $start_date;
            $objPage->strGoogleAnalyticsEndDate = $end_date;
        }
    }

    /**
     * プレフィルタコールバック関数
     *
     * @param string &$source テンプレートのHTMLソース
     * @param LC_Page_Ex $objPage ページオブジェクト
     * @param string $filename テンプレートのファイル名
     * @return void
     */
    function prefilterTransform($source, LC_Page_Ex $objPage, $filename) {
        $objTransform = new SC_Helper_Transform_Ex($source);
        $template_dir = PLUGIN_UPLOAD_REALDIR . self::CLASS_NAME . '/templates/';

        if (strpos($filename, 'home.tpl') !== false) {
            $objTransform->select('#home')->appendFirst(file_get_contents($template_dir . 'plg_' . self::CLASS_NAME . '.tpl'));
        }
        //トランスフォームされた値で書き換え
        $source = $objTransform->getHTML();
    }

    // プラグイン設定の情報を取得
    function loadData($objPage) {
        $arrRet = array();
        $arrData = SC_Plugin_Util_Ex::getPluginByPluginCode(self::CLASS_NAME);

        if (!SC_Utils_Ex::isBlank($arrData['free_field4'])) {
            $arrRet = unserialize($arrData['free_field4']);

            //復号化するデータ
            $crypt_text = $arrRet['ga_pw'];

            //暗号化＆復号化キー
            $key = $arrRet['key'];

            //暗号化モジュール使用開始
            $td  = mcrypt_module_open('des', '', 'ecb', '');
            $key = substr($key, 0, mcrypt_enc_get_key_size($td));
            $iv  = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);

            //暗号化モジュール初期化
            mcrypt_generic_init($td, $key, $iv);

            //データを復号化
            $arrRet['ga_pw'] = mdecrypt_generic($td, base64_decode($crypt_text));

            //暗号化モジュール使用終了
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td);
        }
        return $arrRet;
    }
}