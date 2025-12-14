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
    <!--{include file=$tpl_navi}-->
    <form name="form1" id="form1" method="post" action="?">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <input type="hidden" name="refusal_transactionid" value="<!--{$refusal_transactionid}-->" />
        <input type="hidden" name="mode" value="complete" />

        <div id="mycontents_area">
            <h3><!--{$tpl_subtitle|h}--></h3>
            <div id="complete_area">
                <div class="message">Are you sure that you want to delete your account?</div>
                <div class="message_area">
                    <div class="btn_area">
                        <ul>
                            <li class="form_btn">
                                <a href="./refusal.php"><img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る" alt="いいえ、退会しません" /></a>
                            </li>
                            <li class="form_btn">
                                <input type="image" class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="はい、退会します" name="refuse_do" id="refuse_do" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
