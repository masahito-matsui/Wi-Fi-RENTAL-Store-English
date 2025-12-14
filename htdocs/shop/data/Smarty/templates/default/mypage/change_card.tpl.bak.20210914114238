<!--{*
/*
 * Copyright(c) 2012 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 */
*}-->
<!--{assign var=key value="js_urlpath"}-->
<script src="<!--{$arrForm[$key].value|h}-->/ext/js/token.js"></script>
<!--{assign var=key value="ShopID"}-->
<script type="text/javascript">
    var send = true;

    function fnCheckSubmit() {
        if (send) {
            send = false;
            document.form2.submit();
            return false;
        } else {
            alert("只今、処理中です。しばらくお待ち下さい。");
            return false;
        }
    }

    function execPurchase(response) {
        if (response.resultCode != 000) {
            window.alert("カード登録処理中にエラーが発生しました");
            window.location.assign(window.location.href);
        } else {
            //カード情報は念のため値をhttp://sccm.tma.com.vn/CMApplicationCatalog/#/SoftwareLibrary/AppListPageView.xaml
            $("#CardNo").val('');
            $("#Expire_year").val('');
            $("#Expire_month").val('');
            $("#card_name1").val('');
            $("#card_name2").val('');

            //予め購入フォームに用意した token フィールドに、値を設定
            $("input:hidden[name='token']").val(response.tokenObject.token);

            fnCheckSubmit();
        }
    }

    function doPurchase() {
        if ("<!--{$enable_token}-->" == "") {
            fnCheckSubmit();
            return;
        }

        var cardno = $("#CardNo").val();
        if (cardno == "") {
            alert("※ カード番号が入力されていません。");
            return;
        }

        // カード番号の数値のみチェック
        var pat = /^\d*$/;
        if (!pat.test(cardno)) {
            alert("※ カード番号は数値で入力してください。");
            return;
        }

        // カード番号の7桁未満チェック
        if (cardno.length < 7) {
            alert("※ カード番号は7桁以上を入力してください。");
            return;
        }

        var date = new Date();
        var year = date.getFullYear();
        year = String(year);
        year = year.substring(0,2);
        var mm = $("#Expire_month").val();
        if (mm == "") {
            alert("※ 有効期限：月が入力されていません。");
            return;
        }
        var yy = $("#Expire_year").val();
        if (yy == "") {
            alert("※ 有効期限：年が入力されていません。");
            return;
        }
        var expire = year + yy + mm;

        var card_name1 = $("#card_name1").val();
        if (card_name1 == "") {
            alert("※ カード名義人名：名が入力されていません。");
            return;
        }
        var card_name2 = $("#card_name2").val();
        if (card_name2 == "") {
            alert("※ カード名義人名：姓が入力されていません。");
            return;
        }
        var holdername = card_name1.concat(card_name2);

        // Disable button 
        var btnAdd, btnDel, classBtnAdd, classBtnDel;
        btnAdd = document.getElementById("btnAdd");
        btnDel = document.getElementById("btnDel");
        classBtnAdd = document.getElementById("btnAdd").getAttribute('class');
        classBtnDel = document.getElementById("btnDel").getAttribute('class');
        btnAdd.setAttribute("class", classBtnAdd + " disabled");
        btnDel.setAttribute("class", classBtnDel + " disabled");

        Multipayment.init("<!--{$arrForm[$key].value|h}-->");
        Multipayment.getToken(
            {
                cardno: cardno,
                expire: expire,
                securitycode: '',
                holdername: holdername
            }, execPurchase
        );
    }
</script>

