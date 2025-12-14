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
<link href="/css/detail_page.css" rel="stylesheet" type="text/css" />
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

<div id="undercolumn">
    <form name="form1" id="form1" method="post" action="?">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <div id="detailarea" class="clearfix">
            <div id="detailphotobloc">
                <div class="photo">
                    <!--{assign var=key value="main_image"}-->
                    <!--★画像★-->
                    <!--{if $arrProduct.main_large_image|strlen >= 1}-->
                        <a
                            href="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct.main_large_image|h}-->"
                            class="expansion"
                            target="_blank"
                        >
                    <!--{/if}-->
                        <img src="<!--{$arrFile[$key].filepath|h}-->" width="<!--{$arrFile[$key].width}-->" height="<!--{$arrFile[$key].height}-->" alt="<!--{$arrProduct.name|h}-->" class="picture" />
                    <!--{if $arrProduct.main_large_image|strlen >= 1}-->
                        </a>
                    <!--{/if}-->
                </div>
                <!--{if $arrProduct.main_large_image|strlen >= 1}-->
                    <span class="mini">
                            <!--★拡大する★-->
                            <a href="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct.main_large_image|h}-->" class="expansion" target="_blank"><!--画像を拡大する--></a>
                    </span>
                <!--{/if}-->
                <!--<div class="spec_area">
                  <p class="spec_img"><img src="../../../../../../img/detail/au_spec.jpg" width="383" height="336" alt=""/></p>
                </div>-->
            </div>

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

                <!--★商品名★-->
                <h2><!--{$arrProduct.name|h}--></h2>
 <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.0.0.category_id == 1}-->
    <!--★商品説明 WiMAX★-->
<div class="detail_text001">
       <p>
       <span class="bold">【Rental model】</span><br>
              Y!mobile Pocket Wi-Fi GL06P (LTE-compliant)<br>
       <span class="bold">【Communication speed】</span><br>
              Download maximum speed 75Mbps/ Upload maximum speed　25Mbps (theoretical figure)<br>
       <span class="bold">【Coverage area】</span>　<a href="http://www.ymobile.jp/area/select2.html?service=4g17" target="_blank">Available coverage area</a><br>
       <span class="bold">【Battery】</span><br>
              Real operating time : 3 - 4 hours<br>
       <span class="bold">【Communication volume】</span><br>Usage in excess of 10GB is subject to limitation of communication speed. 
               <!--★詳細メインコメント★-->
       </p>
       <div class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></div>
</div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 2}-->
    <!--★商品説明 Y!mobile★-->
<div class="detail_text001">
       <p>
       <span class="bold">【Rental model】</span><br>
              Y!mobile Pocket Wi-Fi GL06P (LTE-compliant)<br>
       <span class="bold">【Communication speed】</span><br>
              Download maximum speed 75Mbps/ Upload maximum speed　25Mbps (theoretical figure)<br>
       <span class="bold">【Coverage area】</span>　<a href="http://www.ymobile.jp/area/select2.html?service=4g17" target="_blank">Available coverage area</a><br>
       <span class="bold">【Battery】</span><br>
              Real operating time : 3 - 4 hours<br>
       <span class="bold">【Communication volume】</span><br>Usage in excess of 10GB is subject to limitation of communication speed. <span class="attention">※Speed limit is not implemented shortly after over 10GB and there is no additional charge by excess of communication volume.</span>
               <!--★詳細メインコメント★-->
       </p>
       <div class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></div>
</div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 7}-->
   <!--★商品説明 au★-->
<div class="detail_text001">
       <p>
       <span class="bold">【Rental model】</span><br>
              au KDDI HWD11 (LTE-compliant)<br>
       <span class="bold">【Communication speed】</span><br>
              Download maximum speed 75Mbps/ Upload maximum speed　40Mbps (theoretical figure)<br>
       <span class="bold">【Coverage area】</span>available in a broad area of Japan　<a href="http://www.au.kddi.com/mobile/area/" target="_blank">Available coverage area</a><br>
       <span class="bold">【Battery】</span><br>
              Real operating time : 5 - 6 hours<br>
       <span class="bold">【Communication volume】</span>No limitation<br><span class="attention">※In the case a large amount of data communication is used in a short period of time, communication restriction might be implemented temporarily. </span>
               <!--★詳細メインコメント★-->
       </p>
       <div class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></div>
</div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 11}-->
   <!--★商品説明 SoftBank★-->
