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
#header_login_area{
display: none;
}
</style>

<script type="text/javascript">//<![CDATA[
    var sent = false;

    function fnCheckSubmit() {
        if (sent) {
            alert("只今、処理中です。しばらくお待ち下さい。");
            return false;
        }
        sent = true;
        return true;
    }
//]]></script>

<!--CONTENTS-->
<div id="undercolumn">
    <div id="undercolumn_shopping">
        <p class="flow_area"><img src="<!--{$TPL_URLPATH}-->img/picture/img_flow_03.jpg" alt="購入手続きの流れ" /></p>
        <h2 class="title">Order Summary</h2>

        <!--<p class="information">Would you like to send the following form?<br />
            If you want, please crick the button “NEXT”</p>-->

        <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
            <input type="hidden" name="mode" value="confirm" />
            <input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->" />

            <div class="btn_area">
                <ul>
                    <li class="form_btn return_btn">
                        <a href="./payment.php">
                            <img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る" />
                        </a>
                    </li>
                        <!--{if $use_module}-->
                    <li class="form_btn next_btn">
                        <input type="image" onclick="return fnCheckSubmit();" class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="次へ" name="next-top" id="next-top" />
                    </li>
                        <!--{else}-->
                    <li class="form_btn next_btn">
                        <input type="image" onclick="return fnCheckSubmit();" class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="ご注文完了ページへ" name="next-top" id="next-top" />
                    </li>
                    <!--{/if}-->
                    <li class="form_btn return_btn_sp">
                        <a href="./payment.php">
                            <img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る" />
                        </a>
                    </li>
                </ul>
            </div>

            <table summary="ご注文内容確認" class="pc pc-table">
                <col width="10%" />
                <col width="40%" />
                <col width="20%" />
                <col width="10%" />
                <col width="20%" />
                <tr>
                    <th scope="col">Images</th>
                    <th scope="col">Item</th>
                    <th scope="col">Rental Rate</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Amount</th>
                </tr>
                <!--{foreach from=$arrCartItems item=item}-->
				<!--{if $item.id|h == 228}-->
<!--{assign var="total_inctax" value=$item.total_inctax}-->
<!--{php}-->$add_charge_flg = 1;<!--{/php}-->
				<!--{else}-->
                    <tr>
                        <td class="alignC">
                            <a
                                <!--{if $item.productsClass.main_image|strlen >= 1}--> href="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$item.productsClass.main_image|sfNoImageMainList|h}-->" class="expansion" target="_blank"
                                <!--{/if}-->
                            >
                                <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$item.productsClass.main_list_image|sfNoImageMainList|h}-->" style="max-width: 65px;max-height: 65px;" alt="<!--{$item.productsClass.name|h}-->" /></a>
                        </td>
                        <td>
                            <ul>
                                <li><strong><!--{$item.productsClass.name|h}--></strong></li>
                                <!--{assign var="kikaku1_name" value="-"|explode:$item.productsClass.class_name1}-->
                                <!--{assign var="kikaku1" value="-"|explode:$item.productsClass.classcategory_name1}-->
                                <!--{if $item.productsClass.classcategory_name1 != ""}-->
                                <li><!--{$kikaku1_name[1]}-->：<!--{$kikaku1[1]}--></li>
                                <!--{/if}-->
                                <!--{if $item.productsClass.classcategory_name2 != ""}-->
                                <li><!--{$item.productsClass.class_name2|h}-->：<!--{$item.productsClass.classcategory_name2|h}--></li>
                                <!--{/if}-->
                            </ul>
                        </td>
                        <td class="alignR">
                            <!--{$item.price_inctax|number_format}--> JPY
                        </td>
                        <td class="alignR"><!--{$item.quantity|number_format}--></td>
                        <td class="alignR"><!--{$item.total_inctax|number_format}--> JPY</td>
                    </tr>
				<!--{/if}-->
                <!--{/foreach}-->
                <tr>
                    <th colspan="4" class="alignR" scope="row">Subtotal</th>
