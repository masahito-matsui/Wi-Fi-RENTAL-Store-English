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
 <script type="text/javascript">
<!--
    function fnEdit2(customer_id) {
        document.form1.action = '<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.ADMIN_DIR}-->customer/edit.php';
        document.form1.mode.value = "edit_search"
        document.form1['edit_customer_id'].value = customer_id;
		document.form1.search_pageno.value = 1;
        document.form1.submit();
        return false;
    }
	
	function fnChangeTarget(target) {
		document.form1.target = target;
	}
	
	function fnChangeMode(mode) {
		document.form1['mode'].value = mode;
	}	
//-->
</script>	
            <td>
                <!--{if $arrForm.customer_id.value > 0}-->
                    <a href="?" onclick="fnChangeTarget('_blank'); fnEdit2('<!--{$arrForm.customer_id.value|h}-->'); fnChangeAction('?'); fnChangeTarget(''); fnChangeMode('<!--{$tpl_mode|default:"edit"|h}-->'); return false;"><!--{$arrForm.customer_id.value|h}--></a>
                    <input type="hidden" name="customer_id" value="<!--{$arrForm.customer_id.value|h}-->" />
                <!--{else}-->
                    (非会員)
                <!--{/if}-->
            </td>