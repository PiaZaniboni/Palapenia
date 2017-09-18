
<?php

require("views/View.php");

class EditView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Array $categories = null, Product $product = null, Array $stock = null, Array $colors= null){

?>

    <p>
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

	<form id="product<?php echo $product->getIdProduct() ?>" action="<?php echo $this->generateURL('product', 'edit', $product->getIdProduct()) ?>" method="post">

        <fieldset>

            <div class="row">

                <div class="col-md-6">

                    <div>
                        <label for="name">
                            Nombre <small>(*)</small>
                        </label>
                        <input name="name" type="text" value="<?php echo $product->getName() ?>" required <?php if($product->getIdProduct() === '0'){ echo "disabled"; } ?> />
                    </div>

                    <?php if($product->getIdProduct() !== '0'){ ?>
                    <div>
                        <label for="id_category">
                            Categor&iacute;a <small>(*)</small>
                        </label>
                        <select name="id_category" required disabled>
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
                        <?php
                        foreach($categories as $category){
                            if($category->getIdCategory() === $product->getIdCategory()){
                        ?>
                        <input type="hidden" name="id_category" value="<?php echo $category->getIdCategory() ?>">
                        <?php
                            }
                        }
                        ?>
                    </div>

                    <div>
                        <label for="talle">
                            Talle / Stock
                        </label><br>
                        <div class="waists">
                                <?php var_dump($stock); ?>
                                <?php foreach($colors as $i => $color){ ?>
                                 <label for="color">
                                 <?php echo $color->getColor(); ?>
                                 </label>
                                 <div class="row options">

                                     <div class="col-md-3">
                                         <p>XS</p>
                                         <input name="quantity_xs_<?php echo $color->getInitial() ?>" type="text" value="<?php //echo $stock[$i][4] ?>">
                                     </div>
                                     <div class="col-md-3">
                                         <p>S</p>
                                         <!--<input name="quantity_s_<?php echo $color->getInitial() ?>" type="text" value="<?php echo $stock[$i + count($colors)][4] ?>">-->
                                     </div>
                                     <div class="col-md-3">
                                         <p>M</p>
                                         <!--<input name="quantity_m_<?php echo $color->getInitial() ?>" type="text" value="<?php echo $stock[$i + (count($colors) * 2)][4] ?>"> -->
                                     </div>
                                    <div class="col-md-3">
                                        <p>L</p>
                                        <!--<input name="quantity_l_<?php echo $color->getInitial() ?>" type="text" value="<?php echo $stock[$i + (count($colors) * 3)][4] ?>"> -->
                                    </div>
                                </div>
                                <?php } ?>

                        </div>
                    </div>
                    <?php } ?>

                </div>

                <div class="col-md-6">

                    <div class="description">
                        <label for="description">
                            Descripci&oacute;n
                        </label>
                        <textarea name="description"><?php echo $product->getDescription() ?></textarea>
                    </div>

                    <?php if($product->getIdProduct() !== '0'){ ?>
                    <div class="price">
                        <label for="price">
                            Precio
                        </label>
                        <input name="price" type="text" value="<?php echo $product->getPrice() ?>" required />
                    </div>

                    <div class="price_sale">
                        <label for="price_sale">
                            Precio Sale
                        </label>
                        <input name="price_sale" type="text" value="<?php echo $product->getPriceSale() ?>" />
                    </div>
                    <?php } ?>

                    <div>
                        <input type="submit" value="Modificar" />
                    </div>

                </div>

            </div>

    	</fieldset>

    </form>

<?php

    }

    /*public function getWaist($waists, $idCategory, $idWaist){
        foreach($waists as $waist){
            if($waist->getIdCategory() === $idCategory && $waist->getIdWaist() === $idWaist){
                return $waist->getWaist();
            }
        }
    }*/

}

?>
