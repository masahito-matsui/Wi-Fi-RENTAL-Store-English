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

<div id="undercolumn">
    <div id="undercolumn_cart">
        <h2 class="title">Your Shopping Cart</h2>
        <!--{if $smarty.const.USE_POINT !== false || count($arrProductsClass) > 0}-->
            <!--★ポイント案内★-->
            <!--{if $smarty.const.USE_POINT !== false}-->
                <div class="point_announce">
                    <!--{if $tpl_login}-->
                         Mr./Ms. <span class="user_name"><!--{$tpl_name|h}--> </span>: your current points is 「<span class="point"><!--{$tpl_user_point|number_format|default:0|h}--> pt</span>」<br />
                    <!--{else}-->
                        In the case you use point system, You need to log in <br />
                    <!--{/if}-->
                    You can use 1 point for <span class="price"><!--{$smarty.const.POINT_VALUE|h}-->yen</span><br />
                </div>
            <!--{/if}-->
        <!--{/if}-->

        <p class="totalmoney_area">
            <!--{* カゴの中に商品がある場合にのみ表示 *}-->
            <!--{if count($cartKeys) > 1}-->
                <span class="attentionSt"><!--{foreach from=$cartKeys item=key name=cartKey}--><!--{$arrProductType[$key]|h}--><!--{if !$smarty.foreach.cartKey.last}-->、<!--{/if}--><!--{/foreach}-->は同時購入できません。<br />
                    お手数ですが、個別に購入手続きをお願い致します。
                </span>
            <!--{/if}-->

            <!--{if strlen($tpl_error) != 0}-->
                <p class="attention"><!--{$tpl_error|h}--></p>
            <!--{/if}-->

            <!--{if strlen($tpl_message) != 0}-->
                <p class="attention"><!--{$tpl_message|h|nl2br}--></p>
            <!--{/if}-->
        </p>

        <!--{if count($cartItems) > 0}-->
            <!--{foreach from=$cartKeys item=key}-->
                <div class="form_area">
                    <form name="form<!--{$key|h}-->" id="form<!--{$key|h}-->" method="post" action="?">
                        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME|h}-->" value="<!--{$transactionid|h}-->" />
                        <input type="hidden" name="mode" value="confirm" />
                        <input type="hidden" name="cart_no" value="" />
                        <input type="hidden" name="cartKey" value="<!--{$key|h}-->" />
                        <input type="hidden" name="category_id" value="<!--{$tpl_category_id|h}-->" />
                        <input type="hidden" name="product_id" value="<!--{$tpl_product_id|h}-->" />
                        <!--{if count($cartKeys) > 1}-->
                            <h3><!--{$arrProductType[$key]|h}--></h3>
                            <!--{assign var=purchasing_goods_name value=$arrProductType[$key]}-->
                        <!--{else}-->
                            <!--{assign var=purchasing_goods_name value="カゴの中の商品"}-->
                        <!--{/if}-->
<!--
                        <p>
                            <!--{$purchasing_goods_name|h}-->の合計金額は「<span class="price"><!--{$tpl_total_inctax[$key]|number_format|h}-->円</span>」です。
                            <!--{if $key != $smarty.const.PRODUCT_TYPE_DOWNLOAD}-->
                                <!--{if $arrInfo.free_rule > 0}-->
                                    <!--{if !$arrData[$key].is_deliv_free}-->
                                        あと「<span class="price"><!--{$tpl_deliv_free[$key]|number_format|h}-->円</span>」で送料無料です！！
                                    <!--{else}-->
                                        現在、「<span class="attention">送料無料</span>」です！！
                                    <!--{/if}-->
                                <!--{/if}-->
                            <!--{/if}-->
                        </p>
-->
                        <table summary="商品情報">
                            <col width="10%" />
                            <col width="15%" />
                            <col width="30%" />
                            <col width="15%" />
                            <col width="15%" />
                            <col width="15%" />
                            <tr>
                                <th class="alignC">Delete</th>
                                <th class="alignC">Image</th>
                                <th class="alignC">Items</th>
                                <th class="alignC">Unit price</th>
                                <th class="alignC">Quantity</th>
                                <th class="alignC">Subtotal</th>
                            </tr>
                            <!--{foreach from=$cartItems[$key] item=item}-->
                                    <!--{if $item.id|h == 228}-->
