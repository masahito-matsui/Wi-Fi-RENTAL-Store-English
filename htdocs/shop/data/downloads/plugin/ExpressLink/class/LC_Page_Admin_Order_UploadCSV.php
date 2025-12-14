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
require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';
require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/plg_ExpressLink_Utils.php";

class LC_Page_Admin_Order_UploadCSV extends LC_Page_Admin_Ex
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
        $this->tpl_mainpage = 'products/upload_csv.tpl';
        $this->tpl_subnavi = 'order/subnavi.tpl';
        $this->tpl_mainno = 'order';
        $this->tpl_subno = 'upload_csv';
        $this->tpl_subtitle = '伝票番号登録CSV';
        $this->csv_id = '1';

        $masterData = new SC_DB_MasterData_Ex();
        $this->arrDISP = $masterData->getMasterData("mtb_disp");
        $this->arrSTATUS = $masterData->getMasterData("mtb_status");
        $this->arrDELIVERYDATE = $masterData->getMasterData("mtb_delivery_date");
        $this->arrProductType = $masterData->getMasterData("mtb_product_type");
        $this->arrMaker = SC_Helper_DB_Ex::sfGetIDValueList("dtb_maker", "maker_id", 'name');
        $this->arrPayments = SC_Helper_DB_Ex::sfGetIDValueList("dtb_payment", "payment_id", "payment_method");
        $this->arrInfo = SC_Helper_DB_Ex::sfGetBasisData();
        $this->arrAllowedTag = $masterData->getMasterData("mtb_allowed_tag");
        $this->arrTagCheckItem = array();

        $this->import_shipping_date_flg = plg_ExpressLink_Utils::getConfig("yamato_import_shipping_date");
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
     * Page のアクション.
     *
     * @return void
     */
    function action()
    {
        $this->objDb = new SC_Helper_DB_Ex();

        // CSV管理ヘルパー
        $objCSV = new SC_Helper_CSV_Ex();

        // CSVファイルアップロード情報の初期化
        $objUpFile = new SC_UploadFile_Ex(CSV_TEMP_REALDIR, CSV_TEMP_REALDIR);

        $this->lfInitFile($objUpFile);

        // パラメータ情報の初期化
        $objFormParam = new SC_FormParam_Ex();
        $this->lfInitParam($objFormParam);

        $objFormParam->setHtmlDispNameArray();
        $this->arrTitle = $objFormParam->getHtmlDispNameArray();

        if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
            $this->max_upload_csv_size = SC_Utils_Ex::getUnitDataSize(CSV_SIZE);
        }

        switch ($this->getMode()) {
            case 'csv_upload':
                $this->doUploadCsv($objFormParam, $objUpFile);
                break;
            default:
                break;
        }
    }

    /**
     * 登録/編集結果のメッセージをプロパティへ追加する
     *
     * @param integer $line_count 行数
     * @param stirng $message メッセージ
     * @return void
     */
    function addRowResult($line_count, $message)
    {
        $this->arrRowResult[] = $line_count . "行目：" . $message;
    }

    /**
     * 登録/編集結果のエラーメッセージをプロパティへ追加する
     *
     * @param integer $line_count 行数
     * @param stirng $message メッセージ
     * @return void
     */
    function addRowErr($line_count, $message)
    {
        $this->arrRowErr[] = $line_count . "行目：" . $message;
    }

    /**
     * CSVアップロードを実行します.
     *
     * @return void
     */
    function doUploadCsv(&$objFormParam, &$objUpFile)
    {
        // ファイルアップロードのチェック
        $objUpFile->makeTempFile('csv_file');
        $arrErr = $objUpFile->checkExists();
        if (count($arrErr) > 0) {
            $this->arrErr = $arrErr;
            return;
        }
        // 一時ファイル名の取得
        $filepath = $objUpFile->getTempFilePath('csv_file');
        // CSVファイルの文字コード変換
        $enc_filepath = SC_Utils_Ex::sfEncodeFile($filepath, CHAR_CODE, CSV_TEMP_REALDIR);
        // CSVファイルのオープン
        $fp = fopen($enc_filepath, 'r');
        // 失敗した場合はエラー表示
        if (!$fp) {
            SC_Utils_Ex::sfDispError("");
        }

        // 登録先テーブル カラム情報の初期化
        $this->lfInitTableInfo();

        // 登録フォーム カラム情報
        $this->arrFormKeyList = $objFormParam->getKeyList();

        // 登録対象の列数
        $col_max_count = $objFormParam->getCount();
        // 行数
        $line_count = 0;

        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $objQuery->begin();

        $errFlag = false;
        $all_line_checked = false;

        while (!feof($fp)) {
            $arrCSV = fgetcsv($fp, CSV_LINE_MAX);

            // 全行入力チェック後に、ファイルポインターを先頭に戻す
            if (feof($fp) && !$all_line_checked) {
                rewind($fp);
                $line_count = 0;
                $all_line_checked = true;
                continue;
            }

            // 行カウント
            $line_count++;
            // ヘッダ行はスキップ
            if ($line_count <= $this->header_skip) {
                continue;
            }

            // 空行はスキップ
            if (empty($arrCSV)) {
                continue;
            }
            // 列数が異なる場合はエラー
            $col_count = count($arrCSV);
            if ($col_max_count != $col_count) {
                $this->addRowErr($line_count, "※ 項目数が" . $col_count . "個検出されました。項目数は" . $col_max_count . "個になります。");
                $errFlag = true;
                break;
            }
            // シーケンス配列を格納する。
            $objFormParam->setParam($arrCSV, true);
            $arrRet = $objFormParam->getHashArray();
            $objFormParam->setParam($arrRet);
            // 入力値の変換
            $objFormParam->convParam();
            // <br>なしでエラー取得する。
            $arrCSVErr = $this->lfCheckError($objFormParam);

            // 入力エラーチェック
            if (count($arrCSVErr) > 0) {
                foreach ($arrCSVErr as $err) {
                    $this->addRowErr($line_count, $err);
                }
                $errFlag = true;
                break;
            }

            if ($all_line_checked) {
                $this->lfRegistOrder($objQuery, $line_count, $objFormParam);
                $arrParam = $objFormParam->getHashArray();

                $this->addRowResult($line_count, "ID：" . $arrParam['record_id']);

                $ret = explode('_', $arrParam['record_id']);
                $order_id = intval($ret[0]);
                if (!in_array($order_id, $arrOrderIds))
                    $arrOrderIds[] = $order_id;
            }
        }

        // 実行結果画面を表示
        $this->tpl_mainpage = PLUGIN_UPLOAD_REALDIR . 'ExpressLink/templates/admin/order/upload_csv_complete.tpl';

        fclose($fp);

        // アップロードファイルを削除
        SC_Helper_FileManager_Ex::deleteFile($enc_filepath);
        SC_Helper_FileManager_Ex::deleteFile($filepath);

        if ($errFlag) {
            $objQuery->rollback();
            return;
        } else {
            $this->tpl_order_id_array = implode(',', $arrOrderIds);
            $this->tpl_order_id_cnt = count($arrOrderIds);
            $objQuery = & SC_Query_Ex::getSingletonInstance();
            $this->tpl_shipping_mail_id = $objQuery->get("free_field1", "dtb_plugin", "plugin_code = ?", array("ExpressLink"));
            $this->arrShippingMailContents = $this->lfGetShippingMailContents($this->tpl_shipping_mail_id);
        }

        $objQuery->commit();

        return;
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy()
    {
        if (method_exists('LC_Page_Admin_Ex', 'destroy')) {
            parent::destroy();
        }
    }

    /**
     * ファイル情報の初期化を行う.
     *
     * @return void
     */
    function lfInitFile(&$objUpFile)
    {
        $objUpFile->addFile("CSVファイル", 'csv_file', array('csv'), CSV_SIZE, true, 0, 0, false);
    }

    /**
     * 入力情報の初期化を行う.
     *
     * @param array CSV構造設定配列
     * @return void
     */
    function lfInitParam(&$objFormParam)
    {
        
    }

    /**
     * 入力チェックを行う.
     *
     * @return void
     */
    function lfCheckError(&$objFormParam)
    {
        // 入力データを渡す。
        $arrRet = $objFormParam->getHashArray();
        $objErr = new SC_CheckError_Ex($arrRet);
        $objErr->arrErr = $objFormParam->checkError(false);

        return $objErr->arrErr;
    }

    /**
     * 保存先テーブル情報の初期化を行う.
     *
     * @return void
     */
    function lfInitTableInfo()
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $this->arrProductColumn = $objQuery->listTableFields('dtb_products');
        $this->arrProductClassColumn = $objQuery->listTableFields('dtb_products_class');
    }

    // TODO: ここから下のルーチンは汎用ルーチンとして移動が望ましい

    /**
     * 指定された行番号をmicrotimeに付与してDB保存用の時間を生成する。
     * トランザクション内のnow()は全てcommit()時の時間に統一されてしまう為。
     *
     * @param string $line_no 行番号
     * @return string $time DB保存用の時間文字列
     */
    function lfGetDbFormatTimeWithLine($line_no = '')
    {
        $time = date("Y-m-d H:i:s");
        // 秒以下を生成
        if ($line_no != '') {
            $microtime = sprintf("%06d", $line_no);
            $time .= ".$microtime";
        }
        return $time;
    }

    /**
     * 指定されたキーと複数値の有効性の配列内確認
     *
     * @param string $arr チェック対象配列
     * @param string $keyname フォームキー名
     * @param array  $item 入力データ配列
     * @param string $delimiter 分割文字
     * @return boolean true:有効なデータがある false:有効ではない
     */
    function lfIsArrayRecordMulti($arr, $keyname, $item, $delimiter = ',')
    {
        if (array_search($keyname, $this->arrFormKeyList) === FALSE) {
            return true;
        }
        if ($item[$keyname] == "") {
            return true;
        }
        $arrItems = explode($delimiter, $item[$keyname]);
        //空項目のチェック 1つでも空指定があったら不正とする。
        if (array_search("", $arrItems) !== FALSE) {
            return false;
        }
        //キー項目への存在チェック
        foreach ($arrItems as $item) {
            if (!array_key_exists($item, $arr)) {
                return false;
            }
        }
        return true;
    }

    /**
     * 指定されたキーと複数値の有効性のDB確認
     *
     * @param string $table テーブル名
     * @param string $tblkey テーブルキー名
     * @param string $keyname フォームキー名
     * @param array  $item 入力データ配列
     * @param string $delimiter 分割文字
     * @return boolean true:有効なデータがある false:有効ではない
     */
    function lfIsDbRecordMulti($table, $tblkey, $keyname, $item, $delimiter = ',')
    {
        if (array_search($keyname, $this->arrFormKeyList) === FALSE) {
            return true;
        }
        if ($item[$keyname] == "") {
            return true;
        }
        $arrItems = explode($delimiter, $item[$keyname]);
        //空項目のチェック 1つでも空指定があったら不正とする。
        if (array_search("", $arrItems) !== FALSE) {
            return false;
        }
        $count = count($arrItems);
        $where = $tblkey . " IN (" . implode(",", array_fill(0, $count, "?")) . ")";

        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $db_count = $objQuery->count($table, $where, $arrItems);
        if ($count != $db_count) {
            return false;
        }
        return true;
    }

    /**
     * 指定されたキーと値の有効性のDB確認
     *
     * @param string $table テーブル名
     * @param string $keyname キー名
     * @param array  $item 入力データ配列
     * @return boolean true:有効なデータがある false:有効ではない
     */
    function lfIsDbRecord($table, $keyname, $item)
    {
        if (array_search($keyname, $this->arrFormKeyList) !== FALSE  //入力対象である
                and $item[$keyname] != ""   // 空ではない
                and ! $this->objDb->sfIsRecord($table, $keyname, (array) $item[$keyname]) //DBに存在するか
        ) {
            return false;
        }
        return true;
    }

    /**
     * 指定されたキーと値の有効性の配列内確認
     *
     * @param string $arr チェック対象配列
     * @param string $keyname キー名
     * @param array  $item 入力データ配列
     * @return boolean true:有効なデータがある false:有効ではない
     */
    function lfIsArrayRecord($arr, $keyname, $item)
    {
        if (array_search($keyname, $this->arrFormKeyList) !== FALSE //入力対象である
                and $item[$keyname] != "" // 空ではない
                and ! array_key_exists($item[$keyname], $arr) //配列に存在するか
        ) {
            return false;
        }
        return true;
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

    function lfGetShippingMailContents($template_id)
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $ret = $objQuery->select("subject,header,footer", "dtb_mailtemplate", "template_id = ?", array($template_id));
        return $ret[0];
    }

}

?>
