
<?php

class Category {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idCategory;

	/**
     * Category entity.
     *
     * @var string
     */
	private $category;

	/**
     * Initial constructor.
     *
     * @param integer $idCategory
     * @param integer $category
     * @return null
     */
	public function __construct($idCategory, $category){
		$this->idCategory = $idCategory;
		$this->category = $category;
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
     * Get the entity's category.
     *
     * @return string
     */
	public function getCategory(){
		return $this->category;	
	}

}

?>
