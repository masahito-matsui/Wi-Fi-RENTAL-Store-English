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
<style>
#term_box {
    margin: 0 auto;
    text-align: center;
    background-color: #f5f5f5;
    padding-top: 10px;
    padding-bottom: 10px;
}
#term_box .s_box {
    margin: 0 auto;
    display: inline-block;
    margin-right: 28px;
}
#term_box .s_box .name {
    font-size: 17px;
    display: inline-block;
}
#term_box .s_box .date {
    font-size: 20px;
    display: inline-block;
    color: #000;
    font-weight: bold;
}
.btn_cart_reset {
    margin: 0 auto;
    background-color: #6a8088;
    padding: 8px;
    font-size: 18px;
    border-radius: 4px;
    border: 2px solid #ccc;
    box-shadow: 1px 1px 2px 0px #252525;
    color: #fff !important;
}
@media only screen and (max-width: 767px){
.btn_cart_reset {
    display: block;
    width: 58%;
    margin-bottom: 10px;
    padding: 5px;
    font-size: 15px;
}
}
</style>
<div id="undercolumn">
    <div id="undercolumn_cart">
    <p class="cannot"></p>
        <h2 class="title">Your Shopping Cart</h2>
        <div id="term_box" class="no_disp">
          <div class="s_box"><p class="name">Start Date:</p><p id="start_date" class="date"></p></div>
          <div class="s_box"><p class="name">End Date:</p><p id="end_date" class="date"></p></div>
          <p id="rental_term" class="no_disp"></p>
          <a href="?" onclick="eccube.fnFormModeSubmit('form1','all_delete','',''); return false" class="btn_cart_reset">Reset</a>
        </div>
        <p id="rental_err_03" class="attention no_disp" style="background-color: #ffecec; padding: 10px;">You cannot add items for delivery, rental extension and eSIM to the same cart.</p>
        <p id="rental_err_04" class="attention no_disp" style="background-color: #ffecec; padding: 10px;">配送条件とカート内商品の組み合わせが間違っています</p>
        <p id="rental_err_05" class="attention no_disp" style="background-color: #ffecec; padding: 10px;">カートに2つ以上の商品が含まれています</p>
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
                        <table summary="商品情報" class="pc">
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
                                <th class="alignC">Rental Rate</th>
                                <th class="alignC">Quantity</th>
                                <th class="alignC">Amount</th>
                            </tr>
                            <!--{foreach from=$cartItems[$key] item=item}-->
                                    <!--{if $item.id|h == 228}-->
<!--{assign var="total_inctax" value=$item.total_inctax}-->
<!--{php}-->$add_charge_flg = 1;<!--{/php}-->
                                    <!--{else}-->
                                <tr style="<!--{if $item.error}-->background-color: <!--{$smarty.const.ERR_COLOR|h}-->;<!--{/if}-->">
                                    <td class="alignC" style="display: none"><a href="?" onclick="eccube.fnFormModeSubmit('form<!--{$key|h}-->', 'delete', 'cart_no', '<!--{$item.cart_no|h}-->'); return false;">Delete</a><!--商品１つだけを削除-->
                                    </td>
                                    <td class="alignC"><a href="?" onclick="eccube.fnFormModeSubmit('form1','all_delete','',''); return false">Delete</a><!--カート、保存情報も削除する-->
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
                                    <td class="item-name"><!--{* 商品名 *}--><strong><!--{$item.productsClass.name|h}--></strong>
                                        <!--{if $item.productsClass.classcategory_name1 != ""}-->
                                        <!--{assign var="kikaku1_name" value="-"|explode:$item.productsClass.class_name1}-->
                                        <!--{assign var="kikaku1" value="-"|explode:$item.productsClass.classcategory_name1}-->
<!--{if $item.productsClass.classcategory_name1|h == 0}-->
                                            <div><!--{$kikaku1_name[1]}-->：<span class="kikaku1_name"><!--{$kikaku1[1]}--></span></div>
<!--{elseif $item.productsClass.classcategory_name1|h > 0}-->
                                            <div><!--{$kikaku1_name[1]}-->：<span class="kikaku1_name"><!--{$kikaku1[1]}--></span></div>
<!--{else}-->
                                            <div><!--{$item.productsClass.class_name1|h}-->：<!--{$item.productsClass.classcategory_name1|h}--></div>
