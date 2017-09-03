<?php

/**
 * Connect to the database.
 *
 * @return null
 */
function connect(){
	if($_SERVER["HTTP_HOST"] === "localhost"){
		return mysqli_connect("localhost", "root", "", "palapenia-db");
	}else if($_SERVER["HTTP_HOST"] === "localhost:8888"){
		return mysqli_connect("localhost", "root", "root", "palapenia-db");
	}else {
		return mysqli_connect("localhost", "cw000502_ensimis", "valaleSE92", "cw000502_ensimis");
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

/**
 * Get a product image saved in the database.
 *
 * @param integer $idProductImage
 * @return array
 */
function getProductImage($idProductImage){
	$sql = "SELECT * FROM product_image WHERE id_product_image = '" . $idProductImage . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$productImage = array(
		"id_product_image" => $row['id_product_image'],
		"id_product" => $row["id_product"],
		"product_image" => $row['product_image'],
		"type_image" => $row['type_image']
	);
	free($res);
	return $productImage;
}

/**
 * Get a lookbook image saved in the database.
 *
 * @param integer $idLookbookImage
 * @return array
 */
function getLookbookImage($idLookbookImage){
	$sql = "SELECT * FROM lookbook_image WHERE id_lookbook_image = '" . $idLookbookImage . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$lookbookImage = array(
		"id_lookbook_image" => $row['id_lookbook_image'],
		"id_lookbook" => $row["id_lookbook"],
		"lookbook_image" => $row['lookbook_image'],
		"type_image" => $row['type_image']
	);
	free($res);
	return $lookbookImage;
}

?>
