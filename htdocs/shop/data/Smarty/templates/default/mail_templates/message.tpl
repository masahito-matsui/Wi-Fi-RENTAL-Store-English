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
Dear Mr./Ms.   <!--{$arrOrder.order_name02}--> <!--{$arrOrder.order_name01}-->,

<!--{$tpl_header}-->

** Message:
<!--{$Message_tmp}-->

<!--{if $arrOrder.deliv_id == 5}-->
*** Extension Orders ***
The updated rental period will be informed when we complete the extension process  manually.
Please use your current device continuously.
<!--{else}-->
We will inform you the package tracking number by e-mail when your order is shipped.
<!--{/if}-->

[Order Number: <!--{$arrOrder.order_id}-->]

**Contract Details

<!--{section name=cnt loop=$arrOrderDetail}-->
<!--{if $arrOrderDetail[cnt].product_class_id == 228}-->
<!--{math equation='x*y' x=$arrOrderDetail[cnt].price y=$arrOrderDetail[cnt].quantity assign='total_inctax'}-->
<!--{php}-->$add_charge_flg = 1;<!--{/php}-->
<!--{else}-->
<!--{if false}-->商品コード: <!--{$arrOrderDetail[cnt].product_code}--><!--{/if}-->
<!--{if $arrOrder.deliv_id == 5}-->
Rental Plan/Model: <!--{$arrOrderDetail[cnt].product_name}-->
Additional Battery: <!--{$arrOrderDetail[cnt].classcategory_name1}-->
<!--{$arrOrderDetail[cnt].classcategory_name2}-->
<!--{elseif $arrOrder.deliv_id == 8}-->
<!--{else}-->
Rental Plan/Model: <!--{$arrOrderDetail[cnt].product_name}-->
Insurance/Repair Service: <!--{$arrOrderDetail[cnt].classcategory_name1}-->
Additional Battery Rental: <!--{$arrOrderDetail[cnt].classcategory_name2}-->
<!--{/if}-->
Unit Price: <!--{$arrOrderDetail[cnt].price|sfCalcIncTax:$arrOrderDetail[cnt].tax_rate:$arrOrderDetail[cnt].tax_rule|number_format}--> JPY
Quantity: <!--{$arrOrderDetail[cnt].quantity}-->

<!--{/if}-->
<!--{/section}-->
-------------------------------------------------
<!--{php}-->if($add_charge_flg == 1) {<!--{/php}-->
Subtotal: <!--{$arrOrder.subtotal-$total_inctax|number_format|default:0}--> JPY <!--{if 0 < $arrOrder.tax}-->(Consumption tax ￥<!--{$arrOrder.tax-80|number_format|default:0}-->)<!--{/if}-->
<!--{php}-->} else {<!--{/php}-->
Subtotal: <!--{$arrOrder.subtotal|number_format|default:0}--> JPY <!--{if 0 < $arrOrder.tax}-->(Consumption tax ￥<!--{$arrOrder.tax|number_format|default:0}-->)<!--{/if}-->
<!--{php}-->}<!--{/php}-->

<!--{if false}-->
<!--{if $arrOrder.use_point > 0}-->
値引き ￥<!--{$arrOrder.use_point*$smarty.const.POINT_VALUE+$arrOrder.discount|number_format|default:0}-->
<!--{/if}-->
<!--{/if}-->
<!--{if $arrOrder.discount > 0}-->
Reduced Fee: <!--{$arrOrder.discount|number_format|default:0}--> JPY
<!--{/if}-->
<!--{if $arrOrder.use_point > 0}-->
Point Discout: <!--{$arrOrder.use_point*$smarty.const.POINT_VALUE}--> JPY
<!--{/if}-->
Delivery Fee: <!--{$arrOrder.deliv_fee|number_format|default:0}--> JPY
<!--{php}-->if($add_charge_flg == 1) {<!--{/php}-->
Additional Delivery fee: <!--{$total_inctax|number_format}--> JPY
<!--{php}-->}<!--{/php}-->
<!--{if $arrOrder.charge > 0}-->
Modified Amount: <!--{$arrOrder.charge|number_format|default:0}--> JPY
<!--{/if}-->
============================================
Total: <!--{$arrOrder.payment_total|number_format|default:0}--> JPY

Payment Method: <!--{$arrOrder.payment_method}-->


<!--{if $arrOther.title.value}-->

<!--{if false}--><!--{$arrOther.title.name}-->情報<!--{/if}-->


<!--{foreach key=key item=item from=$arrOther}-->
<!--{if $key != "title"}-->
<!--{if false}--><!--{if $item.name != ""}--><!--{$item.name}-->：<!--{/if}--><!--{$item.value}--><!--{/if}-->
<!--{/if}-->
<!--{/foreach}-->
<!--{/if}-->


** Ordered by:

　Name: Mr./Ms.  <!--{$arrOrder.order_name01}--> <!--{$arrOrder.order_name02}-->　
<!--{if $arrOrder.deliv_id == 5}-->
<!--{if $arrOrder.order_company_name != ""}-->
　Terminal Number: <!--{$arrOrder.order_company_name}-->
<!--{/if}-->
<!--{/if}-->
<!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
<!--{if false}-->
　Country: <!--{$arrCountry[$arrOrder.order_country_id]}-->
　Post Code: <!--{$arrOrder.order_zipcode}-->
<!--{/if}-->
<!--{/if}-->
<!--{if false}-->
　Post Code_2：〒<!--{$arrOrder.order_zip01}-->-<!--{$arrOrder.order_zip02}-->
<!--{/if}-->
　Address: <!--{$arrPref[$arrOrder.order_pref]}--><!--{$arrOrder.order_addr01}--><!--{$arrOrder.order_addr02}-->
　Phone: <!--{$arrOrder.order_tel01}--><!--{$arrOrder.order_tel02}--><!--{$arrOrder.order_tel03}-->
<!--{if false}-->
　FAX番号 ：<!--{if $arrOrder.order_fax01 > 0}--><!--{$arrOrder.order_fax01}-->-<!--{$arrOrder.order_fax02}-->-<!--{$arrOrder.order_fax03}--><!--{/if}-->
<!--{/if}-->
　E-mail: <!--{$arrOrder.order_email}-->

