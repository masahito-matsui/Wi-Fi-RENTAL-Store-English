<?php
/*
 * GAECommerceUA: UA版 Google Analytics eコマース対応 プラグイン
 * Copyright (C) 2013 C-Rowl Co.,Ltd. All Rights Reserved.
 * http://www.c-rowl.com/
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
 * @package GAECommerceUA
 * @author C-Rowl, Inc.
 * @version $Id: $
 */
class plugin_info {
    /** プラグインコード(必須)：プラグインを識別する為キーで、他のプラグインと重複しない一意な値である必要があります. */
    static $PLUGIN_CODE       = 'GAECommerceUA';
    /** プラグイン名(必須)：EC-CUBE上で表示されるプラグイン名. */
    static $PLUGIN_NAME       = 'UA版 Google Analytics eコマース対応 プラグイン';
    /** クラス名(必須)：プラグインのクラス（拡張子は含まない） */
    static $CLASS_NAME        = 'GAECommerceUA';
    /** プラグインバージョン(必須)：プラグインのバージョン. */
    static $PLUGIN_VERSION    = '1.4';
    /** 対応バージョン(必須)：対応するEC-CUBEバージョン. */
    static $COMPLIANT_VERSION = '2.12.0～2.13.2';
    /** 作者(必須)：プラグイン作者. */
    static $AUTHOR            = '株式会社C-Rowl';
    /** 説明(必須)：プラグインの説明. */
    static $DESCRIPTION       = "Universal Analytics版の Google Analytics プラグインです。eコマースに対応しています。携帯電話には対応しておりません。";
    /** プラグインURL：プラグイン毎に設定出来るURL（説明ページなど） */
    static $PLUGIN_SITE_URL   = 'http://www.c-rowl.com/';
    /** プラグイン作者URL：プラグイン毎に設定出来るURL（説明ページなど） */
    static $AUTHOR_SITE_URL   = 'http://www.c-rowl.com/';
    /** フックポイント：フックポイントとコールバック関数を定義します */
    static $HOOK_POINTS       = array(
            array('LC_Page_Shopping_Complete_action_before', 'hookPageShoppingCompleteActionBefore'),
            array('prefilterTransform', 'prefilterTransform')
    );
    /** ライセンス */
    static $LICENSE           = 'LGPL';
}
