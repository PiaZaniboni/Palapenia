<?php

require_once("_main.php");

$waists = getWaists($_GET["id_subcategory"]);

$status = "Success";
$arr = json_encode(array(
	"status" => $status,
	"waists" => $waists
));

echo $arr;

?>