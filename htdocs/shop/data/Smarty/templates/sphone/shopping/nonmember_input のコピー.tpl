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
    $(function(){
        //お届け先エリアを非表示にする（初期値）
//        if ('1' != '<!--{$arrForm.deliv_check.value}-->') {
//            $("#add_deliv_area").hide();
//        }
    });
    //お届け先エリアの表示/非表示
    var speed = 1000; //表示アニメのスピード（ミリ秒）
    var stateDeliv = 1;
    function fnDelivToggle(areaEl) {
//        areaEl.toggle(speed);
        if (stateDeliv == 0) {
            stateDeliv = 1;
        } else {
            stateDeliv = 0
        }
    }
//]]></script>

<section id="undercolumn">
    <h2 class="title"><!--{$tpl_title|h}--></h2>
    <div class="information end">
        Please note that all fields followed by mark of　<span class="attention">※</span>　must be filled in.
    </div>

    <form name="form1" id="form1" method="post" action="?">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <input type="hidden" name="mode" value="nonmember_confirm" />
        <input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->" />

        <dl class="form_entry">
            <dt>Name&nbsp;<span class="attention">※</span></dt>
            <dd>
                <!--{assign var=key1 value="order_name01"}-->
                <!--{assign var=key2 value="order_name02"}-->
                <span class="attention"><!--{$arrErr[$key1]}--><!--{$arrErr[$key2]}--></span>
                <input type="text" name="<!--{$key1}-->"
                    value="<!--{if $arrForm[$key1].value|h}--><!--{$arrForm[$key1].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][name01];<!--{/php}--><!--{/if}-->"
                    maxlength="<!--{$arrForm[$key1].length}-->"
                    style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                    class="boxLong text data-role-none" placeholder="Name" />&nbsp;&nbsp;
<!--                <input type="text" name="<!--{$key2}-->"
                    value="<!--{$arrForm[$key2].value|h}-->"
                    maxlength="<!--{$arrForm[$key2].length}-->"
                    style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                    class="boxHarf text data-role-none" placeholder="名"/>-->
            </dd>

<!--{if false}-->
            <dt>お名前(フリガナ)<!--{if !$smarty.const.FORM_COUNTRY_ENABLE}-->&nbsp;<span class="attention">※</span><!--{/if}--></dt>
            <dd>
                <!--{assign var=key1 value="order_kana01"}-->
                <!--{assign var=key2 value="order_kana02"}-->
                <span class="attention"><!--{$arrErr[$key1]}--><!--{$arrErr[$key2]}--></span>
                <input type="text" name="<!--{$key1}-->"
                    value="<!--{$arrForm[$key1].value|h}-->"
                    maxlength="<!--{$arrForm[$key1].length}-->"
                    style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                    class="boxHarf text data-role-none" placeholder="セイ"/>&nbsp;&nbsp;
                <input type="text" name="<!--{$key2}-->"
                    value="<!--{$arrForm[$key2].value|h}-->"
                    maxlength="<!--{$arrForm[$key2].length}-->"
                    style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                    class="boxHarf text data-role-none" placeholder="メイ"/>
            </dd>

            <dt>会社名</dt>
            <dd>
                <!--{assign var=key value="order_company_name"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
            </dd>

            <!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
            <dt>国&nbsp;<span class="attention">※</span></dt>
            <dd>
                <!--{assign var=key1 value="order_country_id"}-->
                <div class="attention"><!--{$arrErr[$key1]}--></div>
                <select name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->">
                    <option value="" selected="selected">国を選択</option>
                    <!--{html_options options=$arrCountry selected=$arrForm[$key1].value|h|default:$smarty.const.DEFAULT_COUNTRY_ID}-->
                </select>
            </dd>

            <dt>Post Code</dt>
            <dd>
                <!--{assign var=key1 value="order_zipcode"}-->
                <div class="attention"><!--{$arrErr[$key1]}--></div>
                <input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|h}-->" maxlength="<!--{$arrForm[$key1].length}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->; ime-mode: disabled;" />
            </dd>
            <!--{/if}-->

            <dt>Post Code<!--{if !$smarty.const.FORM_COUNTRY_ENABLE}-->&nbsp;<span class="attention">※</span><!--{/if}--></dt>
            <dd>
                <!--{assign var=key1 value="order_zip01"}-->
                <!--{assign var=key2 value="order_zip02"}-->
                <span class="attention"><!--{$arrErr[$key1]}--><!--{$arrErr[$key2]}--></span>
                <p>
                    <input type="tel" name="<!--{$key1}-->"
                        value="<!--{$arrForm[$key1].value|h}-->"
                        maxlength="<!--{$arrForm[$key1].length}-->"
                        style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" class="boxShort text data-role-none" />&nbsp;－&nbsp;
                    <input type="tel" name="<!--{$key2}-->"
                        value="<!--{$arrForm[$key2].value|h}-->"
                        maxlength="<!--{$arrForm[$key2].length}-->"
                        style="<!--{$arrErr[$key2]|sfGetErrorColor}-->" class="boxShort text data-role-none" />&nbsp;
                    <a href="http://search.post.japanpost.jp/zipcode/" target="_blank"><span class="fn">郵便番号検索</span></a>
                </p>

                <a href="javascript:eccube.getAddress('<!--{$smarty.const.INPUT_ZIP_URLPATH}-->', 'order_zip01', 'order_zip02', 'order_pref', 'order_addr01');" class="btn_sub btn_inputzip">郵便番号から住所自動入力</a>
            </dd>
<!--{/if}-->

            <dt>Address&nbsp;<span class="attention">※</span></dt>
            <dd>
                <!--{assign var=key value="order_pref"}-->
                <span class="attention"><!--{$arrErr.order_pref}--><!--{$arrErr.order_addr01}--><!--{$arrErr.order_addr02}--></span>
