<?php

require_once("_main2.php");

$productImages = getProductImages($_GET['id_product']);

$status = "Success";
$arr = json_encode(array(
	"status" => $status,
	"product_images" => $productImages
));

echo $arr;
    
?>