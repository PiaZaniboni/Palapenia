<?php

require_once("_main.php");

$waists = getWaists($_GET["id_category"]);

$status = "Success";
$arr = json_encode(array(
	"status" => $status,
	"waists" => $waists
));

echo $arr;

?>
