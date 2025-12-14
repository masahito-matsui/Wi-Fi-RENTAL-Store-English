<?php
//debug
define('DEBUG_FLG', 0);
if(DEBUG_FLG == 1) {
	ini_set("display_errors", 1);
}
ini_set("session.gc_maxlifetime",43200); // sessionの有効期間は12時間
ini_set("session.cookie_lifetime",0); // sessionの有効期間は閉じるまで
ini_set("session.cache_limiter","none");
ini_set("session.cache_expire",43200);
ini_set('default_charset','utf-8');
ini_set('mbstring.encoding_translation','On');
ini_set('mbstring.http_input','auto');
ini_set('mbstring.http_output',"utf-8");
ini_set('mbstring.internal_encoding',"utf-8");
ini_set('mbstring.substitute_character','none');

mb_internal_encoding("UTF-8");
mb_language("ja");
mb_detect_order("ASCII, JIS, UTF-8, EUC-JP, SJIS");

require(dirname(__FILE__)."/adodb5/adodb.inc.php");
require(dirname(__FILE__)."/adodb5/adodb-exceptions.inc.php");
require(dirname(__FILE__)."/function.php");

session_start();

$demo = 0;
if($_SERVER['SERVER_NAME'] == "en-dev.wifi-rental-store.jp") {
	$demo = 1;
}
switch ($demo){
case 0:
	define(DSN, "mysql://wifi_en:w1fI_3n@localhost/wifi_en");
	break;
case 1:
default:
	define(DSN, "mysql://wifi_en:w1fI_3n@localhost/wifi_en_dev");
	break;
}

?>