<!--{/if}-->
                                        <!--{/if}-->
                                        <!--{if $item.productsClass.classcategory_name2 != ""}-->
                                            <div><!--{$item.productsClass.class_name2|h}-->：<!--{$item.productsClass.classcategory_name2|h}--></div>
                                        <!--{/if}-->
<div class="item_box tr p<!--{$item.productsClass.product_class_id|h}--> t<!--{$item.productsClass.classcategory_name1|h}--> error">
    		                                <p class="rental_err_01 attention no_disp" style="background-color: #ffecec; padding: 10px;">※You cannot add multiple items that have different rental period to the same cart.
Please remove one or another from the cart.</p>
    		                                <p class="rental_err_02 attention no_disp" style="background-color: #ffecec; padding: 10px;">※You cannot add multiple items that have different rental period to the same cart.
Please remove one or another from the cart.</p>
</div>
                                    </td>
                                    <td class="alignR">
                                        <!--{$item.price_inctax|number_format|h}--> JPY
                                    </td>
                                    <td class="alignC"><!--{$item.quantity|h}-->
                                        <ul id="quantity_level">
                                            <li><a href="?" onclick="eccube.fnFormModeSubmit('form<!--{$key|h}-->','up','cart_no','<!--{$item.cart_no|h}-->'); return false"><img src="<!--{$TPL_URLPATH|h}-->img/button/btn_plus.jpg" width="16" height="16" alt="＋" /></a></li>
                                            <!--{if $item.quantity > 1}-->
                                                <li><a href="?" onclick="eccube.fnFormModeSubmit('form<!--{$key|h}-->','down','cart_no','<!--{$item.cart_no|h}-->'); return false"><img src="<!--{$TPL_URLPATH|h}-->img/button/btn_minus.jpg" width="16" height="16" alt="-" /></a></li>
                                            <!--{/if}-->
                                        </ul>
                                    </td>
                                    <td class="alignR"><!--{$item.total_inctax|number_format|h}--> JPY</td>
                                </tr>
                                    <!--{/if}-->
                            <!--{/foreach}-->
                            <tr>
                                <th colspan="5" class="alignR">Subtotal</th>
<!--{php}-->if($add_charge_flg == 1) {<!--{/php}-->
                                <td class="alignR" id="init_total"><!--{$tpl_total_inctax[$key]-$total_inctax|number_format|h}--> JPY</td>
<!--{php}-->} else {<!--{/php}-->
                                <td class="alignR" id="init_total"><!--{$tpl_total_inctax[$key]|number_format|h}--> JPY</td>
<!--{php}-->}<!--{/php}-->
                            </tr>
                            <tr>
                                <th colspan="5" class="alignR">Delivery Fee</th>
                                <td class="alignR" id="deliver_fee"></td>
                            </tr>
                            <tr>
                                <th colspan="5" class="alignR">Additional Delivery Fee<p class="additional_fee">For orders of 3 devices or more, an additional shipping cost of 550 yen per router applies.<br>The package includes return envelopes to return each device.</p></th>
                                <td class="alignR" id="add_charge"></td>
                            </tr>
                            <tr>
                                <th colspan="5" class="alignR">Total Amount</th>
                                <td class="alignR" id="all_total"><span class="price"><!--{$arrData[$key].total-$arrData[$key].deliv_fee|number_format|h}--> JPY</span></td>
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



<table summary="商品情報" class="sp" style="margin-bottom:0;">
    <col width="10%" />
    <col width="15%" />
    <col width="15%" />
    <col width="15%" />
    <col width="15%" />
    <tr>
        <th class="alignC">Delete</th>
        <th class="alignC">Image</th>
        <th class="alignC" style="display:none">Items</th>
        <th class="alignC">Rental Rate</th>
        <th class="alignC">Quantity</th>
        <th class="alignC">Amount</th>
    </tr>
    <!--{foreach from=$cartItems[$key] item=item}-->
            <!--{if $item.id|h == 228}-->
<!--{php}-->$add_charge_flg = 1;<!--{/php}-->
            <!--{else}-->
        <th colspan="5" class="item-name">
        <!--{* 商品名 *}--><strong><!--{$item.productsClass.name|h}--></strong>

