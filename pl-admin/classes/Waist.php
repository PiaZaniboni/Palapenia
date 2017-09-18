
<?php

class Waist {

	private $idWaist;
	private $idCategory;
	private $waist;

	public function __construct($idWaist, $idCategory, $waist){
		$this->idWaist = $idWaist;
		$this->idCategory = $idCategory;
		$this->waist = $waist;
	}
	
	public function getIdWaist(){
		return $this->idWaist;
	}

	public function getIdCategory(){
		return $this->idCategory;
	}

	public function getWaist(){
		return $this->waist;
	}

}
