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

<script type="text/javascript">//<![CDATA[
    // 規格2に選択肢を割り当てる。
    function fnSetClassCategories(form, classcat_id2_selected) {
        var $form = $(form);
        var product_id = $form.find('input[name=product_id]').val();
        var $sele1 = $form.find('select[name=classcategory_id1]');
        var $sele2 = $form.find('select[name=classcategory_id2]');
        eccube.setClassCategories($form, product_id, $sele1, $sele2, classcat_id2_selected);
    }
//]]></script>

<script>
$(function(){
	$('.thumb li').click(function(){
		var class_name = $(this).attr("class"); //クリックしたサムネイルのclass名を取得
		var num = class_name.slice(5); //class名の末尾の数字を取得
		$('.main li').hide(); //メインの画像を全て隠す
		$('.item' + num).fadeIn(); //クリックしたサムネイルに対応するメイン画像を表示
	});
});
</script>

<script type="text/javascript">
<!-- 入力必須 -->
$(function(){
   $('.enter_form').on('keydown keyup keypress change focus blur', function(){
       if($(this).val() == ''){
           $(this).css({backgroundColor:'#fff1f1'});
       } else {
           $(this).css({backgroundColor:'#fff'});
       }
   }).change();
});
</script>

    <!--★商品名★-->
<h2 class="product-name"><!--{$arrProduct.name|h}--></h2>
<div id="undercolumn">
<!--{if count($arrRelativeCat) > 0}-->
 <!--{if $arrRelativeCat.1.1.category_id == 30}-->
  <p class="top_attention">auKDDI HWD11 (100GB) model is scheduled to terminate its service in November 30th, 2020.<br>You cannot extend your rental period from December.</p>
<style>
 .top_attention{
	 font-size: 17px;
		line-height: 1.5;
		color: #E80003;
		background-color: #FFD8D9;
		padding: 25px;
	}
</style>
 <!--{/if}-->
<!--{/if}-->
    <form name="form1" id="form1" method="post" action="?">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <div id="detailarea" class="clearfix">

<section class="product_detail_wrap clearfix">
        <section class="image_wrap">
 <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.1.1.category_id == 22}-->
  <!---FS030W 20GB 通常--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/fs/img001.jpg" width="100%" alt=""></li>
                    <li class="item2"><img src="/thumb_change/img/fs/img002.jpg" width="100%" alt=""></li>
                    <li class="item3"><img src="/thumb_change/img/fs/img003.jpg" width="100%" alt=""></li>
                    <li class="item4"><img src="/thumb_change/img/fs/img004.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1"><img src="/thumb_change/img/fs/img001.jpg" width="100%" alt=""></li>
                    <li class="thumb2"><img src="/thumb_change/img/fs/img002.jpg" width="100%" alt=""></li>
                    <li class="thumb3"><img src="/thumb_change/img/fs/img003.jpg" width="100%" alt=""></li>
                    <li class="thumb4"><img src="/thumb_change/img/fs/img004.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--{elseif $arrRelativeCat.1.1.category_id == 25}-->
  <!---601HW 50GB 通常--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/sl/img001.jpg" width="100%" alt=""></li>
                    <li class="item2"><img src="/thumb_change/img/sl/img002.jpg" width="100%" alt=""></li>
                    <li class="item3"><img src="/thumb_change/img/sl/img003.jpg" width="100%" alt=""></li>
                    <li class="item4"><img src="/thumb_change/img/sl/img004.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1"><img src="/thumb_change/img/sl/img001.jpg" width="100%" alt=""></li>
                    <li class="thumb2"><img src="/thumb_change/img/sl/img002.jpg" width="100%" alt=""></li>
                    <li class="thumb3"><img src="/thumb_change/img/sl/img003.jpg" width="100%" alt=""></li>
                    <li class="thumb4"><img src="/thumb_change/img/sl/img004.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--{elseif $arrRelativeCat.1.1.category_id == 26}-->
  <!---809SH 通常--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/sh/img001.jpg" width="100%" alt=""></li>
                    <li class="item2"><img src="/thumb_change/img/sh/img002.jpg" width="100%" alt=""></li>
                    <li class="item3"><img src="/thumb_change/img/sh/img003.jpg" width="100%" alt=""></li>
                    <li class="item4"><img src="/thumb_change/img/sh/img004.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1"><img src="/thumb_change/img/sh/img001.jpg" width="100%" alt=""></li>
                    <li class="thumb2"><img src="/thumb_change/img/sh/img002.jpg" width="100%" alt=""></li>
                    <li class="thumb3"><img src="/thumb_change/img/sh/img003.jpg" width="100%" alt=""></li>
                    <li class="thumb4"><img src="/thumb_change/img/sh/img004.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--{elseif $arrRelativeCat.1.1.category_id == 33}-->
  <!---FS050W 無制限 通常--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/df/img001.jpg" width="100%" alt=""></li>
                    <li class="item2"><img src="/thumb_change/img/df/img002.jpg" width="100%" alt=""></li>
                    <li class="item3"><img src="/thumb_change/img/df/img003.jpg" width="100%" alt=""></li>
                    <li class="item4"><img src="/thumb_change/img/df/img004.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1"><img src="/thumb_change/img/df/img001.jpg" width="100%" alt=""></li>
                    <li class="thumb2"><img src="/thumb_change/img/df/img002.jpg" width="100%" alt=""></li>
                    <li class="thumb3"><img src="/thumb_change/img/df/img003.jpg" width="100%" alt=""></li>
                    <li class="thumb4"><img src="/thumb_change/img/df/img004.jpg" width="100%" alt=""></li>
                </ul>
             </div>

  <!--{elseif $arrRelativeCat.0.0.category_id == 38}-->
  <!---物理SIM 通常--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/sim/img001.png" width="100%" alt=""></li>
                    <!-- <li class="item2"><img src="/thumb_change/img/sim/img002.png" width="100%" alt=""></li> -->
                    <!-- <li class="item3"><img src="/thumb_change/img/sim/img003.png" width="100%" alt=""></li> -->
                    <!-- <li class="item4"><img src="/thumb_change/img/sim/img004.png" width="100%" alt=""></li> -->
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1"><img src="/thumb_change/img/sim/img001.png" width="100%" alt=""></li>
                    <!-- <li class="thumb2"><img src="/thumb_change/img/sim/img002.png" width="100%" alt=""></li> -->
                    <!-- <li class="thumb3"><img src="/thumb_change/img/sim/img003.png" width="100%" alt=""></li> -->
                    <!-- <li class="thumb4"><img src="/thumb_change/img/sim/img004.png" width="100%" alt=""></li> -->
                </ul>
             </div>

  <!--{elseif $arrRelativeCat.0.0.category_id == 35}-->
  <!---eSIM 通常--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/esim/img001.png" width="100%" alt=""></li>
                    <!-- <li class="item2"><img src="/thumb_change/img/esim/img002.png" width="100%" alt=""></li> -->
                    <!-- <li class="item3"><img src="/thumb_change/img/esim/img003.png" width="100%" alt=""></li> -->
                    <!-- <li class="item4"><img src="/thumb_change/img/esim/img004.png" width="100%" alt=""></li> -->
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1"><img src="/thumb_change/img/esim/img001.png" width="100%" alt=""></li>
                    <!-- <li class="thumb2"><img src="/thumb_change/img/esim/img002.png" width="100%" alt=""></li> -->
                    <!-- <li class="thumb3"><img src="/thumb_change/img/esim/img003.png" width="100%" alt=""></li> -->
                    <!-- <li class="thumb4"><img src="/thumb_change/img/esim/img004.png" width="100%" alt=""></li> -->
                </ul>
             </div>


  <!--{elseif $arrRelativeCat.1.1.category_id == 24}-->
  <!---FS030W 20GB延長--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/fs/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1" style="display:none"><img src="/thumb_change/img/fs/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
             </div>
    <!--{elseif $arrRelativeCat.1.1.category_id == 27}-->
  <!---601HW 50GB延長--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/sl/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1" style="display:none"><img src="/thumb_change/img/sl/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
             </div>
    <!--{elseif $arrRelativeCat.1.1.category_id == 28}-->
  <!---809SH延長--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/sh/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1" style="display:none"><img src="/thumb_change/img/sh/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
             </div>
    <!--{elseif $arrRelativeCat.1.1.category_id == 34}-->
  <!---FS050W 無制限 延長--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/df/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1" style="display:none"><img src="/thumb_change/img/df/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
             </div>

  <!--{elseif $arrRelativeCat.1.1.category_id == 30}-->
  <!---HWD11延長--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/hwd11/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1" style="display:none"><img src="/thumb_change/img/hwd11/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--{elseif $arrRelativeCat.1.1.category_id == 29}-->
  <!---303ZT延長--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/303zt/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb font-zero">
                    <li class="thumb1" style="display:none"><img src="/thumb_change/img/303zt/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--{else}-->
  <!--{assign var=key value="main_image"}-->
      <!--★画像★-->
          <img src="<!--{$arrFile[$key].filepath|h}-->" width="100%" alt="<!--{$arrProduct.name|h}-->" />
  <!--{/if}-->
<!--{/if}-->
        </section>

<div id="detailrightbloc">
    <!--▼商品ステータス-->
    <!--{assign var=ps value=$productStatus[$tpl_product_id]}-->
    <!--{if count($ps) > 0}-->
        <ul class="status_icon clearfix">
            <!--{foreach from=$ps item=status}-->
            <li>
                <img src="<!--{$TPL_URLPATH}--><!--{$arrSTATUS_IMAGE[$status]}-->" width="60" height="17" alt="<!--{$arrSTATUS[$status]}-->" id="icon<!--{$status}-->" />
            </li>
            <!--{/foreach}-->
        </ul>
    <!--{/if}-->
    <!--▲商品ステータス-->

    <!--★商品コード★-->
    <!--<dl class="product_code">
        <dt>商品コード：</dt>
        <dd>
            <span id="product_code_default">
                <!--{if $arrProduct.product_code_min == $arrProduct.product_code_max}-->
                    <!--{$arrProduct.product_code_min|h}-->
                <!--{else}-->
                    <!--{$arrProduct.product_code_min|h}-->～<!--{$arrProduct.product_code_max|h}-->
                <!--{/if}-->
            </span><span id="product_code_dynamic"></span>
        </dd>
    </dl>-->

 <!--{if $arrRelativeCat.0.0.category_id == 12}-->
<style>
.ex_limit30 {
    border: 2px solid #386984;
    padding: 9px;
    font-size: 14px;
    color: #f60;
    line-height: 17px;
    background-color: #fefff4;
    margin-bottom: 10px;
    margin-top: 10px;
}
#main_column.colnum1 #detailrightbloc {
    margin-top: 0px !important;
}
</style>
<div class="ex_limit30">The communication volume for SoftBank 303zt was changed to 30GB/month from the beginning of September 2016.</div>
<!--{/if}-->

 <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.1.1.category_id == 22}-->
   <!--★商品説明 FS030W 20GB 通常★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">SoftBank FS030W</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>150Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>50Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=601hw" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">5 to 7 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">20GB / Month
        <!--<p class="attention">The person who start renting in the middle of month receive a router which have 15GB and more left.</p>-->
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>If monthly data usage exceeds 20GB, the data transfer speed can be slow down. <br>
There is no extra charge for exceeding the data plan. <br>
(601HW routers show the data usage on the screen.)<br>
<br>
Data transfer speeds will recover the following calendar month. <br>
However, if you would like faster speeds, please place an order for another device until the end of the month.<br>
<br>
[Data Traffic Guarantee] <br>
Even if you start renting our products in the middle of the month, the routers are guaranteed to have at least 15GB of data left till the end of the month. <br>
You can use up your data plan with short-term rental plan such as 2 Days Rental.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Screen</td>
    </tr>
    <tr>
      <td colspan="2">The data usage is displayed on the screen.</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="https://www.wifi-rental-store.jp/guide/guide_fs030w_en.pdf" target="_blank">FS030W Start Guide</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display:none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>
  <!--{elseif $arrRelativeCat.1.1.category_id == 25}-->
   <!--★商品説明 601HW 50GB 通常★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">SoftBank 601HW</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>612Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>37.5Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=601hw" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">4 to 5 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">50GB / Month
        <!--<p class="attention">The person who start renting in the middle of month receive a router which have 15GB and more left.</p>-->
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>If monthly data usage exceeds 50GB, the data transfer speed can be slow down. <br>
There is no extra charge for exceeding the data plan. <br>
(601HW routers show the data usage on the screen.)<br>
<br>
Data transfer speed will recover the following calendar month.
However, if you would like faster speeds, please place an order for another device until the end of the month.<br>
<br>
[Data Traffic Guarantee] <br>
Even if you start renting our products in the middle of the month, the routers are guaranteed to have at least 40GB of data left till the end of the month. <br>
You can use up your data plan with short-term rental plan such as 2 Days Rental.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Screen</td>
    </tr>
    <tr>
      <td colspan="2">LCD touch screen. The data usage is displayed on the screen.</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_601hw_en.pdf" target="_blank">601HW Start Guide</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display:none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>
  <!--{elseif $arrRelativeCat.1.1.category_id == 26}-->
   <!--★商品説明 809SH 通常★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">SoftBank 809SH</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>774Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>37.5Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=809sh" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">6 to 8 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">100GB / Month
        <!--<p class="attention">The person who start renting in the middle of month receive a router which have 15GB and more left.</p>-->
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>If monthly data usage exceeds 100GB, the data transfer speed can be slow down.<br>
There is no extra charge for exceeding the data plan.<br>
(809SH routers show the data usage on the screen.)<br>
<br>
Data transfer speed will recover the following calendar month. However, if you would like faster speeds, please place an order for another device until the end of the month.<br>
<br>
[Data Traffic Guarantee]<br>
Your monthly data allowance is for the calendar month, so you can use the entire month's data allowance even if your rental starts in the middle of the month, or is short, such as for 2 days.<br>
There is no daily data limit.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Screen</td>
    </tr>
    <tr>
      <td colspan="2">LCD touch screen. The data usage is displayed on the screen.</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_sh809_en.pdf" target="_blank">809SH Start Guide</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display:none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>

  <!--{elseif $arrRelativeCat.1.1.category_id == 33}-->
   <!--★商品説明 docomo FS050W 無制限 通常★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">docomo FS050W</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>2.8Gbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>460Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.docomo.ne.jp/area/" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">9 to 11 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">Unlimited Data
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>Precautions for Unlimited Plans<br>
<br>
(Precautions on the docomo official site about unlimited use)<br>
Customers with particularly high data usage over recent three days, including the current day, may experience slower connections compared to other customers. Please note that your connection may be interrupted if there is a large amount of data transmission within a certain period of time or during a single connection.<br>
<br>
Upon verifying the situation of data restriction, we found that there is no data restriction implemented under following circumstances.<br>
-more than 15GB was used every day<br>
-100GB was used for three consecutive days<br>
Please note that telecom carriers may change data restriction policies in the future.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="#" target="_blank">FS050W Start Guide</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display:none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>

  <!--{elseif $arrRelativeCat.0.0.category_id == 38}-->
   <!--★商品説明 物理SIM 通常★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Prepaid SIM</td>
      </tr>
    <tr>
      <td colspan="2">Japan Data SIM 10GB / 180 Days</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Installation Methods</td>
      </tr>
    <tr>
      <td colspan="2">Insert the SIM card into your device.</td>
      </tr>
          <tr>
      <td colspan="2" class="title">Compatible Devices</td>
      </tr>
    <tr>
      <td colspan="2">All SIM-free or carrier-unlocked smartphones.<br>
