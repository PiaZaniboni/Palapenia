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
		return mysqli_connect("localhost", "palapeni", "cs99Hi12iM", "palapeni_db");
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
 * Get all the categories saved in the database.
 *
 * @return array
 */
function getCategories(){
	$categories = array();
	$sql = "SELECT * FROM category ORDER BY id_category ASC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$categories[] = array(
			"id_category" => $row['id_category'],
			"category" => $row['category']
		);
	}
	free($res);
	return $categories;
}

/**
 * Get a category by name saved in the database.
 *
 * @return array
 */
function getCategoryId($categoryName){
	$categoryId = 0;
	$sql = "SELECT id_category FROM category WHERE category= '". $categoryName ."'";
	$res = query($sql);

	while($row = mysqli_fetch_assoc($res)){
		$categoryId = $row['id_category'] ;
	}

	free($res);
	return $categoryId;
}

/**
 * Get al category by ID saved in the database.
 *
 * @return array
 */
function getCategoryName($categoryId){
	$categoryName = "";
	$sql = "SELECT category FROM category WHERE id_category= '". $categoryId ."'";
	$res = query($sql);

	while($row = mysqli_fetch_assoc($res)){
		$categoryName = $row['category'] ;
	}

	free($res);
	return $categoryName;
}

/**
 * Get all the products saved in the database.
 *
 * @return array
 */
function getProducts($idCategory){
	$products = array();
	$sql = "SELECT product.* FROM product NATURAL JOIN pr_ca_wa_co_st WHERE id_category = '" . $idCategory . "' GROUP BY id_product";
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
 * Get all the products Sale saved in the database.
 *
 * @return array
 */
function getProductsSale(){
	$products = array();
	$sql = "SELECT product.* FROM product NATURAL JOIN pr_ca_wa_co_st WHERE (price_sale != 0 OR price_sale != null OR price_sale != '') GROUP BY id_product";
	$res = query($sql);

	while($row = mysqli_fetch_assoc($res)){
		$products[] = array(
			"id_product" => $row['id_product'],
			"id_category" => $row['id_category'],
			"name" => $row['name'],
			"description" => $row['description'],
			"price" => $row['price'],
			"price_sale" => $row['price_sale']
		);
	}
	free($res);
	return $products;
}

/**
 * Get product by id saved in the database.
 *
 * @return array
 */
function getProduct($idProduct){
	$product = array();
	$sql = "SELECT product.* FROM product WHERE id_product = '" . $idProduct . "' ";
	$res = query($sql);

	while($row = mysqli_fetch_assoc($res)){
		$product[] = array(
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
	return $product;
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
		ORDER BY id_product_image ASC LIMIT 0, 1";
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
 * Get the first image of a gallery linked to a product.
 *
 * @param integer $idProduct
 * @return array
 */
function getProductGallery($idProduct){
	$gallery = array();
	$sql = "SELECT * FROM product_image
		WHERE id_product = '" . $idProduct . "'
		ORDER BY id_product_image ASC LIMIT 0, 3";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$gallery[] = array(
			"id_product_image" => $row['id_product_image'],
			"id_product" => $row["id_product"],
			"product_image" => base64_encode($row['product_image']),
			"type_image" => $row['type_image']
		);
	}
	free($res);
	return $gallery;
}

/**
 * Get the stock saved in the database.
 *
 * @return array
 */

function getStockProduct($idProduct){
	$stock = array();
	$sql = "SELECT * FROM pr_ca_wa_co_st WHERE id_product = '" . $idProduct . "' AND stock != 0 ORDER BY id_color ASC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$stock[] = array(
			"id_product" => $row['id_product'],
			"id_category" => $row['id_category'],
			"id_waist" => $row['id_waist'],
			"id_color" => ($row["id_color"]),
			"stock" => $row['stock']
		);
	}
	free($res);
	return $stock;
}

/**
 * Get the stock saved in the database.
 *
 * @return array
 */

function getColors(){
	$colors = array();
	$sql = "SELECT * FROM color ORDER BY id_color ASC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$colors[] = array(
			"id_color" => $row['id_color'],
			"color" => $row['color'],
			"initial" => $row['initial']
		);
	}
	free($res);
	return $colors;
}

function getColorImage($idColor){
	$colorImage = array();
	$sql = "SELECT * FROM color_image WHERE id_color = '" . $idColor . "' ORDER BY id_color ASC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$colorImage[] = array(
			"id_color_image" => $row['id_color_image'],
			"id_color" => $row["id_color"],
			"color_image" => base64_encode($row['color_image']),
			"type_image" => $row['type_image']
		);
	}
	free($res);
	return $colorImage;
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
