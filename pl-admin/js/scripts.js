
	$(document).ready(function(e) {

        var url = "";

        $('.delete-link').on('click', function(event){
            event.preventDefault();
            url = $(this).attr("href");
            $('.modal-confirmation').modal('show');
        });

        $('.delete-yes').on('click', function(event){
            event.preventDefault();
            window.location = url;
        });

        $('.delete-no').on('click', function(event){
            event.preventDefault();
            $('.modal-confirmation').modal('hide');
        });

        $('select[name="id_category"]').on('change', function(event){
			//console.log("QUE ONDA");
            var idCategory = $(this).val();

			/*$.get('app/_get_waists.php?id_category=' + idCategory, function(data){

                var response = $.parseJSON(data);
                var waists = response.waists;
                var html = "";

                if(response.status === "Success"){
                    waists.forEach(function(waist, i) {
                        html += '<div class="col-md-3">' +
                            '<p>' + waist.waist + '</p>' +
                            '<input name="quantity_' + waist.waist.toLowerCase() + '" type="text" value="0">' +
                        '</div>';
                    });

                    $(".waists .options").html(html);
                }
            });*/

			$('.waists-clothes').css("display", "block");
        });

    });
