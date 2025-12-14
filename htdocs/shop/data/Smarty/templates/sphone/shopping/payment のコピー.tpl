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
    $(function() {
        if ($('input[name=deliv_id]:checked').val()
            || $('#deliv_id').val()) {
            showForm(true);
        } else {
            showForm(false);
        }
//        $('input[id^=deliv_]').click(function() {
        $(document).ready(function(){
            showForm(true);
            var data = {};
            data.mode = 'select_deliv';
//            data.deliv_id = $(this).val();
            data.deliv_id = $('input[name=deliv_id]:checked').val();
            data['<!--{$smarty.const.TRANSACTION_ID_NAME}-->'] = '<!--{$transactionid}-->';
            $.ajax({
                type : 'POST',
                url : location.pathname,
                data: data,
                cache : false,
                dataType : 'json',
                error : remoteException,
                success : function(data, dataType) {
                    if (data.error) {
                        remoteException();
                    } else {
                        // 支払い方法の行を生成
                        var payment = $('#payment');
                        payment.empty();
                        for (var i in data.arrPayment) {
                            // ラジオボタン
                            var radio = $('<input type="radio" />')
                                .attr('name', 'payment_id')
                                .attr('id', 'pay_' + i)
                                .val(data.arrPayment[i].payment_id);
                            // ラベル
                            var label = $('<label />')
                                .attr('for', 'pay_' + i)
                                .text(data.arrPayment[i].payment_method);
                            // 行
                            var li = $('<li />')
                                .append($('<td />')
                                .addClass('centertd')
                                .append(radio)
                                .append(label));

                            li.appendTo(payment);
                        }
                        // クレジットカードのチェック
                        $("input[name='payment_id']").val(['5']);

                        // お届け時間を生成
                        var deliv_time_id_select = $('select[id^=deliv_time_id]');
                        deliv_time_id_select.empty();
                        deliv_time_id_select.append($('<option />').text('指定なし').val(''));
                        for (var i in data.arrDelivTime) {
                            var option = $('<option />')
                                .val(i)
                                .text(data.arrDelivTime[i])
                                .appendTo(deliv_time_id_select);
                        }
                    }
                }
            });
        });

        /**
         * 通信エラー表示.
         */
        function remoteException(XMLHttpRequest, textStatus, errorThrown) {
            alert('通信中にエラーが発生しました。カート画面に移動します。');
            location.href = '<!--{$smarty.const.CART_URL}-->';
        }

        /**
         * 配送方法の選択状態により表示を切り替える
         */
        function showForm(show) {
            if (show) {
                $('#payment, div.delivdate, .select-msg').show();
                $('.non-select-msg').hide();
            } else {
                $('#payment, div.delivdate, .select-msg').hide();
                $('.non-select-msg').show();
            }
        }

        $('#etc')
            .css('font-size', '100%')
            .autoResizeTextAreaQ({
                'max_rows': 50,
                'extra_rows': 0
            });
    });
//]]></script>

