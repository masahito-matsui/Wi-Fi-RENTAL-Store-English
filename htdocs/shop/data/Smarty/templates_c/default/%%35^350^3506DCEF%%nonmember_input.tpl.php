<?php /* Smarty version 2.6.27, created on 2025-12-09 11:34:38
         compiled from shopping/nonmember_input.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'shopping/nonmember_input.tpl', 37, false),array('modifier', 'h', 'shopping/nonmember_input.tpl', 38, false),array('modifier', 'sfGetChecked', 'shopping/nonmember_input.tpl', 223, false),)), $this); ?>
﻿<!--カスタマーインフォのタイトル部分の調整-->
<style>
h2.title {
    margin-top: 0px;
}
</style>

<style>
#header_login_area{
display: none;
}
</style>

<div id="undercolumn">
    <div id="undercolumn_customer">
        <p class="flow_area"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/picture/img_flow_01.jpg" alt="購入手続きの流れ" /></p>
        <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>

        <div class="information">
            <p>Please fill in all required fields. <br><span class="attention">* </span>Required fields<br />
                <?php if (((is_array($_tmp=@USE_MULTIPLE_SHIPPING)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                    入力後、一番下の「上記のお届け先のみに送る」<br/>
                    または「複数のお届け先に送る」ボタンをクリックしてください。
                <?php else: ?>

                <?php endif; ?>
            </p>
        </div>

        <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <input type="hidden" name="mode" value="nonmember_confirm" />
            <input type="hidden" name="uniqid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_uniqid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />

            <?php $this->assign('key1', 'start_date'); ?>
            <?php $this->assign('key2', 'end_date'); ?>
            <?php $this->assign('key3', 'rental_term'); ?>
            <?php $this->assign('key4', 'rental_flg'); ?>
            <?php $this->assign('key5', 'extension_flg'); ?>
            <?php $this->assign('key6', 'receive_flg'); ?>
            <input type="hidden" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
            <input type="hidden" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
            <input type="hidden" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key3'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key3'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key3']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
            <input type="hidden" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key4'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key4'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key4']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
            <input type="hidden" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key5'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key5'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key5']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
            <input type="hidden" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key6'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key6'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key6']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />

            <table summary=" " style="margin-bottom:0;">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."frontparts/form_personal_input.tpl", 'smarty_include_vars' => array('flgFields' => 2,'emailMobile' => false,'prefix' => 'order_')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

			<?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?>
                <tr>
                    <th colspan="2" style="background-color:#ffffff;">
                        <p class="attention_deliv">Please enter the recipient name, and select your pickup location.</p>
                    </th>
                </tr>

					<tr>
						<th>Name<span class="attention">*</span></th>
						<td>
							<?php $this->assign('key1', 'shipping_name01'); ?>
                            <div class="airpot_name_attention">* Please enter the name on your passport.</div>
							<?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
								<div class="attention" style="background-color:#FFBCBD"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</div>
							<?php endif; ?>
							<input type="text" id="shipping_name01" name="shipping_name01" maxlength="50" style="ime-mode: disabled;" class="box300" />&nbsp;
						</td>
					</tr>
 <style>
  #shipping_name01{
  background-color: #fff !important;
  }
 </style>

             <?php $this->assign('key', 'deliv_check'); ?>
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


			<?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 4): ?>
             <?php $this->assign('key', 'deliv_check'); ?>
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
			<input type="hidden" name="shipping_addr01" value="KS_building_1F_1-5"/>
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
			<?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?>
			<?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 || ((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 9): ?>
                <tr>
                    <th colspan="2" style="background-color:#ffffff">
                    <?php $this->assign('key', 'deliv_check'); ?>
					<input type="hidden" name="deliv_check" value="1"/>
                    <p class="attention_deliv">Delivery Information</p>
                    <!--<p class="attention mini gray text-center">Key in the delivery address without fail</p>-->
                    </th>
                </tr>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."frontparts/form_personal_input_design.tpl", 'smarty_include_vars' => array('flgFields' => 1,'emailMobile' => false,'prefix' => 'shipping_')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
			<?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 8): ?>
			<?php else: ?>
                <tr>
                    <th colspan="2">
                    <?php $this->assign('key', 'deliv_check'); ?>
                    <input type="checkbox" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="1" onclick="eccube.toggleDeliveryForm();" <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetChecked', true, $_tmp, 1) : SC_Utils_Ex::sfGetChecked($_tmp, 1)); ?>
 id="deliv_label" checked />
                    <label for="deliv_label"><span class="attention_deliv">Delivery Information</span></br>※（When you designate delivery address except entered address above,Please key in delivery address without fail）</label>
                    </th>
                </tr>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."frontparts/form_personal_input_design.tpl", 'smarty_include_vars' => array('flgFields' => 1,'emailMobile' => false,'prefix' => 'shipping_')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
            </table>


 <?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?>
	<style>
.place_comment {
    margin: 0 auto;
    font-size: 12px;
    line-height: 1.5;
    color: #585858;
}
	</style>
 <div class="pickup_check"><span class="attention" style="font-size:12px;">*</span>Available Airports</div>
 <span id="id_air" class="nodisp attention">*Please select</span>
  <table class="airport_list" width="100%" border="1" cellspacing="0">
  <tbody>
    <tr class="pc-only">
      <td class="airport_name border_bottom" style="background-color:#f7f7f7; color:#000000;">Airport</td>
      <td class="place border_bottom" style="background-color:#f7f7f7; color:#000000;">Pickup Location</td>
      <td class="open border_bottom" style="background-color:#f7f7f7; color:#000000;">Business Hours</td>
    </tr>
    <tr>
      <td rowspan="2" align="center" valign="middle" class="airport_name border_bottom">Narita Airport<p class="attention">Please place your order by 2 days before your pickup, by 5PM in Japan time.</p></td>
      <td class="place border_bottom list receive4_td">
      <input type="radio" name="shipping_airport" class="airport_radio receive4" id="airport_2" value="2"><label class="airport_label" for="airport_2">
      Terminal 1 JAL ABC Delivery Counter</label><span><a href="javascript:window.open('https://www.wifi-rental-store.jp/wifi-main/img/pickup_airport/map/narita_JAL01.jpg','airport_popup_map','width=850,height=675');void(0);">Terminal 1 South Wing 1F, Arrival Floor</a></span><p class="place_comment">The delivery counter at Narita Airport has been changed from QL Liner to JAL ABC Delivery Counter in October 2020.</p></td>
      <td class="open border_bottom hour receive4_td">6:30AM - Last Flight<br class="pc">&nbsp;[7 Days / Week]</td>
    </tr>
    <!--<tr>
      <td class="open border_bottom hour">6:30AM - Last Flight<br>[7 Days / Week]</td>
      <td class="place border_bottom list">
      <input type="radio" name="shipping_airport" class="airport_radio" id="airport_1" value="1"><label class="airport_label" for="airport_1">
      Post office in Narita Airport (Terminal 1)<br><span><a href="javascript:window.open('/airport_map/narita_postoffice01.pdf','airport_popup_map','width=650,height=475');void(0);">Narita Airport terminal１ 4th floor</a></span></label></td>
      <td class="open border_bottom hour">8:30AM - 8PM<br>[7 Days / Week]</td>
    </tr>-->
    <!--<tr>
      <td class="place border_bottom list">
      <input type="radio" name="shipping_airport" class="airport_radio" id="airport_4" value="4"><label class="airport_label" for="airport_4">
      Post office in Narita airport (Terminal 2)<br><span><a href="javascript:window.open('/airport_map/narita_postoffice02.pdf','airport_popup_map','width=650,height=475');void(0);">Narita airport terminal２ 3rd floor</a></span></label></td>
      <td class="open border_bottom hour">8:30AM - 8PM<br>[7 Days / Week]</td>
    </tr>-->
    <tr>
      <td class="place border_bottom list receive4_td">
      <input type="radio" name="shipping_airport" class="airport_radio receive4" id="airport_5" value="5"><label class="airport_label" for="airport_5">
      Terminal 2 JAL ABC Delivery Counter</label><span><a href="javascript:window.open('https://www.wifi-rental-store.jp/wifi-main/img/pickup_airport/map/narita_JAL02.jpg','airport_popup_map','width=850,height=675');void(0);">Terminal 2, 1F, Arrival Floor</a></span><p class="place_comment">The delivery counter at Narita Airport has been changed from QL Liner to JAL ABC Delivery Counter in October 2020.</p></td>
      <td class="open border_bottom hour receive4_td">6:30AM - Last Flight<br class="pc">&nbsp;[7 Days / Week]</td>
    </tr>

    <tr>
      <td rowspan="1" align="center" valign="middle" class="airport_name border_bottom">Haneda Airport<p class="attention">You might have to stand in line more than 30 minutes at the counter.<br>
We recommend you to change your delivery address to your place of stay, if you are in a hurry. Please place your order by 2 days before your pickup, by 5PM in Japan time.</p></td>
      <td class="place border_bottom list receive3_td">
      <input type="radio" name="shipping_airport" class="airport_radio receive3" id="airport_15" value="15"><label class="airport_label" for="airport_15">
      JAL ABC Counter</label><span><a href="javascript:window.open('https://www.wifi-rental-store.jp/wifi-main/img/pickup_airport/map/haneda_JAL.jpg','airport_popup_map','width=850,height=675');void(0);">Terminal 3 (formerly called international terminal) , 2F, Arrival</a></span></td>
      <td class="open border_bottom hour receive3_td"><!--Open 24 hours-->4AM - 25AM (Closed from 1AM - 4AM) <br class="pc">&nbsp;[7 Days / Week]</td>
    </tr>

    <tr>
      <td rowspan="1" align="center" valign="middle" class="airport_name border_bottom">Centrair airport<br>(Chubu International Airport)<p class="attention">Please place your order by 2 days before your pickup, by 5PM in Japan time.</p></td>
      <td class="place border_bottom list receive4_td">
      <input type="radio" name="shipping_airport" class="airport_radio receive4" id="airport_17" value="17"><label class="airport_label" for="airport_17">
      Baggage Delivery Service Counter (JAL ABC Delivery Counter)</label><span><a href="javascript:window.open('https://www.wifi-rental-store.jp/wifi-main/img/pickup_airport/map/centrair_JAL.jpg','airport_popup_map','width=850,height=675');void(0);">2F, Arrival</a></span></td>
      <td class="open border_bottom hour receive4_td">7AM - 10PM<br class="pc">&nbsp;[7 Days / Week]<br><span style="color:#BC0003;"><!--※Closed：12/31-1/3--></span></td>
    </tr>

    <tr>
      <td rowspan="2" align="center" valign="middle" class="airport_name border_bottom">Kansai international<br>airport<p class="attention">Please place your order by 2 days before your pickup, by 5PM in Japan time.</p></td>
      <td class="place border_bottom list receive4_td" style="display: none;">
      <input type="radio" name="shipping_airport" class="airport_radio receive4" id="airport_8" value="8"><label class="airport_label" for="airport_8">
      Post Office</label><span><a href="javascript:window.open('https://www.wifi-rental-store.jp/wifi-main/img/pickup_airport/map/kansai_JAL.jpg','airport_popup_map','width=850,height=675');void(0);">Terminal 1, 2F, Arrival (Also Known as Izumisano Post Office)</a></span></td>
      <td class="open border_bottom hour receive4_td" style="display: none;">9AM - 5PM<br class="pc">&nbsp;[7 Days / Week]</td>
    </tr>

    <tr>
      <td class="place border_bottom list receive4_td">
      <input type="radio" name="shipping_airport" class="airport_radio receive4" id="airport_16" value="16"><label class="airport_label" for="airport_16">
      JAL ABC Delivery Counter</label><span><a href="javascript:window.open('https://www.wifi-rental-store.jp/wifi-main/img/pickup_airport/map/kansai_JAL_20250401.jpg','airport_popup_map','width=850,height=675');void(0);">Terminal 1, 1F, Arrival</a></span></a></span><br>
You will be able to pick up your items immediately upon arrival.</td>
      <td class="open border_bottom hour receive4_td">7AM - 10:30PM<br class="pc">&nbsp;[7 Days / Week]</td>
    </tr>

    <tr>
      <td rowspan="1" align="center" valign="middle" class="airport_name border_bottom">Itami Airport<br>(Osaka international Airport)<p class="attention">Please place your order by 2 days before your pickup, by 5PM in Japan time.</p></td>
      <td class="place border_bottom list receive4_td">
      <input type="radio" name="shipping_airport" class="airport_radio receive4" id="airport_9" value="9"><label class="airport_label" for="airport_9">
      Yamato Transport Delivery Counter</label><span><a href="javascript:window.open('https://www.wifi-rental-store.jp/wifi-main/img/pickup_airport/map/itami_kuroneko.jpg','airport_popup_map','width=850,height=675');void(0);">Central Terminal, 1F</a></span></td>
      <td class="open border_bottom hour receive4_td">7AM - 9PM<br class="pc">&nbsp;[7 Days / Week]</td>
    </tr>

    <tr>
      <td rowspan="1" align="center" valign="middle" class="airport_name border_bottom">New Chitose Airport<p class="attention">Please place your order by 3 days before your pickup, by 5PM in Japan time.</p></td>
      <td class="place border_bottom list receive5_td">
      <input type="radio" name="shipping_airport" class="airport_radio receive5" id="airport_10" value="10"><label class="airport_label" for="airport_10">
      Post Office</label><span><a href="javascript:window.open('https://www.wifi-rental-store.jp/wifi-main/img/pickup_airport/map/new_chitose_postoffice.jpg','airport_popup_map','width=850,height=675');void(0);">Located on 2F</a></span></td>
      <td class="open border_bottom hour receive5_td">9AM - 5PM<br class="pc">&nbsp;[7 Days / Week]</td>
    </tr>

    <tr>
      <td rowspan="2" align="center" valign="middle" class="airport_name border_bottom">Fukuoka Airport<p class="attention">Please place your order by 3 days before your pickup, by 5PM in Japan time.</p></td>
      <td class="place border_bottom list receive5_td">
      <input type="radio" name="shipping_airport" class="airport_radio receive5" id="airport_13" value="13"><label class="airport_label" for="airport_13">
      International Terminal Delivery Counter</label><span><a href="javascript:window.open('https://www.wifi-rental-store.jp/wifi-main/img/pickup_airport/map/fukuoka_kuroneko_inter.jpg','airport_popup_map','width=850,height=675');void(0);">International Terminal, 1F</a></span></td>
      <td class="open border_bottom hour receive5_td">7:30AM - 7PM<br class="pc">&nbsp;[7 Days / Week]</td>
    </tr>
    <tr>
      <td class="place border_bottom list receive5_td">
      <input type="radio" name="shipping_airport" class="airport_radio receive5" id="airport_14" value="14"><label class="airport_label" for="airport_14">
      Domestic Terminal Delivery Counter</label><span><a href="javascript:window.open('https://www.wifi-rental-store.jp/wifi-main/img/pickup_airport/map/fukuoka_kuroneko_domestic.jpg','airport_popup_map','width=850,height=675');void(0);">Domestic Terminal, North 1F</a></span></td>
      <td class="open border_bottom hour receive5_td">7AM - 9PM<br class="pc">&nbsp;[7 Days / Week]</td>
    </tr>

     <tr>
     <td rowspan="1" align="center" valign="middle" class="airport_name border_bottom" >Naha Airport<p class="attention">Now, we have stopped taking orders for pickup at Naha Airport Post Office, as they are closing permanently on February 24th 2019.</p></td>
      <td class="place border_bottom list" style="background-color: #e2e2e2;">
      <input type="radio" name="shipping_airport" class="airport_radio" id="airport_12" value="12" disabled><label class="airport_label" for="airport_12" style="color: #707070;">
      Post Office</label><span><a href="javascript:window.open('/airport_map/naha_postoffice.pdf','airport_popup_map','width=650,height=475');void(0);">1F, Arrival</a></span></td>
      <td class="open border_bottom hour" style="background-color: #e2e2e2;">9AM - 5PM<br class="pc">&nbsp;[7 Days / Week]<span style="color:#BC0003;"><!--※Closed：12/30-1/3--></span></td>
    </tr>
  </tbody>
</table>


<style type="text/css">
<!--
.nodisp {
display:none;
}
.airport_disable {
background-color: #e2e2e2;
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
					ts_name = "<a href=\"http://www.narita-airport.jp/en/guide/service/list/svc_23.html\" target=\"_blank\">成田国際空港郵便局　第1旅客ビル内分室　(8:30 - 20:00[年中無休])</a>";
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
					s_addr02 = "JAL ABC Delivery Counter N1S_ABC";
				} else if(str == 3) {
					s_zip01 = "282";
					s_zip02 = "0011";
					s_zipcode = "282-0011";
					s_pref = "12";
					s_addr01 = "成田市本三里塚字御料牧場1-1";
					s_addr02 = "第1ターミナル北1F　QLライナー気付";
				} else if(str == 4) {
					ts_name = "<a href=\"http://www.narita-airport.jp/en/guide/service/list/svc_23.html\" target=\"_blank\">成田国際空港郵便局 第2旅客ビル内分室　(8:30 - 20:00[年中無休])</a>";
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
					s_addr01 = "Narita Airport Terminal 2";
					s_addr02 = "JAL ABC Delivery Counter N2_ABC";
				} else if(str == 6) {
					ts_name = "<a href=\"http://www.tokyo-airport-bldg.co.jp/en/map/?terminal=1&floor=1\" target=\"_blank\">羽田空港郵便局　(9:00 - 17:00[土日祝日休み])</a>";
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
					ts_addr = "東京都大田区羽田空港2-6-5　羽田空港第3ターミナル(旧 国際線ターミナル)２階　JALエービーシー　入国カウンター";
					s_name01 = "Haneda_airport";
					s_name02 = "JAL ABC Delivery counter";
					s_kana01 = "ハネダクウコウ";
					s_kana02 = "ジャルエービーシーカウンター";
					s_zip01 = "144";
					s_zip02 = "0041";
					s_zipcode = "144-0041";
					s_pref = "13";
					s_addr01 = "Haneda Airport terminal 3 (formerly called international terminal) 2F ";
					s_addr02 = "JAL ABC counter H_ABC";
				} else if(str == 7) {
					ts_name = "<a href=\"http://www.centrair.jp/en/services/luggage/\" target=\"_blank\">常滑郵便局セントレア分室　(9:00 - 17:00[土日祝日休み])</a>";
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
					ts_name = "<a href=\"http://www.kansai-airport.or.jp/en/service/safe/index.html#_02\" target=\"_blank\">泉佐野郵便局関西空港分室　(9:00 - 17:00[年中無休])</a>";
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
					ts_addr = "大阪府泉南郡田尻町泉州空港中1番地 関西国際空港 ターミナル1／1F(国際線到着階) ＪＡＬエービーシーカウンター";
					s_name01 = "Kansai_International_Airport";
					s_name02 = "JAL ABC Delivery counter";
					s_kana01 = "カンサイコクサイクウコウ";
					s_kana02 = "ャルエービーシーカウンター";
					s_zip01 = "549";
					s_zip02 = "0011";
					s_zipcode = "549-0011";
					s_pref = "27";
					s_addr01 = "Kansai International Airport/terminal 1(Arrival)1F  ";
					s_addr02 = "JAL ABC delivery counter K_ABC";
				} else if(str == 9) {
					ts_name = "<a href=\"http://osaka-airport.co.jp/en/service/other_service/post/\" target=\"_blank\">豊中郵便局大阪国際空港分室　9:00 - 17:00（年中無休）</a>";
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
					s_addr01 = "Itami Airport ";
					s_addr02 = "Yamato Transport Delivery Counter";
				} else if(str == 10) {
					ts_name = "<a href=\"http://www.new-chitose-airport.jp/en/service/baggage/postoffice/\" target=\"_blank\">千歳郵便局新千歳空港内分室　(9:00 - 17:00[年中無休])</a>";
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
					ts_name = "<a href=\"http://www.fuk-ab.co.jp/english/luggage.html\" target=\"_blank\">福岡空港内郵便局　(9:00 - 17:00[平日]　9:00 - 15:00[土日祝日])</a>";
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
					ts_name = "<a href=\"http://www.fuk-ab.co.jp/map_int\" target=\"_blank\">福岡空港 国際線ターミナル 宅急便宅配カウンター　(7:30 - 21:00[年中無休])</a>";
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
					ts_name = "<a href=\"http://www.fuk-ab.co.jp/map_int\" target=\"_blank\">福岡空港 国内線ターミナル 宅急便宅配カウンター　(7:30 - 21:00[年中無休])</a>";
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
					ts_name = "<a href=\"http://www.naha-airport.co.jp/en/facility/service.html\" target=\"_blank\">那覇空港内簡易郵便局　(9:00 - 17:00)</a>";
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
/*
				$(':input[name="shipping_zip01"]').val(s_zip01);
				$(':input[name="shipping_zip02"]').val(s_zip02);
				$(':input[name="shipping_zipcode"]').val(s_zipcode);
				$(':input[name="shipping_pref"]').val(s_pref);
				$(':input[name="shipping_addr01"]').val(s_addr01);
				$(':input[name="shipping_addr02"]').val(s_addr02);
*/
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
<?php endif; ?>

