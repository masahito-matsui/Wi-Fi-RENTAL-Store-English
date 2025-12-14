<!--{*
 * Copyright(c) 2012-2013 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 * Updated: 2013/06/19
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
        alert("只今、処理中です。しばらくお待ち下さい。");
        return false;
    }
}
function fnAutoLoadSubmit() {
    var mode = 'load';
    send = false;
    fnModeSubmit('load','','');
}
$(function() {
    <!--{$tpl_payment_onload}-->
});
//]]>
</script>
<!--{assign var=key value="js_urlpath"}-->
<script src="<!--{$arrForm[$key].value|h}-->/ext/js/token.js"></script>
<script type="text/javascript">
    function clearSecurityCode() {
        if ($("#SecurityCode").size()) {
            $("#SecurityCode").val('');
        }
    }

    function execPurchase(response) {
        if (response.resultCode != 000) {
            window.alert("購入処理中にエラーが発生しました");
            window.location.assign(window.location.href);
        } else {
            //カード情報は念のため値をhttp://sccm.tma.com.vn/CMApplicationCatalog/#/SoftwareLibrary/AppListPageView.xaml
            $("#CardNo").val('');
            $("#Expire_year").val('');
            $("#Expire_month").val('');

            clearSecurityCode();

            //予め購入フォームに用意した token フィールドに、値を設定
            $("input:hidden[name='token']").val(response.tokenObject.token);
            $("input:hidden[name='Method']").val($("#Method").val());

            fnCheckSubmit("next");
        }
    }

    function doPurchase() {
        var cardno = $("#CardNo").val();
        if (cardno == "") {
            alert("※ カード番号が入力されていません。");
            clearSecurityCode();
            return;
        }

        // カード番号の数値のみチェック
        var pat = /^\d*$/;
        if (!pat.test(cardno)) {
            alert("※ カード番号は数値で入力してください。");
            clearSecurityCode();
            return;
        }

        // カード番号の7桁未満チェック
        if (cardno.length < 7) {
            alert("※ カード番号は7桁以上を入力してください。");
            clearSecurityCode();
            return;
        }

        var date = new Date();
        var year = date.getFullYear();
        year = String(year);
        year = year.substring(0,2);
        var mm = $("#Expire_month").val();
        if (mm == "") {
            alert("※ 有効期限：月が入力されていません。");
            clearSecurityCode();
            return;
        }
        var yy = $("#Expire_year").val();
        if (yy == "") {
            alert("※ 有効期限：年が入力されていません。");
            clearSecurityCode();
            return;
        }
        var expire = year + yy + mm;

        var card_name1 = $("#card_name1").val();
        if (card_name1 == "") {
            alert("※ カード名義人名：名が入力されていません。");
            clearSecurityCode();
            return;
        }
        var card_name2 = $("#card_name2").val();
        if (card_name2 == "") {
            alert("※ カード名義人名：姓が入力されていません。");
            clearSecurityCode();
            return;
        }
        var holdername = card_name1.concat(card_name2);

        var securityCode;
        var security_code = $("#SecurityCode");
        if (!security_code.size() || security_code.val() == "") {
            <!--{assign var=key value="security_code_check"}-->
            if ("<!--{$arrForm[$key].value|h}-->" == "1") {
                alert("※ セキュリティコードが入力されていません。");
                return;
            }
            securityCode = '';
        } else {
            securityCode = security_code.val();
        }

        // Disable button 
        var btnNext, btnBack, classBtnNext, classBtnBack;
        btnNext = document.getElementById("next");
        btnBack = document.getElementById("back");
        classBtnNext = document.getElementById("next").getAttribute('class');
        classBtnBack = document.getElementById("back").getAttribute('class');
        btnNext.setAttribute("class", classBtnNext + " disabled");
        btnBack.setAttribute("class", classBtnBack + " disabled");

        <!--{assign var=key value="ShopID"}-->
        Multipayment.init("<!--{$arrForm[$key].value|h}-->");
        Multipayment.getToken(
            {
                cardno: cardno,
                expire: expire,
                securitycode: securityCode,
                holdername: holdername
            }, execPurchase
        );
    }