Please check that your device supports SoftBank bands before purchase.</td>
      </tr>
          <tr>
      <td colspan="2" class="title">Counting of Days</td>
      </tr>
    <tr>
      <td colspan="2">Service days are counted by calendar day (Japan Standard Time).<br>
      The first day ends at midnight (JST).</td>
      </tr>
          <tr>
      <td colspan="2" class="title">Network</td>
      </tr>
    <tr>
      <td colspan="2">SoftBank network</td>
      </tr>
          <tr>
      <td colspan="2" class="title">Connection Speed</td>
      </tr>
    <tr>
      <td colspan="2">4G LTE</td>
      </tr>
          <tr>
      <td colspan="2" class="title">SIM Type</td>
      </tr>
    <tr>
      <td colspan="2">Data only (no voice or SMS)</td>
      </tr>
          <tr>
      <td colspan="2" class="title">SIM Sizes</td>
      </tr>
    <tr>
      <td colspan="2">Multi-cut SIM<br>
      (Compatible for Standard, micro, and nano SIM sizes)</td>
      </tr>
          <tr>
      <td colspan="2" class="title">Hotspot (Tethering)</td>
      </tr>
    <tr>
      <td colspan="2">Available<br>
      (APN Settings may required)</td>
      </tr>
          <tr>
      <td colspan="2" class="title">Nationwide</td>
      </tr>
    <tr>
      <td colspan="2">Available anywhere within the SoftBank service area<br>
* Over 99.9% population coverage</td>
      </tr>
          <tr>
      <td colspan="2" class="title">Supported Bands</td>
      </tr>
    <tr>
      <td colspan="2">4G LTE: Band 1/3/8/41<br>
W-CDMA(3G) 1/8</td>
      </tr>
          <tr>
      <td colspan="2" class="title">Delivery</td>
      </tr>
    <tr>
      <td colspan="2">Your physical SIM card will be shipped immediately after purchase.</td>
      </tr>
          <tr>
      <td colspan="2" class="title">Activation Deadline</td>
      </tr>
    <tr>
      <td colspan="2">Please install and activate your SIM within 30 days of purchase.</td>
      </tr>
          <tr>
      <td colspan="2" class="title">APN</td>
      </tr>
    <tr>
      <td colspan="2">Profile Name: SB<br>
APN: plus.4g<br>
Authentication: CHAP<br>
Username: plus<br>
Password: 4g</td>
      </tr>
          <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="https://www.wifi-rental-store.jp/guide/guide_sim_en.pdf" target="_blank">Prepaid SIM Setup Guide</a></td>
    </tr>
            <tr>
      <td colspan="2" class="title">Guide to Data Usage</td>
    </tr>
    <tr>
      <td colspan="2"><a href="https://en.wifi-rental-store.jp/data.html" target="_blank">Data Usage Tables</a></td>
    </tr>



  </tbody>
</table>
<div class="main_comment" style="display:none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>

  <!--{elseif $arrRelativeCat.0.0.category_id == 35}-->
   <!--★商品説明 eSIM 通常★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">docomo FS050W</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>2.8Gbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>460Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.docomo.ne.jp/area/" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">9 to 11 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">Unlimited Data
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>Precautions for Unlimited Plans<br>
<br>
(Precautions on the docomo official site about unlimited use)<br>
Customers with particularly high data usage over recent three days, including the current day, may experience slower connections compared to other customers. Please note that your connection may be interrupted if there is a large amount of data transmission within a certain period of time or during a single connection.<br>
<br>
Upon verifying the situation of data restriction, we found that there is no data restriction implemented under following circumstances.<br>
-more than 15GB was used every day<br>
-100GB was used for three consecutive days<br>
Please note that telecom carriers may change data restriction policies in the future.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="#" target="_blank">FS050W Start Guide</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display:none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>

  <!--{elseif $arrRelativeCat.1.1.category_id == 24}-->
   <!--★商品説明 601HW 20GB 延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">SoftBank FS030W</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>150Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>50Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=601hw" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">5 to 7 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">20GB / Month
        <p class="attention">Even if you extend your rental period in the middle of the month, you don't get more data.</p>
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>If monthly data usage exceeds 20GB, the data transfer speed can be slow down. <br>
There is no extra charge for exceeding the data plan. <br>
(601HW routers show the data usage on the screen.)<br>
<br>
Data transfer speeds will recover the following calendar month. <br>
However, if you would like faster speeds, please place an order for another device until the end of the month.<br>
<br>
[Data Traffic Guarantee] <br>
Even if you start renting our products in the middle of the month, the routers are guaranteed to have at least 15GB of data left till the end of the month. <br>
You can use up your data plan with short-term rental plan such as 2 Days Rental.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Screen</td>
    </tr>
    <tr>
      <td colspan="2">The data usage is displayed on the screen.</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="https://www.wifi-rental-store.jp/guide/guide_fs030w_en.pdf" target="_blank">FS030W Start Guide</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display:none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>
  <!--{elseif $arrRelativeCat.1.1.category_id == 27}-->
   <!--★商品説明 601HW 50GB 延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">SoftBank 601HW White</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>612Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>37.5Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=601hw" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">4 to 5 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">50GB / Month
        <p class="attention">Even if you extend your rental period in the middle of the month, you don't get more data.</p>
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>If monthly data usage exceeds 50GB, the data transfer speed can be slow down. <br>
There is no extra charge for exceeding the data plan. <br>
(601HW routers show the data usage on the screen.)<br>
<br>
Data transfer speed will recover the following calendar month.
However, if you would like faster speeds, please place an order for another device until the end of the month.<br>
<br>
[Data Traffic Guarantee] <br>
Even if you start renting our products in the middle of the month, the routers are guaranteed to have at least 40GB of data left till the end of the month. <br>
You can use up your data plan with short-term rental plan such as 2 Days Rental.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Screen</td>
    </tr>
    <tr>
      <td colspan="2">LCD touch screen. The data usage is displayed on the screen.</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_601hw_en.pdf" target="_blank">601HW Start Guide</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display:none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>
  <!--{elseif $arrRelativeCat.1.1.category_id == 28}-->
   <!--★商品説明 809SH 延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">SoftBank 809SH</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>774Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>37.5Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=809sh" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">6 to 8 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">100GB / Month
        <!--<p class="attention">The person who start renting in the middle of month receive a router which have 15GB and more left.</p>-->
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>If monthly data usage exceeds 100GB, the data transfer speed can be slow down.<br>
There is no extra charge for exceeding the data plan.<br>
(809SH routers show the data usage on the screen.)<br>
<br>
Data transfer speed will recover the following calendar month. However, if you would like faster speeds, please place an order for another device until the end of the month.<br>
<br>
[Data Traffic Guarantee]<br>
Your monthly data allowance is for the calendar month, so you can use the entire month's data allowance even if your rental starts in the middle of the month, or is short, such as for 2 days.<br>
There is no daily data limit.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Screen</td>
    </tr>
    <tr>
      <td colspan="2">LCD touch screen. The data usage is displayed on the screen.</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_sh809_en.pdf" target="_blank">809SH Start Guide</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display:none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>

  <!--{elseif $arrRelativeCat.1.1.category_id == 34}-->
   <!--★商品説明 docomo FS050W 無制限 延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">docomo FS050W</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>2.8Gbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>460Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.docomo.ne.jp/area/" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">9 to 11 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">Unlimited Data
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>Precautions for Unlimited Plans<br>
<br>
(Precautions on the docomo official site about unlimited use)<br>
Customers with particularly high data usage over recent three days, including the current day, may experience slower connections compared to other customers. Please note that your connection may be interrupted if there is a large amount of data transmission within a certain period of time or during a single connection.<br>
(Our store's verification result, June 2023)<br>
Upon verifying the situation of data restriction, we found that there is no data restriction implemented under following circumstances.<br>
-more than 15GB was used every day<br>
-100GB was used for three consecutive days<br>
Please note that telecom carriers may change data restriction policies in the future.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="#" target="_blank">FS050W Start Guide</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display:none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>

  <!--{elseif $arrRelativeCat.1.1.category_id == 30}-->
  <!--★商品説明 HWD11延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">au KDDI HWD11</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>75Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>25Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.au.com/mobile/area/" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">5 to 6 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">100GB / Month
        <p class="attention">・*If the data is consumed exceeding 10GB/3 days, the data transfer speed can be slow down in the evening.</p>
        <p class="attention">・Even if you extend your rental period in the middle of the month, you don't get more data.</p>
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>If monthly data usage exceeds 100GB, the data transfer can be stopped.<br>
There is no extra charge for exceeding the data plan.<br>
<br>
Data transfer speeds will recover the following calendar month.<br>
However, if you would like the Internet access urgently, please place an order for another device until the end of the month.<br>
<br>
If large amount of data is consumed exceeding 3GB / day, and it happens in a row, the data transfer speed can be slow down between 6PM and 2AM (8 hours).<br>
<br>
[Data Traffic Guarantee]<br>
Even if you start renting our products in the middle of the month,<br>
the routers are guaranteed to have at least 60GB of data left till the end of the month.<br>
You can use up your data plan with short-term rental plan such as 2 Days Rental.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Screen</td>
    </tr>
    <tr>
      <td colspan="2">LCD Screen</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_hwd11_en.pdf" target="_blank">HWD11 Start Guide</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display:none"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>
    <!--{elseif $arrRelativeCat.1.1.category_id == 29}-->
  <!--★商品説明 SoftBank延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Model</td>
      </tr>
    <tr>
      <td colspan="2">SoftBank 303ZT</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Download Speed:</td>
      <td>187.5Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Max. Upload Speed:</td>
      <td>37.5Mbps 　* Theoretical Value</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Service Area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=303zt" target="_blank">Service Area Map</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Battery Life</td>
      </tr>
    <tr>
      <td colspan="2">4 to 5 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Data Plan</td>
      </tr>
    <tr>
      <td colspan="2">Large capacity (30GB／month）
        <p class="attention">Even if you extend your rental period in the middle of the month, you don't get more data.</p>
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>If monthly data usage exceeds 30GB, the data transfer speed can be slow down.<br>
There is no extra charge for exceeding the data plan.<br>
(303ZT routers show the data usage on the screen.)<br>
<br>
Data transfer speeds will recover the following calendar month.<br>
However, if you would like faster speeds, please place an order for another device until the end of the month.<br>
<br>
[Data Traffic Guarantee]<br>
Even if you start renting our products in the middle of the month,<br>
the routers are guaranteed to have at least 20GB of data left till the end of the month.<br>
You can use up your data plan with short-term rental plan such as 2 Days Rental.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
    <tr>
      <td colspan="2" class="title">Screen</td>
    </tr>
    <tr>
      <td colspan="2">LCD touch screen. The data usage is displayed on the screen.</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_303zt_en.pdf" target="_blank">Start Guide / 303ZT</a></td>
    </tr>
  </tbody>
</table>
<div class="main_comment" style="display: none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>
   </div>
  <!--上記商品以外の場合-->
  <!--{else}-->
<div class="detail_text001">
       <div class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></div>
</div>
  <!--{/if}-->
<!--{/if}-->
<script type="text/javascript">
$(function() {
$('.sub_ac_menu').hide();
$('.main_ac_menu').click(function() {
$('ul.sub_ac_menu').slideUp();
if ($('+ul.sub_ac_menu', this).css('display') == 'none') {
$('+ul.sub_ac_menu', this).slideDown();
}
});
});
</script>

    <!--★ポイント★-->
    <!--{if $smarty.const.USE_POINT !== false}-->
        <div class="point">ポイント：
            <span id="point_default"><!--{strip}-->
                <!--{if $arrProduct.price02_min == $arrProduct.price02_max}-->
                    <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate|number_format}-->
                <!--{else}-->
                    <!--{if $arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate == $arrProduct.price02_max|sfPrePoint:$arrProduct.point_rate}-->
                        <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate|number_format}-->
                    <!--{else}-->
                        <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate|number_format}-->～<!--{$arrProduct.price02_max|sfPrePoint:$arrProduct.point_rate|number_format}-->
                    <!--{/if}-->
                <!--{/if}-->
            <!--{/strip}--></span><span id="point_dynamic"></span>
            Pt
        </div>
    <!--{/if}-->
