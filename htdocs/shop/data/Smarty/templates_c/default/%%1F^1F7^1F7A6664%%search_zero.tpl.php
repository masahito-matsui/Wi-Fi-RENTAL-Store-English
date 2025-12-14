<?php /* Smarty version 2.6.27, created on 2022-08-24 15:30:05
         compiled from frontparts/search_zero.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'frontparts/search_zero.tpl', 29, false),)), $this); ?>

<?php echo ''; ?><?php echo '<div id="undercolumn_error"><div class="message_area"><!--★エラーメッセージ--><p class="error">'; ?><?php if (((is_array($_tmp=$_GET['mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'search'): ?><?php echo '該当件数<strong>0件</strong>です。<br />他の検索キーワードより再度検索をしてください。'; ?><?php else: ?><?php echo '現在、商品はございません。'; ?><?php endif; ?><?php echo '</p></div></div>'; ?>
