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

class plg_ExpressLink_LC_Template
{

    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename)
    {
        $objTransform = new SC_Helper_Transform($source);
        $template_dir = PLUGIN_UPLOAD_REALDIR . 'ExpressLink/templates/';
        switch ($objPage->arrPageLayout['device_type_id']) {
            case DEVICE_TYPE_MOBILE:
                $template_dir .= "mobile/";
                if (strpos($filename, 'shopping/payment.tpl') !== false) {
                    $objTransform->select('br', 8, false)->insertAfter(file_get_contents($template_dir . 'shopping/payment.tpl'));
                }
                if (strpos($filename, 'shopping/confirm.tpl') !== false) {
                    if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
                        $no = 48;
                    } else {
                        $no = 40;
                    }
                    $objTransform->select('br', $no, false)->insertAfter(file_get_contents($template_dir . 'shopping/confirm.tpl'));
                }
                break;
            case DEVICE_TYPE_SMARTPHONE:
                $template_dir .= "sphone/";
                if (strpos($filename, 'shopping/payment.tpl') !== false) {
                    $objTransform->select('section.pay_area02', 0, false)->insertBefore(file_get_contents($template_dir . 'shopping/payment.tpl'));
                    $objTransform->select('div.btn_area', 0, false)->replaceElement(file_get_contents($template_dir . 'shopping/payment_btn_area.tpl'));
                }
                if (strpos($filename, 'shopping/confirm.tpl') !== false) {
                    $objTransform->select('dd ul.date_confirm', 0, false)->appendChild(file_get_contents($template_dir . 'shopping/confirm.tpl'));
                }
                if (strpos($filename, 'mypage/history.tpl') !== false) {
                    $objTransform->select('.historyBox p', 0, false)->appendChild(file_get_contents($template_dir . 'mypage/slip_number.tpl'));
                }
                break;
            case DEVICE_TYPE_PC:
                $template_dir .= "default/";
                if (strpos($filename, 'shopping/payment.tpl') !== false) {
                    $objTransform->select('div.pay_area', 1, false)->insertAfter(file_get_contents($template_dir . 'shopping/payment.tpl'));
                }
                if (strpos($filename, 'shopping/confirm.tpl') !== false) {
                    $objTransform->select('table.delivname tbody', 0, false)->appendChild(file_get_contents($template_dir . 'shopping/confirm.tpl'));
                }
                if (strpos($filename, 'mypage/history.tpl') !== false) {
                    $objTransform->select('h3', 1, false)->insertAfter(file_get_contents($template_dir . 'mypage/slip_number.tpl'));
                }
                break;
            case DEVICE_TYPE_ADMIN:
            default:
                $template_dir .= "admin/";
                if (strpos($filename, 'order/subnavi.tpl') !== false) {
                    $objTransform->select('ul.level1', 0)->appendChild(file_get_contents($template_dir . 'order/subnavi.tpl'));
                }
                if (strpos($filename, 'order/index.tpl') !== false || strpos($filename, 'order_index.tpl') !== false) {
                    $objTransform->select('table tr', 5, false)->insertAfter(file_get_contents($template_dir . 'order/index_search.tpl'));
                    $objTransform->select('div.btn a.btn-normal', 1, false)->insertAfter(file_get_contents($template_dir . 'order/index.tpl'));
                }
                if (strpos($filename, 'order/edit.tpl') !== false || strpos($filename, 'order_edit.tpl') !== false) {
                    $objTransform->select('table.form', 2, false)->appendChild(file_get_contents($template_dir . 'order/edit.tpl'));
                }
                break;
        }
        $source = $objTransform->getHTML();
    }

    function postfilterTransform(&$source, LC_Page_Ex $objPage, $filename)
    {

    }

}
