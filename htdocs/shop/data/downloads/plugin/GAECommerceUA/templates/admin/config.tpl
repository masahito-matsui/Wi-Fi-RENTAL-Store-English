<!--{*
 * GAECommerceUA: UA版 Google Analytics eコマース対応 プラグイン
 * Copyright (C) 2013 C-Rowl Co.,Ltd. All Rights Reserved.
 * http://www.c-rowl.com/
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *}-->
<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_header.tpl"}-->
<script type="text/javascript">//<![CDATA[
function win_open(URL){
    var WIN;
    WIN = window.open(URL);
    WIN.focus();
}
//]]></script>
<style type="text/css">
<!--
h1 {
    margin-bottom: 10px;
}
.info {
    font-size: 90%;
    text-indent: -1.2em;
    padding-left: 1.2em;
    margin-top: 5px;
    letter-spacing: 0.1em;
    color: #666;
}
-->
</style>

<h1><span class="title"><!--{$tpl_subtitle}--></span></h1>

<form name="form1" id="form1" method="post" action="<!--{$smarty.server.REQUEST_URI|escape}-->">
    <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
    <input type="hidden" name="mode" value="edit" />

    <h2>基本設定</h2>
    <table class="form">
        <colgroup>
            <col width="22%" />
            <col width="78%" />
        </colgroup>

        <!--{assign var=key value="ga_tid"}-->
        <tr id="<!--{$key}-->">
            <th>トラッキングID<span class="attention"> *</span></th>
            <td>
                <!--{if $arrErr[$key]}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{/if}-->
                <input type="text" name="<!--{$key}-->" style="ime-mode:disabled; <!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value|h}-->" class="box40" maxlength="<!--{$arrForm[$key].length}-->" />
                <br />
                <p class="info">
                    ※ 「UA-xxxxxxxx-x」の形式のIDを入力してください。
                </p>
            </td>
        </tr>
    </table>

    <h2>eコマース トラッキング設定</h2>
    <table class="form">
        <colgroup>
            <col width="22%" />
            <col width="78%" />
        </colgroup>
        <!--{assign var=key value="op_category"}-->
        <tr id="<!--{$key}-->">
            <th>カテゴリ<span class="attention"> *</span></th>
            <td>
                <!--{if $arrErr[$key]}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{/if}-->
                <label><input type="radio" value="1" name="<!--{$key}-->" <!--{if $arrForm[$key].value == $smarty.const.PLG_CC_GAECUA_OP_CATEGORY_TOP}-->checked="checked"<!--{/if}-->>トップカテゴリ名</label>&nbsp;&nbsp;
                <label><input type="radio" value="2" name="<!--{$key}-->" <!--{if $arrForm[$key].value == $smarty.const.PLG_CC_GAECUA_OP_CATEGORY_DETAIL}-->checked="checked"<!--{/if}-->>詳細カテゴリ名</label>&nbsp;&nbsp;
                <label><input type="radio" value="3" name="<!--{$key}-->" <!--{if $arrForm[$key].value == $smarty.const.PLG_CC_GAECUA_OP_CATEGORY_OFF}-->checked="checked"<!--{/if}-->>カテゴリを含めない</label>&nbsp;&nbsp;
                <br />
                <p class="info">
                    ※ eコマーストラッキング情報に含める「カテゴリ」に設定する情報を選択します。<br />
                    例）&nbsp;商品が「りんご」で&nbsp;『食品 &gt; 果物 &gt; りんご』&nbsp;のようにカテゴリ登録されている場合、トップカテゴリは「食品」、詳細カテゴリは「果物」となります。
                </p>
            </td>
        </tr>

        <!--{assign var=key value="op_name_with_class"}-->
        <tr id="<!--{$key}-->">
            <th>商品名に規格名を<br />含める<span class="attention"> *</span></th>
            <td>
                <!--{if $arrErr[$key]}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{/if}-->
                <label><input type="radio" value="1" name="<!--{$key}-->" <!--{if $arrForm[$key].value == $smarty.const.PLG_CC_GAECUA_OP_FLG_ON}-->checked="checked"<!--{/if}-->>含める</label>&nbsp;&nbsp;
                <label><input type="radio" value="2" name="<!--{$key}-->" <!--{if $arrForm[$key].value == $smarty.const.PLG_CC_GAECUA_OP_FLG_OFF}-->checked="checked"<!--{/if}-->>含めない</label>&nbsp;&nbsp;
                <br />
                <p class="info">
                    ※ 商品情報に規格名を含めるか指定します。<br />
                    例）&nbsp;商品が「アイス」で、「味」「大きさ」という規格がある場合、規格名を含めると商品名は「アイス(バニラ/L)」となります。
                </p>
            </td>
        </tr>

    </table>

    <div class="btn-area">
        <ul>
            <li>
                <a class="btn-action" href="javascript:;" onclick="document.body.style.cursor = 'wait';document.form1.submit();return false;"><span class="btn-next">この内容で登録する</span></a>
            </li>
        </ul>
    </div>

</form>

<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_footer.tpl"}-->