</script>
        <!--{if $tpl_is_td_tran}-->
        <section id="payment_form_td_tran" style="<!--{if !$tpl_is_td_tran}-->display:none;<!--{/if}-->">
            <div class="information">
                <p>本人認証サービス(3-Dセキュア認証)の画面に移動します。</p>
            </div>
            <div class="bubbleBox hot">
                <div class="bubble_announce clearfix">
                    本人認証サービス（3-Dセキュア認証）を続けます。<br />
                    自動で移動しない場合は「次へ」ボタンをクリックして下さい。<br />
                </div>
                <div class="information end">
                    <span class="attention">※画面が切り替るまで少々時間がかかる場合がございますが、そのままお待ちください。</span>
                </div>
            </div>
            <div class="bubbleBox hot">
                <div class="bubble_announce clearfix">
                    <img src="<!--{$smarty.const.MDL_PG_MULPAY_MEDIAFILE_URL}-->loading.gif" />
                </div>
            </div>
            <div class="btn_area">
                <ul class="btn_btm">

                        <li>
                        <!--{if $tpl_btn_next}-->
                            <a rel="external" href="javascript:void(fnCheckSubmit('next'));" class="btn"/>次へ</a>
                        <!--{/if}-->
                        </li>

                        <!--{if !$tpl_btn_next}-->
                        <li>
                            <a rel="external" href="javascript:void(fnCheckSubmit('return'));" class="btn_back"/>戻る</a>
                        </li>
                        <!--{/if}-->
                </ul>
            </div>
        </section>
        <input type="hidden" name="PaReq" value="<!--{$arrTdData.PaReq}-->" />
        <input type="hidden" name="TermUrl" value="<!--{$arrTdData.TermUrl}-->" />
        <input type="hidden" name="MD" value="<!--{$arrTdData.MD}-->" />

        <!--{/if}-->

        <!--{if !$tpl_is_td_tran}-->
        <section id="payment_form_loading" style="<!--{if !$tpl_is_loding}-->display:none;<!--{/if}-->">
            <div class="information end">
                <p>決済処理中です。しばらくお待ち下さい。</p>
            </div>
            <div class="bubbleBox hot">
                <div class="bubble_announce clearfix">
                    <img src="<!--{$smarty.const.MDL_PG_MULPAY_MEDIAFILE_URL}-->loading.gif" />
                </div>
            </div>
        </section>
        <!--{/if}-->
        <section id="payment_form_body" style="<!--{if $tpl_is_loding}-->display:none;<!--{/if}-->">
            <div class="information end">
                <p>下記項目にご入力ください。「<span class="attention">※</span>」印は入力必須項目です。<br />
                入力後、一番下の「ご注文完了ページへ」ボタンをクリックしてください。</p>
                <!--{assign var=key value="payment"}-->
                <p class="attention"><!--{$arrErr[$key]}--></p>
            </div>
                <h3 class="subtitle"><!--{$tpl_title|h}-->番号入力</h3>
                <dl class="form_entry">
                    <dt>
                        カード番号<span class="attention">※</span>
                    </dt>
                    <dd>
                    <!--{assign var=key1 value="CardNo"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <input type="tel" id="<!--{$key1}-->" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|h}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key1]|sfGetErrorColor}-->"  size="16" class="box120" pattern="\d*" />
                    </dd>

                    <dt>
                        カード有効期限<span class="attention">※</span>
                    </dt>
                    <dd>
                    <!--{assign var=key1 value="Expire_month"}-->
                    <!--{assign var=key2 value="Expire_year"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <select id="<!--{$key1}-->" name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"  class="boxShort data-role-none">
                    <option value="">&minus;&minus;</option>
                    <!--{html_options options=$arrMonth selected=$arrForm[$key1].value|default:''}-->
                    </select>月
                    &nbsp;/&nbsp;
                    20<select id="<!--{$key2}-->" name="<!--{$key2}-->" style="<!--{$arrErr[$key2]|sfGetErrorColor}-->" class="boxShort data-role-none">
                    <option value="">&minus;&minus;</option>
                    <!--{html_options options=$arrYear selected=$arrForm[$key2].value|default:''}-->
                    </select>年
                    </dd>

                    <dt>
                        カード名義<span class="attention">※</span>
                    </dt>
                    <dd>
                        <!--{assign var=key1 value="card_name1"}-->
                        <!--{assign var=key2 value="card_name2"}-->
                        <span class="attention"><!--{$arrErr[$key1]}--></span>
                        <span class="attention"><!--{$arrErr[$key2]}--></span>
                        名:<input type="text" id="<!--{$key1}-->" name="<!--{$key1}-->" value="" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key1]|sfGetErrorColor}-->" size="20" class="box120" />
                        &nbsp;
                        姓:<input type="text" id="<!--{$key2}-->" name="<!--{$key2}-->" value="" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key2]|sfGetErrorColor}-->" size="20" class="box120" />
                        <p class="mini"><span class="attention">カードに記載の名前をご記入下さい。ご本人名義のカードをご使用ください。</span>半角英文字入力（例：TARO YAMADA）</p>
                    </dd>

                <!--{if $arrPaymentInfo.use_securitycd == '1'}-->
                    <dt>
                        セキュリティコード<!--{if $arrPaymentInfo.use_securitycd_option != '1'}--><span class="attention">※</span><!--{/if}-->
                    </dt>
                    <dd>
                        <!--{assign var=key value="SecurityCode"}-->
                        <span class="attention"><!--{$arrErr[$key]}--></span>
                        <input type="text" id="<!--{$key}-->" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" maxlength="<!--{$arrForm[$key].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key]|sfGetErrorColor}-->"  size="4" class="box60" />
                        <p class="mini"><span class="attention">※主にカード裏面の署名欄に記載されている末尾３桁～４桁の数字をご記入下さい。</span>半角入力 (例: 123)</p>
                    </dd>
                <!--{/if}-->

                    <dt>
                        支払い方法<span class="attention">※</span>
                    </dt>
                    <dd>
                        <!--{assign var=key1 value="Method"}-->
                        <span class="attention"><!--{$arrErr[$key1]}--></span>
                        <select id="<!--{$key1}-->" name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" class="boxShort data-role-none">
                        <!--{html_options options=$arrPayMethod selected=$arrForm[$key1].value|default:''}-->
                        </select>
                    </dd>
                <!--{if $arrPaymentInfo.enable_customer_regist && $tpl_pg_regist_card_form}-->

                    <dt>
                        カード情報登録
                    </dt>
                    <dd>
                        <!--{assign var=key value="register_card"}-->
                        <span class="attention"><!--{$arrErr[$key]}--></span>
                        <!--{if !$tpl_plg_pg_mulpay_is_subscription}-->
                        <input type="checkbox" class="radio_btn data-role-none" name="<!--{$key}-->" value="1" <!--{if $arrForm[$key].value != ""}-->checked<!--{/if}--> >
                        <label for="<!--{$key}-->"><span class="fb">このカードを登録する。</span></label>
                        <!--{else}-->
                        <p class="mini">カード情報を登録すると次回より入力無しで購入出来ます。<br />カード情報は当店では保管いたしません。<br />委託する決済代行会社にて安全に保管されます。</p>
                        <input type="hidden" name="<!--{$key}-->" value="1" />
                        <!--{$tpl_plg_pg_mulpay_subscription_name|h}-->では自動でカード登録します。
                        <!--{/if}-->

                    </dd>
                <!--{/if}-->
                </dl>

            <div class="btn_area">
                <ul class="btn_btm">

                        <li>
                        <!--{if $tpl_btn_next}-->
                            <a rel="external" href="javascript:void(fnCheckSubmit('next'));" class="btn"/>次へ</a>
                        <!--{else}-->
                            <a rel="external" id="next" href="javascript:void(doPurchase());" class="btn"/>ご注文完了ページへ</a>
                        <!--{/if}-->
                        </li>

                        <!--{if !$tpl_btn_next}-->
                        <li>
                            <a rel="external" id="back" href="javascript:void(fnCheckSubmit('return'));" class="btn_back"/>戻る</a>
                        </li>
                        <!--{/if}-->
                </ul>
            </div>
       </section><!--{* /payment_form_body *}-->

