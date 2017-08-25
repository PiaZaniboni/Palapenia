
<?php

class Controller {
	
	/**
     * Controller petition's name.
     *
     * @var string
     */
	public $petitionController = "";

	/**
     * Action petition's name.
     *
     * @var string
     */
	public $petitionAction = "";

	/**
     * Actual model's name.
     *
     * @var string
     */
	public $actualModelName = ""; // Overload

	/**
     * Actual model.
     *
     * @var 
     */
	public $actualModel;

	/**
     * Actual view's name.
     *
     * @var string
     */
	public $actualViewName = "";

     /**
     * Actual view.
     *
     * @var string
     */
     public $actualView = "";
	
	/**
     * Constructor controller.
     *
     * @param string $petitionController
     * @param string $petitionAction
     * @return null
     */
	public function __construct($petitionController, $petitionAction){
		$this->petitionController = $petitionController;
		$this->petitionAction = $petitionAction;
		$this->analyzeAction();
	}
	
	/**
     * Analyze the action and determine a request.
     *
     * @return null
     */
	public function analyzeAction(){ // Overload
		
	}
	
	/**
     * Create the model.
     *
     * @return null
     */
	public function createModel(){
		require_once("models/" . $this->actualModelName .".php");
		$this->actualModel = new $this->actualModelName();
	}
	
     /**
     * Create the view.
     *
     * @return null
     */
     public function createView($petitionAction, $underscored = false){
          if($underscored){
               $this->actualViewName = str_replace("_", "", $petitionAction) . "View";
          } else {
               $this->actualViewName = $petitionAction . "View";
          }
          $this->actualViewName = ucfirst($this->actualViewName);
          require_once("views/" . $this->petitionController . "/" . $this->actualViewName .".php");
          $this->actualView = new $this->actualViewName();
     }
	
     /**
     * Create the loading default view.
     *
     * @return null
     */
     public function createLoadingView(){
          $this->actualViewName = "LoadingView";
          require_once("views/system/" . $this->actualViewName . ".php");
          $this->actualView = new $this->actualViewName();
     }

	/**
     * Redirect to a given URL.
     *
     * @return null
     */
	public function redirect(){

          switch ($this->petitionAction){

               case 'login':
                    if(ACTIVATE_URL_FRIENDLY){
                    ?>
                    <script type="text/javascript">
                         window.location = '<?php echo APP_PATH . "/index/" . DEFAULT_CONTROLLER ?>';
                    </script>
                    <?php } else { ?>
                    <script type="text/javascript">
                         window.location = '<?php echo APP_PATH . "/index.php?c=" . DEFAULT_CONTROLLER ?>';
                    </script>
                    <?php }
               break;

               case 'logout':
                    ?>
                    <script type="text/javascript">
                         window.location = '<?php echo APP_PATH ?>';
                    </script>
                    <?php
               break;
                    
               case 'add':
               case 'edit':
               case 'delete':
                    if(ACTIVATE_URL_FRIENDLY){
                    ?>
                    <script type="text/javascript">
                         window.location = '<?php echo APP_PATH . "/index/" . $this->petitionController ?>';
                    </script>
                    <?php } else { ?>
                    <script type="text/javascript">
                         window.location = '<?php echo APP_PATH . "/index.php?c=" . $this->petitionController ?>';
                    </script>
                    <?php }
               break;

               case 'add_gallery':
               case 'delete_gallery':
                    if(ACTIVATE_URL_FRIENDLY){
                    ?>
                    <script type="text/javascript">
                         window.location = '<?php echo APP_PATH . "/index/" . $this->petitionController ?>';
                    </script>
                    <?php } else { ?>
                    <script type="text/javascript">
                         window.location = '<?php echo APP_PATH . "/index.php?c=" . $this->petitionController ?>';
                    </script>
                    <?php }
               break;

               case 'add_image':
               case 'delete_image':
                    if(ACTIVATE_URL_FRIENDLY){
                    ?>
                    <script type="text/javascript">
                         window.location = '<?php echo APP_PATH . "/index/" . $this->petitionController . "/edit_image/" . $_GET["id_" . $this->petitionController] ?>';
                    </script>
                    <?php } else { ?>
                    <script type="text/javascript">
                         window.location = '<?php echo APP_PATH . "/index.php?c=" . $this->petitionController . "&a=edit_image&id_" . $this->petitionController . "=" . $_GET["id_" . $this->petitionController] ?>';
                    </script>
                    <?php }
               break;

          }

	}

}

?>
