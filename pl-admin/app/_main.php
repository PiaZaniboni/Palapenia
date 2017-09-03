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
	} else {
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
 * Get a lookbook saved in the database.
 *
 * @param integer $idProduct
 * @return Lookbook
 */
function getLookbook($idLookbook){
	$sql = "SELECT * FROM lookbook WHERE id_lookbook = '" . $idLookbook . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$lookbook = array(
		"id_lookbook" => $row['id_lookbook'],
		"name" => $row['name'],
		"coleccion" => $row['coleccion'],
		"description" => $row['description'],
		"frame_lookbook" => $row['frame_lookbook'],
		"frame_type" => $row['frame_type']
	);
	free($res);
	return $lookbook;
}

/**
 * Get a product saved in the database.
 *
 * @param integer $idProduct
 * @return Product
 */
function getProduct($idProduct){
	$sql = "SELECT * FROM product WHERE id_product = '" . $idProduct . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$product = array(
		"id_product" => $row['id_product'],
		"id_category" => $row['id_category'],
		"name" => $row['name'],
		"description" => $row['description'],
		"waist" => $row['waist'],
		"frame_product" => $row['frame_product'],
		"frame_type" => $row['frame_type']
	);
	free($res);
	return $product;
}

function getSubcategories($idCategory){
	$subcategories = array();
	$sql = "SELECT * FROM subcategory WHERE id_category = '" . $idCategory . "' ORDER BY id_subcategory ASC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$subcategories[] = array(
			"id_subcategory" => $row['id_subcategory'],
			"id_category" => $row['id_category'],
			"subcategory" => $row['subcategory']
		);
	}
	free($res);
	return $subcategories;
}

function getWaists($idSubcategory){
	$waists = array();
	$sql = "SELECT * FROM waist WHERE id_subcategory = '" . $idSubcategory . "' ORDER BY id_waist ASC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$waists[] = array(
			"id_waist" => $row['id_waist'],
			"id_subcategory" => $row['id_subcategory'],
			"waist" => $row["waist"]
		);
	}
	free($res);
	return $waists;
}

?>