<!--{php}-->$add_charge_flg = 1;<!--{/php}-->
                                    <!--{else}-->
                                <tr style="<!--{if $item.error}-->background-color: <!--{$smarty.const.ERR_COLOR|h}-->;<!--{/if}-->">
                                    <td class="alignC"><a href="?" onclick="eccube.fnFormModeSubmit('form<!--{$key|h}-->', 'delete', 'cart_no', '<!--{$item.cart_no|h}-->'); return false;">Delete</a>
                                    </td>
                                    <td class="alignC">
                                    <!--{if $item.productsClass.main_image|strlen >= 1}-->
                                        <a class="expansion" target="_blank" href="<!--{$smarty.const.IMAGE_SAVE_URLPATH|h}--><!--{$item.productsClass.main_image|sfNoImageMainList|h}-->">
                                    <!--{/if}-->
                                            <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$item.productsClass.main_list_image|sfNoImageMainList|h}-->" style="max-width: 65px;max-height: 65px;" alt="<!--{$item.productsClass.name|h}-->" />
                                            <!--{if $item.productsClass.main_image|strlen >= 1}-->
                                        </a>
                                    <!--{/if}-->
                                    </td>
                                    <td><!--{* 商品名 *}--><strong><!--{$item.productsClass.name|h}--></strong>
                                        <!--{if $item.productsClass.classcategory_name1 != ""}-->
                                            <div><!--{$item.productsClass.class_name1|h}-->：<!--{$item.productsClass.classcategory_name1|h}--></div>
                                        <!--{/if}-->
                                        <!--{if $item.productsClass.classcategory_name2 != ""}-->
                                            <div><!--{$item.productsClass.class_name2|h}-->：<!--{$item.productsClass.classcategory_name2|h}--></div>
                                        <!--{/if}-->
                                    </td>
                                    <td class="alignR">
                                        ￥<!--{$item.price_inctax|number_format|h}-->
                                    </td>
                                    <td class="alignC"><!--{$item.quantity|h}-->
                                        <ul id="quantity_level">
                                            <li><a href="?" onclick="eccube.fnFormModeSubmit('form<!--{$key|h}-->','up','cart_no','<!--{$item.cart_no|h}-->'); return false"><img src="<!--{$TPL_URLPATH|h}-->img/button/btn_plus.jpg" width="16" height="16" alt="＋" /></a></li>
                                            <!--{if $item.quantity > 1}-->
                                                <li><a href="?" onclick="eccube.fnFormModeSubmit('form<!--{$key|h}-->','down','cart_no','<!--{$item.cart_no|h}-->'); return false"><img src="<!--{$TPL_URLPATH|h}-->img/button/btn_minus.jpg" width="16" height="16" alt="-" /></a></li>
                                            <!--{/if}-->
                                        </ul>
                                    </td>
                                    <td class="alignR">￥<!--{$item.total_inctax|number_format|h}--></td>
                                </tr>
                                    <!--{/if}-->
                            <!--{/foreach}-->
                            <tr>
                                <th colspan="5" class="alignR">Subtotal</th>
<!--{php}-->if($add_charge_flg == 1) {<!--{/php}-->
                                <td class="alignR" id="init_total">￥<!--{$tpl_total_inctax[$key]-1080|number_format|h}--></td>
<!--{php}-->} else {<!--{/php}-->
                                <td class="alignR" id="init_total">￥<!--{$tpl_total_inctax[$key]|number_format|h}--></td>
<!--{php}-->}<!--{/php}-->
                            </tr>
                            <tr>
                                <th colspan="5" class="alignR">Delivery fee</th>
                                <td class="alignR" id="deliver_fee"></td>
                            </tr>
                            <tr>
                                <th colspan="5" class="alignR"><p class="additional_fee">In the case of five or more units, it costs 1,080 yen <br>
as additional delivery fee separately from delivery fee.<br>
Return envelopes are enclosed as many as the number of units</p><br>Additional delivery fee</th>
                                <td class="alignR" id="add_charge"></td>
                            </tr>
                            <tr>
                                <th colspan="5" class="alignR">Total amount</th>
                                <td class="alignR" id="all_total"><span class="price">￥<!--{$arrData[$key].total-$arrData[$key].deliv_fee|number_format|h}--></span></td>
                            </tr>
                            <!--{if $smarty.const.USE_POINT !== false}-->
                                <!--{if $arrData[$key].birth_point > 0}-->
                                    <tr>
                                        <th colspan="5" class="alignR">お誕生月ポイント</th>
                                        <td class="alignR"><!--{$arrData[$key].birth_point|number_format|h}-->pt</td>
                                    </tr>
                                <!--{/if}-->
                                <!--{*<tr>
                                    <th colspan="5" class="alignR">今回加算ポイント</th>
                                    <td class="alignR"><!--{$arrData[$key].add_point|number_format|h}-->pt</td>
                                </tr>*}-->
                            <!--{/if}-->
                        </table>

<!--{php}-->
//echo "<pre>"; print_r($_SESSION['cart'][1]); echo "</pre>";
$quantity = 0;
foreach($_SESSION['cart'][1] as $line) {
	if($line['productsClass']['product_id']) {
		$last_product_id = $line['productsClass']['product_id'];
	}
	$add_flg = 0;
	if($line["id"] == 228) {
		$add_flg = 1;
	} else {
		$quantity += $line["quantity"];
	}
}
echo "<p id=\"last_product_id\" class=\"nodisp\">".$last_product_id."</p>";
echo "<p id=\"last_quantity\" class=\"nodisp\">".$quantity."</p>";
<!--{/php}-->

