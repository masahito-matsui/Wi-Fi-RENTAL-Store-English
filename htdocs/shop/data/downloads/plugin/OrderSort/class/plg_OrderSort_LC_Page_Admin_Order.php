<?php
/*
 * OrderSort
 * Copyright (C) 2014 Bratech CO.,LTD. All Rights Reserved.
 * http://wwww.bratech.co.jp/
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

require_once PLUGIN_UPLOAD_REALDIR . "OrderSort/class/plg_OrderSort_LC_Page.php";

class plg_OrderSort_LC_Page_Admin_Order extends plg_OrderSort_LC_Page{
    /**
     * @param LC_Page_Admin_Order $objPage
     * @return void
     */
    function before($objPage) {
        $objFormParam = new SC_FormParam_Ex();
        $objPage->lfInitParam($objFormParam);
		plg_OrderSort_Utils::addOrderSortParam($objFormParam);
        $objFormParam->setParam($_POST);
		$objPage->arrHidden = $objFormParam->getSearchArray();

        switch ($objPage->getMode()) {
            // 検索パラメーター生成後に処理実行するため breakしない
            case 'csv':
                $objFormParam->convParam();
                $objFormParam->trimParam();
                $arrErr = $objPage->lfCheckError($objFormParam);
                $arrParam = $objFormParam->getHashArray();

                if (count($arrErr) == 0) {
                    $where = 'del_flg = 0';
                    $arrWhereVal = array();
                    foreach ($arrParam as $key => $val) {
                        if ($val == '') {
                            continue;
                        }
                        $objPage->buildQuery($key, $where, $arrWhereVal, $objFormParam);
                    }

					$order = plg_OrderSort_Utils::setOrder($arrParam);
					
                    /* -----------------------------------------------
                     * 処理を実行
                     * ----------------------------------------------- */


					$objPage->doOutputCSV($where, $arrWhereVal, $order);
					exit;

                }
                break;
            default:
                break;
        }
    }	
	
	
    /**
     * @param LC_Page_Admin_Order $objPage
     * @return void
     */
    function after($objPage) {
        $objFormParam = new SC_FormParam_Ex();
        $objPage->lfInitParam($objFormParam);
		plg_OrderSort_Utils::addOrderSortParam($objFormParam);
        $objFormParam->setParam($_POST);
		$objPage->arrHidden = $objFormParam->getSearchArray();

        switch ($objPage->getMode()) {
            // 検索パラメーターの生成
            case 'search':
                $objFormParam->convParam();
                $objFormParam->trimParam();
                $arrErr = $objPage->lfCheckError($objFormParam);
                $arrParam = $objFormParam->getHashArray();

                if (count($arrErr) == 0) {
					// ステータス変更
					if($objFormParam->getValue('status_update') == 1){
						$objPurchase = new SC_Helper_Purchase_Ex();
						$arrStatusUpdate = $objFormParam->getValue('arr_status_update');
						$objQuery =& SC_Query_Ex::getSingletonInstance();
						foreach($arrStatusUpdate as $order_id => $status_id){
							$prev_status_id = $objQuery->get("status","dtb_order","order_id = ?",array($order_id));
							if($prev_status_id != $status_id){
								$objPurchase->sfUpdateOrderStatus($order_id, $status_id);
							}
						}
					}
					
                    $where = 'dtb_order.del_flg = 0';
                    $arrWhereVal = array();
                    foreach ($arrParam as $key => $val) {
                        if ($val == '') {
                            continue;
                        }
                       	$objPage->buildQuery($key, $where, $arrWhereVal, $objFormParam);
                    }

					$order = plg_OrderSort_Utils::setOrder($arrParam);

                    /* -----------------------------------------------
                     * 処理を実行
                     * ----------------------------------------------- */
					// ページ送りの処理
					$page_max = SC_Utils_Ex::sfGetSearchPageMax($objFormParam->getValue('search_page_max'));
					// ページ送りの取得
					$objNavi = new SC_PageNavi_Ex($objPage->arrHidden['search_pageno'],
												  $objPage->tpl_linemax, $page_max,
												  'fnNaviSearchPage', NAVI_PMAX);
					$objPage->arrPagenavi = $objNavi->arrPagenavi;

					// 検索結果の取得
					$objPage->arrResults = $objPage->findOrders($where, $arrWhereVal,
														  $page_max, $objNavi->start_row, $order);
                }
                break;
            default:
                break;
        }
    }
}