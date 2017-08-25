
<?php

class Subcategory {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idSubcategory;

     /**
     * ID Category entity
     *
     * @var integer
     */
     private $idCategory;

	/**
     * Subcategory entity.
     *
     * @var string
     */
	private $subcategory;

	/**
     * Initial constructor.
     *
     * @param integer $idSubcategory
     * @param integer $subcategory
     * @return null
     */
	public function __construct($idSubcategory, $idCategory, $subcategory){
		$this->idSubcategory = $idSubcategory;
          $this->idCategory = $idCategory;
		$this->subcategory = $subcategory;
     }
	
	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdSubcategory(){
		return $this->idSubcategory;	
	}

     /**
     * Get the entity ID.
     *
     * @return integer
     */
     public function getIdCategory(){
          return $this->idCategory;     
     }

	/**
     * Get the entity's subcategory.
     *
     * @return string
     */
	public function getSubcategory(){
		return $this->subcategory;	
	}

}

?>
