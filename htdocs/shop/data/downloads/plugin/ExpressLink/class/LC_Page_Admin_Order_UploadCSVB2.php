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

class LC_Page_Admin_Order_UploadCSVB2 extends LC_Page_Admin_Order_UploadCSV
{
    // }}}
    // {{{ functions

    /** TAGエラーチェックフィールド情報 */
    var $arrTagCheckItem;

    /** 商品テーブルカラム情報 (登録処理用) * */
    var $arrProductColumn;

    /** 商品規格テーブルカラム情報 (登録処理用) * */
    var $arrProductClassColumn;

    /** 登録フォームカラム情報 * */
    var $arrFormKeyList;
    var $arrRowErr;
    var $arrRowResult;

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init()
    {
        parent::init();
        $this->tpl_subno = 'upload_csv_b2';
        $this->tpl_subtitle = '伝票番号登録CSV(B2)';
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
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $output_flg = $objQuery->get("value", "plg_expresslink_config", "name = ?", array("yamato_output_flg"));

        $objFormParam->addParam("お客様管理番号", 'record_id', 24, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("送り状種別", 'dummy1', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("クール区分", 'dummy2', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("伝票番号", 'slip_number', 14, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("出荷予定日", 'commit_date');
        $objFormParam->addParam("お届け予定（指定）日", 'deliver_date');
        $objFormParam->addParam("配達時間帯", 'dummy3', INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先コード", 'dummy4');
        $objFormParam->addParam("お届け先電話番号", 'dummy5');
        $objFormParam->addParam("お届け先電話番号枝番", 'dummy6');
        $objFormParam->addParam("お届け先郵便番号", 'dummy7');
        $objFormParam->addParam("お届け先住所", 'dummy8', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先住所（アパートマンション名）", 'dummy9', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先会社・部門名１", 'dummy10', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先会社・部門名２", 'dummy11', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先名", 'dummy12', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先名略称カナ", 'dummy13', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("敬称", 'dummy14', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主コード", 'dummy15', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主電話番号", 'dummy16');
        $objFormParam->addParam("ご依頼主電話番号枝番", 'dummy17');
        $objFormParam->addParam("ご依頼主郵便番号", 'dummy18', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主住所１", 'dummy19', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主住所（アパートマンション名）", 'dummy69', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主名", 'dummy20', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主略称カナ", 'dummy21', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("品名コード１", 'dummy22', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("品名１", 'dummy23', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("品名コード２", 'dummy24', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("品名２", 'dummy25', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("荷扱い１", 'dummy26', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("荷扱い２", 'dummy27', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("記事", 'dummy28', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("コレクト代金引換額（税込）", 'dummy29', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("コレクト内消費税額等", 'dummy30', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("営業所止置き", 'dummy31', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("営業所コード", 'dummy32', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("発行枚数", 'dummy33', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("個数口表示フラグ", 'dummy34', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("請求先顧客コード", 'dummy35', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("請求先分類コード", 'dummy36', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("運賃管理番号", 'dummy37', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));

        if ($output_flg != 1) {
            $objFormParam->addParam("注文時カード払いデータ登録", 'dummy38', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("注文時カード払い加盟店番号", 'dummy39', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("注文時カード払い申込受付番号１", 'dummy40', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("注文時カード払い申込受付番号２", 'dummy41', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("注文時カード払い申込受付番号３", 'dummy42', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("お届け予定ｅメール利用区分", 'dummy43', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("お届け予定ｅメールe-mailアドレス", 'dummy44', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("入力機種", 'dummy45', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("お届け予定eメールメッセージ", 'dummy46', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("お届け完了ｅメール利用区分", 'dummy47', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("お届け完了ｅメールe-mailアドレス", 'dummy48', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("お届け完了eメールメッセージ", 'dummy49', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("クロネコ収納代行利用区分", 'dummy50', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("決済ＱＲコード印字フラグ", 'dummy51', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行請求金額(税込)", 'dummy52', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行内消費税額等", 'dummy53', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行請求先郵便番号", 'dummy54', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行請求先住所", 'dummy55', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行請求先住所（アパートマンション名）", 'dummy56', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行請求先会社・部門名１", 'dummy57', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行請求先会社・部門名２", 'dummy58', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行請求先名(漢字)", 'dummy59', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行請求先名(カナ)", 'dummy60', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行問合せ先名(漢字)", 'dummy61', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行問合せ先郵便番号", 'dummy62', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行問合せ先住所", 'dummy63', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行問合せ先住所（アパートマンション名）", 'dummy64', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行問合せ先電話番号", 'dummy65', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行管理番号", 'dummy66', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行品名", 'dummy67', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
            $objFormParam->addParam("収納代行備考", 'dummy68', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        }

        if ($output_flg == 3 || $output_flg == 4) {
            $objFormParam->addParam("予備０１", 'dummy69');
            $objFormParam->addParam("予備０２", 'dummy70');
            $objFormParam->addParam("予備０３", 'dummy71');
            $objFormParam->addParam("予備０４", 'dummy72');
            $objFormParam->addParam("予備０５", 'dummy73');
            $objFormParam->addParam("予備０６", 'dummy74');
            $objFormParam->addParam("予備０７", 'dummy75');
            $objFormParam->addParam("予備０８", 'dummy76');
            $objFormParam->addParam("予備０９", 'dummy77');
            $objFormParam->addParam("予備１０", 'dummy78');
            $objFormParam->addParam("予備１１", 'dummy79');
            $objFormParam->addParam("予備１２", 'dummy80');
            $objFormParam->addParam("予備１３", 'dummy81');
        }

        if ($output_flg == 2) {
            $objFormParam->addParam("複数口くくりキー", 'dummy69');
            $objFormParam->addParam("検索キータイトル１", 'dummy70');
            $objFormParam->addParam("検索キー１", 'dummy71');
            $objFormParam->addParam("検索キータイトル２", 'dummy72');
            $objFormParam->addParam("検索キー２", 'dummy73');
            $objFormParam->addParam("検索キータイトル３", 'dummy74');
            $objFormParam->addParam("検索キー３", 'dummy75');
            $objFormParam->addParam("検索キータイトル４", 'dummy74');
            $objFormParam->addParam("検索キー４", 'dummy76');
            $objFormParam->addParam("検索キータイトル５", 'dummy77');
            $objFormParam->addParam("検索キー５", 'dummy78');
            $objFormParam->addParam("発行依頼先", 'dummy79');
            $objFormParam->addParam("発行依頼先分類コード", 'dummy80');
        }

        if ($output_flg == 3 || $output_flg == 2 || $output_flg == 4) {
            $objFormParam->addParam("投函予定メール利用区分", 'dummy82');
            $objFormParam->addParam("投函予定メールe-mailアドレス", 'dummy83');
            $objFormParam->addParam("投函予定メールメッセージ", 'dummy84');
            $objFormParam->addParam("投函完了メール(受人宛て)利用区分", 'dummy85');
            $objFormParam->addParam("投函完了メール(受人)e-mailアドレス", 'dummy86');
            $objFormParam->addParam("投函完了メール(受人)メッセージ", 'dummy87');
            $objFormParam->addParam("投函完了メール(出人宛て)利用区分", 'dummy88');
            $objFormParam->addParam("投函完了メール(出人)e-mailアドレス", 'dummy89');
            $objFormParam->addParam("投函完了メール(出人)メッセージ", 'dummy90');
            if($output_flg == 4){
                $objFormParam->addParam("連携管理番号", 'dummy91');
                $objFormParam->addParam("通知メールアドレス", 'dummy92');
            }
        }
    }

}

?>
