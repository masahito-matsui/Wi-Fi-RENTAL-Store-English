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
div#top_fix {
    display: none;
}
header {
    width: 94%;
    background: #FFF;
    margin: 0 auto;
    padding: 5px 0 10px 0;
    clear: both;
    min-height: 40px;
    margin-top: 10px;
}
footer {
    display: none;
}
</style>
<section id="windowcolumn">
    <h2 class="title">Password Reset</h2>
    <form action="?" method="post" name="form1">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <input type="hidden" name="mode" value="mail_check" />
        <div class="intro">
            <p>* Name field must match the account holder's name.</p>
        </div>
        <div class="window_area clearfix">
            <p>
                Name<br />
                <span class="attention"><!--{$arrErr.name01}--><!--{$arrErr.name02}--></span>
                <input type="text" name="name01"
                    value="<!--{$arrForm.name01|default:''|h}-->"
                    maxlength="<!--{$smarty.const.STEXT_LEN}-->"
                    style="<!--{$arrErr.name01|sfGetErrorColor}-->; ime-mode: disabled;"
                    class="boxLong text data-role-none" placeholder=""/>
<!--                <input type="text" name="name02"
                    value="<!--{$arrForm.name02|default:''|h}-->"
                    maxlength="<!--{$smarty.const.STEXT_LEN}-->"
                    style="<!--{$arrErr.name02|sfGetErrorColor}-->;"
                    class="boxHarf text data-role-none" placeholder="名"/>-->
            </p>
            <hr />
            <p>
                Email<br />
                <span class="attention"><!--{$arrErr.email}--></span>
                <input type="email" name="email"
                value="<!--{$tpl_login_email|h}-->"
                style="<!--{$arrErr.email|sfGetErrorColor}-->;"
                maxlength="200" class="text boxLong data-role-none" />
            </p>
            <span class="attention" style="margin-left:10px"><!--{$errmsg}--></span>
            <hr />
        </div>

        <div class="btn_area"><p><input class="btn data-role-none" type="submit" value="Next" /></p></div>
    </form>
</section>
