 <!DOCTYPE html>
<html>

 <?php include 'head.php';?>

<body >

<!-- Nav -->
<?php include 'nav.php';?>

<div id="listacompra">
<div class="container">
    <div class="row ">
    <div class=" jumbotron hero-spacer">
        <?php $cat = $_GET['cat'];?>
    <p class="animated slideInUp"> <?php echo $cat; ?> </p>


    <?php
        if ( $cat !== "sale" ){
            //echo "Esto no es sale";
            $categoryId = getCategoryId($cat);
            $products = getProducts($categoryId);

            foreach ( $products as $product) {
                $productImages = getProductImages( $product['id_product'] );
                //var_dump($productImages[0]['id_product']);
                $imageData = $productImages[0]['product_image'];
                $fileinfo = $productImages[0]['type_image'];
                $src = 'data: '.$fileinfo.';base64,'.$imageData;
                $src=str_replace(" ","",$src);
                ?>
                <div class="col-sm-3 sinpadding animated fadeIn">
                    <div class="content-box text-center">
                        <a href="producto.php?idp=<?php echo $product['id_product']; ?>">
                            <?php if ( $product['price_sale'] > 0 ) {?>
                                <img class="img-sale" src="images/sale.png" alt="Producto Sale">
                            <?php }?>    
                            <img src="<?php echo $src; ?>" class="img-responsive" alt="">
                            <span class="content-link text-uppercase"><h3><?php echo $product['name']; ?></h3>
                            <?php if ( $product['price_sale'] > 0 ) {?>

                                <p>$<?php echo $product['price_sale']; ?></p>
                            <?php }else {?>
                                <p>$<?php echo $product['price']; ?></p>
                            <?php }?>
                            </span>
                        </a>
                    </div>
                </div>
            <?php }
        }else{
            //echo "Esto es sale";
            $productsSale = getProductsSale();

            foreach ( $productsSale as $productSale) {
                $productImageSale = getProductImages( $productSale['id_product'] );
                //var_dump($productImages[0]['id_product']);
                $imageData = $productImageSale[0]['product_image'];
                $fileinfo = $productImageSale[0]['type_image'];
                $src = 'data: '.$fileinfo.';base64,'.$imageData;
                $src=str_replace(" ","",$src);
                ?>
                <div class="col-sm-3 sinpadding animated fadeIn">
                    <div class="content-box text-center">
                        <a href="producto.php?idp=<?php echo $productSale['id_product']; ?>">
                            <img src="<?php echo $src; ?>" class="img-responsive" alt="">
                            <span class="content-link text-uppercase"><h3><?php echo $productSale['name']; ?></h3>
                            <?php if ( $productSale['price_sale'] > 0 ) {?>
                                <p>$<?php echo $productSale['price_sale']; ?></p>
                            <?php }else {?>
                                <p>$<?php echo $productSale['price']; ?></p>
                            <?php }?>
                            </span>
                        </a>
                    </div>
                </div>
            <?php }


        }
    ?>

        <!--<div class="col-sm-3 sinpadding animated fadeIn">
            <div class="content-box text-center">
                <a href="producto.php">
                    <img src=images/2.jpg class="img-responsive" alt="">
                    <span class="content-link text-uppercase"><h3>REMERA XXX</h3>
                    <p>$300</p>
                    </span>
                </a>
            </div>
        </div>

         <div class="col-sm-3 sinpadding animated fadeIn">
            <div class="content-box text-center">
                <a href="producto.php">
                    <img src=images/2.jpg class="img-responsive" alt="">
                    <span class="content-link text-uppercase"><h3>REMERA XXX</h3>
                    <p>$300</p>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-sm-3 sinpadding animated fadeIn">
            <div class="content-box text-center">
                <a href="producto.php">
                    <img src="images/2.jpg" class="img-responsive" alt="">
                    <span class="content-link text-uppercase"><h3>REMERA XXX</h3>
                    <p>$300</p>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-sm-3 sinpadding animated fadeIn">
            <div class="content-box text-center">
                <a href="producto.php">
                    <img src="images/2.jpg" class="img-responsive" alt="">
                    <span class="content-link text-uppercase"><h3>REMERA XXX</h3>
                    <p>$300</p>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-sm-3 sinpadding animated fadeIn">
            <div class="content-box text-center ">
                <a href="producto.php">
                    <img src=images/2.jpg class="img-responsive" alt="">
                    <span class="content-link text-uppercase"><h3>REMERA XXX</h3>
                    <p>$300</p>
                    </span>
                </a>
            </div>
        </div>

         <div class="col-sm-3 sinpadding animated fadeIn">
            <div class="content-box text-center">
                <a href="producto.php">
                    <img src=images/2.jpg class="img-responsive" alt="">
                   <span class="content-link text-uppercase"><h3>REMERA XXX</h3>
                    <p>$300</p>
                    </span>
                </a>
            </div>
        </div> -->


    </div>
</div>
</div>
</div>

<?php include 'footer-info.php'; ?>
<?php include 'footer.php';?>
</body>

</html>
