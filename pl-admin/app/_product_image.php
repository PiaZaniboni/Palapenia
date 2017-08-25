<?php

require_once("_main2.php");

$productImage = getProductImage($_GET["id_product_image"]);
header("Content-type: " . $productImage["type_image"]);
echo $productImage["product_image"];

?>