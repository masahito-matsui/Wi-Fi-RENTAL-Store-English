<?php
/*
 * OrderSort
 * Copyright (C) 2012 Bratech CO.,LTD. All Rights Reserved.
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

// {{{ requires
require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';

/**
 *
 * LC_Page_Admin_MailComb クラス.
 *
 * @package Page
 */
class LC_Page_Admin_Basis_MailComb extends LC_Page_Admin_Ex {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $this->tpl_mainpage = PLUGIN_UPLOAD_REALDIR . "OrderSort/templates/admin/basis/mailcomb.tpl";
        $this->tpl_mainno = 'basis';
        $this->tpl_subno = 'mailcomb';
        $this->tpl_maintitle = '基本情報管理';
        $this->tpl_subtitle = '受注メール送信時対応状況連動設定';		
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        $this->action();
        $this->sendResponse();
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
		if(method_exists('LC_Page_Admin_Ex','destroy')){
        	parent::destroy();
		}
    }
	
    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {
        $masterData = new SC_DB_MasterData_Ex();
        $this->arrMAILTEMPLATE = $masterData->getMasterData('mtb_mail_template');
        $this->arrORDERSTATUS = $masterData->getMasterData('mtb_order_status');
		
		$objQuery =& SC_Query_Ex::getSingletonInstance();
		$this->arrPayment = $objQuery->select("payment_id,payment_method","dtb_payment","del_flg <> 1");
		
		
        $objFormParam = new SC_FormParam_Ex();
        $this->lfInitParam($objFormParam);
        $objFormParam->setParam($_POST);
        $objFormParam->convParam();
        
        $arrForm = array();
        
        switch ($this->getMode()) {
        case 'edit':
            $arrForm = $objFormParam->getHashArray();
            $this->arrErr = $objFormParam->checkError();
            // エラーなしの場合にはデータを更新
            if (count($this->arrErr) == 0) {
                // データ更新
				$this->updateData($arrForm);
                if (count($this->arrErr) == 0) {
                    $this->tpl_onload = "alert('登録が完了しました。');";
                }
            }
            break;
        default:
            break;
        }
		if(empty($arrForm)){
			$objQuery =& SC_Query_Ex::getSingletonInstance();
			$ret = $objQuery->select("*","plg_ordersort_mail_status");
			foreach($ret as $item){
				$arrForm["mail".$item['mail_template_id']."_".$item['payment_id']] = $item['order_status_id'];
			}
		}
        $this->arrForm = $arrForm;
       
    }
    
    /**
     * パラメーター情報の初期化
     *
     * @param object $objFormParam SC_FormParamインスタンス
     * @return void
     */
    function lfInitParam(&$objFormParam) {
		foreach($this->arrMAILTEMPLATE as $key => $mail){
			foreach($this->arrPayment as $payment){
	        	$objFormParam->addParam($mail."設定", 'mail'.$key."_".$payment['payment_id'], INT_LEN, 'n', array('NUM_CHECK','MAX_LENGTH_CHECK'));
			}
		}
    }
    
	
	function updateData($arrData){
		$objQuery =& SC_Query_Ex::getSingletonInstance();
		$objQuery->delete("plg_ordersort_mail_status");
		foreach($arrData as $key => $value){
			if(strlen($value) == 0)continue;
			$str_id = ltrim($key,"mail");
			list($mail_template_id,$payment_id) = explode('_',$str_id);
			$objQuery->insert("plg_ordersort_mail_status",array("mail_template_id" => $mail_template_id, "payment_id" => $payment_id, "order_status_id" => $value));
		}
	}
}
