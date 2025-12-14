<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

$result = 1;
$err = 0;
$term_from = date("U", strtotime($_POST["start_date"]." 00:00:00"));
$term_to = date("U", strtotime($_POST["end_date"]." 00:00:00"));
$term = ((intval($term_to) - intval($term_from)) / 86400);

$arr = array(
			"term"=>$term,
			);

//	echo "<pre>"; print_r($arr); echo "</pre>";
echo json_encode($arr);

?>