<div class="pickup_method">
<h3>Pickup Method</h3>
<p class="text001 only_ext">
<input type="radio" name="deliv_id" id="airport" value="3">
<label for="airport" class="method_name">Pickup at airport</label>
<p class="method_text">*540 yen is added to delivery fee<br><span class="s_text">(Please enter " flight number " and " estimated arrival time " for flight in remarks column on the next page.  )</span></p>
</p>
<p class="text001 only_ext">
<input type="radio" name="deliv_id" id="normal" value="1">
<label for="normal" class="method_name">Hotels, Your Stay (Air bnb,Friend's house, etc)</label>
<p class="method_text">*Item is delivered by Yu-pack</p>
</p>
<div class="line001"></div>
<p class="text001 only_ext">
<input type="radio" name="deliv_id" id="storefront" value="4">
<label for="storefront" class="method_name">Pickup at our store</label>
<p class="method_text">*5 minutes on foot from Akihabara station (Business hours 9:30 to 18:30 / weekday only)<br>
It costs 540 yen as return delivery fee. "In the case of return with return envelope in your hand at our store directly, we refund 540 yen by cash. "</p>
<p class="text001">
<input type="radio" name="deliv_id" id="extension" value="5">
<label for="extension" class="method_name">Order for extension of rental</label>
<p class="method_text">*This is for our consumers who are using right now.</p>
<p id="deliv_radio" class="nodisp attention">※Please select either one</p>
</div>

            <div class="terms_box">
               <p class="text001">■Please agree with Terms and Conditions and proceed to "next"</p>
               <p class="text002"><a href="/terms.html" target="_blank">Terms and Conditions</a></p>
            </div>


<style type="text/css">
.pickup_method .method_text {
    font-size: 12px;
    width: 740px;
    padding-left: 23px;
    margin-top: 0 !important;
}
.pickup_method .s_text {
    font-size: 12px;
    color: #B30B0C;
}
.method_name {
    font-size: 15px;
    color: #3b6cad;
    font-weight: bold;
}
div#undercolumn_cart p {
    margin: 10px 5px;
    margin-bottom: 0;
}
<!--
.nodisp {
	display:none;
}
-->
</style> 

<script type="text/javascript">
$(document).ready(function(){
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
	$('#all_total').find('.price').html("￥"+alltotal_c);

	var pid = parseInt($('#last_product_id').html());
	var extArr = [311, 312, 313, 314, 315, 316, 317, 318, 319, 320, 321, 322, 323, 324, 325, 326, 327, 328, 329, 330, 347, 348, 349, 350, 351, 352, 353, 354, 355, 356, 357, 358, 359, 360, 361, 362, 363, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 395, 396, 397, 398, 399, 400, 401, 402, 456, 457, 458, 459, 460, 461, 462, 463, 464, 465, 466, 467, 468, 469, 470, 471, 472, 473,474, 475 ];
	if(extArr.indexOf(pid) > -1) {
		$('.only_ext').addClass('nodisp');
		$('#extension').attr("checked", true);
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
	$('#all_total').find('.price').html("￥"+alltotal_c);
});

function checkDeliver() {
	var airport = $('#airport').is(':checked');
	var normal = $('#normal').is(':checked');
	var storefront = $('#storefront').is(':checked');
	var extension = $('#extension').is(':checked');
	if((airport != true) && (normal != true) && (storefront != true) && (extension != true)) {
		$("#deliv_radio").removeClass("nodisp");
	} else {
		document.form1.submit();
	}
}
</script>

                        <!--{if strlen($tpl_error) == 0}-->
                            
                        <!--{/if}-->
                        <div class="btn_area">
                            <ul>
                                <li class="form_btn">
                                    <!--{if $tpl_prev_url != ""}-->
                                        <a href="<!--{$tpl_prev_url|h}-->">
                                            <img class="btn_hover" src="/img/btn/return.png" width="100%" alt="戻る" name="back<!--{$key|h}-->" /></a>
                                    <!--{/if}-->
                                </li>
                                <li class="form_btn">
                                    <!--{if strlen($tpl_error) == 0}-->
<!--                                        <input type="image" class="hover_change_image" src="<!--{$TPL_URLPATH|h}-->img/button/btn_buystep.jpg" alt="購入手続きへ" name="confirm" />-->
                                            <a href="javascript:void(0)" onclick="javascript:checkDeliver();return false;">

                                        <img class="btn_hover" src="/img/btn/next.png" width="100%" alt="購入手続きへ" /></a>
                                    <!--{/if}-->
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            <!--{/foreach}-->
        <!--{else}-->
            <p class="empty"><span class="attention">※ There is no item in your shopping cart.</span></p>
        <!--{/if}-->
    </div>
</div>