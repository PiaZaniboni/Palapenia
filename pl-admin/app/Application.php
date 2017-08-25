
<?php

require_once("app/DB.php");
require_once("app/functions.php");

class Application {
	
	/**
     * PHP connection.
     *
     * @var DB
     */
	private $DB;

	/**
     * Petition controller.
     *
     * @var string
     */
	private $petitionController = "";

	/**
     * Petition action.
     *
     * @var string
     */
	private $petitionAction = "";

	/**
     * Actual controller's name.
     *
     * @var string
     */
	private $actualControllerName = "";

	/**
     * Actual controller.
     *
     * @var string
     */
	private $actualController;
	
	/**
     * Analyze the petition of the URL.
     *
     * @return null
     */
	private function analyzePetition(){
		
		if(isset($_GET['c'])){
			if($_GET['c'] === "system"){

				if(isset($_SESSION['logged_user'])){
					if($_GET['a'] === "login"){
						$this->petitionController = DEFAULT_CONTROLLER;
						$this->petitionAction = "list";
					} else {
						$this->petitionController = $_GET['c'];
						$this->petitionAction = $_GET['a'];	
					}
				} else {
					$this->petitionController = $_GET['c'];
					$this->petitionAction = $_GET['a'];	
				}

			} else {

				if(isset($_SESSION['logged_user'])){
					$this->petitionController = $_GET['c'];
					if(isset($_GET['a'])){
						$this->petitionAction = $_GET['a'];	
					} else {
						$this->petitionAction = "list";	
					}					
				} else {
					$this->petitionController = "system";
					$this->petitionAction = "login";
				}

			}
		} else {

			if(isset($_SESSION['logged_user'])){
				$this->petitionController = DEFAULT_CONTROLLER;
				$this->petitionAction = "list";
			} else {
				$this->petitionController = "system";
				$this->petitionAction = "login";
			}

		}
		
		$this->createController();
		
	}

	/**
     * Create the actual controller.
     *
     * @return null
     */
	private function createController(){
		$this->actualControllerName = $this->analyzePetitionController($this->petitionController) . "Controller";
		require_once("controllers/" . $this->actualControllerName . ".php");
		$this->actualController = new $this->actualControllerName($this->petitionController, $this->petitionAction);
	}
	
	/**
     * Analyze the petition's controller.
     *
     * @param string $petitionController
     * @return string
     */
	private function analyzePetitionController($petitionController){
		$arr = explode("_", $petitionController);
		$petitionControllerAux = "";
		for($i = 0; $i < count($arr); $i++){
			$petitionControllerAux = $petitionControllerAux . ucfirst($arr[$i]);
		}
		return $petitionControllerAux;
	}
	
	/**
     * Clean the temp files.
     *
     * @return null
     */
	private function clean(){
		if ($handle = opendir('_temp')) {
			while (false !== ($entry = readdir($handle))) {
				if(!is_dir($entry)){
					unlink("_temp/" . "$entry");
				}
			}
			closedir($handle);
		}
	}
	
	/**
     * Initialize the DB.
     *
     * @return null
     */
	private function initializeDB(){
		$this->DB = new DB();
	}
	
	/**
     * Run the application.
     *
     * @return null
     */
	public function run(){
		$this->clean();
		$this->initializeDB();
		$this->clean();
		$this->analyzePetition();	
	}
	
}

?>
