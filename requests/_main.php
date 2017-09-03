<?php

/**
 * Connect to the database.
 *
 * @return null
 */
function connect(){
	if($_SERVER["HTTP_HOST"] === "localhost"){
		return mysqli_connect("localhost", "root", "", "palapenia-db");
	} else {
		return mysqli_connect("localhost", "", "", "");
	}
	/*if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}*/
}

/**
 * Make a sql query to the database.
 *
 * @param string $sql
 * @return integer
 */
function query($sql){
	$connection = connect();
	$res = mysqli_query($connection, $sql);
	mysqli_close($connection);
	return $res;
}

/**
 * Free the last query made to the database.
 *
 * @param integer $res
 * @return null
 */
function free($res){
	mysqli_free_result($res);
}

if ($handle = opendir('_temp')) {
    while (false !== ($entry = readdir($handle))) {
		if(!is_dir($entry)){
			unlink("_temp/" . "$entry");
		}
	}
    closedir($handle);
}

/**
 * Summarize a text to a certain length of characters.
 *
 * @param string $txt
 * @param integer $charactersCount
 * @return string
 */
function summarize($txt, $charactersCount = 100){
	if(strlen($txt) > $charactersCount){
		return substr($txt, 0, strrpos(substr($txt, 0, $charactersCount), ' ')) . "...";
	} else {
		return $txt;
	}
}

/**
 * Generate a ramdon string.
 *
 * @param string $txt
 * @param integer $charactersCount
 * @return string
 */
function generateRandomString($length = 100){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for($i = 0; $i < $length; $i++){
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Get the extension of a file.
 *
 * @param string $txt
 * @param integer $charactersCount
 * @return string
 */
function getExtension($tipo){
	$extension = str_replace("image/", '.', $tipo);
	return $extension;
}

/**/

require_once("pl-admin/classes/Product.php");
require_once("pl-admin/classes/ProductImage.php");
require_once("pl-admin/classes/Category.php");
require_once("pl-admin/classes/Subcategory.php");

/**
 * Get all the products saved in the database.
 *
 * @return array
 */
function getProducts($idSubcategory){
	$products = array();
	//$sql = "SELECT * FROM product WHERE price_sale = 0 OR price_sale = null OR price_sale = '' ORDER BY id_product DESC";
	$sql = "SELECT product.* FROM product NATURAL JOIN pr_ca_su_wa_st WHERE id_subcategory = '" . $idSubcategory . "' AND (price_sale = 0 OR price_sale = null OR price_sale = '') GROUP BY id_product";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$products[] = new Product (
			$row['id_product'],
			$row['id_category'],
			$row['name'],
			$row['description'],
			$row['price'],
			$row['price_sale'],
			"", ""/*,
			$row['frame_product'],
			$row['frame_type']*/
		);
	}
	free($res);
	return $products;
}

/**
 * Get all the categories saved in the database.
 *
 * @return array
 */
function getCategories(){
	$categories = array();
	$sql = "SELECT * FROM category ORDER BY id_category ASC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$categories[] = new Category (
			$row['id_category'],
			$row['category']
		);
	}
	free($res);
	return $categories;
}

/**
 * Get all the sub-categories saved in the database.
 *
 * @return array
 */
function getSubcategories(){
	$subcategories = array();
	$sql = "SELECT * FROM subcategory ORDER BY id_subcategory ASC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$subcategories[] = new Subcategory (
			$row['id_subcategory'],
			$row['id_category'],
			$row['subcategory']
		);
	}
	free($res);
	return $subcategories;
}


/** LOOKBOOK  **/
require_once("pl-admin/classes/Lookbook.php");
require_once("pl-admin/classes/LookbookImage.php");

/**
 * Get all the Lookbook saved in the database.
 *
 * @return array
 */
function getLookbooks(){
	$lookbooks = array();

	$sql = "SELECT * FROM lookbook ORDER BY id_lookbook ASC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$lookbooks[] = new Lookbook (
			$row['id_lookbook'],
			$row['name'],
			$row['coleccion'],
			$row['description'],
			"", ""

		);
	}
	free($res);
	return $lookbooks;
}


?>
