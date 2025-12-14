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

<script>//<![CDATA[
    // 規格2に選択肢を割り当てる。
    function fnSetClassCategories(form, classcat_id2_selected) {
        var $form = $(form);
        var product_id = $form.find('input[name=product_id]').val();
        var $sele1 = $form.find('select[name=classcategory_id1]');
        var $sele2 = $form.find('select[name=classcategory_id2]');
        eccube.setClassCategories($form, product_id, $sele1, $sele2, classcat_id2_selected);
    }
    $(function(){
        $('#detailphotoblock ul li').flickSlide({target:'#detailphotoblock>ul', duration:5000, parentArea:'#detailphotoblock', height: 200});
        $('#whobought_area ul li').flickSlide({target:'#whobought_area>ul', duration:5000, parentArea:'#whobought_area', height: 80});

        //お勧め商品のリンクを張り直し(フリックスライドによるエレメント生成後)
        $('#whobought_area li').biggerlink();
    });
    //サブエリアの表示/非表示
    var speed = 500;
    var stateSub = 0;
    function fnSubToggle(areaEl, imgEl) {
        areaEl.slideToggle(speed);
        if (stateSub == 0) {
            $(imgEl).attr("src", "<!--{$TPL_URLPATH}-->img/button/btn_plus.png");
            stateSub = 1;
        } else {
            $(imgEl).attr("src", "<!--{$TPL_URLPATH}-->img/button/btn_minus.png");
            stateSub = 0
        }
    }
    //この商品に対するお客様の声エリアの表示/非表示
    var stateReview = 0;
    function fnReviewToggle(areaEl, imgEl) {
        areaEl.slideToggle(speed);
        if (stateReview == 0) {
            $(imgEl).attr("src", "<!--{$TPL_URLPATH}-->img/button/btn_plus.png");
            stateReview = 1;
        } else {
            $(imgEl).attr("src", "<!--{$TPL_URLPATH}-->img/button/btn_minus.png");
            stateReview = 0
        }
    }
    //お勧めエリアの表示/非表示
    var statewhobought = 0;
    function fnWhoboughtToggle(areaEl, imgEl) {
        areaEl.slideToggle(speed);
        if (statewhobought == 0) {
            $(imgEl).attr("src", "<!--{$TPL_URLPATH}-->img/button/btn_plus.png");
            statewhobought = 1;
        } else {
            $(imgEl).attr("src", "<!--{$TPL_URLPATH}-->img/button/btn_minus.png");
            statewhobought = 0
        }
    }
//]]></script>


<section id="product_detail">

    <!--★タイトル★-->
    <h2 class="title"><!--{$tpl_subtitle|h}--></h2>
    <!--★画像★-->
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
        <section class="image_wrap">
 <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.0.0.category_id == 14}-->
  <!---601HW通常---->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/601hw/img001.jpg" width="100%" alt=""></li>
                    <li class="item2"><img src="/thumb_change/img/601hw/img002.jpg" width="100%" alt=""></li>
                    <li class="item3"><img src="/thumb_change/img/601hw/img003.jpg" width="100%" alt=""></li>
                    <li class="item4"><img src="/thumb_change/img/601hw/img004.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb">
                    <li class="thumb1"><img src="/thumb_change/img/601hw/img001.jpg" width="100%" alt=""></li>
                    <li class="thumb2"><img src="/thumb_change/img/601hw/img002.jpg" width="100%" alt=""></li>
                    <li class="thumb3"><img src="/thumb_change/img/601hw/img003.jpg" width="100%" alt=""></li>
                    <li class="thumb4"><img src="/thumb_change/img/601hw/img004.jpg" width="100%" alt=""></li>
                </ul>
             </div>
 <!--{elseif $arrRelativeCat.0.0.category_id == 11}-->
   <!---303ZT通常---->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/303zt/img001.jpg" width="100%" alt=""></li>
                    <li class="item2"><img src="/thumb_change/img/303zt/img002.jpg" width="100%" alt=""></li>
                    <li class="item3"><img src="/thumb_change/img/303zt/img003.jpg" width="100%" alt=""></li>
                    <li class="item4"><img src="/thumb_change/img/303zt/img004.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb">
                    <li class="thumb1"><img src="/thumb_change/img/303zt/img001.jpg" width="100%" alt=""></li>
                    <li class="thumb2"><img src="/thumb_change/img/303zt/img002.jpg" width="100%" alt=""></li>
                    <li class="thumb3"><img src="/thumb_change/img/303zt/img003.jpg" width="100%" alt=""></li>
                    <li class="thumb4"><img src="/thumb_change/img/303zt/img004.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 7}-->
  <!---au HWD11通常--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/hwd11/img001.jpg" width="100%" alt=""></li>
                    <li class="item2"><img src="/thumb_change/img/hwd11/img002.jpg" width="100%" alt=""></li>
                    <li class="item3"><img src="/thumb_change/img/hwd11/img003.jpg" width="100%" alt=""></li>
                    <li class="item4"><img src="/thumb_change/img/hwd11/img004.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb">
                    <li class="thumb1"><img src="/thumb_change/img/hwd11/img001.jpg" width="100%" alt=""></li>
                    <li class="thumb2"><img src="/thumb_change/img/hwd11/img002.jpg" width="100%" alt=""></li>
                    <li class="thumb3"><img src="/thumb_change/img/hwd11/img003.jpg" width="100%" alt=""></li>
                    <li class="thumb4"><img src="/thumb_change/img/hwd11/img004.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 15}-->
  <!---601HW延長--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/601hw/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb">
                    <li class="thumb1"><img src="/thumb_change/img/601hw/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 12}-->
  <!---303ZT延長--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/303zt/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb">
                    <li class="thumb1"><img src="/thumb_change/img/303zt/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 10}-->
  <!---HWD11延長--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/hwd11/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb">
                    <li class="thumb1"><img src="/thumb_change/img/hwd11/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 8}-->
  <!---GL06P延長--->
             <div class="content">
                <ul class="main">
                    <li class="item1"><img src="/thumb_change/img/ym/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
                <ul class="thumb">
                    <li class="thumb1"><img src="/thumb_change/img/ym/img001-ex.jpg" width="100%" alt=""></li>
                </ul>
             </div>
  <!--上記商品以外の場合-->
  <!--{else}-->
            <!--{assign var=key value="main_image"}-->
            <li id="mainImage0" style="list-style:none;">
            <!--{* 画像の縦横倍率を算出 *}-->
            <!--{assign var=detail_image_size value=200}-->
            <!--{assign var=main_image_factor value=`$arrFile[$key].width/$detail_image_size`}-->
            <!--{if $arrProduct.main_large_image|strlen >= 1}-->    
            <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct.main_image|h}-->" alt="<!--{$arrProduct.name|h}-->" width="100%" />
            <!--{else}-->
            <img style="display:none;" src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct.main_image|h}-->" alt="<!--{$arrProduct.name|h}-->" width="100%" />
            <!--{/if}-->
  <!--{/if}-->
