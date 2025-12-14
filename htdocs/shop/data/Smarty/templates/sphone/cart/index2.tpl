<!--{*
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
 *}-->

<!--▼コンテンツここから -->
<section id="undercolumn">


    <h2 class="title"><!--{$tpl_title|h}--></h2>
    <!--{if $smarty.const.USE_POINT !== false}-->
        <!--★ポイント案内★-->
        <div class="information">
        <!--{if false}-->
　　　　<p class="fb">商品の合計金額は「<span class="price"><!--{$tpl_all_total_inctax|number_format}-->円</span>」です。</p><!--{/if}-->

            <!--{if $tpl_login}-->
                <p class="point_announce">Current available points for Mr./Ms. <span class="user_name"><!--{$tpl_name|h}--></span> is 「<span class="point"><!--{$tpl_user_point|number_format|default:0}--> pt</span>」<br />
                    You can use <span class="price">1pt＝<!--{$smarty.const.POINT_VALUE}-->yen</span></p>
            <!--{else}-->
                <p class="point_announce">In the case you use point system, You need to log in </p>
            <!--{/if}-->
        </div>
    <!--{/if}-->

    <!--{if strlen($tpl_error) != 0}-->
        <p class="attention"><!--{$tpl_error|h}--></p>
    <!--{/if}-->

    <!--{if strlen($tpl_message) != 0}-->
        <p class="attention"><!--{$tpl_message|h|nl2br}--></p>
    <!--{/if}-->

    <!--▼フォームここから -->
    <div class="form_area">

        <!--{* カゴの中に商品がある場合にのみ表示 *}-->
        <!--{if count($cartKeys) > 1}-->
            <p class="attentionSt">
                <!--{foreach from=$cartKeys item=key name=cartKey}--><!--{$arrProductType[$key]}--><!--{if !$smarty.foreach.cartKey.last}-->、<!--{/if}--><!--{/foreach}-->は同時購入できません。お手数ですが、個別に購入手続きをお願い致します。</p>
        <!--{/if}-->

        <!--{if count($cartItems) > 0}-->

            <!--{foreach from=$cartKeys item=key}-->

                <!--☆送料無料アナウンス右にスライドボタン -->
                <!--{if $key != $smarty.const.PRODUCT_TYPE_DOWNLOAD}-->
                    <!--{if $arrInfo.free_rule > 0}-->
                        <div class="bubbleBox">
                            <div class="bubble_announce clearfix">
                                <p><a rel="external" href="<!--{$tpl_prev_url|h}-->">
                                    <!--{if !$arrData[$key].is_deliv_free}-->
                                        あと「<span class="price"><!--{$tpl_deliv_free[$key]|number_format}-->円</span>」で<span class="price">送料無料！！</span>
                                    <!--{else}-->
                                        現在、「<span class="price">送料無料</span>」です！！
                                    <!--{/if}-->
                                    <br />
                                    商品を追加しますか?</a></p>
                            </div>
                            <div class="bubble_arrow_line"><!--矢印空タグ --></div>
                            <div class="bubble_arrow"><!--矢印空タグ --></div>
                        </div>
                    <!--{/if}-->
                <!--{/if}-->

                <form name="form<!--{$key}-->" id="form<!--{$key}-->" method="post" action="<!--{$smarty.const.CART_URL|h}-->">
                    <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
                    <!--{if 'sfGMOCartDisplay'|function_exists}-->
                        <!--{'sfGMOCartDisplay'|call_user_func}-->
                    <!--{/if}-->

                    <input type="hidden" name="mode" value="confirm" />
                    <input type="hidden" name="cart_no" value="" />
                    <input type="hidden" name="cartKey" value="<!--{$key|h}-->" />

                    <div class="formBox">

                        <!--{if count($cartKeys) > 1}-->
                            <div class="box_header">
                                <h3><!--{$arrProductType[$key]}--></h3>
                            </div>
                            <div class="totalmoney_area">
                                <!--{$arrProductType[$key]}-->の合計金額は「<span class="price"><!--{$tpl_total_inctax[$key]|number_format}-->円</span>」です。
                            </div>
                        <!--{/if}-->

                        <!--▼カートの中の商品一覧 -->
                        <div class="cartinarea clearfix">
                            <!--{foreach from=$cartItems[$key] item=arrItem}-->
                                    <!--{if $arrItem.id|h == 226}-->
