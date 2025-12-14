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
        Please note that all fields followed by mark of　<span class="attention">*</span>　must be filled in.
    </div>

    <form name="form1" id="form1" method="post" action="?">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <input type="hidden" name="mode" value="nonmember_confirm" />
        <input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->" />

        <dl class="form_entry">
            <dt>Name&nbsp;<span class="attention">*</span></dt>
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
            <span class="attention gray">Please fill out by alphabet.<br>Symbols ( , . = ' ･ etc) can not be entered.</span>
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
<!--{/if}-->

            <!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
            <dt>Country</dt>
            <dd>
                <!--{assign var=key1 value="order_country_id"}-->
                <div class="attention"><!--{$arrErr[$key1]}--></div>
                <select name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->">
                    <option value="" selected="selected">Country</option>
                    <!--{html_options options=$arrCountry selected=$arrForm[$key1].value|h|default:$smarty.const.DEFAULT_COUNTRY_ID}-->
                </select>
            </dd>

<!--{if false}-->
            <dt>Post Code</dt>
            <dd>
                <!--{assign var=key1 value="order_zipcode"}-->
                <div class="attention"><!--{$arrErr[$key1]}--></div>
                <input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|h}-->" maxlength="<!--{$arrForm[$key1].length}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->; ime-mode: disabled;" />
            </dd>
<!--{/if}-->
            <!--{/if}-->

<!--{if false}-->
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

            <dt>Address&nbsp;<span class="attention">*</span></dt>
            <dd>
                <!--{assign var=key value="order_pref"}-->
                <span class="attention"><!--{$arrErr.order_pref}--><!--{$arrErr.order_addr01}--><!--{$arrErr.order_addr02}--></span>