<div class="detail_text001">
       <p>
       <span class="bold">【Rental model】</span><br>
              SoftBank 303ZT<br>
       <span class="bold">【Communication speed】</span><br>
              Download maximum speed 182.5Mbps/ Upload maximum speed　40Mbps (theoretical figure)<br>
       <span class="bold">【Coverage area】</span>　<a href="http://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=303zt" target="_blank">Available coverage area</a><br>
       <span class="bold">【Battery】</span><br>
              Real operating time : 4 - 5 hours<br>
       <span class="bold">【Communication volume】</span>No limitation (basically）<br><span class="attention">Basically, the router is available with no limitation. But the case a large amount of data communication is used such as an usage of 5 or more GB per a day, it may implement a communication restriction.</span>
               <!--★詳細メインコメント★-->
       </p>
       <div class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></div>
</div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 8}-->
  <!--★商品説明 Y!mobile延長★-->
<div class="detail_text001">
       <p>
       <span class="bold">【Rental model】</span><br>
              Y!mobile Pocket Wi-Fi GL06P (LTE-compliant)<br>
       <span class="bold">【Communication speed】</span><br>
              Download maximum speed 75Mbps/ Upload maximum speed　25Mbps (theoretical figure)<br>
       <span class="bold">【Coverage area】</span>　<a href="http://www.ymobile.jp/area/select2.html?service=4g17" target="_blank">Available coverage area</a><br>
       <span class="bold">【Battery】</span><br>
              Real operating time : 3 - 4 hours<br>
       <span class="bold">【Communication volume】</span><br>Usage in excess of 10GB is subject to limitation of communication speed. <span class="attention">※Speed limit is not implemented shortly after over 10GB and there is no additional charge by excess of communication volume.</span>
               <!--★詳細メインコメント★-->
       </p>
       <div class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></div>
</div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 9}-->
  <!--★商品説明 WiMAX延長★-->
<div class="detail_text001">
       <p>
       <span class="bold">【Rental model】</span><br>
              Y!mobile Pocket Wi-Fi GL06P (LTE-compliant)<br>
       <span class="bold">【Communication speed】</span><br>
              Download maximum speed 75Mbps/ Upload maximum speed　25Mbps (theoretical figure)<br>
       <span class="bold">【Coverage area】</span>　<a href="http://www.ymobile.jp/area/select2.html?service=4g17" target="_blank">Available coverage area</a><br>
       <span class="bold">【Battery】</span><br>
              Real operating time : 3 - 4 hours<br>
       <span class="bold">【Communication volume】</span><br>Usage in excess of 10GB is subject to limitation of communication speed. 
               <!--★詳細メインコメント★-->
       </p>
       <div class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></div>
</div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 10}-->
  <!--★商品説明 au延長★-->
<div class="detail_text001">
       <p>
       <span class="bold">【Rental model】</span><br>
              au KDDI HWD11 (LTE-compliant)<br>
       <span class="bold">【Communication speed】</span><br>
              Download maximum speed 75Mbps/ Upload maximum speed　40Mbps (theoretical figure)<br>
       <span class="bold">【Coverage area】</span>available in a broad area of Japan　<a href="http://www.au.kddi.com/mobile/area/" target="_blank">Available coverage area</a><br>
       <span class="bold">【Battery】</span><br>
              Real operating time : 5 - 6 hours<br>
       <span class="bold">【Communication volume】</span>No limitation<br><span class="attention">※In the case a large amount of data communication is used in a short period of time, communication restriction might be implemented temporarily. </span>
               <!--★詳細メインコメント★-->
       </p>
       <div class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></div>
</div>
    <!--{elseif $arrRelativeCat.0.0.category_id == 12}-->
  <!--★商品説明 SoftBank延長★-->
