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
<em>配送状況</em>：&nbsp;<a href="<!--{$shippingItem.confirm_url}--><!--{$shippingItem.plg_expresslink_slip_number}-->" target="_blank">確認</a><br />
<!--{/if}-->