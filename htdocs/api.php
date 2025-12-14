<?php
define('COOKIE_TERM', 3600);

if($_REQUEST["mode"] == "reset") {
  setcookie('start_date', '', time() - COOKIE_TERM, '/');
  setcookie('end_date', '', time() - COOKIE_TERM, '/');
  setcookie('rental_term', '', time() - COOKIE_TERM, '/');
  setcookie('delivery_date', '', time() - COOKIE_TERM, '/');
  setcookie('delivery_time', '', time() - COOKIE_TERM, '/');
  setcookie('rental_flg', '', time() - COOKIE_TERM, '/');
  setcookie('suitcase_flg', '', time() - COOKIE_TERM, '/');
  setcookie('sale_flg', '', time() - COOKIE_TERM, '/');
  setcookie('extension_flg', '', time() - COOKIE_TERM, '/');
  setcookie('receive_flg', '', time() - COOKIE_TERM, '/');
  setcookie('receive_flg_tmp', '', time() - COOKIE_TERM, '/');
  echo "Reset cookie";
} else if($_POST["mode"] == "set_receive_info") {
  setcookie('receive_flg', $_POST["receive_flg"], time() + COOKIE_TERM, '/');
  setcookie('receive_flg_tmp', $_POST["receive_flg_tmp"], time() + COOKIE_TERM, '/');
} else if($_POST["mode"] == "set_receive_info_tmp") {
  setcookie('receive_flg_tmp', $_POST["receive_flg_tmp"], time() + COOKIE_TERM, '/');
} else if($_POST["mode"] == "set_base_info") {
  setcookie('start_date', $_POST["start_date"], time() + COOKIE_TERM, '/');
  setcookie('end_date', $_POST["end_date"], time() + COOKIE_TERM, '/');
  setcookie('rental_term', $_POST["rental_term"], time() + COOKIE_TERM, '/');
} else if($_POST["mode"] == "set_deliv_info") {
  setcookie('delivery_date', $_POST["delivery_date"], time() + COOKIE_TERM, '/');
  setcookie('delivery_time', $_POST["delivery_time"], time() + COOKIE_TERM, '/');
  setcookie('delivery_time_str', $_POST["delivery_time_str"], time() + COOKIE_TERM, '/');
} else if($_POST["mode"] == "set_cart_info") {
  setcookie('rental_flg', $_POST["rental_flg"], time() + COOKIE_TERM, '/');
  setcookie('suitcase_flg', $_POST["suitcase_flg"], time() + COOKIE_TERM, '/');
  setcookie('sale_flg', $_POST["sale_flg"], time() + COOKIE_TERM, '/');
  setcookie('extension_flg', $_POST["extension_flg"], time() + COOKIE_TERM, '/');
} else if($_POST["mode"] == "get_base_info") {
  $now_hh = date("H");
  $flg17 = 0;
  // $fast_date = date("Y/m/d");
  $fast_date = date("Y/m/d", strtotime("-1 day"));
  $fast_sale_date = date("Y/m/d", strtotime("1 day"));
  if($now_hh > 16) {
  	$flg17 = 1;
    // $fast_date = date("Y/m/d", strtotime("1 day"));
    $fast_date = date("Y/m/d");
    $fast_sale_date = date("Y/m/d", strtotime("2 day"));
  }
  $flg19 = 0;
  if($now_hh > 18) {
  	$flg19 = 1;
  }

	$arr = array(
				"flg17" => $flg17,
				"flg19" => $flg19,
				"start_date" => $_COOKIE["start_date"],
				"end_date" => $_COOKIE["end_date"],
				"rental_term" => $_COOKIE["rental_term"],
				"delivery_date" => $_COOKIE["delivery_date"],
				"delivery_time" => $_COOKIE["delivery_time"],
				"delivery_time_str" => $_COOKIE["delivery_time_str"],
				"fast_date" => $fast_date,
				"rental_flg" => $_COOKIE["rental_flg"],
				"suitcase_flg" => $_COOKIE["suitcase_flg"],
				"sale_flg" => $_COOKIE["sale_flg"],
				"fast_sale_date" => $fast_sale_date,
				"extension_flg" => $_COOKIE["extension_flg"],
				"receive_flg" => $_COOKIE["receive_flg"],
				"receive_flg_tmp" => $_COOKIE["receive_flg_tmp"],
				);

//	echo "<pre>"; print_r($arr); echo "</pre>";
	print_r(json_encode($arr));
} else if($_POST["mode"] == "check_base_info") {
  $now_hh = date("H");
  $flg17 = 0;
  // $fast_date = date("Y/m/d");
  $fast_date = date("Y/m/d", strtotime("-1 day"));
  $fast_sale_date = date("Y/m/d", strtotime("1 day"));
  if($now_hh > 16) {
  	$flg17 = 1;
    // $fast_date = date("Y/m/d", strtotime("1 day"));
    $fast_date = date("Y/m/d");
    $fast_sale_date = date("Y/m/d", strtotime("1 day"));
  }
  $flg19 = 0;
  if($now_hh > 18) {
  	$flg19 = 1;
  }

	$arr = array(
				"flg17" => $flg17,
				"flg19" => $flg19,
				"start_date" => $_COOKIE["start_date"],
				"end_date" => $_COOKIE["end_date"],
				"rental_term" => $_COOKIE["rental_term"],
				"delivery_date" => $_COOKIE["delivery_date"],
				"delivery_time" => $_COOKIE["delivery_time"],
				"delivery_time_str" => $_COOKIE["delivery_time_str"],
				"fast_date" => $fast_date,
				"rental_flg" => $_COOKIE["rental_flg"],
				"suitcase_flg" => $_COOKIE["suitcase_flg"],
				"sale_flg" => $_COOKIE["sale_flg"],
				"fast_sale_date" => $fast_sale_date,
				"extension_flg" => $_COOKIE["extension_flg"],
				"receive_flg" => $_COOKIE["receive_flg"],
				"receive_flg_tmp" => $_COOKIE["receive_flg_tmp"],
				);

	echo "<pre>"; print_r($arr); echo "</pre>";
} else if($_POST["mode"] == "get_shortest_deliv") {
  $day0_00 = date("U", strtotime(date("Y/m/d")." 00:00:00"));
  $date = $day0_00 + (86400 * $_POST["start_minDate"]);
  $now_hh = date("H");
  if($now_hh > 16) {
    $date = $date + 86400;
  }
  $date_str = date("n月j日", $date);

	$arr = array(
			"date_str"=>$date_str,
				);

//	echo "<pre>"; print_r($arr); echo "</pre>";
	print_r(json_encode($arr));
}

?>