</div>

</section>



            <div id="detailrightbloc" class="cartin_block">

<!--{if count($arrRelativeCat) > 0}-->
<!--{if $arrRelativeCat.0.0.category_id == 38}-->
<!--★注意事項エリア　物理SIM-->
 <div class="attention_box">
	 <p class="name">* Before You Purchase</p>
	 <p class="check">Please confirm your smartphone is SIM-free or carrier-unlocked.</p>
	 <p class="check">This is a physical SIM card (shipped by mail or courier).</p>
	 <p class="check">This is a data-only SIM card. Voice calls and SMS are not available.</p>
	 <p class="check">This item is designed for smartphones. Other devices (PC, etc) may not support this SIM.</p>
	 <p class="check">Activation deadline: You must activate your SIM within 30 days of purchase.</p>
	</div>
<!--{elseif $arrRelativeCat.0.0.category_id == 35}-->
<!--★注意事項エリア　eSIM-->
 <div class="attention_box">
	 <p class="name">* Before You Purchase</p>
	 <p class="check">our device must be SIM-free or SIM-unlocked.</p>
		<p class="check">ctivation deadline: <br>Please start using your eSIM within 30 days of purchase.</p>
	</div>
<!--{/if}-->
<!--{/if}-->

                <!--▼商品ステータス-->
                <!--{assign var=ps value=$productStatus[$tpl_product_id]}-->
                <!--{if count($ps) > 0}-->
                    <ul class="status_icon clearfix">
                        <!--{foreach from=$ps item=status}-->
                        <li>
                            <img src="<!--{$TPL_URLPATH}--><!--{$arrSTATUS_IMAGE[$status]}-->" width="60" height="17" alt="<!--{$arrSTATUS[$status]}-->" id="icon<!--{$status}-->" />
                        </li>
                        <!--{/foreach}-->
                    </ul>
                <!--{/if}-->
                <!--▲商品ステータス-->

<!--{if false}-->
                <!--★通常価格★-->
                <!--{if $arrProduct.price01_min_inctax > 0}-->
                    <dl class="normal_price">
                        <dt><!--{$smarty.const.NORMAL_PRICE_TITLE}-->(税込)：</dt>
                        <dd class="price">
                            <span id="price01_default"><!--{strip}-->
                                <!--{if $arrProduct.price01_min_inctax == $arrProduct.price01_max_inctax}-->
                                    <!--{$arrProduct.price01_min_inctax|number_format}-->
                                <!--{else}-->
                                    <!--{$arrProduct.price01_min_inctax|number_format}-->～<!--{$arrProduct.price01_max_inctax|number_format}-->
                                <!--{/if}-->
                            <!--{/strip}--></span><span id="price01_dynamic"></span>
                            円
                        </dd>
                    </dl>
                <!--{/if}-->
<!--{/if}-->

                <!--★販売価格★-->
                <dl class="sale_price">

                    <dt style="display:none;"><!--{$smarty.const.SALE_PRICE_TITLE}-->(税込)：</dt>
                    <dt style="display:none;"><!--{$smarty.const.SALE_PRICE_TITLE}-->(税込)：</dt>
  <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.0.0.category_id == 13}-->
                    <dd class="price">Price：
                        <span id="price02_default"><!--{strip}-->
                            <!--{if $arrProduct.price02_min_inctax == $arrProduct.price02_max_inctax}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->
                            <!--{else}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->～<!--{$arrProduct.price02_max_inctax|number_format}-->
                            <!--{/if}-->
                        <!--{/strip}--></span><span id="price02_dynamic"></span>
                        JPY
                    </dd>
<!--{elseif $arrRelativeCat.0.0.category_id == 38}-->
                    <div class="price_box">
																				 <p class="name"><span class="l_bold">PRICE：</span>
																					   <!--{strip}-->
                            <!--{if $arrProduct.price02_min_inctax == $arrProduct.price02_max_inctax}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->
                            <!--{else}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->～<!--{$arrProduct.price02_max_inctax|number_format}-->
                            <!--{/if}-->
                        <!--{/strip}-->
																								<span class="jpy">JPY</span>
																					</p>
                    </div>
		<!--{elseif $arrRelativeCat.0.0.category_id == 35}-->
                    <div class="price_box">
																				 <p class="name"><span class="l_bold">PRICE：</span>
																					   <!--{strip}-->
                            <!--{if $arrProduct.price02_min_inctax == $arrProduct.price02_max_inctax}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->
                            <!--{else}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->～<!--{$arrProduct.price02_max_inctax|number_format}-->
                            <!--{/if}-->
                        <!--{/strip}-->
																								<span class="jpy">JPY</span>
																					</p>
                    </div>
  <!--{else}-->
                    <dd class="price" style="display: none;">
                        <span id="price02_default"><!--{strip}-->
                            <!--{if $arrProduct.price02_min_inctax == $arrProduct.price02_max_inctax}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->
                            <!--{else}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->～<!--{$arrProduct.price02_max_inctax|number_format}-->
                            <!--{/if}-->
                        <!--{/strip}--></span><span id="price02_dynamic"></span>
                        JPY
                    </dd>
  <!--{/if}-->
 <!--{/if}-->
<div class="rental_fee_box">
<!--{if count($arrRelativeCat) > 0}-->
<!--{if $arrRelativeCat.1.1.category_id == 22}-->
<!--★価格 SK 20GB 通常★-->
<dt>Rental fee</dt>
<dd class="price">
<p class="fee_day">390 JPY/Day</p><p class="fee_month">5,850 JPY/Month</p>
   <div class="btn_more main_ac_btn">Price list</div>
    <ul class="price_list_box sub_ac_box">
      <div class="s_wrap"><p class="plan">2Days</p><p class="fee">780 Yen</p></div>
      <div class="s_wrap"><p class="plan">3Days</p><p class="fee">1,170 Yen</p></div>
      <div class="s_wrap"><p class="plan">4Days</p><p class="fee">1,560 Yen</p></div>
      <div class="s_wrap"><p class="plan">5Days</p><p class="fee">1,950 Yen</p></div>
      <div class="s_wrap"><p class="plan">6Days</p><p class="fee">2,340 Yen</p></div>
      <div class="s_wrap"><p class="plan">7Days</p><p class="fee">2,730 Yen</p></div>
      <div class="s_wrap"><p class="plan">8Days</p><p class="fee">3,120 Yen</p></div>
      <div class="s_wrap"><p class="plan">9Days</p><p class="fee">3,510 Yen</p></div>
      <div class="s_wrap"><p class="plan">10Days</p><p class="fee">3,900 Yen</p></div>
      <div class="s_wrap"><p class="plan">11Days</p><p class="fee">4,290 Yen</p></div>
      <div class="s_wrap"><p class="plan">12Days</p><p class="fee">4,680 Yen</p></div>
      <div class="s_wrap"><p class="plan">13Days</p><p class="fee">5,070 Yen</p></div>
      <div class="s_wrap"><p class="plan">14Days</p><p class="fee">5,460 Yen</p></div>
      <div class="s_wrap"><p class="plan">1Month</p><p class="fee">5,850 Yen</p></div>
      <div class="s_wrap"><p class="plan">2Months</p><p class="fee">10,400 Yen</p></div>
      <div class="s_wrap"><p class="plan">3Months</p><p class="fee">14,600 Yen</p></div>
      <div class="s_wrap"><p class="plan">4Months</p><p class="fee">18,800 Yen</p></div>
      <div class="s_wrap"><p class="plan">5Months</p><p class="fee">20,800 Yen</p></div>
      <div class="s_wrap"><p class="plan">6Months</p><p class="fee">22,800 Yen</p></div>
    </ul>
</dd>
<!--{elseif $arrRelativeCat.1.1.category_id == 25}-->
<!--★価格 SL 50GB 通常★-->
<dt>Rental fee</dt>
<dd class="price">
<p class="fee_day">490 JPY/Day</p><p class="fee_month">7,350 JPY/Month</p>
   <div class="btn_more main_ac_btn">Price list</div>
    <ul class="price_list_box sub_ac_box">
      <div class="s_wrap"><p class="plan">2Days</p><p class="fee">980 Yen</p></div>
      <div class="s_wrap"><p class="plan">3Days</p><p class="fee">1,470 Yen</p></div>
      <div class="s_wrap"><p class="plan">4Days</p><p class="fee">1,960 Yen</p></div>
      <div class="s_wrap"><p class="plan">5Days</p><p class="fee">2,450 Yen</p></div>
      <div class="s_wrap"><p class="plan">6Days</p><p class="fee">2,940 Yen</p></div>
      <div class="s_wrap"><p class="plan">7Days</p><p class="fee">3,430 Yen</p></div>
      <div class="s_wrap"><p class="plan">8Days</p><p class="fee">3,920 Yen</p></div>
      <div class="s_wrap"><p class="plan">9Days</p><p class="fee">4,410 Yen</p></div>
      <div class="s_wrap"><p class="plan">10Days</p><p class="fee">4,900 Yen</p></div>
      <div class="s_wrap"><p class="plan">11Days</p><p class="fee">5,390 Yen</p></div>
      <div class="s_wrap"><p class="plan">12Days</p><p class="fee">5,880 Yen</p></div>
      <div class="s_wrap"><p class="plan">13Days</p><p class="fee">6,370 Yen</p></div>
      <div class="s_wrap"><p class="plan">14Days</p><p class="fee">6,860 Yen</p></div>
      <div class="s_wrap"><p class="plan">1Month</p><p class="fee">7,350 Yen</p></div>
      <div class="s_wrap"><p class="plan">2Months</p><p class="fee">13,050 Yen</p></div>
      <div class="s_wrap"><p class="plan">3Months</p><p class="fee">18,300 Yen</p></div>
      <div class="s_wrap"><p class="plan">4Months</p><p class="fee">23,000 Yen</p></div>
      <div class="s_wrap"><p class="plan">5Months</p><p class="fee">25,500 Yen</p></div>
      <div class="s_wrap"><p class="plan">6Months</p><p class="fee">28,000 Yen</p></div>
    </ul>
</dd>
<!--{elseif $arrRelativeCat.1.1.category_id == 26}-->
<!--★価格 809SH 100GB 通常★-->
<dt>Rental fee</dt>
<dd class="price">
<p class="fee_day">590 JPY/Day</p><p class="fee_month">8,850 JPY/Month</p>
   <div class="btn_more main_ac_btn">Price list</div>
    <ul class="price_list_box sub_ac_box">
      <div class="s_wrap"><p class="plan">2Days</p><p class="fee">1,180 Yen</p></div>
      <div class="s_wrap"><p class="plan">3Days</p><p class="fee">1,770 Yen</p></div>
      <div class="s_wrap"><p class="plan">4Days</p><p class="fee">2,360 Yen</p></div>
      <div class="s_wrap"><p class="plan">5Days</p><p class="fee">2,950 Yen</p></div>
      <div class="s_wrap"><p class="plan">6Days</p><p class="fee">3,540 Yen</p></div>
      <div class="s_wrap"><p class="plan">7Days</p><p class="fee">4,130 Yen</p></div>
      <div class="s_wrap"><p class="plan">8Days</p><p class="fee">4,720 Yen</p></div>
      <div class="s_wrap"><p class="plan">9Days</p><p class="fee">5,310 Yen</p></div>
      <div class="s_wrap"><p class="plan">10Days</p><p class="fee">5,900 Yen</p></div>
      <div class="s_wrap"><p class="plan">11Days</p><p class="fee">6,490 Yen</p></div>
      <div class="s_wrap"><p class="plan">12Days</p><p class="fee">7,080 Yen</p></div>
      <div class="s_wrap"><p class="plan">13Days</p><p class="fee">7,670 Yen</p></div>
      <div class="s_wrap"><p class="plan">14Days</p><p class="fee">8,260 Yen</p></div>
      <div class="s_wrap"><p class="plan">1Month</p><p class="fee">8,850 Yen</p></div>
      <div class="s_wrap"><p class="plan">2Months</p><p class="fee">15,700 Yen</p></div>
      <div class="s_wrap"><p class="plan">3Months</p><p class="fee">22,000 Yen</p></div>
      <div class="s_wrap"><p class="plan">4Months</p><p class="fee">27,600 Yen</p></div>
      <div class="s_wrap"><p class="plan">5Months</p><p class="fee">30,600 Yen</p></div>
      <div class="s_wrap"><p class="plan">6Months</p><p class="fee">33,600 Yen</p></div>
    </ul>
