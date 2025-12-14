<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';

/**
 * カテゴリ登録CSVのページクラス
 *
 * LC_Page_Admin_Products_UploadCSV をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author EC-CUBE CO.,LTD.
 * @version $Id$
 */
class LC_Page_Admin_Products_UploadCSVesim extends LC_Page_Admin_Ex
{
    /** エラー情報 **/
    public $arrErr;

    /** 表示用項目 **/
    public $arrTitle;

    /** 結果行情報 **/
    public $arrRowResult;

    /** エラー行情報 **/
    public $arrRowErr;

    /** TAGエラーチェックフィールド情報 */
    public $arrTagCheckItem;

    /** テーブルカラム情報 (登録処理用) **/
    public $arrRegistColumn;

    /** 登録フォームカラム情報 **/
    public $arrFormKeyList;

    /**
     * Page を初期化する.
     *
     * @return void
     */
    public function init()
    {
        parent::init();
        $this->tpl_mainpage = 'products/upload_csv_esim.tpl';
        $this->tpl_mainno   = 'products';
        $this->tpl_subno    = 'upload_csv_esim';
        $this->tpl_maintitle = '商品管理';
        $this->tpl_subtitle = 'eSIM登録CSV';
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    public function process()
    {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    public function action()
    {
        // CSV管理ヘルパー
        $objCSV = new SC_Helper_CSV_Ex();
        // CSV構造読み込み
        $arrCSVFrame = $this->lfGetCsvOutput();

        // CSV構造がインポート可能かのチェック
        if (!$objCSV->sfIsImportCSVFrame($arrCSVFrame)) {
            // 無効なフォーマットなので初期状態に強制変更
            $arrCSVFrame = $objCSV->sfGetCsvOutput($this->csv_id, '', array(), 'no');
            $this->tpl_is_format_default = true;
        }
        // CSV構造は更新可能なフォーマットかのフラグ取得
        $this->tpl_is_update = $objCSV->sfIsUpdateCSVFrame($arrCSVFrame);

        // CSVファイルアップロード情報の初期化
        $objUpFile = new SC_UploadFile_Ex(DATA_REALDIR . "/upload/csv/", DATA_REALDIR . "/upload/csv/");
        $this->lfInitFile($objUpFile);

        // パラメーター情報の初期化
        $objFormParam = new SC_FormParam_Ex();
        $this->lfInitParam($objFormParam, $arrCSVFrame);

        $this->max_upload_csv_size = SC_Utils_Ex::getUnitDataSize(CSV_SIZE);

        $objFormParam->setHtmlDispNameArray();
        $this->arrTitle = $objFormParam->getHtmlDispNameArray();

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
     * @param  integer $line_count 行数
     * @param  string  $message    メッセージ
     * @return void
     */
    public function addRowResult($line_count, $message)
    {
        $this->arrRowResult[] = $line_count . '行目：' . $message;
    }

    /**
     * 登録/編集結果のエラーメッセージをプロパティへ追加する
     *
     * @param  integer $line_count 行数
     * @param  string  $message    メッセージ
     * @return void
     */
    public function addRowErr($line_count, $message)
    {
        $this->arrRowErr[] = $line_count . '行目：' . $message;
    }

    /**
     * CSVアップロードを実行する
     *
     * @param  SC_FormParam  $objFormParam
     * @param  SC_UploadFile $objUpFile
     * @return void
     */
    public function doUploadCsv(&$objFormParam, &$objUpFile)
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
            SC_Utils_Ex::sfDispError('');
        }

        // 登録フォーム カラム情報
        $this->arrFormKeyList = $objFormParam->getKeyList();

        // 登録対象の列数
        $col_max_count = $objFormParam->getCount();
        // 行数
        $line_count = 0;

        $objQuery = SC_Query_Ex::getSingletonInstance();
        $objQuery->begin();

        $errFlag = false;

        while (!feof($fp)) {
            $arrCSV = fgetcsv($fp, CSV_LINE_MAX);
            // 行カウント
            $line_count++;
            // ヘッダ行はスキップ
            if ($line_count == 1) {
                continue;
            }
            // 空行はスキップ
            if (empty($arrCSV)) {
                continue;
            }
            // 列数が異なる場合はエラー
            $col_count = count($arrCSV);
            if ($col_max_count != $col_count) {
                $this->addRowErr($line_count, '※ 項目数が' . $col_count . '個検出されました。項目数は' . $col_max_count . '個になります。');
                $errFlag = true;
                break;
            }
            // シーケンス配列を格納する。
            $objFormParam->setParam($arrCSV, true);
            // 入力値の変換
            $objFormParam->convParam();
/*
echo "<pre>";
print_r($arrCSV);
print_r($objFormParam);
echo "</pre>"; exit;
*/
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

            // dtb_esim_stockに登録
            $table = 'dtb_esim_stock';
            $objQuery = SC_Query_Ex::getSingletonInstance();
            $arrValues = $objQuery->extractOnlyColsOf($table, $objFormParam->arrValue);

// echo "<pre>";
// print_r($arrValues);
// print_r($objFormParam);
// echo "</pre>"; exit;

            // $arrValues['id'] = $arrCSV[0];
            // $arrValues['product_code'] = $arrCSV[1];
            // $arrValues['iccid'] = $arrCSV[2];
            // $arrValues['url'] = $arrCSV[3];
            // $arrValues['smdp_addr'] = $arrCSV[4];
            // $arrValues['activation_code'] = $arrCSV[5];
            // $arrValues['download_link'] = $arrCSV[6];
            // $arrValues['qr_code'] = $arrCSV[7];
            // $objQuery->insert($table, $arrValues);

            if($arrCSV[0] > 0) {
              // update
              $arrValues['id'] = $arrCSV[0];
            } else {
              // insert
              $arrValues['create_date'] = date('Y/m/d H:i:s');
            }
            $arrValues['product_code'] = $arrCSV[1];
            $arrValues['iccid'] = $arrCSV[2];
            $arrValues['url'] = $arrCSV[3];
            $arrValues['smdp_addr'] = $arrCSV[4];
            $arrValues['activation_code'] = $arrCSV[5];
            $arrValues['download_link'] = $arrCSV[6];
            $arrValues['qr_code'] = $arrCSV[7];
            $arrValues['del_flg'] = $arrCSV[8];

            if($arrCSV[0] > 0) {
              // update
              $objQuery->update('dtb_esim_stock', array('del_flg' => $arrCSV[8], 'update_date' => date('Y/m/d H:i:s')), 'id = ?', array($arrCSV[0]));
            } else {
              // insert
              $objQuery->insert($table, $arrValues);
              $esim_id = $objQuery->getOne('SELECT LAST_INSERT_ID()');
              $objQuery->update('dtb_esim_stock', array('create_date' => date('Y/m/d H:i:s')), 'id = ?', array($esim_id));
            }

            $sql = "
              SELECT
                count(id) AS cnt
              FROM
                dtb_esim_stock
              WHERE
                product_code = '".$arrCSV[1]."'
              AND
                del_flg = 0
              AND
                order_id is null
            ";

            $arrRes = $objQuery->getAll($sql);
// echo "<pre>";
// print_r($arrCSV[1]);
// print_r($arrRes[0]['cnt']);
// echo "</pre>"; exit;
            $objQuery->update('dtb_products_class', array('stock' => $arrRes[0]['cnt']), 'product_code = ?', array($arrCSV[1]));

            $this->addRowResult($line_count, '登録しました');
        }

        // 実行結果画面を表示
        $this->tpl_mainpage = 'products/upload_csv_esim_complete.tpl';

        fclose($fp);

        if ($errFlag) {
            $objQuery->rollback();

            return;
        }

        $objQuery->commit();

        return;
    }

    /**
     * ファイル情報の初期化を行う.
     *
     * @param SC_UploadFile $objUpFile
     * @return void
     */
    public function lfInitFile(SC_UploadFile &$objUpFile)
    {
        $objUpFile->addFile('CSVファイル', 'csv_file', array('csv'), CSV_SIZE, true, 0, 0, false);
    }

    /**
     * 入力情報の初期化を行う.
     *
     * @param SC_FormParam $objFormParam
     * @param array $arrCSVFrame CSV構造設定配列
     * @return void
     */
    public function lfInitParam(SC_FormParam &$objFormParam, &$arrCSVFrame)
    {
        // 固有の初期値調整
        $arrCSVFrame = $this->lfSetParamDefaultValue($arrCSVFrame);
        // CSV項目毎の処理
        foreach ($arrCSVFrame as $item) {
            if ($item['status'] == CSV_COLUMN_STATUS_FLG_DISABLE) continue;
            $col = $item['col'];
            $error_check_types = $item['error_check_types'];
            $arrErrorCheckTypes = explode(',', $error_check_types);
            foreach ($arrErrorCheckTypes as $key => $val) {
                if (trim($val) == '') {
                    unset($arrErrorCheckTypes[$key]);
                } else {
                    $arrErrorCheckTypes[$key] = trim($val);
                }
            }
            // パラメーター登録
            $objFormParam->addParam(
                    $item['disp_name'],
                    $col,
                    defined($item['size_const_type']) ? constant($item['size_const_type']) : $item['size_const_type'],
                    $item['mb_convert_kana_option'],
                    $arrErrorCheckTypes,
                    $item['default'],
                    $item['rw_flg'] != CSV_COLUMN_RW_FLG_READ_ONLY
                    );
        }
    }

    /**
     * 入力チェックを行う.
     *
     * @param SC_FormParam $objFormParam
     * @return array
     */
    public function lfCheckError(SC_FormParam &$objFormParam)
    {
        // 入力データを渡す。
        $arrRet =  $objFormParam->getHashArray();
        $objErr = new SC_CheckError_Ex($arrRet);
        $objErr->arrErr = $objFormParam->checkError(false);
        // このフォーム特有の複雑系のエラーチェックを行う
        if (count($objErr->arrErr) == 0) {
            $objErr->arrErr = $this->lfCheckErrorDetail($arrRet, $objErr->arrErr);
        }

        return $objErr->arrErr;
    }

    /**
     * 初期値の設定
     *
     * @param  array $arrCSVFrame CSV構造配列
     * @return array $arrCSVFrame CSV構造配列
     */
    public function lfSetParamDefaultValue(&$arrCSVFrame)
    {
        foreach ($arrCSVFrame as $key => $val) {
            switch ($val['col']) {
                default:
                    break;
            }
        }

        return $arrCSVFrame;
    }

    /**
     * このフォーム特有の複雑な入力チェックを行う.
     *
     * @param array $item 確認対象データ
     * @param array $arrErr エラー配列
     * @return array エラー配列
     */
    public function lfCheckErrorDetail($item, $arrErr)
    {
        $objQuery = SC_Query_Ex::getSingletonInstance();
        return $arrErr;
    }

    /**
     * 指定された行番号をmicrotimeに付与してDB保存用の時間を生成する。
     * トランザクション内のCURRENT_TIMESTAMPは全てcommit()時の時間に統一されてしまう為。
     *
     * @param  string $line_no 行番号
     * @return string $time DB保存用の時間文字列
     */
    public function lfGetDbFormatTimeWithLine($line_no = '')
    {
        $time = date('Y-m-d H:i:s');
        // 秒以下を生成
        if ($line_no != '') {
            $microtime = sprintf('%06d', $line_no);
            $time .= ".$microtime";
        }

        return $time;
    }

    public function lfGetCsvOutput()
    {
        $arr = array();

        $arr[] = array("col"=>"id","disp_name"=>"ID",                                    "rank"=>"1", "status"=>"1","rw_flg"=>"3","mb_convert_kana_option"=>"","size_const_type"=>"MLTEXT_LEN","error_check_types"=>"MAX_LENGTH_CHECK,NUM_CHECK");
        $arr[] = array("col"=>"product_code","disp_name"=>"商品コード",                    "rank"=>"2", "status"=>"1","rw_flg"=>"3","mb_convert_kana_option"=>"","size_const_type"=>"MLTEXT_LEN","error_check_types"=>"MAX_LENGTH_CHECK,EXIST_CHECK");
        $arr[] = array("col"=>"iccid","disp_name"=>"ICCID",                              "rank"=>"3", "status"=>"1","rw_flg"=>"3","mb_convert_kana_option"=>"","size_const_type"=>"MLTEXT_LEN","error_check_types"=>"MAX_LENGTH_CHECK");
        $arr[] = array("col"=>"url","disp_name"=>"URL",                                  "rank"=>"4", "status"=>"1","rw_flg"=>"3","mb_convert_kana_option"=>"","size_const_type"=>"MLTEXT_LEN","error_check_types"=>"MAX_LENGTH_CHECK");
        $arr[] = array("col"=>"smdp_addr","disp_name"=>"SM-DP+ アドレス",						       "rank"=>"5", "status"=>"1","rw_flg"=>"3","mb_convert_kana_option"=>"","size_const_type"=>"MLTEXT_LEN","error_check_types"=>"MAX_LENGTH_CHECK");
        $arr[] = array("col"=>"activation_code","disp_name"=>"アクティベーションコード",      "rank"=>"6", "status"=>"1","rw_flg"=>"3","mb_convert_kana_option"=>"","size_const_type"=>"MLTEXT_LEN","error_check_types"=>"MAX_LENGTH_CHECK");
        $arr[] = array("col"=>"download_link","disp_name"=>"ダウンロードリンク（コード）",    "rank"=>"7", "status"=>"1","rw_flg"=>"3","mb_convert_kana_option"=>"","size_const_type"=>"MLTEXT_LEN","error_check_types"=>"MAX_LENGTH_CHECK");
        $arr[] = array("col"=>"qr_code","disp_name"=>"QRコード",						                "rank"=>"8", "status"=>"1","rw_flg"=>"3","mb_convert_kana_option"=>"","size_const_type"=>"MLTEXT_LEN","error_check_types"=>"MAX_LENGTH_CHECK");
        $arr[] = array("col"=>"del_flg","disp_name"=>"削除フラグ",						               "rank"=>"9", "status"=>"1","rw_flg"=>"3","mb_convert_kana_option"=>"","size_const_type"=>"MLTEXT_LEN","error_check_types"=>"NUM_CHECK");
        return $arr;
    }
}
