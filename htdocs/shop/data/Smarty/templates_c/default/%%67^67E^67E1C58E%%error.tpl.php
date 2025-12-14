<?php /* Smarty version 2.6.27, created on 2021-09-14 16:28:15
         compiled from error.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'error.tpl', 48, false),)), $this); ?>
    <!-----fixed------->
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/shop/vendor/bootstrap/bootstrap_custom.css">
    <script src="/shop/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="/shop/vendor/matchheight/jquery.matchHeight-min.js"></script>
    <!-----/fixed------->

    <!--webfont-->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Oswald|PT+Sans+Narrow:700" rel="stylesheet">
    <!--/webfont-->

    <!--icon-->
    <link href="/shop/vendor/iconic/css/open-iconic-bootstrap.css" rel="stylesheet">
    <!--/icon-->
    <script src="/js/common.js"></script>
    <link href="/shop/css/style.css?v=1" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="all" href="/shop/css/shop_reset.css">

<?php echo '<div id="undercolumn"><div id="undercolumn_error"><div class="message_area"><!--★エラーメッセージ--><p class="error">'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '</p></div><div class="btn_area"><ul><li>'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['return_top'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<a href="'; ?><?php echo ((is_array($_tmp=@TOP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '"><img class="btn_hover" src="/shop/img/btn/top.png" width="100%" alt="トップへ戻る" /></a>'; ?><?php else: ?><?php echo '<a href="javascript:history.back()"><img class="btn_hover" src="/shop/img/btn/back.png" width="100%" alt="戻る" /></a>'; ?><?php endif; ?><?php echo '</li></ul></div></div></div><style>.btn_area{margin:0 auto;width:80%;max-width:421px;}</style>'; ?>
