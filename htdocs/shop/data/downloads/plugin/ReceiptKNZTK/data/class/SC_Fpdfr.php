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

	/**
	 * PDF 納品書を出力する
	 *
	 * TODO ページクラスとすべき要素を多々含んでいるように感じる。
	 */

	define('PDF_TEMPLATE_REALDIR', TEMPLATE_ADMIN_REALDIR . 'pdf/');

	class SC_Fpdfr extends SC_Helper_FPDI
	{
		public function __construct($download, $title, $tpl_pdf = 'ryosyusho1.pdf')
		{
			$this->FPDF();
			// デフォルトの設定
			$this->tpl_pdf = PDF_TEMPLATE_REALDIR . $tpl_pdf;  // テンプレートファイル
			$this->pdf_download = $download;      // PDFのダウンロード形式（0:表示、1:ダウンロード）
			$this->tpl_title = $title;
			$this->tpl_dispmode = 'real';      // 表示モード


			// SJISフォント
			$this->AddSJISFont();
			$this->SetFont('SJIS');

			//ページ総数取得
			$this->AliasNbPages();

			// マージン設定
			$this->SetMargins(15, 20);

			// PDFを読み込んでページ数を取得
			$this->pageno = $this->setSourceFile($this->tpl_pdf);
		}

		public function setData($arrData)
		{
			$this->arrData = $arrData;

			// ページ番号よりIDを取得
			$tplidx = $this->ImportPage(1);

			// ページを追加（新規）
			$this->AddPage();

			//表示倍率(100%)
			$this->SetDisplayMode($this->tpl_dispmode);

			if (SC_Utils_Ex::sfIsInt($arrData['order_id'])) {
				$this->disp_mode = true;
			}

			// テンプレート内容の位置、幅を調整 ※useTemplateに引数を与えなければ100%表示がデフォルト
			$this->useTemplate($tplidx);

			$this->setShopData();
			$this->setMessageData();
			$this->setOrderData();
		}

		private function setShopData()
		{
			// ショップ情報

			$objDb = new SC_Helper_DB_Ex();
			$arrInfo = $objDb->sfGetBasisData();

			// ショップ名
			$this->lfText(130, 74, $arrInfo['shop_name'], 8, 'B');
			// URL
			$this->lfText(130, 77, $arrInfo['law_url'], 8);
			// 会社名
			$this->lfText(130, 82, $arrInfo['law_company'], 8);
			// 郵便番号
			$text = '〒 ' . $arrInfo['law_zip01'] . ' - ' . $arrInfo['law_zip02'];
			$this->lfText(130, 85, $text, 8);
			// 都道府県+所在地
			$text = $this->arrPref[$arrInfo['law_pref']] . $arrInfo['law_addr01'];
			$this->lfText(130, 88, $text, 8);
			$this->lfText(130, 91, $arrInfo['law_addr02'], 8);

			$text = 'TEL: '.$arrInfo['law_tel01'].'-'.$arrInfo['law_tel02'].'-'.$arrInfo['law_tel03'];
			//FAX番号が存在する場合、表示する
			if (strlen($arrInfo['law_fax01']) > 0) {
				$text .= '　FAX: '.$arrInfo['law_fax01'].'-'.$arrInfo['law_fax02'].'-'.$arrInfo['law_fax03'];
			}
			$this->lfText(130, 94, $text, 8);  //TEL・FAX

			if (strlen($arrInfo['law_email']) > 0) {
				$text = 'Email: '.$arrInfo['law_email'];
				$this->lfText(130, 97, $text, 8);      //Email
			}

			//ロゴ画像
			$logo_file = PDF_TEMPLATE_REALDIR . 'logo.png';
			$this->Image($logo_file, 129, 60, 40);
		}

		private function setMessageData()
		{
			$year = $this->arrData['year'];
			$this->lfText(69, 71.6, $year, 8);
			$month = $this->arrData['month'];
			$this->lfText(90, 71.6, $month, 8);
			$day = $this->arrData['day'];
			$this->lfText(107, 71.6, $day, 8);

		}

		private function setOrderData()
		{
			$arrOrder = array();
			// DBから受注情報を読み込む
			$this->lfGetOrderData($this->arrData['order_id']);


	//      $this->SetFont('SJIS', 'B', 15);
	//		$this->Cell(67, 8, number_format($this->arrDisp['payment_total']).' 円', 0, 2, 'R', 0, '');
			$this->lfText(60, 54, number_format($this->arrDisp['payment_total']).' 円', 16); // 金額

			$this->lfText(50, 63, $this->arrData['proviso'], 9); // 但し


			//注文番号
			$this->SetFont('SJIS', '', 8);
			$this->Cell(170, 18, $this->arrDisp['order_id'], 0, 2, 'R', 0, '');

			// 購入者情報
			$this->SetFont('SJIS', '', 9);
			$this->Cell(115, -11.5, $this->arrData['company'], 0, 2, 'R', 0, '');

			$this->SetFont('SJIS', '', 14);
			$this->Cell(118, 20.4, $this->arrData['address'], 0, 2, 'R', 0, '');

			$this->SetFont('SJIS', '', 8);
			$this->Cell(80, 71.3, number_format($this->arrDisp['payment_total'] - $this->arrDisp['tax']).' 円', 0, 0, 'R', 0, '');
			$this->Cell(-22, 81.3, number_format($this->arrDisp['tax_rate'][0]), 0, 0, 'R', 0, '');
			$this->Cell(22, 81.3, number_format($this->arrDisp['tax']).' 円', 0, 0, 'R', 0, '');
		}

		public function createPdf()
		{
			// PDFをブラウザに送信
			ob_clean();
			if ($this->pdf_download == 1) {
				if ($this->PageNo() == 1) {
					$filename = 'ryosyusyo-No'.$this->arrData['order_id'].'.pdf';
				} else {
					$filename = 'ryosyusyo.pdf';
				}
				$this->Output($this->lfConvSjis($filename), 'D');
			} else {
				$this->Output();
			}

			// 入力してPDFファイルを閉じる
			$this->Close();
		}

		// PDF_Japanese::Text へのパーサー
		private function lfText($x, $y, $text, $size = 0, $style = '')
		{
			// 退避
			$bak_font_style = $this->FontStyle;
			$bak_font_size = $this->FontSizePt;

			$this->SetFont('', $style, $size);
			$this->Text($x, $y, $text);

			// 復元
			$this->SetFont('', $bak_font_style, $bak_font_size);
		}

		// 受注データの取得
		private function lfGetOrderData($order_id)
		{
			if (SC_Utils_Ex::sfIsInt($order_id)) {
				// DBから受注情報を読み込む
				$objPurchase = new SC_Helper_Purchase_Ex();
				$this->arrDisp = $objPurchase->getOrder($order_id);
				//list($point) = SC_Helper_Customer_Ex::sfGetCustomerPoint($order_id, $this->arrDisp['use_point'], $this->arrDisp['add_point']);
				//$this->arrDisp['point'] = $point;

				// 受注詳細データの取得
				$arrRet = $objPurchase->getOrderDetail($order_id);
				$arrRet = SC_Utils_Ex::sfSwapArray($arrRet);
				$this->arrDisp = array_merge($this->arrDisp, $arrRet);

				// その他支払い情報を表示
				//if ($this->arrDisp['memo02'] != '') {
				//    $this->arrDisp['payment_info'] = unserialize($this->arrDisp['memo02']);
				//}
				//$this->arrDisp['payment_type'] = 'お支払い';
			}
		}
	}
