
<?php

class ProductImage {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idProductImage;

	/**
     * External entity ID.
     *
     * @var integer
     */
	private $idProduct;

	/**
     * Image file.
     *
     * @var string
     */
	private $ProductImage;

     /**
     * Image type.
     *
     * @var string
     */
     private $typeImage;

	/**
     * Initial constructor.
     *
     * @param integer $idProductImage
     * @param integer $idProduct
     * @param string  $ProductImage
     * @param string  $typeImage
     * @return null
     */
	public function __construct($idProductImage, $idProduct, $ProductImage, $typeImage){
		$this->idProductImage = $idProductImage;
		$this->idProduct = $idProduct;
		$this->ProductImage = $ProductImage;
          $this->typeImage = $typeImage;
     }
	
	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdProductImage(){
		return $this->idProductImage;	
	}

	/**
     * Get the entity's ID.
     *
     * @return string
     */
	public function getIdProduct(){
		return $this->idProduct;	
	}
	
	/**
     * Get the entity image file.
     *
     * @return string
     */
	public function getProductImage(){
		return $this->ProductImage;	
	}

     /**
     * Get the entity image type.
     *
     * @return string
     */
     public function getTypeImage(){
          return $this->typeImage;  
     }

}

?>
