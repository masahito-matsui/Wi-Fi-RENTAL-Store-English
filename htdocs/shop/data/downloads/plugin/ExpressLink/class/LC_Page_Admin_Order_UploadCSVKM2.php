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

class LC_Page_Admin_Order_UploadCSVKM2 extends LC_Page_Admin_Order_UploadCSV
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
        $this->tpl_subno = 'upload_csv_km2';
        $this->tpl_subtitle = '伝票番号登録CSV(カンガルー・マジック2)';
        $this->header_skip = 0;
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
        $objFormParam->addParam("出荷予定日", 'commit_date');
        $objFormParam->addParam("管理番号", 'record_id', MTEXT_LEN, 'a', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お問合せ番号", 'slip_number', 10, 'a', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("元着区分", 'dummy1');
        $objFormParam->addParam("原票区分", 'dummy2');
        $objFormParam->addParam("個数", 'dummy3');
        $objFormParam->addParam("重量区分", 'dummy4');
        $objFormParam->addParam("重量（Ｋ)", 'dummy5');
        $objFormParam->addParam("重量（才）", 'dummy6');
        $objFormParam->addParam("荷送人コード", 'dummy7');
        $objFormParam->addParam("荷送人名称", 'dummy8');
        $objFormParam->addParam("荷送人住所１", 'dummy9');
        $objFormParam->addParam("荷送人住所２", 'dummy10');
        $objFormParam->addParam("荷送人電話番号", 'dummy11');
        $objFormParam->addParam("部署コード", 'dummy12');
        $objFormParam->addParam("部署名", 'dummy13');
        $objFormParam->addParam("お届け先コード", 'dummy14');
        $objFormParam->addParam("お届け先郵便番号", 'dummy15');
        $objFormParam->addParam("お届け先名称１", 'dummy16');
        $objFormParam->addParam("お届け先名称２", 'dummy17');
        $objFormParam->addParam("お届け先住所１", 'dummy18');
        $objFormParam->addParam("お届け先住所２", 'dummy19');
        $objFormParam->addParam("お届け先電話番号", 'dummy20');
        $objFormParam->addParam("お届け先JIS市町村コード", 'dummy21');
        $objFormParam->addParam("止商品区分", 'dummy22');
        $objFormParam->addParam("止指定店名称", 'dummy23');
        $objFormParam->addParam("保険金額", 'dummy24');
        $objFormParam->addParam("輸送指示コード１", 'dummy25');
        $objFormParam->addParam("輸送指示1", 'dummy26');
        $objFormParam->addParam("輸送指示コード２", 'dummy27');
        $objFormParam->addParam("輸送指示2", 'dummy28');
        $objFormParam->addParam("配達指定区分", 'deliver_date');
        $objFormParam->addParam("記事コード１", 'dummy29');
        $objFormParam->addParam("記事１", 'dummy30');
        $objFormParam->addParam("記事コード２", 'dummy31');
        $objFormParam->addParam("記事２", 'dummy32');
        $objFormParam->addParam("記事コード３", 'dummy33');
        $objFormParam->addParam("記事３", 'dummy34');
        $objFormParam->addParam("記事コード４", 'dummy35');
        $objFormParam->addParam("記事４", 'dummy36');
        $objFormParam->addParam("記事コード５", 'dummy37');
        $objFormParam->addParam("記事５", 'dummy38');
        $objFormParam->addParam("出荷一覧表印刷日", 'dummy39');
        $objFormParam->addParam("出荷情報登録日", 'dummy40');
        $objFormParam->addParam("出荷情報更新日", 'dummy41');
        if (plg_ExpressLink_Utils::getConfig("km2_cod_input") == 1) {
            $objFormParam->addParam("品代金", 'dummy42');
            $objFormParam->addParam("消費税等", 'dummy43');
        }
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
                $month = substr($arrList["deliver_date"], 0, 2);
                $day = substr($arrList["deliver_date"], 2, 2);
                if ($month == '00' && $day == '00') {
                    $sqlval["shipping_date"] = NULL;
                } else {
                    $year = date('Y');
                    if (intval($month) < intval(date('m')))
                        $year++;
                    $sqlval["shipping_date"] = SC_Utils_Ex::sfGetTimestamp($year, $month, $day);
                }
                $km2_time_id = substr($arrList["deliver_date"], 4, 1);
                if (plg_ExpressLink_Utils::getConfig("km2_send_type") == 8) {
                    switch ($km2_time_id) {
                        case 5:
                            $time_id = 1;
                            break;
                        case 6:
                            $time_id = 2;
                            break;
                        case 7:
                            $time_id = 3;
                            break;
                        default:
                            $time_id = NULL;
                            break;
                    }
                } else {
                    switch ($km2_time_id) {
                        case 1:
                            $time_id = 1;
                            break;
                        case 2:
                            $time_id = 2;
                            break;
                        default:
                            $time_id = NULL;
                            break;
                    }
                }
                $sqlval["time_id"] = $time_id;
            }
            $objQuery->update("dtb_shipping", $sqlval, $where, array($order_id, $shipping_id));
        }
    }

}

?>
