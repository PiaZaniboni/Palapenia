<?php

require_once("_main.php");

$subcategories = getSubcategories($_GET["id_category"]);

//var_dump($subcategories);

$status = "Success";
$arr = json_encode(array(
	"status" => $status,
	"subcategories" => $subcategories
));

echo $arr;

?>