<!--{if count($arrShipping) >= 1}-->
<!--{if $arrOrder.deliv_id == 8}-->
<!--{else}-->

<!--{if $arrOrder.deliv_id == 4}-->
** Pickup Information
<!--{elseif $arrOrder.deliv_id == 5}-->
<!--{else}-->
** Delivery Information
<!--{/if}-->

<!--{foreach item=shipping name=shipping from=$arrShipping}-->
<!--{if $arrOrder.deliv_id == 5}-->
<!--{if false}-->表示なしにする(配送情報)<!--{/if}-->
<!--{else}-->
<!--{if $arrOrder.deliv_id == 4}-->
　Pickup Store: <!--{if count($arrShipping) > 1}--><!--{$smarty.foreach.shipping.iteration}--><!--{/if}--><!--{$shipping.shipping_name01}--> <!--{$shipping.shipping_name02}-->
<!--{else}-->
　<!--{if false}-->Delivery Place<!--{if count($arrShipping) > 1}--><!--{$smarty.foreach.shipping.iteration}--><!--{/if}--><!--{/if}-->
Recipient Name: Mr./Ms. <!--{$shipping.shipping_name01}--> <!--{$shipping.shipping_name02}-->　
<!--{/if}-->
<!--{if $arrOrder.deliv_id == 1}-->
<!--{if $shipping.shipping_company_name != ""}-->
　Hotel Name: <!--{$shipping.shipping_company_name}-->
<!--{/if}-->
<!--{/if}-->
<!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
<!--{if false}-->　国　　　：<!--{$arrCountry[$shipping.shipping_country_id]}--><!--{/if}-->
<!--{if false}-->Post Code ：〒<!--{$shipping.shipping_zipcode}--><!--{/if}-->
<!--{/if}-->
　Post Code: <!--{$shipping.shipping_zip01}-->-<!--{$shipping.shipping_zip02}-->
　Address: <!--{$shipping.shipping_addr01}--><!--{$shipping.shipping_addr02}--> <!--{$arrPref[$shipping.shipping_pref]}-->
<!--{if $arrOrder.deliv_id == 3}-->
　>>> Pickup Location / MAP
　https://en.wifi-rental-store.jp/pickup_location.html
<!--{/if}-->

　Phone: <!--{$shipping.shipping_tel01}--><!--{$shipping.shipping_tel02}--><!--{$shipping.shipping_tel03}-->
<!--{if false}-->
　FAX番号 ：<!--{if $shipping.shipping_fax01 > 0}--><!--{$shipping.shipping_fax01}-->-<!--{$shipping.shipping_fax02}-->-<!--{$shipping.shipping_fax03}--><!--{else}-->　<!--{/if}-->
<!--{/if}-->
<!--{if $arrOrder.deliv_id == 4}-->
　Pickup Date: <!--{$shipping.shipping_date|date_format:"%Y/%m/%d"|default:"Not specified"}-->
　Pickup Time Slot: <!--{$shipping.shipping_time|default:"Not specified"}-->
　　(* Pickup date is this rental starting date.)
<!--{elseif $arrOrder.deliv_id == 5}-->
　Start Date For Extension: <!--{$shipping.shipping_date|date_format:"%Y/%m/%d"|default:"Not specified"}-->
　　(* This is an extension order. Please keep using the current device continuously.)
<!--{else}-->
　Delivery Date: <!--{$shipping.shipping_date|date_format:"%Y/%m/%d"|default:"Not specified"}-->
　Delivery Time Slot: <!--{$shipping.shipping_time|default:"Not specified"}-->
　(* Delivery date is the rental start date.)
<!--{/if}-->
<!--{/if}-->

<!--{foreach item=item name=item from=$shipping.shipment_item}-->
<!--{if false}-->
商品コード: <!--{$item.product_code}-->
<!--{/if}-->
<!--{if false}-->
商品名: <!--{$item.product_name}--> <!--{$item.classcategory_name1}--> <!--{$item.classcategory_name2}-->
<!--{assign var=shipping_product value=$item.productsClass}-->
<!--{/if}-->
<!--{if false}-->
単価：￥<!--{$shipping_product.price02_inctax|number_format}-->
<!--{/if}-->
<!--{if false}-->
数量：<!--{$item.quantity|number_format}-->
<!--{/if}-->

<!--{/foreach}-->
<!--{/foreach}-->
<!--{/if}-->
<!--{/if}-->
<!--{if $arrOrder.customer_id && $smarty.const.USE_POINT !== false}-->
============================================
<!--{* ご注文前のポイント {$tpl_user_point} pt *}-->
Used points: <!--{$arrOrder.use_point|default:0|number_format}--> pt
Possible points added this time: <!--{$arrOrder.add_point|default:0|number_format}--> pt
Current available points: <!--{$arrCustomer.point|default:0|number_format}--> pt
<!--{/if}-->

<!--{$tpl_footer}-->
