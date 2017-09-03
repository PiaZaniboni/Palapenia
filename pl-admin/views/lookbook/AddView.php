
<?php

require("views/View.php");

class AddView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(){

?>

    <p>
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

	<form action="<?php echo $this->generateURL('lookbook', 'add') ?>" method="post" enctype="multipart/form-data">

        <fieldset>

            <div class="row">

                <div class="col-md-6">

                    <div>
                        <label for="name">
                            A&ntilde;o <small>(*)</small>
                        </label>
                        <input name="name" type="text" required />
                    </div>

                    <div>
                        <label for="coleccion">
                            Colecci&oacute;n <small>(*)</small>
                        </label>
                        <select name="coleccion" required>
                            <option value="" selected>
                                Seleccionar
                            </option value="Oto&ntilde;o / Invierno">
                            <option>
                                Oto&ntilde;o / Invierno
                            </option>
                            <option value="Primavera / Verano">
                                Primavera / Verano
                            </option>
                        </select>
                    </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="description">
                        <label for="description">
                            Descripci&oacute;n
                        </label>
                        <textarea name="description" required></textarea>
                    </div>

                    <div>
                        <label for="lookbook_image">
                            Imagenes
                        </label>
                        <input name="lookbook_image[]" type="file" multiple />
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
