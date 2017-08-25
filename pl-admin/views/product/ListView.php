    
<?php 

require("views/View.php");

class ListView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Array $products = null){

?>

    <div class="modal fade modal-confirmation" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <p>
                <?php echo CONFIRMATION_TEXT ?>
            </p>
            <button type="button" class="btn btn-primary delete-yes" data-toggle="button" aria-pressed="false" autocomplete="off">
                <?php echo YES_TEXT ?>
            </button>
            <button type="button" class="btn btn-primary delete-no" data-toggle="button" aria-pressed="false" autocomplete="off">
                <?php echo NO_TEXT ?>
            </button>
        </div>
      </div>
    </div>

    <?php if(empty($products)){ ?>
    
    <p> No hay productos cargados/as por el momento. </p>
    
    <?php } else { ?>
   
	<table>
    	
        <thead>
            <tr>
                <th>
                	Nombre
                </th>
                <th>
                    Descripci&oacute;n
                </th>
                <th>
                    Galer&iacute;a
                </th>
                <th class="border-cell">
                	Modificar
                </th>
                <th>	
                	Eliminar
                </th>
            </tr>
        </thead>
        
        <tbody>       	
			<?php foreach($products as $product){ ?>
            <tr>
                <td>
                	<?php echo $product->getName() ?>
                </td>
                <td>
                    <?php echo $product->getDescription() ?>
                </td>
                <td>
                    <a href="<?php echo $this->generateURL('product', 'edit_gallery', $product->getIdProduct()) ?>">
                        <span class="glyphicon glyphicon-th"></span>
                    </a>
                </td>            
                <td class="border-cell">
                    <?php if($product->getIdProduct() !== '0'){ ?>
                	<a href="<?php echo $this->generateURL('product', 'edit', $product->getIdProduct()) ?>">
                    	<span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <?php } ?>
                </td>
                <td>
                    <?php if($product->getIdProduct() !== '0'){ ?>
                	<a class="delete-link" href="<?php echo $this->generateURL('product', 'delete', $product->getIdProduct()) ?>">
                    	<span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
    
<?php 

        } 

    }

}

?>