<!--{if $item.productsClass.classcategory_name1 != ""}-->
<!--{assign var="kikaku1_name" value="-"|explode:$item.productsClass.class_name1}-->
<!--{assign var="kikaku1" value="-"|explode:$item.productsClass.classcategory_name1}-->
 <!--{if $item.productsClass.classcategory_name1|h == 0}-->
  <div><!--{$kikaku1_name[1]}-->：<span class="kikaku1_name"><!--{$kikaku1[1]}--></span></div>
 <!--{elseif $item.productsClass.classcategory_name1|h > 0}-->
  <div><!--{$kikaku1_name[1]}-->：<span class="kikaku1_name"><!--{$kikaku1[1]}--></span></div>
 <!--{else}-->
  <div><!--{$item.productsClass.class_name1|h}-->：<!--{$item.productsClass.classcategory_name1|h}--></div>
 <!--{/if}-->
<!--{/if}-->

          <!--{if $item.productsClass.classcategory_name2 != ""}-->
              <div><!--{$item.productsClass.class_name2|h}-->：<!--{$item.productsClass.classcategory_name2|h}--></div>
        <!--{/if}-->
        </th>
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
            <td class="item-name" style="display:none"><!--{* 商品名 *}--><strong><!--{$item.productsClass.name|h}--></strong>
                <!--{if $item.productsClass.classcategory_name1 != ""}-->
                    <div><!--{$item.productsClass.class_name1|h}-->：<!--{$item.productsClass.classcategory_name1|h}--></div>
                <!--{/if}-->
                <!--{if $item.productsClass.classcategory_name2 != ""}-->
                    <div><!--{$item.productsClass.class_name2|h}-->：<!--{$item.productsClass.classcategory_name2|h}--></div>
                <!--{/if}-->
            </td>
            <td class="alignR">
                <!--{$item.price_inctax|number_format|h}--> JPY
            </td>
            <td class="alignC"><!--{$item.quantity|h}-->
                <ul id="quantity_level">
                    <li><a href="?" onclick="eccube.fnFormModeSubmit('form<!--{$key|h}-->','up','cart_no','<!--{$item.cart_no|h}-->'); return false"><img src="<!--{$TPL_URLPATH|h}-->img/button/btn_plus.jpg" width="16" height="16" alt="＋" /></a></li>
                    <!--{if $item.quantity > 1}-->
                        <li><a href="?" onclick="eccube.fnFormModeSubmit('form<!--{$key|h}-->','down','cart_no','<!--{$item.cart_no|h}-->'); return false"><img src="<!--{$TPL_URLPATH|h}-->img/button/btn_minus.jpg" width="16" height="16" alt="-" /></a></li>
                    <!--{/if}-->
                </ul>
            </td>
            <td class="alignR"><!--{$item.total_inctax|number_format|h}--> JPY</td>
        </tr>
            <!--{/if}-->
    <!--{/foreach}-->
    <tr>
        <th colspan="4" class="alignR">Subtotal</th>
<!--{php}-->if($add_charge_flg == 1) {<!--{/php}-->
        <td class="alignR" id="init_total"><!--{$tpl_total_inctax[$key]-$total_inctax|number_format|h}--> JPY</td>
<!--{php}-->} else {<!--{/php}-->
        <td class="alignR" id="init_total"><!--{$tpl_total_inctax[$key]|number_format|h}--> JPY</td>
<!--{php}-->}<!--{/php}-->
    </tr>
    <tr>
        <th colspan="4" class="alignR">Delivery Fee</th>
        <td class="alignR" id="deliver_fee_sp"></td>
    </tr>
    <tr>
        <th colspan="4" class="alignR">Additional Delivery Fee<p class="additional_fee">You will be charged 1,100 yen additionally if you rent 5 units or more.<br>
The return envelope for each unit will be included in the package.</p></th>
        <td class="alignR" id="add_charge_sp"></td>
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
   <div class="total-amount sp">
    <p class="name">Total Amount</p>
    <p class="alignR" id="all_total_sp"><span class="price"><!--{$arrData[$key].total-$arrData[$key].deliv_fee|number_format|h}--> JPY</span></p>
   </div>

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
echo "<input type=\"hidden\" id=\"last_product_id\" value=\"".$last_product_id."\">";
echo "<input type=\"hidden\" id=\"last_quantity\" value=\"".$quantity."\">";
<!--{/php}-->
<input type="hidden" id="deliv_id" name="deliv_id" value="">