<div class="detail_text001">
       <p>
       <span class="bold">【Rental model】</span><br>
              SoftBank 303ZT<br>
       <span class="bold">【Communication speed】</span><br>
              Download maximum speed 182.5Mbps/ Upload maximum speed　40Mbps (theoretical figure)<br>
       <span class="bold">【Coverage area】</span>　<a href="http://www.softbank.jp/mobile/network/area/map/?pref=13&device_type=303zt" target="_blank">Available coverage area</a><br>
       <span class="bold">【Battery】</span><br>
              Real operating time : 4 - 5 hours<br>
       <span class="bold">【Communication volume】</span>No limitation (basically）<br><span class="attention">Basically, the router is available with no limitation. But the case a large amount of data communication is used such as an usage of 5 or more GB per a day, it may implement a communication restriction.</span>
               <!--★詳細メインコメント★-->
       </p>
       <div class="main_comment"><!--{$arrProduct.main_comment|nl2br_html}--></div>
</div>
  <!--{/if}-->
<!--{/if}-->

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
 
 <!-----新作成ブロック----->
<!--▼サブ説明エリア_左--> 
<div class="detail_text_box">
   <div class="box001">
      <p><img src="/img/detail/title_img_insurance002.png" alt="安心保障サービスについて"></p>
      <p class="text001">Insurance covers a malfunction for customer's fault, water leak and so on. The content of insurance is as below. </p>
   </div>
   <div>
     <table width="100%" class="detail_table">
  <tbody>
    <tr>
      <td colspan="2"></td>
      <td width="161" class="futan">Obligation fees for customers without insurance</td>
      <td width="124" class="l_r_t">Obligation fees for customers with insurance</td>
    </tr>
    <tr>
      <td width="108" rowspan="3" class="trouble">Malfunction, water leak</td>
      <td width="97">Wi-Fi main unit</td>
      <td>Repair charge<br>(up to 34,560 yen)</td>
      <td class="l_r">0yen</td>
    </tr>
    <tr>
      <td>AC adapter</td>
      <td>Repair charge<br>(up to 2,916 yen)</td>
      <td class="l_r">0yen</td>
    </tr>
    <tr>
      <td>USB cord</td>
      <td>Repair charge<br>(up to 2,138 yen)</td>
      <td bgcolor="#D0FFD4" class="l_r">0yen</td>
    </tr>
    <tr>
      <td rowspan="3" class="trouble">Loss</td>
      <td>Wi-Fi main unit</td>
      <td>34,560yen</td>
      <td class="l_r">10,000yen</td>
    </tr>
    <tr>
      <td>AC adapter</td>
      <td>2,916yen</td>
      <td class="l_r">490yen</td>
    </tr>
    <tr>
      <td>USB cord</td>
      <td>2,138yen</td>
      <td class="l_r_b">400yen</td>
    </tr>
  </tbody>
</table>
   </div>
  <div class="box002">
     <p class="text001">Insurance is acceptable option when you order, you can not sign up with insurance after rental starts.In the case of extension on rental period, the content of insurance is continued.</p>
     <p class="text002">※In the case of spontaneous failure, we send an alternative router regardless of whether with or without insurance.</p>
   </div>
 <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.0.0.category_id == 1}-->
    <!--★通信制限について WiMAX★-->
   <div class="box003">
   </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 2}-->
    <!--★通信制限について Y!mobile★-->
   <div class="box003">
     <p class="title_img"><img src="/img/detail/title_img_limit002.png" alt="通信制限について"></p>
     <p class="text001">Usage in excess of 10GB is subject to limitation of communication speed. <br>
<br>
※Speed limit is not implemented shortly after over 10GB and there is no additional charge by excess of communication volume.</p>
   </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 7}-->
  <!--★通信制限について au★-->
   <div class="box003">
   </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 11}-->
   <!--★通信制限について SoftBank★-->
   <div class="box003">
     <p class="title_img"><img src="/img/detail/title_img_limit002.png" alt="通信制限について"></p>
     <p class="text001">Basically, the router is available with no limitation. But the case a large amount of data communication is used such as an usage of 5 or more GB per a day, it may implement a communication restliction.<br>
<br>
[Notes on communication use]<br>
In the case it becomes known that the below illegal Internet connection, we submit individual information to supervisory authorities.<br>
<br>
・In the case of upload or download a data which infringes copyright against the low<br>
・In the case of knowingly infringement of copyright and illegality and then playing the video</p>
   </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 8}-->
  <!--★通信制限について Y!mobile延長★-->
   <div class="box003">
     <p class="title_img"><img src="/img/detail/title_img_limit002.png" alt="通信制限について"></p>
     <p class="text001">Usage in excess of 10GB is subject to limitation of communication speed. <br>
<br>
※Speed limit is not implemented shortly after over 10GB and there is no additional charge by excess of communication volume.</p>
   </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 9}-->
  <!--★通信制限について WiMAX延長★-->
   <div class="box003">
   </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 10}-->
  <!--★通信制限について au延長★-->
   <div class="box003">
   </div>
    <!--{elseif $arrRelativeCat.0.0.category_id == 12}-->
  <!--★通信制限について SoftBank延長★-->
   <div class="box003">
     <p class="title_img"><img src="/img/detail/title_img_limit002.png" alt="通信制限について"></p>
     <p class="text001">Basically, the router is available with no limitation. But the case a large amount of data communication is used such as an usage of 5 or more GB per a day, it may implement a communication restliction.<br>
