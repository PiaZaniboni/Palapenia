<?php
require_once("requests/_get_lookbooks.php");
require_once("requests/_get_lookbook_image.php");

?>

<!DOCTYPE html>
<html>

    <?php include 'head.php';?>

<body >

<!-- Nav -->
<?php include 'nav.php';?>

 <div id="lookbook">
    <div class="container">


        <?php foreach( $lookbooks as $lookbook ){ ?> <!-- Front-end lookbook -->
        <?php  if ( $lookbook['coleccion'] != 'Primavera / Verano' ) {  ?>

          <header>
          <h4 class="animated slideInLeft"><?php echo $lookbook['coleccion'] ;?> <?php echo $lookbook['name'] ;?></h4>
              <p class="animated slideInLeft"><?php echo $lookbook['description'] ;?></p>
          </header>

          <!-- Galeria-->
          <div class="row">
                <div id="carousel<?php echo $lookbook['name'] ;?>" class="carousel slide forma idCarousel" data-ride="carousel">
                    <div class="carousel-inner animated slideInUp">

                      <?php $lookbookImages = getLookbookImages($lookbook['id_lookbook']);
                            $count = 0;
                            foreach( $lookbookImages as $lookbookImage ){
                                $imageData = $lookbookImage['lookbook_image'];
                                $fileinfo = $lookbookImage['type_image'];
                                $src = 'data: '.$fileinfo.';base64,'.$imageData;
                                $src=str_replace(" ","",$src);?>

                                <div class="item <?php if($count==0){ echo 'active';} ?>">
                                    <img src="<?php echo $src; ?>" alt="" />
                                </div>
                        <?php $count++;} ?>
            </div><!-- END INNER CAROUSEL -->

            <!-- Left and right controls -->
            <a class="left carousel-control animated slideInUp" href="#carousel<?php echo $lookbook['name'] ;?>" data-slide="prev">
             <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control animated slideInUp" href="#carousel<?php echo $lookbook['name'] ;?>" data-slide="next">
             <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>

            </div><!-- END CAROUSEL -->
          </div><!-- END ROW -->

        <?php } ?> <!-- END IF COLECCION Primavera / Verano -->

      <?php  } ?> <!-- END foreach COLECCION-->


        
        <header>
        <h4 class="animated slideInLeft">Campaña Otoño-Invierno 2017</h4>

            <p class="animated slideInLeft">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</br> Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique </br>quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>

        </header>

        <div class="row">



<div id="myCarousel2" class="carousel slide forma" data-ride="carousel">
    <!-- Wrapper for slides -->
   <div class="carousel-inner animated slideInUp">
        <div class="item active">
          <img src="images/otonio17/otonio1.jpg" alt="">
        </div>

        <div class="item">
          <img src="images/otonio17/otonio2.jpg" alt="">
        </div>

        <div class="item">
          <img src="images/otonio17/otonio3.jpg" alt="">
        </div>

    </div> 

    <!-- Left and right controls -->
    <a class="left carousel-control animated slideInUp" href="#myCarousel2" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control animated slideInUp" href="#myCarousel2" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

        <hr>
    </div><!-- END CONTENEDOR -->

       <?php include 'footer-info.php';?>
       <?php include 'footer.php';?>
</body>

</html>
