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

<section id="undercolumn">
    <h2 class="title"><!--{$tpl_title|h}--></h2>

	<p><span class="attention">■Order Information</span><br />
					Order Number : <!--{$smarty.session.order_id}-->
	</p>

    <!-- ▼その他決済情報を表示する場合は表示 -->
    <!--{if $arrOther.title.value}-->
        <p>
            <em>■<!--{$arrOther.title.name}-->情報</em><br />
            <!--{foreach key=key item=item from=$arrOther}-->
                <!--{if $key != "title"}-->
                    <!--{if $item.name != ""}-->
                        <!--{$item.name}-->：
                    <!--{/if}-->
                    <!--{$item.value|nl2br}--><br />
                <!--{/if}-->
            <!--{/foreach}-->
        </p>
    <!--{/if}-->
    <!-- ▲コンビに決済の場合には表示 -->

    <div class="thankstext">
        <!--{if false}-->
        <p><!--{$arrInfo.shop_name|h}-->の商品をご購入いただき、ありがとうございました。</p>
        <!--{/if}-->
        <p>Thank you for using our service.</p>
    </div>
    <hr>
    <div id="completetext">
        <p>We have just sent confirmation email about your order.<br />

If you should not receive confirmation email, please take a morment to contact us by email or phone because of a possibility for trouble.<br />

We look forward to our continued communication.<br /><br />
If your email address is Yahoomail, hotmail or Gmail, sometimes you don't recieve email.</p>
        <div class="btn_area">
            <a href="/" class="btn_toppage btn_sub" rel="external">Top page</a>
        </div>
    </div>
    <hr>
    <div class="shopInformation">
        <p><!--{$arrInfo.shop_name|h}--></p>
        <p>TEL：<!--{$arrInfo.tel01}-->-<!--{$arrInfo.tel02}-->-<!--{$arrInfo.tel03}--><br />
            E-mail：<a href="mailto:<!--{$arrInfo.email02|escape:'hex'}-->" rel="external"><!--{$arrInfo.email02|escape:'hexentity'}--></a></p>
    </div>
</section>

<!--{include file= 'frontparts/search_area.tpl'}-->

