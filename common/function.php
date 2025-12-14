<?php
//debug
function debug() {
//	ini_set("display_errors", 1);
//	echo "<p>headers</p><pre>"; print_r(getallheaders()); echo "</pre>";
	echo "<p>session</p><pre>"; print_r($_SESSION); echo "</pre>";
//	echo "<p>cookie</p><pre>"; print_r($_COOKIE); echo "</pre>";
	echo "<p>request</p><pre>"; print_r($_REQUEST); echo "</pre>";
//	echo "<p>files</p><pre>"; print_r($_FILES); echo "</pre>";
}

function dropSession() {
	session_start();
	$_SESSION = array();
	session_destroy();
}

function makeCode() {
	//生成する文字数
	$length = 10;

	//使用する文字
	$char = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	$charlen = mb_strlen($char);
	$result = "";

	for($i=1; $i<=$length; $i++){
		$index = mt_rand(0, $charlen - 1);
		$result .= mb_substr($char, $index, 1);
	}

	return $result;
}

function checkNull($str) {
	$flg = 1;
	if ((preg_match("/^(\s|　)+$/", $str)) || $str == "") {
		$flg = 0;
	}
	return $flg;
}

function checkString($str) {
	$flg = 1;
	if(!preg_match("/^[a-zA-Z0-9]+$/", $str)) {
		$flg = 0;
	}
	return $flg;
}

function removeSpace($str) {
	$str = preg_replace('/(\s|　)/', '', $str);
	return $str;
}

function checkMinLength($str, $len) {
	$flg = 1;
	if (mb_strlen($str) < $len) {
		$flg = 0;
	}
	return $flg;
}

function checkMaxLength($str, $len) {
	$flg = 1;
	if (mb_strlen($str) > $len) {
		$flg = 0;
	}
	return $flg;
}

function checkLength($str, $len) {
	$flg = 1;
	if (mb_strlen($str) > $len) {
		$flg = 0;
	}
	return $flg;
}

function checkMailAdd($str) {
	$flg = 1;
	if(!preg_match("/^[-+.\w]+@[-a-z0-9]+(\.[-a-z0-9]+)*\.[a-z]{2,6}$/i", $str)) {
		$flg = 0;
	}
	return $flg;
}

function checkNumber($str) {
	$flg = 1;
	$str = mb_convert_kana($str, "n");
	if(!preg_match("/^[0-9]+$/", $str)) {
		$flg = 0;
	}
	return $flg;
}

function checkTelNumber($str) {
	$flg = 1;
//	$str = mb_convert_kana($str, "n");
	if(!preg_match("/^([0-9]{1,4}-[0-9]{1,4}-[0-9]{4,5})$/", $str)) {
		$flg = 0;
	}
	return $flg;
}

function checkKataKana($str) {
	$flg = 1;
	if(!preg_match("/^[ァ-ヾ]+$/u", $str)){
		$flg = 0;
	}
	return $flg;
}

function geteSIMData($order_id) {
	$flg = 1;
	$sql  = "
		SELECT
			id, order_id, product_code, iccid, url, smdp_addr, activation_code, download_link, qr_code
		FROM
			dtb_esim_stock
		WHERE
			order_id = ?
		";
	$placeholder = array(
			$order_id,
	);

	try {
		//DBへの接続
		$conn = ADONewConnection(DSN);
		if(DEBUG_FLG == 1) { $conn->debug = true; }
		$conn->query("SET NAMES utf8");
		$res = $conn->query($sql, $placeholder);
	} catch (Exception $e) {
		$flg = 0;
		if(DEBUG_FLG == 1) { var_dump($e); }
	}

	while (is_array($row = $res->fetchRow())) {
		$data[] = array(
				"id"=>$row["id"],
				"order_id"=>$row["order_id"],
				"product_code"=>$row["product_code"],
				"iccid"=>$row["iccid"],
				"url"=>$row["url"],
				"smdp_addr"=>$row["smdp_addr"],
				"activation_code"=>$row["activation_code"],
				"download_link"=>$row["download_link"],
				"qr_code"=>$row["qr_code"],
			);
		break; //返却するのは1行だけ
	}
	return array($flg, $data);
}

?>
