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
	}  else {
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

/**
 * Get all the products saved in the database.
 *
 * @return array
 */
function getProducts($idSubcategory){
	$products = array();
	$sql = "SELECT product.* FROM product NATURAL JOIN pr_ca_su_wa_st WHERE id_subcategory = '" . $idSubcategory . "' AND (price_sale = 0 OR price_sale = null OR price_sale = '') GROUP BY id_product";
	$res = query($sql);

	while($row = mysqli_fetch_assoc($res)){
		$products[] = array(
			"id_product" => $row['id_product'],
			"id_category" => $row['id_category'],
			"name" => $row['name'],
			"description" => $row['description'],
			"price" => $row['price'],
			"price_sale" => $row['price_sale'],
			"",
			""
		);
	}
	free($res);
	return $products;
}

/**
 * Get the first image of a gallery linked to a product.
 *
 * @param integer $idProduct
 * @return array
 */
function getProductImages($idProduct){
	$productImages = array();
	$sql = "SELECT * FROM product_image
		WHERE id_product = '" . $idProduct . "'
		ORDER BY id_product_image DESC LIMIT 0, 2";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$productImages[] = array(
			"id_product_image" => $row['id_product_image'],
			"id_product" => $row["id_product"],
			"product_image" => base64_encode($row['product_image']),
			"type_image" => $row['type_image']
		);
	}
	free($res);
	return $productImages;
}

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
		$lookbooks[] = array(
			"id_lookbook" => $row['id_lookbook'],
			"name" => $row['name'],
			"coleccion" => $row['coleccion'],
			"description" => $row['description'],
			"",
			""
		);
	}
	free($res);
	return $lookbooks;
}

/**
 * Get all the images of a gallery linked to a lookbook.
 *
 * @param integer $idLookbook
 * @return array
 */
function getLookbookImages($idLookbook){
	$lookbookImages = array();
	$sql = "SELECT * FROM lookbook_image
		WHERE id_lookbook = '" . $idLookbook . "'
		ORDER BY id_lookbook_image DESC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$lookbookImages[] = array(
			"id_lookbook_image" => $row['id_lookbook_image'],
			"id_lookbook" => $row["id_lookbook"],
			"lookbook_image" => base64_encode($row['lookbook_image']),
			"type_image" => $row['type_image']
		);
	}
	free($res);
	return $lookbookImages;
}

?>
