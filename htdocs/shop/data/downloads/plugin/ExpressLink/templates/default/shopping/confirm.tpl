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
<!--{if $shippingItem.plg_expresslink_center_stop}-->
<tr>
    <th scope="row">営業店・郵便局留め</th>
    <td><!--{$arrStop[$shippingItem.plg_expresslink_center_stop]}-->　[営業店コード・郵便局名]<!--{$shippingItem.plg_expresslink_center_code}--><!--{if $smarty.const.plg_ExpressLink_Use_YuPack4 == 1 || $smarty.const.plg_ExpressLink_Use_YuPackR == 1}-->&nbsp;&nbsp;[郵便番号]<!--{$shippingItem.plg_expresslink_center_zip}--><!--{/if}--></td>
</tr>
<!--{/if}-->