</dd>
<!--{elseif $arrRelativeCat.1.1.category_id == 33}-->
<!--★価格 FS050W 無制限 通常★-->
<dt>Rental fee</dt>
<dd class="price">
<p class="fee_day">990 JPY/Day</p><p class="fee_month">14,850 JPY/Month</p>
   <div class="btn_more main_ac_btn">Price list</div>
    <ul class="price_list_box sub_ac_box">
      <div class="s_wrap"><p class="plan">2Days</p><p class="fee">1,980 Yen</p></div>
      <div class="s_wrap"><p class="plan">3Days</p><p class="fee">2,970 Yen</p></div>
      <div class="s_wrap"><p class="plan">4Days</p><p class="fee">3,960 Yen</p></div>
      <div class="s_wrap"><p class="plan">5Days</p><p class="fee">4,950 Yen</p></div>
      <div class="s_wrap"><p class="plan">6Days</p><p class="fee">5,940 Yen</p></div>
      <div class="s_wrap"><p class="plan">7Days</p><p class="fee">6,930 Yen</p></div>
      <div class="s_wrap"><p class="plan">8Days</p><p class="fee">7,920 Yen</p></div>
      <div class="s_wrap"><p class="plan">9Days</p><p class="fee">8,910 Yen</p></div>
      <div class="s_wrap"><p class="plan">10Days</p><p class="fee">9,900 Yen</p></div>
      <div class="s_wrap"><p class="plan">11Days</p><p class="fee">10,890 Yen</p></div>
      <div class="s_wrap"><p class="plan">12Days</p><p class="fee">11,880 Yen</p></div>
      <div class="s_wrap"><p class="plan">13Days</p><p class="fee">12,870 Yen</p></div>
      <div class="s_wrap"><p class="plan">14Days</p><p class="fee">13,860 Yen</p></div>
      <div class="s_wrap"><p class="plan">1Month</p><p class="fee">14,850 Yen</p></div>
      <div class="s_wrap"><p class="plan">2Months</p><p class="fee">26,600 Yen</p></div>
      <div class="s_wrap"><p class="plan">3Months</p><p class="fee">37,200 Yen</p></div>
      <div class="s_wrap"><p class="plan">4Months</p><p class="fee">46,700 Yen</p></div>
      <div class="s_wrap"><p class="plan">5Months</p><p class="fee">56,100 Yen</p></div>
      <div class="s_wrap"><p class="plan">6Months</p><p class="fee">64,400 Yen</p></div>
    </ul>
</dd>
<!--{elseif $arrRelativeCat.1.1.category_id == 24}-->
<!--★価格 SK 20GB 延長★-->
<dt>Rental fee</dt>
<dd class="price">
<p class="fee_day">390 JPY/Day</p><p class="fee_month">5,850 JPY/Month</p>
</dd>
<!--{elseif $arrRelativeCat.1.1.category_id == 27}-->
<!--★価格 SL 50GB 延長★-->
<dt>Rental fee</dt>
<dd class="price">
<p class="fee_day">490 JPY/Day</p><p class="fee_month">7,350 JPY/Month</p>
</dd>
<!--{elseif $arrRelativeCat.1.1.category_id == 28}-->
<!--★価格 809SH 100GB 延長★-->
<dt>Rental fee</dt>
<dd class="price">
<p class="fee_day">590 JPY/Day</p><p class="fee_month">8,850 JPY/Month</p>
</dd>
<!--{elseif $arrRelativeCat.1.1.category_id == 34}-->
<!--★価格 FS050W 無制限 延長★-->
<dt>Rental fee</dt>
<dd class="price">
<p class="fee_day">990 JPY/Day</p><p class="fee_month">14,850 JPY/Month</p>
</dd>
<!--{elseif $arrRelativeCat.1.1.category_id == 30}-->
<!--★価格 HWD11 延長★-->
<dt>Rental fee</dt>
<dd class="price">
<p class="fee_day">650 JPY/Day</p><p class="fee_month">9,750 JPY/Month</p>
</dd>
<style>
 .plan_s_box{
	 display: none;
	}
</style>
<!--{elseif $arrRelativeCat.1.1.category_id == 29}-->
<!--★価格 303ZT 延長★-->
<dt>Rental fee</dt>
<dd class="price">
<p class="fee_day">550 JPY/Day</p><p class="fee_month">8,250 JPY/Month</p>
</dd>
<!--{else}-->
<style>
.rental_fee_box{
  display: none;
 }
</style>
<!--{/if}-->
<!--{/if}-->
</div>

                </dl>

                <!--★ポイント★-->
                <!--{if $smarty.const.USE_POINT !== false}-->
                    <div class="point">ポイント：
                        <span id="point_default"><!--{strip}-->
                            <!--{if $arrProduct.price02_min == $arrProduct.price02_max}-->
                                <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate|number_format}-->
                            <!--{else}-->
                                <!--{if $arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate == $arrProduct.price02_max|sfPrePoint:$arrProduct.point_rate}-->
                                    <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate|number_format}-->
                                <!--{else}-->
                                    <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate|number_format}-->～<!--{$arrProduct.price02_max|sfPrePoint:$arrProduct.point_rate|number_format}-->
                                <!--{/if}-->
                            <!--{/if}-->
                        <!--{/strip}--></span><span id="point_dynamic"></span>
                        Pt
                    </div>
                <!--{/if}-->

<!--{if false}-->
                <!--{* ▼メーカー(通常/延長 判定フラグ) *}-->
                <!--{if $arrProduct.maker_name|strlen >= 1}-->
                    <dl class="maker">
                        <dt>メーカー：</dt>
                        <dd><!--{$arrProduct.maker_name|h}--></dd>
                    </dl>
                <!--{/if}-->
                <!--{* ▲メーカー *}-->

                <!--▼メーカーURL-->
                <!--{if $arrProduct.comment1|strlen >= 1}-->
                    <dl class="comment1">
                        <dt>メーカーURL：</dt>
                        <dd><a href="<!--{$arrProduct.comment1|h}-->"><!--{$arrProduct.comment1|h}--></a></dd>
                    </dl>
                <!--{/if}-->
                <!--▼メーカーURL-->
<!--{/if}-->

                <!--★関連カテゴリ★-->
                <dl class="relative_cat">
                    <dt>関連カテゴリ：</dt>
                    <!--{section name=r loop=$arrRelativeCat}-->
                        <dd>
                            <!--{section name=s loop=$arrRelativeCat[r]}-->
                                <a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$arrRelativeCat[r][s].category_id}-->"><!--{$arrRelativeCat[r][s].category_name|h}--></a>
                                <!--{if !$smarty.section.s.last}--><!--{$smarty.const.SEPA_CATNAVI}--><!--{/if}-->
                            <!--{/section}-->
                        </dd>
                    <!--{/section}-->
                </dl>


                <!--★詳細メインコメント★-->
                <div class="main_comment" style="display: none;"><!--{$arrProduct.main_comment|nl2br_html}--></div>


                <!--▼買い物かご-->

  <div class="selected_plan" style="display: none;">
  選択プラン
   <p id="selected"></p>
  </div>
                <div class="cart_area clearfix">
                    <input type="hidden" name="mode" value="cart" />
                    <input type="hidden" name="product_id" value="<!--{$tpl_product_id}-->" />
                    <input type="hidden" name="product_class_id" value="<!--{$tpl_product_class_id}-->" id="product_class_id" />
                    <input type="hidden" name="favorite_product_id" value="" />

                    <!--{if $tpl_stock_find}-->
                        <!--{if $tpl_classcat_find1}-->
                            <div class="classlist">
                                <!--▼規格1-->
                                <ul class="clearfix">
                                    <li><!--{$tpl_class_name1|h}-->：</li>
                                    <li>
                                        <select id="classcategory_id1" name="classcategory_id1" style="<!--{$arrErr.classcategory_id1|sfGetErrorColor}-->">
                                        <!--{html_options options=$arrClassCat1 selected=$arrForm.classcategory_id1.value}-->
                                        </select>
                                        <!--{if $arrErr.classcategory_id1 != ""}-->
                                        <br /><span class="attention">※ <!--{$tpl_class_name1}-->を入力して下さい。</span>
                                        <!--{/if}-->
                                    </li>
                                </ul>
                                <!--▲規格1-->
                                <!--{if $tpl_classcat_find2}-->
                                <!--▼規格2-->
                                <ul class="clearfix">
                                    <li><!--{$tpl_class_name2|h}-->：</li>
                                    <li>
                                        <select id="classcategory_id2" name="classcategory_id2" style="<!--{$arrErr.classcategory_id2|sfGetErrorColor}-->">
                                        </select>
                                        <!--{if $arrErr.classcategory_id2 != ""}-->
                                        <br /><span class="attention">※ <!--{$tpl_class_name2}-->を入力して下さい。</span>
                                        <!--{/if}-->
                                    </li>
                                </ul>
                                <!--▲規格2-->
                                <!--{/if}-->
                            </div>
                        <!--{/if}-->

                        <!--★数量★-->
                        <dl class="quantity">
                            <dt>Quantity:</dt>
                            <dd><input type="text" class="box60" name="quantity" value="<!--{$arrForm.quantity.value|default:1|h}-->" maxlength="<!--{$smarty.const.INT_LEN}-->" style="<!--{$arrErr.quantity|sfGetErrorColor}-->" />
                                <!--{if $arrErr.quantity != ""}-->
                                    <br /><span class="attention"><!--{$arrErr.quantity}--></span>
                                <!--{/if}-->
                            </dd>
                        </dl>

                        <div class="cartin">
                            <div class="cartin_btn">
                                <div id="cartbtn_default">
                                    <!--★カゴに入れる★-->
                                    <a href="javascript:void(document.form1.submit())">
                                     <p class="btn_add_to_cart">Add to cart</p>
                                        <img style="display: none;" class="hover_change_image" src="<!--{$TPL_URLPATH}-->img/button/btn_cartin.jpg" alt="カゴに入れる" />
                                    </a>
<style>
.rental_fee_box {
    margin: 0 auto;
    padding: 20px;
    background-color: #f4f4f4;
    margin-top: -23px;
}
.rental_fee_box dt {
    margin: 0 auto;
    text-align: center;
    font-size: 18px;
    color: #525252;
    display: block !important;
}
.rental_fee_box .price {
    margin: 0 auto;
    display: block !important;
    margin-top: 15px;
    background-color: #fff;
    padding: 3%;
    padding-bottom: 25px;
    text-align: center;
}
.rental_fee_box .price .fee_day {
    margin: 0 auto;
    display: inline-block;
    margin-right: 20px;
    font-size: 20px;
    font-weight: bold;
    color: #5e5a5a;
}
 .rental_fee_box .price .fee_month{
  margin: 0 auto;
  display: inline-block;
  color: #5e5a5a;
  font-size: 15px;
  font-weight: bold;
 }
