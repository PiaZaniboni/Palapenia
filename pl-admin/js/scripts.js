
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
            var idCategory = $(this).val();

            $.get('app/_get_subcategories.php?id_category=' + idCategory, function(data){
                var response = $.parseJSON(data);
                var subcategories = response.subcategories;
                var html = "";

                if(response.status === "Success"){
                    html += '<option value="" selected>Seleccionar</option>';
                    subcategories.forEach(function(subcategory, i) {
                        html += '<option value="' + subcategory.id_subcategory + '">' +  
                            subcategory.subcategory +
                        '</option>';
                    });

                    $('select[name="id_subcategory"]').html(html);
                }
            });
        });

        $('select[name="id_subcategory"]').on('change', function(event){
            var idSubcategory = $(this).val();

            $.get('app/_get_waists.php?id_subcategory=' + idSubcategory, function(data){
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
            });
        });

    });