<!--{php}-->if($add_charge_flg == 1) {<!--{/php}-->
                    <td class="alignR"><!--{$tpl_total_inctax[$cartKey]-$total_inctax|number_format}--> JPY</td>
<!--{php}-->} else {<!--{/php}-->
                    <td class="alignR"><!--{$tpl_total_inctax[$cartKey]|number_format}--> JPY</td>
<!--{php}-->}<!--{/php}-->
                </tr>
                <!--{if $smarty.const.USE_POINT !== false}-->
                    <!--{if $arrForm.use_point > 0}-->
                    <tr>
                        <th colspan="4" class="alignR" scope="row">値引き（ポイントご使用時）</th>
                        <td class="alignR">
                            <!--{assign var=discount value=`$arrForm.use_point*$smarty.const.POINT_VALUE`}-->
                            -<!--{$discount|number_format|default:0}-->円</td>
                    </tr>
                    <!--{/if}-->
                <!--{/if}-->
                <tr>
                    <th colspan="4" class="alignR" scope="row">Delivery Fee</th>
                    <td class="alignR"><!--{$arrForm.deliv_fee|number_format}--> JPY</td>
                </tr>
                <tr>
                    <th colspan="4" class="alignR" scope="row">Additional Delivery Fee</th>
<!--{php}-->if($add_charge_flg == 1) {<!--{/php}-->
                    <td class="alignR"><!--{$total_inctax|number_format}--> JPY</td>
<!--{php}-->} else {<!--{/php}-->
                    <td class="alignR">0 JPY</td>
<!--{php}-->}<!--{/php}-->
                </tr>
                <!--<tr>-->
                    <!--<th colspan="4" class="alignR" scope="row">手数料</th>-->
                     <!--<td class="alignR"><!--{$arrForm.charge|number_format}--> JPY</td>-->
                <!--</tr>-->
                <tr>
                    <th colspan="4" class="alignR" scope="row">Total Amount </th>
                    <td class="alignR"><span class="price"><!--{$arrForm.payment_total|number_format}--> JPY</span></td>
                </tr>
            </table>


<table summary="ご注文内容確認" class="sp">
    <col width="10%" />
    <col width="20%" />
    <col width="10%" />
    <col width="20%" />
    <tr>
        <th scope="col">Images</th>
        <th scope="col" style="display:none">Item</th>
        <th scope="col">Rental Rate</th>
        <th scope="col">Quantity</th>
        <th scope="col">Amount</th>
    </tr>
    <!--{foreach from=$arrCartItems item=item}-->
    <!--{if $item.id|h == 228}-->
<!--{php}-->$add_charge_flg = 1;<!--{/php}-->
    <!--{else}-->
    <th colspan="4" class="item-name">
      <ul>
        <li><strong><!--{$item.productsClass.name|h}--></strong></li>
        <!--{assign var="kikaku1_name" value="-"|explode:$item.productsClass.class_name1}-->
        <!--{assign var="kikaku1" value="-"|explode:$item.productsClass.classcategory_name1}-->
        <!--{if $item.productsClass.classcategory_name1 != ""}-->
        <li><!--{$kikaku1_name[1]}-->：<!--{$kikaku1[1]}--></li>
        <!--{/if}-->
        <!--{if $item.productsClass.classcategory_name2 != ""}-->
        <li><!--{$item.productsClass.class_name2|h}-->：<!--{$item.productsClass.classcategory_name2|h}--></li>
        <!--{/if}-->
      </ul>
    </th>
        <tr>
            <td class="alignC">
                <a
                    <!--{if $item.productsClass.main_image|strlen >= 1}--> href="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$item.productsClass.main_image|sfNoImageMainList|h}-->" class="expansion" target="_blank"
                    <!--{/if}-->
                >
                    <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$item.productsClass.main_list_image|sfNoImageMainList|h}-->" style="max-width: 65px;max-height: 65px;" alt="<!--{$item.productsClass.name|h}-->" /></a>
            </td>
            <td style="display:none">
                <ul>
                    <li><strong><!--{$item.productsClass.name|h}--></strong></li>
                    <!--{if $item.productsClass.classcategory_name1 != ""}-->
                    <li><!--{$item.productsClass.class_name1|h}-->：<!--{$item.productsClass.classcategory_name1|h}--></li>
                    <!--{/if}-->
                    <!--{if $item.productsClass.classcategory_name2 != ""}-->
                    <li><!--{$item.productsClass.class_name2|h}-->：<!--{$item.productsClass.classcategory_name2|h}--></li>
                    <!--{/if}-->
                </ul>
            </td>
            <td class="alignR">
                <!--{$item.price_inctax|number_format}--> JPY
            </td>
            <td class="alignR"><!--{$item.quantity|number_format}--></td>
            <td class="alignR"><!--{$item.total_inctax|number_format}--> JPY</td>
        </tr>
    <!--{/if}-->
    <!--{/foreach}-->
    <tr>
        <th colspan="3" class="alignR" scope="row">Subtotal</th>
