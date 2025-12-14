<?php

/**
 * プラグイン の情報クラス.
 *
 * @package Receipt
 * @author Takenori Kanazawa
 * @version $Id: $1.1.2
 */
class plugin_info{
    /** プラグインコード(必須)：プラグインを識別する為キーで、他のプラグインと重複しない一意な値である必要がありま. */
    static $PLUGIN_CODE       = "ReceiptKNZTK";
    /** プラグイン名(必須)：EC-CUBE上で表示されるプラグイン名. */
    static $PLUGIN_NAME       = "領収書発行";
    /** プラグインバージョン(必須)：プラグインのバージョン. */
    static $PLUGIN_VERSION    = "v1.1.2";
    /** 対応バージョン(必須)：対応するEC-CUBEバージョン. */
    static $COMPLIANT_VERSION = "2.13.1";
    /** 作者(必須)：プラグイン作者. */
    static $AUTHOR            = "金沢 武範";
    /** 説明(必須)：プラグインの説明. */
    static $DESCRIPTION       = "領収書を発行することができるプラグインです。";
    /** プラグインURL：プラグイン毎に設定出来るURL（説明ページなど） */
    static $PLUGIN_SITE_URL   = "";
    /** プラグイン作者URL：プラグイン毎に設定出来るURL（説明ページなど） */
    static $AUTHOR_SITE_URL   = "http://toko.e-sakenomi.com";
    /** クラス名(必須)：プラグインのクラス（拡張子は含まない） */
    static $CLASS_NAME       = "Receipt";
    /** フックポイント：フックポイントとコールバック関数を定義します */
    static $HOOK_POINTS       = array();
    /** ライセンス */
    static $LICENSE        = "LGPL";
}
?>