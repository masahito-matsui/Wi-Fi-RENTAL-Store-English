<?php

/*
* Plugin Code : ExpressLink
*
* Copyright (C) 2016 BraTech Co., Ltd. All Rights Reserved.
* http://www.bratech.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

/**
 * プラグイン の情報クラス.
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class plugin_info
{

    /** プラグインコード(必須)：プラグインを識別する為キーで、他のプラグインと重複しない一意な値である必要がありま. */
    static $PLUGIN_CODE = "ExpressLink";

    /** プラグイン名(必須)：EC-CUBE上で表示されるプラグイン名. */
    static $PLUGIN_NAME = "運送会社連携";

    /** クラス名(必須)：プラグインのクラス（拡張子は含まない） */
    static $CLASS_NAME = "ExpressLink";

    /** プラグインバージョン(必須)：プラグインのバージョン. */
    static $PLUGIN_VERSION = "1.7.1";

    /** 対応バージョン(必須)：対応するEC-CUBEバージョン. */
    static $COMPLIANT_VERSION = "2.12, 2.13";

    /** 作者(必須)：プラグイン作者. */
    static $AUTHOR = "株式会社ブラテック";

    /** 説明(必須)：プラグインの説明. */
    static $DESCRIPTION = "運送会社各社ソフトとの連携を実現します。各社フォーマットでのCSV出力、伝票番号の取り込み、発送完了メールテンプレートの追加などをサポートしています。現在、ヤマト運輸様のB2、佐川急便様のe飛伝II、e飛伝Pro、Biz-Logi DEPO、日本郵便様のゆうパックプリントv4、ゆうパックプリントR、西濃運輸様のカンガルー・マジックII、e発行businessに対応しています。";

    /** プラグインURL：プラグイン毎に設定出来るURL（説明ページなど） */
    static $PLUGIN_SITE_URL = "http://www.bratech.co.jp";
    static $AUTHOR_SITE_URL = "http://www.bratech.co.jp/service/eccube-plugin/express";

    /** フックポイント * */
    static $HOOK_POINTS = array(
        array('LC_Page_Shopping_Payment_action_before'),
        array('LC_Page_Shopping_Payment_action_after'),
        array('LC_Page_Shopping_Payment_action_confirm'),
        array('LC_Page_Shopping_Confirm_action_after'),
        array('LC_Page_Admin_Order_action_before'),
        array('LC_Page_Admin_Order_action_after'),
        array('LC_Page_Admin_Order_Edit_action_before')
    );

    /** ライセンス */
    static $LICENSE = "独自ライセンス";

}

?>
