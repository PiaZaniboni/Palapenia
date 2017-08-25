
<?php 

require("views/View.php");

class AddView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Array $categories = null, Array $colors = null){

?>    

    <p>
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

	<form action="<?php echo $this->generateURL('product', 'add') ?>" method="post" enctype="multipart/form-data">
    	
        <fieldset>

            <div class="row">
            
                <div class="col-md-6">	

                    <div>
                        <label for="name">
                            Nombre <small>(*)</small>
                        </label>
                        <input name="name" type="text" required /> 
                    </div>

                    <div>
                        <label for="id_category">
                            Categor&iacute;a <small>(*)</small>
                        </label>
                        <select name="id_category" required>
                            <option value="" selected>Seleccionar</option>
                            <?php foreach($categories as $category){ ?>
                            <option value="<?php echo $category->getIdCategory() ?>"><?php echo $category->getCategory() ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label for="id_subcategory">
                            Subcategor&iacute;a <small>(*)</small>
                        </label>
                        <select name="id_subcategory" required>
                            
                        </select>
                    </div>

                    <div>
                        <label for="talle">
                            Talle / Stock
                        </label><br>
                        <div class="waists">
                            <div class="row options">

                            </div>
                        </div>
                        <!--<div class="waists-clothes">
                            <?php foreach($colors as $color){ ?>
                            <label for="color">
                                <?php echo $color->getColor() ?>
                            </label>
                            <div class="row options">
                                <div class="col-md-3">
                                    <p>XS</p> 
                                    <input name="quantity_xs_<?php echo $color->getInitial() ?>" type="text" value="0">
                                </div>
                                <div class="col-md-3">
                                    <p>S</p>  
                                    <input name="quantity_s_<?php echo $color->getInitial() ?>" type="text" value="0">
                                </div>
                                <div class="col-md-3">
                                    <p>M</p>  
                                    <input name="quantity_m_<?php echo $color->getInitial() ?>" type="text" value="0">
                                </div>
                                <div class="col-md-3">
                                    <p>L</p>  
                                    <input name="quantity_l_<?php echo $color->getInitial() ?>" type="text" value="0">
                                </div>
                            </div> 
                            <?php } ?>
                        </div>
                        <div class="waists-shoes">
                            <div class="row options">
                                <div class="col-md-3">
                                    <p>8</p> 
                                    <input name="quantity_8" type="text" value="0">
                                </div>
                                <div class="col-md-3">
                                    <p>10</p>  
                                    <input name="quantity_10" type="text" value="0">
                                </div>
                                <div class="col-md-3">
                                    <p>12</p>  
                                    <input name="quantity_12" type="text" value="0">
                                </div>
                                <div class="col-md-3">
                                    <p>16</p>  
                                    <input name="quantity_16" type="text" value="0">
                                </div>
                            </div> 
                        </div>-->
                    </div>

                </div>
               
                <div class="col-md-6">	

                    <div class="description">
                        <label for="description">
                            Descripci&oacute;n
                        </label>
                        <textarea name="description" required></textarea> 
                    </div>

                    <div class="price">
                        <label for="price">
                            Precio
                        </label>
                        <input name="price" type="text" required /> 
                    </div>

                    <div>
                        <label for="product_image">
                            Imagenes
                        </label>
                        <input name="product_image[]" type="file" multiple /> 
                    </div>
                    
                    <div>
                        <input type="submit" value="Agregar" />
                    </div>
                
                </div>
            
            </div>
            
    	</fieldset>
        
    </form>

<?php 

    }

}

?>
