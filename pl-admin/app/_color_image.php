<?php

require_once("_main2.php");

$colorImage = getColorImage($_GET["id_color_image"]);
header("Content-type: " . $colorImage["type_image"]);
echo $colorImage["color_image"];

?>
