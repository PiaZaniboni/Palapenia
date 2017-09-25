 <!DOCTYPE html>
<html>
<?php include 'head.php';?>
<body>

<!-- Nav -->
<?php include 'nav.php';?>

<div id="contacto">
    <div class="container">
        <div class="row">
            <div class="jumbotron hero-spacer">
                <div class="col-md-6 ">
                    <div class="row">
                        <h2>CONTACTANOS</h2>
                        <form id="frm-contact" action="#" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" id="" placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                   <input name="email" type="email" class="form-control" id="exampleInputEmail" placeholder="e-mail" required>
                                </div>
                                <div class="form-group">
                                   <textarea name="message" class="form-control" id="description" placeholder="..." required></textarea>
                                </div>
                                <div class="btn-submit">
                                    <a class="submit" href="">Enviar</a>
                                    <p class="frm-message"></p>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <div class="contacto">
                        <ul class="fa-ul">
                            <li>
                                <a href="https://www.facebook.com/indumentariapalapenia/" target="_blank">
                                    <i class="fa-li fa fa-facebook-square fa-lg" aria-hidden="true" ></i>
                                    IndumentariaPalapenia
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/palapenia/" target="_blank">
                                    <i class="fa-li fa fa-instagram fa-lg" aria-hidden="true"></i>
                                    Palapenia
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa-li fa fa-envelope-o fa-lg" aria-hidden="true"></i>
                                    Mayoristas: ventas@palapenia.com </br>
                                    Minoristas: info@palapenia.com
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa-li fa fa fa-phone fa-lg" aria-hidden="true"></i>
                                    11.5489.9329
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa-li fa fa-map-marker fa-lg" aria-hidden="true"></i>
                                    City Bell, La Plata
                                </a>
                            </li>
                        </ul>
                    </div>


                </div>
                <div class="col-md-6 ">
                    <img class="img-responsive animated fadeIn" src="images/S6.jpg" alt="" >
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer-info.php'; ?>
<?php include 'footer.php';?>
</body>

</html>