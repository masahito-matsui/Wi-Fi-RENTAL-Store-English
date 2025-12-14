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

class plg_OrderSort_LC_Page_Admin_Order_Edit extends plg_OrderSort_LC_Page{
    /**
     * @param LC_Page_Admin_Order_Edit $objPage
     * @return void
     */
    function before($objPage) {
		// 前の受注情報をクリアする
		if($objPage->getMode() == "pre_edit"){
			foreach($_REQUEST as $key => $request){
				if(!($key == "mode" || $key == "order_id" || $key == "transactionid" || preg_match("/^search/",$key))){
					$_REQUEST[$key] = "";
					$_POST[$key] = "";
				}
			}
		}	
	}	
	
	
    /**
     * @param LC_Page_Admin_Order_Edit $objPage
     * @return void
     */
    function after($objPage) {
        $objFormParam = new SC_FormParam_Ex();
        $objPage->lfInitParam($objFormParam);
		plg_OrderSort_Utils::addOrderSortParam($objFormParam);
        $objFormParam->setParam($_REQUEST);
		$objFormParam->convParam();
		$objFormParam->trimParam();
		
		$order_id = $objFormParam->getValue('order_id');
				
        // DBから受注情報を読み込む
        if (!SC_Utils_Ex::isBlank($order_id)) {
            $objPage->setOrderToFormParam($objFormParam, $order_id);
            $objPage->tpl_subno = 'index';
            $arrValuesBefore['payment_id'] = $objFormParam->getValue('payment_id');
            $arrValuesBefore['payment_method'] = $objFormParam->getValue('payment_method');
        } else {
            $objPage->tpl_subno = 'add';
            $objPage->tpl_mode = 'add';
            $arrValuesBefore['payment_id'] = NULL;
            $arrValuesBefore['payment_method'] = NULL;
            // お届け先情報を空情報で表示
            $arrShippingIds[] = null;
            $objFormParam->setValue('shipping_id', $arrShippingIds);

            // 新規受注登録で入力エラーがあった場合の画面表示用に、会員の現在ポイントを取得
            if (!SC_Utils_Ex::isBlank($objFormParam->getValue('customer_id'))) {
                $customer_id = $objFormParam->getValue('customer_id');
                $arrCustomer = SC_Helper_Customer_Ex::sfGetCustomerDataFromId($customer_id);
                $objFormParam->setValue('customer_point', $arrCustomer['point']);

                // 新規受注登録で、ポイント利用できるように現在ポイントを設定
                $objFormParam->setValue('point', $arrCustomer['point']);
            }
        }

		$arrParam = $objFormParam->getHashArray();

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

		// 検索結果の取得
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->setOrder($order);
        $arrResults = $objQuery->getCol('order_id', 'dtb_order', $where, $arrWhereVal);
		
		$page_max = SC_Utils_Ex::sfGetSearchPageMax($objFormParam->getValue('search_page_max'));
		
		$key = array_search($arrParam['order_id'],$arrResults);
		if($key > 0){
			$objPage->tpl_prev_order_id = $arrResults[$key-1];
		}
		if($key < (count($arrResults)-1)){
			$objPage->tpl_next_order_id = $arrResults[$key+1];
		}
		$objPage->tpl_pageno = floor($key/$page_max)+1;
		
		list($objPage->tpl_linemax, $objPage->arrPurchaseHistory) = self::lfPurchaseHistory($objPage->arrForm);
    }
	
    /**
     * 購入履歴情報の取得
     *
     * @param array $arrParam 検索パラメーター連想配列
     * @return array( integer 全体件数, mixed 会員データ一覧配列, mixed SC_PageNaviオブジェクト)
     */
    function lfPurchaseHistory($arrForm) {
        if (SC_Utils_Ex::isBlank($arrForm['order_email']['value'])) {
            return array('0', array(), NULL);
        }
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $table = 'dtb_order';
        $where = 'del_flg <> 1 AND order_id <> ? AND (';
		$where .= 'order_email = ?)';
		$arrVal[] = $arrForm['order_id']['value'];
		$arrVal[] = $arrForm['order_email']['value'];
		
        // 購入履歴の件数取得
        $linemax = $objQuery->count($table, $where, $arrVal);
        // 表示順序
        $order = 'order_id DESC';
        $objQuery->setOrder($order);
        // 購入履歴情報の取得
		$objQuery->setLimitOffset(5,0);
        $arrPurchaseHistory = $objQuery->select('*', $table, $where, $arrVal);
		
		$objQuery =& SC_Query_Ex::getSingletonInstance();
		foreach($arrPurchaseHistory as $key => $history){
			$ret = $objQuery->select("product_name","dtb_order_detail","order_id = ?",array($history['order_id']));
			if(count($ret)>0){
				$product_name = "";
				foreach($ret as $item){
					$product_name .= $item['product_name'] . ",";
				}
				$product_name = rtrim($product_name,",");
				$arrPurchaseHistory[$key]['product_name'] = $product_name;
			}
		}

        return array($linemax, $arrPurchaseHistory);
    }	
}