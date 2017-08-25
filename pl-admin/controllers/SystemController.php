
<?php

require_once("controllers/Controller.php");

class SystemController extends Controller {
	
	/**
     * Actual model's name.
     *
     * @var string
     */
	public $actualModelName = "SystemModel"; //Overload
	
	/**
     * Analyze the action of the URL.
     *
     * @return null
     */
	public function analyzeAction(){ //Overload
		
		switch($this->petitionAction){
			
			case "login";

				if(empty($_POST)){
					
					$this->createView("Login");
					$this->actualView->render();

				} else {	

					$this->createModel();

					$this->actualModel->verifyUser($_POST["user"], $_POST["password"]);
					
					require_once("views/system/LoadingView.php");
					$this->redirect();
				}
			
			break;
			
			case 'logout':
			
				$this->createModel();
				
				$this->actualModel->logout();

				require_once("views/system/LoadingView.php");
				$this->redirect();
				
			break;
			
		}
		
	}

}

?>
