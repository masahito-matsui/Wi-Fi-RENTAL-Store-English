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
    <!-----fixed------->
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/shop/vendor/bootstrap/bootstrap_custom.css">
    <script src="/shop/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="/shop/vendor/matchheight/jquery.matchHeight-min.js"></script>
    <!-----/fixed------->

    <!--webfont-->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Oswald|PT+Sans+Narrow:700" rel="stylesheet">
    <!--/webfont-->

    <!--icon-->
    <link href="/shop/vendor/iconic/css/open-iconic-bootstrap.css" rel="stylesheet">
    <!--/icon-->
    <script src="/js/common.js"></script>
    <link href="/shop/css/style.css?v=1" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="all" href="/shop/css/shop_reset.css">

<!--{strip}-->
    <div id="undercolumn">
        <div id="undercolumn_error">
            <div class="message_area">
                <!--★エラーメッセージ-->
                <p class="error"><!--{$tpl_error}--></p>
            </div>

            <div class="btn_area">
                <ul>
                    <li>
                        <!--{if $return_top}-->
                            <a href="<!--{$smarty.const.TOP_URL}-->"><img class="btn_hover" src="/shop/img/btn/top.png" width="100%" alt="トップへ戻る" /></a>
                        <!--{else}-->
                            <a href="javascript:history.back()"><img class="btn_hover" src="/shop/img/btn/back.png" width="100%" alt="戻る" /></a>
                        <!--{/if}-->
                    </li>
                </ul>
            </div>
        </div>
    </div>
<style>
.btn_area{
	margin:0 auto;
	width:80%;
	max-width:421px;
}
</style>
<!--{/strip}-->
