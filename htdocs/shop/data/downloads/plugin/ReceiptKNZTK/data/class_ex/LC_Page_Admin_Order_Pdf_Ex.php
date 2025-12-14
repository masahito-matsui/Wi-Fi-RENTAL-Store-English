<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2013 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
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

require_once CLASS_REALDIR . 'pages/admin/order/LC_Page_Admin_Order_Pdf.php';

/**
 * 帳票出力 のページクラス(拡張).
 *
 * LC_Page_Admin_Order_Pdf をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Admin_Order_Pdf_Ex.php 22926 2013-06-29 16:24:23Z Seasoft $
 */
class LC_Page_Admin_Order_Pdf_Ex extends LC_Page_Admin_Order_Pdf
{
    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init()
    {
        parent::init();
        $this->tpl_mainpage = 'order/pdf_input_ex.tpl';
		
		$this->arrType[1]  = '領収書';
		
		$this->isOrders = is_array($_POST['pdf_order_id']) && 1 < count($_POST['pdf_order_id']);
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process()
    {
        parent::process();
    }
	
    /**
     *
     * PDF作成フォームのデフォルト値の生成
     */
    public function createFromValues($order_id,$pdf_order_id)
    {
        $arrForm = parent::createFromValues($order_id,$pdf_order_id);

		// DBから受注情報を読み込む
		$objPurchase = new SC_Helper_Purchase_Ex();
		$purchase = $objPurchase->getOrder($order_id);
		if (is_null($purchase))
		{
			if (!$this->isOrders)
			{
				$purchase = $objPurchase->getOrder($pdf_order_id[0]);
			}
		}
		$arrForm['r_cp'] = $purchase['order_company_name'];
		$arrForm['r_ad'] = $purchase['order_name01'].'　'.$purchase['order_name02'];
		$arrForm['r_but'] = "品代として";
		
        $objQuery =& SC_Query_Ex::getSingletonInstance();
	
		if ($this->isOrders) {
			$nKey = str_repeat("?,", count($pdf_order_id));
			$sKey = substr($nKey, 0, strlen($nKey)-1);
			$this->arrPReceipts = $objQuery->getAll('select * from dtb_published_receipt where order_id IN ('.$sKey.')', $pdf_order_id);
		} else {
			$this->arrPReceipt = $objQuery->getRow('*', 'dtb_published_receipt', 'order_id = ?', array($order_id));
		}
		
		
		return $arrForm;
    }
	
    /**
     *
     * PDFの作成
     * @param SC_FormParam $objFormParam
     */
    public function createPdf(&$objFormParam)
    {
		$arrRet = $objFormParam->getHashArray();
		if ($arrRet['type']==="0") {
			// 納品書
			unset($arrRet);
			return parent::createPdf($objFormParam);
		} else {
			// 領収書
			$arrErr = $this->lfCheckError($objFormParam);

			// 領収書ならタイトルなし
			$arrRet['title'] = '';

			$this->arrForm = $arrRet;
			// エラー入力なし
			if (count($arrErr) == 0) {

				// 領収書発行済みへ
				$publishedDatas = array();
				$objPurchase = new SC_Helper_Purchase_Ex();
				$objQuery =& SC_Query_Ex::getSingletonInstance();
				$objQuery->begin();
				foreach ($arrRet['order_id'] AS $key => $val) {
					$receipt_row = $objQuery->getRow('*', 'dtb_published_receipt', 'order_id = ?', array((int)$val));
					if (is_array($receipt_row) === false) {
						$receipt_date = $arrRet['year']."/".$arrRet['month']."/".$arrRet['day'];
						$receipt_company = $arrRet['r_cp'];
						$receipt_address = $arrRet['r_ad'];
						$receipt_proviso = $arrRet['r_but'];
						if (1 < count($arrRet['order_id'])) 
						{	// 複数件なら注文時の名称を使用
							// DBから受注情報を読み込む
							$purchase = $objPurchase->getOrder($val);
							$receipt_company = $purchase['order_company_name'];
							$receipt_address = $purchase['order_name01'].'　'.$purchase['order_name02'];
							$receipt_companies[$val] = $receipt_company;
							$receipt_addresss[$val] = $receipt_address;
						}
						$objQuery->insert('dtb_published_receipt', array('order_id' => (int)$val, 'company'=>$receipt_company, 'address'=>$receipt_address, 'proviso'=>$receipt_proviso, 'update_date' => $receipt_date));
					} else {
						$publishedDatas[] = array($val, $receipt_row['company'], $receipt_row['address'], $receipt_row['proviso'], strtotime($receipt_row['update_date']));
					}
				}
				$objQuery->commit();				

				$objFpdf = new SC_Fpdfr($arrRet['download'], $arrRet['title']);
				
				foreach ($arrRet['order_id'] AS $key => $val) {
					$arrPdfData = $arrRet;
					$arrPdfData['order_id'] = $val;
					
					$arrPdfData['proviso'] = null;
					$arrPdfData['address'] = null;
					foreach ($publishedDatas as $value) {
						if ($value[0] === $val) {
							$arrPdfData['company']	= $value[1];
							$arrPdfData['address']	= $value[2];
							$arrPdfData['proviso']	= $value[3];
							$arrPdfData['year']		= date('Y', $value[4]);
							$arrPdfData['month']	= date('n', $value[4]);
							$arrPdfData['day']		= date('j', $value[4]);
							break;
						}
					}
					if (is_null($arrPdfData['address'])) {
						if (1 < count($arrRet['order_id'])) 
						{	// 複数件なら注文時の名称を使用
							$arrPdfData['company'] = $receipt_companies[$val];
							$arrPdfData['address'] = $receipt_addresss[$val];
						}
						else 
						{
							$arrPdfData['company'] = $arrRet['r_cp'];
							$arrPdfData['address'] = $arrRet['r_ad'];
						}
					}
					if (is_null($arrPdfData['proviso'])) {
						$arrPdfData['proviso'] = $arrRet['r_but'];
					}
					
					$objFpdf->setData($arrPdfData);
				}
				
				$objFpdf->createPdf();
				
				return true;
			} else {
				return $arrErr;
			}
		}
    }
	
    /**
     *  パラメーター情報の初期化
     *  @param SC_FormParam
     */
    public function lfInitParam(&$objFormParam)
    {
		parent::lfInitParam($objFormParam);
		$objFormParam->addParam('宛名:社名', 'r_cp', STEXT_LEN, 'KVa', array('MAX_LENGTH_CHECK'));
		$objFormParam->addParam('宛名:名前', 'r_ad', STEXT_LEN, 'KVa', array('MAX_LENGTH_CHECK'));
		$objFormParam->addParam('但し書き', 'r_but', STEXT_LEN, 'KVa', array('MAX_LENGTH_CHECK'));
    }
}
