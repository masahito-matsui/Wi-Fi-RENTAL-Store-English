<?php /* Smarty version 2.6.27, created on 2021-09-17 22:45:25
         compiled from mail_templates/customer_regist_mail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'mail_templates/customer_regist_mail.tpl', 24, false),)), $this); ?>
 
 
Dear Mr./Ms. <?php echo ((is_array($_tmp=$this->_tpl_vars['name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
,

<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_header'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

Thank you for visiting the Wi-Fi RENTAL Store.

This is to inform you that your membership registration is complete.
Your [Email address] and [password] are required when you log in.
As a member, you can now collect 5% of rental fees as points. 1 point can be used as 1 JPY from your next order.  (You can use it to order an extension too!)
You can change your details on [My Page].

If you have any questions, please contact us by phone or e-mail.

<?php if (false): ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['CONF']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
でございます。

この度は会員登録依頼をいただきましてまことに有り難うございます。

本会員登録が完了いたしました。
ショッピングをお楽しみくださいませ。

今後ともどうぞ<?php echo ((is_array($_tmp=$this->_tpl_vars['CONF']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
をよろしくお願い申し上げます。
<?php endif; ?>

********************************************************
[ Wi-Fi RENTALstore ]

J FIELD.Co.,Ltd

ADDRESS: KS building2F 1-5 kandasuda-cho chiyoda-ku TOKYO
E-MAIL : en.info@wifi-rental-store.jp
TEL    : +81-3-3525-8359
URL    : http://en.wifi-rental-store.jp/
********************************************************
<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_footer'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>