<!--                <select name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="boxHarf top data-role-none">
                    <option value="" selected="selected">Prefecture</option>
                    <!--{html_options options=$arrPref selected=$arrForm[$key].value}-->
                </select>-->
                <!--{assign var=key value="order_addr01"}-->
                <input type="text" name="<!--{$key}-->" value="<!--{if $arrForm[$key].value|h}--><!--{$arrForm[$key].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][addr01];<!--{/php}--><!--{/if}-->" class="boxLong top data-role-none" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" placeholder="Address1" />
                    <!--{assign var=key value="order_addr02"}-->
                    <input type="text" name="<!--{$key}-->" value="<!--{if $arrForm[$key].value|h}--><!--{$arrForm[$key].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][addr02];<!--{/php}--><!--{/if}-->" class="boxLong data-role-none" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" placeholder="Address2" />
            </dd>

            <dt>Phone&nbsp;<span class="attention">※</span></dt>
            <dd>
                <!--{assign var=key1 value="order_tel01"}-->
                <!--{assign var=key2 value="order_tel02"}-->
                <!--{assign var=key3 value="order_tel03"}-->
                <span class="attention"><!--{$arrErr[$key1]}--></span>
                <span class="attention"><!--{$arrErr[$key2]}--></span>
                <span class="attention"><!--{$arrErr[$key3]}--></span>
                <input type="tel" name="<!--{$key1}-->"
                    value="<!--{if $arrForm[$key1].value|h}--><!--{$arrForm[$key1].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][tel01];<!--{/php}--><!--{/if}-->"
                    maxlength="<!--{$arrForm[$key1].length}-->"
                    style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                    class="boxShort text data-role-none" />&nbsp;－&nbsp;
                <input type="tel" name="<!--{$key2}-->"
                    value="<!--{if $arrForm[$key2].value|h}--><!--{$arrForm[$key2].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][tel02];<!--{/php}--><!--{/if}-->"
                    maxlength="<!--{$arrForm[$key2].length}-->"
                    style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                    class="boxShort text data-role-none" />&nbsp;－&nbsp;
                <input type="tel" name="<!--{$key3}-->"
                    value="<!--{if $arrForm[$key3].value|h}--><!--{$arrForm[$key3].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][tel03];<!--{/php}--><!--{/if}-->"
                    maxlength="<!--{$arrForm[$key3].length}-->"
                    style="<!--{$arrErr[$key3]|sfGetErrorColor}-->"
                    class="boxShort text data-role-none" />
            </dd>


<!--{if false}-->
            <dt>FAX</dt>
            <dd>
                <!--{assign var=key1 value="order_fax01"}-->
                <!--{assign var=key2 value="order_fax02"}-->
                <!--{assign var=key3 value="order_fax03"}-->
                <span class="attention"><!--{$arrErr[$key1]}--></span>
                <span class="attention"><!--{$arrErr[$key2]}--></span>
                <span class="attention"><!--{$arrErr[$key3]}--></span>
                <input type="tel" name="<!--{$key1}-->"
                    value="<!--{$arrForm[$key1].value|h}-->"
                    maxlength="<!--{$arrForm[$key1].length}-->"
                    style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                    class="boxShort text data-role-none" />&nbsp;－&nbsp;
                <input type="tel" name="<!--{$key2}-->"
                    value="<!--{$arrForm[$key2].value|h}-->"
                    maxlength="<!--{$arrForm[$key2].length}-->"
                    style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                    class="boxShort text data-role-none" />&nbsp;－&nbsp;
                <input type="tel" name="<!--{$key3}-->"
                    value="<!--{$arrForm[$key3].value|h}-->"
                    maxlength="<!--{$arrForm[$key3].length}-->"
                    style="<!--{$arrErr[$key3]|sfGetErrorColor}-->"
                    class="boxShort text data-role-none" />
            </dd>
