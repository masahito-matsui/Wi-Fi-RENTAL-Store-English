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

<!--{if false}-->
<p style="text-align:left;">session</p>
<pre style="text-align:left;">
<!--{php}-->print_r($_SESSION);<!--{/php}-->
</pre>
<p style="text-align:left;">cookie</p>
<pre style="text-align:left;">
<!--{php}-->print_r($_COOKIE);<!--{/php}-->
</pre>
<p style="text-align:left;">request</p>
<pre style="text-align:left;">
<!--{php}-->print_r($_REQUEST);<!--{/php}-->
</pre>
<!--{/if}-->

<script>
    $(function () {
        $('.box-a, .box-b, .box-c, .box-d, .data-plans-height, .service-areas-height, .suitable-for-height, .section-newcustomers-comment').matchHeight();
        $('.box-bb, .box-cb, .orderheight').matchHeight();
//        $('.order-1-row, .order-2-row, .order-3-row').matchHeight();
    });
</script>

<footer class="bgcolor_a">
<div class="container">

  <div class="row">
      <div class="col-sm-4">
          <ul class="list list-footer">
              <li><a href="/index.html">HOME</a></li>
              <li><a href="/system.html">SYSTEM</a></li>
              <li><a href="/price.html">RATES ITEMS</a></li>
              <li><a href="/receive.html">RECEIVE &amp; RETURN</a></li>
              <li><a href="/features.html">OUR FEATURES</a></li>
              <li><a href="/voice.html">TESTIMONIALS</a></li>
              <li><a href="/firsttime.html">FOR NEW CUSTOMERS</a></li>
          </ul>
      </div>

      <div class="col-sm-4">
          <ul class="list list-footer pl-md-5"><!--bd-r-->
           <li><a href="/qa.html">FAQ</a></li>
           <li><a href="/data.html">Guide to Data Usage</a></li>
           <li><a href="/access.html">ACCESS</a></li>
           <li><a href="/aboutus.html">ABOUT US</a></li><br>
           <li><a href="/order.html">ORDER</a></li>
           <li><a href="/extension.html">EXTESION</a></li>
          </ul>
      </div>

      <div class="col-sm-4">
          <ul class="list list-footer pl-md-5">
           <li><a href="/shop/mypage/login.php">SIGN&nbsp;IN</a></li>
           <li><a href="/shop/cart/">VIEW&nbsp;CART</a></li>
           <li><a href="/terms.html">Terms and Conditions</a></li>
											<li><a href="/shop/order/">Act on Specified Commercial Transactions</a></li>
											<br>
           <li><a href="https://www.rental-store.jp/" target="_blank">Japanese</a></li>
          </ul>
      </div>
  </div>

  <div class="row pt-5 pl-md-5">
    <div class="col-sm-4 d-none d-md-block text-center"><img src="/img/footer/foot_logo_sp.png" alt="logo"></div>
    <div id="info" class="col-sm">
      <p>9:30AM - 6:30PM (Weekdays Only)</p>
      <p><a href="/access.html">KS building 2F 1-5, Kandasuda-cho, Chiyoda-ku, Tokyo</a></p>
      <p>+81-3-3525-8359 (English)</p>
      <p>info@en.wifi-rental-store.jp</p>
    </div>

     <div class="col-sm-4 d-sm-block d-md-none">
      <div class="row">
       <div class="col-4"><img src="/img/footer/foot_logo_sp.png" alt="logo"></div>
       <div id="copy" class="col small mt-3 text-center"><p>&copy; 2014 Wi-Fi RENTAL Store</p></div>
      </div>
     </div>
  </div>

  <div class="row d-none d-xl-block">
     <div id="copy" class="col-sm text-center small"><p>&copy; 2014 Wi-Fi RENTAL Store</p></div>
  </div>

</div>
</footer>
