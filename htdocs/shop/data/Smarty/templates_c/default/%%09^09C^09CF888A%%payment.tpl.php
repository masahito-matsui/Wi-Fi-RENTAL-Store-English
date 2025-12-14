<?php /* Smarty version 2.6.27, created on 2025-12-09 11:34:55
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/payment.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/payment.tpl', 21, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/payment.tpl', 188, false),array('modifier', 'sfGetErrorColor', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/payment.tpl', 195, false),array('modifier', 'sfGetChecked', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/payment.tpl', 195, false),array('modifier', 'nl2br', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/payment.tpl', 197, false),array('modifier', 'default', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/payment.tpl', 250, false),array('modifier', 'number_format', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/payment.tpl', 382, false),array('function', 'html_options', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/shopping/payment.tpl', 250, false),)), $this); ?>

<style>
#header_login_area{
display: none;
}
</style><script type="text/javascript">//<![CDATA[
    $(function() {
        if ($('input[name=deliv_id]:checked').val()
            || $('#deliv_id').val()) {
            showForm(true);
            showPaymentRadioHTML();
        } else {
            showForm(false);
        }
//        $('input[id^=deliv_]').click(function() {
        $(document).ready(function(){
            showForm(true);
            var data = {};
            data.mode = 'select_deliv';
            data.deliv_id = $('input[name=deliv_id]:checked').val();
            data['<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
';
            $.ajax({
                type : 'POST',
                url : location.pathname,
                data: data,
                cache : false,
                dataType : 'json',
                error : remoteException,
                success : function(data, dataType) {
                    if (data.error) {
                        remoteException();
                    } else {
                        // 支払い方法の行を生成
                        var payment_tbody = $('#payment tbody');
                        payment_tbody.empty();
                        for (var i in data.arrPayment) {
                            // ラジオボタン
                            
                            var radio = $('<input type="radio" name="payment_id" id="pay_' + i + '" />')
                                .val(data.arrPayment[i].payment_id);
                            // ラベル
                            var label = $('<label />')
                                .attr('for', 'pay_' + i)
                                .text(data.arrPayment[i].payment_method);
                            // 行
                            var tr = $('<tr />')
                                .append($('<td />')
                                    .addClass('alignC')
                                    .append(radio))
                                .append($('<td />').append(label));

                            // 支払方法の画像が登録されている場合は表示
                            if (data.img_show) {
                                var payment_image = data.arrPayment[i].payment_image;
                                $('th#payment_method').attr('colspan', 3);
                                if (payment_image) {
                                    var img = $('<img />').attr('src', '<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
' + payment_image);
                                    tr.append($('<td />').append(img));
                                } else {
                                    tr.append($('<td />'));
                                }
                            } else {
                                $('th#payment_method').attr('colspan', 2);
                            }

                            tr.appendTo(payment_tbody);
                        }
                        // クレジットカードのチェック
                        $("input[name='payment_id']").val(['7']);

/*
                         // お届け時間を生成
                        var deliv_time_id_select = $('select[id^=deliv_time_id]');
                        deliv_time_id_select.empty();
                        deliv_time_id_select.append($('<option />').text('Not specified').val(''));
                        for (var i in data.arrDelivTime) {
                            var option = $('<option />')
                                .val(i)
                                .text(data.arrDelivTime[i])
                                .appendTo(deliv_time_id_select);
                        }
*/
                    }
                }
            });
        });

        function showPaymentRadioHTML() {
            showForm(true);
            var data = {};
            data.mode = 'select_deliv';
            data.deliv_id = $('input[name=deliv_id]:checked').val();
            data['<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
';
            $.ajax({
                type : 'POST',
                url : location.pathname,
                data: data,
                cache : false,
                dataType : 'json',
                error : remoteException,
                success : function(data, dataType) {
                    if (data.error) {
                        remoteException();
                    } else {
                        // 支払い方法の行を生成
                        var payment_tbody = $('#payment tbody');
                        payment_tbody.empty();
                        for (var i in data.arrPayment) {
                            // ラジオボタン
                            
                            var radio = $('<input type="radio" name="payment_id" id="pay_' + i + '" />')
                                .val(data.arrPayment[i].payment_id);
                            // ラベル
                            var label = $('<label />')
                                .attr('for', 'pay_' + i)
                                .text(data.arrPayment[i].payment_method);
                            // 行
                            var tr = $('<tr />')
                                .append($('<td />')
                                    .addClass('alignC')
                                    .append(radio))
                                .append($('<td />').append(label));

                            // 支払方法の画像が登録されている場合は表示
                            if (data.img_show) {
                                var payment_image = data.arrPayment[i].payment_image;
                                $('th#payment_method').attr('colspan', 3);
                                if (payment_image) {
                                    var img = $('<img />').attr('src', '<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
' + payment_image);
                                    tr.append($('<td />').append(img));
                                } else {
                                    tr.append($('<td />'));
                                }
                            } else {
                                $('th#payment_method').attr('colspan', 2);
                            }

                            tr.appendTo(payment_tbody);
                        }
                        // クレジットカードのチェック
                        $("input[name='payment_id']").val(['7']);

/*
                         // お届け時間を生成
                        var deliv_time_id_select = $('select[id^=deliv_time_id]');
                        deliv_time_id_select.empty();
                        deliv_time_id_select.append($('<option />').text('Not specified').val(''));
                        for (var i in data.arrDelivTime) {
                            var option = $('<option />')
                                .val(i)
                                .text(data.arrDelivTime[i])
                                .appendTo(deliv_time_id_select);
                        }
*/
                    }
                }
            });
        }

        /**
         * 通信エラー表示.
         */
        function remoteException(XMLHttpRequest, textStatus, errorThrown) {
            alert('通信中にエラーが発生しました。カート画面に移動します。');
//            location.href = '<?php echo ((is_array($_tmp=@CART_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
';
        }

        /**
         * 配送方法の選択状態により表示を切り替える
         */
        function showForm(show) {
            if (show) {
                $('#payment, div.delivdate, .select-msg').show();
                $('.non-select-msg').hide();
            } else {
                $('#payment, div.delivdate, .select-msg').hide();
                $('.non-select-msg').show();
            }
        }
    });
