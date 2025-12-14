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

class LC_Page_Admin_Order_UploadCSVEbusiness extends LC_Page_Admin_Order_UploadCSV
{

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init()
    {
        parent::init();
        $this->tpl_subno = 'upload_csv_ebis';
        $this->tpl_subtitle = '伝票番号登録CSV(e-発行)';
        $this->header_skip = 2;
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

        $objFormParam->addParam("発行種別", 'dummy1');
        $objFormParam->addParam("状態", 'dummy2');
        $objFormParam->addParam("受託日", 'dummy3');
        $objFormParam->addParam("配達完了日", 'dummy4');
        $objFormParam->addParam("送り状種別", 'dummy5');
        $objFormParam->addParam("セキュリティ", 'dummy6');
        $objFormParam->addParam("個数", 'dummy7');
        $objFormParam->addParam("お問い合わせ番号", 'slip_number', 16, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先名１", 'dummy8');
        $objFormParam->addParam("お届け先名２", 'dummy9');
        $objFormParam->addParam("お届け先電話番号", 'dummy10');
        $objFormParam->addParam("お届け先郵便番号", 'dummy11');
        $objFormParam->addParam("お届け先住所", 'dummy12');
        $objFormParam->addParam("荷送人名１", 'dummy13');
        $objFormParam->addParam("荷送人名２", 'dummy14');
        $objFormParam->addParam("荷送人電話番号", 'dummy15');
        $objFormParam->addParam("荷送人郵便番号", 'dummy16');
        $objFormParam->addParam("荷送人住所", 'dummy17');
        $objFormParam->addParam("荷送人担当者・部門(連絡先)", 'dummy18');
        $objFormParam->addParam("荷送人担当者・部門(名称)", 'dummy19');
        $objFormParam->addParam("品名１", 'dummy20');
        $objFormParam->addParam("数量１", 'dummy21');
        $objFormParam->addParam("品名２", 'dummy22');
        $objFormParam->addParam("数量２", 'dummy23');
        $objFormParam->addParam("品名３", 'dummy24');
        $objFormParam->addParam("数量３", 'dummy25');
        $objFormParam->addParam("品名４", 'dummy26');
        $objFormParam->addParam("数量４", 'dummy27');
        $objFormParam->addParam("品名５", 'dummy28');
        $objFormParam->addParam("数量５", 'dummy29');
        $objFormParam->addParam("荷物価格", 'dummy30');
        $objFormParam->addParam("荷扱い種別", 'dummy31');
        $objFormParam->addParam("記事１", 'dummy32');
        $objFormParam->addParam("記事２", 'dummy33');
        $objFormParam->addParam("お客様番号", 'record_id', 24, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("出荷予定日", 'dummy34');
        $objFormParam->addParam("配達希望日", 'deliver_date');
        $objFormParam->addParam("配達希望日(終了)", 'dummy36');
        $objFormParam->addParam("配達希望時間帯", 'dummy37');
        $objFormParam->addParam("サイズ", 'dummy38');
        $objFormParam->addParam("品代金", 'dummy39');
        $objFormParam->addParam("配達完了通知", 'dummy40');
        $objFormParam->addParam("配達完了通知メールアドレス", 'dummy41');
        $objFormParam->addParam("配達予定通知", 'dummy42');
        $objFormParam->addParam("配達予定通知メールアドレス", 'dummy43');
        $objFormParam->addParam("配達店止め", 'dummy44');
        $objFormParam->addParam("配達店コード", 'dummy45');
        $objFormParam->addParam("運賃", 'dummy46');
        $objFormParam->addParam("登録日", 'dummy47');
    }

}

?>