<!--{php}-->$add_charge_flg = 1;<!--{/php}-->
                                    <!--{else}-->
                                <!--▼商品 -->
                                <div class="cartitemBox">
                                    <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrItem.productsClass.main_list_image|sfNoImageMainList|h}-->" style="max-width: 80px;max-height: 80px;" alt="<!--{$arrItem.productsClass.name|h}-->" class="photoL" />
                                    <div class="cartinContents">
                                        <div>
                                            <p><em><!--{$arrItem.productsClass.name|h}--></em><br />
                                                <!--{if $arrItem.productsClass.classcategory_name1 != ""}-->
                                                    <span class="mini"><!--{$arrItem.productsClass.class_name1}-->：<!--{$arrItem.productsClass.classcategory_name1}--></span><br />
                                                <!--{/if}-->
                                                <!--{if $arrItem.productsClass.classcategory_name2 != ""}-->
                                                    <span class="mini"><!--{$arrItem.productsClass.class_name2}-->：<!--{$arrItem.productsClass.classcategory_name2}--></span><br />
                                                <!--{/if}-->
                                                <span class="mini">Unit price:</span>¥<!--{$arrItem.price_inctax|number_format}-->
                                            </p>
                                            <p class="btn_delete">
                                                <img src="<!--{$TPL_URLPATH}-->img/button/btn_delete.png" onClick="eccube.fnFormModeSubmit('form<!--{$key}-->', 'delete', 'cart_no', '<!--{$arrItem.cart_no}-->');" class="pointer" width="21" height="20" alt="削除" /></p>
                                        </div>
                                        <ul>
                                            <li class="quantity"><span class="mini">Quantity:</span><!--{$arrItem.quantity|number_format}--></li>
                                            <li class="quantity_btn"><img src="<!--{$TPL_URLPATH}-->img/button/btn_plus.png" width="22" height="21" alt="＋" onclick="eccube.fnFormModeSubmit('form<!--{$key}-->', 'up','cart_no','<!--{$arrItem.cart_no}-->'); return false" /></li>
                                            <!--{if $arrItem.quantity > 1}-->
                                                <li class="quantity_btn"><img src="<!--{$TPL_URLPATH}-->img/button/btn_minus.png" width="22" height="21" alt="-" onclick="eccube.fnFormModeSubmit('form<!--{$key}-->', 'down','cart_no','<!--{$arrItem.cart_no}-->'); return false" /></li>
                                            <!--{/if}-->
                                            <li class="result"><span class="mini">Unit price：</span>¥<!--{$arrItem.total_inctax|number_format}--></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--▲商品 -->
                                    <!--{/if}-->
                            <!--{/foreach}-->

<!--{php}-->
//echo "<pre>"; print_r($_SESSION['cart'][1]); echo "</pre>";
$quantity = 0;
foreach($_SESSION['cart'][1] as $line) {
	if($line['productsClass']['product_id']) {
		$last_product_id = $line['productsClass']['product_id'];
	}
	$add_flg = 0;
	if($line["id"] == 226) {
		$add_flg = 1;
	} else {
		$quantity += $line["quantity"];
	}
}
echo "<p id=\"last_product_id\" class=\"nodisp\">".$last_product_id."</p>";
echo "<p id=\"last_quantity\" class=\"nodisp\">".$quantity."</p>";
<!--{/php}-->

<div class="original_title">Pickup Method</div>
<p class="only_ext"><input type="radio" name="deliv_id" id="airport" value="3"><label for="airport">Post office inside airport　*540 yen is added to delivery fee<span class="s_text">　(Please enter " flight number " and " estimated arrival time " for flight in remarks column on the next page.)</span></label></p>
<p class="only_ext"><input type="radio" name="deliv_id" id="normal" value="1"><label for="normal">Hotel, Friend’s house and so on　*Item is delivered by Yu-pack</label></p>
<p class="only_ext"><input type="radio" name="deliv_id" id="storefront" value="4"><label for="storefront">Pickup at our store　*5 minutes on foot from Akihabara station　(Business hours 11:00 to 19:00 / weekday only)</label></p>
<p class="only_ext"><input type="radio" name="deliv_id" id="extension" value="5"><label for="extension">Order for extension of rental　*This is for our consumers who are using right now.</label></p>
<p class="only_ext2"><input type="radio" name="deliv_id" id="extension2" value="5" checked="checked"><label for="extension2">Order for extension of rental　*This is for our consumers who are using right now.</label></p>
<p id="deliv_radio" class="nodisp attention">※Please select either one</p>

<style type="text/css">
.only_ext .s_text {
    font-size: 12px;
    color: #6D1515;
}
<!--
.nodisp {
	display:none;
}
-->
</style> 

<script type="text/javascript">
$(document).ready(function(){
	var fee_n = 5;
	var fee;
	var addcharge_flg = 0;
	var addcharge = 0;
	if($('#last_quantity').text() > 4) {
		addcharge_flg = 1;
	}
	if(fee_n == 3) {
		fee = 1620;
		if(addcharge_flg == 1) {
			addcharge = 1080;
		}
	} else if(fee_n == 1) {
		fee = 1080;
		if(addcharge_flg == 1) {
			addcharge = 1080;
		}
	} else if(fee_n == 4) {
		fee = 540;
	} else {
		fee = 0;
	}
	var alltotal_old = $('#init_total').html();
	var alltotal = parseInt(addcharge) +parseInt(fee) + parseInt(alltotal_old.split(",").join("").split("￥").join(""));
	addcharge_c = String(addcharge).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	fee_c = String(fee).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	alltotal_c = String(alltotal).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	$('#add_charge').html("￥"+addcharge_c);
	$('#deliver_fee').html("￥"+fee_c);
	$('#all_total').html("￥"+alltotal_c);

	var pid = parseInt($('#last_product_id').html());
	var extArr = [311, 312, 313, 314, 315, 316, 317, 318, 319, 320, 321, 322, 323, 324, 325, 326, 327, 328, 329, 330, 347, 348, 349, 350, 351, 352, 353, 354, 355, 356, 357, 358, 359, 360, 361, 362, 363, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 395, 396, 397, 398, 399, 400, 401, 402];
	if(extArr.indexOf(pid) > -1) {
		$('.only_ext').addClass('nodisp');
	} else {
		$('.only_ext2').addClass('nodisp');
	}
});

