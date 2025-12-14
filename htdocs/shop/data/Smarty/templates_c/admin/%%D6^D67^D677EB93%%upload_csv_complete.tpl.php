<?php /* Smarty version 2.6.27, created on 2021-09-17 11:32:25
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/plugin/ExpressLink/templates/admin/order/upload_csv_complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/plugin/ExpressLink/templates/admin/order/upload_csv_complete.tpl', 15, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/plugin/ExpressLink/templates/admin/order/upload_csv_complete.tpl', 43, false),array('modifier', 'strlen', '/data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/plugin/ExpressLink/templates/admin/order/upload_csv_complete.tpl', 52, false),)), $this); ?>
<script type="text/javascript">
<!--
    function fnSubmit() {
        if (!window.confirm('<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_order_id_cnt'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
件の発送メールを送信します。よろしいですか？')) {
            return;
        }
        var fm = document.form1.submit();
    }
//-->
</script>

<div id="products" class="contents-main">
    <div class="message">
        <span>CSV登録を実行しました。</span>
    </div>
    <?php if (((is_array($_tmp=$this->_tpl_vars['arrRowErr'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
    <table class="form">
        <tr>
            <td>
                <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrRowErr'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['err']):
?>
                <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['err'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><br/>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
    </table>
    <?php endif; ?>
    <?php if (((is_array($_tmp=$this->_tpl_vars['arrRowResult'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
    <table class="form">
        <tr>
            <td>
                <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrRowResult'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['result']):
?>
                <span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['result'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br/></span>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
    </table>
    <?php endif; ?>
    <div class="btn-area">
        <ul>
            <li><a class="btn-action" href="?"><span class="btn-prev">戻る</span></a></li>
            <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_order_id_array'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) > 0): ?>
            <li><a class="btn-action" href="javascript:;" onclick="fnSubmit();"><span class="btn-next">発送メール送信</span></a></li>
            <form name="form1" id="form1" method="post" action="mail.php">
                <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                <input type="hidden" name="mode" value="send" />
                <input type="hidden" name="order_id_array" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_order_id_array'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                <input type="hidden" name="template_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_shipping_mail_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
">
                <input type="hidden" name="subject" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShippingMailContents']['subject'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
">
                <input type="hidden" name="header" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShippingMailContents']['header'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
">
                <input type="hidden" name="footer" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShippingMailContents']['footer'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
">
            </form>
            <?php endif; ?>
        </ul>
    </div>

</div>