<style>
.a_disabled {
  cursor: not-allowed;
  pointer-events: none;
  opacity: .65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;
}
</style>

<!--{if false}-->
<!--{foreach from=$cartItems[$key] item=item}-->
  <!--{$item.productsClass|@debug_print_var}-->
<!--{/foreach}-->
<!--{/if}-->

<script type="text/javascript">
$(function(){
  var rental_flg = 0;
  var extension_flg = 0;
  var esim_flg = 0;
  var bsim_flg = 0;
  var flg_cnt = 0;


<!--{foreach from=$cartItems[$key] item=item}-->
  <!--{if $item.productsClass.maker_id == $smarty.const.MAKER_ID_RENTAL}-->
  rental_flg = 1;
  <!--{/if}-->
  <!--{if $item.productsClass.maker_id == $smarty.const.MAKER_ID_EXTENSION}-->
  extension_flg = 1;
  <!--{/if}-->
  <!--{if $item.productsClass.maker_id == $smarty.const.MAKER_ID_ESIM}-->
  esim_flg = 1;
  <!--{/if}-->
  <!--{if $item.productsClass.maker_id == $smarty.const.MAKER_ID_BSIM}-->
  bsim_flg = 1;
  <!--{/if}-->

  <!--{assign var="pid_tmp" value=$item.productsClass.product_id}-->
  <!--{if $item.productsClass.product_class_id > 0}-->
    <!--{assign var="pid_tmp" value=$item.productsClass.product_class_id}-->
  <!--{/if}-->


  <!--{assign var="kikaku1" value="-"|explode:$item.productsClass.classcategory_name1}-->
  <!--{assign var="cannot_reserves" value="`$cannot_reserves`,[`$pid_tmp`,[],`$kikaku1[0]`]"}-->
<!--{/foreach}-->


  var flgs = new Object();
  flgs.rental_flg = rental_flg;
  flgs.extension_flg = extension_flg;
  flgs.esim_flg = esim_flg;
  flgs.bsim_flg = bsim_flg;

  flg_cnt = rental_flg + extension_flg + esim_flg + bsim_flg;
  // if(rental_flg == 1 && extension_flg == 1) {
  if(flg_cnt > 1) {
    $('#rental_err_03').removeClass('no_disp');
    return false;
  }

	$.ajax({
		type: "post",
		url: "/api.php",
		data: {
				mode:"set_cart_info",
				rental_flg:rental_flg,
				sale_flg:bsim_flg,
				extension_flg:extension_flg
				},
		cache: false
	}).done(function(data){
		//console.log('success');
		//console.log(data);
    return false;
	}).fail(function(data){
		//console.log('fail');
	});

/*
後ほど
$('.rental_err_01').removeClass('no_disp'); //NG期間があるときのエラー
$('.rental_err_02').removeClass('no_disp');

  var cannot_reserves = [
      ['17',["2019/11/27","2019/11/29","2020/05/20"],'1']
  	];
*/
  var cannot_reserves = [
      <!--{$cannot_reserves|substr:1}-->
  	];

  var obj = getRentalDate();

  if(rental_flg == 1 && obj.receive_flg == 99) {
    $('#rental_err_04').removeClass('no_disp');
    return false;
  }

  if(bsim_flg == 1) {
    $('#deliv_id').val(9);
    $('#btn_cart_submit').removeClass('a_disabled');
    return false;
  }

  checkCartItems(cannot_reserves, obj, flgs);
	var fee_n = obj.receive_flg;
	var fee;
	var addcharge_flg = 0;
  var add_count = 0;
	var addcharge = 0;
	var fee = 0;
	if($('#last_quantity').val() > 2) {
		addcharge_flg = 1;
    add_count = $('#last_quantity').val() - 2;
	}
	if(fee_n == 3 || fee_n == 4 || fee_n == 5) {
    //空港内郵便局
		fee = 1650;
		if(addcharge_flg == 1) {
			addcharge = add_count * 550;
		}
    $('#deliv_id').val(3);
	} else if(fee_n == 1 || fee_n == 2) {
    //通常配送
		fee = 1100;
		if(addcharge_flg == 1) {
			addcharge = add_count * 550;
		}
    $('#deliv_id').val(1);
	} else if(fee_n == 0) {
    //ホテル、自宅、友人宅（使っていない）
		fee = 550;
    $('#deliv_id').val(4);
	} else {
    //店頭受取
    $('#deliv_id').val(5);
  }

	var alltotal_old = $('#init_total').html();
	var alltotal = parseInt(addcharge) +parseInt(fee) + parseInt(alltotal_old.split(",").join("").split("￥").join(""));
	addcharge_c = String(addcharge).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	fee_c = String(fee).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	alltotal_c = String(alltotal).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	$('#add_charge').html(addcharge_c+" JPY");
	$('#add_charge_sp').html(addcharge_c+" JPY");
	$('#deliver_fee').html(fee_c+" JPY");
	$('#deliver_fee_sp').html(fee_c+" JPY");
	$('#all_total').find('.price').html(alltotal_c+" JPY");
	$('#all_total_sp').find('.price').html(alltotal_c+" JPY");

  if(rental_flg == 0 && extension_flg == 0) {
    $('#deliv_id').val(8);
    $('#btn_cart_submit').removeClass('a_disabled');
  }

  function checkCartItems(cannot_reserves, obj, flgs) {


    if(obj.start_date && obj.end_date && obj.rental_term) {
      $('#term_box').removeClass('no_disp');
      $('#start_date').html(obj.start_date);
      $('#end_date').html(obj.end_date);
      $('#rental_term').html(obj.rental_term);

      var start_date_str = obj.start_date;
      var end_date_str = obj.end_date;
      var start_date = new Date(start_date_str);
      var end_date = new Date(end_date_str);

      var product_id;
      var cannot_reserve;
      var rental_term;
      var class_name;
      var error_flg = 0;


      if(cannot_reserves.length == 0) {
        $('#btn_cart_submit').removeClass('a_disabled');
      } else {
        $.each(cannot_reserves, function(i, value) {
          product_id = value[0];
          cannot_reserve = value[1];
          rental_term = value[2];

          var cannot_date;
          var cannot_flg = 0;

          if(product_id != <!--{$smarty.const.ADD_CHARGE_CLASS_ID}-->) {
            if(cannot_reserve.length > 0) {
              class_name = '.p' + product_id + ' .rental_err_01';
              $.each(cannot_reserve, function(i, value) {
                cannot_date = new Date(value);
                if((start_date - cannot_date <= 0) && (cannot_date - end_date <= 0)) {
                  cannot_flg++;
                }
              });
              if(cannot_flg > 0) {
                error_flg = 1;
                $(class_name).removeClass('no_disp');
              } else {
                if(!$(class_name).hasClass('no_disp')) { $(class_name).addClass('no_disp'); }
              }
            }

            class_name = '.t' + rental_term + ' .rental_err_02';
            if(obj.rental_term != rental_term) {
              error_flg = 1;
              $(class_name).removeClass('no_disp');
            } else {
              if(!$(class_name).hasClass('no_disp')) { $(class_name).addClass('no_disp'); }
            }
          }

          if(error_flg == 1) {
            if(!$('#btn_cart_submit').hasClass('a_disabled')) { $('#btn_cart_submit').addClass('a_disabled'); }
          } else {
            $('#btn_cart_submit').removeClass('a_disabled');
          }
        });
      }
    }
  }

  function getRentalDate() {
    var obj = new Object();
		$.ajax({
			type: "post",
			url: "/api.php",
			data: {
					mode:"get_base_info"
					},
			cache: false,
      async: false
		}).done(function(data){
			//console.log('success');
			//console.log(data);
			var jsn = $.parseJSON(data);
      obj.start_date = jsn.start_date;
      obj.end_date = jsn.end_date;
      obj.rental_term = jsn.rental_term;
      obj.receive_flg = jsn.receive_flg;
      obj.flg17 = jsn.flg17;
		}).fail(function(data){
			//console.log('fail');
      obj.start_date = '';
      obj.end_date = '';
      obj.rental_term = '';
      obj.rental_term = '';
      obj.receive_flg = '';
      obj.flg17 = 1;
		});
    return obj;
  }


});

