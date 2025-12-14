<?php /* Smarty version 2.6.27, created on 2022-12-25 20:59:58
         compiled from /data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/pg_mulpay_token.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/pg_mulpay_token.tpl', 23, false),array('modifier', 'h', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/pg_mulpay_token.tpl', 28, false),array('modifier', 'sfGetErrorColor', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/pg_mulpay_token.tpl', 175, false),array('function', 'html_options', '/data/en.wifi-rental-store.jp/htdocs/shop/data/Smarty/templates/default/frontparts/bloc/pg_mulpay_token.tpl', 189, false),)), $this); ?>
<script type="text/javascript">//<![CDATA[
var send = true;

function fnCheckSubmit(mode) {
    $('#payment_form_body').slideToggle();
    $('#payment_form_loading').slideToggle();

    if(send) {
        send = false;
        fnModeSubmit(mode,'','');
        return false;
    } else {
        alert("Payment transaction may take some time to complete.");
        return false;
    }
}
$(function() {
            <?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_payment_onload'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

});
//]]>
</script>
<?php $this->assign('key', 'js_urlpath'); ?>
<script src="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
/ext/js/token.js"></script>
<script type="text/javascript">
    function execPurchase(response) {
        if (response.resultCode != 000) {
            window.alert("購入処理中にエラーが発生しました");
            window.location.assign(window.location.href);
        } else {
            //カード情報は念のため値をhttp://sccm.tma.com.vn/CMApplicationCatalog/#/SoftwareLibrary/AppListPageView.xaml
            document.getElementById("CardNo").value = '';
            document.getElementById("Expire_year").value = '';
            document.getElementById("Expire_month").value = '';

            var securityCode = document.getElementById("SecurityCode");
            if (securityCode != null) {
                document.getElementById("SecurityCode").value = '';
            }

            //予め購入フォームに用意した token フィールドに、値を設定
            $("input:hidden[name='token']").val(response.tokenObject.token);
            $("input:hidden[name='Method']").val(document.getElementById("Method").value);

            fnCheckSubmit("next");
        }
    }

    function doPurchase() {
        var cardno = document.getElementById("CardNo").value;
        if (cardno == "") {
            alert("※ Please enter the credit card number.");
            return;
        }

        var date = new Date();
        var year = date.getFullYear();
        year = String(year);
        year = year.substring(0,2);
        var mm = document.getElementById("Expire_month").value;
        if (mm == "") {
            alert("※ Please select the credit card expiration date (Month).");
            return;
        }
        var yy = document.getElementById("Expire_year").value;
        if (yy == "") {
            alert("※ Please select the credit card expiration date (Year).");
            return;
        }
        var expire = year + yy + mm;

        var card_name1 = document.getElementById("card_name1").value;
/*        if (card_name1 == "") {
            alert("※ カード名義人名：名が入力されていません。");
            return;
        }
*/
        var card_name2 = document.getElementById("card_name2").value;
        if (card_name2 == "") {
            alert("※ Please enter the card holder's name.");
            return;
        }
        var holdername = card_name1.concat(card_name2);

        var securityCode;
        var security_code = document.getElementById("SecurityCode");

        if (security_code == null || security_code.value == "") {
            <?php $this->assign('key', 'security_code_check'); ?>
            if ("<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" == "1") {
                alert("※ Please enter the security code.");
                return;
            }
            securityCode = '';
        } else {
            securityCode = security_code.value;
        }

        // Disable button
        var btnNext, btnBack, classBtnNext, classBtnBack;
        btnNext = document.getElementById("next");
        btnBack = document.getElementById("back");
        classBtnNext = document.getElementById("next").getAttribute('class');
        classBtnBack = document.getElementById("back").getAttribute('class');
        btnNext.setAttribute("class", classBtnNext + " disabled");
        btnBack.setAttribute("class", classBtnBack + " disabled");

        <?php $this->assign('key', 'ShopID'); ?>
        Multipayment.init("<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
");
        Multipayment.getToken(
            {
                cardno: cardno,
                expire: expire,
                securitycode: securityCode,
                holdername: holdername
            }, execPurchase
        );
    }
