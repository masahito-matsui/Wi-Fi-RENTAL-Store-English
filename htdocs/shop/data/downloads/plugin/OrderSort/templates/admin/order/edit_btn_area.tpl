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
    <div class="btn-area">
        <ul>
	        <!--{if $tpl_prev_order_id}-->
            <li><a class="btn-action" href="javascript:;" onclick="fnModeSubmit('pre_edit','order_id','<!--{$tpl_prev_order_id}-->'); return false;"><span class="btn-prev">前の受注情報へ</span></a></li>
            <!--{/if}-->
            <!--{if count($arrSearchHidden) > 0}-->
            <li><a class="btn-action" href="javascript:;" onclick="fnChangeAction('<!--{$smarty.const.ADMIN_ORDER_URLPATH}-->'); fnModeSubmit('search','search_pageno','<!--{$tpl_pageno}-->'); return false;"><span class="btn-prev">検索画面に戻る</span></a></li>
            <!--{/if}-->
            <li><a class="btn-action" href="javascript:;" onclick="return fnFormConfirm(); return false;"><span class="btn-next">この内容で登録する</span></a></li>
	        <!--{if $tpl_next_order_id}-->
            <li><a class="btn-action" href="javascript:;" onclick="fnModeSubmit('pre_edit','order_id','<!--{$tpl_next_order_id}-->'); return false;"><span class="btn-next">次の受注情報へ</span></a></li>
            <!--{/if}-->
        </ul>
    </div>