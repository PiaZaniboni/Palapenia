
<?php

require_once("controllers/Controller.php");
require_once("classes/Color.php");
require_once("classes/ColorImage.php");
require_once("classes/Product.php");

class ColorController extends Controller {

	/**
     * Actual model's name.
     *
     * @var string
     */
	public $actualModelName = "ColorModel"; //Overload

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

				$colors = $this->actualModel->getColors();

				$this->createView($this->petitionAction);
				$this->actualView->render($colors);

			break;

			/**
		     *
		     */
			case 'add':

				if(empty($_POST)){

					$this->createModel();

					$this->createView($this->petitionAction);
					$this->actualView->render();

				} else {

					$this->createModel();

					$color = new Color(
						"",
						$_POST['color'],
						$_POST['initial'],
						"",
						""
					);

					$res = $this->actualModel->addColor($color);
					$lastId = getLastId("color");
					$arrayFiles = $_FILES["color_image"];

					//var_dump($arrayFiles);
					//die ();

					if($res){
						$products = $this->actualModel->getProducts();

						foreach($products as $product){
							if($product->getIdProduct() !== '0'){
								$prCaWaCoSt = array(
									"id_product" => $product->getIdProduct(),
									"id_category" => $product->getIdCategory(),
									"id_waist" => 1,
									"id_color" => $lastId,
									"stock" => 0
								);
								$this->actualModel->addStockProduct($prCaWaCoSt);

								$prCaWaCoSt = array(
									"id_product" => $product->getIdProduct(),
									"id_category" => $product->getIdCategory(),
									"id_waist" => 2,
									"id_color" => $lastId,
									"stock" => 0
								);
								$this->actualModel->addStockProduct($prCaWaCoSt);

								$prCaWaCoSt = array(
									"id_product" => $product->getIdProduct(),
									"id_category" => $product->getIdCategory(),
									"id_waist" => 3,
									"id_color" => $lastId,
									"stock" => 0
								);
								$this->actualModel->addStockProduct($prCaWaCoSt);

								$prCaWaCoSt = array(
									"id_product" => $product->getIdProduct(),
									"id_category" => $product->getIdCategory(),
									"id_waist" => 4,
									"id_color" => $lastId,
									"stock" => 0
								);
								$this->actualModel->addStockProduct($prCaWaCoSt);
							}
						}
					}

					if($res && $arrayFiles){
						for($i = 0; $i < count($arrayFiles["name"]); $i++){
							if($arrayFiles["error"][$i] === 0){
								if($this->actualModel->validateColorImage(
									$arrayFiles["name"][$i],
									$arrayFiles["type"][$i]
								)){
									$this->actualModel->addColorImage(
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

					$color = $this->actualModel->getColor($_GET["id_color"]);

					$this->createView($this->petitionAction);
					$this->actualView->render($color);

				} else {

					$this->createModel();

					$color = new Color(
						$_GET['id_color'],
						$_POST['color'],
						$_POST['initial']
					);

					$res = $this->actualModel->editColor($color);

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

				$this->actualModel->deleteColorGallery($_GET["id_color"]);
				$this->actualModel->deleteColor($_GET['id_color']);
				$this->actualModel->deleteColorStock($_GET['id_color']);

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();

			break;

			/**
			 *
			 */
			case 'edit_gallery':

				$this->createModel();

				$gallery = $this->actualModel->getGallery($_GET["id_color"]);

				$this->createView("Edit_Gallery", true); //Corregir
				$this->actualView->render($gallery);

			break;

			/**
			 *
			 */
			case 'edit_image':

				$this->createModel();

				$color = $this->actualModel->getColor($_GET["id_color"]);

				$this->createView("Edit_Image", true); //Corregir
				$this->actualView->render($color);

			break;

			/**
			 *
			 */
			case 'add_gallery':

				$this->createModel();

				$arrayFiles = $_FILES["color_image"];

				if($arrayFiles){
					for($i = 0; $i < count($arrayFiles["name"]); $i++){
						if($arrayFiles["error"][$i] === 0){
							if($this->actualModel->validateColorImage(
								$arrayFiles["name"][$i],
								$arrayFiles["type"][$i]
							)){
								$this->actualModel->addColorImage(
									$arrayFiles["tmp_name"][$i],
									$arrayFiles["type"][$i],
									$_GET["id_color"]
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

				$color = $this->actualModel->getColor($_GET["id_color"]);
				$arrayFiles = $_FILES["frame_color"];

				if($arrayFiles){
					if($arrayFiles["error"] === 0){
						if($this->actualModel->validateFrameColor(
							$arrayFiles["name"],
							$arrayFiles["type"]
						)){
							$this->actualModel->addFrameColor(
								$arrayFiles["tmp_name"],
								$arrayFiles["type"],
								$_GET["id_color"]
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

				$this->actualModel->deleteColorImage($_GET["id_color_image"]);

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();

			break;

			/**
			 *
			 */
			case 'delete_image':

				$this->createModel();

				$this->actualModel->deleteFrameColor($_GET["id_color"]);
				$color = $this->actualModel->getColor($_GET["id_color"]);

				$this->createView("Edit_Image", true); //Corregir
				$this->actualView->render($color);

			break;


		}//

	}

}

?>
