<?php

require_once("_main2.php");

//echo $_GET['id_subcategory'];

$products = getProducts($_GET['id_subcategory']);
//$projectGallery = getProjectGallery($_GET['id_project']);

//var_dump($projectGallery);
//var_dump($products);

$status = "Success";
$arr = json_encode(array(
	"status" => $status,
	"products" => $products,/*
	"gallery" => $projectGallery*/
));

//var_dump($arr);

echo $arr;
    
?>