<script>
$(function(){
  var obj = getRentalDate();
  $("#start_date").val(obj.start_date);
  $("#end_date").val(obj.end_date);
  $("#rental_term").val(obj.rental_term);
  $("#rental_flg").val(obj.rental_flg);
  $("#extension_flg").val(obj.extension_flg);
  $("#receive_flg").val(obj.receive_flg);

  if($('#receive_flg').val() == 3) {
    $('.receive4_td').addClass('airport_disable');
    $('.receive4').attr('disabled', true);
    $('.receive5_td').addClass('airport_disable');
    $('.receive5').attr('disabled', true);
  } else if($('#receive_flg').val() == 4) {
    $('.receive3_td').addClass('airport_disable');
    $('.receive3').attr('disabled', true);
    $('.receive5_td').addClass('airport_disable');
    $('.receive5').attr('disabled', true);
  } else if($('#receive_flg').val() == 5) {
    $('.receive3_td').addClass('airport_disable');
    $('.receive3').attr('disabled', true);
    $('.receive4_td').addClass('airport_disable');
    $('.receive4').attr('disabled', true);
  }

  function getRentalDate() {
    var obj = new Object();
		$.ajax({
			type: "post",
			url: "/api.php",
			data: {
					mode:"get_base_info"
					},
			cache: false,
      async: false
		}).done(function(data){
			//console.log('success');
			//console.log(data);
			var jsn = $.parseJSON(data);
      obj.start_date = jsn.start_date;
      obj.end_date = jsn.end_date;
      obj.rental_term = jsn.rental_term;
      obj.rental_flg = jsn.rental_flg;
      obj.extension_flg = jsn.extension_flg;
      obj.receive_flg = jsn.receive_flg;
		}).fail(function(data){
			//console.log('fail');
      obj.start_date = '';
      obj.end_date = '';
      obj.rental_term = '';
      obj.rental_flg = '';
      obj.extension_flg = '';
      obj.receive_flg = '';
		});
    return obj;
  }

});
</script>

            <?php if (((is_array($_tmp=@USE_MULTIPLE_SHIPPING)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                <p class="alignC">この商品を複数のお届け先に送りますか？</p>
            <?php endif; ?>
            <div class="btn_area">
                <ul>
                    <?php if (((is_array($_tmp=@USE_MULTIPLE_SHIPPING)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                        <li>
                            <input type="image" class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_singular.jpg" alt="上記のお届け先のみに送る" name="singular" id="singular" />
                        </li>
                        <li>
                            <a href="javascript:;" onclick="eccube.setModeAndSubmit('multiple', '', ''); return false">
                                <img class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_multiple.jpg" alt="複数のお届け先に送る" />
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="form_btn">
			<?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?>
			<a href="javascript:void(0)" onclick="javascript:checkAirport();return false;">
                  	  <img class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="次へ" />
			</a>
			<?php else: ?>
                            <input type="image" class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="次へ" name="singular" id="singular" />
			<?php endif; ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </form>
    </div>
</div>