<!--▼コンテンツここから -->
<section id="undercolumn">

    <h2 class="title"><!--{$tpl_title|h}--></h2>

    <form name="form1" id="form1" method="post" action="<!--{$smarty.const.ROOT_URLPATH}-->shopping/payment.php">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <input type="hidden" name="mode" value="confirm" />
        <input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->" />

        <!--★インフォメーション★-->
        <div class="information end">
            <!--<p>各項目を選択してください。</p>-->
        </div>

        <!--★配送方法の指定★-->
        <!--{assign var=key value="deliv_id"}-->
        <!--{if $is_single_deliv}-->
            <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" id="deliv_id" />
        <!--{else}-->
            <section class="pay_area">
                <h3 class="subtitle">Pickup Method</h3>
                <!--{if $arrErr[$key] != ""}-->
                    <p class="attention"><!--{$arrErr[$key]}--></p>
                <!--{/if}-->
                <ul>
                    <!--{section name=cnt loop=$arrDeliv}-->
                    <!--{if $smarty.session.pre_deliv_id == $arrDeliv[cnt].deliv_id}-->
                        <li>
                            <input type="radio" id="deliv_<!--{$smarty.section.cnt.iteration}-->" name="<!--{$key}-->"  value="<!--{$arrDeliv[cnt].deliv_id}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" <!--{$arrDeliv[cnt].deliv_id|sfGetChecked:$arrForm[$key].value}--> class="data-role-none" checked="checked" />
                            <label for="deliv_<!--{$smarty.section.cnt.iteration}-->"><!--{$arrDeliv[cnt].name|h}--><!--{if $arrDeliv[cnt].remark != ""}--><p><!--{$arrDeliv[cnt].remark|h}--></p><!--{/if}--></label>
                        </li>
                    <!--{/if}-->
                    <!--{/section}-->
                </ul>
            </section>
        <!--{/if}-->

        <!--★インフォメーション★-->
        <section class="pay_area">
            <h3 class="subtitle">Payment method</h3>
            <!--{assign var=key value="payment_id"}-->
            <!--{if $arrErr[$key] != ""}-->
                <p class="attention"><!--{$arrErr[$key]}--></p>
            <!--{/if}-->
            <p class="non-select-msg information">まずはじめに、配送方法を選択ください。</p>
            <ul id="payment">
                <!--{section name=cnt loop=$arrPayment}-->
                    <li>
                        <input type="radio" id="pay_<!--{$smarty.section.cnt.iteration}-->" name="<!--{$key}-->" value="<!--{$arrPayment[cnt].payment_id}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" <!--{$arrPayment[cnt].payment_id|sfGetChecked:$arrForm[$key].value}--> class="data-role-none" />
                        <label for="pay_<!--{$smarty.section.cnt.iteration}-->"><!--{$arrPayment[cnt].payment_method|h}--><!--{if $arrPayment[cnt].note != ""}--><!--{/if}--></label>
                        <!--{if $img_show}-->
                            <!--{if $arrPayment[cnt].payment_image != ""}-->
                                <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrPayment[cnt].payment_image}-->" />
                            <!--{/if}-->
                        <!--{/if}-->
                    </li>
                <!--{/section}-->
            </ul>
        </section>


        <!--★お届け時間の指定★-->
        <style>
		.select-msg{
			margin:0 auto;
			width:95%;
		}
		</style>
        <!--{if $cartKey != $smarty.const.PRODUCT_TYPE_DOWNLOAD}-->
            <section class="pay_area02">
<!--                <h3 class="subtitle">お届け時間の指定</h3>-->
        <!--{if $smarty.session.pre_deliv_id == 4}-->
                <h3 class="subtitle">Pickup Date</h3>
        <!--{elseif $smarty.session.pre_deliv_id == 5}-->
                <h3 class="subtitle">Start date for extension</h3>
        <!--{else}-->
                <h3 class="subtitle">Delivery Date / Time</h3>
        <!--{/if}-->
        <!--{if $smarty.session.pre_deliv_id == 4}-->
                <p class="select-msg">Please select Pickup date / time slot</p>
        <!--{elseif $smarty.session.pre_deliv_id == 5}-->
                <p class="select-msg">Please select your start date for extension</p>
        <!--{else}-->
                <p class="select-msg">Please select delivery date / time slot</p>
        <!--{/if}-->

                <div class="form_area">
                    <!--{foreach item=shippingItem name=shippingItem from=$arrShipping}-->
                        <!--{assign var=index value=$shippingItem.shipping_id}-->

                        <!--▼フォームボックスここから -->
                        <!--{if $is_multiple}-->
                            <div class="formBox"><!--{* FIXME *}-->
                                <div class="box_header">
                                    お届け先<!--{$smarty.foreach.shippingItem.iteration}-->
                                </div>
                                <div class="innerBox">
                                    <!--{$shippingItem.shipping_name01}--><!--{$shippingItem.shipping_name02}--><br />
                                    <span class="mini"><!--{$arrPref[$shippingItem.shipping_pref]}--><!--{$shippingItem.shipping_addr01}--><!--{$shippingItem.shipping_addr02}--></span>
                                </div>
                        <!--{else}-->
                            <div class="time_select"><!--{* FIXME *}-->
                        <!--{/if}-->

                            <div class="btn_area_btm">
                                <!--★お届け日★-->
                                <!--{assign var=key value="deliv_date`$index`"}-->
                                <span class="attention"><!--{$arrErr[$key]}--></span>
        <!--{if $smarty.session.pre_deliv_id == 4}-->
                    Pickup Date：
        <!--{elseif $smarty.session.pre_deliv_id == 5}-->
                    Start date for extension：
        <!--{else}-->
                    Delivery Date：
        <!--{/if}-->
