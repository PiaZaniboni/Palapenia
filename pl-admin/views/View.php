
<?php 

class View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(){

    }

    /**
     * Generate the url's to redirect.
     *
     * @return string
     */
    protected function generateURL($controller, $action, $id = null, $isImage = false){
        $url = "";

        if(ACTIVATE_URL_FRIENDLY){
            $url .= APP_PATH . "/" . $controller . "/" . $action;

            if($id !== null){
                $url .= "/" . $id;
            }   
        } else {
            $url .= APP_PATH . "/index.php?c=" . $controller . "&a=" . $action;

            if($id !== null){
                if($isImage){
                    $url .= "&id_" . $controller . "_image=" . $id;
                } else {
                    $url .= "&id_" . $controller . "=" . $id;
                }
            } 
        }

             

        return $url;
    }

}

?>
