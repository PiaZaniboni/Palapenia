
<?php 

class EditImageView {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Design $design){

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

    <?php 
    if($design->getFrameDesign()){ ?>
    
    <section class="grid">
        
        <div class="grid-sizer"></div>

        <article class="grid-item">
            <img src="<?php echo APP_PATH ?>/app/_design_frame.php?id_design=<?php echo $design->getIdDesign()?>" />
            <a href="<?php echo $this->generateURL('design', 'delete_image', $design->getIdDesign(), true) ?>">
                Eliminar
            </a>
        </article>

    </section>
    
    <?php } else { ?>

    <p>
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>
    
    <form action="<?php echo $this->generateURL('design', 'add_image', $_GET['id_design']) ?>" method="post" enctype="multipart/form-data">
        
        <fieldset>
        
            <div>
                <label for="frame_design">
                    Fotograma <small>(*)</small>
                </label>
                <input type="file" name="frame_design" required /> 
            </div>
            
            <div>
                <input type="submit" value="Agregar" />
            </div>
            
        </fieldset>
        
    </form>

    <?php } ?>

<?php 

    }

    /**
     * Generate the url's to redirect.
     *
     * @return string
     */
    private function generateURL($controller, $action, $id, $idImage = false){
        if(ACTIVATE_URL_FRIENDLY){
            return APP_PATH . "/" . $controller . "/" . $action . "/" . $id;
        } else {
            return APP_PATH . "/index.php?c=" . $controller . "&a=" . $action . "&id_" . $controller . "=" . $id;
        }
    }

}

?>
