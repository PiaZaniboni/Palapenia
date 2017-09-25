(function( $ ) {

    //Function to animate slider captions
    function doAnimations( elems ) {
        //Cache the animationend event in a variable
        var animEndEv = 'webkitAnimationEnd animationend';

        elems.each(function () {
            var $this = $(this),
                $animationType = $this.data('animation');
            $this.addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
            });
        });
    }

    //Variables on page load
    var $myCarousel = $('#carousel-example-generic'),
        $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

    //Initialize carousel
    $myCarousel.carousel();

    //Animate captions in first slide on page load
    doAnimations($firstAnimatingElems);

    //Pause carousel
    $myCarousel.carousel('pause');


    //Other slides to be animated on carousel slide event
    $myCarousel.on('slide.bs.carousel', function (e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
    });

})(jQuery);

//boton elección producto

$(document).ready(function () {
    $(".btn-select").each(function (e) {
        var value = $(this).find("ul li.selected").html();
        if (value != undefined) {
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
    });

    /*--------------------------------------------------------------
    ## Boton Contacto
    --------------------------------------------------------------*/
        /*$("a.submit").click(function(e){

            e.preventDefault();

            var posting = $.post("requests/_send_contact.php", $("#frm-contact").serialize());

            posting.done(function(data){
            $("#frm-contact")[0].reset();
                if(data === 0){
                    $(".frm-message").text("[ Error. Intente nuevamente ]").fadeIn(400).delay(3000);
                } else {
                    $(".frm-message").text("[ Gracias ]").fadeIn(400).delay(3000);
                }
            });

        });*/

        /*--------------------------------------------------------------
        ## Seleccion color
        --------------------------------------------------------------*/
        $(".color-producto").click(function(){
            var selectColor = $(this).attr('data-id-color')
            //console.log(selectColor );
            $(".color-producto").removeClass("selected");
            $(this).addClass("selected");
            $('.select-talle').fadeOut();
            $('.talle-' + selectColor).fadeIn();

            //Reseteamos Talle y stock
            $("#stock-producto").val(1);
            $( ".select-talle"  ).removeClass( "selected" );
            $( ".click-"+selectColor+"-1"  ).addClass( "selected" );

            $(".stock-oculto").removeClass("talleMax");
            $(".co-"+selectColor+"-tl-1").addClass("talleMax");
            var valorMaximoStock2 = $(".co-"+selectColor+"-tl-1").attr("data-max-stock");
            $("#stock-producto").attr('max', valorMaximoStock2 );

        });

        $(document).on('click', '.btn-comprar', function(){
            var colorSelecciono = $(this).parent().find('.col-color').find('.color-lista').find('.selected').attr('data-name-color');
            var waistSelecciono = $(this).parent().find('.col-talle').find('.select-talle').find('.selected').attr('data-talle');
            var stockSelecciono = $("#stock-producto").val();
            var productPrice = $(this).parent().find('.producto-price').attr('data-price');
            var total = 0;
            var idProduct = $(this).parent().attr('data-product');


            console.log( "Id producto " + idProduct );
            console.log( "Color producto " + colorSelecciono );
            console.log( "Talle producto " + waistSelecciono );
            console.log( "Stock producto " + stockSelecciono );
            console.log ( "Producto Precio " + productPrice );

            if(Cookies.get(idProduct) !== undefined){

                var productCookies = Cookies.get(idProduct);

                console.log(JSON.parse(productCookies));

                var colorCookies = JSON.parse(productCookies).color;
                var waistCookies = JSON.parse(productCookies).waist;
                var quantityCookies = JSON.parse(productCookies).quantity;

                console.log(colorCookies);
                console.log(waistCookies);
                console.log(quantityCookies);

                console.log(waistCookies.indexOf(waistSelecciono));

                if(waistCookies.indexOf(waistSelecciono) >= 0){
                    var indexWaist = waistCookies.indexOf(waistSelecciono);

                    colorCookies[indexWaist] = colorSelecciono;
                    quantityCookies[indexWaist] = stockSelecciono;
                } else {
                    waistCookies.push(waistSelecciono);
                    colorCookies.push(colorSelecciono);
                    quantityCookies.push(stockSelecciono);
                }

                console.log(waistCookies);
                console.log(colorCookies);
                console.log(quantityCookies);

                $.each(quantityCookies, function(k, v){
                    total += productPrice * v;
                });

                if(total > 0){
                    var product = { waist: waistCookies, color: colorCookies, quantity: quantityCookies, total: total };
                    Cookies.set( idProduct , JSON.stringify(product), { expires: 0.250 });

                    var cookiesall = Cookies.get();
                    console.log("viejo", cookiesall);
                }

            } else {
                total = productPrice * stockSelecciono;

                if(total > 0){
                    var product = { /*id_product: idProduct,*/ waist: waistSelecciono.split(), color: colorSelecciono.split(), quantity: stockSelecciono.split(), total: total };
                    //var idCompra = Date.now();
                    //console.log(idCompra);
                    Cookies.set( idProduct , JSON.stringify(product), { expires: 0.250 });

                    var cookiesall = Cookies.get();
                    console.log("nuevo", cookiesall);
                }
            }

            setTimeout(function(){ window.location="lista-compra.php"; }, 1000);
        });

        $(document).on('click', '.btn-eliminar-producto', function(){
            var productoBorrar = $(this).attr("data-compra");
            console.log(productoBorrar);
            Cookies.remove(productoBorrar);
            var cajitaProducto = $(this).parent().parent();
            $(cajitaProducto).fadeOut();
            console.log (Cookies.get());
            window.location.reload();
        });

});

$(document).on('click', '.btn-select', function (e) {
    e.preventDefault();
    var ul = $(this).find("ul");
    if ($(this).hasClass("active")) {
        if (ul.find("li").is(e.target)) {
            var target = $(e.target);
            target.addClass("selected").siblings().removeClass("selected");
            var value = target.html();
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
            //Stock por talle
            var idTalleColor = target.attr('data-id-color');
            var idTalle = target.attr('data-id-talle');

            $(".stock-oculto").removeClass("talleMax");
            $(".co-"+idTalleColor+"-tl-"+idTalle).addClass("talleMax");
            var valorMaximoStock = $(".co-"+idTalleColor+"-tl-"+idTalle).attr("data-max-stock");
            $('#stock-producto').val(1);
            $("#stock-producto").attr('max', valorMaximoStock );
            //console.log( valorMaximoStock  );
        }
        ul.hide();
        $(this).removeClass("active");

    }
    else {
        $('.btn-select').not(this).each(function () {
            $(this).removeClass("active").find("ul").hide();
        });
        ul.slideDown(300);
        $(this).addClass("active");
    }
});

$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});
//el otro slide
  jQuery(document).ready(function($) {

        $('.idCarousel').carousel({
                interval: 5000
        });

        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            //console.log(id_selector, id);
            jQuery('.idCarousel').carousel(parseInt(id));
        } catch (e) {
            //console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('.idCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});

  //animaciones
