
<?php

class ProductModel {

	/**
     * Get all the products saved in the database.
     *
     * @return array
     */
	public function getProducts(){
		$products = array();
		$sql = "SELECT * FROM product WHERE price_sale = 0 OR price_sale = null OR price_sale = '' ORDER BY id_product DESC";
		$res = DB::query($sql);
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
		DB::free($res);
		return $products;
	}

	/**
     * Get a product saved in the database.
     *
     * @param integer $idProduct
     * @return Product
     */
	public function getProduct($idProduct){
		$sql = "SELECT * FROM product WHERE id_product = '" . $idProduct . "'";
		$res = DB::query($sql);
		$row = mysqli_fetch_assoc($res);
		$product = new Product (
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
		DB::free($res);
		return $product;
	}

	/**
     * Get all the products saved in the database.
     *
     * @return array
     */
	public function getProductsSale(){
		$products = array();
		$sql = "SELECT * FROM product WHERE price_sale != '' OR price_sale != null OR price_sale != '0' ORDER BY id_product DESC";
		$res = DB::query($sql);
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
		DB::free($res);
		return $products;
	}

	/**
     * Add a product to the database.
     *
     * @param Product $product
     * @return integer
     */
	public function addProduct(Product $product){
		$sql = "INSERT INTO product (
			id_category,
			name,
			description,
			price,
			price_sale
		) VALUES ('" .
			$product->getIdCategory() . "', '" .
			replaceCharacters($product->getName()) . "', '" .
			replaceCharacters($product->getDescription()) . "', '" .
			$product->getPrice() . "', '" .
			$product->getPriceSale() .
		"')";
		return DB::query($sql);
	}

	/**
     * Modify a product saved in the database.
     *
     * @param Product $product
     * @return integer
     */
	public function editProduct(Product $product){
		$sql = "UPDATE product
			SET id_product = '" . $product->getIdProduct() .
			"', id_category = '" . $product->getIdCategory() .
			"', name = '" . replaceCharacters($product->getName()) .
			"', description = '" . replaceCharacters(strip_tags($product->getDescription())) .
			"', price = '" . $product->getPrice() .
			"', price_sale = '" . $product->getPriceSale() .
			"' WHERE id_product = '" . $product->getIdProduct() . "'";
		return DB::query($sql);
	}

	/**
     * Delete a product saved in the database.
     *
     * @param integer $idProduct
     * @return integer
     */
	public function deleteProduct($idProduct){
		$sql = "DELETE FROM product WHERE id_product = '" . $idProduct . "'";
		return DB::query($sql);
	}

	/**
     * Get all the colors saved in the database.
     *
     * @return array
     */
	public function getColors(){
		$colors = array();
		$sql = "SELECT * FROM color ORDER BY id_color ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$colors[] = new Color (
				$row['id_color'],
				$row['color'],
				$row['initial'],
				"", ""		
			);
		}
		DB::free($res);
		return $colors;
	}

	/**
     * Add a product to the database.
     *
     * @param Product $product
     * @return integer
     */
	public function addStockProduct($prCaWaCoSt){
		$sql = "INSERT INTO pr_ca_wa_co_st (
			id_product,
			id_category,
			id_waist,
			id_color,
			stock
		) VALUES ('" .
			$prCaWaCoSt["id_product"] . "', '" .
			$prCaWaCoSt["id_category"] . "', '" .
			$prCaWaCoSt["id_waist"] . "', '" .
			$prCaWaCoSt["id_color"] . "', '" .
			$prCaWaCoSt["stock"] .
		"')";
		return DB::query($sql);
	}

	/**
     * Add a product to the database.
     *
     * @param Product $product
     * @return integer
     */
	/*public function addStockProduct($prCaWaCoSt){
		$sql = "INSERT INTO pr_ca_su_wa_st (
			id_product,
			id_category,
			id_subcategory,
			id_waist,
			stock
		) VALUES ('" .
			$prCaWaCoSt["id_product"] . "', '" .
			$prCaWaCoSt["id_category"] . "', '" .
			$prCaWaCoSt["id_subcategory"] . "', '" .
			$prCaWaCoSt["id_waist"] . "', '" .
			$prCaWaCoSt["stock"] .
		"')";
		return DB::query($sql);
	}*/

	public function getStockProduct($idProduct){
		$stock = array();
		$sql = "SELECT * FROM pr_ca_wa_co_st WHERE id_product = '" . $idProduct . "'";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$stock[] = array(
				"id_product" => $row['id_product'],
				"id_category" => $row['id_category'],
				"id_waist" => $row['id_waist'],
				"id_color" => $row['id_color'],
				"stock" => $row['stock']
			);
		}
		DB::free($res);
		return $stock;
	}

	/**
     * Delete a product saved in the database.
     *
     * @param integer $idProduct
     * @return integer
     */
	public function deleteStockProduct($idProduct){
		$sql = "DELETE FROM pr_ca_wa_co_st WHERE id_product = '" . $idProduct . "'";
		return DB::query($sql);
	}

	/**
     * Get all the categories saved in the database.
     *
     * @return array
     */
	public function getCategories(){
		$categories = array();
		$sql = "SELECT * FROM category ORDER BY id_category ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$categories[] = new Category (
				$row['id_category'],
				$row['category']
			);
		}
		DB::free($res);
		return $categories;
	}

	/**
     * Get all the categories saved in the database.
     *
     * @return array
     */
	/*public function getSubcategories(){
		$subcategories = array();
		$sql = "SELECT * FROM subcategory ORDER BY id_subcategory ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$subcategories[] = new Subcategory (
				$row['id_subcategory'],
				$row['id_category'],
				$row['subcategory']
			);
		}
		DB::free($res);
		return $subcategories;
	}*/

	/**
     * Get all the waists saved in the database by subcategory.
     *
     * @return array
     */
	/*public function getWaistsByIdCategory($idCategory){
		$waists = array();
		$sql = "SELECT * FROM waist WHERE id_category = '" . $idCategory . "' ORDER BY id_waist ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$waists[] = new Waist (
				$row['id_waist'],
				$row['id_category'],
				$row['waist']
			);
		}
		DB::free($res);
		return $waists;
	}*/

	/**
     * Get the gallery linked to a product.
     *
     * @param integer $idProduct
     * @return array
     */
	public function getGallery($idProduct){
		$gallery = array();
		$sql = "SELECT * FROM product_image
			WHERE id_product = '" . $idProduct . "'
			ORDER BY id_product_image ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$gallery[] = new ProductImage(
				$row['id_product_image'],
				$row["id_product"],
				$row['product_image'],
				$row['type_image']);
		}
		DB::free($res);
		return $gallery;
	}

	/**
     * Verify and validate the extension of the uploaded file.
     *
     * @param string $title
     * @param string $type
     * @return boolean
     */
	public function validateProductImage($title, $type){
		$allowedExtensions = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
		$temp = explode(".", $title);
		$extension = end($temp);
		if((($type === "image/gif") ||
			($type === "image/jpeg") ||
			($type === "image/jpg") ||
			($type === "image/pjpeg") ||
			($type === "image/x-png") ||
			($type === "image/png")) &&
			in_array($extension, $allowedExtensions)){
			return true;
		} else {
			return false;
		}
	}

	/**
     * Add a image to a entity
     *
     * @param mediumblob $image
     * @param string $type
     * @param integer $idProduct
     * @return boolean
     */
	public function addProductImage($image, $type, $idProduct){
		DB::connect();
		$sql = "INSERT INTO product_image (
			id_product,
			product_image,
			type_image
		) VALUES ('" .
			$idProduct . "', '" .
			mysqli_real_escape_string(DB::$connection, file_get_contents($image)) . "', '" .
			$type .
		"')";
		DB::query($sql);
	}

	/**
     * Delete a product image saved in the database.
     *
     * @param integer $idProductImage
     * @return integer
     */
	public function deleteProductImage($idProductImage){
		$sql = "DELETE FROM product_image WHERE id_product_image = '" . $idProductImage . "'";
		return DB::query($sql);
	}

	/**
     * Delete a product gallery saved in the database.
     *
     * @param integer $idProduct
     * @return integer
     */
	public function deleteProductGallery($idProduct){
		$sql = "DELETE FROM product_image WHERE id_product = '" . $idProduct . "'";
		return DB::query($sql);
	}

	/**
     * Verify and validate the extension of the uploaded frame.
     *
     * @param string $name
     * @param string $type
     * @return boolean
     */
	public function validateFrameProduct($name, $type){
		$allowedExtensions = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
		$temp = explode(".", $name);
		$extension = end($temp);
		if((($type === "image/gif") ||
			($type === "image/jpeg") ||
			($type === "image/jpg") ||
			($type === "image/pjpeg") ||
			($type === "image/x-png") ||
			($type === "image/png")) &&
			in_array($extension, $allowedExtensions)){
			return true;
		} else {
			return false;
		}
	}

	/**
     * Add a frame to a entity
     *
     * @param mediumblob $frame
     * @param string $type
     * @param integer $idProduct
     * @return boolean
     */
	public function addFrameProduct($frame, $type, $idProduct){
		DB::connect();
		$sql = "UPDATE product SET
			frame_product = '" . mysqli_real_escape_string(DB::$connection, file_get_contents($frame)) . "',
			frame_type = '" . $type .
		"' WHERE id_product = '" . $idProduct . "'";
		DB::query($sql);
	}

	/**
     * Modify a product saved in the database.
     *
     * @param Product $product
     * @return integer
     */
	public function deleteFrameProduct($idProduct){
		$sql = "UPDATE product
			SET frame_product = NULL" .
			", frame_type = ''" .
			"WHERE id_product = '" . $idProduct . "'";
		return DB::query($sql);
	}

}

?>
