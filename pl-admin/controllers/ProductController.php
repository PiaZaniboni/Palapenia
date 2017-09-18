
<?php

require_once("controllers/Controller.php");
require_once("classes/Product.php");
require_once("classes/ProductImage.php");
require_once("classes/Category.php");
require_once("classes/Color.php");
require_once("classes/Waist.php");

class ProductController extends Controller {

	/**
     * Actual model's name.
     *
     * @var string
     */
	public $actualModelName = "ProductModel"; //Overload

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

				$products["products"] = $this->actualModel->getProducts();
				$products["products_sale"] = $this->actualModel->getProductsSale();

				$this->createView($this->petitionAction);
				$this->actualView->render($products);

			break;

			/**
		     *
		     */
			case 'add':

				if(empty($_POST)){

					$this->createModel();
					$categories = $this->actualModel->getCategories();
					$colors = $this->actualModel->getColors();

					$this->createView($this->petitionAction);
					$this->actualView->render($categories, $colors);

				} else {

					$this->createModel();

					$product = new Product(
						"",
						$_POST['id_category'],
						$_POST['name'],
						$_POST['description'],
						$_POST['price'],
						$_POST['price_sale'],
						"",
						""
					);

					$res = $this->actualModel->addProduct($product);
					$lastId = getLastId("product");
					$arrayFiles = $_FILES["product_image"];

					if($res){
						$arrColors = $this->actualModel->getColors();

						foreach($arrColors as $k => $c){
								$prCaWaCoSt = array(
									"id_product" => $lastId,
									"id_category" => $_POST['id_category'],
									"id_waist" => 1,
									"id_color" => $c->getIdColor(),
									"stock" => $_POST["quantity_xs_" . $c->getInitial()]
								);
								$this->actualModel->addStockProduct($prCaWaCoSt);
							}
							foreach($arrColors as $k => $c){
								$prCaWaCoSt = array(
									"id_product" => $lastId,
									"id_category" => $_POST['id_category'],
									"id_waist" => 2,
									"id_color" => $c->getIdColor(),
									"stock" => $_POST["quantity_s_" . $c->getInitial()]
								);
								$this->actualModel->addStockProduct($prCaWaCoSt);
							}

							foreach($arrColors as $k => $c){
								$prCaWaCoSt = array(
									"id_product" => $lastId,
									"id_category" => $_POST['id_category'],
									"id_waist" => 3,
									"id_color" => $c->getIdColor(),
									"stock" => $_POST["quantity_m_" . $c->getInitial()]
								);
								$this->actualModel->addStockProduct($prCaWaCoSt);
							}

							foreach($arrColors as $k => $c){
								$prCaWaCoSt = array(
									"id_product" => $lastId,
									"id_category" => $_POST['id_category'],
									"id_waist" => 4,
									"id_color" => $c->getIdColor(),
									"stock" => $_POST["quantity_l_" . $c->getInitial()]
								);
								$this->actualModel->addStockProduct($prCaWaCoSt);
							}

					}

					if($res && $arrayFiles){
						for($i = 0; $i < count($arrayFiles["name"]); $i++){
							if($arrayFiles["error"][$i] === 0){
								if($this->actualModel->validateProductImage(
									$arrayFiles["name"][$i],
									$arrayFiles["type"][$i]
								)){
									$this->actualModel->addProductImage(
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

					$product = $this->actualModel->getProduct($_GET["id_product"]);
					$categories = $this->actualModel->getCategories();
					$stock = $this->actualModel->getStockProduct($_GET["id_product"]);
					$colors = $this->actualModel->getColors();
					//$waists = $this->actualModel->getWaistsByIdCategory($stock[0]["id_category"]);

					$this->createView($this->petitionAction);
					$this->actualView->render($categories, $product,$stock, $colors);

				} else {

					$this->createModel();

						$product = new Product(
							$_GET['id_product'],
							$_POST['id_category'],
							$_POST['name'],
							$_POST['description'],
							$_POST['price'],
							$_POST['price_sale'],
							"",
							""
						);


					$res = $this->actualModel->editProduct($product);

					if($res && $_GET["id_product"] !== '0'){

						$arrColors = $this->actualModel->getColors();
						$this->actualModel->deleteStockProduct($_GET['id_product']);

						//$waists = $this->actualModel->getWaistsByIdCategory($_POST['id_category']);

						foreach($arrColors as $k => $c){
							$prCaWaCoSt = array(
								"id_product" => $_GET['id_product'],
								"id_category" => $_POST['id_category'],
								"id_waist" => 1,
								"id_color" => $c->getIdColor(),
								"stock" => $_POST["quantity_xs_" . $c->getInitial()]
							);
							$this->actualModel->addStockProduct($prCaWaCoSt);
						}
						foreach($arrColors as $k => $c){
							$prCaWaCoSt = array(
								"id_product" => $_GET['id_product'],
								"id_category" => $_POST['id_category'],
								"id_waist" => 2,
								"id_color" => $c->getIdColor(),
								"stock" => $_POST["quantity_s_" . $c->getInitial()]
							);
							$this->actualModel->addStockProduct($prCaWaCoSt);
						}
						foreach($arrColors as $k => $c){
							$prCaWaCoSt = array(
								"id_product" => $_GET['id_product'],
								"id_category" => $_POST['id_category'],
								"id_waist" => 3,
								"id_color" => $c->getIdColor(),
								"stock" => $_POST["quantity_m_" . $c->getInitial()]
							);
							$this->actualModel->addStockProduct($prCaWaCoSt);
						}
						foreach($arrColors as $k => $c){
							$prCaWaCoSt = array(
								"id_product" => $_GET['id_product'],
								"id_category" => $_POST['id_category'],
								"id_waist" => 4,
								"id_color" => $c->getIdColor(),
								"stock" => $_POST["quantity_l_" . $c->getInitial()]
							);
							$this->actualModel->addStockProduct($prCaWaCoSt);
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
			case 'delete':

				$this->createModel();

				$this->actualModel->deleteProductGallery($_GET["id_product"]);
				$this->actualModel->deleteStockProduct($_GET['id_product']);
				$this->actualModel->deleteProduct($_GET['id_product']);

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();

			break;

			/**
		     *
		     */
			case 'edit_gallery':

				$this->createModel();

				$gallery = $this->actualModel->getGallery($_GET["id_product"]);

				$this->createView("Edit_Gallery", true); //Corregir
				$this->actualView->render($gallery);

			break;

			/**
		     *
		     */
			case 'edit_image':

				$this->createModel();

				$product = $this->actualModel->getProduct($_GET["id_product"]);

				$this->createView("Edit_Image", true); //Corregir
				$this->actualView->render($product);

			break;

			/**
		     *
		     */
			case 'add_gallery':

				$this->createModel();

				$arrayFiles = $_FILES["product_image"];

				if($arrayFiles){
					for($i = 0; $i < count($arrayFiles["name"]); $i++){
						if($arrayFiles["error"][$i] === 0){
							if($this->actualModel->validateProductImage(
								$arrayFiles["name"][$i],
								$arrayFiles["type"][$i]
							)){
								$this->actualModel->addProductImage(
									$arrayFiles["tmp_name"][$i],
									$arrayFiles["type"][$i],
									$_GET["id_product"]
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

				$product = $this->actualModel->getProduct($_GET["id_product"]);
				$arrayFiles = $_FILES["frame_product"];

				if($arrayFiles){
					if($arrayFiles["error"] === 0){
						if($this->actualModel->validateFrameProduct(
							$arrayFiles["name"],
							$arrayFiles["type"]
						)){
							$this->actualModel->addFrameProduct(
								$arrayFiles["tmp_name"],
								$arrayFiles["type"],
								$_GET["id_product"]
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

				$this->actualModel->deleteProductImage($_GET["id_product_image"]);

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();

			break;

			/**
		     *
		     */
			case 'delete_image':

				$this->createModel();

				$this->actualModel->deleteFrameProduct($_GET["id_product"]);
				$product = $this->actualModel->getProduct($_GET["id_product"]);

				$this->createView("Edit_Image", true); //Corregir
				$this->actualView->render($product);

			break;

		}

	}

}

?>
