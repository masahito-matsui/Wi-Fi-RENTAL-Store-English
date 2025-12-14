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
<style>
#header_login_area{
display: none;
}
</style>

<script type="text/javascript">//<![CDATA[
    $(function() {
        if ($('input[name=deliv_id]:checked').val()
            || $('#deliv_id').val()) {
            showForm(true);
            showPaymentRadioHTML();
        } else {
            showForm(false);
        }
//        $('input[id^=deliv_]').click(function() {
        $(document).ready(function(){
            showForm(true);
            var data = {};
            data.mode = 'select_deliv';
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
                        var payment_tbody = $('#payment tbody');
                        payment_tbody.empty();
                        for (var i in data.arrPayment) {
                            // ラジオボタン
                            <!--{* IE7未満対応のため name と id をベタ書きする *}-->
                            var radio = $('<input type="radio" name="payment_id" id="pay_' + i + '" />')
                                .val(data.arrPayment[i].payment_id);
                            // ラベル
                            var label = $('<label />')
                                .attr('for', 'pay_' + i)
                                .text(data.arrPayment[i].payment_method);
                            // 行
                            var tr = $('<tr />')
                                .append($('<td />')
                                    .addClass('alignC')
                                    .append(radio))
                                .append($('<td />').append(label));

                            // 支払方法の画像が登録されている場合は表示
                            if (data.img_show) {
                                var payment_image = data.arrPayment[i].payment_image;
                                $('th#payment_method').attr('colspan', 3);
                                if (payment_image) {
                                    var img = $('<img />').attr('src', '<!--{$smarty.const.IMAGE_SAVE_URLPATH}-->' + payment_image);
                                    tr.append($('<td />').append(img));
                                } else {
                                    tr.append($('<td />'));
                                }
                            } else {
                                $('th#payment_method').attr('colspan', 2);
                            }

                            tr.appendTo(payment_tbody);
                        }
                        // クレジットカードのチェック
                        $("input[name='payment_id']").val(['7']);

/*
                         // お届け時間を生成
                        var deliv_time_id_select = $('select[id^=deliv_time_id]');
                        deliv_time_id_select.empty();
                        deliv_time_id_select.append($('<option />').text('Not specified').val(''));
                        for (var i in data.arrDelivTime) {
                            var option = $('<option />')
                                .val(i)
                                .text(data.arrDelivTime[i])
                                .appendTo(deliv_time_id_select);
                        }
*/
                    }
                }
            });
        });

        function showPaymentRadioHTML() {
            showForm(true);
            var data = {};
            data.mode = 'select_deliv';
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
                        var payment_tbody = $('#payment tbody');
                        payment_tbody.empty();
                        for (var i in data.arrPayment) {
                            // ラジオボタン
                            <!--{* IE7未満対応のため name と id をベタ書きする *}-->
                            var radio = $('<input type="radio" name="payment_id" id="pay_' + i + '" />')
                                .val(data.arrPayment[i].payment_id);
                            // ラベル
                            var label = $('<label />')
                                .attr('for', 'pay_' + i)
                                .text(data.arrPayment[i].payment_method);
                            // 行
                            var tr = $('<tr />')
                                .append($('<td />')
                                    .addClass('alignC')
                                    .append(radio))
                                .append($('<td />').append(label));

                            // 支払方法の画像が登録されている場合は表示
                            if (data.img_show) {
                                var payment_image = data.arrPayment[i].payment_image;
                                $('th#payment_method').attr('colspan', 3);
                                if (payment_image) {
                                    var img = $('<img />').attr('src', '<!--{$smarty.const.IMAGE_SAVE_URLPATH}-->' + payment_image);
                                    tr.append($('<td />').append(img));
                                } else {
                                    tr.append($('<td />'));
                                }
                            } else {
                                $('th#payment_method').attr('colspan', 2);
                            }

                            tr.appendTo(payment_tbody);
                        }
                        // クレジットカードのチェック
                        $("input[name='payment_id']").val(['7']);

/*
                         // お届け時間を生成
                        var deliv_time_id_select = $('select[id^=deliv_time_id]');
                        deliv_time_id_select.empty();
                        deliv_time_id_select.append($('<option />').text('Not specified').val(''));
                        for (var i in data.arrDelivTime) {
                            var option = $('<option />')
                                .val(i)
                                .text(data.arrDelivTime[i])
                                .appendTo(deliv_time_id_select);
                        }
*/
                    }
                }
            });
        }

        /**
         * 通信エラー表示.
         */
        function remoteException(XMLHttpRequest, textStatus, errorThrown) {
            alert('通信中にエラーが発生しました。カート画面に移動します。');
//            location.href = '<!--{$smarty.const.CART_URL}-->';
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
    });
