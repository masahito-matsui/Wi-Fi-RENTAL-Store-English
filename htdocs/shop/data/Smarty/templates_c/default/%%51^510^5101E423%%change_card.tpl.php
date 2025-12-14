<?php /* Smarty version 2.6.27, created on 2021-09-18 11:30:41
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/mypage/change_card.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/mypage/change_card.tpl', 3, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/mypage/change_card.tpl', 3, false),array('modifier', 'substr', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/mypage/change_card.tpl', 159, false),array('modifier', 'sfGetErrorColor', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/mypage/change_card.tpl', 184, false),array('function', 'html_options', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/mypage/change_card.tpl', 193, false),)), $this); ?>

<?php $this->assign('key', 'js_urlpath'); ?>
<script src="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
/ext/js/token.js"></script>
<?php $this->assign('key', 'ShopID'); ?>
<script type="text/javascript">
    var send = true;

    function fnCheckSubmit() {
        if (send) {
            send = false;
            document.form2.submit();
            return false;
        } else {
            alert("只今、処理中です。しばらくお待ち下さい。");
            return false;
        }
    }

    function execPurchase(response) {
        if (response.resultCode != 000) {
            window.alert("カード登録処理中にエラーが発生しました");
            window.location.assign(window.location.href);
        } else {
            $("#CardNo").val('');
            $("#Expire_year").val('');
            $("#Expire_month").val('');
            $("#card_name1").val('');
            $("#card_name2").val('');

            //予め購入フォームに用意した token フィールドに、値を設定
            $("input:hidden[name='token']").val(response.tokenObject.token);

            fnCheckSubmit();
        }
    }

    function doPurchase() {
        if ("<?php echo ((is_array($_tmp=$this->_tpl_vars['enable_token'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" == "") {
            fnCheckSubmit();
            return;
        }

        var cardno = $("#CardNo").val();
        if (cardno == "") {
            alert("※ カード番号が入力されていません。");
            return;
        }

        // カード番号の数値のみチェック
        var pat = /^\d*$/;
        if (!pat.test(cardno)) {
            alert("※ カード番号は数値で入力してください。");
            return;
        }

        // カード番号の7桁未満チェック
        if (cardno.length < 7) {
            alert("※ カード番号は7桁以上を入力してください。");
            return;
        }

        var date = new Date();
        var year = date.getFullYear();
        year = String(year);
        year = year.substring(0,2);
        var mm = $("#Expire_month").val();
        if (mm == "") {
            alert("※ 有効期限：月が入力されていません。");
            return;
        }
        var yy = $("#Expire_year").val();
        if (yy == "") {
            alert("※ 有効期限：年が入力されていません。");
            return;
        }
        var expire = year + yy + mm;

        var card_name1 = $("#card_name1").val();
        if (card_name1 == "") {
            alert("※ カード名義人名：名が入力されていません。");
            return;
        }
        var card_name2 = $("#card_name2").val();
        if (card_name2 == "") {
            alert("※ カード名義人名：姓が入力されていません。");
            return;
        }
        var holdername = card_name1.concat(card_name2);

        // Disable button 
        var btnAdd, btnDel, classBtnAdd, classBtnDel;
        btnAdd = document.getElementById("btnAdd");
        btnDel = document.getElementById("btnDel");
        classBtnAdd = document.getElementById("btnAdd").getAttribute('class');
        classBtnDel = document.getElementById("btnDel").getAttribute('class');
        btnAdd.setAttribute("class", classBtnAdd + " disabled");
        btnDel.setAttribute("class", classBtnDel + " disabled");

        Multipayment.init("<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
");
        Multipayment.getToken(
            {
                cardno: cardno,
                expire: expire,
                securitycode: '',
                holdername: holdername
            }, execPurchase
        );
    }
</script>

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
        <h3>現在登録されているカード情報</h3>
        <form name="form1" id="form1" method="post" action="?">
        <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><input type="hidden" name="mode" value="delete"><?php if (! ((is_array($_tmp=$this->_tpl_vars['arrData'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><p>登録されているカード情報はありません。</p>
        <?php else: ?>
            <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <div class="information">
            <?php $this->assign('key', 'CardSeq'); ?>
                <p class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
            <?php $this->assign('key', 'error'); ?>
                <p class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
            </div>
            <?php endif; ?>
            <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_is_success'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <div class="information">
                <p class="attention">正常に更新されました。</p>
            </div>
            <?php endif; ?>

            <table summary="クレジットカード選択"><colgroup width="10%"></colgroup><colgroup width="5%"></colgroup><colgroup width="85%"></colgroup><tr><th class="alignC">選択<span class="attention">※</span></th>
                    <th colspan="2" class="alignC">登録カード番号選択</th>
                </tr><?php $this->assign('key1', 'CardSeq'); ?><?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrData'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?><?php if (((is_array($_tmp=$this->_tpl_vars['data']['DeleteFlag'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != '1'): ?><tr><th class="alignC">
                        <input type="radio" name="CardSeq" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['CardSeq'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['data']['CardSeq'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?> checked <?php endif; ?> <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_plg_target_seq'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['data']['CardSeq'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?> <?php endif; ?>></th>
                    <td class="alignC">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['CardSeq'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                    </td>
                    <td>
                    カード番号: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['CardNo'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
   有効期限: <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['Expire'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 2) : substr($_tmp, 0, 2)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
年<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['Expire'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('substr', true, $_tmp, 2, 2) : substr($_tmp, 2, 2)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
月
                    <?php if (((is_array($_tmp=$this->_tpl_vars['data']['HolderName'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ''): ?>  カード名義：<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['HolderName'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php endif; ?>
                    </td>
                </tr><?php endif; ?><?php endforeach; endif; unset($_from); ?></table><?php endif; ?><div class="btn_area">
            <ul><li>
                    <input type="submit" id="btnDel" value="選択した情報を削除"></li>
            </ul></div>
        </form>

        <h3>カード情報を新規登録</h3>
        <form name="form2" id="form2" method="post" action="?">
        <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><input type="hidden" name="mode" value="regist"><input type="hidden" name="token" value=""><div class="information">
            <p>下記項目にご入力ください。「<span class="attention">※</span>」印は入力必須項目です。<br>
                入力後、一番下の「登録する」ボタンをクリックしてください。</p>
            <?php $this->assign('key', 'error2'); ?>
            <p class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
        </div>

            <table summary="クレジットカード番号入力"><colgroup width="20%"></colgroup><colgroup width="80%"></colgroup><tr><th colspan="2" class="alignC"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
番号入力</th>
                </tr><tr><th class="alignR">
                        カード番号<span class="attention">※</span>
                    </th>
                    <td>
                    <?php $this->assign('key1', 'CardNo'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="ime-mode: disabled; <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="16" class="box120"></td>
                </tr><tr><th class="alignR">
                        カード有効期限<span class="attention">※</span>
                    </th>
                    <td>
                    <?php $this->assign('key1', 'Expire_month'); ?>
                    <?php $this->assign('key2', 'Expire_year'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <select id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
"><option value="">−−</option><?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrMonth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>
</select>月
                     / 
                    20<select id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
"><option value="">−−</option><?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrYear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>
</select>年
                    </td>
                </tr><tr><th class="alignR">
                        カード名義<span class="attention">※</span>
                    </th>
                    <td>
                        <?php $this->assign('key1', 'card_name1'); ?>
                        <?php $this->assign('key2', 'card_name2'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        名:<input type="text" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="ime-mode: disabled; <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="20" class="box120">
                         
                        姓:<input type="text" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="ime-mode: disabled; <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="20" class="box120"><p class="mini"><span class="attention">カードに記載の名前をご記入下さい。ご本人名義のカードをご使用ください。</span>半角英文字入力（例：TARO YAMADA）</p>
                    </td>
                </tr></table><div class="btn_area">
            <ul><li>
                    <input type="button" id="btnAdd" value="カード情報を登録" onclick="doPurchase();"></li>
            </ul></div>
        </form>
    </div>
</div>