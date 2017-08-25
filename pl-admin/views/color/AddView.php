
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

	<form action="<?php echo $this->generateURL('color', 'add') ?>" method="post">

        <fieldset>

            <div class="row">

                <div class="col-md-6">

                    <div>
                        <label for="color">
                            Nombre <small>(*)</small>
                        </label>
                        <input name="color" type="text" required />
                    </div>

                </div>

                <div class="col-md-6">

                    <div>
                        <label for="initial">
                            Inicial <small>(*)</small>
                        </label>
                        <input name="initial" type="text" required maxlength="1" />
                    </div>

                    <div>
                        <input type="submit" value="Agregars" />
                    </div>

                </div>

            </div>

    	</fieldset>

    </form>

<?php

    }

}

?>
