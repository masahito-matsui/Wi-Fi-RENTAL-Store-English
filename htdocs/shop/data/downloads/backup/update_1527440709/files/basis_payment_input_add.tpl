<!--{*
 * Copyright(c) 2012-2013 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 * Updated: 2013/01/10
 *}-->

<!--{if $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_CREDIT || $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_REGIST_CREDIT || $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_CREDIT_CHECK || $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_CREDIT_SAUTH}-->

    <!--{if $plg_pg_mulpay_payid != MDL_PG_MULPAY_PAYID_CREDIT_CHECK && $plg_pg_mulpay_payid != MDL_PG_MULPAY_PAYID_CREDIT_SAUTH}-->
            <tr>
                <th>処理区分<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key value="JobCd"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name=$arrForm[$key].keyname options=$arrPgMulpayJobCds selected=$arrForm[$key].value separator="&nbsp;"}-->

                    <span style="font-size:80%"><br />
仮売上(AUTH)<br />
　　・・・カードの与信枠を確保し承認番号を得ること。※仮売上のデータ保持期間は90日です。実売上処理を行わないとカード会社への売上データが作成されません。<br />
即時売上(CAPTURE)<br />
　　・・・カードの与信枠を確保し承認番号を得て、カード会社への売上データの作成依頼をすること。（仮売上+実売上の処理になります
。）
                    </span>
                </td>
            </tr>
    <!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_CREDIT_CHECK}-->
            <!--{assign var=key value="JobCd"}-->
            <input type="hidden" name="<!--{$arrForm[$key].keyname}-->" value="CHECK" />
    <!--{elseif $plg_pg_mulpay_payid != MDL_PG_MULPAY_PAYID_CREDIT_SAUTH}-->
            <!--{assign var=key value="JobCd"}-->
            <input type="hidden" name="<!--{$arrForm[$key].keyname}-->" value="SAUTH" />
    <!--{/if}-->
            <tr>
                <th>支払い種別<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key value="credit_pay_methods"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes name="$key" options=$arrPayMethod|escape selected=$arrForm[$key].value}-->
                    <span style="font-size:80%"><br />
                    ※有効にする支払い種別を選択して下さい。<br />
                    ※PGマルチペイメントサービスのショップ管理画面にてカード会社契約状況を確認のうえ、ご設定いただきますようお願いします。
                    </span>
                </td>
            </tr>
            <!--{if $plg_pg_mulpay_payid != MDL_PG_MULPAY_PAYID_REGIST_CREDIT}-->
            <tr>
                <th>セキュリティコード入力必須化</th>
                <td>
                    <!--{assign var=key value="use_securitycd"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name=$arrForm[$key].keyname options=$arrEnableFlags selected=$arrForm[$key].value separator="&nbsp;"}-->
                    <span style="font-size:80%"><br />
                    ※カード番号の裏面の3～4桁の番号を入力するようにします。
                    </span>
                    <br />
                    利用時にセキュリティコード入力で空欄を許可する
                    <!--{assign var=key value="use_securitycd_option"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name=$arrForm[$key].keyname options=$arrAllowFlags selected=$arrForm[$key].value separator="&nbsp;"}-->

                </td>
            </tr>
            <!--{else}-->
              <!--{assign var=key value="use_securitycd"}-->
              <input type="hidden" name="<!--{$arrForm[$key].keyname}-->" value="0" />
            <!--{/if}-->
            <tr>
                <th>本人認証サービス(3Dセキュア)</th>
                <td>
                    <!--{assign var=key value="TdFlag"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name=$arrForm[$key].keyname options=$arrEnableFlags selected=$arrForm[$key].value separator="&nbsp;"}-->
                    <span style="font-size:80%"><br />
                    ※本人認証サービスを使用するにはSSL環境が必要です。<br />
                    ※携帯電話(フューチャーフォン）の場合には通常の決済が実行されます。
                    </span>
                </td>
            </tr>
            <tr>
                <th>3Dセキュア表示店舗名</th>
                <td>
                    <!--{assign var=key value="TdTenantName"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" />                    <span class="attention">（半角英数18文字以内で入力）</span>
                    <span style="font-size:80%"><br />
                    ※本人認証サービスを利用しない場合、入力は不要です。<br />
                    設定した店舗名は、本人認証サービスのパスワード入力画面に表示する店舗名になります。<br />
                    日本語を設定された場合（特に全角）、文字の組み合わせによっては文字化けを起こす、もしくはエラーとなり決済できないことがございます。<br />3Dセキュア表示店舗名には、可能でしたら半角にて設定いただき、十分な検証をおこなっていただくことを推奨いたします。

                    </span>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_CVS}-->
            <tr>
                <th>コンビニ選択<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key value="conveni"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes name="$key" options=$arrCONVENI|escape selected=$arrForm[$key].value}-->

                    <span style="font-size:80%"><br />
                    ご契約していて利用出来るコンビニを選択して下さい。
                    </span>
                </td>
            </tr>
            <tr>
                <th>支払期限</th>
                <td>
                    <!--{assign var=key value="PaymentTermDay"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    日
                    <span class="attention">（半角数字で入力）</span>
                    <span style="font-size:80%"><br />
                    ※省略時は、ショップ管理画面のショップ情報に設定された支払期限で処理されます。
                    </span>
                </td>
            </tr>
            <tr>
                <th>PGメール送信</th>
                <td>
                    <!--{assign var=key value="enable_mail"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name="$key" options=$arrEnableFlags|escape selected=$arrForm[$key].value}-->
                    <span style="font-size:80%"><br />
                    ※決済時にECサイトからと併せて、決済サーバーからもメールを送信するかどうかを設定します。
                    </span>
                </td>
            </tr>
            <tr id="cvs_mail" style="<!--{if $arrForm[$key].value != '1'}-->display:none;<!--{/if}-->">
                <th>コンビニ単位<br />PGメール送信有無</th>
                <td>
                    <!--{assign var=key value="enable_cvs_mails"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes name="$key" options=$arrCONVENI|escape selected=$arrForm[$key].value}-->
                    <br /><span class="attention">※メール送信したいコンビニにチェックを入れて下さい。</span>
                    <span style="font-size:80%"><br />
                    ※コンビニ毎で決済時にECサイトからと併せて、決済サーバーからもメールを送信するかどうかを設定します。
                    </span>
                </td>
            </tr>
<script type="text/javascript">//<![CDATA[

    $(function(){
            $('input[name="enable_mail"]:radio').change(
                function() {
                    if ($('input[name=enable_mail]:checked').val() == '1') {
                        $('#cvs_mail').show();
                    }else{
                        $('#cvs_mail').hide();
                    }
                });
            });
//]]></script>
            <tr>
                <th>POSレジ表示欄1（店名）</th>
                <td>
                    <!--{assign var=key value="RegisterDisp1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>POSレジ表示欄2</th>
                <td>
                    <!--{assign var=key value="RegisterDisp2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>POSレジ表示欄3</th>
                <td>
                    <!--{assign var=key value="RegisterDisp3"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>POSレジ表示欄4</th>
                <td>
                    <!--{assign var=key value="RegisterDisp4"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>POSレジ表示欄5</th>
                <td>
                    <!--{assign var=key value="RegisterDisp5"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>POSレジ表示欄6</th>
                <td>
                    <!--{assign var=key value="RegisterDisp6"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>POSレジ表示欄7</th>
                <td>
                    <!--{assign var=key value="RegisterDisp7"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>POSレジ表示欄8</th>
                <td>
                    <!--{assign var=key value="RegisterDisp8"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>レシート表示欄1</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                    <span style="font-size:80%"><br />
                    例）ご利用ありがとうございました。
                    </span>
                </td>
            </tr>
            <tr>
                <th>レシート表示欄2</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>レシート表示欄3</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp3"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>レシート表示欄4</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp4"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>レシート表示欄5</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp5"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>レシート表示欄6</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp6"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>レシート表示欄7</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp7"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>レシート表示欄8</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp8"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>レシート表示欄9</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp9"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>レシート表示欄10</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp10"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>お問合せ先<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp11"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>お問合せ先電話番号<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key1 value="ReceiptsDisp12_1"}-->
                    <!--{assign var=key2 value="ReceiptsDisp12_2"}-->
                    <!--{assign var=key3 value="ReceiptsDisp12_3"}-->
                    <!--{assign var=key4 value="ReceiptsDisp12"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <span class="attention"><!--{$arrErr[$key3]}--></span>
                    <span class="attention"><!--{$arrErr[$key4]}--></span>
                    <input type="text" name="<!--{$arrForm[$key1].keyname}-->" value="<!--{$arrForm[$key1].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key1]|sfGetErrorColor}-->" />
                    &nbsp;&minus;&nbsp;
                    <input type="text" name="<!--{$arrForm[$key2].keyname}-->" value="<!--{$arrForm[$key2].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key2]|sfGetErrorColor}-->" />
                    &nbsp;&minus;&nbsp;
                    <input type="text" name="<!--{$arrForm[$key3].keyname}-->" value="<!--{$arrForm[$key3].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key3].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key3]|sfGetErrorColor}-->" />
                    <span class="attention">（半角数字で入力）</span>
                </td>
            </tr>
            <tr>
                <th>お問合せ先受付時間<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key1 value="ReceiptsDisp13_1"}-->
                    <!--{assign var=key2 value="ReceiptsDisp13_2"}-->
                    <!--{assign var=key3 value="ReceiptsDisp13_3"}-->
                    <!--{assign var=key4 value="ReceiptsDisp13_4"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <span class="attention"><!--{$arrErr[$key3]}--></span>
                    <span class="attention"><!--{$arrErr[$key4]}--></span>
                    <select name="<!--{$arrForm[$key1].keyname}-->" id="<!--{$arrForm[$key1].keyname}-->">
                    <option value="" selected="selected"></option>
                    <!--{html_options options=$arrHour selected=$arrForm[$key1].value}-->
                    </select>
                    ：
                    <select name="<!--{$arrForm[$key2].keyname}-->" id="<!--{$arrForm[$key2].keyname}-->">
                    <option value="" selected="selected"></option>
                    <!--{html_options options=$arrMinutes selected=$arrForm[$key2].value}-->
                    </select>
                    &nbsp;&minus;&nbsp;
                    <select name="<!--{$arrForm[$key3].keyname}-->" id="<!--{$arrForm[$key3].keyname}-->">
                    <option value="" selected="selected"></option>
                    <!--{html_options options=$arrHour selected=$arrForm[$key3].value}-->
                    </select>
                    ：
                    <select name="<!--{$arrForm[$key4].keyname}-->" id="<!--{$arrForm[$key4].keyname}-->">
                    <option value="" selected="selected"></option>
                    <!--{html_options options=$arrMinutes selected=$arrForm[$key4].value}-->
                    </select>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_PAYEASY || $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_ATM}-->
            <tr>
                <th>支払期限</th>
                <td>
                    <!--{assign var=key1 value="PaymentTermDay"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <input type="text" name="<!--{$arrForm[$key1].keyname}-->" value="<!--{$arrForm[$key1].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key1]|sfGetErrorColor}-->" />
                    日
                    <span class="attention">（半角数字で入力）</span>
                    <span style="font-size:80%"><br />
                    ※省略時は、ショップ管理画面のショップ情報に設定された支払期限で処理されます。
                    </span>
                </td>
            </tr>
            <tr>
                <th>PGメール送信</th>
                <td>
                    <!--{assign var=key value="enable_mail"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name="$key" options=$arrEnableFlags|escape selected=$arrForm[$key].value}-->
                    <span style="font-size:80%"><br />
                    ※決済時にECサイトからと併せて、決済サーバーからもメールを送信するかどうかを設定します。
                    </span>
                </td>
            </tr>
            <!--{if $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_PAYEASY}-->
            <tr>
                <th>ネットバンキング用金融機関選択画面(PC)</th>
                <td>
                    <!--{assign var=key value="SelectPageCall_PC"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="60" class="box60" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（決済サーバー ショップ管理画面のURLを設定）</span>
                </td>
            </tr>
            <tr>
                <th>ネットバンキング用金融機関選択画面(携帯)</th>
                <td>
                    <!--{assign var=key value="SelectPageCall_Mobile"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="60" class="box60" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（決済サーバー ショップ管理画面のURLを設定）</span>
                </td>
            </tr>
            <!--{/if}-->
            <!--{if $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_ATM}-->
            <tr>
                <th>ATM表示欄1(店名)</th>
                <td>
                    <!--{assign var=key value="RegisterDisp1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>ATM表示欄2</th>
                <td>
                    <!--{assign var=key value="RegisterDisp2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>ATM表示欄3</th>
                <td>
                    <!--{assign var=key value="RegisterDisp3"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>ATM表示欄4</th>
                <td>
                    <!--{assign var=key value="RegisterDisp4"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>ATM表示欄5</th>
                <td>
                    <!--{assign var=key value="RegisterDisp5"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>ATM表示欄6</th>
                <td>
                    <!--{assign var=key value="RegisterDisp6"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>ATM表示欄7</th>
                <td>
                    <!--{assign var=key value="RegisterDisp7"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>ATM表示欄8</th>
                <td>
                    <!--{assign var=key value="RegisterDisp8"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <!--{/if}-->
            <tr>
                <th>利用明細表示欄1</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                    <span style="font-size:80%"><br />
                    例）ご利用ありがとうございました。
                    </span>
                </td>
            </tr>
            <tr>
                <th>利用明細表示欄2</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>利用明細表示欄3</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp3"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>利用明細表示欄4</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp4"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>利用明細表示欄5</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp5"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>利用明細表示欄6</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp6"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>利用明細表示欄7</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp7"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>利用明細表示欄8</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp8"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>利用明細表示欄9</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp9"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>利用明細表示欄10</th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp10"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>お問合せ先<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key value="ReceiptsDisp11"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>お問合せ先電話番号<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key1 value="ReceiptsDisp12_1"}-->
                    <!--{assign var=key2 value="ReceiptsDisp12_2"}-->
                    <!--{assign var=key3 value="ReceiptsDisp12_3"}-->
                    <!--{assign var=key4 value="ReceiptsDisp12"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <span class="attention"><!--{$arrErr[$key3]}--></span>
                    <span class="attention"><!--{$arrErr[$key4]}--></span>
                    <input type="text" name="<!--{$arrForm[$key1].keyname}-->" value="<!--{$arrForm[$key1].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key1]|sfGetErrorColor}-->" />
                    &nbsp;&minus;&nbsp;
                    <input type="text" name="<!--{$arrForm[$key2].keyname}-->" value="<!--{$arrForm[$key2].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key2]|sfGetErrorColor}-->" />
                    &nbsp;&minus;&nbsp;
                    <input type="text" name="<!--{$arrForm[$key3].keyname}-->" value="<!--{$arrForm[$key3].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key3].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key3]|sfGetErrorColor}-->" />
                    <span class="attention">（半角数字で入力）</span>
                </td>
            </tr>
            <tr>
                <th>お問合せ先受付時間<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key1 value="ReceiptsDisp13_1"}-->
                    <!--{assign var=key2 value="ReceiptsDisp13_2"}-->
                    <!--{assign var=key3 value="ReceiptsDisp13_3"}-->
                    <!--{assign var=key4 value="ReceiptsDisp13_4"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <span class="attention"><!--{$arrErr[$key3]}--></span>
                    <span class="attention"><!--{$arrErr[$key4]}--></span>
                    <select name="<!--{$arrForm[$key1].keyname}-->" id="<!--{$arrForm[$key1].keyname}-->">
                    <option value="" selected="selected"></option>
                    <!--{html_options options=$arrHour selected=$arrForm[$key1].value}-->
                    </select>
                    ：
                    <select name="<!--{$arrForm[$key2].keyname}-->" id="<!--{$arrForm[$key2].keyname}-->">
                    <option value="" selected="selected"></option>
                    <!--{html_options options=$arrMinutes selected=$arrForm[$key2].value}-->
                    </select>
                    &nbsp;&minus;&nbsp;
                    <select name="<!--{$arrForm[$key3].keyname}-->" id="<!--{$arrForm[$key3].keyname}-->">
                    <option value="" selected="selected"></option>
                    <!--{html_options options=$arrHour selected=$arrForm[$key3].value}-->
                    </select>
                    ：
                    <select name="<!--{$arrForm[$key4].keyname}-->" id="<!--{$arrForm[$key4].keyname}-->">
                    <option value="" selected="selected"></option>
                    <!--{html_options options=$arrMinutes selected=$arrForm[$key4].value}-->
                    </select>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_MOBILEEDY}-->
            <tr>
                <th>支払期限</th>
                <td>
                    <!--{assign var=key1 value="PaymentTermDay"}-->
                    <!--{assign var=key2 value="PaymentTermSec"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <input type="text" name="<!--{$arrForm[$key1].keyname}-->" value="<!--{$arrForm[$key1].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key1]|sfGetErrorColor}-->" />
                    日&nbsp;
                    <input type="text" name="<!--{$arrForm[$key2].keyname}-->" value="<!--{$arrForm[$key2].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key2]|sfGetErrorColor}-->" />
                    秒
                    <span class="attention">（半角数字で入力、秒数最大86400）</span>
                    <span style="font-size:80%"><br />
                    ※省略時は、ショップ管理画面のショップ情報に設定された支払期限で処理されます。
                    </span>
                </td>
            </tr>
            <tr>
                <th>決済開始メール付加情報</th>
                <td>
                    <!--{assign var=key value="EdyAddInfo1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="60" class="box60" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>決済完了メール付加情報</th>
                <td>
                    <!--{assign var=key value="EdyAddInfo2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="60" class="box60" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_MOBILESUICA}-->
            <tr>
                <th>支払期限</th>
                <td>
                    <!--{assign var=key1 value="PaymentTermDay"}-->
                    <!--{assign var=key2 value="PaymentTermSec"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <input type="text" name="<!--{$arrForm[$key1].keyname}-->" value="<!--{$arrForm[$key1].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key1]|sfGetErrorColor}-->" />
                    日&nbsp;
                    <input type="text" name="<!--{$arrForm[$key2].keyname}-->" value="<!--{$arrForm[$key2].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key2]|sfGetErrorColor}-->" />
                    秒
                    <span class="attention">（半角数字で入力、秒数最大86400）</span>
                    <span style="font-size:80%"><br />
                    ※省略時は、ショップ管理画面のショップ情報に設定された支払期限で処理されます。
                    </span>
                </td>
            </tr>
            <tr>
                <th>決済開始メール付加情報</th>
                <td>
                    <!--{assign var=key value="SuicaAddInfo1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="60" class="box60" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>決済完了メール付加情報</th>
                <td>
                    <!--{assign var=key value="SuicaAddInfo2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="60" class="box60" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>決済内容確認画面付加情報</th>
                <td>
                    <!--{assign var=key value="SuicaAddInfo3"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="60" class="box60" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>決済完了画面付加情報</th>
                <td>
                    <!--{assign var=key value="SuicaAddInfo4"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="60" class="box60" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_PAYPAL}-->
            <!--{assign var=key value="JobCd"}-->
            <input type="hidden" name="<!--{$arrForm[$key].keyname}-->" value="CAPTURE" />
            <tr>
                <th>通貨コード</th>
                <td>
                    <!--{assign var=key value="Currency"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />                    <span class="attention">（半角英字を入力、省略時JPY[日本円]）</span>
                </td>
            </tr>
            <tr>
                <th>PGメール送信</th>
                <td>
                    <!--{assign var=key value="enable_mail"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name="$key" options=$arrEnableFlags|escape selected=$arrForm[$key].value}-->
                    <span style="font-size:80%"><br />
                    ※決済時にECサイトからと併せて、決済サーバーからもメールを送信するかどうかを設定します。
                    </span>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_IDNET}-->
            <tr>
                <th>処理区分<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key value="JobCd"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name=$arrForm[$key].keyname options=$arrPgMulpayJobCds selected=$arrForm[$key].value separator="&nbsp;"}-->

                    <span style="font-size:80%"><br />
仮売上(AUTH)<br />
　　・・・カードの与信枠を確保し承認番号を得ること。※仮売上のデータ保持期間は90日です。実売上処理を行わないとカード会社への売上データが作成されません。<br /><br />
即時売上(CAPTURE)<br />
　　・・・カードの与信枠を確保し承認番号を得て、カード会社への売上データの作成依頼をすること。（仮売上+実売上の処理になります
。）
                    </span>
                </td>
            </tr>
            <tr>
                <th>支払期限</th>
                <td>
                    <!--{assign var=key1 value="PaymentTermDay"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <input type="text" name="<!--{$arrForm[$key1].keyname}-->" value="<!--{$arrForm[$key1].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key1]|sfGetErrorColor}-->" />
                    日
                    <span class="attention">（半角数字で入力）</span>
                    <span style="font-size:80%"><br />
                    ※省略時は、ショップ管理画面のショップ情報に設定された支払期限で処理されます。
                    </span>
                </td>
            </tr>
            <tr>
                <th>PGメール送信</th>
                <td>
                    <!--{assign var=key value="enable_mail"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name="$key" options=$arrEnableFlags|escape selected=$arrForm[$key].value}-->
                    <span style="font-size:80%"><br />
                    ※決済時にECサイトからと併せて、決済サーバーからもメールを送信するかどうかを設定します。
                    </span>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_WEBMONEY}-->
            <tr>
                <th>支払期限</th>
                <td>
                    <!--{assign var=key1 value="PaymentTermDay"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <input type="text" name="<!--{$arrForm[$key1].keyname}-->" value="<!--{$arrForm[$key1].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key1]|sfGetErrorColor}-->" />
                    日
                    <span class="attention">（半角数字で入力）</span>
                    <span style="font-size:80%"><br />
                    ※省略時は、ショップ管理画面のショップ情報に設定された支払期限で処理されます。
                    </span>
                </td>
            </tr>
            <tr>
                <th>PGメール送信</th>
                <td>
                    <!--{assign var=key value="enable_mail"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name="$key" options=$arrEnableFlags|escape selected=$arrForm[$key].value}-->
                    <span style="font-size:80%"><br />
                    ※決済時にECサイトからと併せて、決済サーバーからもメールを送信するかどうかを設定します。
                    </span>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_AU}-->
            <tr>
                <th>処理区分<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key value="JobCd"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name=$arrForm[$key].keyname options=$arrPgMulpayJobCds selected=$arrForm[$key].value separator="&nbsp;"}-->

                    <span style="font-size:80%"><br />
仮売上(AUTH)<br />
　　・・・カードの与信枠を確保し承認番号を得ること。※仮売上のデータ保持期間は90日です。実売上処理を行わないとカード会社への売上データが作成されません。<br /><br />
即時売上(CAPTURE)<br />
　　・・・カードの与信枠を確保し承認番号を得て、カード会社への売上データの作成依頼をすること。（仮売上+実売上の処理になります
。）
                    </span>
                </td>
            </tr>
            <tr>
                <th>支払期限</th>
                <td>
                    <!--{assign var=key2 value="PaymentTermSec"}-->
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <input type="text" name="<!--{$arrForm[$key2].keyname}-->" value="<!--{$arrForm[$key2].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key2]|sfGetErrorColor}-->" />
                    秒
                    <span class="attention">（半角数字で入力、秒数最大86400）</span>
                    <span style="font-size:80%"><br />
                    ※省略時は、ショップ管理画面のショップ情報に設定された支払期限で処理されます。
                    </span>
                </td>
            </tr>
            <tr>
                <th>サービス名（店名）<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key value="ServiceName"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>表示電話番号<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key1 value="ServiceTel_1"}-->
                    <!--{assign var=key2 value="ServiceTel_2"}-->
                    <!--{assign var=key3 value="ServiceTel_3"}-->
                    <!--{assign var=key4 value="ServiceTel"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <span class="attention"><!--{$arrErr[$key3]}--></span>
                    <span class="attention"><!--{$arrErr[$key4]}--></span>
                    <input type="text" name="<!--{$arrForm[$key1].keyname}-->" value="<!--{$arrForm[$key1].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key1]|sfGetErrorColor}-->" />
                    &nbsp;&minus;&nbsp;
                    <input type="text" name="<!--{$arrForm[$key2].keyname}-->" value="<!--{$arrForm[$key2].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key2]|sfGetErrorColor}-->" />
                    &nbsp;&minus;&nbsp;
                    <input type="text" name="<!--{$arrForm[$key3].keyname}-->" value="<!--{$arrForm[$key3].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key3].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key3]|sfGetErrorColor}-->" />
                    <span class="attention">（半角数字で入力）</span>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_DOCOMO}-->
            <tr>
                <th>処理区分<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key value="JobCd"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name=$arrForm[$key].keyname options=$arrPgMulpayJobCds selected=$arrForm[$key].value separator="&nbsp;"}-->

                    <span style="font-size:80%"><br />
仮売上(AUTH)<br />
　　・・・与信枠を確保し承認番号を得ること。※実売上までの猶予期間は翌々月末20時までです。実売上処理を行わないと売上データが作成されません。<br /><br />
即時売上(CAPTURE)<br />
　　・・・与信枠を確保し承認番号を得て、同時に売上データの作成依頼をすること。（仮売上+実売上の処理になります
。）
                    </span>
                </td>
            </tr>
            <tr>
                <th>支払期限</th>
                <td>
                    <!--{assign var=key2 value="PaymentTermSec"}-->
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <input type="text" name="<!--{$arrForm[$key2].keyname}-->" value="<!--{$arrForm[$key2].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key2]|sfGetErrorColor}-->" />
                    秒
                    <span class="attention">（半角数字で入力、秒数最大86400）</span>
                    <span style="font-size:80%"><br />
                    ※省略時は、ショップ管理画面のショップ情報に設定された支払期限で処理されます。
                    </span>
                </td>
            </tr>
            <tr>
                <th>ドコモ表示項目1</th>
                <td>
                    <!--{assign var=key value="DocomoDisp1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                    <span style="font-size:80%"><br />
                    ※spモードの場合のみ、以下のドコモケータイ払い画面に表示されます。<br />・決済内容確認画面<br />・利用明細<br />商品の詳細説明や、お客様へのメッセージなどにご使用下さい。
                    </span>
                </td>
            </tr>
            <tr>
                <th>ドコモ表示項目2</th>
                <td>
                    <!--{assign var=key value="DocomoDisp2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                    <span style="font-size:80%"><br />
                    ※spモードの場合のみ、以下のドコモケータイ払い画面に表示されます。<br />・決済内容確認画面<br />・利用明細<br />商品の詳細説明や、お客様へのメッセージなどにご使用下さい。
                    </span>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_SB}-->
            <tr>
                <th>処理区分<span class="attention"> *</span></th>
                <td>
                    <!--{assign var=key value="JobCd"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_radios name=$arrForm[$key].keyname options=$arrPgMulpayJobCds selected=$arrForm[$key].value separator="&nbsp;"}-->

                    <span style="font-size:80%"><br />
仮売上(AUTH)<br />
　　・・・決済の与信枠を確保し承認番号を得ること。※仮売上のデータ保持期間は60日です。実売上処理を行わないと決済会社への売上データが作成されません。<br /><br />
即時売上(CAPTURE)<br />
　　・・・決済の与信枠を確保し承認番号を得て、決済会社への売上データの作成依頼をすること。（仮売上+実売上の処理になります
。）
                    </span>
                </td>
            </tr>
            <tr>
                <th>支払期限</th>
                <td>
                    <!--{assign var=key2 value="PaymentTermSec"}-->
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <input type="text" name="<!--{$arrForm[$key2].keyname}-->" value="<!--{$arrForm[$key2].value|h}-->" size="6" class="box6" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled;<!--{$arrErr[$key2]|sfGetErrorColor}-->" />
                    秒
                    <span class="attention">（半角数字で入力、秒数最大86400）</span>
                    <span style="font-size:80%"><br />
                    ※省略時は、支払期限120秒として処理されます。
                    </span>
                </td>
            </tr>
<!--{elseif $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_COLLECT}-->
<!--{/if}-->

<!--{if $plg_pg_mulpay_payid != "" && $plg_pg_mulpay_payid != MDL_PG_MULPAY_PAYID_COLLECT}-->
<!--{* 共通設定項目 *}-->
            <tr>
                <th>決済完了案内タイトル</th>
                <td>
                    <!--{assign var=key value="order_mail_title1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                    <span style="font-size:80%"><br />
                    ご注文完了画面とご注文完了メールに、支払いに関する案内文を入れる場合にはタイトルと本文を入れて下さい。(両方入っていない場合は有効になりません。)<br
 />
                    </span>
                </td>
            </tr>
            <tr>
                <th>決済完了案内本文</th>
                <td>
                    <!--{assign var=key value="order_mail_body1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>                                                                        <textarea name="<!--{$arrForm[$key].keyname}-->" maxlength="<!--{$arrForm[$key].length}-->" cols="60" rows="4" class="area60" style="<!--{$arrErr[$key]|sfGetErrorColor}-->"><!--{"\n"}--><!--{$arrForm[$key].value|h}--></textarea>
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
<!--{if $plg_pg_mulpay_payid == MDL_PG_MULPAY_PAYID_CVS}-->
  <!--{foreach from=$arrCONVENI item=cvs_name key=cvs_key}-->
            <tr>
                <th><!--{$cvs_name|h}--><br />決済完了案内タイトル</th>
                <td>
                    <!--{assign var=key value="order_mail_title_`$cvs_key`"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th><!--{$cvs_name|h}--><br />決済完了案内本文</th>
                <td>
                    <!--{assign var=key value="order_mail_body_`$cvs_key`"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>                                                                        <textarea name="<!--{$arrForm[$key].keyname}-->" maxlength="<!--{$arrForm[$key].length}-->" cols="60" rows="4" class="area60" style="<!--{$arrErr[$key]|sfGetErrorColor}-->"><!--{"\n"}--><!--{$arrForm[$key].value|h}--></textarea>
                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
  <!--{/foreach}-->
<!--{/if}-->

            <tr>
                <th>自由項目1</th>
                <td>
                    <!--{assign var=key value="ClientField1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
            <tr>
                <th>自由項目2</th>
                <td>
                    <!--{assign var=key value="ClientField2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$arrForm[$key].keyname}-->" value="<!--{$arrForm[$key].value|h}-->" size="30" class="box30" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />                    <span class="attention">（上限<!--{$arrForm[$key].length}-->文字）</span>
                </td>
            </tr>
<!--{/if}-->
