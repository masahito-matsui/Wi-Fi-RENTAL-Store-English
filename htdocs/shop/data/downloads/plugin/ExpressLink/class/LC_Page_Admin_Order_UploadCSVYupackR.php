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

class LC_Page_Admin_Order_UploadCSVYupackR extends LC_Page_Admin_Order_UploadCSV
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
        $this->tpl_subno = 'upload_csv_yur';
        $this->tpl_subtitle = '伝票番号登録CSV(ゆうパックプリントR)';
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
        $objFormParam->addParam("お客様側管理番号", 'record_id', MTEXT_LEN, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お問い合わせ番号", 'slip_number', 20, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("配達希望日", 'deliver_date');
        $objFormParam->addParam("配達希望時間帯", 'deliver_time_id');
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
                if ($this->shipping_time_flg == 1) {
                    switch ($arrList['deliver_time_id']) {
                        case '51':
                            $time_id = 1;
                            break;
                        case '52':
                            $time_id = 2;
                            break;
                        case '53':
                            $time_id = 3;
                            break;
                        case '54':
                            $time_id = 4;
                            break;
                        case '55':
                            $time_id = 5;
                            break;
                        case '56':
                            $time_id = 6;
                            break;
                        default:
                            $time_id = '';
                            break;
                    }
                } else {
                    switch ($arrList['deliver_time_id']) {
                        case '61':
                            $time_id = 1;
                            break;
                        case '62':
                            $time_id = 2;
                            break;
                        case '63':
                            $time_id = 3;
                            break;
                        default:
                            $time_id = '';
                            break;
                    }
                }
                $sqlval['time_id'] = $time_id;
            }
            $objQuery->update("dtb_shipping", $sqlval, $where, array($order_id, $shipping_id));
        }
    }

}

?>
