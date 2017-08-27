
<?php

class Lookbook {

	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idLookbook;

	/**
     * Entity's name.
     *
     * @var string
     */
	private $name;

	/**
	* Entity's coleccion.
	*
	* @var string
	*/
	private $coleccion;

     /**
     * Entity's description.
     *
     * @var string
     */
     private $description;

     /**
     * Entity frame file.
     *
     * @var blob
     */
     private $frameLookbook;

     /**
     * Entity frame type.
     *
     * @var string
     */
     private $frameType;

	/**
     * Initial constructor.
     *
     * @param integer $idLookbook
     * @param string  $name
     * @return null
     */
	public function __construct($idLookbook, $name, $coleccion, $description, $frameLookbook, $frameType){
		$this->idLookbook = $idLookbook;
		$this->name = $name;
					$this->coleccion = $coleccion;
          $this->description = $description;
          $this->frameLookbook = $frameLookbook;
          $this->frameType = $frameType;
     }

	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdLookbook(){
		return $this->idLookbook;
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
	* Get the entity's coleccion.
	*
	* @return string
	*/
	public function getColeccion(){
			 return $this->coleccion;
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
     * Get the entity's frame file.
     *
     * @return blob
     */
     public function getFrameLookbook(){
          return $this->frameLookbook;
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
