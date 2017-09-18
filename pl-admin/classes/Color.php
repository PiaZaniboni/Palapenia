
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
     * Initial constructor.
     *
     * @param integer $idColor
     * @param integer $color
     * @return null
     */
	public function __construct($idColor, $color, $initial){
		$this->idColor = $idColor;
		$this->color = $color;
        $this->initial = $initial;
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

}

?>