.btn_more.main_ac_btn {
    max-width: 345px;
    width: 90%;
    background-color: #ffffff;
    margin: 0 auto;
    color: #000;
    font-weight: bold;
    text-align: center;
    padding: 10px;
    font-size: 16px;
    border: 2px solid;
    border-radius: 6px;
    box-shadow: 2px 2px 2px 0px #636363;
    margin-top: 10px;
    position: relative;
}
.btn_more.main_ac_btn:before {
    background-image: url(/img/common/icon_vew_more.png);
    position: absolute;
    content: "";
    background-position: center;
    background-repeat: no-repeat;
    background-size: 22px;
    width: 26px;
    height: 26px;
    left: 10px;
}
.btn_more.main_ac_btn:after {
    background-image: url(/shop/img/common/btn_navi_bk.png);
    position: absolute;
    content: "";
    background-position: center;
    background-repeat: no-repeat;
    background-size: 20px;
    width: 26px;
    height: 26px;
    right: 3px;
    bottom: 3px;
}
.rental_fee_box .price_list_box {
    margin: 0 auto;
    max-width: 330px;
    margin-top: 20px;
}
.rental_fee_box .s_wrap {
    margin: 0 auto;
    border-bottom: 1px dotted #999;
    padding-top: 5px;
    padding-bottom: 5px;
}
.rental_fee_box .plan {
    font-size: 14px;
    line-height: 1.5;
    color: #515151;
    display: inline-block;
    margin: 0;
    margin-right: 15px;
    width: 85px;
    padding-left: 13px;
}
.rental_fee_box .fee {
    font-size: 15px;
    color: #515151;
    line-height: 1.5;
    font-weight: bold;
    margin: 0;
    display: inline-block;
    vertical-align: top;
}
#cartbtn_default a {
    width: 90%;
    margin: 0 auto;
    display: block;
    text-decoration: none;
}
.btn_add_to_cart {
    margin: 0 auto;
    color: #fff;
    background-color: #de2222;
    padding: 15px;
    font-size: 17px;
    font-weight: bold;
    width: 100%;
    border-radius: 4px;
    border: 2px solid #fff;
    box-shadow: 2px 2px 2px 0px #a0a0a0;
}
.btn_add_to_cart:hover {
 opacity: 0.6;
 transition: 0.4s;
}
.select_product_box {
    border: 1px solid #e8a3a3;
    background-color: #fff3f3;
    padding-bottom: 7px;
    padding-top: 30px;
}
.select_product_box .name {
    margin: 0 auto;
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    color: #da0003;
    margin-bottom: 12px;
}
.select_product_box .wrap {
    margin: 0 auto;
    /* background-color: #fff; */
    width: 90%;
    padding-bottom: 2px;
    padding-top: 0px;
    margin-top: 0px;
}
.select_product_box .s_box {
    margin: 0 auto;
    margin-bottom: 30px;
}
.select_product_box .s_box .comment {
    margin: 0 auto;
    width: 90%;
    font-size: 17px;
    color: #000;
    font-weight: bold;
}
.select_product_box .s_box .comment:before {
    content: "▼";
    padding-right: 7px;
}
.btn_select_product {
    margin: 0 auto;
    width: 90%;
    border: 3px solid #ffffff;
    font-size: 20px;
    border-radius: 9px;
    box-shadow: 2px 2px 2px 0px #777;
    position: relative;
    cursor: pointer;
    margin-top: 6px;
    margin-bottom: 0px;
    overflow: hidden;
}
.btn_select_product:after {
    position: absolute;
    content: "";
    right: 5px;
    bottom: 5px;
    width: 25px;
    height: 25px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 22px;
    background-image: url(/shop/img/common/btn_navi_wh.png);
}
.btn_select_product:hover {
 opacity: 0.6;
 transition: 0.4s;
 border: 10px solid #ff1460;
 padding: 4px;
}
.border_on {
    border: 10px solid #ff1460;
    padding: 4px;
}
</style>
                                </div>
                            </div>
                        </div>
                        <div class="attention" id="cartbtn_dynamic"></div>
                    <!--{else}-->
                        <div class="attention">申し訳ございませんが、只今品切れ中です。</div>
                    <!--{/if}-->

                    <!--★お気に入り登録★-->
                    <!--{if $smarty.const.OPTION_FAVORITE_PRODUCT == 1 && $tpl_login === true}-->
                        <div class="favorite_btn">
                            <!--{assign var=add_favorite value="add_favorite`$product_id`"}-->
                            <!--{if $arrErr[$add_favorite]}-->
                                <div class="attention"><!--{$arrErr[$add_favorite]}--></div>
                            <!--{/if}-->
                            <!--{if !$is_favorite}-->
                                <a href="javascript:eccube.changeAction('?product_id=<!--{$arrProduct.product_id|h}-->'); eccube.setModeAndSubmit('add_favorite','favorite_product_id','<!--{$arrProduct.product_id|h}-->');"><img class="hover_change_image" src="<!--{$TPL_URLPATH}-->img/button/btn_add_favorite.jpg" alt="お気に入りに追加" /></a>
                            <!--{else}-->
                                <img src="<!--{$TPL_URLPATH}-->img/button/btn_add_favorite_on.jpg" alt="お気に入り登録済" name="add_favorite_product" id="add_favorite_product" />
                                <script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/jquery.tipsy.js"></script>
                                <script type="text/javascript">
                                    var favoriteButton = $("#add_favorite_product");
                                    favoriteButton.tipsy({gravity: $.fn.tipsy.autoNS, fallback: "お気に入りに登録済み", fade: true });

                                    <!--{if $just_added_favorite == true}-->
                                    favoriteButton.load(function(){$(this).tipsy("show")});
                                    $(function(){
                                        var tid = setTimeout('favoriteButton.tipsy("hide")',5000);
                                    });
                                    <!--{/if}-->
                                </script>
                            <!--{/if}-->
                        </div>
                    <!--{/if}-->
                </div>

<!-- rental-store 2019 -->
<div>
  <div class="no_disp">
  <input type="text" id="cache_start_date" name="cache_start_date" value="">
  <input type="text" id="cache_end_date" name="cache_end_date" value="">
  <input type="text" id="cache_rental_term" name="cache_rental_term" value="">
  <input type="text" id="cache_receive_flg" name="cache_receive_flg" value="">
  </div>

 <div class="select_product_box">
 <p class="name">ORDER</p>
 <div class="wrap">
  <div class="s_box">
  <!--<p class="comment">Order by calender</p>-->
  <p class="btn_select_product" id="btn_rental_perid"><img src="/shop/img/detail/btn_rental_period.png" width="100%" alt=""/></p>
  </div>
  <div class="s_box plan_s_box">
  <p class="comment">Order from the rental plan list</p>
  <p class="btn_select_product" id="btn_rental_plan"><img src="/shop/img/detail/btn_rental_plan.png" width="100%" alt=""/></p>
  </div>
 </div>
 </div>

</div>
<script>
  $('#btn_rental_perid').click(function() {
    $('.value_pack_select').addClass('no_disp');
    $('#btn_rental_plan').removeClass('border_on');
    $('#btn_rental_perid').addClass('border_on');
  })
  $('#btn_rental_plan').click(function() {
    $('.value_pack_select').removeClass('no_disp');
    $('#btn_rental_perid').removeClass('border_on');
    $('#btn_rental_plan').addClass('border_on');
  })
</script>

