
<?php 

class LoginView {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(){

?>  

	<form class="frm-login" action="<?php echo $this->generateURL() ?>" method="post">
        
        <fieldset>
        	
            <div>
                <label for="user">
                    Usuario
                </label>
                <input name="user" type="text" required />
            </div>
            
            <div>
                <label for="password">
                    Contrase&ntilde;a
                </label>
                <input name="password" type="password" required />
            </div>
            
            <div>
                <input type="submit" value="Ingresar" />
            </div>	
            
        </fieldset>
        
    </form>
 
<?php 

    }

    /**
     * Generate the url's to redirect.
     *
     * @return string
     */
    private function generateURL(){
        if(ACTIVATE_URL_FRIENDLY){
            return APP_PATH . "/login";
        } else {
            return APP_PATH . "/index.php?c=system&a=login";
        }
    }

}

?>