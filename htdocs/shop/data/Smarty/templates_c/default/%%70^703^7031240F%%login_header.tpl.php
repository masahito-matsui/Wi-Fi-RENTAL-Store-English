<?php /* Smarty version 2.6.27, created on 2021-09-14 13:16:14
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/login_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/login_header.tpl', 1, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/login_header.tpl', 47, false),array('modifier', 'number_format', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/login_header.tpl', 53, false),array('modifier', 'default', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/login_header.tpl', 53, false),array('modifier', 'sfGetChecked', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/login_header.tpl', 70, false),)), $this); ?>
<?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
<script type="text/javascript">//<![CDATA[
    $(function(){
        var $login_email = $('#header_login_area input[name=login_email]');

        if (!$login_email.val()) {
            $login_email
                .val('Email')
                .css('color', '#757575');
        }

        $login_email
            .focus(function() {
                if ($(this).val() == 'Email') {
                    $(this)
                        .val('')
                        .css('color', '#000');
                }
            })
            .blur(function() {
                if (!$(this).val()) {
                    $(this)
                        .val('Email')
                        .css('color', '#757575');
                }
            });

        $('#header_login_form').submit(function() {
            if (!$login_email.val()
                || $login_email.val() == '') {
                if ($('#header_login_area input[name=login_pass]').val()) {
                    alert('Error: Your email address or password is not entered.');
                }
                return false;
            }
            return true;
        });
    });
//]]></script>
<?php endif; ?>
<?php echo '<div class="block_outer"><div id="header_login_area" class="clearfix"><form name="header_login_form" id="header_login_form" method="post" action="'; ?><?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'frontparts/login_check.php"'; ?><?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ' onsubmit="return eccube.checkLoginFormInputted(\'header_login_form\')"'; ?><?php endif; ?><?php echo '><input type="hidden" name="mode" value="login" /><input type="hidden" name="'; ?><?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" value="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" /><input type="hidden" name="url" value="'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$_SERVER['REQUEST_URI'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo '" /><div class="block_body clearfix">'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<div class="welcome_msg"><p class="comment">Welcome Mr./Ms. <span class="user_name">'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo ' '; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo ' </span></p>'; ?><?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?><?php echo '<p class="comment">Your current points is: <span class="point"> '; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_user_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?><?php echo ' pt</span></p>'; ?><?php endif; ?><?php echo '</div><div class="btn_box"><p class="btn"><a href="/shop/cart"><img src="/shop/img/btn/cart.png" width="100%" alt=""/></a></p><p class="btn"><a href="/shop/mypage"><img src="/shop/img/btn/mypage.png" width="100%" alt=""/></a></p>'; ?><?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_disable_logout'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<p class="btn"><input type="image" class="btn_hover" src="/shop/img/btn/header_logout.png" width="100%" onclick="eccube.fnFormModeSubmit(\'header_login_form\', \'logout\', \'\', \'\'); return false;" alt="ログアウト" /></p>'; ?><?php endif; ?><?php echo '</div>'; ?><?php else: ?><?php echo '<div class="formlist clearfix pc"><div class="mail_box"><p class="mail"><input type="text" class="box150" placeholder="Email" name="login_email" style="ime-mode: disabled;" title="Mail address :" /></p><p class="login_memory"><input type="checkbox" name="login_memory" id="header_login_memory" value="1" '; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_login_memory'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetChecked', true, $_tmp, 1) : SC_Utils_Ex::sfGetChecked($_tmp, 1)); ?><?php echo ' /><label for="header_login_memory"><span>Remember</span></label></p></div><div class="password_box"><p class="password"><input type="password" placeholder="password" class="box100" name="login_pass" title="Password :" /></p><p class="forgot"><a href="'; ?><?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'forgot/'; ?><?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" onclick="eccube.openWindow(\''; ?><?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'forgot/'; ?><?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '\',\'forget\',\'600\',\'400\',{scrollbars:\'no\',resizable:\'no\'}); return false;" target="_blank">Forgot your password?</a></p></div><div class="btn_box_login"><p class="btn"><input type="image" class="btn_hover" src="/shop/img/btn/header_login.png" width="100%" /></p><p class="btn"><a href="/shop/cart"><img src="/shop/img/btn/cart.png" width="100%" alt=""/></a></li></div></div><div class="formlist clearfix sp"><div class="btn_box_login"><p class="btn"><a href="/shop/mypage/login.php"><img src="/shop/img/btn/header_login.png" width="100%" alt=""/></a></p><p class="btn"><a href="/shop/cart"><img src="/shop/img/btn/cart.png" width="100%" alt=""/></a></li></div></div>'; ?><?php endif; ?><?php echo '</div></form></div></div>'; ?>
