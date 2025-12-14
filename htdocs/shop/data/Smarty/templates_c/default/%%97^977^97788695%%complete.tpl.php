<?php /* Smarty version 2.6.27, created on 2021-09-17 23:34:16
         compiled from forgot/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'forgot/complete.tpl', 29, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."popup_header.tpl", 'smarty_include_vars' => array('subtitle' => "パスワードを忘れた方(完了ページ)")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" type="text/css" media="all" href="/shop/css/shop_reset.css">
<div id="window_area">
    <h2 class="title">Password Reset</h2>
    <p class="information">Password reset was completed successfully.<br>
You can change your password on My Page.</p>
    <form action="?" method="post" name="form1">
        <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
        <div id="forgot">
            <?php if (((is_array($_tmp=@FORGOT_MAIL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != 1): ?>
                    <p class="new_password"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['new_password'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
            <?php else: ?>
            <p><span class="attention">We have sent to registered email address</span></p>
            <?php endif; ?>
        </div>
        <div class="btn_area">
            <ul>
                <li class="form_btn"><a href="javascript:window.close()"><img class="btn_hover" src="/shop/img/btn/close.png" width="100%" alt="閉じる" /></a></li>
            </ul>
        </div>
    </form>
</div>
<style>
.form_btn {
    margin: 0 auto;
    width: 60%;
    max-width: 300px;
    display: inline-block !important;
    vertical-align: top;
    margin-top: 7px;
}
.btn_hover{
	cursor:pointer;
}
.btn_hover:hover{
	opacity:0.6;
	transition:0.4s;
}
</style>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."popup_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>