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


class plg_OrderSort_LC_Template{

    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
        $objTransform = new SC_Helper_Transform($source);
		$template_dir = PLUGIN_UPLOAD_REALDIR . "OrderSort/templates/";
        switch($objPage->arrPageLayout['device_type_id']) {
			case DEVICE_TYPE_PC:
			case DEVICE_TYPE_SMARTPHONE:
			case DEVICE_TYPE_MOBILE:
				break;
            // 端末種別：管理画面
            case DEVICE_TYPE_ADMIN:
			default:
				$template_dir .= "admin/";
				if(strpos($filename, "basis/subnavi.tpl") !== false) {
					$objTransform->select("li",5)->insertAfter(file_get_contents($template_dir ."basis/subnavi.tpl"));
				}
                // 受注管理
                if(strpos($filename, "order/index.tpl") !== false) {
                    $objTransform->select("form#search_form input",1)->insertAfter(file_get_contents($template_dir ."order/index_hidden.tpl"));
                    $objTransform->select("table.list tr",0)->replaceElement(file_get_contents($template_dir ."order/index.tpl"));
					if(plg_OrderSort_Utils::getECCUBEVer() < 2131){
						$objTransform->select('tr td.center',4)->replaceElement(file_get_contents($template_dir . 'order/index_status.tpl'));
					}else{
						$objTransform->select('tr td.center',5)->replaceElement(file_get_contents($template_dir . 'order/index_status.tpl'));
					}
				}
                if(strpos($filename, "order/edit.tpl") !== false) {
					$objTransform->select("div.btn-area",0)->insertBefore(file_get_contents($template_dir ."order/edit_history.tpl"));
                    $objTransform->select("div.btn-area",0)->replaceElement(file_get_contents($template_dir ."order/edit_btn_area.tpl"));
                    $objTransform->select("div#order",0)->appendFirst(file_get_contents($template_dir ."order/edit_btn_area.tpl"));
                    $objTransform->select("table.form tr td",0)->appendChild(file_get_contents($template_dir ."order/edit_mail.tpl"));
                    $objTransform->select("table.form tr td",6)->replaceElement(file_get_contents($template_dir ."order/edit_customer.tpl"));
				}
                if(strpos($filename, "order/mail.tpl") !== false) {
                    $objTransform->select("table.form tr",3)->replaceElement(file_get_contents($template_dir ."order/mail.tpl"));
				}
                break;
        }
        $source = $objTransform->getHTML();
    }
	
	function postfilterTransform(&$source, LC_Page_Ex $objPage, $filename){
	}
}