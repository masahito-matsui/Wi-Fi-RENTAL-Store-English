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
Dear Mr./Ms.  <!--{$arrOrder.order_name02}--> <!--{$arrOrder.order_name01}-->,

<!--{$tpl_header}-->

[Order Number：<!--{$arrOrder.order_id}-->]

■Contract Detail 

<!--{section name=cnt loop=$arrOrderDetail}-->
Commodity code: <!--{$arrOrderDetail[cnt].product_code}-->
Name of commodity: <!--{$arrOrderDetail[cnt].product_name}--> <!--{$arrOrderDetail[cnt].classcategory_name1}--> <!--{$arrOrderDetail[cnt].classcategory_name2}-->
Unit price：￥<!--{$arrOrderDetail[cnt].price|sfCalcIncTax:$arrOrderDetail[cnt].tax_rate:$arrOrderDetail[cnt].tax_rule|number_format}-->
Quantity：<!--{$arrOrderDetail[cnt].quantity}-->

<!--{/section}-->
-------------------------------------------------
Subtotal ￥<!--{$arrOrder.subtotal|number_format|default:0}--> <!--{if 0 < $arrOrder.tax}-->(Consumption tax ￥<!--{$arrOrder.tax|number_format|default:0}-->)<!--{/if}-->

<!--{if $arrOrder.use_point > 0}-->
値引き ￥<!--{$arrOrder.use_point*$smarty.const.POINT_VALUE+$arrOrder.discount|number_format|default:0}-->
<!--{/if}-->
Delivery fee ￥<!--{$arrOrder.deliv_fee|number_format|default:0}-->
Commission ￥<!--{$arrOrder.charge|number_format|default:0}-->
============================================
Total ￥<!--{$arrOrder.payment_total|number_format|default:0}-->


Total：￥<!--{$arrOrder.payment_total|number_format|default:0}-->

Payment method：<!--{$arrOrder.payment_method}-->

■message：<!--{$Message_tmp}-->

<!--{if $arrOther.title.value}-->

<!--{if false}--><!--{$arrOther.title.name}-->情報<!--{/if}-->


<!--{foreach key=key item=item from=$arrOther}-->
<!--{if $key != "title"}-->
<!--{if false}--><!--{if $item.name != ""}--><!--{$item.name}-->：<!--{/if}--><!--{$item.value}--><!--{/if}-->
<!--{/if}-->
<!--{/foreach}-->
<!--{/if}-->


■Orderer information 

　Name　：<!--{$arrOrder.order_name01}--> <!--{$arrOrder.order_name02}-->　
<!--{if $arrOrder.deliv_id == 5}-->
<!--{if $arrOrder.order_company_name != ""}-->
　Terminal number　：<!--{$arrOrder.order_company_name}-->
<!--{/if}-->
<!--{/if}-->
<!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
　Country　　　：<!--{$arrCountry[$arrOrder.order_country_id]}-->
　Post Code ：〒<!--{$arrOrder.order_zipcode}-->
<!--{/if}-->
<!--{if false}-->
　Post Code_2：〒<!--{$arrOrder.order_zip01}-->-<!--{$arrOrder.order_zip02}-->
<!--{/if}-->
　Address ：<!--{$arrPref[$arrOrder.order_pref]}--><!--{$arrOrder.order_addr01}--><!--{$arrOrder.order_addr02}-->
　Phone   ：<!--{$arrOrder.order_tel01}-->-<!--{$arrOrder.order_tel02}-->-<!--{$arrOrder.order_tel03}-->
<!--{if false}-->
　FAX番号 ：<!--{if $arrOrder.order_fax01 > 0}--><!--{$arrOrder.order_fax01}-->-<!--{$arrOrder.order_fax02}-->-<!--{$arrOrder.order_fax03}--><!--{/if}-->
<!--{/if}-->
　E-mail：<!--{$arrOrder.order_email}-->

<!--{if count($arrShipping) >= 1}-->
<!--{if $arrOrder.deliv_id == 4}-->
■Pickup information
<!--{else}-->
■Delivery information
<!--{/if}-->

<!--{foreach item=shipping name=shipping from=$arrShipping}-->
<!--{if $arrOrder.deliv_id == 4}-->
　Pickup store　：<!--{if count($arrShipping) > 1}--><!--{$smarty.foreach.shipping.iteration}--><!--{/if}--><!--{$shipping.shipping_name01}--> <!--{$shipping.shipping_name02}-->
<!--{else}-->
　Delivery place<!--{if count($arrShipping) > 1}--><!--{$smarty.foreach.shipping.iteration}--><!--{/if}-->

　Recipient　：<!--{$shipping.shipping_name01}--> <!--{$shipping.shipping_name02}-->　
<!--{/if}-->
<!--{if $arrOrder.deliv_id == 1}-->
<!--{if $shipping.shipping_company_name != ""}-->
　Hotel name　：<!--{$shipping.shipping_company_name}-->
<!--{/if}-->
<!--{/if}-->
<!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
<!--{if false}-->　国　　　：<!--{$arrCountry[$shipping.shipping_country_id]}--><!--{/if}-->
　Post Code ：〒<!--{$shipping.shipping_zipcode}-->
<!--{/if}-->

  Post CodeE：〒<!--{$shipping.shipping_zip01}-->-<!--{$shipping.shipping_zip02}-->

　Address　　：<!--{$shipping.shipping_addr01}--><!--{$shipping.shipping_addr02}--> <!--{$arrPref[$shipping.shipping_pref]}-->
　Phone：<!--{$shipping.shipping_tel01}-->-<!--{$shipping.shipping_tel02}-->-<!--{$shipping.shipping_tel03}-->
<!--{if false}-->
　FAX番号 ：<!--{if $shipping.shipping_fax01 > 0}--><!--{$shipping.shipping_fax01}-->-<!--{$shipping.shipping_fax02}-->-<!--{$shipping.shipping_fax03}--><!--{else}-->　<!--{/if}-->
<!--{/if}-->
<!--{if $arrOrder.deliv_id == 4}-->
　Pickup date：<!--{$shipping.shipping_date|date_format:"%Y/%m/%d"|default:"指定なし"}-->
　Pickup time slot：<!--{$shipping.shipping_time|default:"指定なし"}-->
　　(＊Pickup date is this rental starting date.)
<!--{else}-->
　Delivery date：<!--{$shipping.shipping_date|date_format:"%Y/%m/%d"|default:"指定なし"}-->
　Delivery time slot：<!--{$shipping.shipping_time|default:"指定なし"}-->
　　(＊Delivery date is this rental starting date.)
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
<!--{if $arrOrder.customer_id && $smarty.const.USE_POINT !== false}-->
============================================
<!--{* ご注文前のポイント {$tpl_user_point} pt *}-->
Used points： <!--{$arrOrder.use_point|default:0|number_format}--> pt
Possible points added this time： <!--{$arrOrder.add_point|default:0|number_format}--> pt
Current available points： <!--{$arrCustomer.point|default:0|number_format}--> pt
<!--{/if}-->

<!--{$tpl_footer}-->
