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

<!--{strip}-->
    <body class="<!--{$tpl_page_class_name|h}-->">
        <!--{$GLOBAL_ERR}-->
        <noscript>
            <p>JavaScript を有効にしてご利用下さい.</p>
        </noscript>

        <div class="frame_outer">
            <a name="top" id="top"></a>

            <!--{* ▼HeaderHeaderTop COLUMN*}-->
            <!--{if $arrPageLayout.HeaderTopNavi|@count > 0}-->
                <div id="headertopcolumn">
                    <!--{* ▼上ナビ *}-->
                    <!--{foreach key=HeaderTopNaviKey item=HeaderTopNaviItem from=$arrPageLayout.HeaderTopNavi}-->
                        <!-- ▼<!--{$HeaderTopNaviItem.bloc_name}--> -->
                        <!--{if $HeaderTopNaviItem.php_path != ""}-->
                            <!--{include_php file=$HeaderTopNaviItem.php_path items=$HeaderTopNaviItem}-->
                        <!--{else}-->
                            <!--{include file=$HeaderTopNaviItem.tpl_path items=$HeaderTopNaviItem}-->
                        <!--{/if}-->
                        <!-- ▲<!--{$HeaderTopNaviItem.bloc_name}--> -->
                    <!--{/foreach}-->
                    <!--{* ▲上ナビ *}-->
                </div>
            <!--{/if}-->
            <!--{* ▲HeaderHeaderTop COLUMN*}-->
            <!--{* ▼HEADER *}-->
            <!--{if $arrPageLayout.header_chk != 2}-->
                <!--{include file= $header_tpl}-->
            <!--{/if}-->
            <!--{* ▲HEADER *}-->

            <div id="container" class="clearfix">

                <!--{* ▼TOP COLUMN*}-->
                <!--{if $arrPageLayout.TopNavi|@count > 0}-->
                    <div id="topcolumn">
                        <!--{* ▼上ナビ *}-->
                        <!--{foreach key=TopNaviKey item=TopNaviItem from=$arrPageLayout.TopNavi}-->
                            <!-- ▼<!--{$TopNaviItem.bloc_name}--> -->
                            <!--{if $TopNaviItem.php_path != ""}-->
                                <!--{include_php file=$TopNaviItem.php_path items=$TopNaviItem}-->
                            <!--{else}-->
                                <!--{include file=$TopNaviItem.tpl_path items=$TopNaviItem}-->
                            <!--{/if}-->
                            <!-- ▲<!--{$TopNaviItem.bloc_name}--> -->
                        <!--{/foreach}-->
                        <!--{* ▲上ナビ *}-->
                    </div>
                <!--{/if}-->
                <!--{* ▲TOP COLUMN*}-->

                <!--{* ▼LEFT COLUMN *}-->
                <!--{if $arrPageLayout.LeftNavi|@count > 0}-->
                    <div id="leftcolumn" class="side_column">
                        <!--{* ▼左ナビ *}-->
                        <!--{foreach key=LeftNaviKey item=LeftNaviItem from=$arrPageLayout.LeftNavi}-->
                            <!-- ▼<!--{$LeftNaviItem.bloc_name}--> -->
                            <!--{if $LeftNaviItem.php_path != ""}-->
                                <!--{include_php file=$LeftNaviItem.php_path items=$LeftNaviItem}-->
                            <!--{else}-->
                                <!--{include file=$LeftNaviItem.tpl_path items=$LeftNaviItem}-->
                            <!--{/if}-->
                            <!-- ▲<!--{$LeftNaviItem.bloc_name}--> -->
                        <!--{/foreach}-->
                        <!--{* ▲左ナビ *}-->
                    </div>
                <!--{/if}-->
                <!--{* ▲LEFT COLUMN *}-->

                <!--{* ▼CENTER COLUMN *}-->
                <div id="main_column" <!--{**}-->
                    class="colnum<!--{$tpl_column_num|h}-->
                        <!--{if $tpl_column_num == 2}-->
                            <!--{" "}--><!--{if $arrPageLayout.LeftNavi|@count == 0}-->left<!--{else}-->right<!--{/if}-->
                        <!--{/if}-->
                    ">
                    <!--{* ▼メイン上部 *}-->
                    <!--{if $arrPageLayout.MainHead|@count > 0}-->
                        <!--{foreach key=MainHeadKey item=MainHeadItem from=$arrPageLayout.MainHead}-->
                            <!-- ▼<!--{$MainHeadItem.bloc_name}--> -->
                            <!--{if $MainHeadItem.php_path != ""}-->
                                <!--{include_php file=$MainHeadItem.php_path items=$MainHeadItem}-->
                            <!--{else}-->
                                <!--{include file=$MainHeadItem.tpl_path items=$MainHeadItem}-->
                            <!--{/if}-->
                            <!-- ▲<!--{$MainHeadItem.bloc_name}--> -->
                        <!--{/foreach}-->
                    <!--{/if}-->
                    <!--{* ▲メイン上部 *}-->

                    <!-- ▼メイン -->
                    <!--{include file=$tpl_mainpage}-->
                    <!-- ▲メイン -->

                    <!--{* ▼メイン下部 *}-->
                    <!--{if $arrPageLayout.MainFoot|@count > 0}-->
                        <!--{foreach key=MainFootKey item=MainFootItem from=$arrPageLayout.MainFoot}-->
                            <!-- ▼<!--{$MainFootItem.bloc_name}--> -->
                            <!--{if $MainFootItem.php_path != ""}-->
                                <!--{include_php file=$MainFootItem.php_path items=$MainFootItem}-->
                            <!--{else}-->
                                <!--{include file=$MainFootItem.tpl_path items=$MainFootItem}-->
                            <!--{/if}-->
                            <!-- ▲<!--{$MainFootItem.bloc_name}--> -->
                        <!--{/foreach}-->
                    <!--{/if}-->
                    <!--{* ▲メイン下部 *}-->
                </div>
                <!--{* ▲CENTER COLUMN *}-->

                <!--{* ▼RIGHT COLUMN *}-->
                <!--{if $arrPageLayout.RightNavi|@count > 0}-->
                    <div id="rightcolumn" class="side_column">
                        <!--{* ▼右ナビ *}-->
                        <!--{foreach key=RightNaviKey item=RightNaviItem from=$arrPageLayout.RightNavi}-->
                            <!-- ▼<!--{$RightNaviItem.bloc_name}--> -->
                            <!--{if $RightNaviItem.php_path != ""}-->
                                <!--{include_php file=$RightNaviItem.php_path items=$RightNaviItem}-->
                            <!--{else}-->
                                <!--{include file=$RightNaviItem.tpl_path items=$RightNaviItem}-->
                            <!--{/if}-->
                            <!-- ▲<!--{$RightNaviItem.bloc_name}--> -->
                        <!--{/foreach}-->
                        <!--{* ▲右ナビ *}-->
                    </div>
                <!--{/if}-->
                <!--{* ▲RIGHT COLUMN *}-->

                <!--{* ▼BOTTOM COLUMN*}-->
                <!--{if $arrPageLayout.BottomNavi|@count > 0}-->
                    <div id="bottomcolumn">
                        <!--{* ▼下ナビ *}-->
                        <!--{foreach key=BottomNaviKey item=BottomNaviItem from=$arrPageLayout.BottomNavi}-->
                            <!-- ▼<!--{$BottomNaviItem.bloc_name}--> -->
                            <!--{if $BottomNaviItem.php_path != ""}-->
                                <!--{include_php file=$BottomNaviItem.php_path items=$BottomNaviItem}-->
                            <!--{else}-->
                                <!--{include file=$BottomNaviItem.tpl_path items=$BottomNaviItem}-->
                            <!--{/if}-->
                            <!-- ▲<!--{$BottomNaviItem.bloc_name}--> -->
                        <!--{/foreach}-->
                        <!--{* ▲下ナビ *}-->
                    </div>
                <!--{/if}-->
                <!--{* ▲BOTTOM COLUMN*}-->

            </div>

            <!--{* ▼FOOTER *}-->
            <!--{if $arrPageLayout.footer_chk != 2}-->
                <!--{include file=$footer_tpl}-->
            <!--{/if}-->
            <!--{* ▲FOOTER *}-->
            <!--{* ▼FooterBottom COLUMN*}-->
            <!--{if $arrPageLayout.FooterBottomNavi|@count > 0}-->
                <div id="footerbottomcolumn">
                    <!--{* ▼上ナビ *}-->
                    <!--{foreach key=FooterBottomNaviKey item=FooterBottomNaviItem from=$arrPageLayout.FooterBottomNavi}-->
                        <!-- ▼<!--{$FooterBottomNaviItem.bloc_name}--> -->
                        <!--{if $FooterBottomNaviItem.php_path != ""}-->
                            <!--{include_php file=$FooterBottomNaviItem.php_path items=$FooterBottomNaviItem}-->
                        <!--{else}-->
                            <!--{include file=$FooterBottomNaviItem.tpl_path items=$FooterBottomNaviItem}-->
                        <!--{/if}-->
                        <!-- ▲<!--{$FooterBottomNaviItem.bloc_name}--> -->
                    <!--{/foreach}-->
                    <!--{* ▲上ナビ *}-->
                </div>
            <!--{/if}-->
            <!--{* ▲FooterBottom COLUMN*}-->
        </div>