//]]></script>

<div id="undercolumn">
    <div id="undercolumn_shopping">
        <p class="flow_area">
            <img src="<!--{$TPL_URLPATH}-->img/picture/img_flow_02.jpg" alt="購入手続きの流れ" />
        </p>
        <h2 class="title">Order information</h2>

        <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
            <input type="hidden" name="mode" value="confirm" />
            <input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->" />

            <!--{assign var=key value="deliv_id"}-->
            <!--{if $is_single_deliv}-->
                <input type="hidden" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" id="deliv_id" />
            <!--{else}-->
           <div class="pay_area">
                <h3>Pickup Method</h3>
                <!--{*<p>配送方法をご選択ください。</p>*}-->

                <!--{if $arrErr[$key] != ""}-->
                <p class="attention" style="background-color:#FFBCBD"><!--{$arrErr[$key]}--></p>
                <!--{/if}-->
                <table summary="配送方法選択">
                    <col width="20%" />
                    <col width="80%" />
                    <tr>
                        <!--{*<th class="alignC">選択</th>*}-->
                        <!--{*<th class="alignC" colspan="2">配送方法</th>*}-->
                    </tr>
                    <!--{section name=cnt loop=$arrDeliv}-->
                    <!--{if $smarty.session.pre_deliv_id == $arrDeliv[cnt].deliv_id}-->
                    <tr>
                        <td class="alignC"><input type="radio" id="deliv_<!--{$smarty.section.cnt.iteration}-->" name="<!--{$key}-->" value="<!--{$arrDeliv[cnt].deliv_id}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" <!--{$arrDeliv[cnt].deliv_id|sfGetChecked:$arrForm[$key].value}--> checked="checked" />
                        </td>
                        <td>
                            <label for="deliv_<!--{$smarty.section.cnt.iteration}-->"><!--{$arrDeliv[cnt].name|h}--><!--{if $arrDeliv[cnt].remark != ""}--><p><!--{$arrDeliv[cnt].remark|h|nl2br}--></p><!--{/if}--></label>
                        </td>
                    </tr>
                    <!--{/if}-->
                    <!--{/section}-->
                </table>
            </div>
            <!--{/if}-->

            <div class="pay_area">
                <h3>Payment Method</h3>
                <p class="select-msg">We accept credit cards only.</p>
                <p class="non-select-msg">まずはじめに、配送方法を選択ください。</p>

                <!--{assign var=key value="payment_id"}-->
                <!--{if $arrErr[$key] != ""}-->
                <p class="attention" style="background-color:#FFBCBD"><!--{$arrErr[$key]}--></p>
                <!--{/if}-->
                <table summary="お支払方法選択" id="payment">
                    <col width="20%" />
                    <col width="80%" />
                    <thead>
                        <tr>
                            <!--<th class="alignC">選択</th>-->
                            <!--<th class="alignC" colspan="<!--{if !$img_show}-->2<!--{else}-->3<!--{/if}-->" id="payment_method">お支払方法</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <!--{section name=cnt loop=$arrPayment}-->
                            <tr>
                            <td class="alignC"><input type="radio" id="pay_<!--{$smarty.section.cnt.iteration}-->" name="<!--{$key}-->"  value="<!--{$arrPayment[cnt].payment_id}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" <!--{$arrPayment[cnt].payment_id|sfGetChecked:$arrForm[$key].value}--> /></td>
                            <td>
                                <label for="pay_<!--{$smarty.section.cnt.iteration}-->"><!--{$arrPayment[cnt].payment_method|h}--><!--{if $arrPayment[cnt].note != ""}--><!--{/if}--></label>
                            </td>
                            <!--{if $img_show}-->
                                <td>
                                    <!--{if $arrPayment[cnt].payment_image != ""}-->
                                        <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrPayment[cnt].payment_image}-->" />
                                    <!--{/if}-->
                                </td>
                            <!--{/if}-->
                            </tr>
                        <!--{/section}-->
                    </tbody>
                </table>
            </div>

            <!--{if $cartKey != $smarty.const.PRODUCT_TYPE_DOWNLOAD}-->
            <div class="pay_area02">
                <input type="hidden" id="start_date" name="start_date" value ="">
                <input type="hidden" id="end_date" name="end_date" value ="">
                <input type="hidden" id="rental_term" name="rental_term" value ="">
                <input type="hidden" id="fast_date" name="fast_date" value ="">
                <input type="hidden" id="rental_flg" name="rental_flg" value ="">
                <input type="hidden" id="receive_flg" name="receive_flg" value ="">
                <input type="hidden" id="receive_flg_tmp" name="receive_flg_tmp" value ="">
                <input type="hidden" id="sale_flg" name="sale_flg" value ="">
                <input type="hidden" id="fast_sale_date" name="fast_sale_date" value ="">

