<?php /* Smarty version 2.6.27, created on 2023-03-14 03:15:17
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/module/mdl_pg_mulpay/templates/mail_template/recv_no_order.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/module/mdl_pg_mulpay/templates/mail_template/recv_no_order.tpl', 9, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/downloads/module/mdl_pg_mulpay/templates/mail_template/recv_no_order.tpl', 9, false),)), $this); ?>

受注情報に存在しないオーダーIDの決済結果を受信しました。

受注ID: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrParam']['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

決済オーダーID： <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrParam']['OrderID'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

利用金額: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrParam']['Amount'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
円
決済方法: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrParam']['pay_type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

受付日時: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrParam']['ReceiptDate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

処理日時: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrParam']['TranDate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>


大変お手数ですが、ご確認お願い致します。

GMO-PGから結果通知プログラムURLに結果を返却した際、EC-CUBE側
（dtb_order）に該当データが存在しないため「不一致」となり、
本メールが送信されています。

まずは、EC-CUBE管理画面とPGマルチペイメントサービスのショップ
管理画面とで決済データをご確認いただき、決済結果に相違がないこと
をご確認ください。