<!--{/if}-->
        </section> 
        
    <section id="detailarea">

 <!--{if $arrRelativeCat.0.0.category_id == 12}-->
<style>
.ex_limit30 {
    border: 2px solid #B59100;
    border-radius: 13px;
    padding: 9px;
    font-size: 14px;
    color: #f60;
    line-height: 17px;
    background-color: #fefff4;
    margin-bottom: 20px;
}
</style>
<div class="ex_limit30">The communication volume for SoftBank 303zt was changed to 30GB/month from the beginning of September 2016.</div>
<!--{/if}-->

        <!--★詳細メインコメント★-->
<!--{if count($arrRelativeCat) > 0}-->
<!--{if $arrRelativeCat.0.0.category_id == 1}-->
<!--★商品説明 WiMAX★-->
<!--{elseif $arrRelativeCat.0.0.category_id == 2}-->
    <!--★商品説明 Y!mobile★-->
<!--{elseif $arrRelativeCat.0.0.category_id == 7}-->
   <!--★商品説明 au★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Communication speed</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Download maximum speed</td>
    <td>75Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Upload maximum speed</td>
    <td>25Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Battery</td>
    </tr>
    <tr>
      <td colspan="2">Real operating time : 5 - 6 hours</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Communication volume</td>
      </tr>
    <tr>
      <td colspan="2">100GB/month
        <p class="attention">If large amount of data is consumed in a short period of time, the data transfer speed can be slow down in the evening.</p>
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
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 14}-->
   <!--★商品説明 601HW★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Communication speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Download maximum speed</td>
      <td>612Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Upload maximum speed</td>
      <td>37.5Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Battery</td>
    </tr>
    <tr>
      <td colspan="2">Real operating time : 4 - 5 hours</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Communication volume</td>
    </tr>
    <tr>
      <td colspan="2">Large capacity (20GB／month）
        <!--<p class="attention">The person who start renting in the middle of month receive a router which have 15GB and more left.</p>-->
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>SoftBank 601HW If monthly data usage exceeds 20GB, the data transfer speed can be slow down. <br>
There is no extra charge for exceeding the data plan. <br>
(601HW routers show the data usage on the screen.)<br>
<br>
Data transfer speeds will recover the following calendar month. <br>
However, if you would like faster speeds, please place an order for another device until the end of the month.<br>
<br>
[Data Traffic Guarantee] Even if you start renting our products in the middle of the month, the routers are guaranteed to have at least 15GB of data left till the end of the month. <br>
You can use up your data plan with short-term rental plan such as 2 Days Rental.</div>
        </ul>
        </li>
        </ul>
      </td>
    </tr>
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 11}-->
   <!--★商品説明 SoftBank★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Communication speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Download maximum speed</td>
      <td>187.5Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Upload maximum speed</td>
      <td>37.5Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Battery</td>
    </tr>
    <tr>
      <td colspan="2">Real operating time : 4 - 5 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Communication volume</td>
    </tr>
    <tr>
      <td colspan="2">Large capacity (30GB／month）
        <!--<p class="attention">The person who start renting in the middle of month receive a router which have 20GB and more left.</p-->
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
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 8}-->
  <!--★商品説明 Y!mobile延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
      <td colspan="2" class="title">Communication speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Download maximum speed</td>
      <td>75Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Upload maximum speed</td>
      <td>40Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Battery</td>
      </tr>
    <tr>
      <td colspan="2">Real operating time : 3 - 4 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Communication volume</td>
      </tr>
    <tr>
      <td colspan="2">Usage in excess of 10GB is subject to limitation of communication speed. 
        <p class="attention">Speed limit is not implemented shortly after over 10GB and there is no additional charge by excess of communication volume.</p></td>
    </tr>
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 9}-->
  <!--★商品説明 WiMAX延長★-->