<!--★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★-->
                           <!--{if $smarty.session.pre_deliv_id == 3}-->
		<!-■■■■■■■■■■■■■■■■■■■■■■■空港受取■■■■■■■■■■■■■■■■■■■■■■■-->
                        <select name="<!--{$key}-->" id="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->">
　　　　　　　　<option value="">Please select</option>
                            <!--お届け日の選択肢表示を変える場合は下の行のstart=nの値を変える。1:明日から表示、2:明後日から表示・・・-->
                            <!--{section name=cnt start=2  loop=90}-->
                            <!--{$smarty.section.cnt.index}-->
                            <!--{if ($smarty.session.pre_shipping_pref < 2) or ($smarty.session.pre_shipping_pref > 39)}-->
                            <!--{if (($smarty.section.cnt.start/$smarty.section.cnt.index) == 1) or ($smarty.section.cnt.index == 0)}-->
							<!--空港スキップ-->
                            <!--{elseif ($smarty.section.cnt.index-$smarty.section.cnt.start) == 1}-->
							<!--地方スキップ-->
                            <!--{elseif ($smarty.section.cnt.index-$smarty.section.cnt.start) == 2}-->
							<!--17時-->
                                <!--{if $smarty.now|date_format:'%H' < 17 }-->
                            <option label="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}-->" value="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%Y/%m/%d'}-->"><!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}--></option>
                                <!--{/if}-->
                            <!--{else}-->
                            <option label="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}-->" value="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%Y/%m/%d'}-->"><!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}--></option>
                            <!--{/if}-->
                            <!--{else}-->
                            <!--{if (($smarty.section.cnt.start/$smarty.section.cnt.index) == 1) or ($smarty.section.cnt.index == 0)}-->
							<!--空港スキップ-->
                            <!--{elseif ($smarty.section.cnt.index-$smarty.section.cnt.start) == 1}-->
							<!--17時-->
                                <!--{if $smarty.now|date_format:'%H' < 17 }-->
                            <option label="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}-->" value="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%Y/%m/%d'}-->"><!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}--></option>
                                <!--{/if}-->
                            <!--{else}-->
                            <option label="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}-->" value="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%Y/%m/%d'}-->"><!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}--></option>
                            <!--{/if}-->
                            <!--{/if}-->
                            <!--{/section}-->
                        </select>&nbsp;

                            <!--{elseif $smarty.session.pre_deliv_id == 1}-->
		<!--■■■■■■■■■■■■■■■■■■■■■■■国内配送■■■■■■■■■■■■■■■■■■■■■■■-->
                        <select name="<!--{$key}-->" id="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->">
                        <option value="">Please select</option>
                            <!--お届け日の選択肢表示を変える場合は下の行のstart=nの値を変える。1:明日から表示、2:明後日から表示・・・-->
                            <!--{section name=cnt start=2  loop=90}-->
                            <!--{$smarty.section.cnt.index}-->
                            <!--{if ($smarty.session.pre_shipping_pref < 2) or ($smarty.session.pre_shipping_pref > 39)}-->
                            <!--{if (($smarty.section.cnt.start/$smarty.section.cnt.index) == 1) or ($smarty.section.cnt.index == 0)}-->
							<!--地方スキップ-->
                            <!--{elseif ($smarty.section.cnt.index-$smarty.section.cnt.start) == 1}-->
							<!--17時-->
                                <!--{if $smarty.now|date_format:'%H' < 17 }-->
                            <option label="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}-->" value="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%Y/%m/%d'}-->"><!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}--></option>
                                <!--{/if}-->
                            <!--{else}-->
                            <option label="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}-->" value="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%Y/%m/%d'}-->"><!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}--></option>
                            <!--{/if}-->
                            <!--{else}-->
                            <!--{if (($smarty.section.cnt.start/$smarty.section.cnt.index) == 1) or ($smarty.section.cnt.index == 0)}-->
							<!--17時-->
                                <!--{if $smarty.now|date_format:'%H' < 17 }-->
                            <option label="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}-->" value="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%Y/%m/%d'}-->"><!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}--></option>
                                <!--{/if}-->
                            <!--{else}-->
                            <option label="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}-->" value="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%Y/%m/%d'}-->"><!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}--></option>
                            <!--{/if}-->
                            <!--{/if}-->
                            <!--{/section}-->
                        </select>&nbsp;

                            <!--{else}-->
		<!--●●●●●●●●●●●●●●●●●●●●●●●●店舗受取/延長利用●●●●●●●●●●●●●●●●●●●●●●●●-->
                        <select name="<!--{$key}-->" id="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->">
                        <option value="">Please select</option>
                            <!--お届け日の選択肢表示を変える場合は下の行のstart=nの値を変える。0:当日から表示、1:明日から表示、2:明後日から表示・・・-->
                            <!--{section name=cnt start=0  loop=90}-->
                            <!--{$smarty.section.cnt.index}-->
                            <!--{if (($smarty.section.cnt.start/$smarty.section.cnt.index) == 1) or ($smarty.section.cnt.index == 0)}-->
							<!--19時-->
                                <!--{if $smarty.now|date_format:'%H' < 19 }-->
                            <option label="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}-->" value="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%Y/%m/%d'}-->"><!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}--></option>
                                <!--{/if}-->
                            <!--{else}-->
                            <option label="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}-->" value="<!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%Y/%m/%d'}-->"><!--{$smarty.now+86400*$smarty.section.cnt.index|date_format:'%A, %B %e %Y'}--></option>
                            <!--{/if}-->
                            <!--{/section}-->
                        </select>&nbsp;
                            <!--{/if}-->
