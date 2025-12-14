<!--{*
*
* Plugin Code : ExpressLink
*
* Copyright (C) 2016 BraTech Co., Ltd. All Rights Reserved.
* http://www.bratech.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
 *}-->

<!--{$arrOrder.order_name01}--> <!--{$arrOrder.order_name02}--> 様

<!--{$tpl_header}-->

以下のご注文の発送が完了致しました。
ご到着までの間しばらくお待ちください。
配送先ごとに伝票番号を記載しておりますのでご確認ください。

ご注文番号：<!--{$arrOrder.order_id}-->

<!--{foreach item=shipping name=shipping from=$arrShipping}-->
◎お届け先<!--{if count($arrShipping) > 1}--><!--{$smarty.foreach.shipping.iteration}--><!--{/if}-->

　お名前　：<!--{$shipping.shipping_name01}--> <!--{$shipping.shipping_name02}-->　様
　郵便番号：〒<!--{$shipping.shipping_zip01}-->-<!--{$shipping.shipping_zip02}-->
　住所　　：<!--{$arrPref[$shipping.shipping_pref]}--><!--{$shipping.shipping_addr01}--><!--{$shipping.shipping_addr02}-->
　電話番号：<!--{$shipping.shipping_tel01}-->-<!--{$shipping.shipping_tel02}-->-<!--{$shipping.shipping_tel03}-->
<!--{if $shipping.plg_expresslink_center_stop == 1}-->
　営業所・郵便局留め：<!--{$shipping.plg_expresslink_center_code}-->
<!--{/if}-->

<!--{foreach item=item name=item from=$shipping.shipment_item}-->
商品コード: <!--{$item.product_code}-->
商品名: <!--{$item.product_name|strip_tags}--> <!--{$item.classcategory_name1}--> <!--{$item.classcategory_name2}-->
数量：<!--{$item.quantity}-->

<!--{/foreach}-->
配送業者：<!--{$arrDeliv[$arrOrder.deliv_id]}-->
<!--{if $shipping.shipping_date || $shipping.shipping_time}-->
お届け予定は以下のようになっております。
お届け日：<!--{$shipping.shipping_date|date_format:"%Y/%m/%d"|default:"指定なし"}-->
お届け時間：<!--{$shipping.shipping_time|default:"指定なし"}-->
<!--{/if}-->
<!--{if $shipping.plg_expresslink_slip_number|strlen > 0}-->
--------------------------------------------------------
◎お荷物お問合せNo. ： <!--{$shipping.plg_expresslink_slip_number}-->
--------------------------------------------------------
<!--{if $shipping.confirm_url|strlen > 7}-->
配送状況のご確認はこちらからお願い致します。
<!--{$shipping.confirm_url}--><!--{$shipping.plg_expresslink_slip_number}-->
<!--{/if}-->
<!--{/if}-->


<!--{/foreach}-->

<!--{$tpl_footer}-->