<!--{elseif $arrRelativeCat.0.0.category_id == 10}-->
  <!--★商品説明 au延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Communication speed</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Download maximum speed</td>
    <td>75Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Upload maximum speed</td>
    <td>25Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Battery</td>
    </tr>
    <tr>
      <td colspan="2">Real operating time : 5 - 6 hours</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Communication volume</td>
      </tr>
    <tr>
      <td colspan="2">100GB/month
        <p class="attention">If large amount of data is consumed in a short period of time, the data transfer speed can be slow down in the evening.</p>
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
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 15}-->
  <!--★商品説明 601HW延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Communication speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Download maximum speed</td>
      <td>612Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Upload maximum speed</td>
      <td>37.5Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Battery</td>
    </tr>
    <tr>
      <td colspan="2">Real operating time : 4 - 5 hours</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Communication volume</td>
    </tr>
    <tr>
      <td colspan="2">Large capacity (20GB／month）
        <!--<p class="attention">The person who start renting in the middle of month receive a router which have 15GB and more left.</p>-->
        <ul>
        <li>
        <div class="main_ac_menu">
        <p class="btn_text">[ Read More ]</p>
        </div>
        <ul class="sub_ac_menu">
        <div>SoftBank 601HW If monthly data usage exceeds 20GB, the data transfer speed can be slow down. <br>
There is no extra charge for exceeding the data plan. <br>
(601HW routers show the data usage on the screen.)<br>
<br>
Data transfer speeds will recover the following calendar month. <br>
However, if you would like faster speeds, please place an order for another device until the end of the month.<br>
<br>
[Data Traffic Guarantee] Even if you start renting our products in the middle of the month, the routers are guaranteed to have at least 15GB of data left till the end of the month. <br>
You can use up your data plan with short-term rental plan such as 2 Days Rental.</div>
        </ul>
        </li>
        </ul>
      </td>
      </tr>
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 12}-->
  <!--★商品説明 SoftBank延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Communication speed</td>
      </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Download maximum speed</td>
      <td>187.5Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td style="border-right:1px solid #ccc;">Upload maximum speed</td>
      <td>37.5Mbps (theoretical figure)</td>
    </tr>
    <tr>
      <td colspan="2" class="title">Battery</td>
    </tr>
    <tr>
      <td colspan="2">Real operating time : 4 - 5 hours</td>
      </tr>
    <tr>
      <td colspan="2" class="title">Communication volume</td>
    </tr>
    <tr>
      <td colspan="2">Large capacity (30GB／month）
        <!--<p class="attention">The person who start renting in the middle of month receive a router which have 20GB and more left.</p-->
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
  </tbody>
</table>
   </div>
 <!--上記以外-->
<!--{else}-->
<p class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></p>
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
        <form name="form1" id="form1" method="post" action="<!--{$smarty.const.ROOT_URLPATH}-->products/detail.php">
            <div id="detailrightblock">
                <!--▼商品ステータス-->
                <!--{assign var=ps value=$productStatus[$tpl_product_id]}-->
                <!--{if count($ps) > 0}-->
                    <ul class="status_icon">
                    <!--{foreach from=$ps item=status}-->
                        <li><!--{$arrSTATUS[$status]}--></li>
                    <!--{/foreach}-->
                    </ul>
                <!--{/if}-->
                <!--▲商品ステータス-->

                <div class="product_detail">

                    <!--★商品名★-->
                    <h3 class="product_name"><!--{$arrProduct.name|h}--></h3>

                    <p class="product_code" style="display:none;">
                        <span class="mini">Item code：</span>

                        <span id="product_code_default">
                            <!--{if $arrProduct.product_code_min == $arrProduct.product_code_max}-->
                                <!--{$arrProduct.product_code_min|h}-->
                            <!--{else}-->
                                <!--{$arrProduct.product_code_min|h}-->～<!--{$arrProduct.product_code_max|h}-->
                            <!--{/if}-->
                        </span><span id="product_code_dynamic"></span>
                    </p>

                    <!--★関連カテゴリ★-->
                    <!--{if false}-->
                    <p class="relative_cat"><span class="mini">Category：</span>
                        <!--{section name=r loop=$arrRelativeCat}-->
                            <!--{section name=s loop=$arrRelativeCat[r]}-->
                                <a rel="external" href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$arrRelativeCat[r][s].category_id}-->"><!--{$arrRelativeCat[r][s].category_name}--></a>
                                <!--{if !$smarty.section.s.last}--><!--{$smarty.const.SEPA_CATNAVI}--><!--{/if}-->
                            <!--{/section}--><br />
                        <!--{/section}-->
                    </p>
                    <!--{/if}-->
                    <!--★通常価格★-->
                    <!--{if false}-->
                    <!--{if $arrProduct.price01_max_inctax > 0}-->
                        <p class="normal_price">
                            <span class="mini"><!--{$smarty.const.NORMAL_PRICE_TITLE}-->(tax incl)：</span>
                            ￥<span id="price01_default">
                                <!--{if $arrProduct.price01_min_inctax == $arrProduct.price01_max_inctax}-->
                                    <!--{$arrProduct.price01_min_inctax|number_format}-->
                                <!--{else}-->
                                    <!--{$arrProduct.price01_min_inctax|number_format}-->～<!--{$arrProduct.price01_max_inctax|number_format}-->
                                <!--{/if}--></span>
                            <span id="price01_dynamic"></span>
                        </p>
                    <!--{/if}-->
                    <!--{/if}-->

                    <!--★販売価格★-->
                    <!--{if false}-->
                    <p class="sale_price">
                        <span class="mini"><!--{$smarty.const.SALE_PRICE_TITLE}-->(tax incl)：</span>
                        <span class="price"><span id="price02_default">
                            <!--{if $arrProduct.price02_min_inctax == $arrProduct.price02_max_inctax}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->
                            <!--{else}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->～<!--{$arrProduct.price02_max_inctax|number_format}-->
                            <!--{/if}-->
                        </span><span id="price02_dynamic"></span></span> JPY
                    </p>
                    <!--{/if}-->
                    <!----規格の価格反映の挙動対応として通常価格を固定で表示------>
                     <!--{if $arrProduct.price01_max_inctax > 0}-->
                        <p class="normal_price">
                            <span class="mini">Price(tax incl)：</span>
                            <span class="price">
                            <span id="price01_default">
                                <!--{if $arrProduct.price01_min_inctax == $arrProduct.price01_max_inctax}-->
                                    <!--{$arrProduct.price01_min_inctax|number_format}-->
                                <!--{else}-->
                                    <!--{$arrProduct.price01_min_inctax|number_format}-->
                                <!--{/if}--></span>
                            <span id="price01_dynamic"></span></span> JPY
                        </p>
                    <!--{/if}-->
                    <!----／規格の価格反映の挙動対応として通常価格を固定で表示------>

                    <!--★ポイント★-->
                    <!--{if $smarty.const.USE_POINT !== false}-->
                        <p class="sale_price"><span class="mini">Point：</span><span id="point_default">
                            <!--{if $arrProduct.price02_min == $arrProduct.price02_max}-->
                                <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate:$smarty.const.POINT_RULE:$arrProduct.product_id|number_format}-->
                            <!--{else}-->
                                <!--{if $arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate:$smarty.const.POINT_RULE:$arrProduct.product_id == $arrProduct.price02_max|sfPrePoint:$arrProduct.point_rate:$smarty.const.POINT_RULE:$arrProduct.product_id}-->
                                    <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate:$smarty.const.POINT_RULE:$arrProduct.product_id|number_format}-->
                                <!--{else}-->
                                    <!--{$arrProduct.price02_min|sfPrePoint:$arrProduct.point_rate:$smarty.const.POINT_RULE:$arrProduct.product_id|number_format}-->～<!--{$arrProduct.price02_max|sfPrePoint:$arrProduct.point_rate:$smarty.const.POINT_RULE:$arrProduct.product_id|number_format}-->
                                <!--{/if}-->
                            <!--{/if}-->
                            </span><span id="point_dynamic"></span>Pt
                        </p>
                    <!--{/if}-->