<!--                <select name="<!--{$key}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="boxHarf top data-role-none">
                    <option value="" selected="selected">Prefecture</option>
                    <!--{html_options options=$arrPref selected=$arrForm[$key].value}-->
                </select>-->
                <!--{assign var=key value="order_addr01"}-->
                <input type="text" name="<!--{$key}-->" value="<!--{if $arrForm[$key].value|h}--><!--{$arrForm[$key].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][addr01];<!--{/php}--><!--{/if}-->" class="boxLong top data-role-none text" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" placeholder="Address1" />
                    <!--{assign var=key value="order_addr02"}-->
                    <input type="text" name="<!--{$key}-->" value="<!--{if $arrForm[$key].value|h}--><!--{$arrForm[$key].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][addr02];<!--{/php}--><!--{/if}-->" class="boxLong data-role-none text" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" placeholder="Address2" />
            </dd>

            <dt>Phone&nbsp;<span class="attention">*</span></dt>
            <dd>
                <!--{assign var=key1 value="order_tel01"}-->
                <span class="attention"><!--{$arrErr[$key1]}--></span>
                <input type="tel" name="<!--{$key1}-->"
                    value="<!--{if $arrForm[$key1].value|h}--><!--{$arrForm[$key1].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][tel01];<!--{/php}--><!--{/if}-->"
                    maxlength="<!--{$arrForm[$key1].length}-->"
                    style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                    class="boxLong text data-role-none" placeholder="Fill it in by 000 if you don't have phones" />
                    <!--<p class="attention">Fill it in by 000 if you don't have phones</p>-->
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

            <dt>E-mail&nbsp;<span class="attention">*</span></dt>
            <dd>
                <!--{assign var=key value="order_email"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="email" name="<!--{$key}-->"
                    value="<!--{if $arrForm[$key].value|h}--><!--{$arrForm[$key].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][email];<!--{/php}--><!--{/if}-->"
                    style="<!--{$arrErr[$key]|sfGetErrorColor}-->"
                    maxlength="<!--{$arrForm[$key].length}-->" class="boxLong top data-role-none text" />
                <!--{assign var=key value="order_email02"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="email" name="<!--{$key}-->"
                    value="<!--{if $arrForm[$key].value|h}--><!--{$arrForm[$key].value|h}--><!--{else}--><!--{php}-->echo $_SESSION[customer][email];<!--{/php}--><!--{/if}-->"
                    style="<!--{$arrErr[$key]|sfGetErrorColor}-->"
                    maxlength="<!--{$arrForm[$key].length}-->" class="boxLong data-role-none text" placeholder="To confirm, please fill it in once again" />
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
            <dt>[Those who order more than one rental pack]<br />
            Would you like to use one unit continuously?&nbsp;<span class="attention">*</span></dt>
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
            <div class="hotel_name_attention">Please key in present terminal number that begins with YM- EM- au- SB-...</div></dt>
            <dd>
                <!--{assign var=key value="order_company_name"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
            </dd>
			<!--{/if}-->

			<!--{if $smarty.session.pre_deliv_id == 3}-->
            <dt class="bg_head">
                Please enter the recipient name, and select your pickup location.
            </dt>
                <dt>Name&nbsp;<span class="attention">*</span></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_name01"}-->
                    <div class="airpot_name_attention">Please enter the name on your passport.</div>
                    <span class="attention"><!--{$arrErr[$key1]}--></span>
                    <input type="text" name="<!--{$key1}-->"
                        value="<!--{$arrForm[$key1].value|h}-->"
                        maxlength="<!--{$arrForm[$key1].length}-->"
                        style="<!--{$arrErr[$key1]|sfGetErrorColor}-->"
                        class="boxLong text data-role-none" placeholder="Name" />
                <!--<p class="attention gray">* Only alphabets allowed</p>-->
                </dd>
                <dt>Available Airports&nbsp;<span class="attention">*</span></dt>
                <dd>
<style>
.select_airport{
	margin:0 auto;
}
.select_airport .airport_name {
    font-size: 17px;
    background-color: #6897CD;
    color: #ffffff;
    padding: 10px;
    text-align: center;
    font-weight: bold;
}
.select_airport .s_box {
    border-bottom: 1px solid #999;
    padding-top: 4px;
    padding-bottom: 4px;
}
.select_airport .s_box:last-child{
	border-bottom:none;
}
.select_airport .s_box input{
	display:none;
}
.select_airport .s_box .airport_label{
	float:left;
	width:80%;
}
.select_airport .s_box .select_name {
    font-size: 15px;
    line-height: 18px;
    font-weight: bold;
}
.select_airport .s_box .address {
    font-size: 13px;
    line-height: 17px;
    font-weight: normal;
}
.select_airport .s_box .open {
    font-size: 13px;
    line-height: 16px;
    font-weight: normal;
}
.select_airport .s_box .map_link {
    float: right;
    width: 12%;
    margin-right: 2.2%;
    margin-top: 20px;
}
</style>

<section class="select_airport">
 <p class="airport_name">Narita Airport</p>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_2" value="2">
  <label class="airport_label" for="airport_2">
   <p class="select_name">Terminal 1, QL Liner Counter</p>
   <p class="address">Terminal 1, 1F, South Wing, Arrival</p>
   <p class="open">6:30AM - Last Flight [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/narita_ql_01.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_5" value="5">
  <label class="airport_label" for="airport_5">
   <p class="select_name">Terminal 2, QL Liner Counter</p>
   <p class="address">Terminal 2, 1F, North Wing, Arrival</p>
   <p class="open">6:30AM - Last Flight [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/narita_ql_02.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 
 <p class="airport_name">Haneda Airport</p>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_15" value="15">
  <label class="airport_label" for="airport_15">
   <p class="select_name">JAL ABC Counter</p>
   <p class="address">International Terminal, 2F, Arrival</p>
   <p class="open">Open 24 hours [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/haneda_jal_abc.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 
 <p class="airport_name">Centrair Airport</p>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_17" value="17">
  <label class="airport_label" for="airport_17">
   <p class="select_name">Baggage Delivery Service Counter (JAL ABC Delivery Counter)</p>
   <p class="address">2F, Arrival</p>
   <p class="open">7AM - 10PM [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/centrair_abc.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 
 <p class="airport_name">Kansai International Airport</p>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_8" value="8">
  <label class="airport_label" for="airport_8">
   <p class="select_name">Post Office</p>
   <p class="address">Terminal 1, 2F, Arrival (Also Known as Izumisano Post Office)</p>
   <p class="open">9AM - 5PM [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/kansai_postoffice.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_16" value="16">
  <label class="airport_label" for="airport_16">
   <p class="select_name">JAL ABC Delivery Counter</p>
   <p class="address">Terminal 1, 1F, Arrival</p>
   <p class="open">6:15AM - 10:30PM [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/kansai_jal_abc.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 
 <p class="airport_name">Itami Airport</p>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_9" value="9">
  <label class="airport_label" for="airport_9">
   <p class="select_name">Post Office</p>
   <p class="address">Central Block, 1F (Also Known as Toyonaka Post Office)</p>
   <p class="open">9AM - 5PM [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/itami_postoffice.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 
 <p class="airport_name">New chitose Airport</p>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_10" value="10">
  <label class="airport_label" for="airport_10">
   <p class="select_name">Post Office</p>
   <p class="address">Located on 2F</p>
   <p class="open">9AM - 5PM [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/new_chitose_postoffice.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 
 <p class="airport_name">Fukuoka Airport</p>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_13" value="13">
  <label class="airport_label" for="airport_13">
   <p class="select_name">International Terminal Delivery Counter</p>
   <p class="address">International Terminal, 1F</p>
   <p class="open">7:30AM - 9PM [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/fukuoka_kuroneko_inter.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_14" value="14">
  <label class="airport_label" for="airport_14">
   <p class="select_name">Domestic Terminal Delivery Counter</p>
   <p class="address">Domestic Terminal, North 1F</p>
   <p class="open">7:00AM - 9PM [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/fukuoka_kuroneko_domestic.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 
 <p class="airport_name">Naha Airport</p>
 <div class="s_box clearfix">
  <input type="radio" name="shipping_airport" class="airport_radio" id="airport_12" value="12">
  <label class="airport_label" for="airport_12">
   <p class="select_name">Post Office</p>
   <p class="address">1F, Arrival</p>
   <p class="open">9AM - 5PM [7 Days / Week]</p>
  </label>
  <p class="map_link"><a href="/airport_map/naha_postoffice.pdf" target="_blank"><img src="/img/btn/airport_map.png" width="100%" alt=""/></a></p>
 </div>
 
 
</section>

			<br>
			<span id="id_air" class="nodisp attention">*Please select</span>
             </dd>
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
			.airport_div .ui-btn-text{
				font-size:13px;
			}
			.airport_div .s_text{
				font-size:11px;
				color: #EC0531;
			}
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
				var air = 0;
				if($("input[name='shipping_airport']:checked").val()) {
					air = $("input[name='shipping_airport']:checked").val();
				}
				if(air == 0) {
					airportSelect(air);
				}
			});
			$("input[name='shipping_airport']").change(function(){
				var air = "";
				air = $(this).val();
				airportSelect(air);
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
					ts_name = "<a href=\"http://www.narita-airport.jp/en/guide/service/list/svc_23.html\" target=\"_blank\">成田国際空港郵便局　第1旅客ビル内分室　(8:30～20:00[年中無休])</a>";
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
					s_addr01 = "千葉県成田市御料牧場1-1";
					s_addr02 = "Narita Airport post office in terminal 1 局留め";
				} else if(str == 2) {
					s_zip01 = "282";
					s_zip02 = "0011";
					s_zipcode = "282-0011";
					s_pref = "12";
					s_addr01 = "Narita Airport terminal 1(South 1F)";
					s_addr02 = "QL liner QL1";
				} else if(str == 3) {
					s_zip01 = "282";
					s_zip02 = "0011";
					s_zipcode = "282-0011";
					s_pref = "12";
					s_addr01 = "成田市本三里塚字御料牧場1-1";
					s_addr02 = "第1ターミナル北1F　QLライナー気付";
				} else if(str == 4) {
					ts_name = "<a href=\"http://www.narita-airport.jp/en/guide/service/list/svc_23.html\" target=\"_blank\">成田国際空港郵便局 第2旅客ビル内分室　(8:30～20:00[年中無休])</a>";
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
					s_addr01 = "千葉県成田市古込1-1 ";
					s_addr02 = "Narita Airport post office in terminal 2 局留め";
				} else if(str == 5) {
					s_zip01 = "282";
					s_zip02 = "0011";
					s_zipcode = "282-0011";
					s_pref = "12";
					s_addr01 = "【Narita Airport terminal 2  1F ";
					s_addr02 = "QL liner】 QL2";
				} else if(str == 6) {
					ts_name = "<a href=\"http://www.tokyo-airport-bldg.co.jp/en/map/?terminal=1&floor=1\" target=\"_blank\">羽田空港郵便局　(9:00～17:00[土日祝日休み])</a>";
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
					s_addr01 = "東京都大田区羽田空港3-3-2 ";
					s_addr02 = "Haneda Airport in terminal 1 1F 局留め";
				} else if(str == 15) {
					ts_name = "<a href=\"/airport_map/haneda_jal_abc.pdf\" target=\"_blank\">羽田空港JALエービーシー宅配カウンター　(24時間営業)</a>";
					ts_zip = "144-0041";
					ts_addr = "東京都大田区羽田空港2-6-5　羽田国際線ターミナル２階　JALエービーシー　入国カウンター";
					s_name01 = "Haneda_airport";
					s_name02 = "JAL ABC Delivery counter";
					s_kana01 = "ハネダクウコウ";
					s_kana02 = "ジャルエービーシーカウンター";
					s_zip01 = "144";
					s_zip02 = "0041";
					s_zipcode = "144-0041";
					s_pref = "13";
					s_addr01 = "Tokyo Haneda Airport International terminal 2F ";
					s_addr02 = "JAL ABC counter H_ABC";
				} else if(str == 7) {
					ts_name = "<a href=\"http://www.centrair.jp/en/services/luggage/\" target=\"_blank\">常滑郵便局セントレア分室　(9:00～17:00[土日祝日休み])</a>";
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
					s_addr01 = "愛知県常滑市セントレア1-1 ";
					s_addr02 = "Centrair Airport post office局留め";
				} else if(str == 17) {
					ts_name = "";
					ts_zip = "479-8799";
					ts_addr = "常滑市セントレア1-1 中部国際空港ターミナルビル2F手荷物サービスカウンター内 JALエービーシー";
					s_name01 = "Chubu_Centrair_International_Airport";
					s_name02 = "JAL ABC Delivery counter";
					s_kana01 = "チュウブコクサイクウコウ";
					s_kana02 = "ジャルエービーシー";
					s_zip01 = "479";
					s_zip02 = "8799";
					s_zipcode = "479-8799";
					s_pref = "23";
					s_addr01 = "1-1 Centrair, Tokoname Baggage Delivery Service Counter (JAL ABC Delivery Counter) ";
					s_addr02 = "Chubu Centrair International Airport (S_ABC)";
				} else if(str == 8) {
					ts_name = "<a href=\"http://www.kansai-airport.or.jp/en/service/safe/index.html#_02\" target=\"_blank\">泉佐野郵便局関西空港分室　(9:00～17:00[年中無休])</a>";
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
					s_addr01 = "大阪府泉南郡田尻町泉州空港中1 ";
					s_addr02 = "Kansai Airport post office 局留め";
				} else if(str == 16) {
					ts_name = "<a href=\"http://www.kansai-airport.or.jp/en/service/safe/index.html#_02\" target=\"_blank\">関西国際空港JALエービーシー宅配カウンター　(6:15〜22:30)</a>";
					ts_zip = "549-0011";
					ts_addr = "大阪府泉南郡田尻町泉州空港中1番地 関西国際空港 ターミナル1／1F（到着階）ＪＡＬエービーシーカウンター";
					s_name01 = "Kansai_International_Airport";
					s_name02 = "JAL ABC Delivery counter";
					s_kana01 = "カンサイコクサイクウコウ";
					s_kana02 = "ャルエービーシーカウンター";
					s_zip01 = "549";
					s_zip02 = "0011";
					s_zipcode = "549-0011";
					s_pref = "27";
					s_addr01 = "Kansai International Airport／terminal 1（Arrival）1F ";
					s_addr02 = "JAL ABC delivery counter K_ABC";
				} else if(str == 9) {
					ts_name = "<a href=\"http://osaka-airport.co.jp/en/service/other_service/post/\" target=\"_blank\">豊中郵便局大阪国際空港分室　9:00～17:00（年中無休）</a>";
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
					s_addr01 = "大阪府豊中市螢池西町3丁目555 ";
					s_addr02 = "Itami Airport port office 局留め";
				} else if(str == 10) {
					ts_name = "<a href=\"http://www.new-chitose-airport.jp/en/service/baggage/postoffice/\" target=\"_blank\">千歳郵便局新千歳空港内分室　(9:00～17:00[年中無休])</a>";
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
					s_addr01 = "北海道千歳市美々 ";
					s_addr02 = "New Chitose Airport post office 局留め";
				} else if(str == 11) {
					ts_name = "<a href=\"http://www.fuk-ab.co.jp/english/luggage.html\" target=\"_blank\">福岡空港内郵便局　(9:00～17:00[平日]　9:00～15:00[土日祝日])</a>";
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
				} else if(str == 13) {
					ts_name = "<a href=\"http://www.fuk-ab.co.jp/map_int\" target=\"_blank\">福岡空港 国際線ターミナル 宅急便宅配カウンター　(7:30～21:00[年中無休])</a>";
					ts_zip = "812-0851";
					ts_addr = " 福岡県 福岡空港 国際線ターミナル1F 宅急便宅配カウンター";
					s_name01 = "Fukuoka_Airport";
					s_name02 = "International terminal Delivery counter";
					s_kana01 = "フクオカクウコウ";
					s_kana02 = "コクサイセンタッキュウビンタクハイカウンター";
					s_zip01 = "812";
					s_zip02 = "0851";
					s_zipcode = "812-0851";
					s_pref = "40";
					s_addr01 = "Fukuoka Airport International terminal Delivery counter ";
					s_addr02 = "国際線";
				} else if(str == 14) {
					ts_name = "<a href=\"http://www.fuk-ab.co.jp/map_int\" target=\"_blank\">福岡空港 国内線ターミナル 宅急便宅配カウンター　(7:30～21:00[年中無休])</a>";
					ts_zip = "812-0003";
					ts_addr = " 福岡県 福岡空港 国内線ターミナル 北1F 宅急便宅配カウンター";
					s_name01 = "Fukuoka_Airport";
					s_name02 = "Domestic terminal Delivery counter";
					s_kana01 = "フクオカクウコウ";
					s_kana02 = "コクナイセンタッキュウビンタクハイカウンター";
					s_zip01 = "812";
					s_zip02 = "0003";
					s_zipcode = "812-0003";
					s_pref = "40";
					s_addr01 = "Fukuoka Airport Domestic terminal Delivery counter ";
					s_addr02 = "国内線";
				} else if(str == 12) {
					ts_name = "<a href=\"http://www.naha-airport.co.jp/en/facility/service.html\" target=\"_blank\">那覇空港内簡易郵便局　(9:00～17:00)</a>";
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
					s_addr01 = "沖縄県那覇市鏡水150 ";
					s_addr02 = "Naha Airport post office 局留め";
				}
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
				var air = 0;
				if($("input[name='shipping_airport']:checked").val()) {
					air = $("input[name='shipping_airport']:checked").val();
				}
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
                Designation of delivery address</span></br>*Please key in delivery address without fail
            </dt>
                <dt>Name&nbsp;<span class="attention">*</span></dt>
                <dd>
                    <!--{assign var=key1 value="shipping_name01"}-->
                    <!--{assign var=key2 value="shipping_name02"}-->
                    <div class="attention_normal"><span class="attention">In the case of delivery to hotels</span>,the recipient name must accord with the reservation name at hotels.</div>
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
                <span class="attention gray">Please fill out by alphabet</span>
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

                <dt>Post Code<!--{if !$smarty.const.FORM_COUNTRY_ENABLE}-->&nbsp;<span class="attention">*</span><!--{/if}--></dt>
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
                        <div class="attention_normal">When the postal code is not searchable, 
please enter "000-0000" and leave a message about it on remarks column.</div>
                    </p>

                    <!--{if false}-->
                    <a href="javascript:eccube.getAddress('<!--{$smarty.const.INPUT_ZIP_URLPATH}-->', 'shipping_zip01', 'shipping_zip02', 'shipping_pref', 'shipping_addr01');" class="btn_sub btn_inputzip">郵便番号から住所自動入力</a><!--{/if}-->
                </dd>

                <dt>Address&nbsp;<span class="attention">*</span></dt>
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
                        class="boxLong top data-role-none text"
                        style="<!--{$arrErr[$key]|sfGetErrorColor}-->"
                        placeholder="e.g.：KS building 2F1-5" />
                    <!--{assign var=key value="shipping_addr02"}-->
                    <input type="text" name="<!--{$key}-->"
                        value="<!--{$arrForm[$key].value|h}-->"
                        class="boxLong data-role-none text"
                        style="<!--{$arrErr[$key]|sfGetErrorColor}-->"
                        placeholder="e.g.：Kandasuda-cho Chiyoda-ku" />
                </dd>
                
                <dt>Hotel name / Host name of Airbnb / Home Owner's Name</dt>
                <dd>
                    <!--{assign var=key value="shipping_company_name"}-->
                    <div class="attention_normal">If you receive your rental device <span class="attention">at your hotel</span>, please enter the name of your hotel.</div>
                    <p class="attention_normal">If you receive your rental device <span class="attention">at your Airbnb</span>, please enter the home owner's full name.</p>
                    <p class="attention_normal">If you receive your rental device <span class="attention">at your friend or family's home</span>, please enter the home owner's full name.</p>
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" class="boxLong text data-role-none" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
                </dd>

                <dt>Phone&nbsp;<span class="attention">*</span></dt>
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
            <div class="btn_area">
            <div class="link_box">
                <a href="javascript:void(0)" onclick="javascript:checkAirport();return false;"><span class="link_text">Next</span></a>
            </div>
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