<!-- ▼商品詳細モーダル -->
<style>

</style>


<style>
 .grayout{
	-webkit-filter: grayscale(1); /* Webkit */
	filter: gray; /* IE6-9 */
	filter: grayscale(1); /* W3C */
	cursor: default;
	pointer-events: none;
	opacity: 0.7;
	}
</style>
<div id="modal-content">
 <div class="wrap">
  <div id="slide0" class="no_disp">
    <p class="step_guide"><img src="/shop/img/detail/step_01.png" class="pc_step" width="100%" alt=""/><img src="/shop/img/detail/step_01_sp.png" class="sp_step" width="100%" alt=""/></p>
    <p class="title">Pickup Method</p>
    <!--<p class="sub_title">Please select</p>-->
		<div class="form-group">
			<ul class="deli_select">
				<li class="_grayout">
					<div class="radio">
						<label class="required store_pick"><input type="radio" id="receive_flg_0" class="receive_flg" name="receive_flg" required="required" value="0">
<img src="/shop/img/detail/pickup_01.png" width="100%" alt="店頭で受け取る"/></label>
					</div>
				</li>
				<li>
					<div class="radio">
						<label class="required deliv_pick"><input type="radio" id="receive_flg_1" class="receive_flg" name="receive_flg" required="required" value="1">