<!--▼安心保障サービス-->
<style type="text/css">
.warranty {
	display:none;
} 
</style>                       
    <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.0.0.category_id == 1}-->
    <!--★安心保障サービス★-->
<p class="warranty">
        <span class="mini">Insurance / repair service：</span>
        <input type="radio" name="warranty" id="warranty_in" value="3"><label for="warranty_in">Sign up (+￥540)</label>
        <input type="radio" name="warranty" id="warranty_out" value="3"><label for="warranty_out">Not sign up (+￥0)</label>
        <span id="id_war" class="nodisp attention">※ Please select either one</span>
</p>
  <!--{elseif $arrRelativeCat.0.0.category_id == 2}-->
    <!--★安心保障サービス★-->
<p class="warranty">
        <span class="mini">Insurance / repair service：</span>
        <input type="radio" name="warranty" id="warranty_in" value="3"><label for="warranty_in">Sign up (+￥540)</label>
        <input type="radio" name="warranty" id="warranty_out" value="3"><label for="warranty_out">Not sign up (+￥0)</label>
        <span id="id_war" class="nodisp attention">※ Please select either one</span>
</p>
  <!--{elseif $arrRelativeCat.0.0.category_id == 7}-->
   <!--★安心保障サービス★-->
<p class="warranty">
        <span class="mini">Insurance / repair service：</span>
        <input type="radio" name="warranty" id="warranty_in" value="3"><label for="warranty_in">Sign up (+￥540)</label>
        <input type="radio" name="warranty" id="warranty_out" value="3"><label for="warranty_out">Not sign up (+￥0)</label>
        <span id="id_war" class="nodisp attention">※ Please select either one</span>
</p>
  <!--{elseif $arrRelativeCat.0.0.category_id == 8}-->
  <!--★延長利用★-->
<p class="warranty">
        <span class="mini">Insurance / repair service：</span>
        <input type="radio" checked="checked" name="warranty" id="warranty_out" value="3"><label for="warranty_out">for Extension (￥0)</label>
        <span id="id_war" class="nodisp attention">※ Please select either one</span>
</p>
  <!--{elseif $arrRelativeCat.0.0.category_id == 9}-->
  <!--★延長利用★-->
<p class="warranty">
        <span class="mini">Insurance / repair service：</span>
        <input type="radio" checked="checked" name="warranty" id="warranty_out" value="3"><label for="warranty_out">for Extension (￥0)</label>
        <span id="id_war" class="nodisp attention">※ Please select either one</span>
</p>
  <!--{elseif $arrRelativeCat.0.0.category_id == 10}-->
  <!--★延長利用★-->
<p class="warranty">
        <span class="mini">Insurance / repair service：</span>
        <input type="radio" checked="checked" name="warranty" id="warranty_out" value="3"><label for="warranty_out">for Extension (￥0)</label>
        <span id="id_war" class="nodisp attention">※ Please select either one</span>
