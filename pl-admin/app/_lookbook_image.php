<?php

require_once("_main2.php");

$lookbookImage = getLookbookImage($_GET["id_lookbook_image"]);
header("Content-type: " . $lookbookImage["type_image"]);
echo $lookbookImage["lookbook_image"];

?>
