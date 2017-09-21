<?php
require_once("requests/_main2.php");

$lookbooks = getLookbooks();
$categories = getCategories();

?>

<div class="container">
<div class="row">
<div class="logo ">
 <a href="index.php"><img class="img-responsive" src="images/logo-negro.png" alt="" ></a>
 </div>

</div>




<nav class="navbar  navbar-default ">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>


    <div class="collapse navbar-collapse" id="menu">

      <ul class="nav navbar-nav justify-content-center ">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Campañas  <b class="caret"></b></a>
          <ul class="dropdown-menu">
             <!--<li><a href="seccion-lookbook.php">Primavera/verano 2018</a></li>
              <li class="divider"></li>
              <li><a href="lookbook-otonio.php">Otoño/invierno 2017</a></li>-->
              <?php $count = 0;
            foreach($lookbooks as $lookbook ){ ?>
                <li><a data-lookbook="<?php echo $lookbook['id_lookbook'] ?>" href="seccion-lookbook.php?ID=<?php echo $lookbook['id_lookbook']; ?>"  class="btn-lookbook"><?php echo $lookbook['coleccion']; echo ' '; echo $lookbook['name']; ?></a></li>
                <!-- Para que no dibuje la linea si es el ultimo item -->
                <?php  if( $count  < ( count ($lookbooks) -1 ) ) {?>
                    <li class="divider"></li>
                <?php } $count++;
            }?>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop On-line  <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="seccion-carrito.php?cat=sale">SALE</a></li>
            <li class="divider"></li>
            <!--<li><a href="seccion-carrito.php">Top</a></li>
            <li class="divider"></li>
            <li><a href="seccion-carrito.php">Bottom</a></li>
             <li class="divider "></li>
            <li><a href="seccion-carrito.php">Abrigos</a></li>
            <li class="divider"></li>
            <li><a href="seccion-carrito.php">Vestidos</a></li>-->
            <?php $countC = 0;
            foreach($categories as $category ){ ?>
                <li><a href="seccion-carrito.php?cat=<?php echo strtolower($category['category']); ?>"><?php echo $category['category']; ?></a></li>
                <?php  if( $countC  < ( count ($categories) -1 ) ) {?>
                    <li class="divider"></li>
                <?php } $countC++;
              }?>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nosotros  <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="nosotros.php">Quienes somos</a></li>
            <li class="divider"></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">At. al cliente  <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="atalcliente.php">Como comprar</a></li>
            <li class="divider"></li>
            <li><a href="atalcliente.php">Política de devolución</a></li>
            <li class="divider"></li>
            <li><a href="atalcliente.php">FAQS</a></li>

          </ul>
        </li>

        <li class="item-carro">
          <ul class="nav navbar-nav navbar-right carro">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> 2 <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-cart" role="menu">
                <li>
                  <span class="item">
                    <span class="item-left">
                      <span class="item-info">
                        <span>Una remera</span>
                        <span>$23</span>
                      </span>
                    </span>
                  <span class="item-right">
                  <button class="btn btn-xs  pull-right">x</button>
                </li>
                <li>
                  <span class="item">
                    <span class="item-left">
                      <span class="item-info">
                        <span>otra remera</span>
                        <span>$23</span>
                      </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs  pull-right">x</button>
                    </span>
                  </span>
                </li>
                <li class="divider"></li>
                <li><a class="text-center" href="lista-compra.php">Ver carrito</a></li>
              </ul>
            </li>
          </ul>
        </li>


      </ul>



    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>
