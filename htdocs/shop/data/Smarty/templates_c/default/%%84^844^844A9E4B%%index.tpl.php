<?php /* Smarty version 2.6.27, created on 2025-12-09 11:34:03
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl', 78, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl', 83, false),array('modifier', 'number_format', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl', 83, false),array('modifier', 'default', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl', 83, false),array('modifier', 'nl2br', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl', 105, false),array('modifier', 'strlen', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl', 165, false),array('modifier', 'sfNoImageMainList', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl', 166, false),array('modifier', 'explode', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl', 175, false),array('modifier', 'debug_print_var', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl', 386, false),array('modifier', 'substr', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/cart/index.tpl', 465, false),)), $this); ?>
﻿<style>
#term_box {
    margin: 0 auto;
    text-align: center;
    background-color: #f5f5f5;
    padding-top: 10px;
    padding-bottom: 10px;
}
#term_box .s_box {
    margin: 0 auto;
    display: inline-block;
    margin-right: 28px;
}
#term_box .s_box .name {
    font-size: 17px;
    display: inline-block;
}
#term_box .s_box .date {
    font-size: 20px;
    display: inline-block;
    color: #000;
    font-weight: bold;
}
.btn_cart_reset {
    margin: 0 auto;
    background-color: #6a8088;
    padding: 8px;
    font-size: 18px;
    border-radius: 4px;
    border: 2px solid #ccc;
    box-shadow: 1px 1px 2px 0px #252525;
    color: #fff !important;
}
@media only screen and (max-width: 767px){
.btn_cart_reset {
    display: block;
    width: 58%;
    margin-bottom: 10px;
    padding: 5px;
    font-size: 15px;
}
}
</style>
<div id="undercolumn">
    <div id="undercolumn_cart">
    <p class="cannot"></p>
        <h2 class="title">Your Shopping Cart</h2>
        <div id="term_box" class="no_disp">
          <div class="s_box"><p class="name">Start Date:</p><p id="start_date" class="date"></p></div>
          <div class="s_box"><p class="name">End Date:</p><p id="end_date" class="date"></p></div>
          <p id="rental_term" class="no_disp"></p>
          <a href="?" onclick="eccube.fnFormModeSubmit('form1','all_delete','',''); return false" class="btn_cart_reset">Reset</a>
        </div>
        <p id="rental_err_03" class="attention no_disp" style="background-color: #ffecec; padding: 10px;">You cannot add items for delivery, rental extension and eSIM to the same cart.</p>
        <p id="rental_err_04" class="attention no_disp" style="background-color: #ffecec; padding: 10px;">配送条件とカート内商品の組み合わせが間違っています</p>
        <p id="rental_err_05" class="attention no_disp" style="background-color: #ffecec; padding: 10px;">カートに2つ以上の商品が含まれています</p>
        <?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false || count ( ((is_array($_tmp=$this->_tpl_vars['arrProductsClass'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
            <!--★ポイント案内★-->
            <?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                <div class="point_announce">
                    <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                         Mr./Ms. <span class="user_name"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 </span>: your current points is 「<span class="point"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_user_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 pt</span>」<br />
                    <?php else: ?>
                        In the case you use point system, You need to log in <br />
                    <?php endif; ?>
                    You can use 1 point for <span class="price"><?php echo ((is_array($_tmp=((is_array($_tmp=@POINT_VALUE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
yen</span><br />
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <p class="totalmoney_area">
                        <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['cartKeys'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 1): ?>
                <span class="attentionSt"><?php $_from = ((is_array($_tmp=$this->_tpl_vars['cartKeys'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cartKey'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cartKey']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key']):
        $this->_foreach['cartKey']['iteration']++;
?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProductType'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php if (! ((is_array($_tmp=($this->_foreach['cartKey']['iteration'] == $this->_foreach['cartKey']['total']))) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>、<?php endif; ?><?php endforeach; endif; unset($_from); ?>は同時購入できません。<br />
                    お手数ですが、個別に購入手続きをお願い致します。
                </span>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['tpl_error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) != 0): ?>
                <p class="attention"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['tpl_message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) != 0): ?>
                <p class="attention"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
            <?php endif; ?>
        </p>

        <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['cartItems'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
            <?php $_from = ((is_array($_tmp=$this->_tpl_vars['cartKeys'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key']):
?>
                <div class="form_area">
                    <form name="form<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="form<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" method="post" action="?">
                        <input type="hidden" name="<?php echo ((is_array($_tmp=((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                        <input type="hidden" name="mode" value="confirm" />
                        <input type="hidden" name="cart_no" value="" />
                        <input type="hidden" name="cartKey" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                        <input type="hidden" name="category_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                        <input type="hidden" name="product_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                        <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['cartKeys'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 1): ?>
                            <h3><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProductType'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h3>
                            <?php $this->assign('purchasing_goods_name', ((is_array($_tmp=$this->_tpl_vars['arrProductType'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
                        <?php else: ?>
                            <?php $this->assign('purchasing_goods_name', "カゴの中の商品"); ?>
                        <?php endif; ?>
<!--
                        <p>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['purchasing_goods_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
の合計金額は「<span class="price"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_total_inctax'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
円</span>」です。
                            <?php if (((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ((is_array($_tmp=@PRODUCT_TYPE_DOWNLOAD)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['arrInfo']['free_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                                    <?php if (! ((is_array($_tmp=$this->_tpl_vars['arrData'][$this->_tpl_vars['key']]['is_deliv_free'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                        あと「<span class="price"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_deliv_free'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
円</span>」で送料無料です！！
                                    <?php else: ?>
                                        現在、「<span class="attention">送料無料</span>」です！！
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </p>
-->
                        <table summary="商品情報" class="pc">
                            <col width="10%" />
                            <col width="15%" />
                            <col width="30%" />
                            <col width="15%" />
                            <col width="15%" />
                            <col width="15%" />
                            <tr>
                                <th class="alignC">Delete</th>
                                <th class="alignC">Image</th>
                                <th class="alignC">Items</th>
                                <th class="alignC">Rental Rate</th>
                                <th class="alignC">Quantity</th>
                                <th class="alignC">Amount</th>
                            </tr>
                            <?php $_from = ((is_array($_tmp=$this->_tpl_vars['cartItems'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                    <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)) == 228): ?>
<?php $this->assign('total_inctax', ((is_array($_tmp=$this->_tpl_vars['item']['total_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
<?php $add_charge_flg = 1; ?>
                                    <?php else: ?>
                                <tr style="<?php if (((is_array($_tmp=$this->_tpl_vars['item']['error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>background-color: <?php echo ((is_array($_tmp=((is_array($_tmp=@ERR_COLOR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
;<?php endif; ?>">
                                    <td class="alignC" style="display: none"><a href="?" onclick="eccube.fnFormModeSubmit('form<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
', 'delete', 'cart_no', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['cart_no'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
'); return false;">Delete</a><!--商品１つだけを削除-->
                                    </td>
                                    <td class="alignC"><a href="?" onclick="eccube.fnFormModeSubmit('form1','all_delete','',''); return false">Delete</a><!--カート、保存情報も削除する-->
                                    </td>
                                    <td class="alignC">
                                    <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                                        <a class="expansion" target="_blank" href="<?php echo ((is_array($_tmp=((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
">
                                    <?php endif; ?>
                                            <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="max-width: 65px;max-height: 65px;" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                                            <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                                        </a>
                                    <?php endif; ?>
                                    </td>
                                    <td class="item-name"><strong><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</strong>
                                        <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                        <?php $this->assign('kikaku1_name', ((is_array($_tmp="-")) ? $this->_run_mod_handler('explode', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : explode($_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))); ?>
                                        <?php $this->assign('kikaku1', ((is_array($_tmp="-")) ? $this->_run_mod_handler('explode', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : explode($_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))); ?>
<?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)) == 0): ?>
                                            <div><?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1_name'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<span class="kikaku1_name"><?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span></div>
<?php elseif (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)) > 0): ?>
                                            <div><?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1_name'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<span class="kikaku1_name"><?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span></div>
<?php else: ?>
                                            <div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</div>
<?php endif; ?>
                                        <?php endif; ?>
                                        <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                            <div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</div>
                                        <?php endif; ?>
<div class="item_box tr p<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 t<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 error">
    		                                <p class="rental_err_01 attention no_disp" style="background-color: #ffecec; padding: 10px;">※You cannot add multiple items that have different rental period to the same cart.
Please remove one or another from the cart.</p>
    		                                <p class="rental_err_02 attention no_disp" style="background-color: #ffecec; padding: 10px;">※You cannot add multiple items that have different rental period to the same cart.
Please remove one or another from the cart.</p>
</div>
                                    </td>
                                    <td class="alignR">
                                        <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['price_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 JPY
                                    </td>
                                    <td class="alignC"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                                        <ul id="quantity_level">
                                            <li><a href="?" onclick="eccube.fnFormModeSubmit('form<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
','up','cart_no','<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['cart_no'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
'); return false"><img src="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
img/button/btn_plus.jpg" width="16" height="16" alt="＋" /></a></li>
                                            <?php if (((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 1): ?>
                                                <li><a href="?" onclick="eccube.fnFormModeSubmit('form<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
','down','cart_no','<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['cart_no'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
'); return false"><img src="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
img/button/btn_minus.jpg" width="16" height="16" alt="-" /></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                    <td class="alignR"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['total_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 JPY</td>
                                </tr>
                                    <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                            <tr>
                                <th colspan="5" class="alignR">Subtotal</th>
<?php if($add_charge_flg == 1) { ?>
                                <td class="alignR" id="init_total"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_total_inctax'][$this->_tpl_vars['key']]-$this->_tpl_vars['total_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 JPY</td>
<?php } else { ?>
                                <td class="alignR" id="init_total"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_total_inctax'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 JPY</td>
<?php } ?>
                            </tr>
                            <tr>
                                <th colspan="5" class="alignR">Delivery Fee</th>
                                <td class="alignR" id="deliver_fee"></td>
                            </tr>
                            <tr>
                                <th colspan="5" class="alignR">Additional Delivery Fee<p class="additional_fee">For orders of 3 devices or more, an additional shipping cost of 550 yen per router applies.<br>The package includes return envelopes to return each device.</p></th>
                                <td class="alignR" id="add_charge"></td>
                            </tr>
                            <tr>
                                <th colspan="5" class="alignR">Total Amount</th>
                                <td class="alignR" id="all_total"><span class="price"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrData'][$this->_tpl_vars['key']]['total']-$this->_tpl_vars['arrData'][$this->_tpl_vars['key']]['deliv_fee'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 JPY</span></td>
                            </tr>
                            <?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['arrData'][$this->_tpl_vars['key']]['birth_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                                    <tr>
                                        <th colspan="5" class="alignR">お誕生月ポイント</th>
                                        <td class="alignR"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrData'][$this->_tpl_vars['key']]['birth_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
pt</td>
                                    </tr>
                                <?php endif; ?>
                                                            <?php endif; ?>
                        </table>



<table summary="商品情報" class="sp" style="margin-bottom:0;">
    <col width="10%" />
    <col width="15%" />
    <col width="15%" />
    <col width="15%" />
    <col width="15%" />
    <tr>
        <th class="alignC">Delete</th>
        <th class="alignC">Image</th>
        <th class="alignC" style="display:none">Items</th>
        <th class="alignC">Rental Rate</th>
        <th class="alignC">Quantity</th>
        <th class="alignC">Amount</th>
    </tr>
    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['cartItems'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)) == 228): ?>
<?php $add_charge_flg = 1; ?>
            <?php else: ?>
        <th colspan="5" class="item-name">
        <strong><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</strong>

<?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
<?php $this->assign('kikaku1_name', ((is_array($_tmp="-")) ? $this->_run_mod_handler('explode', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : explode($_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))); ?>
<?php $this->assign('kikaku1', ((is_array($_tmp="-")) ? $this->_run_mod_handler('explode', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : explode($_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))); ?>
 <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)) == 0): ?>
  <div><?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1_name'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<span class="kikaku1_name"><?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span></div>
 <?php elseif (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)) > 0): ?>
  <div><?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1_name'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<span class="kikaku1_name"><?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span></div>
 <?php else: ?>
  <div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</div>
 <?php endif; ?>
<?php endif; ?>

          <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
              <div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</div>
        <?php endif; ?>
        </th>
        <tr style="<?php if (((is_array($_tmp=$this->_tpl_vars['item']['error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>background-color: <?php echo ((is_array($_tmp=((is_array($_tmp=@ERR_COLOR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
;<?php endif; ?>">
            <td class="alignC"><a href="?" onclick="eccube.fnFormModeSubmit('form<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
', 'delete', 'cart_no', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['cart_no'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
'); return false;">Delete</a>
            </td>
            <td class="alignC">
            <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                <a class="expansion" target="_blank" href="<?php echo ((is_array($_tmp=((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
">
            <?php endif; ?>
                    <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="max-width: 65px;max-height: 65px;" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                    <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                </a>
            <?php endif; ?>
            </td>
            <td class="item-name" style="display:none"><strong><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</strong>
                <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                    <div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</div>
                <?php endif; ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                    <div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</div>
                <?php endif; ?>
            </td>
            <td class="alignR">
                <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['price_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 JPY
            </td>
            <td class="alignC"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                <ul id="quantity_level">
                    <li><a href="?" onclick="eccube.fnFormModeSubmit('form<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
','up','cart_no','<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['cart_no'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
'); return false"><img src="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
img/button/btn_plus.jpg" width="16" height="16" alt="＋" /></a></li>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 1): ?>
                        <li><a href="?" onclick="eccube.fnFormModeSubmit('form<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
','down','cart_no','<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['cart_no'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
'); return false"><img src="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
img/button/btn_minus.jpg" width="16" height="16" alt="-" /></a></li>
                    <?php endif; ?>
                </ul>
            </td>
            <td class="alignR"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['total_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 JPY</td>
        </tr>
            <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <tr>
        <th colspan="4" class="alignR">Subtotal</th>
<?php if($add_charge_flg == 1) { ?>
        <td class="alignR" id="init_total"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_total_inctax'][$this->_tpl_vars['key']]-$this->_tpl_vars['total_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 JPY</td>
<?php } else { ?>
        <td class="alignR" id="init_total"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_total_inctax'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 JPY</td>
<?php } ?>
    </tr>
    <tr>
        <th colspan="4" class="alignR">Delivery Fee</th>
        <td class="alignR" id="deliver_fee_sp"></td>
    </tr>
    <tr>
        <th colspan="4" class="alignR">Additional Delivery Fee<p class="additional_fee">You will be charged 1,100 yen additionally if you rent 5 units or more.<br>
The return envelope for each unit will be included in the package.</p></th>
        <td class="alignR" id="add_charge_sp"></td>
    </tr>

    <?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
        <?php if (((is_array($_tmp=$this->_tpl_vars['arrData'][$this->_tpl_vars['key']]['birth_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
            <tr>
                <th colspan="5" class="alignR">お誕生月ポイント</th>
                <td class="alignR"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrData'][$this->_tpl_vars['key']]['birth_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
pt</td>
            </tr>
        <?php endif; ?>
            <?php endif; ?>
</table>
   <div class="total-amount sp">
    <p class="name">Total Amount</p>
    <p class="alignR" id="all_total_sp"><span class="price"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrData'][$this->_tpl_vars['key']]['total']-$this->_tpl_vars['arrData'][$this->_tpl_vars['key']]['deliv_fee'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 JPY</span></p>
   </div>

<?php 
//echo "<pre>"; print_r($_SESSION['cart'][1]); echo "</pre>";
$quantity = 0;
foreach($_SESSION['cart'][1] as $line) {
	if($line['productsClass']['product_id']) {
		$last_product_id = $line['productsClass']['product_id'];
	}
	$add_flg = 0;
	if($line["id"] == 228) {
		$add_flg = 1;
	} else {
		$quantity += $line["quantity"];
	}
}
echo "<input type=\"hidden\" id=\"last_product_id\" value=\"".$last_product_id."\">";
echo "<input type=\"hidden\" id=\"last_quantity\" value=\"".$quantity."\">";
 ?>
<input type="hidden" id="deliv_id" name="deliv_id" value="">

<style>
.a_disabled {
  cursor: not-allowed;
  pointer-events: none;
  opacity: .65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;
}
</style>

<?php if (false): ?>
<?php $_from = ((is_array($_tmp=$this->_tpl_vars['cartItems'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
  <?php echo smarty_modifier_debug_print_var(((is_array($_tmp=$this->_tpl_vars['item']['productsClass'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<script type="text/javascript">
$(function(){
  var rental_flg = 0;
  var extension_flg = 0;
  var esim_flg = 0;
  var bsim_flg = 0;
  var flg_cnt = 0;


<?php $_from = ((is_array($_tmp=$this->_tpl_vars['cartItems'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
  <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['maker_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=@MAKER_ID_RENTAL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
  rental_flg = 1;
  <?php endif; ?>
  <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['maker_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=@MAKER_ID_EXTENSION)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
  extension_flg = 1;
  <?php endif; ?>
  <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['maker_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=@MAKER_ID_ESIM)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
  esim_flg = 1;
  <?php endif; ?>
  <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['maker_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=@MAKER_ID_BSIM)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
  bsim_flg = 1;
  <?php endif; ?>

  <?php $this->assign('pid_tmp', ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
  <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
    <?php $this->assign('pid_tmp', ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
  <?php endif; ?>


  <?php $this->assign('kikaku1', ((is_array($_tmp="-")) ? $this->_run_mod_handler('explode', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : explode($_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))); ?>
  <?php $this->assign('cannot_reserves', ($this->_tpl_vars['cannot_reserves']).",[".($this->_tpl_vars['pid_tmp']).",[],".($this->_tpl_vars['kikaku1'][0])."]"); ?>
<?php endforeach; endif; unset($_from); ?>


  var flgs = new Object();
  flgs.rental_flg = rental_flg;
  flgs.extension_flg = extension_flg;
  flgs.esim_flg = esim_flg;
  flgs.bsim_flg = bsim_flg;

  flg_cnt = rental_flg + extension_flg + esim_flg + bsim_flg;
  // if(rental_flg == 1 && extension_flg == 1) {
  if(flg_cnt > 1) {
    $('#rental_err_03').removeClass('no_disp');
    return false;
  }

	$.ajax({
		type: "post",
		url: "/api.php",
		data: {
				mode:"set_cart_info",
				rental_flg:rental_flg,
				sale_flg:bsim_flg,
				extension_flg:extension_flg
				},
		cache: false
	}).done(function(data){
		//console.log('success');
		//console.log(data);
    return false;
	}).fail(function(data){
		//console.log('fail');
	});

/*
後ほど
$('.rental_err_01').removeClass('no_disp'); //NG期間があるときのエラー
$('.rental_err_02').removeClass('no_disp');

  var cannot_reserves = [
      ['17',["2019/11/27","2019/11/29","2020/05/20"],'1']
  	];
*/
  var cannot_reserves = [
      <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cannot_reserves'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('substr', true, $_tmp, 1) : substr($_tmp, 1)); ?>

  	];

  var obj = getRentalDate();

  if(rental_flg == 1 && obj.receive_flg == 99) {
    $('#rental_err_04').removeClass('no_disp');
    return false;
  }

  if(bsim_flg == 1) {
    $('#deliv_id').val(9);
    $('#btn_cart_submit').removeClass('a_disabled');
    return false;
  }

  checkCartItems(cannot_reserves, obj, flgs);
	var fee_n = obj.receive_flg;
	var fee;
	var addcharge_flg = 0;
  var add_count = 0;
	var addcharge = 0;
	var fee = 0;
	if($('#last_quantity').val() > 2) {
		addcharge_flg = 1;
    add_count = $('#last_quantity').val() - 2;
	}
	if(fee_n == 3 || fee_n == 4 || fee_n == 5) {
    //空港内郵便局
		fee = 1650;
		if(addcharge_flg == 1) {
			addcharge = add_count * 550;
		}
    $('#deliv_id').val(3);
	} else if(fee_n == 1 || fee_n == 2) {
    //通常配送
		fee = 1100;
		if(addcharge_flg == 1) {
			addcharge = add_count * 550;
		}
    $('#deliv_id').val(1);
	} else if(fee_n == 0) {
    //ホテル、自宅、友人宅（使っていない）
		fee = 550;
    $('#deliv_id').val(4);
	} else {
    //店頭受取
    $('#deliv_id').val(5);
  }

	var alltotal_old = $('#init_total').html();
	var alltotal = parseInt(addcharge) +parseInt(fee) + parseInt(alltotal_old.split(",").join("").split("￥").join(""));
	addcharge_c = String(addcharge).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	fee_c = String(fee).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	alltotal_c = String(alltotal).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
	$('#add_charge').html(addcharge_c+" JPY");
	$('#add_charge_sp').html(addcharge_c+" JPY");
	$('#deliver_fee').html(fee_c+" JPY");
	$('#deliver_fee_sp').html(fee_c+" JPY");
	$('#all_total').find('.price').html(alltotal_c+" JPY");
	$('#all_total_sp').find('.price').html(alltotal_c+" JPY");

  if(rental_flg == 0 && extension_flg == 0) {
    $('#deliv_id').val(8);
    $('#btn_cart_submit').removeClass('a_disabled');
  }

  function checkCartItems(cannot_reserves, obj, flgs) {


    if(obj.start_date && obj.end_date && obj.rental_term) {
      $('#term_box').removeClass('no_disp');
      $('#start_date').html(obj.start_date);
      $('#end_date').html(obj.end_date);
      $('#rental_term').html(obj.rental_term);

      var start_date_str = obj.start_date;
      var end_date_str = obj.end_date;
      var start_date = new Date(start_date_str);
      var end_date = new Date(end_date_str);

      var product_id;
      var cannot_reserve;
      var rental_term;
      var class_name;
      var error_flg = 0;


      if(cannot_reserves.length == 0) {
        $('#btn_cart_submit').removeClass('a_disabled');
      } else {
        $.each(cannot_reserves, function(i, value) {
          product_id = value[0];
          cannot_reserve = value[1];
          rental_term = value[2];

          var cannot_date;
          var cannot_flg = 0;

          if(product_id != <?php echo ((is_array($_tmp=@ADD_CHARGE_CLASS_ID)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
) {
            if(cannot_reserve.length > 0) {
              class_name = '.p' + product_id + ' .rental_err_01';
              $.each(cannot_reserve, function(i, value) {
                cannot_date = new Date(value);
                if((start_date - cannot_date <= 0) && (cannot_date - end_date <= 0)) {
                  cannot_flg++;
                }
              });
              if(cannot_flg > 0) {
                error_flg = 1;
                $(class_name).removeClass('no_disp');
              } else {
                if(!$(class_name).hasClass('no_disp')) { $(class_name).addClass('no_disp'); }
              }
            }

            class_name = '.t' + rental_term + ' .rental_err_02';
            if(obj.rental_term != rental_term) {
              error_flg = 1;
              $(class_name).removeClass('no_disp');
            } else {
              if(!$(class_name).hasClass('no_disp')) { $(class_name).addClass('no_disp'); }
            }
          }

          if(error_flg == 1) {
            if(!$('#btn_cart_submit').hasClass('a_disabled')) { $('#btn_cart_submit').addClass('a_disabled'); }
          } else {
            $('#btn_cart_submit').removeClass('a_disabled');
          }
        });
      }
    }
  }

  function getRentalDate() {
    var obj = new Object();
		$.ajax({
			type: "post",
			url: "/api.php",
			data: {
					mode:"get_base_info"
					},
			cache: false,
      async: false
		}).done(function(data){
			//console.log('success');
			//console.log(data);
			var jsn = $.parseJSON(data);
      obj.start_date = jsn.start_date;
      obj.end_date = jsn.end_date;
      obj.rental_term = jsn.rental_term;
      obj.receive_flg = jsn.receive_flg;
      obj.flg17 = jsn.flg17;
		}).fail(function(data){
			//console.log('fail');
      obj.start_date = '';
      obj.end_date = '';
      obj.rental_term = '';
      obj.rental_term = '';
      obj.receive_flg = '';
      obj.flg17 = 1;
		});
    return obj;
  }


});

