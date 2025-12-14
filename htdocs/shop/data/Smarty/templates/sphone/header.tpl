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

<!--{strip}-->
<div id="top_fix">
	<div id="main-nav" class="stellarnav fixheader">
    <p class="sp_head_logo"><a href="/"><img src="/img/menu/sp_head_logo.png" width="100%" alt=""/></a></p>
    <a href="/order.html">
    <div class="sp_head_oerder">
    <p class="icon"><img src="/img/menu/icon_cart.png" width="100%" alt=""/></p>
    <p class="order_text">ORDER</p>
    </div>
    </a>
		<ul class="nav_contents">
            <li><a href="/" class="single">HOME</a></li>
			<li><a href="/system.html" class="single">SYSTEM</a>
		    	<ul>
		    		<li class="child"><a href="/system.html#scl_system">Our Rental System</a></li>
		    		<li class="child"><a href="/system.html#scl_delivery">Delivery</a></li>
		    		<li class="child"><a href="/system.html#scl_return">Return</a></li>
		    		<li class="child"><a href="/system.html#scl_procedures">Procedures</a></li>
		    	</ul>
		    </li>
		    <li><a href="/price.html">RATES <br>ITEMS</a>
                <ul>
		    		<li class="child"><a href="/price.html#scl_rental_rate">Rental Rates</a></li>
		    		<li class="child"><a href="/price.html#scl_rental_items">Rental Items</a></li>
		    	</ul>
            </li>
		    <li><a href="/receive.html">RECEIVE <br>RETURN</a>
                <ul>
		    		<li class="child"><a href="/receive.html#scl_airport">Airports</a></li>
		    		<li class="child"><a href="/receive.html#scl_hotel">Hotels</a></li>
		    		<li class="child"><a href="/receive.html#scl_home">Friend’s Home, Airbnb, Your Home, etc</a></li>
		    	</ul>
            </li>
		    <li><a href="/features.html" class="single">OUR FEATURES</a>
                <ul>
		    		<li class="child"><a href="/features.html">OUR FEATURES</a></li>
		    		<li class="child"><a href="/voice.html">TESTIMONIALS</a></li>
		    	</ul>
            </li>
		    <li><a href="/firsttime.html">For New <br>Customers</a></li>
		    <li><a href="/qa.html" class="single">FAQ</a></li>
            <li class="order_color active"><a href="/order.html" class="single">ORDER</a></li>
            <li class="sp_tab"><a href="/shop/mypage/login.php">MY PAGE</a>
                <ul>
                    <li class="child"><a href="/shop/mypage/login.php" class="single">Sign in</a></li>
		    		<li class="child"><a href="/shop/cart/" class="single">View Cart</a></li>
		    	</ul>
            </li>
            <li class="sp_tab"><a href="mailto:info@en.wifi-rental-store.jp">CONTACT</a>
                <ul>
                    <li class="child"><a href="mailto:info@en.wifi-rental-store.jp" class="single">MAIL: info@en.wifi-rental-store.jp</a></li>
		    		<li class="child"><a href="tel:81335258359" class="single">TEL: +81-3-3525-8359 (English)</a></li>
		    	</ul>
            </li>
		</ul>
	</div><!-- .stellar-nav -->
</div>

<!--{if false}-->

    <header class="global_header clearfix">
        <!--{if false}-->
        <div id="logo_area">
            <a rel="external" href="<!--{$smarty.const.TOP_URL}-->"><img src="<!--{$TPL_URLPATH}-->img/header/logo.png" width="150" height="25" alt="<!--{$arrSiteInfo.shop_name|h}-->" /></a>
        </div>
        <!--{/if}-->

<div class="sp_top_box001">
  <p class="tel">+81-3-3525-8351</p>
  <p class="mail"><a href="mailto:info@en.wifi-rental-store.jp">en.info@wifi-rental-store.jp</a></p>
</div>

        <div class="header_utility">
            <!--{* ▼HeaderInternal COLUMN *}-->
            <!--{if $arrPageLayout.HeaderInternalNavi|@count > 0}-->
                <!--{foreach key=HeaderInternalNaviKey item=HeaderInternalNaviItem from=$arrPageLayout.HeaderInternalNavi}-->
                    <!-- ▼<!--{$HeaderInternalNaviItem.bloc_name}--> -->
                    <!--{if $HeaderInternalNaviItem.php_path != ""}-->
                        <!--{include_php file=$HeaderInternalNaviItem.php_path items=$HeaderInternalNaviItem}-->
                    <!--{else}-->
                        <!--{include file=$HeaderInternalNaviItem.tpl_path items=$HeaderInternalNaviItem}-->
                    <!--{/if}-->
                    <!-- ▲<!--{$HeaderInternalNaviItem.bloc_name}--> -->
                <!--{/foreach}-->
            <!--{/if}-->
            <!--{* ▲HeaderInternal COLUMN *}-->
        </div>
    </header>
    
<!--{/if}-->

<!--{/strip}-->