<!--★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★-->


                                <!--{if !$arrDelivDate}-->
                                    <!--ご指定頂けません。-->
                                <!--{else}-->
                                    <select name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="boxLong top data-role-none">
                                        <option value="" selected="">お届け日：指定なし</option>
                                        <!--{assign var=shipping_date_value value=$arrForm[$key].value|default:$shippingItem.shipping_date}-->
                                        <!--{html_options options=$arrDelivDate selected=$shipping_date_value}-->
                                    </select>
                                <!--{/if}-->

                                <!--★お届け時間★-->
                                <!--{assign var=key value="deliv_time_id`$index`"}-->
                                <span class="attention"><!--{$arrErr[$key]}--></span>
        <!--{if $smarty.session.pre_deliv_id == 4}-->
                    Pickup Time：
        <!--{elseif $smarty.session.pre_deliv_id == 5}-->
                    
        <!--{else}-->
                    Delivery Time：
        <!--{/if}-->
                                <!--{if $smarty.session.pre_deliv_id == 5}-->
                                <!--{else}-->
                                <select name="<!--{$key}-->" id="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="boxLong data-role-none">
                                    <option value="" selected="">not specified</option>
                                    <!--{assign var=shipping_time_value value=$arrForm[$key].value|default:$shippingItem.time_id}-->
                                    <!--{html_options options=$arrDelivTime selected=$shipping_time_value}-->
                                </select>
                                <!--{/if}-->
                            </div>
                        </div><!-- /.formBox --><!-- /.time_select --><!--{* FIXME *}-->
                    <!--{/foreach}-->

        <!--{if $smarty.session.pre_deliv_id == 4}-->
                <p class="attention">Pickup date is this rental starting date.</p>
        <!--{elseif $smarty.session.pre_deliv_id == 5}-->
                <p class="attention">The extension order starts on the day after rental expiring date.<br>
                                     *If your rental is already expired at the moment,<br>
                                      please select the earliest date, and proceed to the next page.</p>
        <!--{else}-->
                <p class="attention">The delivery date is the rental starting date.<br>
                                     *When the selected delivery place is airports and the order is placed in advance, <br>
                                      the parcel will be delivered one day earlier.</p>
        <!--{/if}-->

                </div><!-- /.form_area -->
            </section>
        <!--{/if}-->

        <!--★ポイント使用の指定★-->
        <!--{if $tpl_login == 1 && $smarty.const.USE_POINT !== false}-->
            <section class="point_area">
                <h3 class="subtitle">Designation for point usage</h3>

                    <div class="form_area">
                        <p class="fb"><span class="point">You can use 1 point for 1 yen</span></p>
                        <div class="point_announce">
                            <p>Current available points :「<span class="price"><!--{$tpl_user_point|default:0|number_format}-->Pt</span>」<br />
                            <!--{if false}-->
                            今回ご購入合計金額：<span class="price"><!--{$arrPrices.subtotal|number_format}-->円</span> (送料、手数料を含みません。)
                            <!--{/if}-->
                            </p>
                        </div>

                        <!--▼ポイントフォームボックスここから -->
                        <div class="formBox">
                            <div class="innerBox fb">
                                <p>
                                    <input type="radio" id="point_on" name="point_check" value="1" <!--{$arrForm.point_check.value|sfGetChecked:1}--> onchange="eccube.togglePointForm();" class="data-role-none" />
                                    <label for="point_on">Use points</label>
                                </p>
                                <!--{assign var=key value="use_point"}-->
                                <p class="check_point"><input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|default:$tpl_user_point}-->" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="box_point data-role-none" />Use points<span class="attention"><!--{$arrErr[$key]}--></span></p>
                            </div>
                        <div class="innerBox fb">
                            <input type="radio" id="point_off" name="point_check" value="2" <!--{$arrForm.point_check.value|sfGetChecked:2}--> onchange="eccube.togglePointForm();" class="data-role-none" />
                            <label for="point_off">Don't use points</label>
                        </div>
                    </div><!-- /.formBox -->
                </div><!-- /.form_area -->
            </section>
        <!--{/if}-->

        <!--★その他お問い合わせ★-->
        <style>
		.red{
			 color:#A00508;
		}
		.normal{
			font-weight:normal !important;
		}
		</style>  
        <section class="contact_area">
                <!--{if $smarty.session.pre_deliv_id == 3}-->
    <style>
	.airport_attention {
    color: #f50000;
    background-color: #ffdcef;
    font-size: 13px;
    line-height: 22px;
    padding: 6px;
}
	</style>
                <h3 class="subtitle">Remarks column</h3>
            <div class="form_area">
                <p class="red airport_attention">【The person who request for a pickup at airports】<br>
Please enter " flight number " and " estimated arrival time " for flight in this remarks column if you know. (i.g. JL847 1/10 16:00 </p>
                <!--{else}-->
                <h3 class="subtitle">Remarks column</h3>
            <div class="form_area">
                <!--{/if}-->
                <p class="normal">If you have any further inquiry, please key in here.</p>
                <!--{assign var=key value="message"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <textarea name="<!--{$key}-->" id="etc" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" cols="62" rows="8" class="textarea data-role-none" wrap="hard"><!--{"\n"}--><!--{$arrForm[$key].value|h}-->

                </textarea><br />
            </div>

        </section>     

        <!--★ボタン★-->
        <div class="btn_area">
            <ul class="btn_btm">
                <li><a rel="external" href="javascript:void(document.form1.submit());" class="btn">Next</a></li>
                <li><a rel="external" href="?mode=return" class="btn_back">Return</a></li>
            </ul>
        </div>

    </form>
</section>

<!--{include file= 'frontparts/search_area.tpl'}-->

<!--▲コンテンツここまで -->