//update for eSIM
var esim_flg = 0;
<?php $_from = ((is_array($_tmp=$this->_tpl_vars['cartItems'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['maker_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=@MAKER_ID_ESIM)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
esim_flg = 1;
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

var quantity = checkQuantity();

function checkQuantity() {
  var quantity = 0;

  <?php $_from = ((is_array($_tmp=$this->_tpl_vars['cartItems'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    quantity = quantity + <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
;
  <?php endforeach; endif; unset($_from); ?>

	if((quantity > 1)) {
    if(esim_flg == 1) {
		  $("#rental_err_05").removeClass("no_disp");
	   }
  }
  return quantity;
}
//update for eSIM

function checkDeliver() {
	var checkterms = $('#checkterms').is(':checked');
	if((checkterms != true)) {
		$("#terms_attention").removeClass("no_disp");
    return false;
  }
//update for eSIM
	if(quantity > 1 && esim_flg == 1) {
    if(esim_flg == 1) {
		  $("#rental_err_05").removeClass("no_disp");
	   }
//update for eSIM
	} else {
		document.form1.submit();
	}
}

</script>

<a href="?" onclick="eccube.fnFormModeSubmit('form1','all_delete','',''); return false">All Delete</a>

                        <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['tpl_error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) == 0): ?>

                        <?php endif; ?>
                        <div class="btn_area" style="margin-top:10px;">
                            <ul>
                                <li class="form_btn return_btn">
                                    <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_prev_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                    <div class="btn-set btn_wh adjust_btn">
                                        <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_prev_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
">Return</a>
                                    </div>
                                    <?php endif; ?>
                                </li>
                                <li class="form_btn next_btn">
                <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['tpl_error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) == 0): ?>
<!--                                        <input type="image" class="hover_change_image" src="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
img/button/btn_buystep.jpg" alt="購入手続きへ" name="confirm" />-->
            <div class="terms_box">
            <input id="checkterms" type="checkbox"><label for="check" class="text001">I consent to the <a href="/terms.html" target="_blank">Terms and Conditions</a> and privacy policy included in the Terms and Conditions.</label>
            <p id="terms_attention" class="no_disp attention">Please consent to the Terms and Conditions.</p>
            <div id="err_box">
<?php $_from = ((is_array($_tmp=$this->_tpl_vars['cartItems'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<div class="item_box tr p<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 t<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 error">
    		                                <p class="rental_err_01 attention no_disp" style="background-color: #ffecec;font-size: 13px;padding: 10px;border-top: 3px solid #ccc;">※You cannot add multiple items that have different rental period to the same cart.
Please remove one or another from the cart.</p>
    		                                <p class="rental_err_02 attention no_disp" style="background-color: #ffecec;font-size: 13px;padding: 10px;border-top: 3px solid #ccc;">※You cannot add multiple items that have different rental period to the same cart.
Please remove one or another from the cart.</p>
</div>
<?php endforeach; endif; unset($_from); ?>
            </div>
            <div class="btn-set btn_next">
            <a id="btn_cart_submit" class="a_disabled" href="javascript:void(0)" onclick="javascript:checkDeliver();return false;">Next</a>
            </div>
            </div>


<?php $_from = ((is_array($_tmp=$this->_tpl_vars['cartItems'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
  <?php $this->assign('kikaku1', ((is_array($_tmp="-")) ? $this->_run_mod_handler('explode', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : explode($_tmp, ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))); ?>
  <?php $this->assign('cannot_reserves', ($this->_tpl_vars['cannot_reserves']).",[".($this->_tpl_vars['pid_tmp']).",[],".($this->_tpl_vars['kikaku1'][0])."]"); ?>
  <p style="display: none;"><?php echo ((is_array($_tmp=$this->_tpl_vars['kikaku1'][0])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
<?php endforeach; endif; unset($_from); ?>

<!--<script>
$("#err_box").load("/shop/cart/ .rental_err_02", function(data)  {
});
</script>-->
                <?php endif; ?>
                                </li>
                                <li class="form_btn return_btn_sp">
                                    <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_prev_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                    <div class="btn-set btn_wh adjust_btn">
                                        <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_prev_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
">Return</a>
                                    </div>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            <?php endforeach; endif; unset($_from); ?>

        <?php else: ?>
            <p class="empty"><span class="attention">※ There is no item in your shopping cart.</span></p>
        <?php endif; ?>
    </div>
</div>