
<?php

class ColorImage {

	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idColorImage;

	/**
     * External entity ID.
     *
     * @var integer
     */
	private $idColor;

	/**
     * Image file.
     *
     * @var string
     */
	private $ColorImage;

     /**
     * Image type.
     *
     * @var string
     */
     private $typeImage;

	/**
     * Initial constructor.
     *
     * @param integer $idColorImage
     * @param integer $idColor
     * @param string  $ColorImage
     * @param string  $typeImage
     * @return null
     */
	public function __construct($idColorImage, $idColor, $ColorImage, $typeImage){
		$this->idColorImage = $idColorImage;
		$this->idColor = $idColor;
		$this->ColorImage = $ColorImage;
          $this->typeImage = $typeImage;
     }

	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdColorImage(){
		return $this->idColorImage;
	}

	/**
     * Get the entity's ID.
     *
     * @return string
     */
	public function getIdColor(){
		return $this->idColor;
	}

	/**
     * Get the entity image file.
     *
     * @return string
     */
	public function getColorImage(){
		return $this->ColorImage;
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
