<?php

/*
* Plugin Code : ExpressLink
*
* Copyright (C) 2016 BraTech Co., Ltd. All Rights Reserved.
* http://www.bratech.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

// {{{ requires
require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/class/LC_Page_Admin_Order_UploadCSV.php";

class LC_Page_Admin_Order_UploadCSVBizLogiDEPO extends LC_Page_Admin_Order_UploadCSV
{
    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init()
    {
        parent::init();
        $this->tpl_subno = 'upload_csv_depo';
        $this->tpl_subtitle = '伝票番号登録CSV(BizLogi DEPO)';
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process()
    {
        $this->action();
        $this->sendResponse();
    }

    /**
     * 入力情報の初期化を行う.
     *
     * @param array CSV構造設定配列
     * @return void
     */
    function lfInitParam(&$objFormParam)
    {
        $objFormParam->addParam("問い合せ№", 'slip_number', 12, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お客様管理番号", 'record_id', 16, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("予約フラグ", 'dummy1');
        $objFormParam->addParam("出荷予定日", 'dummy2');
        $objFormParam->addParam("MVS確定区分", 'dummy3');
        $objFormParam->addParam("MVS着店編集不可フラグ", 'dummy4');
        $objFormParam->addParam("出荷日", 'commit_date');
        $objFormParam->addParam("配達指定日", 'deliver_date', 30, 'Va', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("配達指定時間帯", 'dummy5');
        $objFormParam->addParam("配達指定時刻", 'dummy6');
        $objFormParam->addParam("顧客コード", 'dummy7');
        $objFormParam->addParam("お届先コード", 'dummy8');
        $objFormParam->addParam("お届先JIS市区町村コード", 'dummy9');
        $objFormParam->addParam("お届先郵便番号", 'dummy10');
        $objFormParam->addParam("お届先住所1", 'dummy11');
        $objFormParam->addParam("お届先住所2", 'dummy12');
        $objFormParam->addParam("お届先住所3", 'dummy13');
        $objFormParam->addParam("お届先住所4", 'dummy14');
        $objFormParam->addParam("お届先住所5", 'dummy15');
        $objFormParam->addParam("お届先住所6", 'dummy16');
        $objFormParam->addParam("お届先住所7", 'dummy17');
        $objFormParam->addParam("お届先電話番号", 'dummy18');
        $objFormParam->addParam("お届先メールアドレス", 'dummy19');
        $objFormParam->addParam("代行荷主フラグ", 'dummy20');
        $objFormParam->addParam("ご依頼主郵便番号", 'dummy21');
        $objFormParam->addParam("ご依頼主住所1", 'dummy22');
        $objFormParam->addParam("ご依頼主住所2", 'dummy23');
        $objFormParam->addParam("ご依頼主住所3", 'dummy24');
        $objFormParam->addParam("ご依頼主住所4", 'dummy25');
        $objFormParam->addParam("ご依頼主住所5", 'dummy26');
        $objFormParam->addParam("ご依頼主電話番号", 'dummy27');
        $objFormParam->addParam("ご依頼主メールアドレス", 'dummy28');
        $objFormParam->addParam("着店清算コード", 'dummy29');
        $objFormParam->addParam("着店ローカルコード", 'dummy30');
        $objFormParam->addParam("営業所止めフラグ", 'dummy31');
        $objFormParam->addParam("伝票区分", 'dummy32');
        $objFormParam->addParam("便種コード", 'dummy33');
        $objFormParam->addParam("書込運賃", 'dummy34');
        $objFormParam->addParam("代引金額", 'dummy35');
        $objFormParam->addParam("代引消費税", 'dummy36');
        $objFormParam->addParam("保険金額", 'dummy37');
        $objFormParam->addParam("立替金額", 'dummy38');
        $objFormParam->addParam("コメント", 'dummy39');
        $objFormParam->addParam("記事欄１", 'dummy40');
        $objFormParam->addParam("記事欄２", 'dummy41');
        $objFormParam->addParam("記事欄３", 'dummy42');
        $objFormParam->addParam("記事欄４", 'dummy43');
        $objFormParam->addParam("記事欄５", 'dummy44');
        $objFormParam->addParam("記事欄６", 'dummy45');
        $objFormParam->addParam("記事欄７", 'dummy46');
        $objFormParam->addParam("記事欄８", 'dummy47');
        $objFormParam->addParam("記事欄９", 'dummy48');
        $objFormParam->addParam("記事欄１０", 'dummy49');
        $objFormParam->addParam("記事欄１１", 'dummy50');
        $objFormParam->addParam("記事欄１２", 'dummy51');
        $objFormParam->addParam("総個口数", 'dummy52');
        $objFormParam->addParam("総重量", 'dummy53');
        $objFormParam->addParam("確定日", 'dummy54');
        $objFormParam->addParam("確定回数", 'dummy55');
        $objFormParam->addParam("出荷指示作成日時", 'dummy56');
        $objFormParam->addParam("確定処理実行日時", 'dummy57');
    }

    function lfRegistOrder($objQuery, $line = "", &$objFormParam)
    {
        // 登録データ対象取得
        $arrList = $objFormParam->getHashArray();


        if ($arrList['record_id'] != "") {
            $ret = explode('_', $arrList['record_id']);
            $order_id = intval($ret[0]);
            $shipping_id = intval($ret[1]);
            $where = "order_id = ? AND shipping_id = ?";

            $sqlval = array("plg_expresslink_slip_number" => $arrList["slip_number"]);
            if (strlen($arrList["deliver_date"]) > 0 && $this->import_shipping_date_flg == 1) {
                list($year, $month, $day) = explode("/", $arrList["deliver_date"]);
                $sqlval["shipping_date"] = SC_Utils_Ex::sfGetTimestamp($year, $month, $day);
            }
            $objQuery->update("dtb_shipping", $sqlval, $where, array($order_id, $shipping_id));
        }
    }

}

?>