<img src="/shop/img/detail/pickup_02.png" width="100%" alt="宅配便で受け取る(本州, 四国)"/></label>
					</div>
				</li>
				<li>
					<div class="radio">
						<label class="required deliv_pick"><input type="radio" id="receive_flg_2" class="receive_flg" name="receive_flg" required="required" value="2">
<img src="/shop/img/detail/pickup_03.png" width="100%" alt="宅配便で受け取る(離島)"/></label>
					</div>
				</li>
				<li>
					<div class="radio">
						<label class="required deliv_pick"><input type="radio" id="receive_flg_1" class="receive_flg" name="receive_flg" required="required" value="3">
<img src="/shop/img/detail/pickup_04_2.png" width="100%" alt="空港で受け取る(羽田)"/></label>
					</div>
				</li>
				<li>
					<div class="radio">
						<label class="required deliv_pick"><input type="radio" id="receive_flg_1" class="receive_flg" name="receive_flg" required="required" value="4">
<img src="/shop/img/detail/pickup_05_2.png" width="100%" alt="空港で受け取る(成田, 関空, 名古屋)"/></label>
					</div>
				</li>
				<li>
					<div class="radio">
						<label class="required deliv_pick"><input type="radio" id="receive_flg_1" class="receive_flg" name="receive_flg" required="required" value="5">
