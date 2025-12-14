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

<!--▼ FOOTER-->
<!--{if false}-->
<footer class="global_footer">

    <nav class="guide_area">
        <p>
            <a rel="external" href="<!--{$smarty.const.HTTP_URL}-->abouts/<!--{$smarty.const.DIR_INDEX_PATH|h}-->">当サイトについて</a>
            <a rel="external" href="<!--{$smarty.const.HTTPS_URL}-->contact/<!--{$smarty.const.DIR_INDEX_PATH|h}-->">お問い合わせ</a><br />
            <a rel="external" href="<!--{$smarty.const.HTTP_URL}-->order/<!--{$smarty.const.DIR_INDEX_PATH|h}-->">特定商取引法に基づく表記</a>
            <a rel="external" href="<!--{$smarty.const.HTTP_URL}-->guide/privacy.php">プライバシーポリシー</a>
        </p>
    </nav>

    <p class="copyright"><small>Copyright &copy;
        <!--{if $smarty.const.RELEASE_YEAR !=  $smarty.now|date_format:"%Y"}-->
            <!--{$smarty.const.RELEASE_YEAR}-->-
        <!--{/if}-->
        <!--{$smarty.now|date_format:"%Y"}--> <!--{$arrSiteInfo.shop_name_eng|default:$arrSiteInfo.shop_name|h}--> All rights reserved.</small></p>

</footer>
<!--{/if}-->

<footer>
  <ul>
   <li><a href="/">Home</a></li>
   <li><a href="/access.html">Access</a></li>
   <li><a href="/shop/order">Act on Specified Commercial Transactions</a></li>
   <li><a href="/terms.html">Terms and Conditions</a></li>
  </ul>
  <div class="copyright">
   <p class="logo"><a href="/"><img src="/img/footer/logo.png" width="134" height="47" alt=""/></a></p>
  Copyright © 2017 Wi-Fi RENTAL Store<br>All rights reserved.
  </div>
  <p class="image"><img src="/img/footer/foot_image.png" width="1650" height="241" alt=""/></p>
</footer>

<!--▲ FOOTER-->