<script>
$(function(){
  var rental_flg = 0;
  var nobat_flg = 0;
  var extension_flg = 0;
  var bsim_flg = 0;
  var classcategory_depth = 0;

  //通常レンタル時のみの挙動を追加するなら以下
  <!--{if $arrRelativeCat.0.0.category_id == $smarty.const.RENTAL_PRODUCT_CATEGORY}-->
  //console.log('rental');
  rental_flg = 1;
  $('.extension_option').addClass('no_disp');
  //延長レンタル時のみの挙動を追加するなら以下
  <!--{elseif $arrRelativeCat.0.0.category_id == $smarty.const.EXTENSION_PRODUCT_CATEGORY}-->
  //console.log('extension');
  extension_flg = 1;
  $('.rental_option').addClass('no_disp');
  $('.extension_attention').append('Please select the next date of an expiration date for your rental.<br>*You can check the expiration date by a contract document.');
  //物理SIMのみの挙動を追加するなら以下
  <!--{elseif $arrRelativeCat.0.0.category_id == $smarty.const.B_SIM_CATEGORY}-->
  bsim_flg = 1;

  <!--{else}-->
  //console.log('other');
  <!--{/if}-->

  //バッテリーなし商品のみの挙動を追加するなら以下
  <!--{foreach from=$arrRelativeCat item=key}-->
    <!--{if $key.0.category_id == NO_BAT_CATEGORY}-->
    nobat_flg = 1;
    <!--{/if}-->
  <!--{/foreach}-->

  if(nobat_flg == 1) {
    //バッテリーオプションを非表示化
    $('#nobat').addClass('no_disp');
  }

  <!--{if $tpl_stock_find}-->
    <!--{if $tpl_classcat_find1}-->
  classcategory_depth = 1;
      <!--{if $tpl_classcat_find2}-->
  classcategory_depth = 2;
      <!--{/if}-->
    <!--{/if}-->
  <!--{/if}-->
  //console.log(classcategory_depth);

  //不要な箇所を表示しない
  $('#detailrightbloc .cart_area').addClass('no_disp');
  if(classcategory_depth == 0) {
    $('.select_product_box').addClass('no_disp');
    $('#detailrightbloc .cart_area').removeClass('no_disp');
  }

  //ページ表示時にまず実行
  var obj = getRentalDate();
//console.log(obj);

	$.datepicker.setDefaults($.datepicker.regional[ "en" ]);
	var dateFormat   = 'yy/mm/dd';
	var disableDates = [
/*  レンタル不可日機能を追加
  {% if Product.cannot_reserve %}
    {{ include(template_from_string(Product.cannot_reserve)) }}
  {% endif %}
  {% if Product.out_of_stock %}
    {{ include(template_from_string(Product.out_of_stock)) }}
  {% endif %}
*/
	];

  function setStartDateBy1719flg(receive_flg) {
    var today_date = new Date();
    var fast_date_str = obj.fast_date;
    var fast_date = new Date(fast_date_str);
//最小の注文泊数 +数値を編集
    var diffDate = Math.ceil((fast_date - today_date) / 86400000) + 1;

    //時差調整
		start_minDate = start_minDate + diffDate;
		end_minDate = end_minDate + diffDate;


  	if(receive_flg == 0) {
      //19時スキップ
    	if(obj.flg19 == 1) {
    	} else {
        //17時スキップ
      	if(obj.flg17 == 1) {
      		start_minDate = start_minDate - 1;
      		end_minDate = end_minDate - 1;
      	}
      }
    }

    //宅配便で受け取る(本州, 四国)
  	if(receive_flg == 1) {
  		start_minDate = start_minDate + 1;
  		end_minDate = end_minDate + 1;
  	}
    //宅配便で受け取る(離島)
  	if(receive_flg == 2) {
  		start_minDate = start_minDate + 2;
  		end_minDate = end_minDate + 2;
  	}
    //空港で受け取る(羽田)
  	if(receive_flg == 3) {
  		start_minDate = start_minDate + 2;
  		end_minDate = end_minDate + 2;
  	}
    //空港で受け取る(成田,関空,名古屋)
  	if(receive_flg == 4) {
  		start_minDate = start_minDate + 2;
  		end_minDate = end_minDate + 2;
  	}
    //空港で受け取る(新千歳, 福岡)
  	if(receive_flg == 5) {
  		start_minDate = start_minDate + 3;
  		end_minDate = end_minDate + 3;
  	}


    $('#rental_start_date').datepicker('option', 'minDate', start_minDate);
    $('#rental_end_date').datepicker('option', 'minDate', end_minDate);
  }
  if(rental_flg == 1) {
  	if(obj.receive_flg) {
      setStartDateBy1719flg(obj.receive_flg);
  	} else {
      $('#slide0').removeClass('no_disp');
      $('#slide1').addClass('no_disp');
  	}

  	$('.receive_flg').change(function(){
      var receive_flg = $(this).val();
      //リダイレクトループ回避
      var receive_flg_tmp = 0;
      setStartDateBy1719flg(receive_flg);

      //受け取り方法を保存
  		$.ajax({
  			type: "post",
  			url: "/api.php",
  			data: {
  					mode:"set_receive_info",
  					receive_flg:receive_flg,
  					receive_flg_tmp:receive_flg_tmp
  					},
  			cache: false
  		}).done(function(data){
  			//console.log('success');
  			//console.log(data);
  		}).fail(function(data){
  			//console.log('fail');
  		});

      $('#slide0').fadeOut();
      $('#slide1').fadeIn();
      $('#cache_receive_flg').val(receive_flg);
  	});
  } else if(extension_flg == 1) {
  	start_minDate = -180;
  	end_minDate = -180;

    //配送しないので仮の値を入れる
    var receive_flg = 99;
    //リダイレクトループ回避
    var receive_flg_tmp = 0;
  }

  // パラメーターの取得
  var param = location.search
  if (param == "?product_id=1668"){
    // パラメーターの値が id=1668 の場合に実行する内容
	$('#rental_start_date').datepicker({
		beforeShowDay : function(date) {
			var disableDate = $.datepicker.formatDate(dateFormat, date);
			return [( disableDates.indexOf(disableDate) == -1 ), "", ""];
    },
		dateFormat:dateFormat,
    numberOfMonths: 1,
//		timeFormat: 'HH:mm:ss',
		  minDate:start_minDate,
    maxDate: new Date( 2020, 10, 30 ),
    changeYear: true,  // 年選択をプルダウン化
    changeMonth: true  // 月選択をプルダウン化
	});
  } else {
	$('#rental_start_date').datepicker({
		beforeShowDay : function(date) {
			var disableDate = $.datepicker.formatDate(dateFormat, date);
			return [( disableDates.indexOf(disableDate) == -1 ), "", ""];
    },
		dateFormat:dateFormat,
    numberOfMonths: 1,
//		timeFormat: 'HH:mm:ss',
		minDate:start_minDate,
    maxDate:'180d',
    changeYear: true,  // 年選択をプルダウン化
    changeMonth: true  // 月選択をプルダウン化
	});
		}

  // パラメーターの取得
  var param = location.search
  if (param == "?product_id=1668"){
    // パラメーターの値が id=1668 の場合に実行する内容
				$('#rental_end_date').datepicker({
					beforeShowDay : function(date) {
						var disableDate = $.datepicker.formatDate(dateFormat, date);
						return [( disableDates.indexOf(disableDate) == -1 ), "", ""];
							},
					dateFormat:dateFormat,
							numberOfMonths: 1,
			//		timeFormat: 'HH:mm:ss',
					minDate:end_minDate,
					//maxDate:'1800d'
					maxDate: new Date( 2020, 10, 30 ),
     changeYear: true,  // 年選択をプルダウン化
     changeMonth: true  // 月選択をプルダウン化
				});
  } else {
	$('#rental_end_date').datepicker({
		beforeShowDay : function(date) {
			var disableDate = $.datepicker.formatDate(dateFormat, date);
			return [( disableDates.indexOf(disableDate) == -1 ), "", ""];
    },
		dateFormat:dateFormat,
    numberOfMonths: 1,
//		timeFormat: 'HH:mm:ss',
		minDate:end_minDate,
  maxDate:'1800d',
  changeYear: true,  // 年選択をプルダウン化
  changeMonth: true  // 月選択をプルダウン化
	});
		}


  //カートに商品がある場合、ページ表示時にまず実行
  if(obj.start_date && obj.end_date && obj.rental_term) {
    //openModal();
    $('#rental_start_date').val(obj.start_date);
    $('#rental_end_date').val(obj.end_date);
    checkRentalDate();

    if(classcategory_depth == 2) {
      $('#slide1').addClass('no_disp');
      $('#slide2').removeClass('no_disp');
      $('#classcategory_id1').val($('#classcategory_id1 option').eq(obj.rental_term).val());
      selectClasscategory1();
    } else if(classcategory_depth == 1) {
      $('#classcategory_id1').val($('#classcategory_id1 option').eq(obj.rental_term).val());
      selectClasscategory1();
      $('#detail_cart_box__cart_dates').addClass('no_disp');
      $('#confirm_rental_term').html('カートに入れる');
    }
  }
  $('#rental_start_date').change(function(){
    var today_date = new Date();
    var start_date_str = $('#rental_start_date').val();
    var start_date = new Date(start_date_str);
//最小の注文泊数 +数値を編集
    var diffDate = Math.ceil((start_date - today_date) / 86400000) + 1;
    if(rental_flg == 1) {
      $('#rental_end_date').datepicker('option', 'minDate', diffDate);
    }

    if(extension_flg == 1) {
      //受け取り方法を保存
  		$.ajax({
  			type: "post",
  			url: "/api.php",
  			data: {
  					mode:"set_receive_info",
  					receive_flg:receive_flg,
  					receive_flg_tmp:receive_flg_tmp
  					},
  			cache: false
  		}).done(function(data){
  			//console.log('success');
  			//console.log(data);
  		}).fail(function(data){
  			//console.log('fail');
  		});

    }

	});
  $('#rental_start_date, #rental_end_date').change(function(){
    if($('#rental_start_date').val() != '' && $('#rental_end_date').val() != '') {
      checkRentalDate();
    }
	});
  $('.value_pack').change(function(){
    var value_pack_val = $(this).val();
    var start_date_str = $('#rental_start_date').val();
    var start_date = new Date(start_date_str);
    var end_date = new Date(start_date.getTime() + (86400000 * value_pack_val));
    var end_date_y = end_date.getFullYear();
    var end_date_m = end_date.getMonth() + 1;
    if(end_date_m < 10) { end_date_m = '0' + end_date_m; }
    var end_date_d = end_date.getDate();
    if(end_date_d < 10) { end_date_d = '0' + end_date_d; }
    $('#rental_end_date').val(end_date_y + '/' + end_date_m + '/' + end_date_d);
    if($('#rental_start_date').val() != '' && $('#rental_end_date').val() != '') {
      checkRentalDate();
    }
	});
  if(classcategory_depth == 2) {
    $('#confirm_rental_term').click(function(){
      if(!$('#confirm_rental_term').hasClass('off')) {
        $('#slide1').fadeOut();
        $('#slide2').fadeIn();
      }
  	});
  } else if(classcategory_depth == 1) {
    $('#confirm_rental_term').html('カートに入れる');
    $('#confirm_rental_term').click(function(){
      if(!$('#confirm_rental_term').hasClass('off')) {
        //カートに入れる
        $('#form1').submit();
      }
  	});
  } else {
    console.log('規格がありません');
  }
  $('.kikaku2, .kikaku3').change(function(){
    var kikaku2_val = $('.kikaku2:checked').val();
    var kikaku3_val = $('.kikaku3:checked').val();

    if(kikaku2_val > 0 && kikaku3_val > 0) {
      if($('#confirm_kikaku2').hasClass('off')) {
        $('#confirm_kikaku2').removeClass('off');
        $('#confirm_kikaku2').addClass('on_kikaku_btn');
      }

      if(kikaku2_val == 1 && kikaku3_val == 1) {
        $('#classcategory_id2').val($('#classcategory_id2 option').eq(1).val());
      }
      if(kikaku2_val == 1 && kikaku3_val == 2) {
        $('#classcategory_id2').val($('#classcategory_id2 option').eq(2).val());
      }
      if(kikaku2_val == 2 && kikaku3_val == 1) {
        $('#classcategory_id2').val($('#classcategory_id2 option').eq(3).val());
      }
      if(kikaku2_val == 2 && kikaku3_val == 2) {
        $('#classcategory_id2').val($('#classcategory_id2 option').eq(4).val());
      }

    } else if(nobat_flg == 1) {
      if(kikaku2_val == 1) {
        $('#classcategory_id2').val($('#classcategory_id2 option').eq(1).val());
        $('#confirm_kikaku2').removeClass('off');
        $('#confirm_kikaku2').addClass('on_kikaku_btn');
      }
      if(kikaku2_val == 2) {
        $('#classcategory_id2').val($('#classcategory_id2 option').eq(2).val());
        $('#confirm_kikaku2').removeClass('off');
        $('#confirm_kikaku2').addClass('on_kikaku_btn');
      }

    }

      selectClasscategory2();

  });
  $('.kikaku4').change(function(){
    var kikaku4_val = $('.kikaku4:checked').val();

    if(kikaku4_val > 0) {
      if($('#confirm_kikaku2').hasClass('off')) {
        $('#confirm_kikaku2').removeClass('off');
        $('#confirm_kikaku2').addClass('on_kikaku_btn');
      }

      if(kikaku4_val == 1) {
        $('#classcategory_id2').val($('#classcategory_id2 option').eq(1).val());
      }
      if(kikaku4_val == 2) {
        $('#classcategory_id2').val($('#classcategory_id2 option').eq(2).val());
      }

      selectClasscategory2();
    }
  });
  $('#confirm_kikaku2').click(function(){
    if(!$('#confirm_kikaku2').hasClass('off')) {
      //カートに入れる
      $('#form1').submit();
    }
	});
  function checkRentalDate() {
    var start_date_str = $('#rental_start_date').val();
    var end_date_str = $('#rental_end_date').val();
    var start_date = new Date(start_date_str);
    var end_date = new Date(end_date_str);
    var rental_term = Math.ceil((end_date - start_date) / 86400000);
    if(!$('#rental_err_01').hasClass('no_disp')) { $('#rental_err_01').addClass('no_disp'); }
    if(!$('#rental_err_02').hasClass('no_disp')) { $('#rental_err_02').addClass('no_disp'); }
    if(!$('#rental_err_03').hasClass('no_disp')) { $('#rental_err_03').addClass('no_disp'); }
    if(!$('#rental_err_04').hasClass('no_disp')) { $('#rental_err_04').addClass('no_disp'); }

    if(rental_flg == 1) {
      if(rental_term <= 0) {
        //開始日<終了日チェック
        $('#rental_err_02').removeClass('no_disp')
        if(!$('#confirm_rental_term').hasClass('off')) { $('#confirm_rental_term').addClass('off'); }
        return false;
      } else if(rental_term < min_rental_term) {
        //最小レンタル期間チェック
        $('#rental_err_04').removeClass('no_disp')
        if(!$('#confirm_rental_term').hasClass('off')) { $('#confirm_rental_term').addClass('off'); }
        return false;
      }
    }

    if(extension_flg == 1) {
      if(rental_term < 0) {
        //開始日<終了日チェック
        $('#rental_err_02').removeClass('no_disp')
        if(!$('#confirm_rental_term').hasClass('off')) { $('#confirm_rental_term').addClass('off'); }
        return false;
      }
    }

    if(rental_term > max_rental_term) {
      //Maxレンタル期間チェック
      $('#rental_err_01').removeClass('no_disp')
      if(!$('#confirm_rental_term').hasClass('off')) { $('#confirm_rental_term').addClass('off'); }
      return false;
    } else {
      //注文不可日チェック
      if(disableDates.length > 0) {
        var cannot_date;
        var cannot_flg = 0;
        $.each(disableDates, function(i, value) {
          cannot_date = new Date(value);
          if((start_date - cannot_date <= 0) && (cannot_date - end_date <= 0)) {
            cannot_flg++;
          }
        });
        if(cannot_flg > 0) {
          $('#rental_err_03').removeClass('no_disp')
          if(!$('#confirm_rental_term').hasClass('off')) { $('#confirm_rental_term').addClass('off'); }
          return false;
        }
      }
      $('#confirm_rental_term').removeClass('off');
      $('#confirm_rental_term').addClass('on_term_btn');

      //規格1の選択
      //console.log(rental_term);
      if(extension_flg == 1) {
        rental_term = rental_term + 1;
      }
      if(classcategory_depth > 0) {
        $('#classcategory_id1').val($('#classcategory_id1 option').eq(rental_term).val());
        $("#selected").text($('#classcategory_id1 option').eq(rental_term).text());
        selectClasscategory1();

        var str = $("#selected").text();
        var cut2 = str.substr(str.indexOf('-') + 1);
        $("#selected2").text(cut2);
        $(".selected_plan").removeClass("no_disp");
      }
      if(extension_flg == 1) {
        rental_term = rental_term - 1;
      }

      $('#cache_start_date').val(start_date_str);
      $('#cache_end_date').val(end_date_str);
      $('#cache_rental_term').val(rental_term);

      //レンタル日を一時保存
  		$.ajax({
  			type: "post",
  			url: "/api.php",
  			data: {
  					mode:"set_base_info",
  					start_date:start_date_str,
  					end_date:end_date_str,
  					rental_term:rental_term
  					},
  			cache: false
  		}).done(function(data){
  			//console.log('success');
  			//console.log(data);
        return false;
  		}).fail(function(data){
  			//console.log('fail');
  		});
  		return false;
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
			//console.log(data);
			var jsn = $.parseJSON(data);
      obj.fast_date = jsn.fast_date;
      obj.start_date = jsn.start_date;
      obj.end_date = jsn.end_date;
      obj.rental_term = jsn.rental_term;
      obj.receive_flg = jsn.receive_flg;
      obj.flg17 = jsn.flg17;
      obj.flg19 = jsn.flg19;
		}).fail(function(data){
			//console.log('fail');
      obj.fast_date = '';
      obj.start_date = '';
      obj.end_date = '';
      obj.rental_term = '';
      obj.receive_flg = '';
      obj.flg17 = 1;
      obj.flg19 = 1;
		});
    if($('#cache_start_date').val() && $('#cache_end_date').val() && $('#cache_rental_term').val()) {
      obj.start_date = $('#cache_start_date').val();
      obj.end_date = $('#cache_end_date').val();
      obj.rental_term = $('#cache_rental_term').val();
    }
    return obj;
  }

  $('.btn_select_product').click(function(){
    openModal();
    return false;
  });
	function openModal() {
//		$('#modal-open').click(function(){

			//キーボード操作などにより、オーバーレイが多重起動するのを防止する
			$(this).blur() ;	//ボタンからフォーカスを外す
			if($('#modal-overlay')[0]) return false;	//新しくモーダルウィンドウを起動しない (防止策1)
			//if($('#modal-overlay')[0]) $('#modal-overlay').remove();	//現在のモーダルウィンドウを削除して新しく起動する (防止策2)

			//オーバーレイを出現させる
			$('body').append('<div id="modal-overlay"></div>');
			$('#modal-overlay').fadeIn('slow');

			//コンテンツをセンタリングする
			centeringModal();

			//コンテンツをフェードインする
			$('#modal-content').fadeIn('slow');

			$('#modal-overlay, .modal-close').unbind().click( function(){
				$('#modal-content, #modal-overlay').fadeOut('slow', function(){
					$('#modal-overlay').remove();
				});
			});
//		});
	}

	//リサイズされたら、センタリングをする関数[centeringModal()]を実行する
	$(window).resize(centeringModal);

	//センタリングを実行する関数
	function centeringModal() {
		var w = $(window).width();
		var h = $(window).height();

		// jQueryのバージョンによっては、引数[{margin:true}]を指定した時、不具合を起こします。
	//		var cw = $('#modal-content" ).outerWidth( {margin:true} );
	//		var ch = $('#modal-content" ).outerHeight( {margin:true} );
		var cw = $('#modal-content').outerWidth();
		var ch = $('#modal-content').outerHeight();

		//センタリングを実行する
		$('#modal-content').css({"left":((w - cw)/2) + "px","top": ((h - ch)/2) + "px"} ) ;
	}

  function selectClasscategory1() {
    var $form = $('select[name=classcategory_id1]').parents('form');
    var product_id = $form.find('input[name=product_id]').val();
    var $sele1 = $('select[name=classcategory_id1]');
    var $sele2 = $form.find('select[name=classcategory_id2]');

    // 規格1のみの場合
    if (!$sele2.length) {
        eccube.checkStock($form, product_id, $sele1.val(), '0');
        // 規格2ありの場合
    } else {
        eccube.setClassCategories($form, product_id, $sele1, $sele2);
    }
  }
  function selectClasscategory2() {
    var $form = $('select[name=classcategory_id2]').parents('form');
    var product_id = $form.find('input[name=product_id]').val();
    var $sele1 = $form.find('select[name=classcategory_id1]');
    var $sele2 = $('select[name=classcategory_id2]');
    eccube.checkStock($form, product_id, $sele1.val(), $sele2.val());
  }

  $('#btn_start_again').click(function(){
    eccube.fnFormModeSubmit('form1','all_delete','','');

  	$.ajax({
  		type: "post",
  		url: "/api.php",
  		data: {
  				mode:"reset"
  				},
  		cache: false,
      async: false
  	}).done(function(data){
  		//console.log(data);
  	}).fail(function(data){
  		//console.log('fail');
  	});

    location.reload();
	});

});
</script>


            </div>
            <!--▲買い物かご-->
        </div>
    </form>

    <!--詳細ここまで-->

    <!--▼サブコメント-->
    <!--{section name=cnt loop=$smarty.const.PRODUCTSUB_MAX}-->
        <!--{assign var=key value="sub_title`$smarty.section.cnt.index+1`"}-->
        <!--{assign var=ikey value="sub_image`$smarty.section.cnt.index+1`"}-->
        <!--{if $arrProduct[$key] != "" or $arrProduct[$ikey]|strlen >= 1}-->
            <div class="sub_area clearfix">
                <h3><!--★サブタイトル★--><!--{$arrProduct[$key]|h}--></h3>
                <!--{assign var=ckey value="sub_comment`$smarty.section.cnt.index+1`"}-->
                <!--▼サブ画像-->
                <!--{assign var=lkey value="sub_large_image`$smarty.section.cnt.index+1`"}-->
                <!--{if $arrProduct[$ikey]|strlen >= 1}-->
                    <div class="subtext"><!--★サブテキスト★--><!--{$arrProduct[$ckey]|nl2br_html}--></div>
                    <div class="subphotoimg">
                        <!--{if $arrProduct[$lkey]|strlen >= 1}-->
                            <a href="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct[$lkey]|h}-->" class="expansion" target="_blank" >
                        <!--{/if}-->
                        <img src="<!--{$arrFile[$ikey].filepath}-->" alt="<!--{$arrProduct.name|h}-->" width="<!--{$arrFile[$ikey].width}-->" height="<!--{$arrFile[$ikey].height}-->" />
                        <!--{if $arrProduct[$lkey]|strlen >= 1}-->
                            </a>
                            <span class="mini">
                                <a href="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct[$lkey]|h}-->" class="expansion" target="_blank">
                                    画像を拡大する</a>
                            </span>
                        <!--{/if}-->
                    </div>
                <!--{else}-->
                    <p class="subtext"><!--★サブテキスト★--><!--{$arrProduct[$ckey]|nl2br_html}--></p>
                <!--{/if}-->
                <!--▲サブ画像-->
            </div>
        <!--{/if}-->
    <!--{/section}-->
    <!--▲サブコメント-->

    <!--この商品に対するお客様の声-->
    <div id="customervoice_area" style="display: none;">
        <h2><img src="<!--{$TPL_URLPATH}-->img/title/tit_product_voice.png" alt="この商品に対するお客様の声" /></h2>

        <div class="review_bloc clearfix">
            <p>この商品に対するご感想をぜひお寄せください。</p>
            <div class="review_btn">
                <!--{if count($arrReview) < $smarty.const.REVIEW_REGIST_MAX}-->
                    <!--★新規コメントを書き込む★-->
                    <a href="./review.php"
                        onclick="eccube.openWindow('./review.php?product_id=<!--{$arrProduct.product_id}-->','review','600','640'); return false;"
                        target="_blank">
                        <img class="hover_change_image" src="<!--{$TPL_URLPATH}-->img/button/btn_comment.jpg" alt="新規コメントを書き込む" />
                    </a>
                <!--{/if}-->
            </div>
        </div>

        <!--{if count($arrReview) > 0}-->
            <ul>
                <!--{section name=cnt loop=$arrReview}-->
                    <li>
                        <p class="voicetitle"><!--{$arrReview[cnt].title|h}--></p>
                        <p class="voicedate"><!--{$arrReview[cnt].create_date|sfDispDBDate:false}-->　投稿者：<!--{if $arrReview[cnt].reviewer_url}--><a href="<!--{$arrReview[cnt].reviewer_url}-->" target="_blank"><!--{$arrReview[cnt].reviewer_name|h}--></a><!--{else}--><!--{$arrReview[cnt].reviewer_name|h}--><!--{/if}-->　おすすめレベル：<span class="recommend_level"><!--{assign var=level value=$arrReview[cnt].recommend_level}--><!--{$arrRECOMMEND[$level]|h}--></span></p>
                        <p class="voicecomment"><!--{$arrReview[cnt].comment|h|nl2br}--></p>
                    </li>
                <!--{/section}-->
            </ul>
        <!--{/if}-->
    </div>
    <!--お客様の声ここまで-->

    <!--▼関連商品-->
    <!--{if $arrRecommend}-->
        <div id="whobought_area">
            <h2><img src="<!--{$TPL_URLPATH}-->img/title/tit_product_recommend.png" alt="その他のオススメ商品" /></h2>
            <!--{foreach from=$arrRecommend item=arrItem name="arrRecommend"}-->
                <div class="product_item">
                    <div class="productImage">
                        <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrItem.product_id|u}-->">
                            <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrItem.main_list_image|sfNoImageMainList|h}-->" style="max-width: 65px;max-height: 65px;" alt="<!--{$arrItem.name|h}-->" /></a>
                    </div>
                    <!--{assign var=price02_min value=`$arrItem.price02_min_inctax`}-->
                    <!--{assign var=price02_max value=`$arrItem.price02_max_inctax`}-->
                    <div class="productContents">
                        <h3><a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrItem.product_id|u}-->"><!--{$arrItem.name|h}--></a></h3>
                        <p class="sale_price"><!--{$smarty.const.SALE_PRICE_TITLE}-->(税込)：<span class="price">
                            <!--{if $price02_min == $price02_max}-->
                                <!--{$price02_min|number_format}-->
                            <!--{else}-->
                                <!--{$price02_min|number_format}-->～<!--{$price02_max|number_format}-->
                            <!--{/if}-->円</span></p>
                        <p class="mini"><!--{$arrItem.comment|h|nl2br}--></p>
                    </div>
                </div><!--{* /.item *}-->
                <!--{if $smarty.foreach.arrRecommend.iteration % 2 === 0}-->
                    <div class="clear"></div>
                <!--{/if}-->
            <!--{/foreach}-->
        </div>
    <!--{/if}-->
    <!--▲関連商品-->

