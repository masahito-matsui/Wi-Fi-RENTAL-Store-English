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

class plg_OrderSort_LC_Page_Admin_Order_Mail extends plg_OrderSort_LC_Page{
    /**
     * @param LC_Page_Admin_Order_Mail $objPage
     * @return void
     */
    function before($objPage) {
		parent::before($objPage);
    }	
	
	
    /**
     * @param LC_Page_Admin_Order_Mail $objPage
     * @return void
     */
    function after($objPage) {
		if($objPage->getMode() == "change"){
			// パラメーター管理クラス
			$objFormParam = new SC_FormParam_Ex();
			// パラメーター情報の初期化
			$objPage->lfInitParam($objFormParam);
	
			// POST値の取得
			$objFormParam->setParam($_POST);
			$objFormParam->convParam();
		
			$objFormParam =  $objPage->changeData($objFormParam);
			$objMail = new SC_Helper_Mail_Ex();
			$objSendMail = $objMail->sfSendOrderMail(
			$objPage->tpl_order_id,
			$objFormParam->getValue('template_id'),
			'',
			'<-- ** ここにヘッダーが入ります ** -->',
			'<-- ** ここにフッターが入ります ** -->', false);

			$objPage->tpl_body = mb_convert_encoding( $objSendMail->body, CHAR_CODE, 'auto' );
		}
	}
	
    /**
     * @param LC_Page_Admin_Order_Mail $objPage
     * @return void
     */
    function send($objPage) {
		$objQuery =& SC_Query_Ex::getSingletonInstance();
		$objPurchase = new SC_Helper_Purchase_Ex();
		$ret = $objQuery->select("*","plg_ordersort_mail_status");
		
		$order_id_array = explode(',',$objPage->order_id_array);
		foreach ($order_id_array as $order_id){
			$payment_id = $objQuery->get('payment_id','dtb_order','order_id = ?',array($order_id));
			foreach($ret as $item){
				if(is_numeric($item['order_status_id']) && $item['mail_template_id'] == $_POST['template_id'] && $item['payment_id'] == $payment_id){
					$objPurchase->sfUpdateOrderStatus($order_id, $item['order_status_id']);
				}
			}
		}
	}
}