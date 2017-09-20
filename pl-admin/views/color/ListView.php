
<?php

require("views/View.php");

class ListView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Array $colors = null){

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

    <?php if(empty($colors)){ ?>

    <p> No hay colores cargados/as por el momento. </p>

    <?php } else { ?>

	<table>

        <thead>
            <tr>
                <th>
                	Trama
                </th>
                <th>
                    Inicial
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
			<?php foreach($colors as $color){ ?>
            <tr>
                <td>
                	<?php echo $color->getColor() ?>
                </td>
                <td>
                    <?php echo $color->getInitial() ?>
                </td>
                <td>
                    <a href="<?php echo $this->generateURL('color', 'edit_gallery', $color->getIdColor()) ?>">
                        <span class="glyphicon glyphicon-th"></span>
                    </a>
                </td>
                <td class="border-cell">
                	<a href="<?php echo $this->generateURL('color', 'edit', $color->getIdColor()) ?>">
                    	<span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
                <td>
                	<a class="delete-link" href="<?php echo $this->generateURL('color', 'delete', $color->getIdColor()) ?>">
                    	<span class="glyphicon glyphicon-trash"></span>
                    </a>
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
