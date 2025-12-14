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
    <th>配送方法</th>
    <td colspan="3">
        <!--{assign var=key value="search_deliv_id"}-->
        <span class="attention"><!--{$arrErr[$key]|h}--></span>
        <!--{html_checkboxes name="$key" options=$arrDelivs selected=$arrForm[$key].value}-->
    </td>
</tr>