<br>
[Notes on communication use]<br>
In the case it becomes known that the below illegal Internet connection, we submit individual information to supervisory authorities.<br>
<br>
・In the case of upload or download a data which infringes copyright against the low<br>
・In the case of knowingly infringement of copyright and illegality and then playing the video</p>
   </div>
  <!--{/if}-->
<!--{/if}-->

</div><!--/detail_text_box-->

<div class="cart_box">
                <!--▼買い物かご-->
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

                <!--★販売価格★-->
                <dl class="sale_price">
                    <dt>Price(tax incl.)</dt>
                    <dd class="price">
                        ￥<span id="price02_default"><!--{strip}-->
                            <!--{if $arrProduct.price02_min_inctax == $arrProduct.price02_max_inctax}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->
                            <!--{else}-->
                                <!--{$arrProduct.price02_min_inctax|number_format}-->～<!--{$arrProduct.price02_max_inctax|number_format}-->
                            <!--{/if}-->
                        <!--{/strip}--></span><span id="price02_dynamic"></span>
                        
                    </dd>
                </dl>
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
                                        <select name="classcategory_id1" style="<!--{$arrErr.classcategory_id1|sfGetErrorColor}-->">
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
                                        <select name="classcategory_id2" style="<!--{$arrErr.classcategory_id2|sfGetErrorColor}-->">
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
                            <dt>quantity</dt>
                            <dd><input type="text" class="box60" name="quantity" value="<!--{$arrForm.quantity.value|default:1|h}-->" maxlength="<!--{$smarty.const.INT_LEN}-->" style="<!--{$arrErr.quantity|sfGetErrorColor}-->" />
                                <!--{if $arrErr.quantity != ""}-->
                                    <br /><span class="attention"><!--{$arrErr.quantity}--></span>
                                <!--{/if}-->
                            </dd>
                        </dl>
                        
 <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.0.0.category_id == 1}-->
    <!--★安心保障サービス★-->
    <div class="insurance_box">
     <dl class="warranty">
     <dt style="display:inline;">Insurance / repair service：</dt>
     <dd style="display:inline;"><br>
     <input type="radio" name="warranty" id="warranty_in" value="3"><label for="warranty_in">Sign up (+￥540)</label><br>
     <input type="radio" name="warranty" id="warranty_out" value="3"><label for="warranty_out">Not sign up (+￥0)</label>
			<br>
	<span id="id_war" class="nodisp attention">※ Please select either one</span>
     </dd>
     </dl>
     </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 2}-->
    <!--★安心保障サービス★-->
    <div class="insurance_box">
     <dl class="warranty">
     <dt style="display:inline;">Insurance / repair service：</dt>
     <dd style="display:inline;"><br>
     <input type="radio" name="warranty" id="warranty_in" value="3"><label for="warranty_in">Sign up (+￥540)</label><br>
     <input type="radio" name="warranty" id="warranty_out" value="3"><label for="warranty_out">Not sign up (+￥0)</label>
			<br>
	<span id="id_war" class="nodisp attention">※ Please select either one</span>
     </dd>
     </dl>
     </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 7}-->
   <!--★安心保障サービス★-->
   <div class="insurance_box">
     <dl class="warranty">
     <dt style="display:inline;">Insurance / repair service：</dt>
     <dd style="display:inline;"><br>
     <input type="radio" name="warranty" id="warranty_in" value="3"><label for="warranty_in">Sign up (+￥540)</label><br>
     <input type="radio" name="warranty" id="warranty_out" value="3"><label for="warranty_out">Not sign up (+￥0)</label>
			<br>
	<span id="id_war" class="nodisp attention">※ Please select either one</span>
     </dd>
     </dl>
     </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 8}-->
  <!--★延長利用★-->
       <div class="insurance_box">
       <dl class="warranty">
       <dt style="display:inline;">Insurance / repair service：</dt>
       <dd style="display:inline;"><br>
       <input type="radio" checked="checked" name="warranty" id="warranty_out" value="3"><label for="warranty_out">for Extension (￥0)</label><br>
	   <span id="id_war" class="nodisp attention">※ Please select either one</span>
       </dd>
       </dl>
       </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 9}-->
  <!--★延長利用★-->
       <div class="insurance_box">
       <dl class="warranty">
       <dt style="display:inline;">Insurance / repair service：</dt>
       <dd style="display:inline;"><br>
       <input type="radio" checked="checked" name="warranty" id="warranty_out" value="3"><label for="warranty_out">for Extension (￥0)</label><br>
	   <span id="id_war" class="nodisp attention">※ Please select either one</span>
       </dd>
       </dl>
       </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 10}-->
  <!--★延長利用★-->
       <div class="insurance_box">
       <dl class="warranty">
       <dt style="display:inline;">Insurance / repair service：</dt>
       <dd style="display:inline;"><br>
       <input type="radio" checked="checked" name="warranty" id="warranty_out" value="3"><label for="warranty_out">for Extension (￥0)</label><br>
	   <span id="id_war" class="nodisp attention">※ Please select either one</span>
       </dd>
       </dl>
       </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 11}-->
   <!--★安心保障サービス★-->
   <div class="insurance_box">
     <dl class="warranty">
     <dt style="display:inline;">Insurance / repair service：</dt>
     <dd style="display:inline;"><br>
     <input type="radio" name="warranty" id="warranty_in" value="3"><label for="warranty_in">Sign up (+￥540)</label><br>
     <input type="radio" name="warranty" id="warranty_out" value="3"><label for="warranty_out">Not sign up (+￥0)</label>
			<br>
	<span id="id_war" class="nodisp attention">※ Please select either one</span>
     </dd>
     </dl>
     </div>
    <!--{elseif $arrRelativeCat.0.0.category_id == 12}-->
  <!--★延長利用★-->
       <div class="insurance_box">
       <dl class="warranty">
       <dt style="display:inline;">Insurance / repair service：</dt>
       <dd style="display:inline;"><br>
       <input type="radio" checked="checked" name="warranty" id="warranty_out" value="3"><label for="warranty_out">for Extension (￥0)</label><br>
	   <span id="id_war" class="nodisp attention">※ Please select either one</span>
       </dd>
       </dl>
       </div>
  <!--{/if}-->