</p>
<!--{elseif $arrRelativeCat.0.0.category_id == 11}-->
   <!--★安心保障サービス★-->
<p class="warranty">
        <span class="mini">Insurance / repair service：</span>
        <input type="radio" name="warranty" id="warranty_in" value="3"><label for="warranty_in">Sign up (+￥540)</label>
        <input type="radio" name="warranty" id="warranty_out" value="3"><label for="warranty_out">Not sign up (+￥0)</label>
        <span id="id_war" class="nodisp attention">※ Please select either one</span>
</p>
<!--{elseif $arrRelativeCat.0.0.category_id == 12}-->
  <!--★延長利用★-->
<p class="warranty">
        <span class="mini">Insurance / repair service：</span>
        <input type="radio" checked="checked" name="warranty" id="warranty_out" value="3"><label for="warranty_out">for Extension (￥0)</label>
        <span id="id_war" class="nodisp attention">※ Please select either one</span>
</p>
  <!--{/if}-->
<!--{/if}-->
                    
                    

<style type="text/css">
<!--
.nodisp {
	display:none;
}
-->
</style> 
<!--{if false}-->
<script type="text/javascript" src="/shop/js/warranty.js"></script>
<!--{/if}-->
<script type="text/javascript">
$(function(){
	$(window).load(function(){
		$('#cat_id1').children(".ui-radio:first").remove();

		var classcategory_id1;
		var classcategory_id2;
<!--{if false}-->
<!--{php}-->if($_REQUEST['classcategory_id1']) { echo "classcategory_id1 = ".$_REQUEST['classcategory_id1'].";\n"; }<!--{/php}-->
<!--{php}-->if($_REQUEST['classcategory_id2']) { echo "classcategory_id2 = ".$_REQUEST['classcategory_id2'].";\n"; }<!--{/php}-->
<!--{/if}-->
		if(classcategory_id1 == 8) {
			$('input[name=classcategory_id1]').val(['8']);
		} else if(classcategory_id1 == 7) {
			$('input[name=classcategory_id1]').val(['7']);
		}
		if(classcategory_id2 == 10) {
			$('input[name=classcategory_id2]').val(['10']);
		} else if(classcategory_id2 == 9) {
			$('input[name=classcategory_id2]').val(['9']);
		}
	});
});

function checkBeforeSubmit() {
                var $form = $('#form1');
                var product_id = $form.find('input[name=product_id]').val();
                var $sele1 = $form.find('input[name=classcategory_id1]:checked');
                var $sele2 = $form.find('input[name=classcategory_id2]:checked');
				if($sele1.val() && $sele2.val()) {
	                eccube.checkStock($form, product_id, $sele1.val(), $sele2.val());
				}
				document.form1.submit();
}
</script>

                    <!--▼メーカー-->
                    <!--{if $arrProduct.maker_name|strlen >= 1}-->
                        <p class="maker">
                            <span class="mini">メーカー：</span><span>
                                <!--{$arrProduct.maker_name|h}-->
                            </span>
                        </p>
                    <!--{/if}-->
                    <!--▲メーカー-->

                    <!--▼メーカーURL-->
                    <!--{if $arrProduct.comment1|strlen >= 1}-->
                        <p class="sale_price">
                            <span class="mini">メーカーURL：</span><span>
                                <a rel="external" href="<!--{$arrProduct.comment1|h}-->" target="_blank">
                                    <!--{$arrProduct.comment1|h}--></a>
                            </span>
                        </p>
                    <!--{/if}-->
                    <!--▲メーカーURL-->
                </div><!-- /.product_detail -->

                <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
                <input type="hidden" name="mode" value="cart" />
                <input type="hidden" name="product_id" value="<!--{$tpl_product_id}-->" />
                <input type="hidden" name="product_class_id" value="<!--{$tpl_product_class_id}-->" id="product_class_id" />
                <input type="hidden" name="favorite_product_id" value="" />
                <!--▼買い物かご-->
                <!--{if $tpl_stock_find}-->

                    <!--{if $tpl_classcat_find1}-->
<style>
#cat_id1 .ui-radio:first-child {
	display:none;
}
</style>
                        <div class="cart_area">
                            <dl>
                                <!--▼規格1-->
                                <dt><!--{$tpl_class_name1|h}--></dt>
                                <dd id="cat_id1">
<!--{if false}-->
                                    <select name="classcategory_id1"
                                        style="<!--{$arrErr.classcategory_id1|sfGetErrorColor}-->"
                                        class="data-role-none">
                                        <!--{html_options options=$arrClassCat1 selected=$arrForm.classcategory_id1.value}-->
                                    </select>
                                    <!--{if $arrErr.classcategory_id1 != ""}-->
                                        <br /><span class="attention">※ <!--{$tpl_class_name1}-->を入力して下さい。</span>
                                    <!--{/if}-->
<!--{/if}-->

<!--{html_radios name=classcategory_id1 options=$arrClassCat1 selected=$arrForm[$classcategory_id1].value separator=''}-->
                                        <!--{if $arrErr.classcategory_id1 != ""}-->
                                        <br /><span class="attention">※ Please select either one</span>
                                        <!--{/if}-->

                                </dd>
                                <!--▲規格1-->

                                <!--{if $tpl_classcat_find2}-->
                                    <!--▼規格2-->
                                    <dt><!--{$tpl_class_name2|h}--></dt>
                                    <dd>
