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

require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/plg_ExpressLink_Utils.php";
require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/class/plg_ExpressLink_SC_Helper_CSV.php";

class plg_ExpressLink_SC_Helper_CSV_Ex extends plg_ExpressLink_SC_Helper_CSV
{

    /**
     * CSV作成 テンポラリファイル出力 コールバック関数
     *
     * @param  mixed   $data 出力データ
     * @return boolean true (true:固定 false:中断)
     */
    public function cbOutputCSV($data)
    {
        // 1行目のみヘッダーを出力する
        if ($this->output_header) {
            fputcsv($this->fpOutput, array_keys($data));
            $this->output_header = false;
        }
        $line = $this->sfConvValue($data);
        $line .= "\r\n";
        fwrite($this->fpOutput, $line);
        SC_Utils_Ex::extendTimeOut();

        return true;
    }

    function sfConvValue($fields, $delimiter = ',', $enclosure = '"', $arrayDelimiter = '|')
    {
        $arrLFCONV = array("yur_article", "depo_article1", "depo_article2", "depo_article3", "depo_article4", "depo_article5", "depo_article6");
        foreach ($fields as $key => $value) {
            $field = & $fields[$key];
            if ($key == 'yamato_order_kana' || $key == 'yamato_shipping_kana')
                $field = mb_convert_kana($field, 'ka');

            if ($key == 'sagawa_productname1' ||
                    $key == 'sagawa_productname2' ||
                    $key == 'sagawa_productname3' ||
                    $key == 'sagawa_productname4' ||
                    $key == 'sagawa_productname5' ||
                    $key == 'ebusiness_shipping_time')
                $field = mb_convert_kana($field, 'ASK');

            if (in_array($key, $arrLFCONV)) {
                $field = str_replace("\n", "", $field);
                $field = str_replace("\r", "", $field);
                $field = str_replace("
", "", $field);
            }

            // 配列を「|」区切りの文字列に変換する
            if (is_array($field)) {
                $field = implode($arrayDelimiter, $field);
            }

            /* enclose a field that contains a delimiter, an enclosure character, or a newline */
            if (is_string($field) && preg_match('/[' . preg_quote($delimiter) . preg_quote($enclosure) . '\\s]/', $field)
            ) {
                $field = $enclosure . preg_replace('/' . preg_quote($enclosure) . '/', $enclosure . $enclosure, $field) . $enclosure;
            } elseif (plg_ExpressLink_Quote_Flg == 1) {
                $field = $enclosure . $field . $enclosure;
            }
        }

        return implode($delimiter, $fields);
    }

}