</div>

<!--{if count($arrRelativeCat) > 0}-->
<!--{if $arrRelativeCat.0.0.category_id == 38}-->
<!--★商品説明　物理SIM-->
<style>
.detail_info_area{display: none;}
</style>
<div class="sim_detail_wrap">
<section class="flow_sec">
 <div class="wrap">
	 <div class="sec_name_box">
	 <p class="sub">HOW TO USE</p>
		<p class="sec_name"><span class="big">3</span> Easy Steps to Get Started</p>
		</div>
	<div class="flow_wrap">
		 <div class="s_flow">
		 <p class="step_num">STEP1</p>
				<p class="image"><img src="/shop/img/detail/sim/step01.jpg" width="766" height="562" alt=""/></p>
			<p class="name">Receive your SIM</p>
			<p class="comment">Your physical SIM card will be delivered to you.</p>
			</div>
			<div class="s_flow">
		 <p class="step_num">STEP2</p>
				<p class="image"><img src="/shop/img/detail/sim/step02.jpg" width="765" height="562" alt=""/></p>
				<p class="name">Insert the SIM</p>
				<p class="comment">Place the SIM card into your smartphone.</p>
			</div>
			<div class="s_flow">
		 <p class="step_num">STEP3</p>
				<p class="image"><img src="/shop/img/detail/sim/step03.jpg" width="766" height="562" alt=""/></p>
				<p class="name">Ready to Go</p>
				<p class="comment">You can now connect to the internet in Japan.</p>
			</div>
	</div>
		<p class="btn_link"><a href="https://www.wifi-rental-store.jp/guide/guide_sim_en.pdf" target="_blank">Prepaid SIM Setup Guide
</a></p>
	</div>
</section>

<section class="reason_sec">
 <div class="wrap">
	 <div class="sec_name_box">
	 <p class="sub">REASON</p>
		<p class="sec_name"><span class="mid">Why Customers Choose Us</p>
		</div>
		<div class="reason_wrap">
	 <div class="s_reason">
	 <div class="right">
				 <p class="num">01</p>
					<div class="comment_box">
					 <p class="name">Support 365 Days a Year</p>
						<p class="comment">We provide year-round support, so you can reach us anytime. If you are unsure about the setup or experience connection issues, our team will assist you quickly via email or chat. We aim to offer clear, friendly, and reliable support — even for first-time users.</p>
					</div>
		</div>
			<p class="image"><img src="/shop/img/detail/sim/reason01.jpg" width="896" height="358" alt=""/></p>
		</div>
			<div class="s_reason">
			 <div class="right">
				 <p class="num">02</p>
					<div class="comment_box">
					 <p class="name">High-Quality SIMs</p>
						<p class="comment">Our prepaid SIMs use reliable, high-performance networks. This plan operates on stable SoftBank network, offering fast and consistent 4G LTE coverage across Japan.</p>
					</div>
				</div>
				<p class="image"><img src="/shop/img/detail/sim/reason02.jpg" width="896" height="358" alt=""/></p>
			</div>
			<div class="s_reason">
			 <div class="right">
				 <p class="num">03</p>
					<div class="comment_box">
					 <p class="name">No Hidden Fees</p>
						<p class="comment">The price you see is the price you pay. No activation fees, no contract fees, and no extra charges later. We value simple and transparent pricing.</p>
					</div>
				</div>
				<p class="image"><img src="/shop/img/detail/sim/reason03.jpg" width="896" height="358" alt=""/></p>
			</div>
		</div>
	</div>
</section>

<section class="faq_sec">
 <div class="wrap">
	 <div class="sec_name_box">
	 <p class="sub">Frequently Asked Questions</p>
		<p class="sec_name">FAQs</p>
		</div>
		<div class="faq_wrap">
				<div class="sub_info">
						<p class="main_ac_btn ac_open">Is this prepaid SIM compatible with any smartphone?</p>
						<ul class="sub_ac_box" style="display: none">
						<div class="a_box">
							<p class="comment">You can use this SIM with any SIM-free or carrier-unlocked device that supports SoftBank’s network bands.</p>
						</div>
						</ul>
				</div>
				<div class="sub_info">
						<p class="main_ac_btn ac_open">Is it easy to start using the SIM?</p>
						<ul class="sub_ac_box" style="display: none">
						<div class="a_box">
							<p class="comment">Yes, setup is very simple.<br>
Insert the SIM, then enter the APN information manually.<br>
Your device will connect to the Internet automatically.<br>
<br>
You can also check our <a href="https://www.wifi-rental-store.jp/guide/guide_sim_en.pdf" target="_blank">"Prepaid SIM Setup Guide"</a> for step-by-step instructions.</p>
						</div>
						</ul>
				</div>
				<div class="sub_info">
						<p class="main_ac_btn ac_open">How fast is the connection? Is the quality reliable?</p>
						<ul class="sub_ac_box" style="display: none">
						<div class="a_box">
							<p class="comment">Yes, you can rely on stable, high-speed connectivity.<br>
This SIM uses the SoftBank network.</p>
						</div>
						</ul>
				</div>
				<div class="sub_info">
						<p class="main_ac_btn ac_open">Do you offer customer support?</p>
						<ul class="sub_ac_box" style="display: none">
						<div class="a_box">
							<p class="comment">Yes, our support team is available every day.<br>
If you have any questions or concerns, you can contact us via email.<br>
<br>
Business Hours:<br>
Weekdays: 9:30–19:00<br>
Weekends & Holidays: 10:00–18:30</p>
						</div>
						</ul>
				</div>
				<div class="sub_info">
						<p class="main_ac_btn ac_open">Are payments secure? What payment methods are available?</p>
						<ul class="sub_ac_box" style="display: none">
						<div class="a_box">
							<p class="comment">We accept credit card payments.<br>
All transactions are securely processed through Sony Payment Services with 3D Secure protection.<br>
<br>
We do not store or retain your credit card information.<br>
Your personal data is handled with strict security measures, so you can use our service with confidence.</p>
						</div>
						</ul>
				</div>
		</div>
	</div>