<!--{if false}-->
                                        <select name="classcategory_id2"
                                            style="<!--{$arrErr.classcategory_id2|sfGetErrorColor}-->"
                                            class="data-role-none">
                                        </select>
                                        <!--{if $arrErr.classcategory_id2 != ""}-->
                                            <br /><span class="attention">※ <!--{$tpl_class_name2}-->を入力して下さい。</span>
                                        <!--{/if}-->
<!--{/if}-->

<label><input type="radio" name="classcategory_id2" value="10" />None (+ 0 JPY)</label>
<label><input type="radio" name="classcategory_id2" value="9" />Yes (+ 50 JPY / Day)</label><br />
                                        <!--{if $arrErr.classcategory_id2 != ""}-->
                                        <span class="attention">※ Please select either one</span>
                                        <!--{/if}-->

                                    </dd>
                                    <!--▲規格2-->
                                <!--{/if}-->
                            </dl>
                        </div>
                    <!--{/if}-->
                    
<!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.0.0.category_id == 13}-->
  　
  <!--{else}-->
<div class="select_attention">*It's imperative that option is selected</div>
<style>
 .select_attention {
 font-size: 12px;
 color: #D10003;
 line-height: 22px;
 margin-top: 0;
 margin-left: 16px;
 margin-bottom: 18px;
 }
</style>
  <!--{/if}-->
<!--{/if}-->
                        
                    <div class="cartin_btn">
                        <dl>
                            <dt>quantity</dt>
                            <dd>
                                <input type="number" name="quantity" class="quantitybox" value="<!--{$arrForm.quantity.value|default:1|h}-->" max="<!--{9|str_repeat:$smarty.const.INT_LEN}-->" style="<!--{$arrErr.quantity|sfGetErrorColor}-->" />
                                <!--{if $arrErr.quantity != ""}-->
                                    <br /><span class="attention"><!--{$arrErr.quantity}--></span>
                                <!--{/if}-->
                            </dd>
                        </dl>

                        <!--★カートに入れる★-->
                        <div id="cartbtn_default">
<!--                            <a rel="external" href="javascript:void(document.form1.submit());" class="btn cartbtn_default">カートに入れる</a>-->
                            <a href="javascript:void(0)" onclick="javascript:checkBeforeSubmit();return false;" class="btn cartbtn_default">Add to cart</a>
                        </div>
                        <div class="attention" id="cartbtn_dynamic"></div>
                    </div>
                <!--{else}-->
                    <div class="cartin_btn">
                        <div class="attention">I'm sorry au KDDI HWD11 is out of stock now.<br>An order for au KDDI is suppose to be accepted from August 13th 2018 on Monday again. 
                <!--{/if}-->
                <!--▲買い物かご-->

                <!--{if $tpl_login}-->
                    <!--{if !$is_favorite}-->
                        <div class="btn_favorite">
                            <p><a rel="external" href="javascript:void(0);" onclick="eccube.addFavoriteSphone(<!--{$arrProduct.product_id|h}-->); return false;" class="btn_sub">Addition to favolite</a></p>
                        </div>
                    <!--{else}-->
                        <div class="btn_favorite">
                            <p>Registered favolite</p>
                        </div>
                    <!--{/if}-->
                <!--{/if}-->
            </div>
        </form>
        
<!------------商品コメント カート下---------------->

<!--{if count($arrRelativeCat) > 0}-->
<!--{if $arrRelativeCat.0.0.category_id == 1}-->
<!--★商品説明 WiMAX★-->
<!--{elseif $arrRelativeCat.0.0.category_id == 2}-->
    <!--★商品説明 Y!mobile★-->
<!--{elseif $arrRelativeCat.0.0.category_id == 7}-->
   <!--★商品説明 au★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Coverage area</td>
    </tr>
    <tr>
      <td colspan="2">available in a broad area of Japan／<a href="https://www.au.com/mobile/area/" target="_blank">Available coverage area</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide (English)</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_hwd11_en.pdf" target="_blank">Start Guide / HWD11</a></td>
    </tr>
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 14}-->
   <!--★商品説明 601HW★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Coverage area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=601hw" target="_blank">Available coverage area</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide (English)</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_601hw_en.pdf" target="_blank">Start Guide / 601HW</a></td>
    </tr>
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 11}-->
   <!--★商品説明 SoftBank★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Coverage area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=303zt" target="_blank">Available coverage area</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide (English)</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_303zt_en.pdf" target="_blank">Start Guide / 303ZT</a></td>
    </tr>
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 8}-->
  <!--★商品説明 Y!mobile延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Coverage area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.ymobile.jp/area/select2.html?service=4g17" target="_blank">Available coverage area</a></td>
      </tr>
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 9}-->
  <!--★商品説明 WiMAX延長★-->
<!--{elseif $arrRelativeCat.0.0.category_id == 10}-->
  <!--★商品説明 au延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Coverage area</td>
    </tr>
    <tr>
      <td colspan="2">available in a broad area of Japan／<a href="https://www.au.com/mobile/area/" target="_blank">Available coverage area</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide (English)</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_hwd11_en.pdf" target="_blank">Start Guide / HWD11</a></td>
    </tr>
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 15}-->
  <!--★商品説明 601HW延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Coverage area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=601hw" target="_blank">Available coverage area</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide (English)</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_601hw_en.pdf" target="_blank">Start Guide / 601HW</a></td>
    </tr>
  </tbody>
</table>
   </div>
