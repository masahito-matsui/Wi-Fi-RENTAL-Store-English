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

class LC_Page_Admin_Order_UploadCSVYupack extends LC_Page_Admin_Order_UploadCSV
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
        $this->tpl_subno = 'upload_csv_yu';
        $this->tpl_subtitle = '伝票番号登録CSV(ゆうパックプリントv4)';
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
        $objFormParam->addParam("レコード番号", 'dummy1');
        $objFormParam->addParam("ユーザーコード", 'dummy2');
        $objFormParam->addParam("料金計算区分", 'dummy3');
        $objFormParam->addParam("料金計算フラグ", 'dummy4');
        $objFormParam->addParam("料金計算エラーフラグ", 'dummy5');
        $objFormParam->addParam("お届け先郵便番号エラー", 'dummy6');
        $objFormParam->addParam("お届け先顧客コード", 'dummy7');
        $objFormParam->addParam("お届け先郵便番号", 'dummy8');
        $objFormParam->addParam("お届け先住所", 'dummy9');
        $objFormParam->addParam("お届け先都道府県コード", 'dummy10');
        $objFormParam->addParam("お届け先市区町村コード", 'dummy11');
        $objFormParam->addParam("お届け先カスタマーバーコード", 'dummy12');
        $objFormParam->addParam("お届け先氏名", 'dummy13');
        $objFormParam->addParam("お届け先カナ名称", 'dummy14');
        $objFormParam->addParam("お届け先敬称", 'dummy15');
        $objFormParam->addParam("お届け先電話番号", 'dummy16');
        $objFormParam->addParam("お届け先メールアドレス", 'dummy17');
        $objFormParam->addParam("お届け先会員番号", 'dummy18');
        $objFormParam->addParam("ご依頼主郵便番号エラー", 'dummy19');
        $objFormParam->addParam("ご依頼主顧客コード", 'dummy20');
        $objFormParam->addParam("ご依頼主郵便番号", 'dummy21');
        $objFormParam->addParam("ご依頼主住所", 'dummy22');
        $objFormParam->addParam("ご依頼主カスタマーバーコード", 'dummy23');
        $objFormParam->addParam("ご依頼主氏名", 'dummy24');
        $objFormParam->addParam("ご依頼主カナ名称", 'dummy25');
        $objFormParam->addParam("ご依頼主敬称", 'dummy26');
        $objFormParam->addParam("ご依頼主電話番号", 'dummy27');
        $objFormParam->addParam("ご依頼主メール利用フラグ", 'dummy28');
        $objFormParam->addParam("ご依頼主メールアドレス", 'dummy29');
        $objFormParam->addParam("ご依頼主会員番号", 'dummy30');
        $objFormParam->addParam("お届け先／ご依頼主同一フラグ", 'dummy31');
        $objFormParam->addParam("ご依頼主／ユーザー同一フラグ", 'dummy32');
        $objFormParam->addParam("郵便種別", 'dummy33');
        $objFormParam->addParam("送り状コード", 'dummy34');
        $objFormParam->addParam("お届け通知ハガキ使用フラグ", 'dummy35');
        $objFormParam->addParam("お届け通知メール使用フラグ", 'dummy36');
        $objFormParam->addParam("商品番号", 'dummy37');
        $objFormParam->addParam("商品名称", 'dummy38');
        $objFormParam->addParam("商品金額", 'dummy39');
        $objFormParam->addParam("こわれもの", 'dummy40');
        $objFormParam->addParam("なまもの", 'dummy41');
        $objFormParam->addParam("ビン類", 'dummy42');
        $objFormParam->addParam("逆さま厳禁", 'dummy43');
        $objFormParam->addParam("不在留め置き期間", 'dummy44');
        $objFormParam->addParam("サイズ", 'dummy45');
        $objFormParam->addParam("商品重量", 'dummy46');
        $objFormParam->addParam("閾値重量", 'dummy47');
        $objFormParam->addParam("支払方法区分", 'dummy48');
        $objFormParam->addParam("適用特別料金種別", 'dummy49');
        $objFormParam->addParam("料金体系", 'dummy50');
        $objFormParam->addParam("料金計算用サイズまたは重量", 'dummy51');
        $objFormParam->addParam("郵便番号エラー", 'dummy52');
        $objFormParam->addParam("差出／集荷局郵便番号", 'dummy53');
        $objFormParam->addParam("差出／集荷局都道府県コード", 'dummy54');
        $objFormParam->addParam("差出／集荷局市区町村コード", 'dummy55');
        $objFormParam->addParam("地帯番号", 'dummy56');
        $objFormParam->addParam("速達・配達日指定種別", 'dummy57');
        $objFormParam->addParam("配達指定日／希望日", 'deliver_date');
        $objFormParam->addParam("配達指定日曜日種別", 'dummy59');
        $objFormParam->addParam("配達希望時間", 'dummy60');
        $objFormParam->addParam("書留／セキュリティ種別", 'dummy61');
        $objFormParam->addParam("保冷種別", 'dummy62');
        $objFormParam->addParam("元／着払い種別", 'dummy63');
        $objFormParam->addParam("差出方法", 'dummy64');
        $objFormParam->addParam("割引区分", 'dummy65');
        $objFormParam->addParam("書留／セキュリティ損害要償額", 'dummy66');
        $objFormParam->addParam("基本料金", 'dummy67');
        $objFormParam->addParam("速達・配達日指定料金", 'dummy68');
        $objFormParam->addParam("保冷料金", 'dummy69');
        $objFormParam->addParam("割引料金", 'dummy70');
        $objFormParam->addParam("運賃等", 'dummy71');
        $objFormParam->addParam("書留／セキュリティ料金", 'dummy72');
        $objFormParam->addParam("代引引換手数料", 'dummy73');
        $objFormParam->addParam("その他料金", 'dummy74');
        $objFormParam->addParam("領収金額", 'dummy75');
        $objFormParam->addParam("代引利用区分", 'dummy76');
        $objFormParam->addParam("消費税課税負担者フラグ", 'dummy77');
        $objFormParam->addParam("消費税計算区分", 'dummy78');
        $objFormParam->addParam("交付種別", 'dummy79');
        $objFormParam->addParam("代引種別", 'dummy80');
        $objFormParam->addParam("代引送金方法", 'dummy81');
        $objFormParam->addParam("代引金額", 'dummy82');
        $objFormParam->addParam("代引消費税金額", 'dummy83');
        $objFormParam->addParam("代引課税対象額", 'dummy84');
        $objFormParam->addParam("代引印紙税額", 'dummy85');
        $objFormParam->addParam("代引送金手数料", 'dummy86');
        $objFormParam->addParam("代引送金金額", 'dummy87');
        $objFormParam->addParam("加入者名", 'dummy88');
        $objFormParam->addParam("振替口座１", 'dummy89');
        $objFormParam->addParam("振替口座２", 'dummy90');
        $objFormParam->addParam("振替口座３", 'dummy91');
        $objFormParam->addParam("総合口座１", 'dummy92');
        $objFormParam->addParam("総合口座２", 'dummy93');
        $objFormParam->addParam("総合口座３", 'dummy94');
        $objFormParam->addParam("データ通知サービス利用区分", 'dummy95');
        $objFormParam->addParam("コマーシャルデータ", 'dummy96');
        $objFormParam->addParam("受注番号", 'dummy97');
        $objFormParam->addParam("代引まとめ利用区分", 'dummy98');
        $objFormParam->addParam("代引まとめバーコード", 'dummy99');
        $objFormParam->addParam("代引まとめ清算代引金額", 'dummy100');
        $objFormParam->addParam("代引まとめ清算代引消費税金額", 'dummy101');
        $objFormParam->addParam("代引まとめ代引課税対象額", 'dummy102');
        $objFormParam->addParam("代引まとめ代引印紙税額", 'dummy103');
        $objFormParam->addParam("代引まとめ代引送金手数料", 'dummy104');
        $objFormParam->addParam("代引まとめ代引送金金額", 'dummy105');
        $objFormParam->addParam("代引まとめ差出データ作成済フラグ", 'dummy106');
        $objFormParam->addParam("代引まとめ清算データ書き込み日付", 'dummy107');
        $objFormParam->addParam("代引まとめ代金入金日", 'dummy108');
        $objFormParam->addParam("代引まとめ計理日", 'dummy109');
        $objFormParam->addParam("代引まとめ決済手段コード", 'dummy110');
        $objFormParam->addParam("配達ステータス集約コード", 'dummy111');
        $objFormParam->addParam("配達ステータス明細コード", 'dummy112');
        $objFormParam->addParam("フリー項目１", 'record_id', MTEXT_LEN, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("フリー項目２", 'dummy114');
        $objFormParam->addParam("フリー項目３", 'dummy115');
        $objFormParam->addParam("フリー項目４", 'dummy116');
        $objFormParam->addParam("フリー項目５", 'dummy117');
        $objFormParam->addParam("日付 出荷予定日", 'dummy118');
        $objFormParam->addParam("日付 出荷日", 'dummy119');
        $objFormParam->addParam("日付 出荷予定データ作成日", 'dummy120');
        $objFormParam->addParam("日付 大口FD出力日付", 'dummy121');
        $objFormParam->addParam("料金印刷指示フラグ", 'dummy122');
        $objFormParam->addParam("大口FD出力フラグ", 'dummy123');
        $objFormParam->addParam("お届け先メール作成済フラグ", 'dummy124');
        $objFormParam->addParam("ご依頼主メール作成済フラグ", 'dummy125');
        $objFormParam->addParam("テストIDフラグ", 'dummy126');
        $objFormParam->addParam("お問い合わせ番号", 'slip_number', 14, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("データ種別", 'dummy128');
        $objFormParam->addParam("出荷予定データ作成日時", 'dummy129');
        $objFormParam->addParam("送り状印刷日時", 'dummy130');
        $objFormParam->addParam("下積み厳禁", 'dummy131');
        $objFormParam->addParam("仕分けコード", 'dummy132');
    }

}

?>
