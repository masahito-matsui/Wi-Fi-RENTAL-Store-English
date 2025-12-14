<!--{*
*
* Plugin Code : ExpressLink
*
* Copyright (C) 2016 BraTech Co., Ltd. All Rights Reserved.
* http://www.bratech.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
 *}-->
<script type="text/javascript">
<!--
    function fnSubmit() {
        if (!window.confirm('<!--{$tpl_order_id_cnt}-->件の発送メールを送信します。よろしいですか？')) {
            return;
        }
        var fm = document.form1.submit();
    }
//-->
</script>

<div id="products" class="contents-main">
    <div class="message">
        <span>CSV登録を実行しました。</span>
    </div>
    <!--{if $arrRowErr}-->
    <table class="form">
        <tr>
            <td>
                <!--{foreach item=err from=$arrRowErr}-->
                <span class="attention"><!--{$err}--></span><br/>
                <!--{/foreach}-->
            </td>
        </tr>
    </table>
    <!--{/if}-->
    <!--{if $arrRowResult}-->
    <table class="form">
        <tr>
            <td>
                <!--{foreach item=result from=$arrRowResult}-->
                <span><!--{$result|h}--><br/></span>
                <!--{/foreach}-->
            </td>
        </tr>
    </table>
    <!--{/if}-->
    <div class="btn-area">
        <ul>
            <li><a class="btn-action" href="?"><span class="btn-prev">戻る</span></a></li>
            <!--{if $tpl_order_id_array|strlen > 0}-->
            <li><a class="btn-action" href="javascript:;" onclick="fnSubmit();"><span class="btn-next">発送メール送信</span></a></li>
            <form name="form1" id="form1" method="post" action="mail.php">
                <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
                <input type="hidden" name="mode" value="send" />
                <input type="hidden" name="order_id_array" value="<!--{$tpl_order_id_array}-->">
                <input type="hidden" name="template_id" value="<!--{$tpl_shipping_mail_id|h}-->">
                <input type="hidden" name="subject" value="<!--{$arrShippingMailContents.subject|h}-->">
                <input type="hidden" name="header" value="<!--{$arrShippingMailContents.header|h}-->">
                <input type="hidden" name="footer" value="<!--{$arrShippingMailContents.footer|h}-->">
            </form>
            <!--{/if}-->
        </ul>
    </div>

</div>
