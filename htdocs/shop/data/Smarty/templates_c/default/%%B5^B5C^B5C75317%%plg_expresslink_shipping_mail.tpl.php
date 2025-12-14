<?php /* Smarty version 2.6.27, created on 2025-12-10 11:40:59
         compiled from mail_templates/plg_expresslink_shipping_mail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'mail_templates/plg_expresslink_shipping_mail.tpl', 21, false),array('modifier', 'strlen', 'mail_templates/plg_expresslink_shipping_mail.tpl', 33, false),array('modifier', 'strip_tags', 'mail_templates/plg_expresslink_shipping_mail.tpl', 77, false),array('modifier', 'explode', 'mail_templates/plg_expresslink_shipping_mail.tpl', 78, false),array('modifier', 'date_format', 'mail_templates/plg_expresslink_shipping_mail.tpl', 99, false),array('modifier', 'default', 'mail_templates/plg_expresslink_shipping_mail.tpl', 99, false),)), $this); ?>

Dear Mr./Ms. <?php echo ((is_array($_tmp=$this->_tpl_vars['arrOrder']['order_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['arrOrder']['order_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
,

<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_header'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>


<?php if (false): ?>以下のご注文の発送が完了致しました。
ご到着までの間しばらくお待ちください。
配送先ごとに伝票番号を記載しておりますのでご確認ください。<?php endif; ?>

[Order Number: <?php echo ((is_array($_tmp=$this->_tpl_vars['arrOrder']['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]

<?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrShipping'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['shipping'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipping']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shipping']):
        $this->_foreach['shipping']['iteration']++;
?>

<?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shipping']['plg_expresslink_slip_number'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) > 0): ?>
--------------------------------------------------------
** Order Tracking Number: <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['plg_expresslink_slip_number'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

--------------------------------------------------------
<?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shipping']['confirm_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) > 7): ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['confirm_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php endif; ?>
<?php endif; ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 4): ?>
**Pickup store: <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrShipping'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 1): ?><?php echo ((is_array($_tmp=$this->_foreach['shipping']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php elseif (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 8): ?>
　Recipient Name: Mr./Ms. <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
　
<?php else: ?>
** Delivery Information<?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrShipping'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 1): ?><?php echo ((is_array($_tmp=$this->_foreach['shipping']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php endif; ?>

　Recipient Name: Mr./Ms. <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
　
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrOrder']['order_company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
　Terminal Number: <?php echo ((is_array($_tmp=$this->_tpl_vars['arrOrder']['order_company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php endif; ?>
<?php endif; ?>

　<?php if (false): ?>ZIPCODE ：〒<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_zipcode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php endif; ?>
Post Code: <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_zip02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

　Address: <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['shipping']['shipping_pref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

  <?php if (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?>
　>>> Pickup Location / MAP
　https://en.wifi-rental-store.jp/pickup_location.html
<?php endif; ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1): ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
　Hotel Name: <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php endif; ?>
<?php endif; ?>
　Phone: <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['shipping']['plg_expresslink_center_stop'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1): ?>
　営業所止め：<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping']['plg_expresslink_center_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php endif; ?>

<?php $_from = ((is_array($_tmp=$this->_tpl_vars['shipping']['shipment_item'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
<?php if (false): ?>Commodity Code: <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['product_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php endif; ?>
Rental Plan/Model: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['product_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

<?php $this->assign('kikaku1', ((is_array($_tmp="-")) ? $this->_run_mod_handler('explode', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : explode($_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?>
Extension rental period: <?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1'][0]+1)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 days
Are you renting an additional battery?: <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php elseif (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 8): ?>
<?php elseif (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 9): ?>
<?php else: ?>
Rental period: <?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1'][0]+1)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 days
Options: <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php endif; ?>
Quantity: <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php endforeach; endif; unset($_from); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 8): ?>
<?php else: ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 9): ?>
<?php else: ?>
Delivery Method: <?php echo ((is_array($_tmp=$this->_tpl_vars['arrDeliv'][$this->_tpl_vars['arrOrder']['deliv_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrOrder']['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 4): ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) || ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_time'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
Pickup Date: <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")))) ? $this->_run_mod_handler('default', true, $_tmp, 'Not specified') : smarty_modifier_default($_tmp, 'Not specified')); ?>

Pickup Time Slot: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_time'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 'Not specified') : smarty_modifier_default($_tmp, 'Not specified')); ?>

<?php endif; ?>
<?php else: ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) || ((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_time'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
Delivery Date: <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")))) ? $this->_run_mod_handler('default', true, $_tmp, 'Not specified') : smarty_modifier_default($_tmp, 'Not specified')); ?>

Delivery Time Slot: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shipping']['shipping_time'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 'Not specified') : smarty_modifier_default($_tmp, 'Not specified')); ?>

<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>

<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_footer'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
