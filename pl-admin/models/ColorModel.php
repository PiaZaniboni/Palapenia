
<?php

class ColorModel {

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
     * Get a color saved in the database.
     *
     * @param integer $idColor
     * @return Color
     */
	public function getColor($idColor){
		$sql = "SELECT * FROM color WHERE id_color = '" . $idColor . "'";
		$res = DB::query($sql);
		$row = mysqli_fetch_assoc($res);
		$color = new Color (
			$row['id_color'],
			$row['color'],
			$row['initial'],
			"", ""
		);
		DB::free($res);
		return $color;
	}

	/**
     * Add a color to the database.
     *
     * @param Color $color
     * @return integer
     */
	public function addColor(Color $color){
		$sql = "INSERT INTO color (
			color,
			initial
		) VALUES ('" .
			$color->getColor() . "', '" .
			$color->getInitial() .
		"')";
		return DB::query($sql);
	}

	/**
     * Modify a color saved in the database.
     *
     * @param Color $color
     * @return integer
     */
	public function editColor(Color $color){
		$sql = "UPDATE color
			SET color = '" . $color->getColor() .
			"', initial = '" . $color->getInitial() .
			"' WHERE id_color = '" . $color->getIdColor() . "'";
		return DB::query($sql);
	}

	/**
     * Delete a color saved in the database.
     *
     * @param integer $idColor
     * @return integer
     */
	public function deleteColor($idColor){
		$sql = "DELETE FROM color WHERE id_color = '" . $idColor . "'";
		return DB::query($sql);
	}

	/**
     * Get all the products saved in the database.
     *
     * @return array
     */
	public function getProducts(){
		$products = array();
		$sql = "SELECT * FROM product ORDER BY id_product DESC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$products[] = new Product (
				$row['id_product'],
				$row['id_category'],
				$row['name'],
				$row['description'],
				$row['price'],
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
     * Delete a color stock saved in the database.
     *
     * @param integer $idColor
     * @return integer
     */
	public function deleteColorStock($idColor){
		$sql = "DELETE FROM pr_ca_wa_co_st WHERE id_color = '" . $idColor . "'";
		return DB::query($sql);
	}

	/**
	 * Get the gallery linked to a color.
	 *
	 * @param integer $idColor
	 * @return array
	 */
	public function getGallery($idColor){
		$gallery = array();
		$sql = "SELECT * FROM color_image
			WHERE id_color = '" . $idColor . "'
			ORDER BY id_color_image ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$gallery[] = new ColorImage(
				$row['id_color_image'],
				$row["id_color"],
				$row['color_image'],
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
	public function validateColorImage($title, $type){
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
	 * @param integer $idColor
	 * @return boolean
	 */
	public function addColorImage($image, $type, $idColor){
		DB::connect();
		$sql = "INSERT INTO color_image (
			id_color,
			color_image,
			type_image
		) VALUES ('" .
			$idColor . "', '" .
			mysqli_real_escape_string(DB::$connection, file_get_contents($image)) . "', '" .
			$type .
		"')";
		DB::query($sql);
	}

	/**
	 * Delete a color image saved in the database.
	 *
	 * @param integer $idColorImage
	 * @return integer
	 */
	public function deleteColorImage($idColorImage){
		$sql = "DELETE FROM color_image WHERE id_color_image = '" . $idColorImage . "'";
		return DB::query($sql);
	}

	/**
	 * Delete a color gallery saved in the database.
	 *
	 * @param integer $idColor
	 * @return integer
	 */
	public function deleteColorGallery($idColor){
		$sql = "DELETE FROM color_image WHERE id_color = '" . $idColor . "'";
		return DB::query($sql);
	}

	/**
	 * Verify and validate the extension of the uploaded frame.
	 *
	 * @param string $name
	 * @param string $type
	 * @return boolean
	 */
	public function validateFrameColor($name, $type){
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
	 * @param integer $idColor
	 * @return boolean
	 */
	public function addFrameColor($frame, $type, $idColor){
		DB::connect();
		$sql = "UPDATE color SET
			frame_color = '" . mysqli_real_escape_string(DB::$connection, file_get_contents($frame)) . "',
			frame_type = '" . $type .
		"' WHERE id_color = '" . $idColor . "'";
		DB::query($sql);
	}

	/**
	 * Modify a color saved in the database.
	 *
	 * @param Color $color
	 * @return integer
	 */
	public function deleteFrameColor($idColor){
		$sql = "UPDATE color
			SET frame_color = NULL" .
			", frame_type = ''" .
			"WHERE id_color = '" . $idColor . "'";
		return DB::query($sql);
	}

}

?>
