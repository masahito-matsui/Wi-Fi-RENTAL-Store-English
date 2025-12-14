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

<!--{if $shippingItem.plg_expresslink_slip_number|strlen > 0}-->
<br />
<div style="text-align: right;"><a href="<!--{$shippingItem.confirm_url}--><!--{$shippingItem.plg_expresslink_slip_number}-->" target="_blank">配送状況確認</a></div>
<!--{/if}-->