
<?php 

require("views/View.php");

class EditView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Array $categories = null, Product $product = null, Array $stock = null, Array $colors = null){

?>  
    
    <p> 
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

	<form action="<?php echo $this->generateURL('product', 'edit', $product->getIdProduct()) ?>" method="post">
    	
        <fieldset>
        
            <div class="row">

                <div class="col-md-6">  

                    <div>
                        <label for="name">
                            Nombre <small>(*)</small>
                        </label>
                        <input name="name" type="text" value="<?php echo $product->getName() ?>" required /> 
                    </div>

                    <div>
                        <label for="id_category">
                            Categor&iacute;a <small>(*)</small>
                        </label>
                        <select name="id_category" required>
                            <option value="" selected>Seleccionar</option>
                            <?php 
                            foreach($categories as $category){ 
                                if($category->getIdCategory() === $product->getIdCategory()){
                            ?>
                            <option value="<?php echo $category->getIdCategory() ?>" selected><?php echo $category->getCategory() ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $category->getIdCategory() ?>"><?php echo $category->getCategory() ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="talle">
                            Talle / Stock
                        </label><br>
                        <?php if($product->getIdCategory() === '8' || $product->getIdCategory() === '9'){ ?>
                        <div class="waists-shoes">
                            <div class="row options">
                                <div class="col-md-3">
                                    <p>8</p> 
                                    <input name="quantity_8" type="text" value="<?php echo $stock[0][4] ?>">
                                </div>
                                <div class="col-md-3">
                                    <p>10</p>  
                                    <input name="quantity_10" type="text" value="<?php echo $stock[1][4] ?>">
                                </div>
                                <div class="col-md-3">
                                    <p>12</p>  
                                    <input name="quantity_12" type="text" value="<?php echo $stock[2][4] ?>">
                                </div>
                                <div class="col-md-3">
                                    <p>16</p>  
                                    <input name="quantity_16" type="text" value="<?php echo $stock[3][4] ?>">
                                </div>
                            </div> 
                        </div>
                        <?php } else { ?>
                        <div class="waists-clothes">
                            <?php foreach($colors as $i => $color){ ?>
                            <label for="color">
                                <?php echo $color->getColor(); ?>
                            </label>
                            <div class="row options">
                                <div class="col-md-3">
                                    <p>XS</p>  
                                    <input name="quantity_xs_<?php echo $color->getInitial() ?>" type="text" value="<?php echo $stock[$i][4] ?>">
                                </div>
                                <div class="col-md-3">
                                    <p>S</p>  
                                    <input name="quantity_s_<?php echo $color->getInitial() ?>" type="text" value="<?php echo $stock[$i + count($colors)][4] ?>">
                                </div>
                                <div class="col-md-3">
                                    <p>M</p>  
                                    <input name="quantity_m_<?php echo $color->getInitial() ?>" type="text" value="<?php echo $stock[$i + (count($colors) * 2)][4] ?>">
                                </div>
                                <div class="col-md-3">
                                    <p>L</p>  
                                    <input name="quantity_l_<?php echo $color->getInitial() ?>" type="text" value="<?php echo $stock[$i + (count($colors) * 3)][4] ?>">
                                </div>
                            </div> 
                            <?php } ?>
                        </div>
                        <?php } ?>
                        
                    </div>
                    
                </div>
               
                <div class="col-md-6">	

                    <div class="description">
                        <label for="description">
                            Descripci&oacute;n
                        </label>
                        <textarea name="description"><?php echo $product->getDescription() ?></textarea> 
                    </div>
                    
                    <div class="price">
                        <label for="price">
                            Precio
                        </label>
                        <input name="price" type="text" value="<?php echo $product->getPrice() ?>" required /> 
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
    