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
 * プラグインのメインクラス
 *
 * @package GAECommerceUA
 * @author C-Rowl, Inc.
 * @version $Id: $
 */
class GAECommerceUA extends SC_Plugin_Base {

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
        // 初期データを設定
        plg_GAECommerceUA_SC_Util_Ex::sfInitDbRecords();

        // 必要なファイルをコピー
        plg_GAECommerceUA_SC_Util_Ex::sfCopyFiles();
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
        //展開したファイルを削除
        plg_GAECommerceUA_SC_Util_Ex::sfDeleteFiles();
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
        //
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
        //
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

        switch($objPage->arrPageLayout['device_type_id']){
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_PC:
                if (strpos($filename, 'site_frame.tpl') !== false) {
                    // PC・スマートフォン用にテンプレート挿入
                    $objTransform = new SC_Helper_Transform_Ex($source);

                    $template_dir = PLG_CC_GAECUA_TPL_PATH_PC;
                    $template_file = 'plg_gaecommerceua_head.tpl';
                    $objTransform->select('head', 0)->appendChild(file_get_contents($template_dir . $template_file));

                    $source = $objTransform->getHTML();
                }
                break;

            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_ADMIN:
            default:
                break;
        }
    }

    /**
     * 購入完了画面へのフック
     *
     * @param  LC_Page_Ex $objPage ページオブジェクト
     * @return void
     */
    function hookPageShoppingCompleteActionBefore(LC_Page_Ex $objPage) {

        $arrConfig = plg_GAECommerceUA_SC_Util_Ex::sfGetConfigData();
        if (strlen($arrConfig['ga_tid']) <= 0) {
            return;
        }

        $objPurchase = new SC_Helper_Purchase_Ex();
        $objDb = new SC_Helper_DB_Ex();

        // 受注情報の取得
        $arrOrder = $objPurchase->getOrder($_SESSION['order_id']);
        $arrOrderDetail = $objPurchase->getOrderDetail($_SESSION['order_id']);
        $objPage->plg_gaecommerceua_arrOrder = $arrOrder;

        // 商品情報の設定
        foreach ($arrOrderDetail as $key => $arrDetail) {
            // カテゴリ名の取得
            $arrCategoryId = $objDb->sfGetCategoryId($arrDetail['product_id'] );
            $arrCatIds = $objDb->sfGetParents('dtb_category', 'parent_category_id', 'category_id', $arrCategoryId[0]);

            switch ($arrConfig['op_category']) {
                // トップカテゴリ
                case PLG_CC_GAECUA_OP_CATEGORY_TOP:
                    $target_category_id = $arrCatIds[0];
                    break;

                // 詳細カテゴリ
                case PLG_CC_GAECUA_OP_CATEGORY_DETAIL:
                    $target_category_id = end($arrCatIds);
                    break;

                // カテゴリを含めない
                case PLG_CC_GAECUA_OP_CATEGORY_OFF:
                default:
                    $target_category_id = '';
                    break;

            }

            if (strlen($target_category_id) > 0) {
                $arrCatInfo = plg_GAECommerceUA_SC_Util_Ex::sfGetCat($target_category_id);
                $arrOrderDetail[$key]['category_name'] = $arrCatInfo['name'];
            }
            else {
                $arrOrderDetail[$key]['category_name'] = '';
            }

            // 商品名の取得
            if ($arrConfig['op_name_with_class'] == PLG_CC_GAECUA_OP_FLG_ON) {
                // 規格名を商品名に含める場合
                if (strlen($arrDetail['classcategory_name1']) > 0) {
                    $class_name = '(' .$arrDetail['classcategory_name1'];
                    if (strlen($arrDetail['classcategory_name2']) > 0) {
                        $class_name .= '/' .$arrDetail['classcategory_name2'];
                    }
                    $class_name .= ')';
                    $arrOrderDetail[$key]['product_name'] .= $class_name;
                }
            }
        }

        switch ($objPage->arrPageLayout['device_type_id']) {
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_PC:
                $objPage->plg_gaecommerceua_arrOrderDetail = $arrOrderDetail;
                break;

            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_ADMIN:
            default:
                break;
        }

        $objPage->plg_gaecommerceua_ecommerce_flg = 1;
    }

    /**
     * 全画面共通のフック
     *
     * @param  LC_Page_Ex $objPage ページオブジェクト
     * @return void
     */
    function preProcess(LC_Page_Ex $objPage) {

        switch ($objPage->arrPageLayout['device_type_id']) {
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_PC:
                $arrConfig = plg_GAECommerceUA_SC_Util_Ex::sfGetConfigData();
                $objPage->plg_gaecommerceua_arrConfig = $arrConfig;
                break;

            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_ADMIN:
            default:
                break;
        }
    }
}