//]]></script><div id="undercolumn">
    <div id="undercolumn_shopping">
        <p class="flow_area">
            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/picture/img_flow_02.jpg" alt="購入手続きの流れ"></p>
        <h2 class="title">Order information</h2>

        <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><input type="hidden" name="mode" value="confirm"><input type="hidden" name="uniqid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_uniqid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><?php $this->assign('key', 'deliv_id'); ?><?php if (((is_array($_tmp=$this->_tpl_vars['is_single_deliv'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="deliv_id"><?php else: ?><div class="pay_area">
                <h3>Pickup Method</h3>
                

                <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                <p class="attention" style="background-color:#FFBCBD"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
                <?php endif; ?>
                <table summary="配送方法選択"><col width="20%"><col width="80%"><tr></tr><?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrDeliv'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
$this->_sections['cnt']['start'] = $this->_sections['cnt']['step'] > 0 ? 0 : $this->_sections['cnt']['loop']-1;
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = $this->_sections['cnt']['loop'];
    if ($this->_sections['cnt']['total'] == 0)
        $this->_sections['cnt']['show'] = false;
} else
    $this->_sections['cnt']['total'] = 0;
if ($this->_sections['cnt']['show']):

            for ($this->_sections['cnt']['index'] = $this->_sections['cnt']['start'], $this->_sections['cnt']['iteration'] = 1;
                 $this->_sections['cnt']['iteration'] <= $this->_sections['cnt']['total'];
                 $this->_sections['cnt']['index'] += $this->_sections['cnt']['step'], $this->_sections['cnt']['iteration']++):
$this->_sections['cnt']['rownum'] = $this->_sections['cnt']['iteration'];
$this->_sections['cnt']['index_prev'] = $this->_sections['cnt']['index'] - $this->_sections['cnt']['step'];
$this->_sections['cnt']['index_next'] = $this->_sections['cnt']['index'] + $this->_sections['cnt']['step'];
$this->_sections['cnt']['first']      = ($this->_sections['cnt']['iteration'] == 1);
$this->_sections['cnt']['last']       = ($this->_sections['cnt']['iteration'] == $this->_sections['cnt']['total']);
?><?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['arrDeliv'][$this->_sections['cnt']['index']]['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><tr><td class="alignC"><input type="radio" id="deliv_<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrDeliv'][$this->_sections['cnt']['index']]['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrDeliv'][$this->_sections['cnt']['index']]['deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetChecked', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Utils_Ex::sfGetChecked($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))); ?>
 checked></td>
                        <td>
                            <label for="deliv_<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrDeliv'][$this->_sections['cnt']['index']]['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrDeliv'][$this->_sections['cnt']['index']]['remark'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?><p><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrDeliv'][$this->_sections['cnt']['index']]['remark'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p><?php endif; ?></label>
                        </td>
                    </tr><?php endif; ?><?php endfor; endif; ?></table></div>
            <?php endif; ?>

            <div class="pay_area">
                <h3>Payment Method</h3>
                <p class="select-msg">We accept credit cards only.</p>
                <p class="non-select-msg">まずはじめに、配送方法を選択ください。</p>

                <?php $this->assign('key', 'payment_id'); ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                <p class="attention" style="background-color:#FFBCBD"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
                <?php endif; ?>
                <table summary="お支払方法選択" id="payment"><col width="20%"><col width="80%"><thead><tr><!--<th class="alignC">選択</th>--><!--<th class="alignC" colspan="<?php if (! ((is_array($_tmp=$this->_tpl_vars['img_show'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>2<?php else: ?>3<?php endif; ?>" id="payment_method">お支払方法</th>--></tr></thead><tbody><?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrPayment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
$this->_sections['cnt']['start'] = $this->_sections['cnt']['step'] > 0 ? 0 : $this->_sections['cnt']['loop']-1;
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = $this->_sections['cnt']['loop'];
    if ($this->_sections['cnt']['total'] == 0)
        $this->_sections['cnt']['show'] = false;
} else
    $this->_sections['cnt']['total'] = 0;
