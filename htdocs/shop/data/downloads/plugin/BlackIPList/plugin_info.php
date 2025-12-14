<?php
/*
 *
 * BlackIPList
 * Copyright(c) 2014  Cyber Area Research,Inc. All Rights Reserved.
 *
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

/**
 * プラグイン の情報クラス.
 *
 * @package BlackIPList
 * @author Cyber Area Research, Inc.
 * @version $Id: $
 */
class plugin_info{
    /** プラグインコード(必須)：プラグインを識別する為キーで、他のプラグインと重複しない一意な値である必要がありま. */
    static $PLUGIN_CODE       = "BlackIPList";
    /** プラグイン名(必須)：EC-CUBE上で表示されるプラグイン名. */
    static $PLUGIN_NAME       = "不正注文ブラックリストプラグイン";
    /** クラス名(必須)：プラグインのクラス（拡張子は含まない） */
    static $CLASS_NAME        = "BlackIPList";
    /** プラグインバージョン(必須)：プラグインのバージョン. */
    static $PLUGIN_VERSION    = "1.0";
    /** 対応バージョン(必須)：対応するEC-CUBEバージョン. */
    static $COMPLIANT_VERSION = "2.13.1";
    /** 作者(必須)：プラグイン作者. */
    static $AUTHOR            = "サイバーエリアリサーチ株式会社";
    /** 説明(必須)：プラグインの説明. */
    static $DESCRIPTION       = "ブラックリスト情報を共有することが可能です。";
    /** プラグインURL：プラグイン毎に設定出来るURL（説明ページなど） */
    static $PLUGIN_SITE_URL   = "http://www.docodoco.jp/fraud/eccube.html";
    /** 作者用のサイトURL：設定されている場合はプラグイン管理画面の作者名がリンクになります。 */
    static $AUTHOR_SITE_URL   = "http://www.arearesearch.co.jp/";
    /** 使用するフックポイント：使用するフックポイントとコールバック関数を設定すると、フックポイントが競合した際にアラートが出ます。 */
    static $HOOK_POINTS       = array(array( "prefilterTransform", 'prefilterTransform'),
                                array("outputfilterTransform", 'outputfilterTransform'),
                                array("LC_Page_Shopping_Confirm_action_confirm", 'hook_action_callback'));
    /** ライセンス */
    static $LICENSE        = "LGPL";
}
?>
