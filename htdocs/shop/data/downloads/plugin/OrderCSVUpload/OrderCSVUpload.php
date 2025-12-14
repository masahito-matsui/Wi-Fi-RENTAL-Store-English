<?php
/*
 * Copyright (C) 2014 Nobuhiko Kimoto
 * info@nob-log.info
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

class OrderCSVUpload extends SC_Plugin_Base
{
    /**
     * コンストラクタ
     */
    public function __construct(array $arrSelfInfo)
    {
        parent::__construct($arrSelfInfo);
    }

    /**
     * インストール
     * installはプラグインのインストール時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param  array $arrPlugin plugin_infoを元にDBに登録されたプラグイン情報(dtb_plugin)
     * @return void
     */
    public function install($arrPlugin)
    {
        // プラグインのロゴ画像をアップ
        if (file_exists(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/logo.png")) {
            if(copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/logo.png", PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/logo.png") === false);
        }
    }

    /**
     * アンインストール
     * uninstallはアンインストール時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param  array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    public function uninstall($arrPlugin)
    {
        // ロゴ画像削除
        if (file_exists(PLUGIN_HTML_REALDIR .$arrPlugin['plugin_code'] . "/logo.png")) {
            if(SC_Helper_FileManager_Ex::deleteFile(PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/logo.png") === false);
        }
    }

    /**
     * 稼働
     * enableはプラグインを有効にした際に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param  array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    public function enable($arrPlugin)
    {
        $code = $arrPlugin['plugin_code'] . '/';
        $filename = 'admin/order/upload_csv.php';
        if (!@copy(PLUGIN_UPLOAD_REALDIR . $code . $filename, HTML_REALDIR . ADMIN_DIR . 'order/upload_csv.php')) {
            SC_Utils_Ex::sfDispSiteError(FREE_ERROR_MSG, '', false, 'FILE COPY ERROR: ' . dirname(HTML_REALDIR . ADMIN_DIR . 'order/upload_csv.php'));
        }

        $objQuery = SC_Query_Ex::getSingletonInstance();

        // csvデータを登録
        $objQuery->query(
            "INSERT INTO dtb_csv (update_date, no, csv_id, col, disp_name, rank, rw_flg, status, mb_convert_kana_option, size_const_type, error_check_types) VALUES
        ('2016-01-01 00:00:00',2000, 10, 'id', '受注No.', NULL, 1, 1, 'n', 'INT_LEN', 'EXIST_CHECK,NUM_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2002, 10, 'status', '対応状況', NULL, 1, 1, 'n', 'INT_LEN', 'NUM_CHECK,MAX_LENGTH_CHECK,EXIST_CHECK'),
        ('2016-01-01 00:00:00',2003, 10, 'customer_id', '顧客ID', NULL, 1, 1, 'n', 'CUSTOMER_ID_LEN', 'NUM_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2004, 10, 'order_name01', 'お名前(姓)', NULL, 1, 1, 'KVa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK,EXIST_CHECK'),
        ('2016-01-01 00:00:00',2005, 10, 'order_name02', 'お名前(名)', NULL, 1, 1, 'KVa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK,EXIST_CHECK'),
        ('2016-01-01 00:00:00',2006, 10, 'order_kana01', 'お名前(フリガナ・姓)', NULL, 1, 1, 'KVCa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK,EXIST_CHECK'),
        ('2016-01-01 00:00:00',2007, 10, 'order_kana02', 'お名前(フリガナ名)', NULL, 1, 1, 'KVCa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK,EXIST_CHECK'),
        ('2016-01-01 00:00:00',2008, 10, 'order_company_name', '会社名', NULL, 1, 1, 'KVCa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2009, 10, 'order_email', 'メールアドレス', NULL, 1, 1, 'a', 'null', 'NO_SPTAB,EMAIL_CHECK,EMAIL_CHAR_CHECK'),
        ('2016-01-01 00:00:00',2010, 10, 'order_tel01', '電話番号1', NULL, 1, 1, 'n', 'TEL_ITEM_LEN', 'MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2011, 10, 'order_tel02', '電話番号2', NULL, 1, 1, 'n', 'TEL_ITEM_LEN', 'MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2012, 10, 'order_tel03', '電話番号3', NULL, 1, 1, 'n', 'TEL_ITEM_LEN', 'MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2013, 10, 'order_zip', '郵便番号', NULL, 1, 1, 'n', 'ORDER_PENDING', 'MAX_LENGTH_CHECK,NUM_CHECK,NUM_COUNT_CHECK'),
        ('2016-01-01 00:00:00',2014, 10, 'order_pref_name', '都道府県', NULL, 1, 1, 'KVa', 'INT_LEN', 'MAX_LENGTH_CHECK,SPTAB_CHECK'),
        ('2016-01-01 00:00:00',2015, 10, 'order_addr01', '住所１', NULL, 1, 1, 'KVa', 'MTEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2016, 10, 'order_addr02', '住所２', NULL, 1, 1, 'KVa', 'MTEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2027, 10, 'deliv_fee', '送料', NULL, 1, 1, 'n', 'PRICE_LEN', 'MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2028, 10, 'charge', '手数料', NULL, 1, 1, 'n', 'PRICE_LEN', 'MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2029, 10, 'use_point', '利用ポイント', NULL, 1, 1, 'n', 'INT_LEN', 'MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2031, 10, 'deliv_id', '配送業者ID', NULL, 1, 1, 'n', 'INT_LEN', 'NUM_CHECK,MAX_LENGTH_CHECK,EXIST_CHECK'),
        ('2016-01-01 00:00:00',2032, 10, 'payment_id', '支払い方法', NULL, 1, 1, 'n', 'INT_LEN', 'NUM_CHECK,MAX_LENGTH_CHECK,EXIST_CHECK'),
        ('2016-01-01 00:00:00',2033, 10, 'note', 'SHOPメモ', NULL, 1, 1, 'KVa', 'LLTEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2034, 10, 'message', '備考', NULL, 1, 1, 'KVa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2047, 10, 'shipping_id', '配送先No.', NULL, 1, 1, 'n', 'INT_LEN', 'EXIST_CHECK,SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2048, 10, 'shipping_name01', '配送先 お名前(姓)', NULL, 1, 1, 'KVa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK,EXIST_CHECK'),
        ('2016-01-01 00:00:00',2049, 10, 'shipping_name02', '配送先 お名前(名)', NULL, 1, 1, 'KVa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK,EXIST_CHECK'),
        ('2016-01-01 00:00:00',2050, 10, 'shipping_kana01', '配送先 お名前(フリガナ・姓)', NULL, 1, 1, 'KVCa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2051, 10, 'shipping_kana02', '配送先 お名前(フリガナ名)', NULL, 1, 1, 'KVCa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2052, 10, 'shipping_company_name', '配送先 会社名', NULL, 1, 1, 'KVCa', 'STEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2053, 10, 'shipping_tel01', '配送先 電話番号1', NULL, 1, 1, 'n', 'TEL_ITEM_LEN', 'MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2054, 10, 'shipping_tel02', '配送先 電話番号2', NULL, 1, 1, 'n', 'TEL_ITEM_LEN', 'MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2055, 10, 'shipping_tel03', '配送先 電話番号3', NULL, 1, 1, 'n', 'TEL_ITEM_LEN', 'MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2056, 10, 'shipping_zip', '配送先 郵便番号', NULL, 1, 1, 'n', 'ORDER_PENDING', 'MAX_LENGTH_CHECK,NUM_CHECK,NUM_COUNT_CHECK'),
        ('2016-01-01 00:00:00',2057, 10, 'shipping_pref_name', '配送先 都道府県', NULL, 1, 1, 'KVa', 'INT_LEN', 'MAX_LENGTH_CHECK,SPTAB_CHECK'),
        ('2016-01-01 00:00:00',2058, 10, 'shipping_addr01', '配送先 住所１', NULL, 1, 1, 'KVa', 'MTEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2059, 10, 'shipping_addr02', '配送先 住所２', NULL, 1, 1, 'KVa', 'MTEXT_LEN', 'SPTAB_CHECK,MAX_LENGTH_CHECK'),
        ('2016-01-01 00:00:00',2060, 10, 'time_id', 'お届け時間ID', NULL, 1, 1, 'n', 'INT_LEN', 'MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2061, 10, 'shipping_date', 'お届け日', NULL, 1, 1, 'a', NULL, NULL),
        ('2016-01-01 00:00:00',2064, 10, 'product_class_id', '商品規格ID', NULL, 1, 1, 'n', 'INT_LEN', 'EXIST_CHECK,MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2065, 10, 'price', '商品単価', NULL, 1, 1, 'n', 'PRICE_LEN', 'EXIST_CHECK,MAX_LENGTH_CHECK,NUM_CHECK'),
        ('2016-01-01 00:00:00',2066, 10, 'quantity', '商品数量', NULL, 1, 1, 'n', 'INT_LEN', 'EXIST_CHECK,MAX_LENGTH_CHECK,NUM_CHECK');
        ");
    }

    /**
     * 停止
     * disableはプラグインを無効にした際に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param  array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    public function disable($arrPlugin)
    {
        if (SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . "admin/order/upload_csv.php") === false);

        $objQuery = SC_Query_Ex::getSingletonInstance();
        // todo 後で。
        $where = 'csv_id = 10';
        $objQuery->delete('dtb_csv', $where);
    }

    /**
     * 処理の介入箇所とコールバック関数を設定
     * registerはプラグインインスタンス生成時に実行されます
     *
     * @param SC_Helper_Plugin $objHelperPlugin
     */
    public function register(SC_Helper_Plugin $objHelperPlugin)
    {
        $objHelperPlugin->addAction('prefilterTransform', array(&$this, 'prefilterTransform'), $this->arrSelfInfo['priority']);
    }

    public function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename)
    {
        $objTransform = new SC_Helper_Transform($source);
        $template_dir = PLUGIN_UPLOAD_REALDIR . $this->arrSelfInfo['plugin_code'] .'/templates/admin/';
        switch ($objPage->arrPageLayout['device_type_id']) {
            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_PC:
                break;
            case DEVICE_TYPE_ADMIN:
            default:
                if (strpos($filename, 'order/subnavi.tpl') !== false) {
                    $objTransform->select('ul.level1 li', 1)->insertAfter(file_get_contents($template_dir . 'subnavi.tpl'));
                }
                break;
        }
        //トランスフォームされた値で書き換え
        $source = $objTransform->getHTML();
    }

}