if ($this->_sections['cnt']['show']):

            for ($this->_sections['cnt']['index'] = $this->_sections['cnt']['start'], $this->_sections['cnt']['iteration'] = 1;
                 $this->_sections['cnt']['iteration'] <= $this->_sections['cnt']['total'];
                 $this->_sections['cnt']['index'] += $this->_sections['cnt']['step'], $this->_sections['cnt']['iteration']++):
$this->_sections['cnt']['rownum'] = $this->_sections['cnt']['iteration'];
$this->_sections['cnt']['index_prev'] = $this->_sections['cnt']['index'] - $this->_sections['cnt']['step'];
$this->_sections['cnt']['index_next'] = $this->_sections['cnt']['index'] + $this->_sections['cnt']['step'];
$this->_sections['cnt']['first']      = ($this->_sections['cnt']['iteration'] == 1);
$this->_sections['cnt']['last']       = ($this->_sections['cnt']['iteration'] == $this->_sections['cnt']['total']);
?><tr><td class="alignC"><input type="radio" id="pay_<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrPayment'][$this->_sections['cnt']['index']]['payment_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPayment'][$this->_sections['cnt']['index']]['payment_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetChecked', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Utils_Ex::sfGetChecked($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))); ?>
></td>
                            <td>
                                <label for="pay_<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPayment'][$this->_sections['cnt']['index']]['payment_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrPayment'][$this->_sections['cnt']['index']]['note'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?><?php endif; ?></label>
                            </td>
                            <?php if (((is_array($_tmp=$this->_tpl_vars['img_show'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <td>
                                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrPayment'][$this->_sections['cnt']['index']]['payment_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                        <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrPayment'][$this->_sections['cnt']['index']]['payment_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><?php endif; ?></td>
                            <?php endif; ?>
                            </tr><?php endfor; endif; ?></tbody></table></div>
<?php if (((is_array($_tmp=@plg_ExpressLink_Center_Stop)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1): ?>
<div class="pay_area02">
    <h3>営業店・郵便局留めをご希望の場合</h3>
    <p style="line-height:1.8em;">お近くの宅急便センター・郵便局で商品をお受け取りご希望のお客様は下記で「留め置きする」をお選び頂き、センターコード・郵便局名をご入力ください。<br>
        ※ご自宅、お勤め先への配送をご希望の方は選択の必要はありません。</p>
    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrShipping'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['shippingItem'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shippingItem']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shippingItem']):
        $this->_foreach['shippingItem']['iteration']++;
?>
    <?php $this->assign('index', ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
    <div class="delivdate top">
        <?php if (((is_array($_tmp=$this->_tpl_vars['is_multiple'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
        <span class="st">▼<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

            <?php echo ((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['shippingItem']['shipping_pref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><br/>
        <?php endif; ?>
        <br>
        <?php $this->assign('key', "plg_expresslink_center_stop".($this->_tpl_vars['index'])); ?>
        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
        営業店・郵便局止留め：
        <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
            <?php $this->assign('shipping_center_stop', ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
            <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrStop'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shipping_center_stop'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['shippingItem']['plg_expresslink_center_stop'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : smarty_modifier_default($_tmp, ((is_array($_tmp=$this->_tpl_vars['shippingItem']['plg_expresslink_center_stop'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))), $this);?>

        </select><br>
        <?php $this->assign('key', "plg_expresslink_center_code".($this->_tpl_vars['index'])); ?>
        営業店・郵便局留めする場合→　　<?php if (((is_array($_tmp=@plg_ExpressLink_Use_B2)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 && strlen ( ((is_array($_tmp=$this->_tpl_vars['yamato_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['yamato_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" target="_blank"><font color="#3366FF">クロネコヤマト宅急便の営業店を探す</font></a>&nbsp;&nbsp;&nbsp;<?php endif; ?><?php if (( ((is_array($_tmp=@plg_ExpressLink_Use_Ehiden2)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 || ((is_array($_tmp=@plg_ExpressLink_Use_EhidenPro)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 ) && strlen ( ((is_array($_tmp=$this->_tpl_vars['sagawa_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['sagawa_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" target="_blank"><font color="#3366FF">佐川急便の営業店を探す</font></a>&nbsp;&nbsp;&nbsp;<?php endif; ?><?php if (((is_array($_tmp=@plg_ExpressLink_Use_KangarooMagic2)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 && strlen ( ((is_array($_tmp=$this->_tpl_vars['seino_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['seino_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" target="_blank"><font color="#3366FF">西濃運輸の営業所を探す</font></a>&nbsp;&nbsp;&nbsp;<?php endif; ?>
        <?php if (( ((is_array($_tmp=@plg_ExpressLink_Use_YuPack4)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 || ((is_array($_tmp=@plg_ExpressLink_Use_YuPackR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 ) && strlen ( ((is_array($_tmp=$this->_tpl_vars['jpost_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['jpost_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" target="_blank"><font color="#3366FF">郵便局名を探す</font></a><?php endif; ?><br>
        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
        営業店コード・郵便局名を入力　<input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="box160" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['shippingItem']['plg_expresslink_center_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : smarty_modifier_default($_tmp, ((is_array($_tmp=$this->_tpl_vars['shippingItem']['plg_expresslink_center_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
"><?php if (((is_array($_tmp=@plg_ExpressLink_Use_YuPack4)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 || ((is_array($_tmp=@plg_ExpressLink_Use_YuPackR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1): ?><br>
        <?php $this->assign('key', "plg_expresslink_center_zip".($this->_tpl_vars['index'])); ?>
        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
        局留め郵便番号　<input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="box160" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['shippingItem']['plg_expresslink_center_zip'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : smarty_modifier_default($_tmp, ((is_array($_tmp=$this->_tpl_vars['shippingItem']['plg_expresslink_center_zip'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
"><br>
        <span class="attention">郵便局留めをご希望の場合は郵便局の郵便番号を入力してください。-(ハイフン)なしでお願い致します。</span><?php endif; ?>
    </div>
    <?php endforeach; endif; unset($_from); ?>		
</div>
<?php endif; ?>

            <?php if (((is_array($_tmp=$this->_tpl_vars['cartKey'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ((is_array($_tmp=@PRODUCT_TYPE_DOWNLOAD)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <div class="pay_area02">
                <input type="hidden" id="start_date" name="start_date" value=""><input type="hidden" id="end_date" name="end_date" value=""><input type="hidden" id="rental_term" name="rental_term" value=""><input type="hidden" id="fast_date" name="fast_date" value=""><input type="hidden" id="rental_flg" name="rental_flg" value=""><input type="hidden" id="receive_flg" name="receive_flg" value=""><input type="hidden" id="receive_flg_tmp" name="receive_flg_tmp" value=""><input type="hidden" id="sale_flg" name="sale_flg" value=""><input type="hidden" id="fast_sale_date" name="fast_sale_date" value=""><?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 8): ?><input type="hidden" id="deliv_date0" class="deliv_date0 enter_form" name="deliv_date0"><?php else: ?><?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 4): ?><h3>Pickup Date</h3>
        <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?>
                <h3>Pickup Date</h3>
        <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?>
                <h3>Start date for extension</h3>
        <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 8): ?>
        <?php else: ?>
                <h3>Delivery Date / Time</h3>
        <?php endif; ?>
        <!--
         <?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 4): ?> 
                <p class="select-msg">Please select Pickup date / time slot</p>
         <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?> 
                <p class="select-msg">Please select your start date for extension</p>
         <?php else: ?> 
                <p class="select-msg">Please select delivery date / time slot</p>
         <?php endif; ?> 
        -->
<p id="rental_err_01" class="error no_disp" style="background-color: #ffdede;">※Please select Pickup date / time slot</p>
<p id="rental_err_02" class="error no_disp" style="background-color: #ffdede;">※Please select Pickup date / time slot</p>

                <p class="non-select-msg">まずはじめに、配送方法を選択ください。</p>
                <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrShipping'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['shippingItem'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shippingItem']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shippingItem']):
        $this->_foreach['shippingItem']['iteration']++;
?>
                <?php $this->assign('index', ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
                <div class="delivdate top">
                    <?php if (((is_array($_tmp=$this->_tpl_vars['is_multiple'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <span class="st">▼<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

                        <?php echo ((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['shippingItem']['shipping_pref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><br><?php endif; ?><div class="s_box">
                    <!--★お届け日★-->
                    <?php $this->assign('key', "deliv_date".($this->_tpl_vars['index'])); ?>
                    <span class="attention" style="background-color:#FFBCBD"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
        <?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 4): ?>
                    <p class="select_name">Pickup Date：</p>
        <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?>
                    <p class="select_name">Pickup Date：</p>
        <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?>
                    <p class="select_name">Start date for extension：</p>
        <?php else: ?>
                    <p class="select_name">Delivery Date：</p>
        <?php endif; ?>

        <?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?>
        <input type="text" id="deliv_date0" class="deliv_date0 enter_form" name="deliv_date0" readonly><?php else: ?><input type="text" id="deliv_date1" class="deliv_date1 enter_form" name="deliv_date1" readonly><?php endif; ?><?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 4): ?><!--<p class="attention">Pickup date is the rental start date.</p>--><?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?><!--<p class="attention">Pickup date is the rental start date.</p>--><?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?><p class="attention">The extension period will start from one day after the end date of the original rental period.<br><br>
                              *If your extension start date is not on the list, please select the earliest date.</p>
         <?php else: ?>
         <!--<p class="attention">The delivery date is the rental start date.</p>-->
         <?php endif; ?>
        </div>
        <div class="s_box">
                    <!--★お届け時間★-->
                    <?php $this->assign('key', "deliv_time_id".($this->_tpl_vars['index'])); ?>
                    <span class="attention" style="background-color:#FFBCBD"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
        <?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 4): ?>
                    <p class="select_name">Pickup Time：</p>
        <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?>
                    <p class="select_name">Pickup Time：</p>
        <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?>
        <!--表示なし-->
        <?php else: ?>
                    <p class="select_name">Delivery Time：</p>
        <?php endif; ?>
                    <?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?>
                    <!--表示なし-->
                    <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 4): ?>
                    <div id="deliv_time_ids" class="no_disp">
                <label><input type="radio" id="deliv_time_id_1" class="deliv_time_id" name="deliv_time_id1" value="1">10AM - 11AM</label>
          						<label><input type="radio" id="deliv_time_id_2" class="deliv_time_id" name="deliv_time_id1" value="2">11AM - 12PM</label>
          						<label><input type="radio" id="deliv_time_id_3" class="deliv_time_id" name="deliv_time_id1" value="3">12PM - 1PM</label>
          						<label><input type="radio" id="deliv_time_id_4" class="deliv_time_id" name="deliv_time_id1" value="4">1PM - 2PM</label>
          						<label><input type="radio" id="deliv_time_id_5" class="deliv_time_id" name="deliv_time_id1" value="5">2PM - 3PM</label>
          						<label><input type="radio" id="deliv_time_id_6" class="deliv_time_id" name="deliv_time_id1" value="6">3PM - 4PM</label>
          						<label><input type="radio" id="deliv_time_id_7" class="deliv_time_id" name="deliv_time_id1" value="7">4PM - 5PM</label>
          						<label><input type="radio" id="deliv_time_id_8" class="deliv_time_id" name="deliv_time_id1" value="8">5PM - 6PM</label>
          						<label><input type="radio" id="deliv_time_id_9" class="deliv_time_id" name="deliv_time_id1" value="9">6PM - 7PM</label>
                    </div>
                    <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?>
                    <div id="deliv_time_ids" class="no_disp">
          						<label id="deliv_time_id_1_14"><input type="radio" id="deliv_time_id_1" class="deliv_time_id" name="deliv_time_id1" value="1">Morning [Before Noon]</label>
          						<label><input type="radio" id="deliv_time_id_2" class="deliv_time_id" name="deliv_time_id1" value="2">12PM - 2PM</label>
          						<label><input type="radio" id="deliv_time_id_3" class="deliv_time_id" name="deliv_time_id1" value="3">2PM - 4PM</label>
          						<label><input type="radio" id="deliv_time_id_4" class="deliv_time_id" name="deliv_time_id1" value="4">4PM - 6PM</label>
          						<label><input type="radio" id="deliv_time_id_5" class="deliv_time_id" name="deliv_time_id1" value="5">6PM - 8PM</label>
          						<label><input type="radio" id="deliv_time_id_6" class="deliv_time_id" name="deliv_time_id1" value="6">8PM - 9PM</label>
                    </div>
                    <?php else: ?>
                    <div id="deliv_time_ids" class="no_disp">
          						<label id="deliv_time_id_1_14"><input type="radio" id="deliv_time_id_1" class="deliv_time_id" name="deliv_time_id1" value="1">Morning [Before Noon]</label>
          						<label><input type="radio" id="deliv_time_id_2" class="deliv_time_id" name="deliv_time_id1" value="2">2PM - 4PM</label>
          						<label><input type="radio" id="deliv_time_id_3" class="deliv_time_id" name="deliv_time_id1" value="3">4PM - 6PM</label>
          						<label><input type="radio" id="deliv_time_id_4" class="deliv_time_id" name="deliv_time_id1" value="4">6PM - 8PM</label>
          						<label><input type="radio" id="deliv_time_id_5" class="deliv_time_id" name="deliv_time_id1" value="5">7PM - 9PM</label>
                    </div>
                    <?php endif; ?>
       </div>
                </div>
                <?php endforeach; endif; unset($_from); ?>
                <?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 4): ?>

                <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 5): ?>

                <?php elseif (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?>
                <p style="font-size:1.4rem; color:#666; line-height:20px;margin: 0 auto;width: 92%;margin-top: 13px;">* As your package is delivered a day earlier than your pickup date,<br>you can pick up your package in the morning on your pickup date.</p>
                <?php else: ?>
                <p class="attention"></p>
        <?php endif; ?>
<?php endif; ?>

            </div>
            <?php endif; ?>

            <!-- ▼ポイント使用 -->
            <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 && ((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                <div class="point_area">
                    <h3>Point</h3>
                        <p><span class="attention">1 point can be used as <?php echo ((is_array($_tmp=((is_array($_tmp=@POINT_VALUE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 JPY</span> from your next order.</p>
                        <div class="point_announce">
                            <p><span class="user_name">Mr./Ms. <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span>, you have <span class="point"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_user_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 points</span>.<br><?php if (false): ?>今回ご購入合計金額：<span class="price"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPrices']['subtotal'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円</span> <span class="attention">(送料、手数料を含みません。)</span><?php endif; ?>
                            </p>
                            <ul><li>
                                <input type="radio" id="point_on" name="point_check" value="1" <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['point_check']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetChecked', true, $_tmp, 1) : SC_Utils_Ex::sfGetChecked($_tmp, 1)); ?>
 onclick="eccube.togglePointForm();"><label for="point_on">Use points</label>
                                <?php $this->assign('key', 'use_point'); ?><br><input type="text" class="use-point_box" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['tpl_user_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : smarty_modifier_default($_tmp, ((is_array($_tmp=$this->_tpl_vars['tpl_user_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
"> Points<span class="attention" style="background-color:#FFBCBD"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                                </li>
                                <li><input type="radio" id="point_off" name="point_check" value="2" <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['point_check']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetChecked', true, $_tmp, 2) : SC_Utils_Ex::sfGetChecked($_tmp, 2)); ?>
 onclick="eccube.togglePointForm();"><label for="point_off">Do not apply points</label></li>
                            </ul></div>
                </div>
            <?php endif; ?>
            <!-- ▲ポイント使用 -->
            <div class="pay_area02">
            <?php if (((is_array($_tmp=$_SESSION['pre_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 3): ?>
    <style>
	.airport_attention {
    color: #f50000;
    background-color: #ffdcef;
    font-size: 13px;
    line-height: 22px;
    padding: 6px;
}
	</style><h3>Remarks
                </h3><p style="margin-bottom: 10px; color:#f00">* Please enter your flight number and estimated arrival time in the remarks field. (i.g., JL847 Jan. 10th 4PM)</p>
                <!--<p>If you have any further inquiry, please key in here.</p>-->
                <?php else: ?>
                <h3>Remarks</h3>
                <!--<p>If you have any further inquiry, please key in here.</p>-->
                <?php endif; ?>
                <div>
                    <!--★その他お問い合わせ事項★-->
                    <?php $this->assign('key', 'message'); ?>
                    <span class="attention" style="background-color:#FFBCBD"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <textarea name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" cols="70" rows="8" class="txtarea" wrap="hard"><?php echo "\n"; ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</textarea><p class="attention"><!-- ( <?php echo ((is_array($_tmp=@LTEXT_LEN)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 文字まで)--></p>
                </div>
            </div>

            <div class="btn_area">
                <ul><li class="form_btn return_btn">
                    <a href="?mode=return">
                        <img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る" border="0" name="back03" id="back03"></a>
                    </li>
                    <li class="form_btn next_btn">
                        <input type="image" class="btn_hover" src="/shop/img/btn/next.png" width="100%" alt="次へ" name="next" id="next"></li>
                    <li class="form_btn return_btn_sp">
                    <a href="?mode=return">
                        <img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る" border="0" name="back03" id="back03"></a>
                    </li>
                </ul></div>
        </form>
    </div>
</div>

<script>
$(function(){
  var base_obj = getDelivDate();
  var flg17 = base_obj.flg17;
  var flg19 = base_obj.flg19;
  var pref_zone = 0;
  var deliv_startDate = 0;
  var deliv_endDate = 0;

  //宅配便で受け取る(本州, 四国)
	if(base_obj.receive_flg == 1) {
    pref_zone = 1;
	}
  //宅配便で受け取る(離島)
	if(base_obj.receive_flg == 2) {
    pref_zone = 2;
	}
  //空港で受け取る(成田, 羽田)
	if(base_obj.receive_flg == 3) {
    pref_zone = 1;
	}
  //空港で受け取る(関空, 名古屋)
	if(base_obj.receive_flg == 4) {
    pref_zone = 2;
	}
  //空港で受け取る(新千歳, 福岡)
	if(base_obj.receive_flg == 5) {
    pref_zone = 3;
	}

  //宅配便で受け取る(物理SIM)
	if(base_obj.receive_flg == 9) {
    pref_zone = 1;
	}

  if(base_obj.rental_flg == 0 && base_obj.extension_flg == 1) {
    delivery_date = base_obj.start_date;
    delivery_time = 1;
		delivery_time_str = '午前中';
    $('#deliv_date0').val(delivery_date);
    $('.delivery_items').addClass('no_disp');
		$.ajax({
			type: "post",
			url: "/api.php",
			data: {
					mode:"set_deliv_info",
					delivery_date:delivery_date,
					delivery_time:delivery_time,
					delivery_time_str:delivery_time_str
					},
			cache: false
		}).done(function(data){
			//console.log('success');
			//console.log(data);
      $('#next').prop('disabled', false);
		}).fail(function(data){
			//console.log('fail');
		});
		return false;
  //物理SIM
  } else if(base_obj.sale_flg == 1) {
    if($('#deliv_date1').val() == '') {
      $('#rental_err_01').removeClass('no_disp');
      $('#rental_err_01_sub').removeClass('no_disp');
    } else {
      if(!$('#rental_err_01').hasClass('no_disp')) { $('#rental_err_01').addClass('no_disp'); }
      if(!$('#rental_err_01_sub').hasClass('no_disp')) { $('#rental_err_01_sub').addClass('no_disp'); }
      $('#rental_err_02').removeClass('no_disp')
      $('#deliv_time_ids').removeClass('no_disp');
    }
    if($('.deliv_time_id:checked').val() > 0) {
      if(!$('#rental_err_02').hasClass('no_disp')) { $('#rental_err_02').addClass('no_disp'); }
    }

  	$('#deliv_date1').datepicker({
  		dateFormat:dateFormat,
  //		timeFormat: 'HH:mm:ss',
  		minDate:base_obj.fast_sale_date,
  		maxDate:"+90d"
  	});

    $('#deliv_date1, .deliv_time_id').change(function(){
      var delivery_date_str = $('#deliv_date1').val();
      if(delivery_date_str != '') {
        if(!$('#rental_err_01').hasClass('no_disp')) { $('#rental_err_01').addClass('no_disp'); }
        if(!$('#rental_err_01_sub').hasClass('no_disp')) { $('#rental_err_01_sub').addClass('no_disp'); }
        $('#rental_err_02').removeClass('no_disp')
        $('#deliv_time_ids').removeClass('no_disp');
      }
      var delivery_time = $('.deliv_time_id:checked').val();
      var delivery_time_str = $('.deliv_time_id:checked').parent().text();
      if(delivery_date_str != '' && delivery_time > 0) {
        if(!$('#rental_err_02').hasClass('no_disp')) { $('#rental_err_02').addClass('no_disp'); }
        //配送情報を一時保存
    		$.ajax({
    			type: "post",
    			url: "/api.php",
    			data: {
    					mode:"set_deliv_info",
    					delivery_date:delivery_date_str,
    					delivery_time:delivery_time,
    					delivery_time_str:delivery_time_str
    					},
    			cache: false
    		}).done(function(data){
    			//console.log('success');
    			//console.log(data);
          $('#next').prop('disabled', false);
    		}).fail(function(data){
    			//console.log('fail');
    		});
    		return false;
      }
	 });
  } else if(base_obj.rental_flg == 0 && base_obj.extension_flg == 0) {
      delivery_date = '2020/01/01';
      delivery_time = 1;
  		delivery_time_str = '午前中';
      $('#deliv_date0').val(delivery_date);
      $('.delivery_items').addClass('no_disp');
  		$.ajax({
  			type: "post",
  			url: "/api.php",
  			data: {
  					mode:"set_deliv_info",
  					delivery_date:delivery_date,
  					delivery_time:delivery_time,
  					delivery_time_str:delivery_time_str
  					},
  			cache: false
  		}).done(function(data){
  			//console.log('success');
  			//console.log(data);
        $('#next').prop('disabled', false);
  		}).fail(function(data){
  			//console.log('fail');
  		});
  		return false;
  } else {
    if($('#deliv_date1').val() == '') {
      $('#rental_err_01').removeClass('no_disp');
      $('#rental_err_01_sub').removeClass('no_disp');
    } else {
      if(!$('#rental_err_01').hasClass('no_disp')) { $('#rental_err_01').addClass('no_disp'); }
      if(!$('#rental_err_01_sub').hasClass('no_disp')) { $('#rental_err_01_sub').addClass('no_disp'); }
      $('#rental_err_02').removeClass('no_disp')
      $('#deliv_time_ids').removeClass('no_disp');
    }
    if($('.deliv_time_id:checked').val() > 0) {
      if(!$('#rental_err_02').hasClass('no_disp')) { $('#rental_err_02').addClass('no_disp'); }
    }
    var flg_time = checkDelivTime();
    if(base_obj.receive_flg == 0 || base_obj.receive_flg == 3 || base_obj.receive_flg == 4 || base_obj.receive_flg == 5) {
      $('#deliv_date1').val($('#start_date').val());
      $('#deliv_time_ids').removeClass('no_disp');
    } else {
      var deliv_maxDate = "+180d";
      //レンタルの場合、レンタル開始日の前日からレンタル当日までをお届可能日になるため、基準となる期間設定
      if($('#start_date').val() != '') {
        var date_arr = $('#start_date').val().split('/');
        deliv_maxDate = new Date(date_arr[0], date_arr[1]-1, date_arr[2]);
        var start_date = new Date($('#start_date').val());
        var fast_date = new Date($('#fast_date').val());

        var diffDate = Math.ceil((start_date - fast_date) / 86400000);
        if((start_date - fast_date) > 0) {
        //deliv_minDate = Math.ceil((start_date - fast_date) / 86400000);
        deliv_minDate = Math.ceil((start_date - fast_date) / 86400000) - 1; //前日配送可能
        }
      }
    	$.datepicker.setDefaults($.datepicker.regional[ "ja" ]);
    	var dateFormat   = 'yy/mm/dd';
      if(diffDate == 1) {
        if(pref_zone == 1) {
          deliv_minDate = deliv_minDate + 1;
        }
      }
      if(diffDate == 2) {
        if(pref_zone == 2) {
          deliv_minDate = deliv_minDate + 1;
        }
      }
      if(diffDate == 3) {
        if(pref_zone == 3) {
          deliv_minDate = deliv_minDate + 1;
        }
      }
    	if(flg17 == 1) {
    		deliv_minDate = deliv_minDate + 1;
    	}
    	$('#deliv_date1').datepicker({
    		dateFormat:dateFormat,
    //		timeFormat: 'HH:mm:ss',
    		minDate:deliv_minDate,
    		maxDate:deliv_maxDate
    	});
    }
    $('#deliv_date1, .deliv_time_id').change(function(){
      var delivery_date_str = $('#deliv_date1').val();
      if(delivery_date_str != '') {
        if(!$('#rental_err_01').hasClass('no_disp')) { $('#rental_err_01').addClass('no_disp'); }
        if(!$('#rental_err_01_sub').hasClass('no_disp')) { $('#rental_err_01_sub').addClass('no_disp'); }
        $('#rental_err_02').removeClass('no_disp')
        $('#deliv_time_ids').removeClass('no_disp');
      }
      var delivery_time = $('.deliv_time_id:checked').val();
      var delivery_time_str = $('.deliv_time_id:checked').data('str');
      flg_time = checkDelivTime();
      if(!flg_time) {
        return false;
      }
      if(delivery_date_str != '' && delivery_time > 0) {
        if(!$('#rental_err_02').hasClass('no_disp')) { $('#rental_err_02').addClass('no_disp'); }
        //配送情報を一時保存
    		$.ajax({
    			type: "post",
    			url: "/api.php",
    			data: {
    					mode:"set_deliv_info",
    					delivery_date:delivery_date_str,
    					delivery_time:delivery_time,
    					delivery_time_str:delivery_time_str
    					},
    			cache: false
    		}).done(function(data){
    			//console.log('success');
    			//console.log(data);
          $('#next').prop('disabled', false);
    		}).fail(function(data){
    			//console.log('fail');
    		});
    		return false;
      }
	 });
  }
  function checkDelivTime() {
    flg = true;
    if($('#deliv_date1').val() != '') {
      var fast_date = new Date($('#fast_date').val());
      var delivery_date = new Date($('#deliv_date1').val());
      var deliv_flg = Math.ceil((delivery_date - fast_date) / 86400000);
      $('#deliv_time_id_1').removeClass('no_disp');

      if($('#receive_flg').val() == 0) {
        //店頭受取は当日からOK
        flg = true;
        $('#shipping_delivery_block').addClass('no_disp');
        $('#shipping_togo_block').removeClass('no_disp');
      } else if(pref_zone == 0) {
        //1日後午前以降
        if(deliv_flg < 1) {
          flg = false;
          $('#deliv_time_ids').addClass('no_disp');
        } else {
          flg = true;
        }
      } else if(pref_zone == 1) {
        //1日後14時以降
        if(deliv_flg < 1) {
          flg = false;
          $('#deliv_time_ids').addClass('no_disp');
        } else {
          flg = true;
        }
/*
        if(deliv_flg == 1 && $('.deliv_time_id:checked').val() == 1) {
          flg = false;
          $('#deliv_time_id_1').addClass('no_disp');
        } else {
          flg = true;
        }
*/
      } else if(pref_zone == 2) {
        //2日後午前以降
        if(deliv_flg < 2) {
          flg = false;
          $('#deliv_time_ids').addClass('no_disp');
        } else {
          flg = true;
        }
      }
      if(flg) {
        $('#next').prop('disabled', false);
      } else {
        $('#next').prop('disabled', true);
        //alert('選択できない日時です');
      }
    }
    return flg;
  }
  function getDelivDate() {
    var flg17 = -1;
    var flg19 = -1;
    var obj;
    var sess_start_date;
    var sess_end_date;
    var sess_rental_term;
    var sess_delivery_date;
    var sess_delivery_time;
    var sess_delivery_time_str;
    var sess_fast_date;
    var sess_rental_flg;
    var sess_receive_flg;
    var sess_receive_flg_tmp;
		$.ajax({
			type: "post",
			url: "/api.php",
			data: {
					mode:"get_base_info"
					},
			cache: false,
      async: false
		}).done(function(data){
			//console.log(data);
			obj = $.parseJSON(data);
      sess_start_date = obj.start_date;
      sess_end_date = obj.end_date;
      sess_rental_term = obj.rental_term;
      sess_delivery_date = obj.delivery_date;
      sess_delivery_time = obj.delivery_time;
      sess_delivery_time_str = obj.delivery_time_str;
      sess_fast_date = obj.fast_date;
      sess_rental_flg = obj.rental_flg;
      sess_receive_flg = obj.receive_flg;
      sess_receive_flg_tmp = obj.receive_flg_tmp;
      sess_sale_flg = obj.sale_flg;
      sess_fast_date = obj.fast_date;

      flg17 = obj.flg17;
      flg17 = obj.flg19;
      $('#start_date').val(sess_start_date);
      $('#end_date').val(sess_end_date);
      $('#rental_term').val(sess_rental_term);
      $('#deliv_date1').val(sess_delivery_date);
      if(sess_delivery_time > 0) $('.deliv_time_id').val([sess_delivery_time]);
      $('#delivery_time_str').val(sess_delivery_time_str);
      $('#fast_date').val(sess_fast_date);
      $('#rental_flg').val(sess_rental_flg);
      $('#receive_flg').val(sess_receive_flg);
      $('#receive_flg_tmp').val(sess_receive_flg_tmp);
      $('#sale_flg').val(sess_sale_flg);
      $('#fast_sale_date').val(fast_sale_date);
		}).fail(function(data){
			//console.log('fail');
		});
    return obj;
  }
});
</script>
<script>
$(document).ready(function() {
var start_date = $('#start_date').val();
  $('#deliv_date1').val(start_date);
});
</script>

<script type="text/javascript">
<!-- 入力必須 -->
$(function(){
   $('.enter_form').on('keydown keyup keypress change focus blur', function(){
       if($(this).val() == ''){
           $(this).css({backgroundColor:'#fff1f1'});
       } else {
           $(this).css({backgroundColor:'#fff'});
       }
   }).change();
});
</script>