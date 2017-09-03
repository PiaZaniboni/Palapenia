
<?php

require("views/View.php");

class EditView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Lookbook $lookbook = null){

?>

    <p>
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

	<form action="<?php echo $this->generateURL('lookbook', 'edit', $lookbook->getIdLookbook()) ?>" method="post">

        <fieldset>

            <div class="row">

                <div class="col-md-6">

                    <div>
                        <label for="name">
                            A&ntilde;o <small>(*)</small>
                        </label>
                        <input name="name" type="text" value="<?php echo $lookbook->getName() ?>" required />
                    </div>

                    <div>
                        <label for="coleccion">
                            Colecci&oacute;n <small>(*)</small>
                        </label>
                        <select name="coleccion" required>
                            <option value="" selected>
                                Seleccionar
                            </option>
                            <?php if($lookbook->getColeccion() === "Oto&ntilde;o / Invierno"){ ?>
                              <option value="Oto&ntilde;o / Invierno" selected>
                                  Oto&ntilde;o / Invierno
                              </option>
                              <option value="Primavera / Verano">
                                  Primavera / Verano
                              </option>
                            <?php } else { ?>
                              <option value="Oto&ntilde;o / Invierno">
                                  Oto&ntilde;o / Invierno
                              </option>
                              <option value="Primavera / Verano" selected>
                                  Primavera / Verano
                              </option>
                            <?php } ?>
                        </select>
                    </div>


                </div>

                <div class="col-md-6">

                    <div class="description">
                        <label for="description">
                            Descripci&oacute;n
                        </label>
                        <textarea name="description"><?php echo $lookbook->getDescription() ?></textarea>
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
