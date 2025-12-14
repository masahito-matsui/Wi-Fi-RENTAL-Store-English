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

<nav class="header_navi">
    <ul>
        <li class="mypage"><img src="<!--{$TPL_URLPATH}-->img/header/btn_header_mypage.png" onclick="fnShowPopupmyPage(this)" width="30" height="20" alt="マイページ" /></li>
        <li class="cart"><img src="<!--{$TPL_URLPATH}-->img/header/btn_header_cart.png" onclick="fnShowPopupCart(this)" width="30" height="20" alt="カート" /></li>
    </ul>
</nav>
<!--!!空ボックス -->
<div class="popup_mypage">
    <!--{if $tpl_login}-->
        <p><span class="mini">Welcome</span><br />
        <a href="<!--{$smarty.const.HTTPS_URL}-->mypage/login.php" rel="external">Mr./Ms. <!--{$tpl_name1|h}--> <!--{$tpl_name2|h}--></a></p>
        <!--{if $smarty.const.USE_POINT !== false}-->
            <p>Your current point is <!--{$tpl_user_point|number_format|default:0}-->pt</p>
        <!--{/if}-->
        <p><a rel="external" href="javascript:void(document.login_form_footer.submit())">Log out</a></p>
    <!--{else}-->
        <p> </p>
        <p><a href="<!--{$smarty.const.HTTPS_URL}-->mypage/login.php" rel="external">Sign in</a></p>
    <!--{/if}-->
</div>

<div class="popup_cart">
    <!--{if count($arrCartList) > 0}-->
        <h2><a rel="external" href="<!--{$smarty.const.CART_URL|h}-->">Your Cart</a></h2>
<!--{php}-->
foreach($_SESSION["cart"][1] as $line) {
	if($line["id"] == 228) {
		$add_flg = 1;
	}
}
<!--{/php}-->

        <!--{foreach from=$arrCartList item=key}-->
            <div class="product_type">
                <!--{if count($arrCartList) > 1}-->
                    <p><span class="product_type">[<!--{$key.productTypeName|h}-->]</span></p>
                <!--{/if}-->
<!--{php}-->if($add_flg == 1) {<!--{/php}-->
                <p><span class="mini">Quantity:</span><span class="quantity"><!--{$key.quantity-1|number_format}--></span><br />
                    <span class="mini">Total:</span><span class="money"><!--{$key.totalInctax-1080|number_format}--></span> JPY</p>
<!--{php}-->} else {<!--{/php}-->
                <p><span class="mini">Quantity:</span><span class="quantity"><!--{$key.quantity|number_format}--></span><br />
                    <span class="mini">Total:</span><span class="money"><!--{$key.totalInctax|number_format}--></span> JPY</p>
<!--{php}-->}<!--{/php}-->
                <hr class="dashed" />
                <!--{if $freeRule > 0 && $key.productTypeId|h != $smarty.const.PRODUCT_TYPE_DOWNLOAD}-->
                    <!--{if $key.delivFree > 0}-->
                        <p class="attention free_money_area">あと<span class="free_money"><!--{$key.delivFree|number_format}--></span>円で送料無料</p>
                    <!--{else}-->
                        <p class="attention free_money_area">現在、送料無料です</p>
                    <!--{/if}-->
                <!--{/if}-->
            </div>
        <!--{/foreach}-->
    <!--{else}-->
        <!--※ 現在カート内に商品はございません。-->
    <!--{/if}-->
</div>


<script>
    var stateMyPage = 0;
    var stateCart = 0;
    function fnShowPopupmyPage(el) {
        $("div.popup_mypage").css("left", $(el).offset().left - $("div.popup_mypage").width() + 15);
        $("div.popup_mypage").toggle();
        //表示状態の更新
        if (stateMyPage == 0) {
            stateMyPage = 1;
        } else {
            stateMyPage = 0;
        }

        //カート情報の非表示化
        if (stateCart == 1) {
            $("div.popup_cart").hide();
            stateCart = 0;
        }
    }

    function fnShowPopupCart(el) {
        $("div.popup_cart").css("left", $(el).offset().left - $("div.popup_cart").width() + 15);
        $("div.popup_cart").toggle();
        //表示状態の更新
        if (stateCart == 0) {
            stateCart = 1;
        } else {
            stateCart = 0;
        }

        //カート情報の非表示化
        if (stateMyPage == 1) {
            $("div.popup_mypage").hide();
            stateMyPage = 0;
        }
    }
</script>