<!--{/if}-->

<style type="text/css">
<!--
.nodisp {
	display:none;
}
-->
</style> 

<script type="text/javascript" src="/shop/js/warranty.js"></script>

                        <div class="cartin">
                            <div class="cartin_btn">
                                <div id="cartbtn_default">
                                    <!--★カゴに入れる★-->
<!--                                    <a href="javascript:void(document.form1.submit())">-->
                                    <a href="javascript:void(0)" onclick="javascript:checkWarranty();return false;">
                                        <img class="hover_change_image" src="<!--{$TPL_URLPATH}-->img/button/btn_cartin.jpg" alt="カゴに入れる" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="attention" id="cartbtn_dynamic"></div>
                    <!--{else}-->
                        <div class="attention">We are sorry. auWiFi is now sold out.<br>
Please order Y!mobile or SoftBank if you are in hurry.</div>
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

     </div><!---/cart_box--->
    <!--▲買い物かご-->
    
 <!-----------▼スペックについて-------------->
  
 <!--{if count($arrRelativeCat) > 0}-->
  <!--{if $arrRelativeCat.0.0.category_id == 1}-->
    <!--★スペック WiMAX★-->
  <div class="spec_box">
  </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 2}-->
    <!--★スペック Y!mobile★-->
  <div class="spec_box">
     <p class="title_img"><img src="/img/detail/title_img_spec.png" alt="スペック"></p>
     <p class="spec_img"><img src="/img/detail/spec_ym.jpg" alt="スペック"></p>
  </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 7}-->
  <!--★スペック au★-->
  <div class="spec_box">
  </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 11}-->
   <!--★スペック SoftBank★-->
  <div class="spec_box">
     <p class="title_img"><img src="/img/detail/title_img_spec.png" alt="スペック"></p>
     <p class="spec_img"><img src="/img/detail/spec_sb.jpg" alt="スペック"></p>
  </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 8}-->
  <!--★スペック Y!mobile延長★-->
  <div class="spec_box">
     <p class="title_img"><img src="/img/detail/title_img_spec.png" alt="スペック"></p>
     <p class="spec_img"><img src="/img/detail/spec_ym.jpg" alt="スペック"></p>
  </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 9}-->
  <!--★スペック WiMAX延長★-->
   <div class="spec_box">
   </div>
  <!--{elseif $arrRelativeCat.0.0.category_id == 10}-->
  <!--★スペック au延長★-->
   <div class="spec_box">
   </div>
    <!--{elseif $arrRelativeCat.0.0.category_id == 12}-->
  <!--★スペック SoftBank延長★-->
  <div class="spec_box">
     <p class="title_img"><img src="/img/detail/title_img_spec.png" alt="スペック"></p>
     <p class="spec_img"><img src="/img/detail/spec_sb.jpg" alt="スペック"></p>
  </div>
  <!--{/if}-->
<!--{/if}-->
 <!-----------▲スペックについて-------------->
  
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

<!--{*  <!--この商品に対するお客様の声-->
    <div id="customervoice_area">
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
 *}-->

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