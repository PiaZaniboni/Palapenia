<!DOCTYPE html>
<html>

    <?php include 'head.php';?>

<body >

<!-- Nav -->
<?php include 'nav.php';?>

<div id="lista-compra">
   <div class="container ">

    <div class="nombre-producto">
  <p class="animated slideInUp">Lista de compras</p>
</div>

    <div class="table-responsive">
    <table class="table animated fadeIn  ">


        <?php

        if(count($_COOKIE) > 0 && $productosPosta == true){

            require_once("requests/mercadopago.php");
            $mp = new MP('6889983612539780', 'REZQenQPCG2Cn0O34JzihK6HDsXSByzx');
            //var_dump($_COOKIE);
            //var_dump (json_decode($_COOKIE[0]));
            //die();
        ?>

            <thead >
               <tr>
                <th>PRODUCTO</th>

                <th> TALLE/COLOR/CANTIDAD</th>
                <th> PRECIO</th>
                <th> ELIMINAR</th>
                </tr>
            </thead>

            <?php
            $totalCompra = 0;
            $descripcion = "";

			foreach($_COOKIE as $idProduct => $productPreCookie){


                if(intval($idProduct) != 0){

                    //var_dump($productPreCookie);
                    $productCookie = stripslashes($productPreCookie);
                    //var_dump($productCookie);
                    //die();

					$product = getProduct($idProduct);
                    $descripcion .= $product[0]["name"] . " : [ Talle: ";
                    $totalProducto = json_decode($productCookie)->total;
                    $totalCompra += $totalProducto;
                    $arrWaists = json_decode($productCookie)->waist;
                    $arrColors = json_decode($productCookie)->color;
                    $arrQuantities = json_decode($productCookie)->quantity;

                    foreach($arrWaists as $i){
                        $descripcion .= $i;

                        if(++$i != count($arrWaists)){
                            $descripcion .= " | ";
                        } else {
                            $descripcion .= " ] [ Trama: ";
                        }
                    }

                    foreach($arrColors as $i => $elem){
                        $descripcion .= $elem;

                        if(++$i != count($arrColors)){
                            $descripcion .= " | ";
                        } else {
                            $descripcion .= " ] [ Cantidad: ";
                        }
                    }

                    foreach($arrQuantities as $i => $elem){
                        $descripcion .= $elem;

                        if(++$i != count($arrQuantities)){
                            $descripcion .= " | ";
                        } else {
                            $descripcion .= " ]";
                        }
                    }

                    $descripcion .= " | ";

                    ?>
                    <tbody>
                    <tr data-product="<?php echo $idProduct; ?>">
                        <td><?php echo $product[0]['name'];?></td>
                        <td><?php

                        for($i = 0; $i < count($arrWaists); $i++){
                            if(($i + 1) != count($arrWaists)){
                                echo $arrWaists[$i] . " - ". $arrColors[$i] . " (" . $arrQuantities[$i] . ") <br>";
                            } else {
                                echo $arrWaists[$i] . " - ". $arrColors[$i] . " (" . $arrQuantities[$i] . ")";
                            }
                        }
                        ?></td>
                        <?php
                            $cantidadProductos = 0;
                            $precioMostrar = 0;
                        if ( $product[0]["price_sale"] > 0 ){
                            $cantidadProductos = $totalProducto / $product[0]["price_sale"];
                            $precioMostrar = $product[0]["price_sale"];
                         }else{
                            $cantidadProductos = $totalProducto / $product[0]["price"];
                            $precioMostrar = $product[0]["price"];
                         }

                         $stringProducto = " unidad";
                         if ($cantidadProductos > 1){
                             $stringProducto = " unidades";
                         }
                         ?>

                        <td>$ <?php echo $totalProducto . "<br> "  . ($cantidadProductos) . $stringProducto . " a $ " . $precioMostrar . " c/u" ?></td>

                        <td> <a href="javascript:void(0);" class="btn-eliminar-producto" data-compra="<?php echo $idProduct; ?>">X</a> </td>
                    </tr>
			<?php
                    }
				}

                $preference_data = array(
                    "items" => array(
                        array(
                            "title"=> $descripcion,
                            "currency_id"=> "ARS",
                            "picture_url"=> "http://www.palapenia.com.ar/images/logo-negro.png",
                            "description"=> "Varios productos",
                            "quantity"=> 1,
                            "unit_price"=> $totalCompra
                        )
                    ),
                    "back_urls" => array(
                        "success" => "http://www.palapenia.com.ar/success.php"
                    )
                );

                $preference = $mp->create_preference($preference_data);
			?>

            <tr>
                <th colspan="1"><span class="pull-right">TOTAL</span></th>
                <th><?php echo "$ " . $totalCompra; ?></th>
            </tr>
            <tr>
                <td><a href="index.php" class="Pull-left btn submit">Continuar comprando</a></td>
                <td colspan="3"><a href="<?php echo $preference['response']['init_point']; ?>" mp-mode="popup" class="pull-right btn  submit">Checkout</a></td>
            </tr>
        </tbody>

	<?php } else { ?>
        <tbody>
            <tr>
        		Tienes el carrito vacio.
        	</tr>
        </tbody>
	<?php } ?>



    </table>
    </div>

</div>
</div>

<?php include 'footer-info.php'; ?>
  <?php include 'footer.php';?>
</body>

</html>
