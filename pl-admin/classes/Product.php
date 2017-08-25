
<?php

class Product {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idProduct;

     /**
     * Entity external ID.
     *
     * @var integer
     */
     private $idCategory;

	/**
     * Entity's name.
     *
     * @var string
     */
	private $name;

     /**
     * Entity's description.
     *
     * @var string
     */
     private $description;

      /**
     * Entity's price.
     *
     * @var string
     */
     private $price;

     /**
     * Entity frame file.
     *
     * @var blob
     */
     private $frameProduct;

     /**
     * Entity frame type.
     *
     * @var string
     */
     private $frameType;

	/**
     * Initial constructor.
     *
     * @param integer $idProduct
     * @param string  $name
     * @return null
     */
	public function __construct($idProduct, $idCategory, $name, $description, $price, $frameProduct, $frameType){
		$this->idProduct = $idProduct;
          $this->idCategory = $idCategory;
		$this->name = $name;
          $this->description = $description;
          $this->price = $price;
          $this->frameProduct = $frameProduct;
          $this->frameType = $frameType;
     }
	
	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdProduct(){
		return $this->idProduct;	
	}

     /**
     * Get the entity external ID.
     *
     * @return integer
     */
     public function getIdCategory(){
          return $this->idCategory;  
     }

	/**
     * Get the entity's name.
     *
     * @return string
     */
	public function getName(){
		return $this->name;	
	}

     /**
     * Get the entity's description.
     *
     * @return string
     */
     public function getDescription(){
          return $this->description; 
     }

     /**
     * Get the entity's price.
     *
     * @return string
     */
     public function getPrice(){
          return $this->price; 
     }

     /**
     * Get the entity's frame file.
     *
     * @return blob
     */
     public function getFrameProduct(){
          return $this->frameProduct;   
     }

     /**
     * Get the entity's frame type.
     *
     * @return string
     */
     public function getFrameType(){
          return $this->frameType;  
     }

}

?>
