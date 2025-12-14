<?php /* Smarty version 2.6.27, created on 2025-01-15 22:15:05
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/complete.tpl', 33, false),array('modifier', 'nl2br', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/complete.tpl', 63, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/complete.tpl', 71, false),array('modifier', 'escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/complete.tpl', 85, false),)), $this); ?>
<style>
#header_login_area{
display: none;
}
</style>

<span id="a8sales"></span>
<script src="//statics.a8.net/a8sales/a8sales.js"></script>
<script>
a8sales({
"pid": "s00000019043001",
"order_number": "<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOrder']['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
",
"currency": "JPY",
"items": [
{
"code": "{$arrOrderDetail[cnt].product_code}",
"price": {$arrOrderDetail[cnt].price|sfCalcIncTax:$arrOrderDetail[cnt].tax_rate:$arrOrderDetail[cnt].tax_rule|number_format},
"quantity": {$arrOrderDetail[cnt].quantity}
},
],
"total_price": {$arrOrder.payment_total|number_format|default:0}
});
</script>

<div id="undercolumn">
    <div id="undercolumn_shopping">
        <p class="flow_area">
            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/picture/img_flow_05.jpg" alt="購入手続きの流れ" />
        </p>
        <h2 class="title">Order Complete</h2>

            <p>Order Number: <?php echo ((is_array($_tmp=$_SESSION['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

            </p>

        <!-- ▼その他決済情報を表示する場合は表示 -->
        <?php if (((is_array($_tmp=$this->_tpl_vars['arrOther']['title']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <p><?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrOther'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != 'title'): ?>
                        <?php if (((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                            Approval Number: 
                        <?php endif; ?>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br />
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </p>
        <?php endif; ?>
        <!-- ▲コンビに決済の場合には表示 -->

        <div id="complete_area">
            <!--<p class="message"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
の商品をご購入いただき、ありがとうございました。</p>
            <p>ただいま、ご注文の確認メールをお送りさせていただきました。<br />
                万一、ご確認メールが届かない場合は、トラブルの可能性もありますので大変お手数ではございますがもう一度お問い合わせいただくか、お電話にてお問い合わせくださいませ。<br />
                今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>-->
　　　　<p>We have just sent you an order confirmation email to you.<br>
Please review the order details, and inform us of any inaccuracies as soon as possible.<br>
<br>
If you don't receive our email, please kindly contact us with your order number.<br>
<br>
Thank you!</p>

            <div class="shop_information">
                <p class="name"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                <p>TEL：<?php echo ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrInfo']['tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 <!--<?php if (((is_array($_tmp=$this->_tpl_vars['arrInfo']['business_hour'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>（受付時間/<?php echo ((is_array($_tmp=$this->_tpl_vars['arrInfo']['business_hour'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
）--><?php endif; ?><br />
                E-mail：<a href="mailto:<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'hexentity') : smarty_modifier_escape($_tmp, 'hexentity')); ?>
</a>
                </p>
            </div>
        </div>

        <div class="btn_area">
            <ul>
                <li class="form_btn">
                    <a href="/">
                        <img class="btn_hover" src="/shop/img/btn/top.png" width="100%" alt="トップページへ" />
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>