<!--{*
 * OrderSort
 * Copyright (C) 2012 Bratech CO.,LTD. All Rights Reserved.
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
 *}-->
        <tr>
            <th>受注日<br><a href="javascript:;" onclick="fnFormModeSubmit('search_form','search','search_createdate_sort','asc'); return false;">▲</a><a href="javascript:;" onclick="fnFormModeSubmit('search_form','search','search_createdate_sort','desc'); return false;">▼</a></th>
            <th>注文番号<br><a href="javascript:;" onclick="fnFormModeSubmit('search_form','search','search_order_sort','asc'); return false;">▲</a><a href="javascript:;" onclick="fnFormModeSubmit('search_form','search','search_order_sort','desc'); return false;">▼</a></th>
            <th>お名前</th>
            <th>支払方法<br><a href="javascript:;" onclick="fnFormModeSubmit('search_form','search','search_payment_sort','asc'); return false;">▲</a><a href="javascript:;" onclick="fnFormModeSubmit('search_form','search','search_payment_sort','desc'); return false;">▼</a></th>
            <th>購入金額(円)</th>
            <th>全商品発送日<br><a href="javascript:;" onclick="fnFormModeSubmit('search_form','search','search_shippingdate_sort','asc'); return false;">▲</a><a href="javascript:;" onclick="fnFormModeSubmit('search_form','search','search_shippingdate_sort','desc'); return false;">▼</a></th>
            <th>対応状況<br><a href="javascript:;" onclick="fnFormModeSubmit('search_form','search','search_status_sort','asc'); return false;">▲</a><a href="javascript:;" onclick="fnFormModeSubmit('search_form','search','search_status_sort','desc'); return false;">▼</a><br><a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('search','status_update','1'); return false;"><span>一括変更</span></a>
<input type="hidden" name="status_update" value="0" /></th>
            <th><label for="pdf_check">帳票</label> <input type="checkbox" name="pdf_check" id="pdf_check" onclick="fnAllCheck(this, 'input[name=pdf_order_id[]]')" /></th>
            <th>編集</th>
            <th>メール <input type="checkbox" name="mail_check" id="mail_check" onclick="fnAllCheck(this, 'input[name=mail_order_id[]]')" /></th>
            <th>削除</th>
        </tr>