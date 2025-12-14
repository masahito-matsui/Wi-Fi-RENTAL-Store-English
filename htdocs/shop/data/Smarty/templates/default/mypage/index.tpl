<!--{*
/*
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
 */
*}-->

<div id="mypagecolumn">
    <h2 class="title"><!--{$tpl_title|h}--></h2>
    <!--{if $tpl_navi != ""}-->
        <!--{include file=$tpl_navi}-->
    <!--{else}-->
        <!--{include file=`$smarty.const.TEMPLATE_REALDIR`mypage/navi.tpl}-->
    <!--{/if}-->
    <div id="mycontents_area">
        <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
            <input type="hidden" name="order_id" value="" />
            <input type="hidden" name="pageno" value="<!--{$objNavi->nowpage}-->" />
            <h3><!--{$tpl_subtitle|h}--></h3>

            <!--{if $objNavi->all_row > 0}-->

                <p><span class="attention"><!--{$objNavi->all_row}--></span> Result(s)</p>
                <div class="pagenumber_area">
                    <!--▼ページナビ-->
                    <!--{$objNavi->strnavi}-->
                    <!--▲ページナビ-->
                </div>

                <table summary="購入履歴" class="pc-table">
                    <tr>
                        <th class="alignC" width="25%">The date of purchase (YYYY/MM/DD)</th>
                        <th class="alignC" width="13%">Order number</th>
                        <th class="alignC" width="17%">Payment method</th>
                        <th class="alignC" width="15%">Total amount</th>
                        <!--{if $smarty.const.MYPAGE_ORDER_STATUS_DISP_FLAG }-->
                        <th class="alignC" width="15%">Status</th>
                        <!--{/if}-->
                        <th class="alignC" width="15%">Details</th>
                    </tr>
                    <!--{section name=cnt loop=$arrOrder}-->
                        <tr>
                            <td class="alignC"><!--{$arrOrder[cnt].create_date|sfDispDBDate}--></td>
                            <td class="alignC"><!--{$arrOrder[cnt].order_id}--></td>
                            <!--{assign var=payment_id value="`$arrOrder[cnt].payment_id`"}-->
                            <td class="alignC"><!--{$arrPayment[$payment_id]|h}--></td>
                            <td class="alignC"><!--{$arrOrder[cnt].payment_total|number_format}--> JPY</td>

                            <!--{if $smarty.const.MYPAGE_ORDER_STATUS_DISP_FLAG }-->
                                <!--{assign var=order_status_id value="`$arrOrder[cnt].status`"}-->
                                <!--{if $order_status_id != $smarty.const.ORDER_PENDING }-->
                                <td class="alignC"><!--{$arrCustomerOrderStatus[$order_status_id]|h}--></td>
                                <!--{else}-->
                                <td class="alignC attention"><!--{$arrCustomerOrderStatus[$order_status_id]|h}--></td>
                                <!--{/if}-->
                            <!--{/if}-->
                            <td class="alignC"><a href="<!--{$smarty.const.ROOT_URLPATH}-->mypage/history.php?order_id=<!--{$arrOrder[cnt].order_id}-->">Show Details</a></td>
                        </tr>
                    <!--{/section}-->
                </table>
                
   <table summary="購入履歴" class="sp-table" width="100%">
      <tr>
          <th class="alignC" style="display:none">The date of purchase (YYYY/MM/DD)</th>
          <th class="alignC" width="28%">Order number</th>
          <th class="alignC" style="display:none">Payment method</th>
          <th class="alignC" width="32%">Total amount</th>
          <!--{if $smarty.const.MYPAGE_ORDER_STATUS_DISP_FLAG }-->
          <th class="alignC" width="20%">Status</th>
          <!--{/if}-->
          <th class="alignC" width="20%">Details</th>
      </tr>
      <!--{section name=cnt loop=$arrOrder}-->
      <th class="alignC" colspan="4" width="100%"><!--{$arrOrder[cnt].create_date|sfDispDBDate}--></th>
          <tr>
              <td class="alignC"><!--{$arrOrder[cnt].order_id}--></td>
              <!--{assign var=payment_id value="`$arrOrder[cnt].payment_id`"}-->
              <td class="alignC" style="display:none"><!--{$arrPayment[$payment_id]|h}--></td>
              <td class="alignC"><!--{$arrOrder[cnt].payment_total|number_format}--> JPY</td>

              <!--{if $smarty.const.MYPAGE_ORDER_STATUS_DISP_FLAG }-->
                  <!--{assign var=order_status_id value="`$arrOrder[cnt].status`"}-->
                  <!--{if $order_status_id != $smarty.const.ORDER_PENDING }-->
                  <td class="alignC"><!--{$arrCustomerOrderStatus[$order_status_id]|h}--></td>
                  <!--{else}-->
                  <td class="alignC attention"><!--{$arrCustomerOrderStatus[$order_status_id]|h}--></td>
                  <!--{/if}-->
              <!--{/if}-->
              <td class="alignC"><a href="<!--{$smarty.const.ROOT_URLPATH}-->mypage/history.php?order_id=<!--{$arrOrder[cnt].order_id}-->">Details</a></td>
          </tr>
      <!--{/section}-->
  </table>
  

            <!--{else}-->
                <p>There is no purchase history</p>
            <!--{/if}-->
        </form>
    </div>
</div>
