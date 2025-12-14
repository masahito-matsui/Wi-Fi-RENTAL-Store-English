<?php
/*
 * OrderSort
 * Copyright (C) 2014 Bratech CO.,LTD. All Rights Reserved.
 * http://www.bratech.co.jp/
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

/**
 * 共通関数
 *
 * @package OrderSort
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plg_OrderSort_Utils {
	function addOrderSortParam(&$objFormParam){
		$objFormParam->addParam("search_createdate_sort", 'search_createdate_sort', 4, '', array('MAX_LENGTH_CHECK'));
		$objFormParam->addParam("search_order_sort", 'search_order_sort', 4, '', array('MAX_LENGTH_CHECK'));
		$objFormParam->addParam("search_payment_sort", 'search_payment_sort', 4, '', array('MAX_LENGTH_CHECK'));
		$objFormParam->addParam("search_shippingdate_sort", 'search_shippingdate_sort', 4, '', array('MAX_LENGTH_CHECK'));
		$objFormParam->addParam("search_status_sort", 'search_status_sort', 4, '', array('MAX_LENGTH_CHECK'));
		$objFormParam->addParam("status_update", 'status_update', 1, 'n', array('NUM_CHECK','MAX_LENGTH_CHECK'));
		$objFormParam->addParam("arr_status_update", 'arr_status_update', INT_LEN, 'n', array('NUM_CHECK','MAX_LENGTH_CHECK'));
	}
	
	function getECCUBEVer(){
		return floor(str_replace('.','',ECCUBE_VERSION));
	}
	
	function setOrder($arrParam){
		if($arrParam['search_createdate_sort']){
			$order = 'dtb_order.create_date '.$arrParam['search_createdate_sort'];
		}elseif($arrParam['search_order_sort']){
			$order = 'dtb_order.order_id '.$arrParam['search_order_sort'];
		}elseif($arrParam['search_payment_sort']){
			$order = 'dtb_order.payment_id '.$arrParam['search_payment_sort'];
		}elseif($arrParam['search_shippingdate_sort']){
			$order = 'dtb_order.commit_date '.$arrParam['search_shippingdate_sort'];
		}elseif($arrParam['search_status_sort']){
			$order = 'dtb_order.status '.$arrParam['search_status_sort'];
		}else{
			$order = 'dtb_order.update_date DESC';
		}
		return $order;
	}
}