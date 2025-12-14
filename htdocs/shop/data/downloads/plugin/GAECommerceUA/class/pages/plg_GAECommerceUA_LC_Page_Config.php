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
require_once PLUGIN_UPLOAD_REALDIR . 'GAECommerceUA/inc/include.php';
require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';

/**
 * コンフィグ画面クラス
 *
 * @package GAECommerceUA
 * @author C-Rowl, Inc.
 * @version $Id: $
 */
class plg_GAECommerceUA_LC_Page_Config extends LC_Page_Admin_Ex {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $this->tpl_mainpage = PLG_CC_GAECUA_TPL_PATH_ADMIN. 'config.tpl';
        $this->tpl_subtitle = PLG_CC_GAECUA_NAME;
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {
        $objFormParam = new SC_FormParam_Ex();

        // パラメーター情報の初期化
        $this->lfInitParam($objFormParam);

        switch($this->getMode()) {
        case 'edit':
            $objFormParam->setParam($_POST);
            $this->arrErr = $this->lfCheckError($objFormParam);
            if (SC_Utils_Ex::isBlank($this->arrErr)) {
                $arrConfig = $objFormParam->getHashArray();
                $this->lfRegistData($arrConfig);

                $this->tpl_onload  = 'alert("登録が完了しました。");';
                $this->tpl_onload .= 'window.close();';
            }
            $this->arrForm = $objFormParam->getFormParamList();
            break;

        default:
            $this->arrForm = $this->lfGetConfigData($objFormParam);
            break;
        }
        $this->setTemplate($this->tpl_mainpage);
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        if (method_exists('LC_Page','destroy')) {
            parent::destroy();
        }
    }

    /**
     * 設定値の読み込み
     *
     * @param SC_FormParam_Ex $objFormParam SC_FormParam_Exインスタンス
     * @return array                        フォーム用情報配列
     */
    function lfGetConfigData(&$objFormParam) {
        $arrConfig = plg_GAECommerceUA_SC_Util_Ex::sfGetConfigData();
        $objFormParam->setParam($arrConfig);
        $objFormParam->convParam();

        return $objFormParam->getFormParamList();
    }

    /**
     * 選択された決済方法の登録/有効化と、設定値の保存を行う
     *
     * @param  array $arrConfig 設定画面の入力値情報
     * @return void
     */
    function lfRegistData($arrConfig) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->begin();

        // コンフィグデータ登録
        plg_GAECommerceUA_SC_Util_Ex::sfRegistConfigData($arrConfig);

        $objQuery->commit();
    }

    /**
     * フォームパラメータ初期化
     *
     * @param SC_FormParam_Ex $objFormParam SC_FormParam_Exインスタンス
     * @return void
     */
    function lfInitParam(&$objFormParam) {
        $objFormParam->addParam('トラッキングID', 'ga_tid', 20, 'a', array('EXIST_CHECK', 'SPTAB_CHECK', 'MAX_LENGTH_CHECK', 'GRAPH_CHECK'));
        $objFormParam->addParam('カテゴリ', 'op_category', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('商品名に規格名を含める', 'op_name_with_class', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
    }

    /**
     * 入力パラメータの検証
     *
     * @param SC_FormParam $objFormParam
     * @return array|null
     */
    function lfCheckError(&$objFormParam) {
        $arrErr = array();
        $arrErr = $objFormParam->checkError();
        return $arrErr;
    }
}
