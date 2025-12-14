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

<!--{if $smarty.const.plg_ExpressLink_Center_Stop == 1}-->
○営業店・郵便局留めをご希望の場合
お近くの宅急便センターで商品をお受け取りご希望のお客様は下記で「留め置きする」をお選び頂き、センターコード・郵便局名をご入力ください。<br>
<br>
<!--{assign var=key value="plg_expresslink_center_stop`$index`"}-->
<span class="attention"><!--{$arrErr[$key]}--></span>
営業店・郵便局留め：
<select name="<!--{$key}-->" id="<!--{$key}-->" class="boxLong data-role-none" style="<!--{$arrErr[$key]|sfGetErrorColor}-->">
    <!--{assign var=shipping_center_stop value=$arrForm[$key].value}-->
    <!--{html_options options=$arrStop selected=$shipping_center_stop|default:$shippingItem.plg_expresslink_center_stop}-->
</select><br>
<!--{assign var=key value="plg_expresslink_center_code`$index`"}-->
営業店留めする場合<br>
<font color="#FF0000">※パソコン等で営業店コード・郵便局名をお調べ頂く必要がございます</font><br>
<font color="#FF0000"><!--{$arrErr[$key]}--></font><br>
営業店コード・郵便局名を入力　<input type="text" name="<!--{$key}-->"  value="<!--{$arrForm[$key].value|default:$shippingItem.plg_expresslink_center_code|h}-->">
<!--{if $smarty.const.plg_ExpressLink_Use_YuPack4 == 1 || $smarty.const.plg_ExpressLink_Use_YuPackR == 1}--><br>
<!--{assign var=key value="plg_expresslink_center_zip`$index`"}-->
<font color="#FF0000"><!--{$arrErr[$key]}--></font><br>
局留め郵便番号　<input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|default:$shippingItem.plg_expresslink_center_zip|h}-->" ><br>
<font color="#FF0000">郵便局留めをご希望の場合は郵便局の郵便番号を入力してください。-(ハイフン)なしでお願い致します。</font><!--{/if}-->
<br>
<!--{/if}-->