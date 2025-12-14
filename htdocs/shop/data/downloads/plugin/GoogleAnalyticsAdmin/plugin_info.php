<?php

class plugin_info{
    static $PLUGIN_CODE       = "GoogleAnalyticsAdmin";
    static $PLUGIN_NAME       = "やさしいGoogleAnalytics表示プラグイン";
    static $CLASS_NAME        = "GoogleAnalyticsAdmin";
    static $PLUGIN_VERSION    = "1.0.0";
    static $COMPLIANT_VERSION = "2.13.2";
    static $AUTHOR            = "株式会社アラタナ";
    static $DESCRIPTION       = "GoogleAnalyticsのアクセス解析を、誰でもかんたんにEC-CUBE管理画面に表示できちゃうプラグイン。";
    static $PLUGIN_SITE_URL   = "http://www.aratana.jp/";
    static $AUTHOR_SITE_URL   = "http://www.aratana.jp/";
    static $HOOK_POINTS       =  array(
        array('LC_Page_Admin_Home_action_after', 'lfGoogleAnalyticsGraph'),
        array('prefilterTransform', 'prefilterTransform')
    );
    static $LICENSE           = "LGPL";
}