$(':radio[name="deliv_id"]').change(function(){
	var fee_n = $(':radio[name="deliv_id"]:checked').val();
	var fee;
	var addcharge_flg = 0;
	var addcharge = 0;
	if($('#last_quantity').text() > 4) {
		addcharge_flg = 1;
	}
	if(fee_n == 3) {
		fee = 1620;
		if(addcharge_flg == 1) {
			addcharge = 1080;
		}
	} else if(fee_n == 1) {
		fee = 1080;
		if(addcharge_flg == 1) {
			addcharge = 1080;
		}
	} else if(fee_n == 4) {
		fee = 540;
	} else if(fee_n == 5) {
		fee = 0;
	}
	var alltotal_old = $('#init_total').html();
	var alltotal = parseInt(addcharge) +parseInt(fee) + parseInt(alltotal_old.split(",").join("").split("￥").join(""));
	addcharge_c = String(addcharge).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	fee_c = String(fee).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	alltotal_c = String(alltotal).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	$('#add_charge').html("￥"+addcharge_c);
	$('#deliver_fee').html("￥"+fee_c);
	$('#all_total').html("￥"+alltotal_c);
});

function checkDeliver() {
	var airport = $('#airport').is(':checked');
	var normal = $('#normal').is(':checked');
	var storefront = $('#storefront').is(':checked');
	var extension = $('#extension').is(':checked');
	var extension2 = $('#extension2').is(':checked');
	if((airport != true) && (normal != true) && (storefront != true) && (extension != true) && (extension2 != true)) {
		$("#deliv_radio").removeClass("nodisp");
	} else {
		document.form1.submit();
	}
}
</script>


                        </div>
                        <!--▲カートの中の商品一覧ここまで -->

                        <div class="total_area">
<!--{php}-->if($add_charge_flg == 1) {<!--{/php}-->
                            <div><span class="mini">Unit price：</span><span id="init_total">￥<!--{$tpl_total_inctax[$key]-1080|number_format|h}--></span></div>
<!--{php}-->} else {<!--{/php}-->
                            <div><span class="mini">Unit price：</span><span id="init_total">￥<!--{$tpl_total_inctax[$key]|number_format|h}--></span></div>
<!--{php}-->}<!--{/php}-->
                            <div><span class="mini">Delivery fee：</span><span id="deliver_fee"></span></div>
                            <div><span class="mini">追加配送料：</span><span id="add_charge"></span></div>
                            <div><span class="mini">Total amount：</span><span id="all_total" class="price fb">￥<!--{$arrData[$key].total-$arrData[$key].deliv_fee|number_format}--></span></div>
                            <!--{if $smarty.const.USE_POINT !== false}-->
                                <!--{if $arrData[$key].birth_point > 0}-->
                                    <div><span class="mini">お誕生月ポイント：</span> <!--{$arrData[$key].birth_point|number_format}--> Pt</div>
                                <!--{/if}-->
                                <div><span class="mini">Earned points：</span> <!--{$arrData[$key].add_point|number_format}--> Pt</div>
                            <!--{/if}-->
                        </div>
                        <!--{if strlen($tpl_error) == 0}-->
                            
                                <!--<input type="submit" value="ご購入手続きへ" name="confirm" class="btn data-role-none" />-->
                      
                        <!--{/if}-->
                    </div><!-- /.formBox -->
                </form>
            <!--{/foreach}-->
        <!--{else}-->
            <p class="empty"><em>※ There is no item in your shopping cart.</em></p>
        <!--{/if}-->
　　　
　　<div class="link_box">
           <a href="javascript:void(0)" onclick="javascript:checkDeliver();return false;"><span class="link_text">NEXT</span></a>
      </div>
     <div class="link_box002">
         <a href="/order.html"><span class="link_text002">Return</span></a>
     </div>
　　　　
<!--{if false}--><p><a rel="external" href="<!--{$smarty.const.TOP_URL}-->" class="btn_sub">お買い物を続ける</a></p><!--{/if}-->

    </div><!-- /.form_area -->

</section>

<!--{include file= 'frontparts/search_area.tpl'}-->

<!--▲コンテンツここまで -->