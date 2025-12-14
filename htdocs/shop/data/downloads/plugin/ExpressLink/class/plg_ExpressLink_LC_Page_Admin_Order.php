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
require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/class/plg_ExpressLink_LC_Page.php";
if (file_exists(PLUGIN_UPLOAD_REALDIR . "OrderSort/plg_OrderSort_Utils.php"))
    require_once PLUGIN_UPLOAD_REALDIR . "OrderSort/plg_OrderSort_Utils.php";

class plg_ExpressLink_LC_Page_Admin_Order extends plg_ExpressLink_LC_Page
{

    /**
     * @param LC_Page_Admin_Order $objPage 受注管理のページクラス
     * @return void
     */
    function before($objPage)
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $objFormParam = new SC_FormParam_Ex();

        $objPage->arrDelivs = SC_Helper_DB_Ex::sfGetIDValueList('dtb_deliv', 'deliv_id', 'service_name', 'del_flg = 0 AND product_type_id <> ?', array(PRODUCT_TYPE_DOWNLOAD));

        $mode = $objPage->getMode();
        switch ($mode) {
            case 'b2csv':
            case 'ehiden2csv':
            case 'ehiden2mailcsv':
            case 'ehidenprocsv':
            case 'yu2csv':
            case 'yur2csv':
            case 'ebusinesscsv':
            case 'bizlogidepocsv':
            case 'km2csv':
                $objPage->lfInitParam($objFormParam);
                $objFormParam->addParam('配送方法', 'search_deliv_id', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
                if (class_exists("plg_OrderSort_Utils", false)) {
                    plg_OrderSort_Utils::addOrderSortParam($objFormParam);
                }
                $objFormParam->setParam($_POST);

                $objFormParam->convParam();
                $objFormParam->trimParam();
                $arrErr = $objPage->lfCheckError($objFormParam);
                $arrParam = $objFormParam->getHashArray();

                if (count($arrErr) == 0) {
                    $where = 'dtb_order.del_flg = 0';
                    $arrWhereVal = array();
                    foreach ($arrParam as $key => $val) {
                        if ($val == '') {
                            continue;
                        }
                        self::buildQuery($key, $where, $arrWhereVal, $objFormParam);
                    }

                    if (plg_ExpressLink_Utils::getECCUBEVer() >= 2132) {
                        $version = '2132';
                    } else {
                        $version = '212';
                    }
                    require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/class/" . $version . "/plg_ExpressLink_SC_Helper_CSV_Ex.php";
                    $objCSV = new plg_ExpressLink_SC_Helper_CSV_Ex();
                    if ($mode == 'b2csv') {
                        $objCSV->arrSubnavi[11] = 'kuronekob2';
                        $objCSV->arrSubnaviName[11] = 'kuroneko';
                        $csv_id = 11;
                    } elseif ($mode == 'ehiden2csv') {
                        $objCSV->arrSubnavi[12] = 'ehiden2';
                        $objCSV->arrSubnaviName[12] = 'sagawa';
                        $csv_id = 12;
                    } elseif ($mode == 'yu2csv') {
                        $objCSV->arrSubnavi[13] = 'yupri4';
                        $objCSV->arrSubnaviName[13] = 'jpost';
                        $csv_id = 13;
                    } elseif ($mode == 'ehiden2mailcsv') {
                        $objCSV->arrSubnavi[14] = 'ehiden2mail';
                        $objCSV->arrSubnaviName[14] = 'sagawa';
                        $csv_id = 14;
                    } elseif ($mode == 'ehidenprocsv') {
                        $objCSV->arrSubnavi[15] = 'ehidenpro';
                        $objCSV->arrSubnaviName[15] = 'sagawa';
                        $csv_id = 15;
                    } elseif ($mode == 'ebusinesscsv') {
                        $objCSV->arrSubnavi[16] = 'ebusiness';
                        $objCSV->arrSubnaviName[16] = 'jp-express';
                        $csv_id = 16;
                    } elseif ($mode == 'yur2csv') {
                        $objCSV->arrSubnavi[17] = 'yupriR';
                        $objCSV->arrSubnaviName[17] = 'jpost';
                        $csv_id = 17;
                    } elseif ($mode == 'bizlogidepocsv') {
                        $objCSV->arrSubnavi[18] = 'bizlogiDEPO';
                        $objCSV->arrSubnaviName[18] = 'sagawa';
                        $csv_id = 18;
                    } elseif ($mode == 'km2csv') {
                        $objCSV->arrSubnavi[19] = 'km2';
                        $objCSV->arrSubnaviName[19] = 'seino';
                        $csv_id = 19;
                    }
                    $arrProduct_id = array();
                    $arrProduct_id = $_POST['pdf_order_id'];
                    if (count($arrProduct_id) > 0) {
                        $where = $where . " AND dtb_order.order_id in (";
                        $where .= implode(',', $arrProduct_id);
                        $where .= ")";
                    }
                    $where = " where " . $where;

                    if (class_exists("plg_OrderSort_Utils", false)) {
                        $order = plg_OrderSort_Utils::setOrder($arrParam);
                        if ($order = "dtb_order.update_date DESC")
                            $order = "dtb_shipping.order_id DESC";
                    }else {
                        $order = "dtb_shipping.order_id DESC";
                    }


                    // 実行時間を制限しない
                    @set_time_limit(0);
                    // CSV出力タイトル行の作成
                    $arrOutput = SC_Utils_Ex::sfSwapArray($objCSV->sfGetCsvOutput($csv_id, 'status = ' . CSV_COLUMN_STATUS_FLG_ENABLE));
                    if (count($arrOutput) <= 0)
                        return false; // 失敗終了
                    $arrOutputCols = $arrOutput['col'];
                    $cols = SC_Utils_Ex::sfGetCommaList($arrOutputCols, true);
                    $sql = 'SELECT ' . $cols . ' FROM dtb_shipping LEFT JOIN dtb_order ON dtb_shipping.order_id = dtb_order.order_id' . $where . " ORDER BY " . $order;
                    if ($csv_id == 15 || $csv_id == 19) {
                        $objCSV->sfDownloadCsvFromSql($sql, $arrWhereVal, $objCSV->arrSubnavi[$csv_id], '', true);
                    } else {
                        $objCSV->sfDownloadCsvFromSql($sql, $arrWhereVal, $objCSV->arrSubnavi[$csv_id], $arrOutput['disp_name'], true);
                    }
                }
                exit;
                break;
            case "csv":
                if (class_exists("plg_OrderSort_Utils", false)) {
                    $objPage->lfInitParam($objFormParam);
                    $objFormParam->addParam('配送方法', 'search_deliv_id', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
                    plg_OrderSort_Utils::addOrderSortParam($objFormParam);
                    $objFormParam->setParam($_POST);
                    $objFormParam->convParam();
                    $objFormParam->trimParam();
                    $arrErr = $objPage->lfCheckError($objFormParam);
                    $arrParam = $objFormParam->getHashArray();

                    if (count($arrErr) == 0) {
                        $where = 'dtb_order.del_flg = 0';
                        $arrWhereVal = array();
                        foreach ($arrParam as $key => $val) {
                            if ($val == '') {
                                continue;
                            }
                            self::buildQuery($key, $where, $arrWhereVal, $objFormParam);
                        }

                        $order = plg_OrderSort_Utils::setOrder($arrParam);

                        $objPage->doOutputCSV($where, $arrWhereVal, $order);
                        exit;
                    }
                }
                break;
        }
    }

    /**
     * @param LC_Page_Admin_Order $objPage 受注管理のページクラス
     * @return void
     */
    function after($objPage)
    {
        $objQuery = & SC_Query_Ex::getSingletonInstance();

        $objFormParam = new SC_FormParam_Ex();
        $objPage->lfInitParam($objFormParam);
        $objFormParam->addParam('配送方法', 'search_deliv_id', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->setParam($_POST);
        $objPage->arrHidden = $objFormParam->getSearchArray();
        $objPage->arrForm = $objFormParam->getFormParamList();

        $mode = $objPage->getMode();
        switch ($mode) {
            case 'delete':
            case 'csv':
            case 'delete_all':
            case 'b2csv':
            case 'ehiden2csv':
            case 'ehiden2mailcsv':
            case 'ehidenprocsv':
            case 'yu2csv':
            case 'yur2csv':
            case 'bizlogidepocsv':
            case 'km2csv':
            case 'search':
                $objFormParam->convParam();
                $objFormParam->trimParam();
                $objPage->arrErr = $objPage->lfCheckError($objFormParam);
                $arrParam = $objFormParam->getHashArray();

                if (count($objPage->arrErr) == 0) {
                    $where = 'dtb_order.del_flg = 0';
                    $arrWhereVal = array();
                    foreach ($arrParam as $key => $val) {
                        if ($val == '') {
                            continue;
                        }
                        self::buildQuery($key, $where, $arrWhereVal, $objFormParam);
                    }

                    $order = 'update_date DESC';

                    /* -----------------------------------------------
                     * 処理を実行
                     * ----------------------------------------------- */
                    switch ($mode) {
                        // CSVを送信する。
                        case 'csv':
                            $objPage->doOutputCSV($where, $arrWhereVal, $order);

                            break;

                        // 全件削除(ADMIN_MODE)
                        case 'delete_all':
                            $objPage->doDelete($where, $arrWhereVal);
                            break;

                        // 検索実行
                        default:
                            // 行数の取得
                            $objPage->tpl_linemax = $objPage->getNumberOfLines($where, $arrWhereVal);
                            // ページ送りの処理
                            $page_max = SC_Utils_Ex::sfGetSearchPageMax($objFormParam->getValue('search_page_max'));
                            // ページ送りの取得
                            $objNavi = new SC_PageNavi_Ex($objPage->arrHidden['search_pageno'], $objPage->tpl_linemax, $page_max, 'fnNaviSearchPage', NAVI_PMAX);
                            $objPage->arrPagenavi = $objNavi->arrPagenavi;

                            // 検索結果の取得
                            $objPage->arrResults = $objPage->findOrders($where, $arrWhereVal, $page_max, $objNavi->start_row, $order);
                            break;
                    }
                }
                break;
        }
    }

    /**
     * クエリを構築する.
     *
     * 検索条件のキーに応じた WHERE 句と, クエリパラメーターを構築する.
     * クエリパラメーターは, SC_FormParam の入力値から取得する.
     *
     * 構築内容は, 引数の $where 及び $arrValues にそれぞれ追加される.
     *
     * @param string $key 検索条件のキー
     * @param string $where 構築する WHERE 句
     * @param array $arrValues 構築するクエリパラメーター
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function buildQuery($key, &$where, &$arrValues, &$objFormParam)
    {
        $dbFactory = SC_DB_DBFactory_Ex::getInstance();
        switch ($key) {

            case 'search_product_name':
                $where .= ' AND EXISTS (SELECT 1 FROM dtb_order_detail od WHERE od.order_id = dtb_order.order_id AND od.product_name LIKE ?)';
                $arrValues[] = sprintf('%%%s%%', $objFormParam->getValue($key));
                break;
            case 'search_order_name':
                $where .= ' AND ' . $dbFactory->concatColumn(array('order_name01', 'order_name02')) . ' LIKE ?';
                $arrValues[] = sprintf('%%%s%%', $objFormParam->getValue($key));
                break;
            case 'search_order_kana':
                $where .= ' AND ' . $dbFactory->concatColumn(array('order_kana01', 'order_kana02')) . ' LIKE ?';
                $arrValues[] = sprintf('%%%s%%', $objFormParam->getValue($key));
                break;
            case 'search_order_id1':
                $where .= ' AND dtb_order.order_id >= ?';
                $arrValues[] = sprintf('%d', $objFormParam->getValue($key));
                break;
            case 'search_order_id2':
                $where .= ' AND dtb_order.order_id <= ?';
                $arrValues[] = sprintf('%d', $objFormParam->getValue($key));
                break;
            case 'search_order_sex':
                $tmp_where = '';
                foreach ($objFormParam->getValue($key) as $element) {
                    if ($element != '') {
                        if (SC_Utils_Ex::isBlank($tmp_where)) {
                            $tmp_where .= ' AND (order_sex = ?';
                        } else {
                            $tmp_where .= ' OR order_sex = ?';
                        }
                        $arrValues[] = $element;
                    }
                }

                if (!SC_Utils_Ex::isBlank($tmp_where)) {
                    $tmp_where .= ')';
                    $where .= " $tmp_where ";
                }
                break;
            case 'search_order_tel':
                $where .= ' AND (' . $dbFactory->concatColumn(array('order_tel01', 'order_tel02', 'order_tel03')) . ' LIKE ?)';
                if (plg_ExpressLink_Utils::getECCUBEVer() >= 2132) {
                    $arrValues[] = SC_SelectSql_Ex::addSearchStr(preg_replace('/[()-]+/', '', $objFormParam->getValue($key)));
                } else {
                    $arrValues[] = sprintf('%%%d%%', preg_replace('/[()-]+/', '', $objFormParam->getValue($key)));
                }
                break;
            case 'search_order_email':
                $where .= ' AND order_email LIKE ?';
                $arrValues[] = sprintf('%%%s%%', $objFormParam->getValue($key));
                break;
            case 'search_payment_id':
                $tmp_where = '';
                foreach ($objFormParam->getValue($key) as $element) {
                    if ($element != '') {
                        if ($tmp_where == '') {
                            $tmp_where .= ' AND (payment_id = ?';
                        } else {
                            $tmp_where .= ' OR payment_id = ?';
                        }
                        $arrValues[] = $element;
                    }
                }

                if (!SC_Utils_Ex::isBlank($tmp_where)) {
                    $tmp_where .= ')';
                    $where .= " $tmp_where ";
                }
                break;
            case 'search_deliv_id':
                $tmp_where = '';
                foreach ($objFormParam->getValue($key) as $element) {
                    if ($element != '') {
                        if ($tmp_where == '') {
                            $tmp_where .= ' AND (dtb_order.deliv_id = ?';
                        } else {
                            $tmp_where .= ' OR dtb_order.deliv_id = ?';
                        }
                        $arrValues[] = $element;
                    }
                }

                if (!SC_Utils_Ex::isBlank($tmp_where)) {
                    $tmp_where .= ')';
                    $where .= " $tmp_where ";
                }
                break;
            case 'search_total1':
                $where .= ' AND total >= ?';
                $arrValues[] = sprintf('%d', $objFormParam->getValue($key));
                break;
            case 'search_total2':
                $where .= ' AND total <= ?';
                $arrValues[] = sprintf('%d', $objFormParam->getValue($key));
                break;
            case 'search_sorderyear':
                $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_sorderyear'), $objFormParam->getValue('search_sordermonth'), $objFormParam->getValue('search_sorderday'));
                $where.= ' AND dtb_order.create_date >= ?';
                $arrValues[] = $date;
                break;
            case 'search_eorderyear':
                $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_eorderyear'), $objFormParam->getValue('search_eordermonth'), $objFormParam->getValue('search_eorderday'), true);
                $where.= ' AND dtb_order.create_date <= ?';
                $arrValues[] = $date;
                break;
            case 'search_supdateyear':
                $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_supdateyear'), $objFormParam->getValue('search_supdatemonth'), $objFormParam->getValue('search_supdateday'));
                $where.= ' AND dtb_order.update_date >= ?';
                $arrValues[] = $date;
                break;
            case 'search_eupdateyear':
                $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_eupdateyear'), $objFormParam->getValue('search_eupdatemonth'), $objFormParam->getValue('search_eupdateday'), true);
                $where.= ' AND dtb_order.update_date <= ?';
                $arrValues[] = $date;
                break;
            case 'search_sbirthyear':
                $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_sbirthyear'), $objFormParam->getValue('search_sbirthmonth'), $objFormParam->getValue('search_sbirthday'));
                $where.= ' AND order_birth >= ?';
                $arrValues[] = $date;
                break;
            case 'search_ebirthyear':
                $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_ebirthyear'), $objFormParam->getValue('search_ebirthmonth'), $objFormParam->getValue('search_ebirthday'), true);
                $where.= ' AND order_birth <= ?';
                $arrValues[] = $date;
                break;
            case 'search_order_status':
                $where.= ' AND status = ?';
                $arrValues[] = $objFormParam->getValue($key);
                break;
            default:
                break;
        }
    }

}
