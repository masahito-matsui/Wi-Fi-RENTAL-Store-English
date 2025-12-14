<!--{*
 * OrderSort
 * Copyright (C) 2012 Bratech CO.,LTD. All Rights Reserved.
 * http://wwww.bratech.co.jp/
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
    <h2>購入履歴一覧</h2>
    <!--{if $tpl_linemax > 0}-->
        <!--{* 購入履歴一覧表示テーブル *}-->
        <table class="list">
            <tr>
                <th>日付</th>
                <th>注文番号</th>
                <th>小計額</th>
                <th>支払方法</th>
                <th>対応状況</th>
            </tr>
            <!--{section name=cnt loop=$arrPurchaseHistory}-->
                <tr>
                    <td><!--{$arrPurchaseHistory[cnt].create_date|sfDispDBDate}--></td>
                    <td class="center"><a href="../order/edit.php?order_id=<!--{$arrPurchaseHistory[cnt].order_id}-->" ><!--{$arrPurchaseHistory[cnt].order_id}--></a></td>
                    <td class="center"><!--{$arrPurchaseHistory[cnt].subtotal|number_format}-->円</td>
                    <!--{assign var=payment_id value="`$arrPurchaseHistory[cnt].payment_id`"}-->
                    <td class="center"><!--{$arrPayment[$payment_id]|h}--></td>
                    <td class="center"><!--{assign var=status_id value=$arrPurchaseHistory[cnt].status}--><!--{$arrORDERSTATUS[$status_id]}--></td>
                </tr>
            <!--{/section}-->
        </table>
        <!--{* 購入履歴一覧表示テーブル *}-->
    <!--{else}-->
        <div class="message">購入履歴はありません。</div>
    <!--{/if}-->
    <br>