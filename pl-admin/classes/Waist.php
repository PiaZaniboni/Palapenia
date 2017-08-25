
<?php

class Waist {
	
	private $idWaist;
	private $idSubcategory;
	private $waist;
	
	public function __construct($idWaist, $idSubcategory, $waist){
		$this->idWaist = $idWaist;
		$this->idSubcategory = $idSubcategory;
		$this->waist = $waist;
	}
	
	public function getIdWaist(){
		return $this->idWaist;	
	}

	public function getIdSubcategory(){
		return $this->idSubcategory;	
	}

	public function getWaist(){
		return $this->waist;	
	}
		
}