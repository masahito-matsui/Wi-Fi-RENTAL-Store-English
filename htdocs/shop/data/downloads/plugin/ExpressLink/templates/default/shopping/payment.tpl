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
<div class="pay_area02">
    <h3>営業店・郵便局留めをご希望の場合</h3>
    <p style="line-height:1.8em;">お近くの宅急便センター・郵便局で商品をお受け取りご希望のお客様は下記で「留め置きする」をお選び頂き、センターコード・郵便局名をご入力ください。<br>
        ※ご自宅、お勤め先への配送をご希望の方は選択の必要はありません。</p>
    <!--{foreach item=shippingItem name=shippingItem from=$arrShipping}-->
    <!--{assign var=index value=$shippingItem.shipping_id}-->
    <div class="delivdate top">
        <!--{if $is_multiple}-->
        <span class="st">▼<!--{$shippingItem.shipping_name01}--><!--{$shippingItem.shipping_name02}-->
            <!--{$arrPref[$shippingItem.shipping_pref]}--><!--{$shippingItem.shipping_addr01}--><!--{$shippingItem.shipping_addr02}--></span><br/>
        <!--{/if}-->
        <br>
        <!--{assign var=key value="plg_expresslink_center_stop`$index`"}-->
        <span class="attention"><!--{$arrErr[$key]}--></span>
        営業店・郵便局止留め：
        <select name="<!--{$key}-->" id="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->">
            <!--{assign var=shipping_center_stop value=$arrForm[$key].value}-->
            <!--{html_options options=$arrStop selected=$shipping_center_stop|default:$shippingItem.plg_expresslink_center_stop}-->
        </select><br>
        <!--{assign var=key value="plg_expresslink_center_code`$index`"}-->
        営業店・郵便局留めする場合→　　<!--{if $smarty.const.plg_ExpressLink_Use_B2 == 1 && strlen($yamato_url) > 0}--><a href="<!--{$yamato_url}-->" target="_blank"><font color="#3366FF">クロネコヤマト宅急便の営業店を探す</font></a>&nbsp;&nbsp;&nbsp;<!--{/if}--><!--{if ($smarty.const.plg_ExpressLink_Use_Ehiden2 == 1 || $smarty.const.plg_ExpressLink_Use_EhidenPro == 1) && strlen($sagawa_url) > 0}--><a href="<!--{$sagawa_url}-->" target="_blank"><font color="#3366FF">佐川急便の営業店を探す</font></a>&nbsp;&nbsp;&nbsp;<!--{/if}--><!--{if $smarty.const.plg_ExpressLink_Use_KangarooMagic2 == 1 && strlen($seino_url) > 0}--><a href="<!--{$seino_url}-->" target="_blank"><font color="#3366FF">西濃運輸の営業所を探す</font></a>&nbsp;&nbsp;&nbsp;<!--{/if}-->
        <!--{if ($smarty.const.plg_ExpressLink_Use_YuPack4 == 1 || $smarty.const.plg_ExpressLink_Use_YuPackR == 1) && strlen($jpost_url) > 0}--><a href="<!--{$jpost_url}-->" target="_blank"><font color="#3366FF">郵便局名を探す</font></a><!--{/if}--><br>
        <span class="attention"><!--{$arrErr[$key]}--></span>
        営業店コード・郵便局名を入力　<input type="text" name="<!--{$key}-->" class="box160" value="<!--{$arrForm[$key].value|default:$shippingItem.plg_expresslink_center_code|h}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->"><!--{if $smarty.const.plg_ExpressLink_Use_YuPack4 == 1 || $smarty.const.plg_ExpressLink_Use_YuPackR == 1}--><br>
        <!--{assign var=key value="plg_expresslink_center_zip`$index`"}-->
        <span class="attention"><!--{$arrErr[$key]}--></span>
        局留め郵便番号　<input type="text" name="<!--{$key}-->" class="box160" value="<!--{$arrForm[$key].value|default:$shippingItem.plg_expresslink_center_zip|h}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->"><br>
        <span class="attention">郵便局留めをご希望の場合は郵便局の郵便番号を入力してください。-(ハイフン)なしでお願い致します。</span><!--{/if}-->
    </div>
    <!--{/foreach}-->		
</div>
<!--{/if}-->