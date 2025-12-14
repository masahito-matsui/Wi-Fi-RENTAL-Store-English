<?php
define('ECCUBE_INSTALL', 'ON');
define('HTTP_URL', 'https://en.wifi-rental-store.jp/shop/');
define('HTTPS_URL', 'https://en.wifi-rental-store.jp/shop/');
define('ROOT_URLPATH', '/shop/');
define('DOMAIN_NAME', '');
define('DB_TYPE', 'mysql');
define('DB_USER', 'wifi_en');
define('DB_PASSWORD', 'w1fI_3n');
define('DB_SERVER', 'localhost');
define('DB_NAME', 'wifi_en');
define('DB_PORT', '');
define('ADMIN_DIR', 'master/');
define("ADMIN_FORCE_SSL", true);
define('ADMIN_ALLOW_HOSTS', 'a:0:{}');
define('AUTH_MAGIC', 'troulioradaecrimigiodumaitrousliadoufrae');
define('PASSWORD_HASH_ALGOS', 'sha256');
define('MAIL_BACKEND', 'smtp');
define('SMTP_HOST', 'tls://wifi-rental.sakura.ne.jp');
define('SMTP_PORT', '465');
define('SMTP_USER', 'info@en.wifi-rental-store.jp');
define('SMTP_PASSWORD', 'T%T-y0QQWw');

//rental-store
define('START_MIN_DATE', 0);//defo:0
define('END_MIN_DATE', 1);//defo:1
define('MIN_RENTAL_TERM', 1);
define('MAX_RENTAL_TERM', 364);
define('DELIV_MIN_DATE', 0);

define('RENTAL_PRODUCT_CATEGORY', 21);
define('EXTENSION_PRODUCT_CATEGORY', 23);
// define('B_SIM_CATEGORY', 35); //dev
define('B_SIM_CATEGORY', 38); //www
// define('NO_BAT_CATEGORY', 36); //dev
define('NO_BAT_CATEGORY', 39); //www

define('MAKER_ID_RENTAL', 1);
define('MAKER_ID_EXTENSION', 2);
define('MAKER_ID_ESIM', 3);
define('MAKER_ID_BSIM', 4);

define('ADD_CHARGE_CLASS_ID', 228);
