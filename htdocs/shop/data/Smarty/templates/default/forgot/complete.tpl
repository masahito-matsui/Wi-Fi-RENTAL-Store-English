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
<!--{include file="`$smarty.const.TEMPLATE_REALDIR`popup_header.tpl" subtitle="パスワードを忘れた方(完了ページ)"}-->
<link rel="stylesheet" type="text/css" media="all" href="/shop/css/shop_reset.css">
<div id="window_area">
    <h2 class="title">Password Reset</h2>
    <p class="information">Password reset was completed successfully.<br>
You can change your password on My Page.</p>
    <form action="?" method="post" name="form1">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <div id="forgot">
            <!--{if $smarty.const.FORGOT_MAIL != 1}-->
                    <p class="new_password"><!--{$arrForm.new_password}--></p>
            <!--{else}-->
            <p><span class="attention">We have sent to registered email address</span></p>
            <!--{/if}-->
        </div>
        <div class="btn_area">
            <ul>
                <li class="form_btn"><a href="javascript:window.close()"><img class="btn_hover" src="/shop/img/btn/close.png" width="100%" alt="閉じる" /></a></li>
            </ul>
        </div>
    </form>
</div>
<style>
.form_btn {
    margin: 0 auto;
    width: 60%;
    max-width: 300px;
    display: inline-block !important;
    vertical-align: top;
    margin-top: 7px;
}
.btn_hover{
	cursor:pointer;
}
.btn_hover:hover{
	opacity:0.6;
	transition:0.4s;
}
</style>
<!--{include file="`$smarty.const.TEMPLATE_REALDIR`popup_footer.tpl"}-->
