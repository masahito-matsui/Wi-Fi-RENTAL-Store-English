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

class LC_Page_Admin_Order_UploadCSVEhidenPro extends LC_Page_Admin_Order_UploadCSV
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
        $this->tpl_subno = 'upload_csv_eh_pro';
        $this->tpl_subtitle = '伝票番号登録CSV(e飛伝Pro)';
        $this->header_skip = 1;
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
        $output_flg = plg_ExpressLink_Utils::getConfig("sagawa_pro_format");

        $objFormParam->addParam("ご依頼主コード", 'dummy1');
        $objFormParam->addParam("部署ご担当者コード", 'dummy2');
        $objFormParam->addParam("部署ご担当者名", 'dummy3');
        $objFormParam->addParam("ご依頼主電話", 'dummy4');
        $objFormParam->addParam("お届け先コード", 'dummy5');
        $objFormParam->addParam("お届け先郵便番号", 'dummy6');
        $objFormParam->addParam("お届け先名1", 'dummy7');
        $objFormParam->addParam("お届け先名2", 'dummy8');
        $objFormParam->addParam("お届け先住所1", 'dummy9');
        $objFormParam->addParam("お届け先住所2", 'dummy10');
        $objFormParam->addParam("お届け先住所3", 'dummy11');
        $objFormParam->addParam("お届け先電話", 'dummy12');
        $objFormParam->addParam("ご不在連絡先電話", 'dummy13');
        $objFormParam->addParam("メールアドレス", 'dummy14');
        $objFormParam->addParam("代行ご依頼主コード", 'dummy15');
        $objFormParam->addParam("代行ご依頼主郵便番号", 'dummy16');
        $objFormParam->addParam("代行ご依頼主名１", 'dummy17');
        $objFormParam->addParam("代行ご依頼主名２", 'dummy18');
        $objFormParam->addParam("代行ご依頼主住所１", 'dummy19');
        $objFormParam->addParam("代行ご依頼主住所２", 'dummy20');
        $objFormParam->addParam("代行ご依頼主住所３", 'dummy21');
        $objFormParam->addParam("代行ご依頼主電話", 'dummy22');
        $objFormParam->addParam("送り状記事欄1_1", 'dummy23');
        $objFormParam->addParam("送り状記事欄1_2", 'dummy24');
        $objFormParam->addParam("送り状記事欄1_3", 'dummy25');
        $objFormParam->addParam("送り状記事欄1_4", 'dummy26');
        $objFormParam->addParam("送り状記事欄1_5", 'dummy27');
        $objFormParam->addParam("送り状記事欄1_6", 'dummy28');
        $objFormParam->addParam("送り状記事欄2_1", 'dummy29');
        $objFormParam->addParam("送り状記事欄2_2", 'dummy30');
        $objFormParam->addParam("送り状記事欄2_3", 'dummy31');
        $objFormParam->addParam("送り状記事欄2_4", 'dummy32');
        $objFormParam->addParam("送り状記事欄2_5", 'dummy33');
        $objFormParam->addParam("送り状記事欄2_6", 'dummy34');
        $objFormParam->addParam("荷札記事欄1_1", 'dummy35');
        $objFormParam->addParam("荷札記事欄1_2", 'dummy36');
        $objFormParam->addParam("荷札記事欄1_3", 'dummy37');
        $objFormParam->addParam("荷札記事欄1_4", 'dummy38');
        $objFormParam->addParam("荷札記事欄1_5", 'dummy39');
        $objFormParam->addParam("荷札記事欄1_6", 'dummy40');
        $objFormParam->addParam("荷札記事欄2_1", 'dummy41');
        $objFormParam->addParam("荷札記事欄2_2", 'dummy42');
        $objFormParam->addParam("荷札記事欄2_3", 'dummy43');
        $objFormParam->addParam("荷札記事欄2_4", 'dummy44');
        $objFormParam->addParam("荷札記事欄2_5", 'dummy45');
        $objFormParam->addParam("荷札記事欄2_6", 'dummy46');
        $objFormParam->addParam("出荷日", 'commit_date');
        $objFormParam->addParam("発行日", 'dummy47');
        $objFormParam->addParam("配達指定日", 'deliver_date', 30, 'Va', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("個数", 'dummy48');
        if ($output_flg == 1) {
            $objFormParam->addParam("元着区分", 'dummy74');
        }
        $objFormParam->addParam("保険金額", 'dummy50');
        $objFormParam->addParam("決済種別", 'dummy51');
        $objFormParam->addParam("代引金額", 'dummy52');
        $objFormParam->addParam("消費税", 'tax');
        $objFormParam->addParam("代引税込金額", 'payment_total');
        $objFormParam->addParam("消費税区分", 'dummy53');
        $objFormParam->addParam("問い合せ№", 'slip_number', 12, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("旧問い合せ№", 'dummy54');
        $objFormParam->addParam("顧客管理番号", 'record_id', 20, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("清算店コード", 'dummy55');
        $objFormParam->addParam("清算店枝番", 'dummy56');
        $objFormParam->addParam("着店コード", 'dummy57');
        $objFormParam->addParam("ローカルコード", 'dummy58');
        $objFormParam->addParam("営止め区分", 'plg_expresslink_center_stop');
        $objFormParam->addParam("営止め県コード", 'dummy59');
        $objFormParam->addParam("営止めJIS住所コード", 'dummy60');
        $objFormParam->addParam("営止め清算店コード", 'dummy61');
        $objFormParam->addParam("営止め清算店枝番", 'dummy62');
        $objFormParam->addParam("営止め営業店コード", 'plg_expresslink_center_code');
        $objFormParam->addParam("営止めローカルコード", 'dummy63');
        $objFormParam->addParam("クール指定区分", 'dummy64');
        $objFormParam->addParam("便種コード", 'dummy65');
        $objFormParam->addParam("時間帯コード", 'dummy66');
        $objFormParam->addParam("配達指定時間", 'dummy67');
        $objFormParam->addParam("サンデーサービス区分", 'dummy68');
        $objFormParam->addParam("シールコード１", 'dummy69');
        $objFormParam->addParam("シールコード２", 'dummy70');
        $objFormParam->addParam("シールコード３", 'dummy71');
        $objFormParam->addParam("シールコード４", 'dummy72');
        $objFormParam->addParam("出荷区分", 'dummy73');
        if ($output_flg != 1) {
            $objFormParam->addParam("元着区分", 'dummy74');
        }
        $objFormParam->addParam("送り状発行済区分", 'dummy75');
        $objFormParam->addParam("送り状変更区分", 'dummy76');
        $objFormParam->addParam("送り状変更発行済区分", 'dummy77');
        $objFormParam->addParam("荷札発行済区分", 'dummy78');
        $objFormParam->addParam("荷札変更区分", 'dummy79');
        $objFormParam->addParam("荷札変更発行済区分", 'dummy80');
        $objFormParam->addParam("出荷日報発行済区分", 'dummy81');
        $objFormParam->addParam("荷物受渡書発行済区分", 'dummy82');
        $objFormParam->addParam("受託送信済区分", 'dummy83');
        $objFormParam->addParam("出荷場印字区分", 'dummy84');
        $objFormParam->addParam("取込エラー区分", 'dummy85');
        $objFormParam->addParam("JISコード", 'dummy86');
        $objFormParam->addParam("JIS8コード", 'dummy87');
        $objFormParam->addParam("クール不可可能性区分", 'dummy88');
        $objFormParam->addParam("代引不可可能性区分", 'dummy89');
        $objFormParam->addParam("着払不可可能性区分", 'dummy90');
        $objFormParam->addParam("時間帯不可可能性区分", 'dummy91');
        $objFormParam->addParam("保険金額印字区分", 'dummy92');
        $objFormParam->addParam("編集01", 'dummy93');
        $objFormParam->addParam("編集02", 'dummy94');
        $objFormParam->addParam("編集03", 'dummy95');
        $objFormParam->addParam("編集04", 'dummy96');
        $objFormParam->addParam("編集05", 'dummy97');
        $objFormParam->addParam("編集06", 'dummy98');
        $objFormParam->addParam("編集07", 'dummy99');
        $objFormParam->addParam("編集08", 'dummy100');
        $objFormParam->addParam("編集09", 'dummy101');
        $objFormParam->addParam("編集10", 'dummy102');
        $objFormParam->addParam("個数集約区分", 'dummy103');
        if ($output_flg != 1) {
            $objFormParam->addParam("重量値1", 'dummy104');
            $objFormParam->addParam("重量単位区分1", 'dummy105');
            $objFormParam->addParam("個数1", 'dummy106');
            $objFormParam->addParam("重量値2", 'dummy107');
            $objFormParam->addParam("重量単位区分2", 'dummy108');
            $objFormParam->addParam("個数2", 'dummy109');
            $objFormParam->addParam("重量値3", 'dummy110');
            $objFormParam->addParam("重量単位区分3", 'dummy111');
            $objFormParam->addParam("個数3", 'dummy112');
            $objFormParam->addParam("重量値4", 'dummy113');
            $objFormParam->addParam("重量単位区分4", 'dummy114');
            $objFormParam->addParam("個数4", 'dummy115');
            $objFormParam->addParam("重量値5", 'dummy116');
            $objFormParam->addParam("重量単位区分5", 'dummy117');
            $objFormParam->addParam("個数5", 'dummy118');
            $objFormParam->addParam("重量値6", 'dummy119');
            $objFormParam->addParam("重量単位区分6", 'dummy120');
            $objFormParam->addParam("個数6", 'dummy121');
            $objFormParam->addParam("重量値7", 'dummy122');
            $objFormParam->addParam("重量単位区分7", 'dummy123');
            $objFormParam->addParam("個数7", 'dummy124');
            $objFormParam->addParam("重量値8", 'dummy125');
            $objFormParam->addParam("重量単位区分8", 'dummy126');
            $objFormParam->addParam("個数8", 'dummy127');
            $objFormParam->addParam("貨物実発送日", 'dummy128');
            $objFormParam->addParam("貨物重量", 'dummy129');
            $objFormParam->addParam("貨物個数", 'dummy130');
            $objFormParam->addParam("貨物配完集配状態コード", 'dummy131');
            $objFormParam->addParam("貨物配完報告日時", 'dummy132');
            $objFormParam->addParam("貨物配完作成日時", 'dummy133');
            $objFormParam->addParam("貨物消込集配状態コード", 'dummy134');
            $objFormParam->addParam("貨物消込報告日時", 'dummy135');
            $objFormParam->addParam("貨物消込作成日時", 'dummy136');
            $objFormParam->addParam("貨物転送返送No.", 'dummy137');
            $objFormParam->addParam("貨物更新日時", 'dummy138');
            $objFormParam->addParam("貨物登録日時", 'dummy139');
            $objFormParam->addParam("配完区分コード", 'dummy140');
        }
        $objFormParam->addParam("削除日", 'dummy141');
        $objFormParam->addParam("削除時間", 'dummy142');
        if ($output_flg == 1) {
            $objFormParam->addParam("固定文字", 'dummy143');
        }
    }

    function lfRegistOrder($objQuery, $line = "", &$objFormParam)
    {
        // 登録データ対象取得
        $arrList = $objFormParam->getHashArray();


        if ($arrList['record_id'] != "") {
            $ret = explode('-', $arrList['record_id']);
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
