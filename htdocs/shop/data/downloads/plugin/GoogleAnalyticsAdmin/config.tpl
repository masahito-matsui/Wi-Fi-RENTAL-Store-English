<!--{*
 *
 * やさしいGoogleAnalytics表示プラグイン
 * Copyright (C) 2014 株式会社アラタナ
 * info@aratana.jp
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *}-->
<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_header.tpl"}-->
<style>
option{
    padding : 7px;
}
select{
    padding : 7px;
}
input{
    padding : 7px;
}
table{
    margin  : 10px 0 0 0;
}
h1 {
    margin: 0 0 7px 0;
}
p {
    padding: 3px;
}
</style>
<form name="form1" id="form1" method="post" action="<!--{$smarty.server.REQUEST_URI|h}-->" enctype="multipart/form-data">
<input type="hidden" name="mode" value="register">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<input type="hidden" name="image_key" value="" />
<!--{foreach key=key item=item from=$arrForm.arrHidden}-->
<input type="hidden" name="<!--{$key}-->" value="<!--{$item|h}-->" />
<!--{/foreach}-->

<h1><!--{$tpl_subtitle}--></h1>
<p>※ログインするGoogleアカウントでアプリケーション認証を行う必要があります。</p>
<p>※2段階認証を設定しているアカウントは、<a href="https://support.google.com/accounts/answer/185833?hl=ja" target="_blank">アプリケーション固有のパスワードを設定</a>してください。</p>
<table>
    <tr>
        <th>Google Analytics Login ID</th>
        <td><input type="text" name="ga_id" value="<!--{$arrForm.ga_id|h}-->" maxlength="50" size="30" style="<!--{if $arrErr.pause != ""}-->background-color: <!--{$smarty.const.ERR_COLOR}-->;<!--{/if}-->" /></td>
    </tr>
    <tr>
        <th>Google Analytics Login PASSWORD</th>
        <td><input type="password" name="ga_pw" value="<!--{$arrForm.ga_pw|h}-->" maxlength="50" size="30" style="<!--{if $arrErr.pause != ""}-->background-color: <!--{$smarty.const.ERR_COLOR}-->;<!--{/if}-->" /></td>
    </tr>
    <tr>
        <th>ビュー ID</th>
        <td><input type="text" name="ga_view" value="<!--{$arrForm.ga_view|h}-->" maxlength="50" size="30" style="<!--{if $arrErr.pause != ""}-->background-color: <!--{$smarty.const.ERR_COLOR}-->;<!--{/if}-->" /></td>
    </tr>
    </tr>
</table>

<div class="btn-area">
  <ul>
    <li>
    <a class="btn-action" href="javascript:;" onclick="document.form1.submit();return false;"><span class="btn-next">この内容で登録する</span></a>
    </li>
  </ul>
</div>
</form>
<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_footer.tpl"}-->