<!--{/if}-->

            <dt>E-mail&nbsp;<span class="attention">※</span></dt>
            <dd>
                <!--{assign var=key value="order_email"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="email" name="<!--{$key}-->"
                    value="<!--{if $arrForm[$key].value|h}--><!--{$arrForm[$key].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][email];<!--{/php}--><!--{/if}-->"
                    style="<!--{$arrErr[$key]|sfGetErrorColor}-->"
                    maxlength="<!--{$arrForm[$key].length}-->" class="boxLong top data-role-none" />
                <!--{assign var=key value="order_email02"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="email" name="<!--{$key}-->"
                    value="<!--{if $arrForm[$key].value|h}--><!--{$arrForm[$key].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][email];<!--{/php}--><!--{/if}-->"
                    style="<!--{$arrErr[$key]|sfGetErrorColor}-->"
                    maxlength="<!--{$arrForm[$key].length}-->" class="boxLong data-role-none" placeholder="Please fill in twice to make sure" />
            </dd>

<!--{if false}-->
            <dt>性別&nbsp;<span class="attention">※</span></dt>
            <dd>
                <!--{assign var=key value="order_sex"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{if $arrErr[$key]}-->
                    <!--{assign var=err value="background-color: `$smarty.const.ERR_COLOR`"}-->
                <!--{/if}-->
                <p style="<!--{$arrErr[$key]|sfGetErrorColor}-->">
                    <input type="radio" id="man" name="<!--{$key}-->" value="1" <!--{if $arrForm[$key].value eq 1}--> checked="checked" <!--{/if}--> class="data-role-none" /><label for="man">男性</label>&nbsp;&nbsp;
                    <input type="radio" id="woman" name="<!--{$key}-->" value="2" <!--{if $arrForm[$key].value eq 2}--> checked="checked" <!--{/if}--> class="data-role-none" /><label for="woman">女性</label>
                </p>
            </dd>

            <dt>職業</dt>
            <dd>
                <!--{assign var=key value="order_job"}-->
                <!--{if $arrErr[$key]}-->
                    <!--{assign var=err value="background-color: `$smarty.const.ERR_COLOR`"}-->
                <!--{/if}-->
                <select name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="boxLong data-role-none">
                    <option value="" selected="selected">選択してください</option>
                    <!--{html_options options=$arrJob selected=$arrForm[$key].value}-->
                </select>
            </dd>

            <dt>生年月日</dt>
            <dd>
                <!--{assign var=errBirth value="`$arrErr.year``$arrErr.month``$arrErr.day`"}-->
                <div class="attention"><!--{$errBirth}--></div>
                <select name="year" style="<!--{$errBirth|sfGetErrorColor}-->" class="boxShort data-role-none">
                    <!--{html_options options=$arrYear selected=$arrForm.year.value|default:''}-->
                </select><span class="selectdate">年</span>

                <select name="month" style="<!--{$errBirth|sfGetErrorColor}-->" class="boxShort data-role-none">
                    <!--{html_options options=$arrMonth selected=$arrForm.month.value|default:''}-->
                </select><span class="selectdate">月</span>

                <select name="day" style="<!--{$errBirth|sfGetErrorColor}-->" class="boxShort data-role-none">
                    <!--{html_options options=$arrDay selected=$arrForm.day.value|default:''}-->
                </select><span class="selectdate">日</span>
            </dd>
<!--{/if}-->

			<!--{if $smarty.session.pre_deliv_id < 4}-->
            <dt>[Those who order more than one router]<br />
            Would you like to use one unit continuously?&nbsp;<span class="attention">※</span></dt>
            <dd>
                <!--{assign var=key1 value="order_fax01"}-->
                <!--{assign var=key2 value="order_fax02"}-->
                <!--{assign var=key3 value="order_fax03"}-->
                <span class="attention"><!--{$arrErr[$key1]}--></span>
                <span class="attention"><!--{$arrErr[$key2]}--></span>
                <span class="attention"><!--{$arrErr[$key3]}--></span>
                <select name="<!--{$key1}-->"
                    style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"/>
<!--			<option value="0" selected="selected">選択してください</option>-->
			<option value="2">Yes, only one unit </option>
            <option value="1">No, multiple units at same time</option>
                </select>
                <input type="hidden" name="<!--{$key2}-->"
                    value="9999"
                    maxlength="<!--{$arrForm[$key2].length}-->"
                    style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                    class="boxShort text data-role-none" />
                <input type="hidden" name="<!--{$key3}-->"
                    value="1111"
                    maxlength="<!--{$arrForm[$key3].length}-->"
                    style="<!--{$arrErr[$key3]|sfGetErrorColor}-->"
                    class="boxShort text data-role-none" />
            </dd>
			<!--{elseif $smarty.session.pre_deliv_id == 5}-->
            <dt>Router number<br>
            <div class="hotel_name_attention">Please key in present terminal number that begins with YM- EM- WM- au- SB-...</div></dt>
            <dd>
                <!--{assign var=key value="order_company_name"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
            </dd>
			<!--{/if}-->

			<!--{if $smarty.session.pre_deliv_id == 3}-->
            <dt class="bg_head">
                Pickup place  Airport post office Selection
            </dt>
                <dt>Name&nbsp;<span class="attention">※</span></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_name01"}-->
                    <div class="airpot_name_attention">Please enter the name written on passport</div>
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <input type="text" name="<!--{$key1}-->"
                        value="<!--{$arrForm[$key1].value|h}-->"
                        maxlength="<!--{$arrForm[$key1].length}-->"
                        style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                        class="boxLong text data-role-none" placeholder="Name" />
                </dd>
                <dt>Airport name&nbsp;<span class="attention">※</span></dt>
                <dd>
                    <select name="shipping_airport" id="shipping_airport">
						<option value="0" selected="selected">Select</option>
						<option value="1">Narita International Airport Terminal 1</option>
						<option value="2">Narita International Airport Terminal 2</option>
						<option value="3">Haneda airport</option>
						<option value="4">Chubu Centrair International Airport</option>
						<option value="5">Kansai International Airport</option>
						<option value="6">Osaka International(Itami) Airport</option>
						<option value="7">New Chitose Airport</option>
						<option value="8">Fukuoka Airport</option>
						<option value="9">Naha Airport</option>
						</select>
						<br>
									<span id="id_air" class="nodisp attention">※Please select either one</span>
                </dd>
                <dt>Airport post office&nbsp;</dt>
                <dd id="td_shipping_name"></dd>
                <dt>Post Code&nbsp;</dt>
                <dd id="td_shipping_zip"></dd>
                <dt>Address&nbsp;</dt>
                <dd id="td_shipping_addr"></dd>
             <!--{assign var=key value="deliv_check"}-->
			<input type="hidden" name="deliv_check" value="1"/>
<!--			<input type="hidden" name="shipping_name01" value=""/>
			<input type="hidden" name="shipping_name02" value=""/>-->
			<input type="hidden" name="shipping_kana01" value=""/>
			<input type="hidden" name="shipping_kana02" value=""/>
			<input type="hidden" name="shipping_country_id" value="392" />
			<input type="hidden" name="shipping_zip01" value=""/>
			<input type="hidden" name="shipping_zip02" value=""/>
			<input type="hidden" name="shipping_zipcode" value=""/>
			<input type="hidden" name="shipping_pref" value=""/>
			<input type="hidden" name="shipping_addr01" value=""/>
			<input type="hidden" name="shipping_addr02" value=""/>

			<style type="text/css">
			<!--
			.nodisp {
				display:none;
			}
			-->
			</style> 

			<script type="text/javascript">
			$(document).ready(function(){
				if(!document['form1']) {
					return;
				} 
				if(document['form1']['deliv_check']) {
					var list = [
						'shipping_name01',
						'shipping_name02',
						'shipping_kana01',
						'shipping_kana02',
						'shipping_pref',
						'shipping_zip01',
						'shipping_zip02',
						'shipping_zipcode',
						'shipping_addr01',
						'shipping_addr02',
						'shipping_tel01',
						'shipping_tel02',
						'shipping_tel03',
						'shipping_company_name',
						'shipping_country_id',
						'shipping_zipcode',
						'shipping_fax01',
						'shipping_fax02',
						'shipping_fax03'
					];

					var len = list.length;
					for(var i = 0; i < len; i++) {
						if(document['form1'][list[i]]) {
							// 有効にする。
							document['form1'][list[i]].removeAttribute('disabled');
						}
					}
				}
				var str = "";
				str = $('#shipping_airport option:selected').val();
				airportSelect(str);
			});
			$('#shipping_airport').change(function(){
				$("#shipping_airport option:selected").each(function () {
					var str = "";
					str = $(this).val();
					airportSelect(str);
				});
			});
			airportSelect = function(str) {
				var ts_name;
				var ts_zip;
				var ts_addr;
				var s_name01;
				var s_name02;
				var s_kana01;
				var s_kana02;
				var s_zip01;
				var s_zip02;
				var s_zipcode;
				var s_pref;
				var s_addr01;
				var s_addr02;
				if(str == 1) {
					ts_name = "<a href=\"http://www.narita-airport.jp/en/guide/service/list/svc_23.html\" target=\"_blank\">Narita International Airport Terminal 1 Post office 8:30 - 20:00(Open 365 days a year)</a>";
					ts_zip = "282-8799";
					ts_addr = "千葉県成田市御料牧場1-1 成田国際空港 第１旅客ターミナルビル内4Ｆ 成田国際空港郵便局　第1旅客ビル内分室 局留め";
					s_name01 = "Narita_International_Airport_Terminal_1";
					s_name02 = "Post_office";
					s_kana01 = "ナリタクウコウ";
					s_kana02 = "ダイイチ";
					s_zip01 = "282";
					s_zip02 = "8799";
					s_zipcode = "282-8799";
					s_pref = "12";
					s_addr01 = "成田市御料牧場1-1 成田国際空港";
					s_addr02 = "第１旅客ターミナルビル内4Ｆ 成田国際空港郵便局　第1旅客ビル内分室 局留め";
				} else if(str == 2) {
					ts_name = "<a href=\"http://www.narita-airport.jp/en/guide/service/list/svc_23.html\" target=\"_blank\">Narita International Airport Terminal 2 Post office 8:30 - 20:00(Open 365 days a year)</a>";
					ts_zip = "282-8799";
					ts_addr = "千葉県成田市古込1-1 成田国際空港 第２旅客ターミナルビル内3Ｆ 成田国際空港郵便局 第2旅客ビル内分室 局留め";
					s_name01 = "Narita_International_Airport_Terminal_2";
					s_name02 = "Post_office";
					s_kana01 = "ナリタクウコウ";
					s_kana02 = "ダイニ";
					s_zip01 = "282";
					s_zip02 = "8799";
					s_zipcode = "282-8799";
					s_pref = "12";
					s_addr01 = "成田市古込1-1 成田国際空港";
					s_addr02 = "第２旅客ターミナルビル内3Ｆ 成田国際空港郵便局 第2旅客ビル内分室 局留め";
				} else if(str == 3) {
					ts_name = "<a href=\"http://www.tokyo-airport-bldg.co.jp/en/map/?terminal=1&floor=1\" target=\"_blank\">Haneda airport post office 9:00 - 17:00 on weekday</a>";
					ts_zip = "144-0041";
					ts_addr = "東京都大田区羽田空港3-3-2 第1旅客ターミナルビル1階 羽田空港郵便局 局留め";
					s_name01 = "Haneda_airport";
					s_name02 = "Post_office";
					s_kana01 = "ハネダクウコウ";
					s_kana02 = "ユウビンキョク";
					s_zip01 = "144";
					s_zip02 = "0041";
					s_zipcode = "144-0041";
					s_pref = "13";
					s_addr01 = "東京都大田区羽田空港3-3-2";
					s_addr02 = "第1旅客ターミナルビル1階 羽田空港郵便局 局留め";
				} else if(str == 4) {
					ts_name = "<a href=\"http://www.centrair.jp/en/services/luggage/\" target=\"_blank\">Chubu Centrair International Airport post office 9:00 -17:00 on weekday</a>";
					ts_zip = "479-8799";
					ts_addr = "愛知県常滑市セントレア1-1 常滑郵便局セントレア分室 局留め";
					s_name01 = "Chubu_Centrair_International_Airport";
					s_name02 = "Post_office";
					s_kana01 = "チュウブコクサイクウコウ";
					s_kana02 = "ユウビンキョク";
					s_zip01 = "479";
					s_zip02 = "8799";
					s_zipcode = "479-8799";
					s_pref = "23";
					s_addr01 = "愛知県常滑市セントレア1-1";
					s_addr02 = "常滑郵便局セントレア分室 局留め";
				} else if(str == 5) {
					ts_name = "<a href=\"http://www.kansai-airport.or.jp/en/service/safe/index.html#_02\" target=\"_blank\">Kansai International Airport Post office 9:00 - 17:00 (Open 365 days a year)</a>";
					ts_zip = "549-0011";
					ts_addr = "大阪府泉南郡田尻町泉州空港中１ 泉佐野郵便局関西空港分室 局留め";
					s_name01 = "Kansai_International_Airport";
					s_name02 = "Post_office";
					s_kana01 = "カンサイコクサイクウコウ";
					s_kana02 = "ユウビンキョク";
					s_zip01 = "549";
					s_zip02 = "0011";
					s_zipcode = "549-0011";
					s_pref = "27";
					s_addr01 = "大阪府泉南郡田尻町泉州空港中１";
					s_addr02 = "泉佐野郵便局関西空港分室 局留め";
				} else if(str == 6) {
					ts_name = "<a href=\"http://osaka-airport.co.jp/en/service/other_service/post/\" target=\"_blank\">Osaka International(Itami) Airport Post office 9:00 -17:00  (Open 365 days a year)</a>";
					ts_zip = "560-0036";
					ts_addr = "大阪府豊中市螢池西町３丁目５５５ 豊中郵便局大阪国際空港分室 局留め";
					s_name01 = "Osaka_International(Itami)_Airport";
					s_name02 = "Post_office";
					s_kana01 = "イタミクウコウ";
					s_kana02 = "ユウビンキョク";
					s_zip01 = "560";
					s_zip02 = "0036";
					s_zipcode = "560-0036";
					s_pref = "27";
					s_addr01 = "大阪府豊中市螢池西町３丁目５５５";
					s_addr02 = "豊中郵便局大阪国際空港分室 局留め";
				} else if(str == 7) {
					ts_name = "<a href=\"http://www.new-chitose-airport.jp/en/service/baggage/postoffice/\" target=\"_blank\">New Chitose Airport Post office 9:00 -17:00  (Open 365 days a year)</a>";
					ts_zip = "066-0012";
					ts_addr = "北海道千歳市美々 新千歳空港ターミナルビル2階 新千歳空港内郵便局 局留め";
					s_name01 = "New_Chitose_Airport";
					s_name02 = "Post_office";
					s_kana01 = "シンチトセクウコウ";
					s_kana02 = "ユウビンキョク";
					s_zip01 = "066";
					s_zip02 = "0012";
					s_zipcode = "066-0012";
					s_pref = "1";
					s_addr01 = "北海道千歳市美々 新千歳空港ターミナルビル2階";
					s_addr02 = "新千歳空港内郵便局 局留め";
				} else if(str == 8) {
					ts_name = "<a href=\"http://www.fuk-ab.co.jp/english/luggage.html\" target=\"_blank\">Fukuoka Airport Post office 9:00 - 17:00 on Weekday and 9:00 - 15:00 on weekend</a>";
					ts_zip = "812-0005";
					ts_addr = "福岡県福岡市博多区上臼井柳井348 第1ターミナル 福岡空港内郵便局 局留め";
					s_name01 = "Fukuoka_Airport";
					s_name02 = "Post_office";
					s_kana01 = "フクオカクウコウ";
					s_kana02 = "ユウビンキョク";
					s_zip01 = "812";
					s_zip02 = "0005";
					s_zipcode = "812-0005";
					s_pref = "40";
					s_addr01 = "福岡県福岡市博多区上臼井柳井348";
					s_addr02 = "第1ターミナル 福岡空港内郵便局 局留め";
				} else if(str == 9) {
					ts_name = "<a href=\"http://www.naha-airport.co.jp/en/facility/service.html\" target=\"_blank\">Naha Airport Post office　9:00 - 17:00 (Open 365 days a year)</a>";
					ts_zip = "901-0142";
					ts_addr = "沖縄県那覇市鏡水150　那覇空港内簡易郵便局　局留め";
					s_name01 = "Naha_Airport";
					s_name02 = "Post_office";
					s_kana01 = "ナハクウコウ";
					s_kana02 = "ユウビンキョク";
					s_zip01 = "901";
					s_zip02 = "0142";
					s_zipcode = "901-0142";
					s_pref = "47";
					s_addr01 = "沖縄県那覇市鏡水150";
					s_addr02 = "那覇空港内簡易郵便局　局留め";
				}
/*
				var td_shipping_name;
				var td_shipping_zip;
				var td_shipping_addr;
				var shipping_name01;
				var shipping_name02;
				var shipping_kana01;
				var shipping_kana02;
				var shipping_zip01;
				var shipping_zip02;
				var shipping_pref;
				var shipping_addr01;
				var shipping_addr02;
*/
				$('#td_shipping_name').html(ts_name);
				$('#td_shipping_zip').html(ts_zip);
				$('#td_shipping_addr').html(ts_addr);
//				$(':hidden[name="shipping_name01"]').val(s_name01);
//				$(':hidden[name="shipping_name02"]').val(s_name02);
//				$(':hidden[name="shipping_kana01"]').val(s_kana01);
//				$(':hidden[name="shipping_kana02"]').val(s_kana02);
				$(':hidden[name="shipping_zip01"]').val(s_zip01);
				$(':hidden[name="shipping_zip02"]').val(s_zip02);
				$(':hidden[name="shipping_zipcode"]').val(s_zipcode);
				$(':hidden[name="shipping_pref"]').val(s_pref);
				$(':hidden[name="shipping_addr01"]').val(s_addr01);
				$(':hidden[name="shipping_addr02"]').val(s_addr02);
			}

			function checkAirport() {
				var air = $('#shipping_airport').val();
				if(air == 0) {
					$("#id_air").removeClass("nodisp");
				} else {
					document.form1.submit();
				}
			}
			</script>
			<!--{elseif $smarty.session.pre_deliv_id == 4}-->
             <!--{assign var=key value="deliv_check"}-->
			<input type="hidden" name="deliv_check" value="1"/>
			<input type="hidden" name="shipping_name01" value="WiFi"/>
			<input type="hidden" name="shipping_name02" value="RENTAL_Store"/>
			<input type="hidden" name="shipping_kana01" value="ワイファイ"
			<input type="hidden" name="shipping_kana02" value="レンタルヤサン"/>
			<input type="hidden" name="shipping_country_id" value="392" />
			<input type="hidden" name="shipping_zip01" value="101"/>
			<input type="hidden" name="shipping_zip02" value="0041"/>
			<input type="hidden" name="shipping_zipcode" value="101-0041"/>
			<input type="hidden" name="shipping_pref" value="13"/>
			<input type="hidden" name="shipping_addr01" value="KS_building_2F_1-5"/>
			<input type="hidden" name="shipping_addr02" value="Kandasuda-cho_Chiyoda-ku"/>
			<input type="hidden" name="shipping_tel01" value="03"/>
			<input type="hidden" name="shipping_tel02" value="3525"/>
			<input type="hidden" name="shipping_tel03" value="8351"/>

			<script type="text/javascript">
			$(document).ready(function(){
				if(!document['form1']) {
					return;
				} 
				if(document['form1']['deliv_check']) {
					var list = [
						'shipping_name01',
						'shipping_name02',
						'shipping_kana01',
						'shipping_kana02',
						'shipping_pref',
						'shipping_zip01',
						'shipping_zip02',
						'shipping_zipcode',
						'shipping_addr01',
						'shipping_addr02',
						'shipping_tel01',
						'shipping_tel02',
						'shipping_tel03',
						'shipping_company_name',
						'shipping_country_id',
						'shipping_zipcode',
						'shipping_fax01',
						'shipping_fax02',
						'shipping_fax03'
					];

					var len = list.length;
					for(var i = 0; i < len; i++) {
						if(document['form1'][list[i]]) {
							// 有効にする。
							document['form1'][list[i]].removeAttribute('disabled');
						}
					}
				};
			});
			</script>
			<!--{elseif $smarty.session.pre_deliv_id == 5}-->
			<!--{elseif $smarty.session.pre_deliv_id == 1}-->
                    <!--{assign var=key value="deliv_check"}-->
					<input type="hidden" name="deliv_check" value="1"/>
            <dt class="bg_head">
                Designation of delivery address</span></br>※（When you designate delivery address except entered address above,Please key in delivery address without fail）
            </dt>
                <dt>Name&nbsp;<span class="attention">※</span></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_name01"}-->
                    <!--{assign var=key2 value="shipping_name02"}-->
                    <div class="hotel_name_attention">In the case of pick-up at hotel,please enter the same name as one on a hotel guest list.</div>
                    <span class="attention"><!--{$arrErr[$key1]}--><!--{$arrErr[$key2]}--></span>
                    <input type="text" name="<!--{$key1}-->"
                        value="<!--{$arrForm[$key1].value|h}-->"
                        maxlength="<!--{$arrForm[$key1].length}-->"
                        style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                        class="boxLong text data-role-none" placeholder="Name" />&nbsp;&nbsp;
<!--                    <input type="text" name="<!--{$key2}-->"
                        value="<!--{$arrForm[$key2].value|h}-->"
                        maxlength="<!--{$arrForm[$key2].length}-->"
                        style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                        class="boxHarf text data-role-none" placeholder="名"/>-->
                </dd>

<!--{if false}-->
                <dt>フリガナ<!--{if !$smarty.const.FORM_COUNTRY_ENABLE}-->&nbsp;<span class="attention">※</span><!--{/if}--></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_kana01"}-->
                    <!--{assign var=key2 value="shipping_kana02"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--><!--{$arrErr[$key2]}--></span>
                    <input type="text" name="<!--{$key1}-->"
                        value="<!--{$arrForm[$key1].value|h}-->"
                        maxlength="<!--{$arrForm[$key1].length}-->"
                        style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                        class="boxHarf text data-role-none" placeholder="セイ"/>&nbsp;&nbsp;
                    <input type="text" name="<!--{$key2}-->"
                        value="<!--{$arrForm[$key2].value|h}-->"
                        maxlength="<!--{$arrForm[$key2].length}-->"
                        style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                        class="boxHarf text data-role-none" placeholder="メイ"/>
                </dd>

                <dt>会社名</dt>
                <dd>
                    <!--{assign var=key value="shipping_company_name"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                </dd>

                <!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
                <dt>国&nbsp;<span class="attention">※</span></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_country_id"}-->
                    <div class="attention"><!--{$arrErr[$key1]}--></div>
                    <select name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->">
                        <option value="" selected="selected">国を選択</option>
                        <!--{html_options options=$arrCountry selected=$arrForm[$key1].value|h|default:$smarty.const.DEFAULT_COUNTRY_ID}-->
                    </select>
                </dd>

                <dt>Post Code</dt>
                <dd>
                    <!--{assign var=key1 value="shipping_zipcode"}-->
                    <div class="attention"><!--{$arrErr[$key1]}--></div>
                    <input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|h}-->" maxlength="<!--{$arrForm[$key1].length}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->; ime-mode: disabled;" />
                </dd>
                <!--{/if}-->
<!--{/if}-->

                <dt>Post Code<!--{if !$smarty.const.FORM_COUNTRY_ENABLE}-->&nbsp;<span class="attention">※</span><!--{/if}--></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_zip01"}-->
                    <!--{assign var=key2 value="shipping_zip02"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--><!--{$arrErr[$key2]}--></span>
                    <p>
                        <input type="tel" name="<!--{$key1}-->"
                            value="<!--{$arrForm[$key1].value|h}-->"
                            maxlength="<!--{$arrForm[$key1].length}-->"
                            style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" class="boxShort text data-role-none" />&nbsp;－&nbsp;
                        <input type="tel" name="<!--{$key2}-->"
                            value="<!--{$arrForm[$key2].value|h}-->"
                            maxlength="<!--{$arrForm[$key2].length}-->"
                            style="<!--{$arrErr[$key2]|sfGetErrorColor}-->" class="boxShort text data-role-none" />&nbsp;
                        <!--<a href="http://search.post.japanpost.jp/zipcode/" target="_blank"><span class="fn">郵便番号検索</span></a>-->
                        <div class="hotel_name_attention">In the case you don't know the number of post code, 
please enter "000-0000" and leave a massage about post code on remarks column.</div>
                    </p>

                    <!--{if false}-->
                    <a href="javascript:eccube.getAddress('<!--{$smarty.const.INPUT_ZIP_URLPATH}-->', 'shipping_zip01', 'shipping_zip02', 'shipping_pref', 'shipping_addr01');" class="btn_sub btn_inputzip">郵便番号から住所自動入力</a><!--{/if}-->
                </dd>

                <dt>Address&nbsp;<span class="attention">※</span></dt>
                <dd>
                    <!--{assign var=key value="shipping_pref"}-->
                    <span class="attention"><!--{$arrErr.shipping_pref}--><!--{$arrErr.shipping_addr01}--><!--{$arrErr.shipping_addr02}--></span>
                    <select name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="boxHarf top data-role-none">
                        <option value="" selected="selected">Prefecture</option>
                        <!--{html_options options=$arrPref selected=$arrForm[$key].value}-->
                    </select>
                    <!--{assign var=key value="shipping_addr01"}-->
                    <input type="text" name="<!--{$key}-->"
                        value="<!--{$arrForm[$key].value|h}-->"
                        class="boxLong top data-role-none"
                        style="<!--{$arrErr[$key]|sfGetErrorColor}-->"
                        placeholder="市区町村名" />
                    <!--{assign var=key value="shipping_addr02"}-->
                    <input type="text" name="<!--{$key}-->"
                        value="<!--{$arrForm[$key].value|h}-->"
                        class="boxLong data-role-none"
                        style="<!--{$arrErr[$key]|sfGetErrorColor}-->"
                        placeholder="番地・ビル名" />
                </dd>
                
                <dt>Hotel name</dt>
                <dd>
                    <!--{assign var=key value="shipping_company_name"}-->
                    <div class="hotel_name_attention">In the case of pick-up at hotel, please enter the name of the hotel</div>
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                </dd>

                <dt>Phone&nbsp;<span class="attention">※</span></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_tel01"}-->
                    <!--{assign var=key2 value="shipping_tel02"}-->
                    <!--{assign var=key3 value="shipping_tel03"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <span class="attention"><!--{$arrErr[$key3]}--></span>
                    <input type="tel" name="<!--{$key1}-->"
                        value="<!--{$arrForm[$key1].value|h}-->"
                        maxlength="<!--{$arrForm[$key1].length}-->"
                        style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                        class="boxShort text data-role-none" />&nbsp;－&nbsp;
                    <input type="tel" name="<!--{$key2}-->"
                        value="<!--{$arrForm[$key2].value|h}-->"
                        maxlength="<!--{$arrForm[$key2].length}-->"
                        style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                        class="boxShort text data-role-none" />&nbsp;－&nbsp;
                    <input type="tel" name="<!--{$key3}-->"
                        value="<!--{$arrForm[$key3].value|h}-->"
                        maxlength="<!--{$arrForm[$key3].length}-->"
                        style="<!--{$arrErr[$key3]|sfGetErrorColor}-->"
                        class="boxShort text data-role-none" />
                </dd>

			<script type="text/javascript">
			$(document).ready(function(){
//				if(!document['form1']) {
//					return;
//				} 
//				if(document['form1']['deliv_check']) {
					var list = [
						'shipping_name01',
						'shipping_name02',
						'shipping_kana01',
						'shipping_kana02',
						'shipping_pref',
						'shipping_zip01',
						'shipping_zip02',
						'shipping_zipcode',
						'shipping_addr01',
						'shipping_addr02',
						'shipping_tel01',
						'shipping_tel02',
						'shipping_tel03',
						'shipping_company_name',
						'shipping_country_id',
						'shipping_zipcode',
						'shipping_fax01',
						'shipping_fax02',
						'shipping_fax03'
					];

					var len = list.length;
					for(var i = 0; i < len; i++) {
						if(document['form1'][list[i]]) {
							// 有効にする。
							document['form1'][list[i]].removeAttribute('disabled');
							document['form1'][list[i]].style.backgroundColor = '#ffffff';
						}
					}
//				};
			});
			</script>
			<!--{else}-->
            <dt class="bg_head">
                <!--{assign var=key value="deliv_check"}-->
                <input class="radio_btn data-role-none" type="checkbox" name="<!--{$key}-->" value="1" onchange="fnDelivToggle($('#add_deliv_area')); eccube.toggleDeliveryForm();" <!--{$arrForm[$key].value|sfGetChecked:1}--> id="deliv_label" />
                <label for="deliv_label"><span class="fb">お届け先を指定</span></label>
            </dt>
            <dd>
                <br />※上記に入力された住所と同一の場合は省略可能です。
            </dd>

            <div id="add_deliv_area">
                <dt>Name&nbsp;<span class="attention">※</span></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_name01"}-->
                    <!--{assign var=key2 value="shipping_name02"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--><!--{$arrErr[$key2]}--></span>
                    <input type="text" name="<!--{$key1}-->"
                        value="<!--{$arrForm[$key1].value|h}-->"
                        maxlength="<!--{$arrForm[$key1].length}-->"
                        style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                        class="boxHarf text data-role-none" placeholder="姓" />&nbsp;&nbsp;
                    <input type="text" name="<!--{$key2}-->"
                        value="<!--{$arrForm[$key2].value|h}-->"
                        maxlength="<!--{$arrForm[$key2].length}-->"
                        style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                        class="boxHarf text data-role-none" placeholder="名"/>
                </dd>

<!--{if false}-->
                <dt>フリガナ<!--{if !$smarty.const.FORM_COUNTRY_ENABLE}-->&nbsp;<span class="attention">※</span><!--{/if}--></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_kana01"}-->
                    <!--{assign var=key2 value="shipping_kana02"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--><!--{$arrErr[$key2]}--></span>
                    <input type="text" name="<!--{$key1}-->"
                        value="<!--{$arrForm[$key1].value|h}-->"
                        maxlength="<!--{$arrForm[$key1].length}-->"
                        style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                        class="boxHarf text data-role-none" placeholder="セイ"/>&nbsp;&nbsp;
                    <input type="text" name="<!--{$key2}-->"
                        value="<!--{$arrForm[$key2].value|h}-->"
                        maxlength="<!--{$arrForm[$key2].length}-->"
                        style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                        class="boxHarf text data-role-none" placeholder="メイ"/>
                </dd>

                <dt>会社名</dt>
                <dd>
                    <!--{assign var=key value="shipping_company_name"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                </dd>

                <!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
                <dt>国&nbsp;<span class="attention">※</span></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_country_id"}-->
                    <div class="attention"><!--{$arrErr[$key1]}--></div>
                    <select name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->">
                        <option value="" selected="selected">国を選択</option>
                        <!--{html_options options=$arrCountry selected=$arrForm[$key1].value|h|default:$smarty.const.DEFAULT_COUNTRY_ID}-->
                    </select>
                </dd>

                <dt>Post Code</dt>
                <dd>
                    <!--{assign var=key1 value="shipping_zipcode"}-->
                    <div class="attention"><!--{$arrErr[$key1]}--></div>
                    <input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|h}-->" maxlength="<!--{$arrForm[$key1].length}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->; ime-mode: disabled;" />
                </dd>
                <!--{/if}-->

                <dt>Post Code<!--{if !$smarty.const.FORM_COUNTRY_ENABLE}-->&nbsp;<span class="attention">※</span><!--{/if}--></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_zip01"}-->
                    <!--{assign var=key2 value="shipping_zip02"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--><!--{$arrErr[$key2]}--></span>
                    <p>
                        <input type="tel" name="<!--{$key1}-->"
                            value="<!--{$arrForm[$key1].value|h}-->"
                            maxlength="<!--{$arrForm[$key1].length}-->"
                            style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" class="boxShort text data-role-none" />&nbsp;－&nbsp;
                        <input type="tel" name="<!--{$key2}-->"
                            value="<!--{$arrForm[$key2].value|h}-->"
                            maxlength="<!--{$arrForm[$key2].length}-->"
                            style="<!--{$arrErr[$key2]|sfGetErrorColor}-->" class="boxShort text data-role-none" />&nbsp;
                        <a href="http://search.post.japanpost.jp/zipcode/" target="_blank"><span class="fn">郵便番号検索</span></a>
                    </p>

                    <a href="javascript:eccube.getAddress('<!--{$smarty.const.INPUT_ZIP_URLPATH}-->', 'shipping_zip01', 'shipping_zip02', 'shipping_pref', 'shipping_addr01');" class="btn_sub btn_inputzip">郵便番号から住所自動入力</a>
                </dd>

                <dt>住所&nbsp;<span class="attention">※</span></dt>
                <dd>
                    <!--{assign var=key value="shipping_pref"}-->
                    <span class="attention"><!--{$arrErr.shipping_pref}--><!--{$arrErr.shipping_addr01}--><!--{$arrErr.shipping_addr02}--></span>
                    <select name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="boxHarf top data-role-none">
                        <option value="" selected="selected">Prefecture</option>
                        <!--{html_options options=$arrPref selected=$arrForm[$key].value}-->
                    </select>
                    <!--{assign var=key value="shipping_addr01"}-->
                    <input type="text" name="<!--{$key}-->"
                        value="<!--{$arrForm[$key].value|h}-->"
                        class="boxLong top data-role-none"
                        style="<!--{$arrErr[$key]|sfGetErrorColor}-->"
                        placeholder="市区町村名" />
                    <!--{assign var=key value="shipping_addr02"}-->
                    <input type="text" name="<!--{$key}-->"
                        value="<!--{$arrForm[$key].value|h}-->"
                        class="boxLong data-role-none"
                        style="<!--{$arrErr[$key]|sfGetErrorColor}-->"
                        placeholder="番地・ビル名" />
                </dd>

                <dt>Phone&nbsp;<span class="attention">※</span></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_tel01"}-->
                    <!--{assign var=key2 value="shipping_tel02"}-->
                    <!--{assign var=key3 value="shipping_tel03"}-->
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <span class="attention"><!--{$arrErr[$key2]}--></span>
                    <span class="attention"><!--{$arrErr[$key3]}--></span>
                    <input type="tel" name="<!--{$key1}-->"
                        value="<!--{$arrForm[$key1].value|h}-->"
                        maxlength="<!--{$arrForm[$key1].length}-->"
                        style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                        class="boxShort text data-role-none" />&nbsp;－&nbsp;
                    <input type="tel" name="<!--{$key2}-->"
                        value="<!--{$arrForm[$key2].value|h}-->"
                        maxlength="<!--{$arrForm[$key2].length}-->"
                        style="<!--{$arrErr[$key2]|sfGetErrorColor}-->"
                        class="boxShort text data-role-none" />&nbsp;－&nbsp;
                    <input type="tel" name="<!--{$key3}-->"
                        value="<!--{$arrForm[$key3].value|h}-->"
                        maxlength="<!--{$arrForm[$key3].length}-->"
                        style="<!--{$arrErr[$key3]|sfGetErrorColor}-->"
                        class="boxShort text data-role-none" />
                </dd>
<!--{/if}-->
            <!--{/if}-->

                <!--{if $smarty.const.USE_MULTIPLE_SHIPPING !== false}-->
                    <dd class="pb">
                        <a class="btn_more" href="javascript:eccube.setModeAndSubmit('multiple', '', '');">お届け先を複数指定する</a>
                    </dd>
                <!--{/if}-->
			<!--{if $smarty.session.pre_deliv_id == 3}-->
            <!--<div class="btn_area">
                <p><a href="javascript:void(0)" onclick="javascript:checkAirport();return false;">次へaa</a></p>
            </div>-->
            <div class="link_box">
                <a href="javascript:void(0)" onclick="javascript:checkAirport();return false;"><span class="link_text">Next</span></a>
            </div>
			<!--{else}-->
            <div class="btn_area">
                <p><input type="submit" value="Next" class="btn data-role-none" alt="次へ" name="next" id="next" /></p>
            </div>
			<!--{/if}-->
        </dl>
    </form>
</section>

<!--{include file= 'frontparts/search_area.tpl'}-->

<!--▲コンテンツここまで -->
