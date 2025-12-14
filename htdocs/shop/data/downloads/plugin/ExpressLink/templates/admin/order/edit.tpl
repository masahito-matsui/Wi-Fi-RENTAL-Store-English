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
<tr>
    <th>伝票番号</th>
    <td>
        <!--{assign var=key value="plg_expresslink_slip_number"}-->
        <span class="attention"><!--{$arrErr[$key][$shipping_index]}--></span>
        <input type="text" name="<!--{$key}-->[<!--{$shipping_index}-->]" value="<!--{$arrForm[$key].value[$shipping_index]|h}-->" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key][$shipping_index]|sfGetErrorColor}-->" size="30" class="box30" />
    </td>
</tr>
<!--{if $use_center_stop == 1}-->
<tr>
    <th>営業店・郵便局留め</th>
    <td>
        <!--{assign var=key value="plg_expresslink_center_stop"}-->
        <span class="attention"><!--{$arrErr[$key][$shipping_index]}--></span>
        <select name="<!--{$key}-->[<!--{$shipping_index}-->]" style="<!--{$arrErr[$key]|sfGetErrorColor}-->">
            <!--{html_options options=$arrStop selected=$arrForm[$key].value[$shipping_index]}-->
        </select>
    </td>
</tr>
<tr>
    <th>営業店コード・郵便局名</th>
    <td>
        <!--{assign var=key value="plg_expresslink_center_code"}-->
        <span class="attention"><!--{$arrErr[$key][$shipping_index]}--></span>
        <input type="text" name="<!--{$key}-->[<!--{$shipping_index}-->]" value="<!--{$arrForm[$key].value[$shipping_index]|h}-->" class="box6">
    </td>
</tr>
<tr>
    <th>局留め郵便番号</th>
    <td>
        <!--{assign var=key value="plg_expresslink_center_zip"}-->
        <span class="attention"><!--{$arrErr[$key][$shipping_index]}--></span>
        <input type="text" name="<!--{$key}-->[<!--{$shipping_index}-->]" value="<!--{$arrForm[$key].value[$shipping_index]|h}-->" class="box6">
    </td>
</tr>
<!--{else}-->
<!--{assign var=key value="plg_expresslink_center_stop"}-->
<input type="hidden" name="<!--{$key}-->[<!--{$shipping_index}-->]" value="<!--{$arrForm[$key].value[$shipping_index]|h}-->" />
<!--{assign var=key value="plg_expresslink_center_code"}-->
<input type="hidden" name="<!--{$key}-->[<!--{$shipping_index}-->]" value="<!--{$arrForm[$key].value[$shipping_index]|h}-->" />
<!--{/if}-->
