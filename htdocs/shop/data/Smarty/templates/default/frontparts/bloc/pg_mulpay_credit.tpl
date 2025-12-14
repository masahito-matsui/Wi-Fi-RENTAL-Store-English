<!--{*
 * Copyright(c) 2012 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 * Updated: 2013/03/29
 *}-->
<script type="text/javascript">//<![CDATA[
var send = true;

function fnCheckSubmit(mode) {
    $('#payment_form_body').slideToggle();
    $('#payment_form_loading').slideToggle();

    if(send) {
        send = false;
        fnModeSubmit(mode,'','');
        return false;
    } else {
        alert("please just a moment");
        return false;
    }
}
$(function() {
            <!--{$tpl_payment_onload}-->
});
//]]>
</script>
        <!--{if $tpl_is_td_tran}-->
        <div id="payment_form_td_tran" style="<!--{if !$tpl_is_td_tran}-->display:none;<!--{/if}-->">
            <div class="information">
                <p>本人認証サービス(3-Dセキュア認証)の画面に移動します。</p>
            </div>
            <table summary="">
                <tr>
                <td class="alignC">
                    本人認証サービス（3-Dセキュア認証）を続けます。<br />
                    「次へ」ボタンをクリックして下さい。<br />
                    <span class="attention">※It may take a little time to switch screen, please just a moment</span>
                </td>
                </tr>
            </table>
        </div>
        <input type="hidden" name="PaReq" value="<!--{$arrTdData.PaReq}-->" />
        <input type="hidden" name="TermUrl" value="<!--{$arrTdData.TermUrl}-->" />
        <input type="hidden" name="MD" value="<!--{$arrTdData.MD}-->" />
        <!--{/if}-->

        <div id="payment_form_loading" style="<!--{if !$tpl_is_loding}-->display:none;<!--{/if}-->">
            <div class="information">
                <p>Please just a moment</p>
            </div>
            <table summary="">
                <tr>
                <td class="alignC">
                    <img src="<!--{$smarty.const.MDL_PG_MULPAY_MEDIAFILE_URL}-->loading.gif" />
                </td>
                </tr>
            </table>
        </div>
        <div id="payment_form_body" style="<!--{if $tpl_is_loding}-->display:none;<!--{/if}-->">
            <div class="information">
                <p>Please fill in the following form.　Please note that all fields followed by mark of「<span class="attention">“ ※ ”</span>」 must be filled in.　
                Please crick the bottom button “payment”</p>
                <!--{assign var=key value="payment"}-->
                <p class="attention"><!--{$arrErr[$key]}--></p>
            </div>
            <table summary="クレジットカード番号">
                <colgroup width="20%"></colgroup>
                <colgroup width="80%"></colgroup>
                <tr>
                    <th colspan="2" class="alignC">Entry form of credit card</th>
                </tr>
                <tr>
                    <th class="alignR">
                        Card number<span class="attention">※</span>
                    </th>
                    <td>
                    <!--{assign var=key1 value="CardNo"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|h}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key1]|sfGetErrorColor}-->"  size="16" class="box120" />
                    </td>
                </tr>
                <tr>
                    <th class="alignR">
                        Expiration date<span class="attention">※</span>
                    </th>
                    <td>
                    <!--{assign var=key1 value="Expire_month"}-->
                    <!--{assign var=key2 value="Expire_year"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <select name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->">
                    <option value="">&minus;&minus;</option>
                    <!--{html_options options=$arrMonth selected=$arrForm[$key1].value}-->
                    </select>mm
                    &nbsp;/&nbsp;
                    20<select name="<!--{$key2}-->" style="<!--{$arrErr[$key2]|sfGetErrorColor}-->">
                    <option value="">&minus;&minus;</option>
                    <!--{html_options options=$arrYear selected=$arrForm[$key2].value}-->
                    </select>yy
                    </td>
                </tr>
                <tr>
                    <th class="alignR">
                        Card holder's name<span class="attention">※</span>
                    </th>
                    <td>
                        <!--{assign var=key1 value="card_name1"}-->
                        <!--{assign var=key2 value="card_name2"}-->
                        <span class="attention"><!--{$arrErr[$key1]}--></span>
                        <span class="attention"><!--{$arrErr[$key2]}--></span>
                        Name:<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|h}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key1]|sfGetErrorColor}-->" size="20" class="box120" />
