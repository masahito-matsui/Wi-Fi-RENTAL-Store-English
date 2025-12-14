<?php /* Smarty version 2.6.27, created on 2021-09-14 23:52:55
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/abouts/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/abouts/index.tpl', 25, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/abouts/index.tpl', 63, false),array('modifier', 'escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/abouts/index.tpl', 98, false),array('modifier', 'nl2br', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/abouts/index.tpl', 112, false),)), $this); ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['latitude'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) && ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['longitude'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
    <script type="text/javascript">//<![CDATA[
        $(function() {
            $("#maps").css({
                'margin-top': '15px',
                'margin-left': 'auto',
                'margin-right': 'auto',
                'width': '98%',
                'height': '300px'
            });
            var lat = <?php echo ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['latitude'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

            var lng = <?php echo ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['longitude'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

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
<?php endif; ?>
<div id="undercolumn">

    <div id="undercolumn_aboutus">
        <h2 class="title">Access</h2>

        <table summary="当サイトについて">
            <col width="20%" />
            <col width="80%" />
            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>Shop name</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>会社名</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>Address</th>
                    <td>〒<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['zip02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br /><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['arrSiteInfo']['pref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>TEL</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>FAX番号</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['fax02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['fax03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>E-mail</th>
                    <td><a href="mailto:<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'hexentity') : smarty_modifier_escape($_tmp, 'hexentity')); ?>
</a></td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['business_hour'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>Business hours</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['business_hour'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['good_traded'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>取扱商品</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['good_traded'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>メッセージ</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

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