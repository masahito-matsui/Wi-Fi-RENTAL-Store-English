<!--{if !$tpl_login}-->
<script type="text/javascript">//<![CDATA[
    $(function(){
        var $login_email = $('#header_login_area input[name=login_email]');

        if (!$login_email.val()) {
            $login_email
                .val('Email')
                .css('color', '#757575');
        }

        $login_email
            .focus(function() {
                if ($(this).val() == 'Email') {
                    $(this)
                        .val('')
                        .css('color', '#000');
                }
            })
            .blur(function() {
                if (!$(this).val()) {
                    $(this)
                        .val('Email')
                        .css('color', '#757575');
                }
            });

        $('#header_login_form').submit(function() {
            if (!$login_email.val()
                || $login_email.val() == '') {
                if ($('#header_login_area input[name=login_pass]').val()) {
                    alert('Error: Your email address or password is not entered.');
                }
                return false;
            }
            return true;
        });
    });
//]]></script>
<!--{/if}-->
<!--{strip}-->
    <div class="block_outer">
        <div id="header_login_area" class="clearfix">
            <form name="header_login_form" id="header_login_form" method="post" action="<!--{$smarty.const.HTTPS_URL}-->frontparts/login_check.php"<!--{if !$tpl_login}--> onsubmit="return eccube.checkLoginFormInputted('header_login_form')"<!--{/if}-->>
                <input type="hidden" name="mode" value="login" />
                <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
                <input type="hidden" name="url" value="<!--{$smarty.server.REQUEST_URI|h}-->" />
                <div class="block_body clearfix">
                    <!--{if $tpl_login}-->
                            <div class="welcome_msg">
                            <p class="comment">Welcome Mr./Ms. <span class="user_name"><!--{$tpl_name1|h}--> <!--{$tpl_name2|h}--> </span></p>
                            <!--{if $smarty.const.USE_POINT !== false}-->
                            <p class="comment">Your current points is: <span class="point"> <!--{$tpl_user_point|number_format|default:0}--> pt</span></p>
                            <!--{/if}-->
                            </div>
                            <div class="btn_box">
                            <p class="btn"><a href="/shop/cart"><img src="/shop/img/btn/cart.png" width="100%" alt=""/></a></p>
                            <p class="btn"><a href="/shop/mypage"><img src="/shop/img/btn/mypage.png" width="100%" alt=""/></a></p>
                            <!--{if !$tpl_disable_logout}-->
                            <p class="btn"><input type="image" class="btn_hover" src="/shop/img/btn/header_logout.png" width="100%" onclick="eccube.fnFormModeSubmit('header_login_form', 'logout', '', ''); return false;" alt="ログアウト" /></p>
                            <!--{/if}-->
                            </div>
                    <!--{else}-->
                        <div class="formlist clearfix pc">
                           <div class="mail_box">
                            <p class="mail">
                            <input type="text" class="box150" placeholder="Email" name="login_email" style="ime-mode: disabled;" title="Mail address :" />
                            </p>
                            <p class="login_memory">
                            <input type="checkbox" name="login_memory" id="header_login_memory" value="1" <!--{$tpl_login_memory|sfGetChecked:1}--> /><label for="header_login_memory"><span>Remember</span></label>
                            </p>
                           </div>
                           <div class="password_box">
                            <p class="password"><input type="password" placeholder="password" class="box100" name="login_pass" title="Password :" /></p>
                            <p class="forgot">
                                <a href="<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->" onclick="eccube.openWindow('<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->','forget','600','400',{scrollbars:'no',resizable:'no'}); return false;" target="_blank">Forgot your password?</a>
                            </p>
                           </div>
                           <div class="btn_box_login">
                            <p class="btn"><input type="image" class="btn_hover" src="/shop/img/btn/header_login.png" width="100%" /></p>
                            <p class="btn"><a href="/shop/cart"><img src="/shop/img/btn/cart.png" width="100%" alt=""/></a></li>
                           </div>
                        </div>
                        
                        <div class="formlist clearfix sp">
                           <div class="btn_box_login">
                            <p class="btn"><a href="/shop/mypage/login.php"><img src="/shop/img/btn/header_login.png" width="100%" alt=""/></a></p>
                            <p class="btn"><a href="/shop/cart"><img src="/shop/img/btn/cart.png" width="100%" alt=""/></a></li>
                           </div>
                        </div>
                    <!--{/if}-->
                </div>
            </form>
        </div>
    </div>
<!--{/strip}-->