//update for eSIM
var esim_flg = 0;
<!--{foreach from=$cartItems[$key] item=item}-->
<!--{if $item.productsClass.maker_id == $smarty.const.MAKER_ID_ESIM}-->
esim_flg = 1;
<!--{/if}-->
<!--{/foreach}-->

var quantity = checkQuantity();

function checkQuantity() {
  var quantity = 0;

  <!--{foreach from=$cartItems[$key] item=item}-->
    quantity = quantity + <!--{$item.quantity|h}-->;
  <!--{/foreach}-->

	if((quantity > 1)) {
    if(esim_flg == 1) {
		  $("#rental_err_05").removeClass("no_disp");
	   }
  }
  return quantity;
}
//update for eSIM

function checkDeliver() {
	var checkterms = $('#checkterms').is(':checked');
	if((checkterms != true)) {
		$("#terms_attention").removeClass("no_disp");
    return false;
  }
//update for eSIM
	if(quantity > 1 && esim_flg == 1) {
    if(esim_flg == 1) {
		  $("#rental_err_05").removeClass("no_disp");
	   }
//update for eSIM
	} else {
		document.form1.submit();
	}
}

</script>

<a href="?" onclick="eccube.fnFormModeSubmit('form1','all_delete','',''); return false">All Delete</a>

                        <!--{if strlen($tpl_error) == 0}-->

                        <!--{/if}-->
                        <div class="btn_area" style="margin-top:10px;">
                            <ul>
                                <li class="form_btn return_btn">
                                    <!--{if $tpl_prev_url != ""}-->
                                    <div class="btn-set btn_wh adjust_btn">
                                        <a href="<!--{$tpl_prev_url|h}-->">Return</a>
                                    </div>
                                    <!--{/if}-->
                                </li>
                                <li class="form_btn next_btn">
                <!--{if strlen($tpl_error) == 0}-->