<img src="/shop/img/detail/pickup_06_2.png" width="100%" alt="空港で受け取る(新千歳, 福岡)"/></label>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div id="slide1">
    <p class="step_guide"><img src="/shop/img/detail/step_02.png" class="pc_step" width="100%" alt=""/><img src="/shop/img/detail/step_02_sp.png" class="sp_step" width="100%" alt=""/></p>
    <dl id="detail_cart_box__cart_dates" class="dates">
    <p class="title">Rental period</p>
    <!--<p class="sub_comment">最短のレンタル期間は1泊2日です</p>-->
    <div class="select_date_wrap">
      <div class="date_s_box">
	      <dt style="color:#000;">Start Date</dt>
	      <label><input type="text" id="rental_start_date" class="form-control enter_form" name="rental_start_date" value="" readonly></label>
       <p class="extension_attention"></p>
      </div>

        <div class="form-group value_pack_select">
         <div class="name">Order from the rental plan list</div>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_01" class="value_pack" name="value_pack" required="required" value="01">2Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_02" class="value_pack" name="value_pack" required="required" value="02">3Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_03" class="value_pack" name="value_pack" required="required" value="03">4Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_04" class="value_pack" name="value_pack" required="required" value="04">5Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_05" class="value_pack" name="value_pack" required="required" value="05">6Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_06" class="value_pack" name="value_pack" required="required" value="06">7Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_07" class="value_pack" name="value_pack" required="required" value="07">8Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_08" class="value_pack" name="value_pack" required="required" value="08">9Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_09" class="value_pack" name="value_pack" required="required" value="09">10Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_10" class="value_pack" name="value_pack" required="required" value="10">11Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_11" class="value_pack" name="value_pack" required="required" value="11">12Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_12" class="value_pack" name="value_pack" required="required" value="12">13Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_13" class="value_pack" name="value_pack" required="required" value="13">14Days Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_30" class="value_pack" name="value_pack" required="required" value="30">1Month Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_60" class="value_pack" name="value_pack" required="required" value="60">2Months Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_90" class="value_pack" name="value_pack" required="required" value="90">3Months Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_120" class="value_pack" name="value_pack" required="required" value="120">4Months Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_150" class="value_pack" name="value_pack" required="required" value="150">5Months Plan</label>
           </div>
          </li>
          <li>
           <div class="radio">
            <label class="required"><input type="radio" id="value_pack_180" class="value_pack" name="value_pack" required="required" value="180">6Months Plan</label>
           </div>
          </li>
        </div>
      <div class="date_s_box end_date_s_box">
	      <dt style="color:#000;">End Date<span>（Return posting date）</span></dt>
	      <label><input type="text" id="rental_end_date" class="form-control enter_form" name="rental_end_date" value="" readonly></label>
      </div>
    </div>
    <style>
    .end_date_no_disp{
     display: none !important;
    }
    .plan_disp{
     opacity: 1;
    }
    </style>
<!--		<p><a href="?">入力をやり直す</a></p>-->
    </dl>
		<p id="rental_err_01" class="error no_disp">You can pick your rental end date 365 days later from your rental start date, at the latest.</p>
		<p id="rental_err_02" class="error no_disp">Your rental end date must be later than your rental start date.</p>
		<p id="rental_err_03" class="error no_disp">注文不可日が含まれています</p>
		<p id="rental_err_04" class="error no_disp">最短レンタル期間は1泊以上です</p>
  <style>