</script>
        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_is_td_tran'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
        <div id="payment_form_td_tran" style="<?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_is_td_tran'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>display:none;<?php endif; ?>">
            <div class="information">
                <p>本人認証サービス(3-Dセキュア認証)の画面に移動します。</p>
            </div>
            <table summary="">
                <tr>
                <td class="alignC">
                    本人認証サービス（3-Dセキュア認証）を続けます。<br />
                    「次へ」ボタンをクリックして下さい。<br />
                    <span class="attention">※It may take a little time to switch screen, please just a moment</span>
                </td>
                </tr>
            </table>
        </div>
        <input type="hidden" name="PaReq" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrTdData']['PaReq'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
        <input type="hidden" name="TermUrl" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrTdData']['TermUrl'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
        <input type="hidden" name="MD" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrTdData']['MD'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
        <?php endif; ?>

        <div id="payment_form_loading" style="<?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_is_loding'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>display:none;<?php endif; ?>">
            <div class="information">
                <p>Payment transaction may take some time to complete.</p>
            </div>
            <table summary="">
                <tr>
                <td class="alignC">
                    <img src="<?php echo ((is_array($_tmp=@MDL_PG_MULPAY_MEDIAFILE_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
loading.gif" />
                </td>
                </tr>
            </table>
        </div>
        <div id="payment_form_body" style="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_is_loding'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>display:none;<?php endif; ?>">
            <div class="information">
                <p><span class="attention">* </span>Required fields</p>
                <?php $this->assign('key', 'payment'); ?>
                <p class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
            </div>
            <table summary="クレジットカード番号入力" class="card_payment">
                <colgroup width="20%"></colgroup>
                <colgroup width="80%"></colgroup>
                <!--<tr>
                    <th colspan="2" class="alignC">Entry form of credit card</th>
                </tr>-->
                <tr>
                    <th class="alignL">
                        Credit Card Number<span class="attention">*</span>
                    </th>
                    <td>
                    <?php $this->assign('key1', 'CardNo'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="ime-mode: disabled; <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
"  size="16" class="box120" />
                    </td>
                </tr>
                <tr>
                    <th class="alignL">
                        Expiration Date<span class="attention">*</span>
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
">
                    <option value="">&minus;&minus;</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrMonth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>mm
                    &nbsp;/&nbsp;
                    20<select id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">&minus;&minus;</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrYear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>yy
                    </td>
                </tr>
													<style>
														#Expire_month{
															width: 30%;margin-right: 5px;
														}
														#Expire_year{
															width: 30%;margin-right: 5px;margin-left: 5px;
														}
													</style>
                <tr>
                    <th class="alignL">
                        Card Holder's Name<span class="attention">*</span>
                    </th>
                    <td>
                        <?php $this->assign('key1', 'card_name1'); ?>
                        <?php $this->assign('key2', 'card_name2'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="hidden" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="ime-mode: disabled; <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="20" class="box240" />
                        <!--&nbsp;-->
                        <input type="text" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="ime-mode: disabled; <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="20" class="box240" />
                        <!--<p class="mini"><span class="attention">カードに記載の名前をご記入下さい。</span>半角英文字入力（例：TARO YAMADA)</p>-->
                    </td>
                </tr>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrPaymentInfo']['use_securitycd'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '1'): ?>
                <tr>
                    <th class="alignL">
                        Security Code<?php if (((is_array($_tmp=$this->_tpl_vars['arrPaymentInfo']['use_securitycd_option'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != '1'): ?><span class="attention">*</span><?php endif; ?>
                    </th>
                    <td>
                        <?php $this->assign('key', 'SecurityCode'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="ime-mode: disabled;max-width: 100px; <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
"  size="4" class="box60" />
                        <p class="mini"><span class="attention">※Please fill in last 3 or 4-digit numbers mainly written on the back of credit card.
One byte entry. </span>EX )123</p>
                    </td>
                </tr>
                <?php endif; ?>
                <tr style="display:none;">
                    <th class="alignR">
                        Number of payments<span class="attention">※</span>
                    </th>
                    <td>
                        <?php $this->assign('key1', 'Method'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <select id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrPayMethod'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                        </select>
                    </td>
                </tr>
                <?php if (false): ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrPaymentInfo']['enable_customer_regist'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) && ((is_array($_tmp=$this->_tpl_vars['tpl_pg_regist_card_form'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <tr>
                    <th class="alignR">
                        カード情報登録
                    </th>
                    <td>
                        <?php $this->assign('key', 'register_card'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>

                        <?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_plg_pg_mulpay_is_subscription'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <input type="checkbox" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="1" <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>checked<?php endif; ?> >
                        <label for="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">このカードを登録する。</label>
                        <?php else: ?>
                        <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="1" />
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_plg_pg_mulpay_subscription_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
では自動でカード登録します。
                        <?php endif; ?>
                        <p class="mini">カード情報を登録すると次回より入力無しで購入出来ます。<br />カード情報は当店では保管いたしません。<br />委託する決済代行会社にて安全に保管されます。</p>
                    </td>
                </tr>
                <?php endif; ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_pg_regist_card_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <tr>
                    <th class="alignR">
                        カード情報登録
                    </th>
                    <td>
                        <span class="attention">カード情報が既に<?php echo ((is_array($_tmp=((is_array($_tmp=@MDL_PG_MULPAY_REGIST_CARD_NUM)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
個登録されています。<br />これ以上は新規で登録出来ません。</span>
                        <p class="mini">新たに登録したい場合は、大変お手数ですが後ほどマイページにて編集して下さい。</p>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endif; ?>
            </table>

            <table>
                <tr>
                    <td>
                        <span class="attention">* Payment transaction may take some time to complete.</span>
                    </td>
                </tr>
            </table>

<script>
//.g-recaptcha タグの data-callback 属性で指定したコールバック関数の定義
var myAlert = function(response) {
  $('.form_btn.next_btn input').removeClass('grayout');
};
</script>

  <form method="post" action="?">
    <div class="g-recaptcha" data-sitekey="6LeIp6YjAAAAAGkOqop-8HhfdN6Xh-QlyKz0V9T_" data-callback="myAlert"></div>
  </form>
  <script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script><!-- API の読み込み -->
<style>
 .grayout{
 pointer-events: none;
 filter: grayscale(100%);
 }
</style>

            <div class="btn_area">
                <ul>
                    <?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_btn_next'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <li class="form_btn return_btn">
                        <input type="image" onclick="return fnCheckSubmit('return');" src="/shop/img/btn/return.png" class="btn_hover" width="100%" alt="戻る" border="0" name="back" id="back"/>
                    </li>
                    <?php endif; ?>
                    <li class="form_btn next_btn">
                    <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_btn_next'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <input type="image" class="grayout" onclick="return fnCheckSubmit('next');" onmouseover="chgImg('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_next_on.jpg',this)" onmouseout="chgImg('<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_next.jpg',this)" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_next.jpg" alt="次へ" border="0" name="next" id="next" />
                    <?php else: ?>
                        <input type="image" class="grayout" onclick="doPurchase(); return false;" src="/shop/img/btn/payment.png" class="btn_hover" width="100%" alt="ご注文完了ページへ"  name="next" id="next" />
                    <?php endif; ?>
                    </li>
                    <?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_btn_next'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <li class="form_btn return_btn_sp">
                        <input type="image" onclick="return fnCheckSubmit('return');" src="/shop/img/btn/return.png" class="btn_hover" width="100%" alt="戻る" border="0" name="back" id="back"/>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>

       </div>