<!--                                        <input type="image" class="hover_change_image" src="<!--{$TPL_URLPATH|h}-->img/button/btn_buystep.jpg" alt="購入手続きへ" name="confirm" />-->
            <div class="terms_box">
            <input id="checkterms" type="checkbox"><label for="check" class="text001">I consent to the <a href="/terms.html" target="_blank">Terms and Conditions</a> and privacy policy included in the Terms and Conditions.</label>
            <p id="terms_attention" class="no_disp attention">Please consent to the Terms and Conditions.</p>
            <div id="err_box">
<!--{foreach from=$cartItems[$key] item=item}-->
<div class="item_box tr p<!--{$item.productsClass.product_class_id|h}--> t<!--{$item.productsClass.classcategory_name1|h}--> error">
    		                                <p class="rental_err_01 attention no_disp" style="background-color: #ffecec;font-size: 13px;padding: 10px;border-top: 3px solid #ccc;">※You cannot add multiple items that have different rental period to the same cart.
Please remove one or another from the cart.</p>
    		                                <p class="rental_err_02 attention no_disp" style="background-color: #ffecec;font-size: 13px;padding: 10px;border-top: 3px solid #ccc;">※You cannot add multiple items that have different rental period to the same cart.
Please remove one or another from the cart.</p>
</div>
<!--{/foreach}-->
            </div>
            <div class="btn-set btn_next">
            <a id="btn_cart_submit" class="a_disabled" href="javascript:void(0)" onclick="javascript:checkDeliver();return false;">Next</a>
            </div>
            </div>


<!--{foreach from=$cartItems[$key] item=item}-->
  <!--{assign var="kikaku1" value="-"|explode:$item.productsClass.classcategory_name1}-->
  <!--{assign var="cannot_reserves" value="`$cannot_reserves`,[`$pid_tmp`,[],`$kikaku1[0]`]"}-->
  <p style="display: none;"><!--{$kikaku1[0]}--></p>
<!--{/foreach}-->

<!--<script>
$("#err_box").load("/shop/cart/ .rental_err_02", function(data)  {
});
</script>-->
                <!--{/if}-->
                                </li>
                                <li class="form_btn return_btn_sp">
                                    <!--{if $tpl_prev_url != ""}-->
                                    <div class="btn-set btn_wh adjust_btn">
                                        <a href="<!--{$tpl_prev_url|h}-->">Return</a>
                                    </div>
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
