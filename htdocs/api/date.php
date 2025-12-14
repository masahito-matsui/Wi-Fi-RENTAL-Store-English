<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

$day0_now = date("U");
$day0_00 = date("U", strtotime(date("Y/m/d")." 00:00:00"));
$day0_17 = date("U", strtotime(date("Y/m/d")." 17:00:00"));

$day1_00 = $day0_00 + 86400;
$day2_00 = $day1_00 + 86400;
$day3_00 = $day2_00 + 86400;
$day4_00 = $day3_00 + 86400;
$day5_00 = $day4_00 + 86400;
$day6_00 = $day5_00 + 86400;
$day7_00 = $day6_00 + 86400;
$day8_00 = $day7_00 + 86400;
$day9_00 = $day8_00 + 86400;
$day10_00 = $day9_00 + 86400;
$day11_00 = $day10_00 + 86400;
$day12_00 = $day11_00 + 86400;
$day13_00 = $day12_00 + 86400;
$day14_00 = $day13_00 + 86400;

//最短日として設定したい日でイコールの右を書き換える
//$day1_00：1日後、$day2_00：2日後、というルール
//17時以降は自動的に+1日される
$date = $day1_00;

if($day0_now > $day0_17) {
  $date = $date + 86400;
}

//$date_str = date("n月d日", $date);
$date_str = date("M j", $date);

$arr = array(
			"date_str"=>$date_str,
			);

//	echo "<pre>"; print_r($arr); echo "</pre>";
echo json_encode($arr);

?>
