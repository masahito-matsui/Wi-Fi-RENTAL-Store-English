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

<div id="undercolumn">
    <div id="undercolumn_order">
        <h2 class="title">Act on Specified Commercial Transactions</h2>
        <table summary="特定商取引に関する法律に基づく表記">
            <col width="20%" />
            <col width="80%" />
            <tr>
                <th>Vendor Name</th>
                <td><!--{$arrOrder.law_company|h}--></td>
            </tr>
            <tr>
                <th>Authorized Representative</th>
                <td><!--{$arrOrder.law_manager|h}--></td>
            </tr>
            <tr>
                <th>Address</th>
                <td>〒<!--{$arrOrder.law_zip01|h}-->-<!--{$arrOrder.law_zip02|h}--><br /><!--{$arrPref[$arrOrder.law_pref]|h}--><!--{$arrOrder.law_addr01|h}--><!--{$arrOrder.law_addr02|h}--></td>
            </tr>
            <tr>
                <th>TEL</th>
                <td><!--{$arrOrder.law_tel01|h}-->-<!--{$arrOrder.law_tel02|h}-->-<!--{$arrOrder.law_tel03|h}--></td>
            </tr>
            <tr>
                <th>FAX</th>
                <td><!--{$arrOrder.law_fax01|h}-->-<!--{$arrOrder.law_fax02|h}-->-<!--{$arrOrder.law_fax03|h}--></td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td><a href="mailto:<!--{$arrOrder.law_email|escape:'hex'}-->"><!--{$arrOrder.law_email|escape:'hexentity'}--></a></td>
            </tr>
            <tr>
                <th>URL</th>
                <td><a href="<!--{$arrOrder.law_url|h}-->"><!--{$arrOrder.law_url|h}--></a></td>
            </tr>
            <tr>
                <th>Delivery and Return Fees</th>
                <td><!--{$arrOrder.law_term01|h|nl2br}--></td>
            </tr>
            <tr>
                <th>Order Method</th>
                <td><!--{$arrOrder.law_term02|h|nl2br}--></td>
            </tr>
            <tr>
                <th>Credit Terms</th>
                <td><!--{$arrOrder.law_term03|h|nl2br}--></td>
            </tr>
            <!--<tr>
                <th>支払期限</th>
                <td><!--{$arrOrder.law_term04|h|nl2br}--></td>
            </tr>-->
            <tr>
                <th>Delivery</th>
                <td><!--{$arrOrder.law_term05|h|nl2br}--></td>
            </tr>
            <tr>
                <th>Returns and Replacements</th>
                <td><!--{$arrOrder.law_term06|h|nl2br}--></td>
            </tr>
        </table>
    </div>
</div>