<!--{php}-->if($add_charge_flg == 1) {<!--{/php}-->
        <td class="alignR"><!--{$tpl_total_inctax[$cartKey]-$total_inctax|number_format}--> JPY</td>
<!--{php}-->} else {<!--{/php}-->
        <td class="alignR"><!--{$tpl_total_inctax[$cartKey]|number_format}--> JPY</td>
<!--{php}-->}<!--{/php}-->
    </tr>
    <!--{if $smarty.const.USE_POINT !== false}-->
        <!--{if $arrForm.use_point > 0}-->
        <tr>
            <th colspan="3" class="alignR" scope="row">値引き（ポイントご使用時）</th>
            <td class="alignR">
                <!--{assign var=discount value=`$arrForm.use_point*$smarty.const.POINT_VALUE`}-->
                -<!--{$discount|number_format|default:0}-->円</td>
        </tr>
        <!--{/if}-->
    <!--{/if}-->
    <tr>
        <th colspan="3" class="alignR" scope="row">Delivery Fee</th>
        <td class="alignR"><!--{$arrForm.deliv_fee|number_format}--> JPY</td>
    </tr>
    <tr>
        <th colspan="3" class="alignR" scope="row">Additional Delivery Fee</th>
<!--{php}-->if($add_charge_flg == 1) {<!--{/php}-->
        <td class="alignR"><!--{$total_inctax|number_format}--> JPY</td>
<!--{php}-->} else {<!--{/php}-->
        <td class="alignR">0 JPY</td>
<!--{php}-->}<!--{/php}-->
    </tr>
    <!--<tr>-->
        <!--<th colspan="4" class="alignR" scope="row">手数料</th>-->
         <!--<td class="alignR"><!--{$arrForm.charge|number_format}--> JPY</td>-->
    <!--</tr>-->
    <tr>
        <th colspan="3" class="alignR" scope="row">Total Amount </th>
        <td class="alignR"><span class="price"><!--{$arrForm.payment_total|number_format}--> JPY</span></td>
    </tr>
