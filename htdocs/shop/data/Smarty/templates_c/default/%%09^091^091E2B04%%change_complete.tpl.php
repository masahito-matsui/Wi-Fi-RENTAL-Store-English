<?php /* Smarty version 2.6.27, created on 2021-09-18 11:30:33
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/mypage/change_complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/mypage/change_complete.tpl', 4, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/mypage/change_complete.tpl', 4, false),)), $this); ?>


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
    <div id="mycontents_area">
        <h3><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h3>

        <div id="complete_area">
            <div class="message">
                Account update was completed successfully.
            </div>
            <!--<p>今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>-->
        </div>
    </div>
</div>