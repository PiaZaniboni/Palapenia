
<?php

class Color {

	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idColor;

	/**
     * Color entity.
     *
     * @var string
     */
	 private $color;

     private $initial;

	 /**
     * Entity frame file.
     *
     * @var blob
     */
     private $frameColor;

     /**
     * Entity frame type.
     *
     * @var string
     */
     private $frameType;

	/**
     * Initial constructor.
     *
     * @param integer $idColor
     * @param integer $color
     * @return null
     */
	public function __construct($idColor, $color, $initial, $frameColor, $frameType){
		$this->idColor = $idColor;
		$this->color = $color;
        $this->initial = $initial;
		$this->frameColor = $frameColor;
		$this->frameType = $frameType;
     }

	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdColor(){
		return $this->idColor;
	}

	/**
     * Get the entity's color.
     *
     * @return string
     */
	public function getColor(){
		return $this->color;
	}

     /**
     * Get the entity's initial.
     *
     * @return string
     */
     public function getInitial(){
          return $this->initial;
     }

	 /**
	 * Get the entity's frame file.
	 *
	 * @return blob
	 */
	 public function getFrameColor(){
		  return $this->frameColor;
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
