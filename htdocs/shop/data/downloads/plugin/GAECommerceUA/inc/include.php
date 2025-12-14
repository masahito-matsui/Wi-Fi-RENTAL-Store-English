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

// プラグイン基本設定
define('PLG_CC_GAECUA_CODE', 'GAECommerceUA');
define('PLG_CC_GAECUA_CODE_LOWER', strtolower(PLG_CC_GAECUA_CODE));
define('PLG_CC_GAECUA_PATH', PLUGIN_UPLOAD_REALDIR.PLG_CC_GAECUA_CODE.'/');
define('PLG_CC_GAECUA_HTML_PATH', PLUGIN_HTML_REALDIR.PLG_CC_GAECUA_CODE.'/');

define('PLG_CC_GAECUA_NAME', 'UA版 Google Analytics eコマース対応 プラグイン');
define('PLG_CC_GAECUA_COMPANY', '株式会社C-Rowl');

// コンフィグ設定用
define('PLG_CC_GAECUA_OP_FLG_ON',  1);
define('PLG_CC_GAECUA_OP_FLG_OFF', 2);
define('PLG_CC_GAECUA_OP_CATEGORY_TOP',     1);
define('PLG_CC_GAECUA_OP_CATEGORY_DETAIL',  2);
define('PLG_CC_GAECUA_OP_CATEGORY_OFF',     3);
// コンフィグ設定のデフォルト値
define('PLG_CC_GAECUA_OP_CATEGORY_DEFAULT',            PLG_CC_GAECUA_OP_CATEGORY_TOP);
define('PLG_CC_GAECUA_OP_NAME_WITH_CLASS_DEFAULT',     PLG_CC_GAECUA_OP_FLG_OFF);

// プラグインパス設定
define('PLG_CC_GAECUA_CLASS_PATH',    PLG_CC_GAECUA_PATH.'class/');
define('PLG_CC_GAECUA_CLASSEX_PATH',  PLG_CC_GAECUA_PATH.'class_extends/');
define('PLG_CC_GAECUA_TEMPLATE_PATH', PLG_CC_GAECUA_PATH.'templates/');

// テンプレートファイルパス
define('PLG_CC_GAECUA_TPL_PATH_ADMIN',  PLG_CC_GAECUA_TEMPLATE_PATH.'admin/');
define('PLG_CC_GAECUA_TPL_PATH_PC',     PLG_CC_GAECUA_TEMPLATE_PATH.'default/');
define('PLG_CC_GAECUA_TPL_PATH_SPHONE', PLG_CC_GAECUA_TEMPLATE_PATH.'sphone/');
define('PLG_CC_GAECUA_TPL_PATH_MOBILE', PLG_CC_GAECUA_TEMPLATE_PATH.'mobile/');

// フロント側ファイルパス
define('PLG_CC_GAECUA_GA_FILE', 'plg_'. PLG_CC_GAECUA_CODE_LOWER .'.php');
define('PLG_CC_GAECUA_GA_URL', PLUGIN_HTML_URLPATH.PLG_CC_GAECUA_CODE.'/'.PLG_CC_GAECUA_GA_FILE);
define('PLG_CC_GAECUA_GA_PATH', USER_REALDIR . PLG_CC_GAECUA_GA_FILE);

require_once PLG_CC_GAECUA_CLASSEX_PATH . 'util_extends/plg_GAECommerceUA_SC_Util_Ex.php';
