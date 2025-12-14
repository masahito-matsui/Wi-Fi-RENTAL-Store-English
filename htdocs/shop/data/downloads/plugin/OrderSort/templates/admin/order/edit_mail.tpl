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
<a class="btn-normal" href="?" onclick="fnChangeAction('mail.php'); fnChangeTarget('_blank'); fnModeSubmit('pre_edit', 'order_id', '<!--{$arrForm.order_id.value|h}-->'); fnChangeAction('?'); fnChangeTarget(''); fnChangeMode('<!--{$tpl_mode|default:"edit"|h}-->'); return false;">メール送信</a>