</table>

            <!--{* ログイン済みの会員のみ *}-->
            <!--{if $tpl_login == 1 && $smarty.const.USE_POINT !== false}-->
                <table summary="ポイント確認" class="delivname">
                <col width="30%" />
                <col width="70%" />
                    <tr>
                        <th scope="row">Original Points</th>
                        <td><!--{$tpl_user_point|number_format|default:0}--> Points</td>
                    </tr>
                    <tr>
                        <th scope="row">Applied Points</th>
                        <td>-<!--{$arrForm.use_point|number_format|default:0}--> Points</td>
                    </tr>
                    <!--{if $arrForm.birth_point > 0}-->
                    <tr>
                        <th scope="row">お誕生月ポイント</th>
                        <td>+<!--{$arrForm.birth_point|number_format|default:0}--> Points</td>
                    </tr>
                    <!--{/if}-->
                    <tr>
                        <th scope="row">Reward Points</th>
                        <td>+<!--{$arrForm.add_point|number_format|default:0}--> Points</td>
                    </tr>
                    <tr>
                    <!--{assign var=total_point value=`$tpl_user_point-$arrForm.use_point+$arrForm.add_point`}-->
                        <th scope="row">Balance</th>
                        <td><!--{$total_point|number_format}--> Points</td>
                    </tr>
                </table>
            <!--{/if}-->
            <!--{* ログイン済みの会員のみ *}-->

            <!--{* ▼注文者 *}-->
            <h3>Customer Information</h3>
            <table summary="ご注文者" class="customer">
                <col width="30%" />
                <col width="70%" />
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td><!--{$arrForm.order_name02|h}--> <!--{$arrForm.order_name01|h}--></td>
                    </tr>
                    <!--<tr>-->
                        <!--<th scope="row">お名前(フリガナ)</th>-->
                        <!--<td><!--{$arrForm.order_kana01|h}--> <!--{$arrForm.order_kana02|h}--></td>-->
                    <!--</tr>-->
                    <!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
                    <tr>
                        <th scope="row">Country</th>
                        <td><!--{$arrCountry[$arrForm.order_country_id]|h}--></td>
                    </tr>
                    <!--<tr>-->
                        <!--<th scope="row">ZIPCODE</th>-->
                        <!--<td><!--{$arrForm.order_zipcode|h}--></td>-->
                    <!--</tr>-->
                    <!--{/if}-->
                    <!--<tr>-->
                        <!--<th scope="row">郵便番号</th>-->
                        <!--<td>〒<!--{$arrForm.order_zip01|h}-->-<!--{$arrForm.order_zip02|h}--></td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                        <!--<th scope="row">Country2</th>-->
                        <!--<td><!--{$arrCountry[$arrForm.order_country_id]|h}--></td>-->
                    <!--</tr>-->
                    <tr>
                        <th scope="row">Address</th>
                        <td><!--{$arrPref[$arrForm.order_pref]}--> <!--{$arrForm.order_addr01|h}--> <!--{$arrForm.order_addr02|h}--></td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td><!--{$arrForm.order_tel01}-->-<!--{$arrForm.order_tel02}-->-<!--{$arrForm.order_tel03}--></td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td><!--{$arrForm.order_email|h}--></td>
                    </tr>
		<!--{if $smarty.session.pre_deliv_id == 3 || $smarty.session.pre_deliv_id == 1 || $smarty.session.pre_deliv_id == 4}-->
                    <tr style="display: none">
                        <th scope="row">Would you like to use one unit continuously?</th>
                        <td>
                            <!--{if $arrForm.order_fax01 == 0}-->
                               未選択
                            <!--{elseif $arrForm.order_fax01 == 1}-->
                               No, multiple units at same time
                            <!--{elseif $arrForm.order_fax01 == 2}-->
                               Yes, only one unit
                            <!--{/if}-->
                        </td>
                    </tr>
		<!--{elseif $smarty.session.pre_deliv_id == 5}-->
                    <tr>
                        <th scope="row">Terminal number</th>
                        <td><!--{$arrForm.order_company_name|h}--></td>
                    </tr>
		<!--{/if}-->
                    <!--<tr>-->
                        <!--<th scope="row">性別</th>-->
                        <!--<td><!--{$arrSex[$arrForm.order_sex]|h}--></td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                        <!--<th scope="row">職業</th>-->
                        <!--<td><!--{$arrJob[$arrForm.order_job]|default:'(未登録)'|h}--></td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                        <!--<th scope="row">生年月日</th>-->
                        <!--<td>
                            <!--{$arrForm.order_birth|regex_replace:"/ .+/":""|regex_replace:"/-/":"/"|default:'(未登録)'|h}-->
                        </td>-->
                    <!--</tr>-->
                </tbody>
            </table>

