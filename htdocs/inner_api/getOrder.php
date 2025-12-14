<?php
if($_POST["rdm_code"] == "skhar10dfkGo9Afhhao15djHs") {
  require_once(dirname(__FILE__)."/../../common/config.php");
  list($flg, $data_arr) = geteSIMData($_POST["order_id"]);
  print_r(json_encode($data_arr));
}
?>