<!--{if $smarty.session.pre_deliv_id == 8}-->
<input type="hidden" id="deliv_date0" class="deliv_date0 enter_form" name="deliv_date0">
<!--{else}-->

        <!--{if $smarty.session.pre_deliv_id == 4}-->
                <h3>Pickup Date</h3>
        <!--{elseif $smarty.session.pre_deliv_id == 3}-->
                <h3>Pickup Date</h3>
        <!--{elseif $smarty.session.pre_deliv_id == 5}-->
                <h3>Start date for extension</h3>
        <!--{elseif $smarty.session.pre_deliv_id == 8}-->
        <!--{else}-->
                <h3>Delivery Date / Time</h3>
        <!--{/if}-->
        <!--
        <!--{if $smarty.session.pre_deliv_id == 4}-->
                <p class="select-msg">Please select Pickup date / time slot</p>
        <!--{elseif $smarty.session.pre_deliv_id == 5}-->
                <p class="select-msg">Please select your start date for extension</p>
        <!--{else}-->
                <p class="select-msg">Please select delivery date / time slot</p>
        <!--{/if}-->
        -->
<p id="rental_err_01" class="error no_disp" style="background-color: #ffdede;">※Please select Pickup date / time slot</p>
<p id="rental_err_02" class="error no_disp" style="background-color: #ffdede;">※Please select Pickup date / time slot</p>

                <p class="non-select-msg">まずはじめに、配送方法を選択ください。</p>
                <!--{foreach item=shippingItem name=shippingItem from=$arrShipping}-->
                <!--{assign var=index value=$shippingItem.shipping_id}-->
                <div class="delivdate top">
                    <!--{if $is_multiple}-->
                        <span class="st">▼<!--{$shippingItem.shipping_name01}--><!--{$shippingItem.shipping_name02}-->
                        <!--{$arrPref[$shippingItem.shipping_pref]}--><!--{$shippingItem.shipping_addr01}--><!--{$shippingItem.shipping_addr02}--></span><br/>
                    <!--{/if}-->

       <div class="s_box">
                    <!--★お届け日★-->
                    <!--{assign var=key value="deliv_date`$index`"}-->
                    <span class="attention" style="background-color:#FFBCBD"><!--{$arrErr[$key]}--></span>
        <!--{if $smarty.session.pre_deliv_id == 4}-->
                    <p class="select_name">Pickup Date：</p>
        <!--{elseif $smarty.session.pre_deliv_id == 3}-->
                    <p class="select_name">Pickup Date：</p>
        <!--{elseif $smarty.session.pre_deliv_id == 5}-->
                    <p class="select_name">Start date for extension：</p>
        <!--{else}-->
                    <p class="select_name">Delivery Date：</p>
        <!--{/if}-->

        <!--{if $smarty.session.pre_deliv_id == 5}-->
        <input type="text" id="deliv_date0" class="deliv_date0 enter_form" name="deliv_date0" readonly>
        <!--{else}-->
        <input type="text" id="deliv_date1" class="deliv_date1 enter_form" name="deliv_date1" readonly>
        <!--{/if}-->

         <!--{if $smarty.session.pre_deliv_id == 4}-->
         <!--<p class="attention">Pickup date is the rental start date.</p>-->
         <!--{elseif $smarty.session.pre_deliv_id == 3}-->
         <!--<p class="attention">Pickup date is the rental start date.</p>-->
         <!--{elseif $smarty.session.pre_deliv_id == 5}-->
         <p class="attention">The extension period will start from one day after the end date of the original rental period.<br><br>
                              *If your extension start date is not on the list, please select the earliest date.</p>
         <!--{else}-->
         <!--<p class="attention">The delivery date is the rental start date.</p>-->
         <!--{/if}-->
        </div>
        <div class="s_box">
                    <!--★お届け時間★-->
                    <!--{assign var=key value="deliv_time_id`$index`"}-->
                    <span class="attention" style="background-color:#FFBCBD"><!--{$arrErr[$key]}--></span>
        <!--{if $smarty.session.pre_deliv_id == 4}-->
                    <p class="select_name">Pickup Time：</p>
        <!--{elseif $smarty.session.pre_deliv_id == 3}-->
                    <p class="select_name">Pickup Time：</p>
        <!--{elseif $smarty.session.pre_deliv_id == 5}-->
        <!--表示なし-->
        <!--{else}-->
                    <p class="select_name">Delivery Time：</p>
        <!--{/if}-->
                    <!--{if $smarty.session.pre_deliv_id == 5}-->
                    <!--表示なし-->
                    <!--{elseif $smarty.session.pre_deliv_id == 4}-->
                    <div id="deliv_time_ids" class="no_disp">
                <label><input type="radio" id="deliv_time_id_1" class="deliv_time_id" name="deliv_time_id1" value="1">10AM - 11AM</label>
          						<label><input type="radio" id="deliv_time_id_2" class="deliv_time_id" name="deliv_time_id1" value="2">11AM - 12PM</label>
          						<label><input type="radio" id="deliv_time_id_3" class="deliv_time_id" name="deliv_time_id1" value="3">12PM - 1PM</label>
          						<label><input type="radio" id="deliv_time_id_4" class="deliv_time_id" name="deliv_time_id1" value="4">1PM - 2PM</label>
          						<label><input type="radio" id="deliv_time_id_5" class="deliv_time_id" name="deliv_time_id1" value="5">2PM - 3PM</label>
          						<label><input type="radio" id="deliv_time_id_6" class="deliv_time_id" name="deliv_time_id1" value="6">3PM - 4PM</label>
          						<label><input type="radio" id="deliv_time_id_7" class="deliv_time_id" name="deliv_time_id1" value="7">4PM - 5PM</label>
          						<label><input type="radio" id="deliv_time_id_8" class="deliv_time_id" name="deliv_time_id1" value="8">5PM - 6PM</label>
          						<label><input type="radio" id="deliv_time_id_9" class="deliv_time_id" name="deliv_time_id1" value="9">6PM - 7PM</label>
                    </div>
                    <!--{elseif $smarty.session.pre_deliv_id == 3}-->
                    <div id="deliv_time_ids" class="no_disp">
          						<label id="deliv_time_id_1_14"><input type="radio" id="deliv_time_id_1" class="deliv_time_id" name="deliv_time_id1" value="1">Morning [Before Noon]</label>
          						<label><input type="radio" id="deliv_time_id_2" class="deliv_time_id" name="deliv_time_id1" value="2">12PM - 2PM</label>
          						<label><input type="radio" id="deliv_time_id_3" class="deliv_time_id" name="deliv_time_id1" value="3">2PM - 4PM</label>
          						<label><input type="radio" id="deliv_time_id_4" class="deliv_time_id" name="deliv_time_id1" value="4">4PM - 6PM</label>
          						<label><input type="radio" id="deliv_time_id_5" class="deliv_time_id" name="deliv_time_id1" value="5">6PM - 8PM</label>
          						<label><input type="radio" id="deliv_time_id_6" class="deliv_time_id" name="deliv_time_id1" value="6">8PM - 9PM</label>
                    </div>
                    <!--{else}-->
                    <div id="deliv_time_ids" class="no_disp">
          						<label id="deliv_time_id_1_14"><input type="radio" id="deliv_time_id_1" class="deliv_time_id" name="deliv_time_id1" value="1">Morning [Before Noon]</label>
          						<label><input type="radio" id="deliv_time_id_2" class="deliv_time_id" name="deliv_time_id1" value="2">2PM - 4PM</label>
          						<label><input type="radio" id="deliv_time_id_3" class="deliv_time_id" name="deliv_time_id1" value="3">4PM - 6PM</label>
          						<label><input type="radio" id="deliv_time_id_4" class="deliv_time_id" name="deliv_time_id1" value="4">6PM - 8PM</label>
          						<label><input type="radio" id="deliv_time_id_5" class="deliv_time_id" name="deliv_time_id1" value="5">7PM - 9PM</label>
                    </div>
                    <!--{/if}-->
       </div>
                </div>
                <!--{/foreach}-->
                <!--{if $smarty.session.pre_deliv_id == 4}-->

                <!--{elseif $smarty.session.pre_deliv_id == 5}-->

                <!--{elseif $smarty.session.pre_deliv_id == 3}-->
                <p style="font-size:1.4rem; color:#666; line-height:20px;margin: 0 auto;width: 92%;margin-top: 13px;">* As your package is delivered a day earlier than your pickup date,<br>you can pick up your package in the morning on your pickup date.</p>
                <!--{else}-->
                <p class="attention"></p>
        <!--{/if}-->
