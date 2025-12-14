<!--{*
/**
 * @copyright 2017 GMO Payment Gateway, Inc. All Rights Reserved.
 * @link http://www.gmo-pg.com/
 * Updated: 2012/07/30
 */
*}-->
<form name="form1" id="form1" method="POST" action="?" >
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<input type="hidden" name="mode" value="" />
<input type="hidden" name="ipaddress" value="" />
<div id="order" class="contents-main">
    <h2>検索条件設定</h2>
    <!--{* 検索条件設定テーブルここから *}-->
    <table>
        <tr>
            <th>IPアドレス</th>
            <td>
                <!--{assign var=key value="search_ipaddress"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|h}-->" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" size="15" class="box15" />
            </td>
        </tr>
    </table>

    <div class="btn">
        <div class="btn-area">
            <ul>
                <li><a class="btn-action" href="javascript:;" onclick="fnFormModeSubmit('form1', 'search', '', ''); return false;"><span class="btn-next">この条件で検索する</span></a></li>
            </ul>
        </div>
    </div>
    <!--検索条件設定テーブルここまで-->

    <h2>アカウント情報</h2>
    <!--{* 登録テーブルここから *}-->
    <!--{if $tpl_linemax > 0}-->
        <table class="list center">
            <colgroup width="10%">
            <colgroup width="10%">
            <colgroup width="10%">
            <colgroup width="10%">
            <colgroup width="10%">
            <colgroup width="10%">
            <tr>
                <th>IPアドレス</th>
                <th>エラー検出日時</th>
                <th>エラー回数</th>
                <th>ロック解除日時</th>
                <th>ロック状態</th>
                <th>ロック解除</th>
            </tr>
            <!--{foreach from=$arrAccounts item=arrAccount}-->
            <tr>
                <td><!--{$arrAccount.ipaddress|h}--></td>
                <td><!--{$arrAccount.date_time|h}--></td>
                <td><!--{$arrAccount.error_count|h}--></td>
                <td><!--{$arrAccount.unlock_date_time|h}--></td>
                <td><!--{$arrAccount.lock_status|h}--></td>
                <td><!--{if $arrAccount.is_lock}--><a href="javascript:;" onclick="fnFormModeSubmit('form1', 'unlock', 'ipaddress', '<!--{$arrAccount.ipaddress|h}-->'); return false;">解除</a><!--{/if}--></td>
            </tr>
            <!--{/foreach}-->
        </table>
    <!--{elseif $tpl_linemax == 0}-->
        <div class="message">
            該当するデータはありません。
        </div>
    <!--{/if}-->

    <!--{* 登録テーブルここまで *}-->
</div>
</form>
