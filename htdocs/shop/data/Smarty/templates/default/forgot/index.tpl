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
<!--{include file="`$smarty.const.TEMPLATE_REALDIR`popup_header.tpl" subtitle="パスワードを忘れた方(入力ページ)"}-->


<!-----ショップリセット------->
<link rel="stylesheet" type="text/css" media="all" href="/shop/css/shop_reset.css">

<div id="window_area">
    <h2>Reset Password</h2>
    <p class="information">* Name field must match the account holder's name.</p>
    <form action="?" method="post" name="form1">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <input type="hidden" name="mode" value="mail_check" />

        <div id="forgot">
            <div class="contents">
                <div class="mailaddres">
                    <p class="attention"><!--{$arrErr.email}--></p>
                    <p>
                        Email: 
                        <input type="text" name="email" value="<!--{$arrForm.email|default:$tpl_login_email|h}-->" class="box300" style="<!--{$arrErr.email|sfGetErrorColor}-->; ime-mode: disabled;" />
                    </p>
                </div>
                <div class="name">
                    <p class="attention">
                        <!--{$arrErr.name01}--><!--{$arrErr.name02}-->
                        <!--{$errmsg}-->
                    </p>
                    <p>
                        Name: 
                        <input type="text" class="box300" name="name01" value="<!--{$arrForm.name01|default:''|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.name01|sfGetErrorColor}-->; ime-mode: disabled;" />
                        <!--名&nbsp;<input type="text" class="box120" name="name02" value="<!--{$arrForm.name02|default:''|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.name02|sfGetErrorColor}-->; ime-mode: active;" />-->
                    </p>
                </div>
            </div>
        </div>
        <div class="btn_area">
            <ul>
                <li class="form_btn"><input type="image" class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="次へ" name="next" id="next" /></li>
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

