 <!DOCTYPE html>
<html>
  <?php include 'head.php';?>  
<body>
<!-- Nav -->
<?php include 'nav.php';?>

  <div class="container">
    <div class="nombre-producto">
      <p class="animated slideInUp">
        <a href="seccion-carrito.php" class="link-carrito">Remeras y tops</a>
        /Remera XXX
      </p>
    </div>
    <div id="producto">
      <div class="row">
        <div class="abajo">
          <div class="col-lg-6 animated fadeIn">
            <h4>REMERA XXX </h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="row">
              <div class="col-1 col-sm-1">
                <span class="fa-stack fa-lg">
                  <i class="glyphicon glyphicon-shopping-cart"></i>
                </span>
              </div>
              <div class="col-5 col-sm-5">
                <form class="form-horizontal">
                  <div class="form-group">

                    <label class=" col-sm-4 control-label">COLOR</label>
                    <div class="col-sm-8">
                      <ul class="color-lista">
                      <li>
                        <div class="color-producto">
                          color
                        </div>
                      </li>
                      <li>
                        <div class="color-producto">
                          color
                        </div>
                      </li>
                      <li>
                        <div class="color-producto">
                          color
                        </div>
                      </li>
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

                    <label class=" col-sm-4 control-label">CANTIDAD</label>
                    <div class="col-sm-8">
                      <div>
                        <input type="number" name="cantidad" class="cantidad-producto">
                      </div>
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
                                <div class="carousel-inner zoom">
                                    <div class="active item img-responsive animated fadeIn" data-slide-number="0">
                                        <img src="images/2.jpg"></div>

                                    <div class="item img-responsive animated fadeIn" data-slide-number="1">
                                        <img src="images/3.jpg"></div>

                                    <div class="item img-responsive animated fadeIn" data-slide-number="2">
                                        <img src="images/4.jpg"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                
              </div>
            
              <div class="col-sm-6" >
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                    <li>
                        <a class="thumbnail animated fadeIn" id="carousel-selector-0">
                            <img src="images/2.jpg">
                        </a>
                    </li>

                    <li>
                        <a class="thumbnail animated fadeIn" id="carousel-selector-1">
                          <img src="images/3.jpg">
                        </a>
                    </li>

                    <li>
                        <a class="thumbnail animated fadeIn" id="carousel-selector-2">
                          <img src="images/4.jpg">
                        </a>
                    </li>
                </ul>
              </div>
            
        
            </div>
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