<div id="mypagecolumn">

    <h2 class="title"><!--{$tpl_title|h}--></h2>
    <!--{include file=$tpl_navi}-->
    <div id="mycontents_area">
        <h3>現在登録されているカード情報</h3>
        <form name="form1" id="form1" method="post" action="?">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <input type="hidden" name="mode" value="delete" />

        <!--{if !$arrData}-->
            <p>登録されているカード情報はありません。</p>
        <!--{else}-->
            <!--{if $arrErr}-->
            <div class="information">
            <!--{assign var=key value="CardSeq"}-->
                <p class="attention"><!--{$arrErr[$key]}--></p>
            <!--{assign var=key value="error"}-->
                <p class="attention"><!--{$arrErr[$key]}--></p>
            </div>
            <!--{/if}-->
            <!--{if $tpl_is_success}-->
            <div class="information">
                <p class="attention">正常に更新されました。</p>
            </div>
            <!--{/if}-->

            <table summary="クレジットカード選択">
                <colgroup width="10%"></colgroup>
                <colgroup width="5%"></colgroup>
                <colgroup width="85%"></colgroup>
                <tr>
                    <th class="alignC">選択<span class="attention">※</span></th>
                    <th colspan="2" class="alignC">登録カード番号選択</th>
                </tr>

                <!--{assign var=key1 value="CardSeq"}-->
                <!--{foreach from=$arrData item=data}-->
                <!--{if $data.DeleteFlag != '1'}-->
                <tr>
                    <th class="alignC">
                        <input type="radio" name="CardSeq" value="<!--{$data.CardSeq|h}-->" <!--{if $arrForm[$key1].value==$data.CardSeq}-->checked="checked"<!--{/if}--> <!--{if $tpl_plg_target_seq==$data.CardSeq}-->checked="checked"<!--{/if}-->/>
                    </th>
                    <td class="alignC">
                        <!--{$data.CardSeq|h}-->
                    </td>
                    <td>
                    カード番号: <!--{$data.CardNo|h}-->&nbsp;&nbsp; 有効期限: <!--{$data.Expire|substr:0:2|h}-->年<!--{$data.Expire|substr:2:2|h}-->月
                    <!--{if $data.HolderName != ''}-->&nbsp;&nbsp;カード名義：<!--{$data.HolderName}--><!--{/if}-->
                    </td>
                </tr>
                <!--{/if}-->
                <!--{/foreach}-->
            </table>
        <!--{/if}-->
        <div class="btn_area">
            <ul>
                <li>
                    <input type="submit" id="btnDel" value="選択した情報を削除" />
                </li>
            </ul>
        </div>
        </form>

        <h3>カード情報を新規登録</h3>
        <form name="form2" id="form2" method="post" action="?">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <input type="hidden" name="mode" value="regist" />
        <input type="hidden" name="token" value="" />
        <div class="information">
            <p>下記項目にご入力ください。「<span class="attention">※</span>」印は入力必須項目です。<br />
                入力後、一番下の「登録する」ボタンをクリックしてください。</p>
            <!--{assign var=key value="error2"}-->
            <p class="attention"><!--{$arrErr[$key]}--></p>
        </div>

            <table summary="クレジットカード番号入力">
                <colgroup width="20%"></colgroup>
                <colgroup width="80%"></colgroup>
                <tr>
                    <th colspan="2" class="alignC"><!--{$tpl_title|h}-->番号入力</th>
                </tr>
                <tr>
                    <th class="alignR">
                        カード番号<span class="attention">※</span>
                    </th>
                    <td>
                    <!--{assign var=key1 value="CardNo"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <input type="text" id="<!--{$key1}-->" name="<!--{$key1}-->" value="" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key1]|sfGetErrorColor}-->"  size="16" class="box120" />
                    </td>
                </tr>
                <tr>
                    <th class="alignR">
                        カード有効期限<span class="attention">※</span>
                    </th>
                    <td>
                    <!--{assign var=key1 value="Expire_month"}-->
                    <!--{assign var=key2 value="Expire_year"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <select id="<!--{$key1}-->" name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->">
                    <option value="">&minus;&minus;</option>
                    <!--{html_options options=$arrMonth}-->
                    </select>月
                    &nbsp;/&nbsp;
                    20<select id="<!--{$key2}-->" name="<!--{$key2}-->" style="<!--{$arrErr[$key2]|sfGetErrorColor}-->">
                    <option value="">&minus;&minus;</option>
                    <!--{html_options options=$arrYear}-->
                    </select>年
                    </td>
                </tr>
                <tr>
                    <th class="alignR">
                        カード名義<span class="attention">※</span>
                    </th>
                    <td>
                        <!--{assign var=key1 value="card_name1"}-->
                        <!--{assign var=key2 value="card_name2"}-->
                        <span class="attention"><!--{$arrErr[$key1]}--></span>
                        <span class="attention"><!--{$arrErr[$key2]}--></span>
                        名:<input type="text" id="<!--{$key1}-->" name="<!--{$key1}-->" value="" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key1]|sfGetErrorColor}-->" size="20" class="box120" />
                        &nbsp;
                        姓:<input type="text" id="<!--{$key2}-->" name="<!--{$key2}-->" value="" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key2]|sfGetErrorColor}-->" size="20" class="box120" />
                        <p class="mini"><span class="attention">カードに記載の名前をご記入下さい。ご本人名義のカードをご使用ください。</span>半角英文字入力（例：TARO YAMADA）</p>
                    </td>
                </tr>
            </table>

        <div class="btn_area">
            <ul>
                <li>
                    <input type="button" id="btnAdd" value="カード情報を登録" onclick="doPurchase();" />
                </li>
            </ul>
        </div>
        </form>
    </div>
</div>