</section>
</div>
<!--{elseif $arrRelativeCat.0.0.category_id == 35}-->
<!--★商品説明　eSIM-->
<style>
.detail_info_area{display: none;}
</style>
<div class="sim_detail_wrap">
<section class="flow_sec">
 <div class="wrap">
	 <div class="sec_name_box">
	 <p class="sub">HOW TO USE</p>
		<p class="sec_name">ご利用開始までの<span class="big">3</span>STEP</p>
		</div>
	<div class="flow_wrap">
		 <div class="s_flow">
		 <p class="step_num">STEP1</p>
				<p class="image"><img src="/shop/img/detail/sim/step01.jpg" width="766" height="562" alt=""/></p>
			<p class="name">QRコードをスキャン</p>
			<p class="comment">メールで届くQRコードをスマホでスキャンしてください。手動でも設定ができます。</p>
			</div>
			<div class="s_flow">
		 <p class="step_num">STEP2</p>
				<p class="image"><img src="/shop/img/detail/sim/step02.jpg" width="765" height="562" alt=""/></p>
				<p class="name">eSIMを有効化</p>
				<p class="comment">スマホでeSIMを有効化してください。</p>
			</div>
			<div class="s_flow">
		 <p class="step_num">STEP3</p>
				<p class="image"><img src="/shop/img/detail/sim/step03.jpg" width="766" height="562" alt=""/></p>
				<p class="name">準備完了</p>
				<p class="comment">渡航先でインターネットがご利用できます。</p>
			</div>
	</div>
		<p class="btn_link"><a href="https://esim-market.net/guide" target="_blank">詳しい設定ガイド</a></p>
	</div>
</section>

<section class="reason_sec">
 <div class="wrap">
	 <div class="sec_name_box">
	 <p class="sub">REASON</p>
		<p class="sec_name"><span class="mid">あんしんeSIMマーケットが</span><br />選ばれる理由</p>
		</div>
		<div class="reason_wrap">
	 <div class="s_reason">
	 <div class="right">
				 <p class="num">01</p>
					<div class="comment_box">
					 <p class="name">365日サポート</p>
						<p class="comment">年中無休でサポート体制を整えているため、いつでもご相談いただけます。eSIMの設定や通信に関する不明点があっても、メールやチャットで迅速に対応。はじめての方でも安心してご利用いただけるよう、わかりやすく丁寧なサポートを心がけています。</p>
					</div>
		</div>
			<p class="image"><img src="/shop/img/detail/sim/reason01.jpg" width="896" height="358" alt=""/></p>
		</div>
			<div class="s_reason">
			 <div class="right">
				 <p class="num">02</p>
					<div class="comment_box">
					 <p class="name">高品質eSIMの取り扱い</p>
						<p class="comment">当店で取り扱っているeSIMは、信頼性の高い通信事業者の回線を使用しています。ドコモをはじめとした安定したネットワークに対応し、国内の広いエリアで快適な4G LTE通信をご利用いただけます。旅行や出張はもちろん、一時帰国の方にもおすすめです。</p>
					</div>
				</div>
				<p class="image"><img src="/shop/img/detail/sim/reason02.jpg" width="896" height="358" alt=""/></p>
			</div>
			<div class="s_reason">
			 <div class="right">
				 <p class="num">03</p>
					<div class="comment_box">
					 <p class="name">余計な手数料なし</p>
						<p class="comment">ご購入時の表示価格がすべてで、アクティベーション費用や契約手数料などの追加料金は一切発生しません。あとから費用がかかる心配がないので、安心してお申し込みいただけます。わかりやすく、シンプルな料金体系を大切にしています。</p>
					</div>
				</div>
				<p class="image"><img src="/shop/img/detail/sim/reason03.jpg" width="896" height="358" alt=""/></p>
			</div>
		</div>
	</div>
</section>

<section class="faq_sec">
 <div class="wrap">
	 <div class="sec_name_box">
	 <p class="sub">FAQ</p>
		<p class="sec_name">よくある質問</p>
		</div>
		<div class="faq_wrap">
				<div class="sub_info">
						<p class="main_ac_btn ac_open">eSIMは、どのスマートフォンでも利用できますか?</p>
						<ul class="sub_ac_box" style="display: none">
						<div class="a_box">
							<p class="comment">eSIM対応のデバイスでしたら、ご利用いただけます。<br>
<br>
現在、多くのスマートフォンがeSIMに対応しており、<br>
eSIM対応のiPad, タブレット, PCなどでもご利用いただけます。<br>
<br>
eSIM対応デバイスの確認は<a href="https://esim-market.net/#check" target="_blank">こちら</a></p>
						</div>
						</ul>
				</div>
				<div class="sub_info">
						<p class="main_ac_btn ac_open">かんたんに利用開始できますか?</p>
						<ul class="sub_ac_box" style="display: none">
						<div class="a_box">
							<p class="comment">はい、かんたんにご利用いただけます。<br>
ご注文完了後すぐに、eSIMの情報をメールでお送りします。<br>
QRコードをスキャンするだけで、すぐに設定が可能です。<br>
<br>
詳しい手順は「かんたん設定ガイド」でもご案内しております。<br>
<a href="https://esim-market.net/guide" target="_blank">【かんたん設定ガイド】</a><br></p>
						</div>
						</ul>
				</div>
				<div class="sub_info">
						<p class="main_ac_btn ac_open">eSIMの通信速度を教えてください。品質は大丈夫ですか?</p>
						<ul class="sub_ac_box" style="display: none">
						<div class="a_box">
							<p class="comment">はい、ご安心ください。<br>
当店のeSIMは、4G/LTE対応の高品質eSIMです。<br>
<br>
docomo回線を使用しておりますので、安定した高速通信をご利用いただけます。<br>
旅行や出張などさまざまな場面で快適なインターネット接続をご利用ください。<br>
<br>
なお、一部の地域やご利用環境により、通信速度が変動する場合がございます。<br>
あらかじめご了承ください。</p>
						</div>
						</ul>
				</div>
				<div class="sub_info">
						<p class="main_ac_btn ac_open">問い合わせできるカスタマーサポートはありますか?</p>
						<ul class="sub_ac_box" style="display: none">
						<div class="a_box">
							<p class="comment">はい、年中無休でサポートを行っております。<br>
ご不明な点やご不安なことがあれば、LINE・メール・お電話にてご相談いただけます。<br>
<br>
※海外からお電話の場合は、通話料金が発生しますのでご注意ください。<br>
<br>
【営業時間】<br>
平日 9:30?19:00<br>
土日祝日 11:00?18:00<br></p>
						</div>
						</ul>
				</div>
				<div class="sub_info">
						<p class="main_ac_btn ac_open">支払い方法は安全ですか?どのようなお支払い方法がありますか?</p>
						<ul class="sub_ac_box" style="display: none">
						<div class="a_box">
							<p class="comment">お支払いはクレジットカード決済となります。<br>
決済は信頼の高い決済代行サービス(ソニーペイメントサービス)を通じて、3Dセキュア環境で安全に処理されます。<br>
<br>
当店ではクレジットカード情報を保持・保存することは一切ございません。<br>
お客様の個人情報は厳重に管理しておりますので、どうぞ安心してご利用ください。</p>
						</div>
						</ul>
				</div>
		</div>
	</div>
</section>
</div>
<!--{/if}-->
<!--{/if}-->

<div class="detail_info_area">
<section class="insurance-wrap">
<div class="title-box">
 <p class="name">Insurance</p>
 <p class="under-line"></p>
</div>
   <p class="lead-text">The insurance will cover repair costs in the event the rental product is damaged, including those caused by negligence.<br>* Insurance is valid only once during a rental period.</p>
   <div class="list-wrap">
     <table width="100%" class="detail_table">
  <tbody>
    <tr>
      <td colspan="2" width="46%"></td>
      <td width="30%" class="futan">Liability for customers without insurance</td>
      <td width="24%" class="l_r_t">Liability for customers with insurance</td>
    </tr>
    <tr>
      <td width="108" rowspan="3" class="trouble">Malfunctions including water damage</td>
      <td width="97">Wi-Fi router</td>
      <td>35,200 yen</td>
      <td class="l_r">0 yen</td>
    </tr>
    <tr>
      <td>AC adapter</td>
      <td>2,970 yen</td>
      <td class="l_r">0 yen</td>
    </tr>
    <tr>
      <td>USB cable</td>
      <td>1,100 yen</td>
      <td bgcolor="#D0FFD4" class="l_r">0 yen</td>
    </tr>
    <tr>
      <td rowspan="3" class="trouble">Loss</td>
      <td>Wi-Fi router</td>
      <td>35,200 yen</td>
      <td class="l_r">10,000 yen</td>
    </tr>
    <tr>
      <td>AC adapter</td>
      <td>2,970 yen</td>
      <td class="l_r">490 yen</td>
    </tr>
    <tr>
      <td>USB cable</td>
      <td>1,100 yen</td>
      <td class="l_r_b">400 yen</td>
    </tr>
  </tbody>
</table>
   <!--<p class="insurance-comment"><img src="/shop/img/detail/insurance-comment.png" width="100%" alt=""/></p>-->
   </div>
  <div class="comment-box">
     <p class="comment">You can sign up for the insurance when you place your order.</p>
     <p class="comment">* If a failure occurs under normal usage, we deliver a replacement router regardless of whether the customer has insurance or not. <br>
* The insurance can only be used once during the rental period.</p>
   </div>
   <div class="btn-set btn_wh insurance_btn"><a href="javascript:window.open('/insurance.html','負担金額一覧表','width=500,height=800,scrollbars=yes');void(0);">Detailed fee list for loss and damage.</a></div>

</section>
<section class="battery-wrap">
<div class="title-box">
 <p class="name">Additional Battery Rental</p>
 <p class="under-line"></p>
</div>
   <div class="lead-box">
    <p class="lead-text">Additional battery rental is available for 10,000mAh mobile batteries.</p>
    <p class="battery-comment"><img src="/shop/img/detail/battery-comment.png" width="100%" alt=""/></p>
   </div>
   <div class="battery-image">
    <p class="comment"><span>10,000mA</span><br>It lasts as long as recharging the router twice.</p>
    <p class="image"><img src="/shop/img/detail/battery-image.png" width="100%" alt=""/></p>
   </div>
   <div class="comment-box">
     <p class="comment">Our Wi-Fi router has a built-in battery and can be used for 3-4 continuous hours without an additional battery. The Wi-Fi router can be recharged for continous use.<br><br>* The additional battery weighs 250g</p>
     <p class="l_text">Rental Rate: 50 JPY / Day<br>750 JPY / 1 Month</p>
   </div>
   <div class="btn-set btn_wh battery_btn"><a href="javascript:window.open('/img/common/battery_price.jpg','バッテリー料金表','width=500,height=800,scrollbars=yes');void(0);">Rental Rate List</a></div>
</section>
<section class="delivery-wrap">
<div class="title-box">
 <p class="name">Available Delivery Date and Time</p>
 <p class="under-line"></p>
</div>
<p class="lead-text">Orders by 5PM are shipped the same day.<br>Next day delivery is possible. * Except Hokkaido, Okinawa and Kyushu.</p>
<div class="map-box">
 <p class="image pc"><img src="/shop/img/detail/map.png" width="100%" alt=""/></p>
 <p class="image sp"><img src="/shop/img/detail/map_sp.png" width="100%" alt=""/></p>
</div>
<p class="lead-text delivery-list_lead">* For airport pickup, please order in advance.<br>
You can pickup anytime in tne business hours at the counter when you place your order by following deadlines.</p>
<div class="delivery-table">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td class="day2_01">2 days before your pickup, by 5PM</td>
      <!--<td class="wide day2_02">2 business days before your pickup, by 5PM (Closed on weekends and Japanese holidays)</td>-->
      <td class="day3">3 days before your pickup, by 5PM</td>
    </tr>
    <tr>
      <td><span>Narita</span> Airport</td>
      <td class="center day2_01">●</td>
      <!--<td>&nbsp;</td>-->
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span>Haneda</span> Airport</td>
      <td class="center day2_01">●</td>
      <!--<td>&nbsp;</td>-->
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span>Kansai</span> International Airport</td>
      <td class="center day2_01">●</td>
      <!--<td>&nbsp;</td>-->
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span>Itami</span> Airport<br>(Osaka International Airport)</td>
      <td class="center day2_01">●</td>
      <!--<td>&nbsp;</td>-->
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span>Centrair</span> Airport<br>(Chubu International )</td>
      <td class="center day2_01">●</td>
      <!--<td class="center day2_02">●</td>-->
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span>New Chitose</span> Airport</td>
      <td>&nbsp;</td>
      <!--<td>&nbsp;</td>-->
      <td class="center day3">●</td>
    </tr>
    <tr>
      <td><span>Fukuoka</span> Airport</td>
      <td>&nbsp;</td>
      <!--<td>&nbsp;</td>-->
      <td class="center day3">●</td>
    </tr>
    <tr>
      <td><span>Naha</span> Airport</td>
      <td>&nbsp;</td>
      <!--<td>&nbsp;</td>-->
      <td class="center day3">●</td>
    </tr>
  </tbody>
</table>
</div>
</section>

</div>

<script>

</script>
