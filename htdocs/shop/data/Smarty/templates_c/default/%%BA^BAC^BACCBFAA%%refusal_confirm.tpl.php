<?php /* Smarty version 2.6.27, created on 2023-11-11 01:11:41
         compiled from mypage/refusal_confirm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'mypage/refusal_confirm.tpl', 4, false),array('modifier', 'h', 'mypage/refusal_confirm.tpl', 4, false),)), $this); ?>


<div id="mypagecolumn">
    <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php if (! ((is_array($_tmp=$this->_tpl_vars['is_link_load'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?> 
<script type="text/javascript">//<![CDATA[
    $(function(){
        $('div#mynavi_area li:last').after('<li><a href="change_card.php" class="">カード情報編集</a></li>');
        });

//]]></script>

<?php endif; ?>
<?php $this->assign('is_link_load', '1'); ?>

</h2>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_navi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form name="form1" id="form1" method="post" action="?">
        <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><input type="hidden" name="refusal_transactionid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['refusal_transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><input type="hidden" name="mode" value="complete"><div id="mycontents_area">
            <h3><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h3>
            <div id="complete_area">
                <div class="message">Are you sure that you want to delete your account?</div>
                <div class="message_area">
                    <div class="btn_area">
                        <ul><li class="form_btn">
                                <a href="./refusal.php"><img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る"></a>
                            </li>
                            <li class="form_btn">
                                <input type="image" class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="はい、退会します" name="refuse_do" id="refuse_do"></li>
                        </ul></div>
                </div>
            </div>
        </div>
    </form>
</div>