<!--{if $smarty.session.pre_deliv_id == 8}-->
<!--{else}-->
            <!--{* ▼お届け先 *}-->
            <!--{foreach item=shippingItem from=$arrShipping name=shippingItem}-->
	<!--{if $smarty.session.pre_deliv_id == 4}-->
                <h3>Our store<!--{if $is_multiple}--><!--{$smarty.foreach.shippingItem.iteration}--><!--{/if}--></h3>
	<!--{else}-->
                <h3>Delivery Information<!--{if $is_multiple}--><!--{$smarty.foreach.shippingItem.iteration}--><!--{/if}--></h3>
	<!--{/if}-->
                <!--{if $is_multiple}-->
                    <table summary="ご注文内容確認">
                        <col width="10%" />
                        <col width="60%" />
                        <col width="20%" />
                        <col width="10%" />
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Item</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                        <!--{foreach item=item from=$shippingItem.shipment_item}-->
                            <tr>
                                <td class="alignC">
                                    <a
                                        <!--{if $item.productsClass.main_image|strlen >= 1}--> href="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$item.productsClass.main_image|sfNoImageMainList|h}-->" class="expansion" target="_blank"
                                        <!--{/if}-->
                                    >
                                        <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$item.productsClass.main_list_image|sfNoImageMainList|h}-->" style="max-width: 65px;max-height: 65px;" alt="<!--{$item.productsClass.name|h}-->" /></a>
                                </td>
                                <td><!--{* 商品名 *}--><strong><!--{$item.productsClass.name|h}--></strong><br />
                                    <!--{if $item.productsClass.classcategory_name1 != ""}-->
                                        <!--{$item.productsClass.class_name1}-->：<!--{$item.productsClass.classcategory_name1}--><br />
                                    <!--{/if}-->
                                    <!--{if $item.productsClass.classcategory_name2 != ""}-->
                                        <!--{$item.productsClass.class_name2}-->：<!--{$item.productsClass.classcategory_name2}-->
                                    <!--{/if}-->
                                </td>
                                <td class="alignC"><!--{$item.quantity}--></td>
                                <td class="alignR">
                                    <!--{$item.total_inctax|number_format}-->円
                                </td>
                            </tr>
                        <!--{/foreach}-->
                    </table>
                <!--{/if}-->

                <table summary="お届け先確認" class="delivname">
                    <col width="30%" />
                    <col width="70%" />
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td><!--{$shippingItem.shipping_name01|h}--> <!--{$shippingItem.shipping_name02|h}--></td>
                        </tr>
                        <!--<tr>-->
                            <!--<th scope="row">お名前(フリガナ)</th>-->
                            <!--<td><!--{$shippingItem.shipping_kana01|h}--> <!--{$shippingItem.shipping_kana02|h}--></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<th scope="row">Terminal number(The consumer who use “extension”)</th>-->
                            <!--<td><!--{$shippingItem.shipping_company_name|h}--></td>-->
                        <!--</tr>-->
                        <!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
 <!--{if false}-->
                        <tr>
                           <th scope="row">国</th>
                           <td><!--{$arrCountry[$shippingItem.shipping_country_id]|h}--></td>
                        </tr>
                        <tr>
                            <th scope="row">Post Code</th>
                            <td><!--{$shippingItem.shipping_zipcode|h}--></td>
                        </tr>
 <!--{/if}-->
                        <!--{else}-->
                        <tr>
                            <th scope="row">Post Code</th>
                            <td>〒<!--{$shippingItem.shipping_zip01|h}-->-<!--{$shippingItem.shipping_zip02|h}--></td>
                        </tr>
                        <!--{/if}-->
                        <tr>
                            <th scope="row">Address</th>
                            <td><!--{$shippingItem.shipping_addr01|h}--> <!--{$shippingItem.shipping_addr02|h}--> <!--{$arrPref[$shippingItem.shipping_pref]}--></td>
                        </tr>
                       <!--{if $smarty.session.pre_deliv_id == 1}-->
                       <tr>
                          <th scope="row">Hotel name</th>
                          <td><!--{$shippingItem.shipping_company_name|h}--></td>
                       </tr>
                        <!--{/if}-->
                        <tr>
                            <th scope="row">Phone</th>
                            <td><!--{$shippingItem.shipping_tel01}--><!--{$shippingItem.shipping_tel02}--><!--{$shippingItem.shipping_tel03}--></td>
                        </tr>
                        <!--<tr>-->
                            <!-- <th scope="row">FAX番号</th> -->
                            <!-- <td>
                                <!--{if $shippingItem.shipping_fax01 > 0}-->
                                    <!--{$shippingItem.shipping_fax01}-->-<!--{$shippingItem.shipping_fax02}-->-<!--{$shippingItem.shipping_fax03}-->
                                <!--{/if}-->
                            </td> -->
                        <!--</tr>-->
                        <!--{if $cartKey != $smarty.const.PRODUCT_TYPE_DOWNLOAD}-->
