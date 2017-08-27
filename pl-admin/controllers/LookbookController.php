
<?php

require_once("controllers/Controller.php");
require_once("classes/Lookbook.php");
require_once("classes/LookbookImage.php");
//require_once("classes/Category.php");
//require_once("classes/Subcategory.php");
//require_once("classes/Color.php");
//require_once("classes/Waist.php");

class LookbookController extends Controller {

	/**
     * Actual model's name.
     *
     * @var string
     */
	public $actualModelName = "LookbookModel"; //Overload

	/**
     * Analyze the action and determine a request.
     *
     * @return null
     */
	public function analyzeAction(){ //Overload

		switch($this->petitionAction){

			/**
		     *
		     */
			case 'list':

				$this->createModel();

				$lookbooks = $this->actualModel->getLookbooks();

				$this->createView($this->petitionAction);
				$this->actualView->render($lookbooks);

			break;

			/**
		     *
		     */
			case 'add':

				if(empty($_POST)){

					$this->createModel();
					//$lookbooks = $this->actualModel->getLookbooks();
					//$categories = $this->actualModel->getCategories();
					//$colors = $this->actualModel->getColors();

					$this->createView($this->petitionAction);
					$this->actualView->render();//?¡?¡?

				} else {

					$this->createModel();

					$lookbook = new Lookbook(
						"",
						$_POST['name'],
						$_POST['coleccion'],
						$_POST['description'],
						"",
						""
					);


					$res = $this->actualModel->addLookbook($lookbook);
					$lastId = getLastId("lookbook");
					$arrayFiles = $_FILES["lookbook_image"];

					var_dump($_POST);


					if($res && $arrayFiles){
						for($i = 0; $i < count($arrayFiles["name"]); $i++){
							if($arrayFiles["error"][$i] === 0){
								if($this->actualModel->validateLookbookImage(
									$arrayFiles["name"][$i],
									$arrayFiles["type"][$i]
								)){
									$this->actualModel->addLookbookImage(
										$arrayFiles["tmp_name"][$i],
										$arrayFiles["type"][$i],
										$lastId
									);
								}
							}
						}
					}

					$this->createLoadingView();
					$this->actualView->render();
					$this->redirect();

				}

			break;

			/**
		     *
		     */
			case 'edit':

				if(empty($_POST)){

					$this->createModel();

					$lookbook = $this->actualModel->getLookbook($_GET["id_lookbook"]);
					//$categories = $this->actualModel->getCategories();
					//$stock = $this->actualModel->getStockProduct($_GET["id_product"]);
					//$colors = $this->actualModel->getColors();

					$this->createView($this->petitionAction);
					$this->actualView->render($lookbook);

				} else {

					$this->createModel();

					$lookbook = new Lookbook(
						$_GET['id_lookbook'],
						$_POST['name'],
						$_POST['coleccion'],
						$_POST['description'],
						"",
						""
					);

					$res = $this->actualModel->editLookbook($lookbook);

					if($res){

						//$arrColors = $this->actualModel->getColors();


					}

					$this->createLoadingView();
					$this->actualView->render();
					$this->redirect();

				}

			break;

			/**
		     *
		     */
			case 'delete':

				$this->createModel();

				$this->actualModel->deleteLookbookGallery($_GET["id_lookbook"]);
				//$this->actualModel->deleteStockProduct($_GET['id_lookbook']);
				$this->actualModel->deleteLookbook($_GET['id_lookbook']);

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();

			break;

			/**
		     *
		     */
			case 'edit_gallery':

				$this->createModel();

				$gallery = $this->actualModel->getGallery($_GET["id_lookbook"]);

				$this->createView("Edit_Gallery", true); //Corregir
				$this->actualView->render($gallery);

			break;

			/**
		     *
		     */
			case 'edit_image':

				$this->createModel();

				$product = $this->actualModel->getLookbook($_GET["id_lookbook"]);

				$this->createView("Edit_Image", true); //Corregir
				$this->actualView->render($lookbook);

			break;

			/**
		     *
		     */
			case 'add_gallery':

				$this->createModel();

				$arrayFiles = $_FILES["lookbook_image"];

				if($arrayFiles){
					for($i = 0; $i < count($arrayFiles["name"]); $i++){
						if($arrayFiles["error"][$i] === 0){
							if($this->actualModel->validateLookbookImage(
								$arrayFiles["name"][$i],
								$arrayFiles["type"][$i]
							)){
								$this->actualModel->addLookbookImage(
									$arrayFiles["tmp_name"][$i],
									$arrayFiles["type"][$i],
									$_GET["id_lookbook"]
								);
							}
						}
					}
				}

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();

			break;

			/**
		     *
		     */
			case 'add_image':

				$this->createModel();

				$lookbook = $this->actualModel->getLookbook($_GET["id_lookbook"]);
				$arrayFiles = $_FILES["frame_lookbook"];

				if($arrayFiles){
					if($arrayFiles["error"] === 0){
						if($this->actualModel->validateFrameLookbook(
							$arrayFiles["name"],
							$arrayFiles["type"]
						)){
							$this->actualModel->addFrameLookbook(
								$arrayFiles["tmp_name"],
								$arrayFiles["type"],
								$_GET["id_lookbook"]
							);
						}
					}
				}

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();

			break;

			/**
		     *
		     */
			case 'delete_gallery':

				$this->createModel();

				$this->actualModel->deleteLookbookImage($_GET["id_lookbook_image"]);

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();

			break;

			/**
		     *
		     */
			case 'delete_image':

				$this->createModel();

				$this->actualModel->deleteFrameLookbook($_GET["id_lookbook"]);
				$lookbook = $this->actualModel->getLookbook($_GET["id_lookbook"]);

				$this->createView("Edit_Image", true); //Corregir
				$this->actualView->render($lookbook);

			break;

		}

	}

}

?>