<!--{elseif $arrRelativeCat.0.0.category_id == 12}-->
  <!--★商品説明 SoftBank延長★-->
   <div class="detail_item_info">
   <table width="100%" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" class="title">Coverage area</td>
      </tr>
    <tr>
      <td colspan="2"><a href="https://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=303zt" target="_blank">Available coverage area</a></td>
      </tr>
    <tr>
      <td colspan="2" class="title">Wi-Fi Setup Start Guide (English)</td>
    </tr>
    <tr>
      <td colspan="2"><a href="http://www.wifi-rental-store.jp/guide/guide_303zt_en.pdf" target="_blank">Start Guide / 303ZT</a></td>
    </tr>
  </tbody>
</table>
   </div>
<!--{/if}-->
<!--{/if}-->

    <div class="about_option">
       <p class="title">▼▼About Option▼▼</p>
       <p class="sub_title">Insurance / repair service</p>
       <p class="l_text">Insurance is for service which exempts you from paying customer's obligation fees at total or partial amount when malfunction or water leak are occured. It's ensured during the rental period by paying 540 yen as insurance.</p>
       <p class="text001">Customer's obligation fees under insurance service</p>
       <p class="text002">Malfunction / Water leak → Total exemption<br>
          Loss →　partial exemption</p>
       <div class="insurance_detail_link"><a href="javascript:window.open('/insurance.html','負担金額一覧表','width=500,height=800,scrollbars=yes');void(0);">Detailed fee list for loss and damage.</a></div>
          
       <p class="sub_title">Additional battery rental</p>
       <p class="l_text">Additional battery rental is service for renting 10,000mAh mobile battery. It's our recommendation to the person who use it a plenty of time away from home.</p>
       <p class="text002">Rental price is 50 yen per a day. <br>
                          ( In the case 1-month-rental is 750 yen)</p>
    </div>
        
        <div class="attention_box">
             <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.0.0.category_id == 11}-->
    <!--★SoftBank★-->
    <p class="attention_title">■About a communication volume</p>
    <p class="attention_text">In the case of usage over 30GB per a month, the internet connection is stopped by SoftBank carrier.<br>
※The usage data can be confirmed on its screen.<br>
※The internet connection is restored on the beginning of next month.There is no additional charge by overuse.<br>
<br>
■The person who start renting in the middle of month receive a router which have 20GB and more left. </p>
    <p class="attention_title">■Notes on communication use</p>
    <p class="attention_text">In the case it becomes known that the below illegal Internet connection, we submit individual information to supervisory authorities.<br><br>
・In the case of upload or download a data which infringes copyright against the low<br>
・In the case of knowingly infringement of copyright and illegality and then playing the video </p>
  <!--{/if}-->
<!--{/if}-->
        </div>
 <!-----------▼配送日時案内-------------->
 <section class="deli_info_section">

  <p class="l_comment">* The earliest delivery date and time differs by delivery area.</p>
  <p class="date_map"><img src="/img/detail/date_map_sp.png" width="100%" alt=""/></p>
  <p class="l_comment">* For airport pickup, please order in advance.<br>You can pickup anytime at the counter when you place your order by following deadlines.</p>
  <p class="date_map_list"><img src="/img/detail/date_map_list_sp.png" width="100%" alt=""/></p>
 </section>
 <!-----------▲配送日時案内-------------->
 <style>
.deli_info_section {
    margin: 0 auto;
    margin-top: 11px;
    border: 2px solid #ccc;
    border-radius: 11px;
    width: 98%;
    padding-bottom: 13px;
}
.deli_info_section .title_img{
	margin:0 auto;
	margin-bottom: 15px;
}
.deli_info_section .l_comment {
    font-size: 13px;
    line-height: 17px;
    margin: 0 auto;
    width: 90%;
    margin-top: 30px;
}
.deli_info_section .date_map {
    margin: 0 auto;
    width: 90%;
    margin-bottom: 20px;
    border-bottom: 1px solid #ccc;
    padding-bottom: 30px;
}
.deli_info_section .date_map_list{
	margin:0 auto;
	width:  90%;
	max-width: 900px;
	margin-top: 17px;
}
 </style>
</section>
    
  <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.0.0.category_id == 13}-->
    <!--★オプションカテゴリー表示リセット★-->
      <style>
	   .about_option{
		   display:none;
	   }
	   .deli_info_section {
		   display:none;
	   }
	  </style>
  <!--{/if}-->
