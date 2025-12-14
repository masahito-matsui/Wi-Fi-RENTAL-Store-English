<!--{*
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) LOCKON CO.,LTD. All Rights Reserved.
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
*}-->
<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_header.tpl"}-->

<script type="text/javascript">
<!--
self.moveTo(20,20);self.focus();

function lfPopwinSubmit(formName) {
    eccube.openWindow('about:blank','pdf','1000','900');
    document[formName].target = "pdf";
    document[formName].submit();
    return false;
}

$(document).ready(function(){
	
	showHide();
	
	$('.type').bind('change', function() {
		showHide();
	});
});

function showHide() {
	if ($('.type').val() == 0) {
		$('.statementOfDelivery').show();
		$('.ReceiptDocumentDelivery').hide();
	} else {
		$('.statementOfDelivery').hide();
		$('.ReceiptDocumentDelivery').show();
	}
}
//-->
</script>

<form name="form1" id="form1" method="post" action="?">
    <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
    <input type="hidden" name="mode" value="confirm" />
    <!--{foreach from=$arrForm.order_id item=order_id}-->
        <input type="hidden" name="order_id[]" value="<!--{$order_id|h}-->" />
    <!--{/foreach}-->

    <h2><!--コンテンツタイトル-->帳票の作成</h2>

    <table class="form">
        <col width="20%" />
        <col width="80%" />
        <tr>
            <th>注文番号</th>
            <td><!--{$arrForm.order_id|@join:', '}--></td>
        </tr>
        <tr>
            <th>発行日<span class="attention">※</span></th>
            <td><!--{if $arrErr.year}--><span class="attention"><!--{$arrErr.year}--></span><!--{/if}-->
                <select name="year">
                <!--{html_options options=$arrYear selected=$arrForm.year}-->
                </select>年
                <select name="month">
                <!--{html_options options=$arrMonth selected=$arrForm.month}-->
                </select>月
                <select name="day">
                <!--{html_options options=$arrDay selected=$arrForm.day}-->
                </select>日
            </td>
        </tr>
        <tr>
            <th>帳票の種類</th>
            <td><!--{if $arrErr.download}--><span class="attention"><!--{$arrErr.download}--></span><!--{/if}-->
                <select name="type" class="type">
                <!--{html_options options=$arrType selected=$arrForm.type}-->
                </select>
            </td>
        </tr>
        <tr>
            <th>ダウンロード方法</th>
            <td><!--{if $arrErr.download}--><span class="attention"><!--{$arrErr.download}--></span><!--{/if}-->
                <select name="download">
                <!--{html_options options=$arrDownload selected=$arrForm.download}-->
                </select>
            </td>
        </tr>
        <tr class="statementOfDelivery">
            <th>帳票タイトル</th>
            <td><!--{if $arrErr.title}--><span class="attention"><!--{$arrErr.title}--></span><!--{/if}-->
                <input type="text" name="title" size="40" value="<!--{$arrForm.title}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->"/><br />
                <span style="font-size: 80%;">※未入力時はデフォルトのタイトルが表示されます。</span><br />
            </td>
        </tr>
        <tr class="statementOfDelivery">
            <th>帳票メッセージ</th>
            <td><!--{if $arrErr.msg1}--><span class="attention"><!--{$arrErr.msg1}--></span><!--{/if}-->
                1行目：<input type="text" name="msg1" size="40" value="<!--{$arrForm.msg1|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN*3/5}-->"/><br />
                <!--{if $arrErr.msg2}--><span class="attention"><!--{$arrErr.msg2}--></span><!--{/if}-->
                2行目：<input type="text" name="msg2" size="40" value="<!--{$arrForm.msg2|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN*3/5}-->"/><br />
                <!--{if $arrErr.msg3}--><span class="attention"><!--{$arrErr.msg3}--></span><!--{/if}-->
                3行目：<input type="text" name="msg3" size="40" value="<!--{$arrForm.msg3|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN*3/5}-->"/><br />
                <span style="font-size: 80%;">※未入力時はデフォルトのメッセージが表示されます。</span><br />
            </td>
        </tr>
        <tr class="statementOfDelivery">
            <th>備考</th>
            <td><!--{if $arrErr.etc1}--><span class="attention"><!--{$arrErr.etc1}--></span><!--{/if}-->
                1行目：<input type="text" name="etc1" size="40" value="<!--{$arrForm.etc1|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->"/><br />
                <!--{if $arrErr.etc2}--><span class="attention"><!--{$arrErr.etc2}--></span><!--{/if}-->
                2行目：<input type="text" name="etc2" size="40" value="<!--{$arrForm.etc2|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->"/><br />
            <!--{if $arrErr.etc3}--><span class="attention"><!--{$arrErr.etc3}--></span><!--{/if}-->
                3行目：<input type="text" name="etc3" size="40" value="<!--{$arrForm.etc3|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->"/><br />
                <span style="font-size: 80%;">※未入力時は表示されません。</span><br />
            </td>
        </tr>
        <!--{if $smarty.const.USE_POINT !== false}-->
            <tr class="statementOfDelivery">
                <th>ポイント表記</th>
                <td>
                    <input type="radio" name="disp_point" value="1" checked="checked" />する　<input type="radio" name="disp_point" value="0" />しない<br />
                    <span style="font-size: 80%;">※「する」を選択されても、お客様が非会員の場合は表示されません。</span>
                </td>
            </tr>
        <!--{else}-->
            <input type="hidden" name="disp_point" value="0" />
        <!--{/if}-->
        <tr class="ReceiptDocumentDelivery">
            <th>宛名</th>
            <td>
			<!--{if $isOrders }-->
				<!--{foreach from=$arrPReceipts key=k item=v}-->
					（注文番号：<!--{$v.order_id|h}-->）<!--{$v.update_date|date_format:'%Y&#x5E74;%-m&#x6708;%-e&#x65E5;'}-->:<!--{$v.address|h}--><br />
					　　<span style="color:red;">注意！この注文番号の領収書は以前に一度以上の出力がなされています。</span><br />
				<!--{/foreach}-->

				<br /><b>領収書の宛名は複数時は注文時の名称で登録/出力されます</b><br />
			<!--{else}-->
				<!--{if is_array($arrPReceipt) }-->
					<!--{$arrPReceipt.company}-->
					<!--{$arrPReceipt.address}-->
					<input type="hidden" name="rd_cp" value="<!--{$arrPReceipt.company}-->" />
					<input type="hidden" name="rd_ad" value="<!--{$arrPReceipt.address}-->" />
				<!--{else}-->
					<div><label>社名<input type="text" name="r_cp" size="40" value="<!--{$arrForm.r_cp|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->"/></label></div>
					<div><label>名前<input type="text" name="r_ad" size="40" value="<!--{$arrForm.r_ad|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->"/></label></div>
				<!--{/if}-->
			<!--{/if}-->
			</td>
        </tr>
        <tr class="ReceiptDocumentDelivery">
            <th>但し書き</th>
            <td>
				
			<!--{if $isOrders }-->
				<!--{foreach from=$arrPReceipts key=k item=v}-->
					（注文番号：<!--{$v.order_id|h}-->）<!--{$v.update_date|date_format:'%Y&#x5E74;%-m&#x6708;%-e&#x65E5;'}-->:<!--{$v.proviso|h}--><br />
					　　<span style="color:red;">注意！この注文番号の領収書は以前に一度以上の出力がなされています。</span><br />
				<!--{/foreach}-->

				<br /><b>新たに作成する領収書の但し書き</b><br />
				<input type="text" name="r_but" size="40" value="<!--{$arrForm.r_but|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->"/>
			
			<!--{else}-->
				<!--{if is_array($arrPReceipt) }-->
					<!--{$arrPReceipt.proviso}-->
					<input type="hidden" name="rd_but" value="<!--{$arrPReceipt.proviso}-->" />
				<!--{else}-->
					<input type="text" name="r_but" size="40" value="<!--{$arrForm.r_but|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->"/>
				<!--{/if}-->
			<!--{/if}-->
			</td>
        </tr>
    </table>
	<!--{if is_array($arrPReceipt) }-->
	<div class="ReceiptDocumentDelivery" style="color:red;">
		注意！<br />この注文番号の領収書は以前に一度以上の出力がなされています。<br />(<!--{$arrPReceipt.update_date|date_format:'%Y&#x5E74;%-m&#x6708;%-e&#x65E5;'}-->:<!--{$arrPReceipt.proviso|h}-->)
	</div>
	<!--{/if}-->
    <div class="btn-area">
        <ul>
            <li><a class="btn-action" href="javascript:;" onclick="return lfPopwinSubmit('form1');"><span class="btn-next">この内容で作成する</span></a></li>
        </ul>
    </div>

</form>

<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_footer.tpl"}-->