<!--{if $smarty.session.pre_deliv_id != 9}-->
                            <tr>
<!--{if $smarty.session.pre_deliv_id == 5}-->
                                <th scope="row">Rental Extension Start Date</th>
<!--{else}-->
                                <th scope="row">Rental Start Date</th>
	<!--{/if}-->
                                <td><!--{$arrForm.start_date|default:"Not specified"|h}--></td>
                            </tr>
                            <tr>
<!--{if $smarty.session.pre_deliv_id == 5}-->
                                <th scope="row">Rental Extension End Date</th>
<!--{else}-->
                                <th scope="row">Rental End Date</th>
	<!--{/if}-->
                                <td><!--{$arrForm.end_date|default:"Not specified"|h}--></td>
                            </tr>
<!--{/if}-->
                            <tr>
	<!--{if $smarty.session.pre_deliv_id == 4}-->
                                <th scope="row">Pickup Date</th>
 <!--{elseif $smarty.session.pre_deliv_id == 5}-->
                                <!--<th scope="row">Extension start</th>-->
	<!--{else}-->
                                <th scope="row">Delivery Date (YYYY/MM/DD)</th>
	<!--{/if}-->

 <!--{if $smarty.session.pre_deliv_id == 5}-->
 	<!--{else}-->
                                <td><!--{$shippingItem.shipping_date|default:"指定なし"|h}--></td>
	<!--{/if}-->
                            </tr>
                            <tr>
	<!--{if $smarty.session.pre_deliv_id == 4}-->
                                <th scope="row">Pickup Time</th>
 <!--{elseif $smarty.session.pre_deliv_id == 5}-->
	<!--{else}-->
                                <th scope="row">Delivery Time</th>
	<!--{/if}-->
  <!--{if $smarty.session.pre_deliv_id == 5}-->
 	<!--{else}-->
                                <td><!--{$shippingItem.shipping_time|default:"Not specified"|h}--></td>
	<!--{/if}-->
                            </tr>
                        <!--{/if}-->
                    </tbody>
                </table>
            <!--{/foreach}-->
            <!--{* ▲お届け先 *}-->
<!--{/if}-->

            <h3>Pickup / Payment Method</h3>
            <table summary="配送方法・お支払方法・その他お問い合わせ" class="delivname">
                <col width="30%" />
                <col width="70%" />
                <tbody>
                <tr>
                    <th scope="row">Pickup Method</th>
                    <td><!--{$arrDeliv[$arrForm.deliv_id]|h}--></td>
                </tr>
                <tr>
                    <th scope="row">Payment</th>
                    <td><!--{$arrForm.payment_method|h}--></td>
                </tr>
                <tr>
                    <th scope="row">Remarks</th>
                    <td><!--{$arrForm.message|h|nl2br}--></td>
                </tr>
                </tbody>
            </table>

            <div class="btn_area">
                <ul>
                    <li class="form_btn return_btn">
                        <a href="./payment.php"><img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る" name="back<!--{$key}-->" /></a>
                    </li>
                    <!--{if $use_module}-->
                    <li class="form_btn next_btn">
                        <input type="image" onclick="return fnCheckSubmit();" class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="次へ" name="next" id="next" />
                    </li>
                    <!--{else}-->
                    <li class="form_btn next_btn">
                        <input type="image" onclick="return fnCheckSubmit();" class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="ご注文完了ページへ"  name="next" id="next" />
                    </li>
                    <!--{/if}-->
                    <li class="form_btn return_btn_sp">
                        <a href="./payment.php"><img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る" name="back<!--{$key}-->" /></a>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>
