
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
				$row['initial']
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
			$row['initial']
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

}

?>
