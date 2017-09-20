color
<?php

require("views/View.php");

class EditGalleryView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Array $gallery = null){

?>

    <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
    <script type="text/javascript">

    $(window).load(function(e){
        $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            percentPosition: true,
            gutter: 15
        })
    });

    </script>

    <?php if(!empty($gallery)){ ?>

    <section class="grid">

        <div class="grid-sizer"></div>

        <?php foreach($gallery as $colorImage){ ?>
        <article class="grid-item">
            <img src="<?php echo APP_PATH ?>/app/_color_image.php?id_color_image=<?php echo $colorImage->getIdColorImage()?>" />
            <a href="<?php echo $this->generateURL('color', 'delete_gallery', $colorImage->getIdColorImage(), true) ?>">
                Eliminar
            </a>
        </article>
        <?php } ?>

    </section>

    <?php } ?>

    <p>
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

    <form action="<?php echo $this->generateURL('color', 'add_gallery', $_GET['id_color']) ?>" method="post" enctype="multipart/form-data">

        <fieldset>

            <div>
                <label for="color_image">
                    Galer&iacute;a <small>(*)</small>
                </label>
                <input type="file" name="color_image[]" required multiple />
            </div>

            <div>
                <input type="submit" value="Agregar" />
            </div>

        </fieldset>

    </form>

<?php

    }

}

?>