<!--{/if}-->

            </div>
            <!--{/if}-->

            <!-- ▼ポイント使用 -->
            <!--{if $tpl_login == 1 && $smarty.const.USE_POINT !== false}-->
                <div class="point_area">
                    <h3>Point</h3>
                        <p><span class="attention">1 point can be used as <!--{$smarty.const.POINT_VALUE|number_format}--> JPY</span> from your next order.</p>
                        <div class="point_announce">
                            <p><span class="user_name">Mr./Ms. <!--{$name01|h}--> <!--{$name02|h}--></span>, you have <span class="point"><!--{$tpl_user_point|default:0|number_format}--> points</span>.<br />
                                <!--{if false}-->今回ご購入合計金額：<span class="price"><!--{$arrPrices.subtotal|number_format}-->円</span> <span class="attention">(送料、手数料を含みません。)</span><!--{/if}-->
                            </p>
                            <ul>
                                <li>
                                <input type="radio" id="point_on" name="point_check" value="1" <!--{$arrForm.point_check.value|sfGetChecked:1}--> onclick="eccube.togglePointForm();" /><label for="point_on">Use points</label>
                                <!--{assign var=key value="use_point"}--><br />
                                <input type="text" class="use-point_box" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|default:$tpl_user_point}-->" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="box60" />&nbsp;Points<span class="attention" style="background-color:#FFBCBD"><!--{$arrErr[$key]}--></span>
                                </li>
                                <li><input type="radio" id="point_off" name="point_check" value="2" <!--{$arrForm.point_check.value|sfGetChecked:2}--> onclick="eccube.togglePointForm();" /><label for="point_off">Do not apply points</label></li>
                            </ul>
                    </div>
                </div>
            <!--{/if}-->
            <!-- ▲ポイント使用 -->
            <div class="pay_area02">
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
                <h3>Remarks</h>
                <p style="margin-bottom: 10px; color:#f00">* Please enter your flight number and estimated arrival time in the remarks field. (i.g., JL847 Jan. 10th 4PM)</p>
                <!--<p>If you have any further inquiry, please key in here.</p>-->
                <!--{else}-->
                <h3>Remarks</h3>
                <!--<p>If you have any further inquiry, please key in here.</p>-->
                <!--{/if}-->
                <div>
                    <!--★その他お問い合わせ事項★-->
                    <!--{assign var=key value="message"}-->
                    <span class="attention" style="background-color:#FFBCBD"><!--{$arrErr[$key]}--></span>
                    <textarea name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" cols="70" rows="8" class="txtarea" wrap="hard"><!--{"\n"}--><!--{$arrForm[$key].value|h}-->

                    </textarea>
                    <p class="attention"><!-- (<!--{$smarty.const.LTEXT_LEN}-->文字まで)--></p>
                </div>
            </div>

            <div class="btn_area">
                <ul>
                    <li class="form_btn return_btn">
                    <a href="?mode=return">
                        <img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る" border="0" name="back03" id="back03" /></a>
                    </li>
                    <li class="form_btn next_btn">
                        <input type="image" class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="次へ" name="next" id="next"/>
                    </li>
                    <li class="form_btn return_btn_sp">
                    <a href="?mode=return">
                        <img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る" border="0" name="back03" id="back03" /></a>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>

