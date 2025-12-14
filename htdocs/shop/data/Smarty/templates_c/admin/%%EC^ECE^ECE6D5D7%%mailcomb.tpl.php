<?php /* Smarty version 2.6.27, created on 2022-04-10 11:20:04
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/plugin/OrderSort/templates/admin/basis/mailcomb.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/plugin/OrderSort/templates/admin/basis/mailcomb.tpl', 21, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/plugin/OrderSort/templates/admin/basis/mailcomb.tpl', 21, false),array('modifier', 'count', '/data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/plugin/OrderSort/templates/admin/basis/mailcomb.tpl', 41, false),array('modifier', 'default', '/data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/plugin/OrderSort/templates/admin/basis/mailcomb.tpl', 41, false),array('function', 'html_options', '/data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/plugin/OrderSort/templates/admin/basis/mailcomb.tpl', 48, false),)), $this); ?>
 
<form name="form1" id="form1" method="post" action="<?php echo ((is_array($_tmp=((is_array($_tmp=$_SERVER['REQUEST_URI'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
">
<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
<input type="hidden" name="mode" value="edit">

<h3>メール-対応状況連動設定</h3>
<p>受注管理のメール送信時に対応状況を連動して変更します。<br>連動したいメールに対して変更後の対応状況を選択してください。</p>
<table border="0" cellspacing="1" cellpadding="8" summary=" ">
        <col width="33%" />
        <col width="33%" />
        <col width="34%" />
    <tr >
        <td bgcolor="#777777" style="color:#FFFFFF;">メール</td>
        <td bgcolor="#777777" style="color:#FFFFFF;">支払方法</td>
        <td bgcolor="#777777" style="color:#FFFFFF;">対応状況</td>
    </tr>
	<?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrMAILTEMPLATE'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['mail']):
?>
        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrPayment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['payment']):
        $this->_foreach['loop1']['iteration']++;
?>
    <?php $this->assign('keyname', "mail".($this->_tpl_vars['key'])."_".($this->_tpl_vars['payment']['payment_id'])); ?>
    <tr>
    	<?php if (((is_array($_tmp=($this->_foreach['loop1']['iteration']-1))) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 0): ?>
        <td bgcolor="#f3f3f3" rowspan="<?php echo ((is_array($_tmp=count(((is_array($_tmp=$this->_tpl_vars['arrPayment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mail'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
        <?php endif; ?>
        <td bgcolor="#f3f3f3">
 <?php echo ((is_array($_tmp=$this->_tpl_vars['payment']['payment_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

        </td>
        <td><select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['keyname'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
        <option value="">設定なし</option>
        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrORDERSTATUS'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['keyname']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

        </select>
        </td>    
    </tr>
    	<?php endforeach; endif; unset($_from); ?>
    <?php endforeach; endif; unset($_from); ?>
</table>

<div class="btn-area">
    <ul>
        <li>
            <a class="btn-action" href="javascript:;" onclick="document.form1.submit();return false;"><span class="btn-next">この内容で登録する</span></a>
        </li>
    </ul>
</div>

</form>