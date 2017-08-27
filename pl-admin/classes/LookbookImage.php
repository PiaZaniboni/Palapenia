
<?php

class LookbookImage {

	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idLookbookImage;

	/**
     * External entity ID.
     *
     * @var integer
     */
	private $idLookbook;

	/**
     * Image file.
     *
     * @var string
     */
	private $LookbookImage;

     /**
     * Image type.
     *
     * @var string
     */
     private $typeImage;

	/**
     * Initial constructor.
     *
     * @param integer $idLookbookImage
     * @param integer $idLookbook
     * @param string  $LookbookImage
     * @param string  $typeImage
     * @return null
     */
	public function __construct($idLookbookImage, $idLookbook, $LookbookImage, $typeImage){
		$this->idLookbookImage = $idLookbookImage;
		$this->idLookbook = $idLookbook;
		$this->LookbookImage = $LookbookImage;
          $this->typeImage = $typeImage;
     }

	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdLookbookImage(){
		return $this->idLookbookImage;
	}

	/**
     * Get the entity's ID.
     *
     * @return string
     */
	public function getIdLookbook(){
		return $this->idLookbook;
	}

	/**
     * Get the entity image file.
     *
     * @return string
     */
	public function getLookbookImage(){
		return $this->LookbookImage;
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
