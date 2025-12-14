<!--{*
 * GAECommerceUA: UA版 Google Analytics eコマース対応 プラグイン
 * Copyright (C) 2013 C-Rowl Co.,Ltd. All Rights Reserved.
 * http://www.c-rowl.com/
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
<!--{if $plg_gaecommerceua_arrConfig.ga_tid|strlen > 0}-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<!--{$plg_gaecommerceua_arrConfig.ga_tid}-->', {
    'name': 'plg_gaecommerceua',
    'cookieDomain': 'auto'
  });

  ga('plg_gaecommerceua.send', 'pageview');

  <!--{* 完了ページの場合のみ、eコマーストラッキングを行う *}-->
  <!--{if $plg_gaecommerceua_ecommerce_flg == 1 && $plg_gaecommerceua_arrOrder.order_id > 0}-->
    ga('plg_gaecommerceua.require', 'ecommerce', 'ecommerce.js');

    ga('plg_gaecommerceua.ecommerce:addTransaction', {
      'id': '<!--{$plg_gaecommerceua_arrOrder.order_id|h}-->',
      'affiliation': '<!--{$arrInfo.shop_name|h}-->',
      'revenue': '<!--{$plg_gaecommerceua_arrOrder.total|h}-->',
      'shipping': '<!--{$plg_gaecommerceua_arrOrder.deliv_fee|h}-->',
      'tax': '<!--{$plg_gaecommerceua_arrOrder.tax|h}-->'
    });

    <!--{section name=cnt loop=$plg_gaecommerceua_arrOrderDetail}-->
      ga('plg_gaecommerceua.ecommerce:addItem', {
        'id': '<!--{$plg_gaecommerceua_arrOrder.order_id|h}-->',
        'name': '<!--{$plg_gaecommerceua_arrOrderDetail[cnt].product_name|h}-->',
        'sku': '<!--{$plg_gaecommerceua_arrOrderDetail[cnt].product_code|h}-->',
        'category': '<!--{$plg_gaecommerceua_arrOrderDetail[cnt].category_name|h}-->',
        'price': '<!--{$plg_gaecommerceua_arrOrderDetail[cnt].price|h}-->',
        'quantity': '<!--{$plg_gaecommerceua_arrOrderDetail[cnt].quantity|h}-->'
      });
    <!--{/section}-->

    ga('plg_gaecommerceua.ecommerce:send');
  <!--{/if}-->
</script>
<!--{/if}-->
