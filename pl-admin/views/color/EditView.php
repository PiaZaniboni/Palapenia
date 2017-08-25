
<?php 

require("views/View.php");

class EditView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Color $color = null){

?>  
    
    <p> 
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

	<form action="<?php echo $this->generateURL('color', 'edit', $color->getIdColor()) ?>" method="post">
    	
        <fieldset>
        
            <div class="row">

                <div class="col-md-6">  

                    <div>
                        <label for="color">
                            Nombre <small>(*)</small>
                        </label>
                        <input name="color" type="text" value="<?php echo $color->getColor() ?>" required /> 
                    </div>
                    
                </div>
               
                <div class="col-md-6">	

                    <div>
                        <label for="initial">
                            Inicial <small>(*)</small>
                        </label>
                        <input name="initial" type="text" value="<?php echo $color->getInitial() ?>" required maxlength="1" /> 
                    </div>

                    <div>
                        <input type="submit" value="Modificar" />
                    </div>
                
                </div>
            
            </div>
            
    	</fieldset>
        
    </form>

<?php 

    }

}

?>
    