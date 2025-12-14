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

<!--{if $arrSiteInfo.latitude && $arrSiteInfo.longitude}-->
    <script type="text/javascript">//<![CDATA[
        $(function() {
            $("#maps").css({
                'margin-top': '15px',
                'margin-left': 'auto',
                'margin-right': 'auto',
                'width': '98%',
                'height': '300px'
            });
            var lat = <!--{$arrSiteInfo.latitude}-->
            var lng = <!--{$arrSiteInfo.longitude}-->
            if (lat && lng) {
                var latlng = new google.maps.LatLng(lat, lng);
                var mapOptions = {
                    zoom: 15,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map($("#maps").get(0), mapOptions);
                var marker = new google.maps.Marker({map: map, position: latlng});
            } else {
                $("#maps").remove();
            }
        });
    //]]></script>
<!--{/if}-->
<div id="undercolumn">

    <div id="undercolumn_aboutus">
        <h2 class="title">Access</h2>

        <table summary="当サイトについて">
            <col width="20%" />
            <col width="80%" />
            <!--{if strlen($arrSiteInfo.shop_name)}-->
                <tr>
                    <th>Shop name</th>
                    <td><!--{$arrSiteInfo.shop_name|h}--></td>
                </tr>
            <!--{/if}-->

            <!--{if strlen($arrSiteInfo.company_name)}-->
                <tr>
                    <th>会社名</th>
                    <td><!--{$arrSiteInfo.company_name|h}--></td>
                </tr>
            <!--{/if}-->

            <!--{if strlen($arrSiteInfo.zip01)}-->
                <tr>
                    <th>Address</th>
                    <td>〒<!--{$arrSiteInfo.zip01|h}-->-<!--{$arrSiteInfo.zip02|h}--><br /><!--{$arrPref[$arrSiteInfo.pref]|h}--><!--{$arrSiteInfo.addr01|h}--><!--{$arrSiteInfo.addr02|h}--></td>
                </tr>
            <!--{/if}-->

            <!--{if strlen($arrSiteInfo.tel01)}-->
                <tr>
                    <th>TEL</th>
                    <td><!--{$arrSiteInfo.tel01|h}-->-<!--{$arrSiteInfo.tel02|h}-->-<!--{$arrSiteInfo.tel03|h}--></td>
                </tr>
            <!--{/if}-->

            <!--{if strlen($arrSiteInfo.fax01)}-->
                <tr>
                    <th>FAX番号</th>
                    <td><!--{$arrSiteInfo.fax01|h}-->-<!--{$arrSiteInfo.fax02|h}-->-<!--{$arrSiteInfo.fax03|h}--></td>
                </tr>
            <!--{/if}-->

            <!--{if strlen($arrSiteInfo.email02)}-->
                <tr>
                    <th>E-mail</th>
                    <td><a href="mailto:<!--{$arrSiteInfo.email02|escape:'hex'}-->"><!--{$arrSiteInfo.email02|escape:'hexentity'}--></a></td>
                </tr>
            <!--{/if}-->

            <!--{if strlen($arrSiteInfo.business_hour)}-->
                <tr>
                    <th>Business hours</th>
                    <td><!--{$arrSiteInfo.business_hour|h}--></td>
                </tr>
            <!--{/if}-->

            <!--{if strlen($arrSiteInfo.good_traded)}-->
                <tr>
                    <th>取扱商品</th>
                    <td><!--{$arrSiteInfo.good_traded|h|nl2br}--></td>
                </tr>
            <!--{/if}-->

            <!--{if strlen($arrSiteInfo.message)}-->
                <tr>
                    <th>メッセージ</th>
                    <td><!--{$arrSiteInfo.message|h|nl2br}--></td>
                </tr>
            <!--{/if}-->

        </table>

        <div id="maps"></div>

         <div class="access_box002">
      <!--<div class="main">
 　　<p class="title">お店までの道順</p>
 　　<p class="map"><img src="/img/access/access_map-01.png" width="800"alt=""/></p>
      </div>-->
      
       <div class="main">
            <p class="title">Here's more on directions</p>
            <p class="left_img"><img src="/img/access/map-01.png" width="422" height="317" alt=""/></p>
             <p class="right_text">Explanation on directions form JR Akihabara station to Wi-Fi RENTAL Store. <br>
Plrease go out ""Electonic town gate"" after geting off  a train at Akihabara station.</p>
         <p class="clearfix"></p>
    </div>
    <div class="main">
            <p class="left_img"><img src="/img/access/map-02.png" width="422" height="317" alt=""/></p>
             <p class="right_text">You can see a bulding of SEGA at your left hand after going out ticket gate.<br>
Please turn a right at the buliging of SEGA.</p>
         <p class="clearfix"></p>
    </div>
    <div class="main">
            <p class="left_img"><img src="/img/access/map-03.png" width="422" height="317" alt=""/></p>
             <p class="right_text">You can see LAOX, Onoden, atre1 at the front.<br>
Please go straight ahead.</p>
         <p class="clearfix"></p>
    </div>
    <div class="main">
            <p class="left_img"><img src="/img/access/map-04.png" width="422" height="317" alt=""/></p>
             <p class="right_text">Please turn  left after you come to Chuo street.</p>
         <p class="clearfix"></p>
    </div>
    <div class="main">
            <p class="left_img"><img src="/img/access/map-05.png" width="422" height="317" alt=""/></p>
             <p class="right_text">You can see Mansei building at the front and walk to intersection.</p>
         <p class="clearfix"></p>
    </div>
    <div class="main">
            <p class="left_img"><img src="/img/access/map-06.png" width="422" height="317" alt=""/></p>
             <p class="right_text">Please head for diagonally opposite of intersection.</p>
         <p class="clearfix"></p>
    </div>
    <div class="main">
            <p class="left_img"><img src="/img/access/map-07.png" width="422" height="317" alt=""/></p>
             <p class="right_text">There is Mansei bridge and find maAAch after crossing the bridge. </p>
         <p class="clearfix"></p>
    </div>
    <div class="main">
            <p class="left_img"><img src="/img/access/map-08.png" width="422" height="317" alt=""/></p>
             <p class="right_text">There is gas station(shell).<br>
Please go straight again.<br>
Wi-Fi RENTAL Store is located at the scond bldg from the gas station.</p>
         <p class="clearfix"></p>
    </div>
    <div class="main">
            <p class="left_img"><img src="/img/access/map-09.png" width="422" height="317" alt=""/></p>
             <p class="right_text">Wi-FI RENTAL Store is on second floor of the bldg.<br>
You can see a wind glass sign saying "WiFi RENTAL Store" </p>
         <p class="clearfix"></p>
    </div>
    <div class="main">
            <p class="left_img"><img src="/img/access/map-10.png" width="422" height="317" alt=""/></p>
             <p class="right_text">You can't miss it !</p>
         <p class="clearfix"></p>
    </div>
 </div>

 
    </div>
</div>
