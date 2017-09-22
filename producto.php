 <!DOCTYPE html>
<html>
  <?php include 'head.php';?>
<body>
<!-- Nav -->
<?php include 'nav.php';?>

  <div class="container">

    <?php $idProducto = $_GET['idp'];
          $producto = getProduct($idProducto);
          $categoryName = getCategoryName($producto[0]['id_category']);
          //var_dump ($producto);
          //$categoryId = getCategoryId($cat);
    ?>

    <div class="nombre-producto">
      <p class="animated slideInUp">
        <a href="seccion-carrito.php?cat=<?php echo $categoryName; ?>" class="link-carrito"><?php echo $categoryName;?></a>
        /<?php echo $producto[0]['name'] ;?>
      </p>
    </div>
    <div id="producto" data-product="<?php echo $idProducto; ?>">
      <div class="row">
        <div class="abajo">
          <div class="col-lg-6 animated fadeIn">
            <h4><?php echo $producto[0]['name'] ;?></h4>
            <p><?php echo $producto[0]['description'] ;?></p>
            <div class="row">
              <div class="col-1 col-sm-1">
                <span class="fa-stack fa-lg">
                  <i class="glyphicon glyphicon-shopping-cart"></i>
                </span>
              </div>
              <?php $stock = getStockProduct($idProducto);
                    $colors = getColors();
                    //echo '<pre>';
                    //var_dump($stock);
                    //echo '</pre>';

                    echo '</br>';
                    foreach ($stock as $st) {
                        foreach ($colors as $color) {
                            if( $st['id_color'] === $color['id_color'] ){
                                //echo $st['id_waist'];
                                //echo " - ";
                                //echo $color['color'];
                                //echo " - ";
                            }
                        }
                    }
                    echo '</br>';
                    foreach ($stock as $st) {
                        foreach ($colors as $color) {
                            if( $st['id_color'] === $color['id_color'] ){
                                //echo $st['stock'];
                                //echo " - ";
                                //echo $color['color'];
                                //echo " - ";
                            }
                        }
                    }



              ?>
              <div class="col-5 col-sm-5">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class=" col-sm-4 control-label">COLOR</label>
                    <div class="col-sm-8">
                      <ul class="color-lista">
                          <?php
                          foreach ($colors as $color) { $count = 0;
                          foreach ($stock as $st) {
                                  if( ( $st['id_color'] === $color['id_color'] ) && $count == 0 ){
                                      $colorImage = getColorImage( $st['id_color'] );
                                      $imageData = $colorImage[0]['color_image'];
                                      $fileinfo = $colorImage[0]['type_image'];
                                      $src = 'data: '.$fileinfo.';base64,'.$imageData;

                                       ?>
                                      <li>
                                        <div class="color-producto" data-id-color="<?php echo $st['id_color']; ?>" style="background-image:url('<?php echo $src;?>')">
                                          <?php //echo $color['color'];?>
                                        </div>

                                      </li>
                                  <?php $count++;}
                              }
                          }
                           ?>
                      </ul>
                    </div>
                    <label class=" col-sm-4 control-label">TALLES</label>
                    <div class="col-sm-8">
                      <a class="btn btn-default btn-select">
                        <input type="hidden"/>
                        <span class="btn-select-value">Seleccionar</span>
                        <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                        <ul>
                            <li>S</li>
                            <li>M</li>
                            <li>L</li>
                            <li>XL</li>
                        </ul>
                      </a>
                    </div>

                  </div>
                  <a href="lista-compra.php">
                    <button type="button" class="btn btn-default button"> Lo quiero</button>
                  </a>
                </form>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-sm-6">

                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" >
                            <div class="slide" id="myCarousel3">
                                <!-- Carousel items -->
                                <div class="carousel-inner ">
                                    <?php $productImages = getProductGallery( $producto[0]['id_product'] );
                                          $count = 0;
                                          foreach( $productImages as $productImage ){
                                              $imageData = $productImage['product_image'];
                                              $fileinfo = $productImage['type_image'];
                                              $src = 'data: '.$fileinfo.';base64,'.$imageData;
                                              $src=str_replace(" ","",$src);?>

                                              <div class="<?php if($count==0){ echo 'active';} ?> item img-responsive animated fadeIn" data-slide-number="<?php echo $count; ?>">
                                                  <img src="<?php echo $src; ?>" alt="" />
                                              </div>
                                      <?php $count++;} ?>

                                    <!--<div class="active item img-responsive animated fadeIn" data-slide-number="0">
                                        <img src="images/2.jpg"></div>

                                    <div class="item img-responsive animated fadeIn" data-slide-number="1">
                                        <img src="images/3.jpg"></div>

                                    <div class="item img-responsive animated fadeIn" data-slide-number="2">
                                        <img src="images/4.jpg">
                                    </div>-->

                                </div>

                            </div>
                        </div>
                    </div>

              </div>

              <div class="col-sm-6" >
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                    <?php $count2 = 0;
                          foreach( $productImages as $productImage2 ){
                              $imageData2 = $productImage2['product_image'];
                              $fileinfo2 = $productImage2['type_image'];
                              $src2 = 'data: '.$fileinfo2.';base64,'.$imageData2;
                              $src2 = str_replace(" ","",$src2);?>

                              <li>
                                  <a class="thumbnail animated fadeIn" id="carousel-selector-<?php echo $count2;?>">
                                      <img src="<?php echo $src2; ?>">
                                  </a>
                              </li>

                      <?php $count2++;} ?>

                    <!--<li>
                        <a class="thumbnail animated fadeIn" id="carousel-selector-1">
                          <img src="images/3.jpg">
                        </a>
                    </li>

                    <li>
                        <a class="thumbnail animated fadeIn" id="carousel-selector-2">
                          <img src="images/4.jpg">
                        </a>
                    </li>-->
                </ul>
              </div>


            </div>
          </div>
        </div>
      </div>

    </div>


<?php include 'footer-info.php'; ?>
  <?php include 'footer.php';?>
</body>

<script>
  jQuery(document).ready(function($) {

        $('#myCarousel3').carousel({
                interval: 5000
        });

        $('#carousel-text').html($('#slide-content-0').html());

        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click( function(){
                var id_selector = $(this).attr("id");
                var id = id_selector.substr(id_selector.length -1);
                var id = parseInt(id);
                $('#myCarousel3').carousel(id);
        });


        // When the carousel slides, auto update the text
        $('#myCarousel3').on('slid', function (e) {
                var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });


});
</script>

</html>