<!--{/if}-->
    <!--詳細ここまで-->

    <!--▼サブエリアここから-->
    <!--{if $arrProduct.sub_title1 != ""}-->
        <div class="title_box_sub clearfix">
            <h2>商品情報</h2>
            <!--{assign var=ckey value="sub_comment`$smarty.section.cnt.index+1`"}-->
            <span class="b_expand"><img src="<!--{$TPL_URLPATH}-->img/button/btn_minus.png" onclick="fnSubToggle($('#sub_area'), this);" alt=""></span>
        </div>
        <div id="sub_area">
            <!--{section name=cnt loop=$smarty.const.PRODUCTSUB_MAX}-->
                <!--{assign var=key value="sub_title`$smarty.section.cnt.index+1`"}-->
                <!--{if $arrProduct[$key] != ""}-->
                    <!--▼サブ情報-->
                    <div class="subarea clearfix">
                        <!--★サブタイトル★-->
                        <h3><!--{$arrProduct[$key]|h}--></h3>

                        <!--★サブ画像★-->
                        <!--{assign var=sub_image_size value=80}-->
                        <!--{assign var=key value="sub_image`$smarty.section.cnt.index+1`"}-->
                        <!--{assign var=lkey value="sub_large_image`$smarty.section.cnt.index+1`"}-->
                        <!--{assign var=ckey value="sub_comment`$smarty.section.cnt.index+1`"}-->
                        <!--{assign var=sub_image_factor value=`$arrFile[$key].width/$sub_image_size`}-->
                        <!--{if $arrProduct[$key]|strlen >= 1}-->
                            <p class="subphotoimg">
                                <!--{if $arrProduct[$lkey]|strlen >= 1}-->
                                    <a rel="external" class="expansion" href="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct[$lkey]|h}-->" target="_blank">
                                        <img src="<!--{$arrFile[$key].filepath}-->" alt="<!--{$arrProduct.name|h}-->" width="<!--{$arrFile[$key].width/$sub_image_factor}-->" height="<!--{$arrFile[$key].height/$sub_image_factor}-->" />
                                    </a>
                                <!--{else}-->
                                    <img src="<!--{$arrFile[$key].filepath}-->" alt="<!--{$arrProduct.name|h}-->" width="<!--{$arrFile[$key].width/$sub_image_factor}-->" height="<!--{$arrFile[$key].height/$sub_image_factor}-->" />
                                <!--{/if}-->
                            </p>
                        <!--{/if}-->
                        <!--★サブテキスト★-->
                        <p class="subtext"><!--★サブテキスト★--><!--{$arrProduct[$ckey]|nl2br_html}--></p>
                    </div>
                <!--{/if}-->
            <!--{/section}-->
        </div>
    <!--{/if}-->
    <!--サブエリアここまで-->

    <!--この商品に対するお客様の声-->
    <!--<div class="title_box_sub clearfix">
        <h2>この商品に対するお客様の声</h2>
            <span class="b_expand"><img src="<!--{$TPL_URLPATH}-->img/button/btn_minus.png" onclick="fnReviewToggle($('#review_bloc_area'), this);" alt=""></span>
        </div>-->

        <div id="review_bloc_area">
            <div class="review_bloc clearfix">
            <!--<p>この商品に対するご感想をぜひお寄せください。</p>-->
            <div class="review_btn">
                <!--{if count($arrReview) < $smarty.const.REVIEW_REGIST_MAX}-->
                    <!--★新規コメントを書き込む★-->
                    <!--<a href="./review.php?product_id=<!--{$arrProduct.product_id}-->" target="_blank" class="btn_sub">新規コメントを書き込む</a>-->
                <!--{/if}-->
            </div>
            </div>

            <!--{if count($arrReview) > 0}-->
            <ul>
                <!--{section name=cnt loop=$arrReview}-->
                    <li>
                        <p class="voicetitle"><!--{$arrReview[cnt].title|h}--></p>
                        <p class="voicedate"><!--{$arrReview[cnt].create_date|sfDispDBDate:false}-->　投稿者：<!--{if $arrReview[cnt].reviewer_url}--><a href="<!--{$arrReview[cnt].reviewer_url}-->" target="_blank"><!--{$arrReview[cnt].reviewer_name|h}--></a><!--{else}--><!--{$arrReview[cnt].reviewer_name|h}--><!--{/if}--><br />おすすめレベル：<span class="recommend_level"><!--{assign var=level value=$arrReview[cnt].recommend_level}--><!--{$arrRECOMMEND[$level]|h}--></span></p>
                        <p class="voicecomment"><!--{$arrReview[cnt].comment|h|nl2br}--></p>
                    </li>
                <!--{/section}-->
            </ul>
            <!--{/if}-->
        </div>

    <!--お客様の声ここまで-->


    <!--▼その他おすすめ商品-->
    <!--{if $arrRecommend}-->
        <div class="title_box_sub clearfix">
            <h2>その他のオススメ商品</h2>
            <span class="b_expand"><img src="<!--{$TPL_URLPATH}-->img/button/btn_minus.png" onclick="fnWhoboughtToggle($('#whobought_area'), this);" alt=""></span>
        </div>

        <div id="whobought_area" class="mainImageInit">
            <ul>
                <!--{section name=cnt loop=$arrRecommend}-->
                    <!--{if $arrRecommend[cnt].product_id}-->
                        <li id="mainImage1<!--{$smarty.section.cnt.index}-->">
                            <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrRecommend[cnt].main_list_image|sfNoImageMainList|h}-->" style="max-width: 65px;max-height: 65px;" alt="!--{$arrRecommend[cnt].name|h}-->" />
                            <!--{assign var=price02_min value=`$arrRecommend[cnt].price02_min_inctax`}-->
                            <!--{assign var=price02_max value=`$arrRecommend[cnt].price02_max_inctax`}-->
                            <h3><a rel="external" href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrRecommend[cnt].product_id|u}-->"><!--{$arrRecommend[cnt].name|h}--></a></h3>
                            <p class="sale_price"><span class="price">
                                <!--{if $price02_min == $price02_max}-->
                                    <!--{$price02_min|number_format}-->
                                <!--{else}-->
                                    <!--{$price02_min|number_format}-->～<!--{$price02_max|number_format}-->
                                <!--{/if}-->
                                円</span>
                            </p>
                        </li>
                    <!--{/if}-->
                <!--{/section}-->
            </ul>
        </div>
    <!--{/if}-->
    <!--▲その他おすすめ商品-->

    <div class="btn_area">
        <p><a href="javascript:void(0);" class="btn_more" data-rel="back">Return</a></p>
    </div>
</section>

<!--{include file= 'frontparts/search_area.tpl'}-->