<script>
$(function(){
  var base_obj = getDelivDate();
  var flg17 = base_obj.flg17;
  var flg19 = base_obj.flg19;
  var pref_zone = 0;
  var deliv_startDate = 0;
  var deliv_endDate = 0;

  //宅配便で受け取る(本州, 四国)
	if(base_obj.receive_flg == 1) {
    pref_zone = 1;
	}
  //宅配便で受け取る(離島)
	if(base_obj.receive_flg == 2) {
    pref_zone = 2;
	}
  //空港で受け取る(成田, 羽田)
	if(base_obj.receive_flg == 3) {
    pref_zone = 1;
	}
  //空港で受け取る(関空, 名古屋)
	if(base_obj.receive_flg == 4) {
    pref_zone = 2;
	}
  //空港で受け取る(新千歳, 福岡)
	if(base_obj.receive_flg == 5) {
    pref_zone = 3;
	}

  //宅配便で受け取る(物理SIM)
	if(base_obj.receive_flg == 9) {
    pref_zone = 1;
	}

  if(base_obj.rental_flg == 0 && base_obj.extension_flg == 1) {
    delivery_date = base_obj.start_date;
    delivery_time = 1;
		delivery_time_str = '午前中';
    $('#deliv_date0').val(delivery_date);
    $('.delivery_items').addClass('no_disp');
		$.ajax({
			type: "post",
			url: "/api.php",
			data: {
					mode:"set_deliv_info",
					delivery_date:delivery_date,
					delivery_time:delivery_time,
					delivery_time_str:delivery_time_str
					},
			cache: false
		}).done(function(data){
			//console.log('success');
			//console.log(data);
      $('#next').prop('disabled', false);
		}).fail(function(data){
			//console.log('fail');
		});
		return false;
  //物理SIM
  } else if(base_obj.sale_flg == 1) {
    if($('#deliv_date1').val() == '') {
      $('#rental_err_01').removeClass('no_disp');
      $('#rental_err_01_sub').removeClass('no_disp');
    } else {
      if(!$('#rental_err_01').hasClass('no_disp')) { $('#rental_err_01').addClass('no_disp'); }
      if(!$('#rental_err_01_sub').hasClass('no_disp')) { $('#rental_err_01_sub').addClass('no_disp'); }
      $('#rental_err_02').removeClass('no_disp')
      $('#deliv_time_ids').removeClass('no_disp');
    }
    if($('.deliv_time_id:checked').val() > 0) {
      if(!$('#rental_err_02').hasClass('no_disp')) { $('#rental_err_02').addClass('no_disp'); }
    }

  	$('#deliv_date1').datepicker({
  		dateFormat:dateFormat,
  //		timeFormat: 'HH:mm:ss',
  		minDate:base_obj.fast_sale_date,
  		maxDate:"+90d"
  	});

    $('#deliv_date1, .deliv_time_id').change(function(){
      var delivery_date_str = $('#deliv_date1').val();
      if(delivery_date_str != '') {
        if(!$('#rental_err_01').hasClass('no_disp')) { $('#rental_err_01').addClass('no_disp'); }
        if(!$('#rental_err_01_sub').hasClass('no_disp')) { $('#rental_err_01_sub').addClass('no_disp'); }
        $('#rental_err_02').removeClass('no_disp')
        $('#deliv_time_ids').removeClass('no_disp');
      }
      var delivery_time = $('.deliv_time_id:checked').val();
      var delivery_time_str = $('.deliv_time_id:checked').parent().text();
      if(delivery_date_str != '' && delivery_time > 0) {
        if(!$('#rental_err_02').hasClass('no_disp')) { $('#rental_err_02').addClass('no_disp'); }
        //配送情報を一時保存
    		$.ajax({
    			type: "post",
    			url: "/api.php",
    			data: {
    					mode:"set_deliv_info",
    					delivery_date:delivery_date_str,
    					delivery_time:delivery_time,
    					delivery_time_str:delivery_time_str
    					},
    			cache: false
    		}).done(function(data){
    			//console.log('success');
    			//console.log(data);
          $('#next').prop('disabled', false);
    		}).fail(function(data){
    			//console.log('fail');
    		});
    		return false;
      }
	 });
  } else if(base_obj.rental_flg == 0 && base_obj.extension_flg == 0) {
      delivery_date = '2020/01/01';
      delivery_time = 1;
  		delivery_time_str = '午前中';
      $('#deliv_date0').val(delivery_date);
      $('.delivery_items').addClass('no_disp');
  		$.ajax({
  			type: "post",
  			url: "/api.php",
  			data: {
  					mode:"set_deliv_info",
  					delivery_date:delivery_date,
  					delivery_time:delivery_time,
  					delivery_time_str:delivery_time_str
  					},
  			cache: false
  		}).done(function(data){
  			//console.log('success');
  			//console.log(data);
        $('#next').prop('disabled', false);
  		}).fail(function(data){
  			//console.log('fail');
  		});
  		return false;
  } else {
    if($('#deliv_date1').val() == '') {
      $('#rental_err_01').removeClass('no_disp');
      $('#rental_err_01_sub').removeClass('no_disp');
    } else {
      if(!$('#rental_err_01').hasClass('no_disp')) { $('#rental_err_01').addClass('no_disp'); }
      if(!$('#rental_err_01_sub').hasClass('no_disp')) { $('#rental_err_01_sub').addClass('no_disp'); }
      $('#rental_err_02').removeClass('no_disp')
      $('#deliv_time_ids').removeClass('no_disp');
    }
    if($('.deliv_time_id:checked').val() > 0) {
      if(!$('#rental_err_02').hasClass('no_disp')) { $('#rental_err_02').addClass('no_disp'); }
    }
    var flg_time = checkDelivTime();
    if(base_obj.receive_flg == 0 || base_obj.receive_flg == 3 || base_obj.receive_flg == 4 || base_obj.receive_flg == 5) {
      $('#deliv_date1').val($('#start_date').val());
      $('#deliv_time_ids').removeClass('no_disp');
    } else {
      var deliv_maxDate = "+180d";
      //レンタルの場合、レンタル開始日の前日からレンタル当日までをお届可能日になるため、基準となる期間設定
      if($('#start_date').val() != '') {
        var date_arr = $('#start_date').val().split('/');
        deliv_maxDate = new Date(date_arr[0], date_arr[1]-1, date_arr[2]);
        var start_date = new Date($('#start_date').val());
        var fast_date = new Date($('#fast_date').val());

        var diffDate = Math.ceil((start_date - fast_date) / 86400000);
        if((start_date - fast_date) > 0) {
        //deliv_minDate = Math.ceil((start_date - fast_date) / 86400000);
        deliv_minDate = Math.ceil((start_date - fast_date) / 86400000) - 1; //前日配送可能
        }
      }
    	$.datepicker.setDefaults($.datepicker.regional[ "ja" ]);
    	var dateFormat   = 'yy/mm/dd';
      if(diffDate == 1) {
        if(pref_zone == 1) {
          deliv_minDate = deliv_minDate + 1;
        }
      }
      if(diffDate == 2) {
        if(pref_zone == 2) {
          deliv_minDate = deliv_minDate + 1;
        }
      }
      if(diffDate == 3) {
        if(pref_zone == 3) {
          deliv_minDate = deliv_minDate + 1;
        }
      }
    	if(flg17 == 1) {
    		deliv_minDate = deliv_minDate + 1;
    	}
    	$('#deliv_date1').datepicker({
    		dateFormat:dateFormat,
    //		timeFormat: 'HH:mm:ss',
    		minDate:deliv_minDate,
    		maxDate:deliv_maxDate
    	});
    }
    $('#deliv_date1, .deliv_time_id').change(function(){
      var delivery_date_str = $('#deliv_date1').val();
      if(delivery_date_str != '') {
        if(!$('#rental_err_01').hasClass('no_disp')) { $('#rental_err_01').addClass('no_disp'); }
        if(!$('#rental_err_01_sub').hasClass('no_disp')) { $('#rental_err_01_sub').addClass('no_disp'); }
        $('#rental_err_02').removeClass('no_disp')
        $('#deliv_time_ids').removeClass('no_disp');
      }
      var delivery_time = $('.deliv_time_id:checked').val();
      var delivery_time_str = $('.deliv_time_id:checked').data('str');
      flg_time = checkDelivTime();
      if(!flg_time) {
        return false;
      }
      if(delivery_date_str != '' && delivery_time > 0) {
        if(!$('#rental_err_02').hasClass('no_disp')) { $('#rental_err_02').addClass('no_disp'); }
        //配送情報を一時保存
    		$.ajax({
    			type: "post",
    			url: "/api.php",
    			data: {
    					mode:"set_deliv_info",
    					delivery_date:delivery_date_str,
    					delivery_time:delivery_time,
    					delivery_time_str:delivery_time_str
    					},
    			cache: false
    		}).done(function(data){
    			//console.log('success');
    			//console.log(data);
          $('#next').prop('disabled', false);
    		}).fail(function(data){
    			//console.log('fail');
    		});
    		return false;
      }
	 });
  }
  function checkDelivTime() {
    flg = true;
    if($('#deliv_date1').val() != '') {
      var fast_date = new Date($('#fast_date').val());
      var delivery_date = new Date($('#deliv_date1').val());
      var deliv_flg = Math.ceil((delivery_date - fast_date) / 86400000);
      $('#deliv_time_id_1').removeClass('no_disp');

      if($('#receive_flg').val() == 0) {
        //店頭受取は当日からOK
        flg = true;
        $('#shipping_delivery_block').addClass('no_disp');
        $('#shipping_togo_block').removeClass('no_disp');
      } else if(pref_zone == 0) {
        //1日後午前以降
        if(deliv_flg < 1) {
          flg = false;
          $('#deliv_time_ids').addClass('no_disp');
        } else {
          flg = true;
        }
      } else if(pref_zone == 1) {
        //1日後14時以降
        if(deliv_flg < 1) {
          flg = false;
          $('#deliv_time_ids').addClass('no_disp');
        } else {
          flg = true;
        }
/*
        if(deliv_flg == 1 && $('.deliv_time_id:checked').val() == 1) {
          flg = false;
          $('#deliv_time_id_1').addClass('no_disp');
        } else {
          flg = true;
        }
*/
      } else if(pref_zone == 2) {
        //2日後午前以降
        if(deliv_flg < 2) {
          flg = false;
          $('#deliv_time_ids').addClass('no_disp');
        } else {
          flg = true;
        }
      }
      if(flg) {
        $('#next').prop('disabled', false);
      } else {
        $('#next').prop('disabled', true);
        //alert('選択できない日時です');
      }
    }
    return flg;
  }
  function getDelivDate() {
    var flg17 = -1;
    var flg19 = -1;
    var obj;
    var sess_start_date;
    var sess_end_date;
    var sess_rental_term;
    var sess_delivery_date;
    var sess_delivery_time;
    var sess_delivery_time_str;
    var sess_fast_date;
    var sess_rental_flg;
    var sess_receive_flg;
    var sess_receive_flg_tmp;
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
			obj = $.parseJSON(data);
      sess_start_date = obj.start_date;
      sess_end_date = obj.end_date;
      sess_rental_term = obj.rental_term;
      sess_delivery_date = obj.delivery_date;
      sess_delivery_time = obj.delivery_time;
      sess_delivery_time_str = obj.delivery_time_str;
      sess_fast_date = obj.fast_date;
      sess_rental_flg = obj.rental_flg;
      sess_receive_flg = obj.receive_flg;
      sess_receive_flg_tmp = obj.receive_flg_tmp;
      sess_sale_flg = obj.sale_flg;
      sess_fast_date = obj.fast_date;

      flg17 = obj.flg17;
      flg17 = obj.flg19;
      $('#start_date').val(sess_start_date);
      $('#end_date').val(sess_end_date);
      $('#rental_term').val(sess_rental_term);
      $('#deliv_date1').val(sess_delivery_date);
      if(sess_delivery_time > 0) $('.deliv_time_id').val([sess_delivery_time]);
      $('#delivery_time_str').val(sess_delivery_time_str);
      $('#fast_date').val(sess_fast_date);
      $('#rental_flg').val(sess_rental_flg);
      $('#receive_flg').val(sess_receive_flg);
      $('#receive_flg_tmp').val(sess_receive_flg_tmp);
      $('#sale_flg').val(sess_sale_flg);
      $('#fast_sale_date').val(fast_sale_date);
		}).fail(function(data){
			//console.log('fail');
		});
    return obj;
  }
});
</script>
<script>
$(document).ready(function() {
var start_date = $('#start_date').val();
  $('#deliv_date1').val(start_date);
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
