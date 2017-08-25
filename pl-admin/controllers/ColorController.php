
<?php

require_once("controllers/Controller.php");
require_once("classes/Color.php");
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
						$_POST['initial']
					);
					
					$res = $this->actualModel->addColor($color);
					$lastId = getLastId("color");

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
				
				$this->actualModel->deleteColor($_GET['id_color']);
				$this->actualModel->deleteColorStock($_GET['id_color']);

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();
				
			break;

		}
		
	}

}

?>
