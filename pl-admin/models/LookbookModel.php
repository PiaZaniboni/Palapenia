
<?php

class LookbookModel {

	/**
     * Get all the lookbooks saved in the database.
     *
     * @return array
     */
	public function getLookbooks(){
		$lookbooks = array();
		$sql = "SELECT * FROM lookbook ORDER BY id_lookbook DESC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$lookbooks[] = new Lookbook (
				$row['id_lookbook'],
				$row['name'],
				$row['coleccion'],
				$row['description'],
				"", ""/*,
				$row['frame_product'],
				$row['frame_type']*/
			);
		}
		DB::free($res);
		return $lookbooks;
	}

	/**
     * Get a lookbook saved in the database.
     *
     * @param integer $idLooobook
     * @return lookbook
     */
	public function getLookbook($idLookbook){
		$sql = "SELECT * FROM lookbook WHERE id_lookbook = '" . $idLookbook . "'";
		$res = DB::query($sql);
		$row = mysqli_fetch_assoc($res);
		$lookbook = new Lookbook (
			$row['id_lookbook'],
			$row['name'],
			$row['coleccion'],
			$row['description'],
			"", ""/*,
			$row['frame_product'],
			$row['frame_type']*/
		);
		DB::free($res);
		return $lookbook;
	}

	/**
     * Add a lookbook to the database.
     *
     * @param Lookbook $lookbook
     * @return integer
     */
	public function addLookbook(Lookbook $lookbook){
		$sql = "INSERT INTO lookbook (
			name,
			coleccion,
			description
		) VALUES ('" .
			replaceCharacters($lookbook->getName()) . "', '" .
			replaceCharacters($lookbook->getColeccion()) . "', '" .
			replaceCharacters($lookbook->getDescription()) .
		"')";

		//die(var_dump($sql));
		return DB::query($sql);
	}

	/**
     * Modify a lookbook saved in the database.
     *
     * @param Lookbook $lookbook
     * @return integer
     */
	public function editLookbook(Lookbook $lookbook){
		$sql = "UPDATE $lookbook
			SET id_lookbook = '" . $lookbook->getIdLookbook() .
			"', name = '" . replaceCharacters($lookbook->getName()) .
			"', coleccion = '" . $lookbook->getColeccion() .
			"', description = '" . replaceCharacters(strip_tags($lookbook->getDescription())) .
			"' WHERE id_lookbook = '" . $lookbook->getIdLookbook() . "'";
		return DB::query($sql);
	}

	/**
     * Delete a lookbook saved in the database.
     *
     * @param integer $idLookbook
     * @return integer
     */
	public function deleteLookbook($idLookbook){
		$sql = "DELETE FROM lookbook WHERE id_lookbook = '" . $idLookbook . "'";
		return DB::query($sql);
	}

	/**
     * Get the gallery linked to a lookbook.
     *
     * @param integer $idLookbook
     * @return array
     */
	public function getGallery($idLookbook){
		$gallery = array();
		$sql = "SELECT * FROM lookbook_image
			WHERE id_lookbook = '" . $idLookbook . "'
			ORDER BY id_lookbook_image ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$gallery[] = new LookbookImage(
				$row['id_lookbook_image'],
				$row["id_lookbook"],
				$row['lookbook_image'],
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
	public function validateLookbookImage($title, $type){
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
     * @param integer $idLookbook
     * @return boolean
     */
	public function addLookbookImage($image, $type, $idLookbook){
		DB::connect();
		$sql = "INSERT INTO lookbook_image (
			id_lookbook,
			lookbook_image,
			type_image
		) VALUES ('" .
			$idLookbook . "', '" .
			mysqli_real_escape_string(DB::$connection, file_get_contents($image)) . "', '" .
			$type .
		"')";
		DB::query($sql);
	}

	/**
     * Delete a product image saved in the database.
     *
     * @param integer $idLookbookImage
     * @return integer
     */
	public function deleteLookbookImage($idLookbookImage){
		$sql = "DELETE FROM lookbook_image WHERE id_lookbook_image = '" . $idLookbookImage . "'";
		return DB::query($sql);
	}

	/**
     * Delete a product gallery saved in the database.
     *
     * @param integer $idProduct
     * @return integer
     */
	public function deleteLookbookGallery($idLookbook){
		$sql = "DELETE FROM lookbook_image WHERE id_lookbook = '" . $idLookbook . "'";
		return DB::query($sql);
	}

	/**
     * Verify and validate the extension of the uploaded frame.
     *
     * @param string $name
     * @param string $type
     * @return boolean
     */
	public function validateFrameLookbook($name, $type){
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
     * @param integer $idLookbook
     * @return boolean
     */
	public function addFrameLookbook($frame, $type, $idLookbook){
		DB::connect();
		$sql = "UPDATE lookbook SET
			frame_lookbook = '" . mysqli_real_escape_string(DB::$connection, file_get_contents($frame)) . "',
			frame_type = '" . $type .
		"' WHERE id_lookbook = '" . $idLookbook . "'";
		DB::query($sql);
	}

	/**
     * Modify a product saved in the database.
     *
     * @param Product $product
     * @return integer
     */
	public function deleteFrameLookbook($idLookbook){
		$sql = "UPDATE lookbook
			SET frame_lookbook = NULL" .
			", frame_type = ''" .
			"WHERE id_lookbook = '" . $idLookbook . "'";
		return DB::query($sql);
	}

}

?>
