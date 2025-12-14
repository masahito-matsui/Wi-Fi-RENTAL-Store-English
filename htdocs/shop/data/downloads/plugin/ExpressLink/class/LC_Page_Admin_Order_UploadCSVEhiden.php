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

class LC_Page_Admin_Order_UploadCSVEhiden extends LC_Page_Admin_Order_UploadCSV
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
        $this->tpl_subno = 'upload_csv_eh';
        $this->tpl_subtitle = '伝票番号登録CSV(e飛伝II)';
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
        $objFormParam->addParam("お問合せ送り状№", 'slip_number', 14, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("出荷日時", 'commit_date');
        $objFormParam->addParam("住所録コード", 'dummy1');
        $objFormParam->addParam("お届け先電話番号", 'dummy2');
        $objFormParam->addParam("お届け先郵便番号", 'dummy3');
        $objFormParam->addParam("お届け先住所1", 'dummy4', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先住所2", 'dummy5', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先住所3", 'dummy49', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先JISコード", 'dummy6');
        $objFormParam->addParam("お届け先名称1", 'dummy7', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お届け先名称2", 'dummy8', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("グループ名", 'dummy9', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お客様管理ナンバー", 'record_id', MTEXT_LEN, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お客様管理コード", 'dummy11', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("荷送人電話番号", 'dummy12');
        $objFormParam->addParam("荷送人郵便番号", 'dummy13', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("荷送人住所１", 'dummy14', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("荷送人住所２", 'dummy15', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("荷送人名称１", 'dummy16', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("荷送人名称２", 'dummy17', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("部署・担当者", 'dummy18', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主コード", 'dummy19', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主電話番号", 'dummy20');
        $objFormParam->addParam("ご依頼主郵便番号", 'dummy21', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主住所１", 'dummy22', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主住所２", 'dummy23', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主名称１", 'dummy24', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ご依頼主名称２", 'dummy25', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("荷姿コード", 'dummy26', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("品名１", 'dummy27', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("品名２", 'dummy28', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("品名３", 'dummy29', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("品名４", 'dummy30', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("品名５", 'dummy31', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("出荷個数", 'dummy32', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("便種（スピードで選択）", 'dummy33', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("便種（商品）", 'dummy34', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("配達日", 'deliver_date', 30, 'Va', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("配達指定時間帯", 'dummy35', INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("配達指定時間帯（時分）", 'dummy50', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("代引金額", 'dummy36', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("消費税", 'dummy37', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("決済種別", 'dummy38', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("保険金額", 'dummy39', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("保険金額印字", 'dummy40', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("指定シール１", 'dummy41', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("指定シール２", 'dummy42', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("指定シール３", 'dummy43', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("営業店止め", 'dummy44', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("SRC区分", 'dummy45', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("営業店コード", 'dummy46', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("元着区分", 'dummy47', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("削除区分", 'dummy48', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
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
                $year = substr($arrList["deliver_date"], 0, 4);
                $month = substr($arrList["deliver_date"], 4, 2);
                $day = substr($arrList["deliver_date"], 6, 2);
                $sqlval["shipping_date"] = SC_Utils_Ex::sfGetTimestamp($year, $month, $day);
            }
            $objQuery->update("dtb_shipping", $sqlval, $where, array($order_id, $shipping_id));
        }
    }

}

?>