<!--                        &nbsp;
                        NAME:<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|h}-->" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key2]|sfGetErrorColor}-->" size="20" class="box120" />-->
                        <!--<p class="mini"><span class="attention">Please fill in the name described on credit card.ご本人名義のカードをご使用ください。</span>半角英文字入力（EX：TARO YAMADA）</p>-->
                    </td>
                </tr>
                <!--{if $arrPaymentInfo.use_securitycd == '1'}-->
                <tr>
                    <th class="alignR">
                        CSC<!--{if $arrPaymentInfo.use_securitycd_option != '1'}--><span class="attention">※</span><!--{/if}-->
                    </th>
                    <td>
                        <!--{assign var=key value="SecurityCode"}-->
                        <span class="attention"><!--{$arrErr[$key]}--></span>
                        <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" maxlength="<!--{$arrForm[$key].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key]|sfGetErrorColor}-->"  size="4" class="box60" />
                        <p class="mini"><span class="attention">※Please fill in last 3 or 4-digit numbers mainly written on the back of credit card.
One byte entry. </span>EX )123</p>
                    </td>
                </tr>
                <!--{/if}-->
                
                <tr style="display:none">
                    <th class="alignR">
                        Number of payments<span class="attention">※</span>
                    </th>
                    <td>
                        <!--{assign var=key1 value="Method"}-->
                        <span class="attention"><!--{$arrErr[$key1]}--></span>
                        <select name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->">
                        <!--{html_options options=$arrPayMethod selected=$arrForm[$key1].value}-->
                        </select>
                    </td>
                </tr>
                
                <!--{if false}-->
                <!--{if $arrPaymentInfo.enable_customer_regist && $tpl_pg_regist_card_form}-->
                <tr>
                    <th class="alignR">
                        カード情報登録
                    </th>
                    <td>
                        <!--{assign var=key value="register_card"}-->
                        <span class="attention"><!--{$arrErr[$key]}--></span>

                        <!--{if !$tpl_plg_pg_mulpay_is_subscription}-->
                        <input type="checkbox" name="<!--{$key}-->" value="1" <!--{if $arrForm[$key].value != ""}-->checked<!--{/if}--> >
                        <label for="<!--{$key}-->">このカードを登録する。</label>
                        <!--{else}-->
                        <input type="hidden" name="<!--{$key}-->" value="1" />
                        <!--{$tpl_plg_pg_mulpay_subscription_name|h}-->では自動でカード登録します。
                        <!--{/if}-->
                        <p class="mini">カード情報を登録すると次回より入力無しで購入出来ます。<br />カード情報は当店では保管いたしません。<br />委託する決済代行会社にて安全に保管されます。</p>
                    </td>
                </tr>
                <!--{/if}-->
                <!--{if $tpl_pg_regist_card_max}-->
                <tr>
                    <th class="alignR">
                        カード情報登録
                    </th>
                    <td>
                        <span class="attention">カード情報が既に<!--{$smarty.const.MDL_PG_MULPAY_REGIST_CARD_NUM|h}-->個登録されています。<br />これ以上は新規で登録出来ません。</span>
                        <p class="mini">新たに登録したい場合は、大変お手数ですが後ほどマイページにて編集して下さい。</p>
                    </td>
                </tr>
                <!--{/if}-->
                <!--{/if}-->
            </table>

            <table>
                <tr>
                    <td>
                        If it’s correct regarding the above, please crick the following button “ NEXT”.<br />
                        <span class="attention">※It may take a little time to switch screen, please just a moment</span>
                    </td>
                </tr>
            </table>

            <div class="btn_area">
                <ul>
                    <!--{if !$tpl_btn_next}-->
                    <li class="form_btn">
                        <input type="image" onclick="return fnCheckSubmit('return');" src="/img/btn/return.png" class="btn_hover" width="100%" alt="戻る" border="0" name="back" id="back"/>
                    </li>
                    <!--{/if}-->
                    <li class="form_btn">
                    <!--{if $tpl_btn_next}-->
                        <input type="image" onclick="return fnCheckSubmit('next');" onmouseover="chgImg('<!--{$TPL_URLPATH}-->img/button/btn_next_on.jpg',this)" onmouseout="chgImg('<!--{$TPL_URLPATH}-->img/button/btn_next.jpg',this)" src="<!--{$TPL_URLPATH}-->img/button/btn_next.jpg" alt="次へ" border="0" name="next" id="next" />
                    <!--{else}-->
                        <input type="image" onclick="return fnCheckSubmit('next');" src="/img/btn/payment.png" class="btn_hover" width="100%" alt="ご注文完了ページへ"  name="next" id="next" />
                    <!--{/if}-->
                    </li>
                </ul>
            </div>

       </div><!--{* /payment_form_body *}-->