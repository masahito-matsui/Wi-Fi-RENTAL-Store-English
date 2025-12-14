<!--{*
 * ExpressLink
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

Dear Mr./Ms. <!--{$arrOrder.order_name02}--> <!--{$arrOrder.order_name01}-->,

<!--{$tpl_header}-->

<!--{if false}-->以下のご注文の発送が完了致しました。
ご到着までの間しばらくお待ちください。
配送先ごとに伝票番号を記載しておりますのでご確認ください。<!--{/if}-->

【Order Number：<!--{$arrOrder.order_id}-->】

<!--{foreach item=shipping name=shipping from=$arrShipping}-->

<!--{if $shipping.plg_expresslink_slip_number|strlen > 0}-->
--------------------------------------------------------
◎Order tracking number ： <!--{$shipping.plg_expresslink_slip_number}-->
--------------------------------------------------------
<!--{if $shipping.confirm_url|strlen > 7}-->
<!--{$shipping.confirm_url}-->
<!--{/if}-->
<!--{/if}-->

<!--{if $arrOrder.deliv_id == 4}-->
■Pickup store　：<!--{if count($arrShipping) > 1}--><!--{$smarty.foreach.shipping.iteration}--><!--{/if}--><!--{$shipping.shipping_name01}--> <!--{$shipping.shipping_name02}-->
<!--{else}-->
■Delivery place<!--{if count($arrShipping) > 1}--><!--{$smarty.foreach.shipping.iteration}--><!--{/if}-->

　Recipient　：<!--{$shipping.shipping_name01}--> <!--{$shipping.shipping_name02}-->　
<!--{/if}-->
<!--{if $arrOrder.deliv_id == 5}-->
<!--{if $arrOrder.order_company_name != ""}-->
　Terminal number　：<!--{$arrOrder.order_company_name}-->
<!--{/if}-->
<!--{/if}-->

　<!--{if false}-->ZIPCODE ：〒<!--{$shipping.shipping_zipcode}--><!--{/if}-->
　Post Code：〒<!--{$shipping.shipping_zip01}-->-<!--{$shipping.shipping_zip02}-->
　Address　　：<!--{$shipping.shipping_addr01}--><!--{$shipping.shipping_addr02}-->　<!--{$arrPref[$shipping.shipping_pref]}-->
<!--{if $arrOrder.deliv_id == 1}-->
<!--{if $shipping.shipping_company_name != ""}-->
　Hotel name　：<!--{$shipping.shipping_company_name}-->
<!--{/if}-->
<!--{/if}-->
　Phone：<!--{$shipping.shipping_tel01}-->-<!--{$shipping.shipping_tel02}-->-<!--{$shipping.shipping_tel03}-->
<!--{if $shipping.plg_expresslink_center_stop == 1}-->
　営業所止め：<!--{$shipping.plg_expresslink_center_code}-->
<!--{/if}-->

<!--{foreach item=item name=item from=$shipping.shipment_item}-->
<!--{if false}-->Commodity code: <!--{$item.product_code}--><!--{/if}-->
<!--{if $arrOrder.deliv_id == 5}-->
Name of Commodity: <!--{$item.product_name|strip_tags}-->
Are you renting an additional battery?：<!--{$item.classcategory_name1}-->
<!--{$arrOrderDetail[cnt].classcategory_name2}-->
<!--{else}-->
Name of Commodity: <!--{$item.product_name|strip_tags}-->
Insurance/repair service：<!--{$item.classcategory_name1}-->
Additional battery rental：<!--{$item.classcategory_name2}-->
<!--{/if}-->
Quantity：<!--{$item.quantity}-->

<!--{/foreach}-->
Delivery method：<!--{$arrDeliv[$arrOrder.deliv_id]}-->
<!--{if $arrOrder.deliv_id == 4}-->
<!--{if $shipping.shipping_date || $shipping.shipping_time}-->
Pickup date：<!--{$shipping.shipping_date|date_format:"%Y/%m/%d"|default:"指定なし"}-->
Pickup time slot：<!--{$shipping.shipping_time|default:"指定なし"}-->
<!--{/if}-->
<!--{else}-->
<!--{if $shipping.shipping_date || $shipping.shipping_time}-->
Delivery date：<!--{$shipping.shipping_date|date_format:"%Y/%m/%d"|default:"指定なし"}-->
Delivery time slot：<!--{$shipping.shipping_time|default:"指定なし"}-->
<!--{/if}-->
<!--{/if}-->

<!--{/foreach}-->

<!--{$tpl_footer}-->
