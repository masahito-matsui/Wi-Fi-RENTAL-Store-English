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
 
<form name="form1" id="form1" method="post" action="<!--{$smarty.server.REQUEST_URI|h}-->">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<input type="hidden" name="mode" value="edit">

<h3>メール-対応状況連動設定</h3>
<p>受注管理のメール送信時に対応状況を連動して変更します。<br>連動したいメールに対して変更後の対応状況を選択してください。</p>
<table border="0" cellspacing="1" cellpadding="8" summary=" ">
        <col width="33%" />
        <col width="33%" />
        <col width="34%" />
    <tr >
        <td bgcolor="#777777" style="color:#FFFFFF;">メール</td>
        <td bgcolor="#777777" style="color:#FFFFFF;">支払方法</td>
        <td bgcolor="#777777" style="color:#FFFFFF;">対応状況</td>
    </tr>
	<!--{foreach from=$arrMAILTEMPLATE key=key item=mail}-->
        <!--{foreach from=$arrPayment item=payment name=loop1}-->
    <!--{assign var="keyname" value="mail`$key`_`$payment.payment_id`"}-->
    <tr>
    	<!--{if $smarty.foreach.loop1.index==0}-->
        <td bgcolor="#f3f3f3" rowspan="<!--{$arrPayment|@count|default:1}-->"><!--{$mail}--></td>
        <!--{/if}-->
        <td bgcolor="#f3f3f3">
 <!--{$payment.payment_method}-->
        </td>
        <td><select name="<!--{$keyname}-->">
        <option value="">設定なし</option>
        <!--{html_options options=$arrORDERSTATUS selected=$arrForm[$keyname]}-->
        </select>
        </td>    
    </tr>
    	<!--{/foreach}-->
    <!--{/foreach}-->
</table>

<div class="btn-area">
    <ul>
        <li>
            <a class="btn-action" href="javascript:;" onclick="document.form1.submit();return false;"><span class="btn-next">この内容で登録する</span></a>
        </li>
    </ul>
</div>

</form>