.value_pack_select {
    margin: 0 auto;
    text-align: center;
    margin-top: 0px;
    margin-bottom: 20px;
}
.value_pack_select .name {
    font-size: 16px;
    font-weight: bold;
    color: #000;
    margin-bottom: 15px;
    position: relative;
    padding-top: 31px;
}
.value_pack_select .name:before {
    content: "▼";
    position: absolute;
    font-size: 18px;
    left: 0;
    top: 0px;
    right: 0;
    margin: auto;
}
.value_pack_select .radio {
    margin: 0 auto;
    text-align: center;
    background-color: #2355a0;
    /* padding: 17px; */
    /* position: relative; */
    border-radius: 5px;
    box-shadow: 2px 2px 2px 0px #737373;
}
.value_pack_select li {
    margin: 0 auto;
    display: inline-block;
    width: 27%;
    margin-left: 2%;
    margin-right: 2%;
    text-align: center;
    margin-bottom: 10px;
}
.value_pack_select label {
    margin: 0 auto;
    display: block;
    position: relative;
    padding: 12px 17px;
    color: #fff;
    font-size: 15px;
}
.value_pack_select label input {
    margin: 0 auto;
    position: absolute;
    left: 10px;
    top: 16px;
}
@media only screen and (max-width: 767px){
.value_pack_select li {
    margin: 0 auto;
    width: 46%;
    margin-left: 2%;
    margin-right: 2%;
    text-align: center;
    margin-bottom: 10px;
}
.value_pack_select label {
    font-size: 13px;
    line-height: 1.5;
}
.value_pack_select label input {
    left: 8px;
    top: 7px;
}
}
  </style>

  <p class="selected_plan no_disp"><span id="selected2"></span></p>
	 <div class="modal_sub">
			<div id="confirm_rental_term" class="off">Next</div>
	 </div>
	</div>
	<div id="slide2" class="no_disp">
    <p class="step_guide"><img src="/shop/img/detail/step_03.png" class="pc_step" width="100%" alt=""/><img src="/shop/img/detail/step_03_sp.png" class="sp_step" width="100%" alt=""/></p>
    <div class="form-group form-inline">
      <div class="rental_option">
        <p class="title">Options</p>
      <div class="option_s_box">
       <p class="name">Insurance</p>
       <div class="option_info">
       <p class="comment">The insurance will cover repair costs in the event the rental product is damaged, including those caused by negligence.</p>
       <p class="option_fee">550<span>JPY/1Rental</span></p>
       </div>
       <div class="option_select">
        <div class="option_radio">
          <label class=""><input type="radio" id="kikaku2_1" class="kikaku2" name="kikaku2" value="1" />
<img src="/shop/img/detail/yes_insurance.png" width="100%" alt=""/></label>
        </div>
        <div class="option_radio">
          <label class=""><input type="radio" id="kikaku2_2" class="kikaku2" name="kikaku2" value="2" /><img src="/shop/img/detail/none_option.png" width="100%" alt=""/></label>
        </div>
       </div>
  			 </div>

      <div id="nobat" class="option_s_box">
       <p class="name">Additional Battery Rental</p>
       <div class="option_info">
       <p class="comment">Additional battery rental is available for 10,000mAh mobile batteries.</p>
       <p class="option_fee">50<span>JPY/Day</span></p>
       <p class="option_fee">750<span>JPY/1Month</span></p>
       </div>
       <div class="option_select">
        <div class="option_radio">
           <label class=""><input type="radio" id="kikaku3_1" class="kikaku3" name="kikaku3" value="1" /><img src="/shop/img/detail/yes_battery.png" width="100%" alt=""/></label>
        </div>
        <div class="option_radio">
         <label class=""><input type="radio" id="kikaku3_2" class="kikaku3" name="kikaku3" value="2" /><img src="/shop/img/detail/none_option.png" width="100%" alt=""/></label>
        </div>
       </div>
  			</div>
      </div>
      <div class="extension_option">
        <p class="title">Are you renting an additional battery?</p>
        <div class="option_s_box">
        <div class="option_select">
          <div class="option_radio">
           <label class=""><input type="radio" id="kikaku4_1" class="kikaku4" name="kikaku4" value="1" /><img src="/shop/img/detail/yes_battery.png" width="100%" alt=""/></label>
          </div>
          <div class="option_radio">
           <label class=""><input type="radio" id="kikaku4_2" class="kikaku4" name="kikaku4" value="2" /><img src="/shop/img/detail/none_option.png" width="100%" alt=""/></label>
          </div>
        </div>
  			</div>
      </div>
    </div>
		 <div class="modal_sub">
				<div id="confirm_kikaku2" class="off">Next</div>
		 </div>
	</div>
  <p id="btn_start_again">Reset</p>
 </div><!--/wrap-->
</div>


<!-- ▲商品詳細モーダル -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WF59GV5Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    </body>
<!--{/strip}-->
