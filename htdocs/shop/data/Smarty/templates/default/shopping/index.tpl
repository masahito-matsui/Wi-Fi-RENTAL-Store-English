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

<div id="undercolumn">
<div id="undercolumn_login">
<section class="login_sec">
 <div class="login_wrap">
  <div class="guest_box">
  <form name="member_form2" id="member_form2" method="post" action="?">
   <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
   <input type="hidden" name="mode" value="nonmember" />
   <label class="btn_link"><a>Guest Checkout</a><input type="image" style="display:none" class="hover_change_image" src="<!--{$TPL_URLPATH}-->img/button/btn_buystep.jpg" alt="ゲスト購入" name="buystep" id="buystep" /></label>
  </form>
  </div>
  
  <div class="entry_box">
   <p class="btn_entry"><a href="<!--{$smarty.const.ROOT_URLPATH}-->entry/">Create Your Account</a></p>
   <p class="comment">You can collect 5% of rental fees as points!</p>
  </div>
  
  <div class="signin_box">
   <p class="wrap_name">Sign in &amp; Checkout</p>
   <div class="form_box">
    <form name="member_form" id="member_form" method="post" action="?" onsubmit="return eccube.checkLoginFormInputted('member_form')">
    <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
    <input type="hidden" name="mode" value="login" />
    <div class="s_form mail">
    <!--{assign var=key value="login_email"}-->
    <!--{if strlen($arrErr[$key]) >= 1}--><span class="attention"><!--{$arrErr[$key]}--></span><br /><!--{/if}-->
    <input type="text" placeholder="E-mail" name="<!--{$key}-->" value="<!--{$tpl_login_email|h}-->" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->; ime-mode: disabled;" class="box300" />
    </div>
    <div class="s_form pass">
    <!--{assign var=key value="login_pass"}-->
    <span class="attention"><!--{$arrErr[$key]}--></span>
    <input type="password" placeholder="Password" name="<!--{$key}-->" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="box300" />
    </div>
    <p class="login_attention">
     <a href="<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->" onclick="eccube.openWindow('<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->','forget','600','460',{scrollbars:'no',resizable:'no'}); return false;" target="_blank">* Forgot Password</a><br /><br class="sp">
    </p>
    
    <p class="btn_login"><label class="btn_link"><a>Sign in</a><input type="image" style="display:none" class="hover_change_image" src="<!--{$TPL_URLPATH}-->img/button/btn_login.jpg" alt="ログイン" name="log" id="log" /></label></p>
    </form>
   </div>
  </div>
 </div>
</section>
</div>

</div>