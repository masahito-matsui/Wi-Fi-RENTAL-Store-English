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

// {{{ requires
require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';

/**
 * プラグインファイル自動生成のクラス
 *
 * @package GoogleAnalyticsAdmin
 * @author ARATANA CO.,LTD.
 * @version $Id: $
 */
class LC_Page_Plugin_GoogleAnalyticsAdmin_Config extends LC_Page_Admin_Ex
{
    // 定数宣言
    const CLASS_NAME = 'GoogleAnalyticsAdmin';

    /**
     * 初期化する.
     *
     * @return void
     */
    function init()
    {
        parent::init();
        $this->tpl_mainpage = PLUGIN_UPLOAD_REALDIR . self::CLASS_NAME . "/config.tpl";
        $this->tpl_subtitle = "やさしいGoogleAnalytics表示プラグイン";
    }

    /**
     * プロセス.
     *
     * @return void
     */
    function process()
    {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action()
    {
        //かならずPOST値のチェックを行う
        $objFormParam = new SC_FormParam_Ex();
        $this->lfInitParam($objFormParam);
        $objFormParam->setParam($_POST);
        $objFormParam->convParam();
        $arrForm = array();
        switch ($this->getMode()) {
            case 'register':
                $arrForm = $objFormParam->getHashArray();
                $this->arrErr = $objFormParam->checkError();
                // エラーなしの場合にはデータを送信
                if (count($this->arrErr) == 0) {
                    $this->arrErr = $this->registData($arrForm);
                    if (count($this->arrErr) == 0) {
                        SC_Utils_Ex::clearCompliedTemplate();
                        $this->tpl_onload = "alert('設定が完了しました。');";
                    }
                }
                break;
            default:
                $arrForm = $this->loadData();
                $this->tpl_is_init = true;
                break;
        }
        $this->arrForm = $arrForm;
        // ポップアップ用の画面は管理画面のナビゲーションを使わない
        $this->setTemplate($this->tpl_mainpage);
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy()
    {
        //parent::destroy();
    }

    /**
     * パラメーター情報の初期化
     *
     * @param object $objFormParam SC_FormParamインスタンス
     *
     * コンバートオプション    意味
     *   r     「全角」英字を「半角」に変換します。
     *   R     「半角」英字を「全角」に変換します。
     *   n     「全角」数字を「半角」に変換します。
     *   N     「半角」数字を「全角」に変換します。
     *   a     「全角」英数字を「半角」に変換します。
     *   A     「半角」英数字を「全角」に変換します （"a", "A" オプションに含まれる文字は、U+0022, U+0027, U+005C, U+007Eを除く U+0021 - U+007E の範囲です）。
     *   s     「全角」スペースを「半角」に変換します（U+3000 -> U+0020）。
     *   S     「半角」スペースを「全角」に変換します（U+0020 -> U+3000）。
     *   k     「全角カタカナ」を「半角カタカナ」に変換します。
     *   K     「半角カタカナ」を「全角カタカナ」に変換します。
     *   h     「全角ひらがな」を「半角カタカナ」に変換します。
     *   H     「半角カタカナ」を「全角ひらがな」に変換します。
     *   c     「全角カタカナ」を「全角ひらがな」に変換します。
     *   C     「全角ひらがな」を「全角カタカナ」に変換します。
     *   V     濁点付きの文字を一文字に変換します。"K", "H" と共に使用します。
     *
     *   //チェックオプション
     *   See class => data/class/SC_CheckError.php
     *
     * @return void
     */
    function lfInitParam($objFormParam)
    {
        $objFormParam->addParam('ログインID', 'ga_id', 50, '', array());
        $objFormParam->addParam('パスワード', 'ga_pw', 50, '', array());
        $objFormParam->addParam('ビューID', 'ga_view', 50, '', array());
    }

    /**
     * プラグイン設定値をDBから取得.
     *
     * @return $arrRet
     */
    function loadData()
    {
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
            $arrRet['ga_pw'] = trim(mdecrypt_generic($td, base64_decode($crypt_text)));

            //暗号化モジュール使用終了
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td);
        }
        return $arrRet;
    }

    /**
     * プラグイン設定値をDBに書き込み.
     *
     * @return void
     */
    function registData($arrData)
    {
        $objQuery = SC_Query_Ex::getSingletonInstance();
        // UPDATEする値を作成する。
        $sqlval = array();

        //暗号化するデータ
        $plain_text = $arrData['ga_pw'];

        //暗号化＆復号化キー
        $key = md5(uniqid(rand(), true));

        //暗号化モジュール使用開始
        $td = mcrypt_module_open('des', '', 'ecb', '');
        $key = substr($key, 0, mcrypt_enc_get_key_size($td));
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);

        //暗号化モジュール初期化
        mcrypt_generic_init($td, $key, $iv);

        //データを暗号化
        $arrData['ga_pw'] = base64_encode(mcrypt_generic($td, $plain_text));

        //暗号化モジュール使用終了
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        $arrData['key'] = $key;
        $sqlval['free_field4'] = serialize($arrData);
        $sqlval['update_date'] = 'CURRENT_TIMESTAMP';
        $where = "plugin_code = ?";
        $arrWhereVal[] = self::CLASS_NAME;
        // UPDATEの実行
        $objQuery->update('dtb_plugin', $sqlval, $where, $arrWhereVal);
    }
}