 <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/principal.js"></script>
    <script src="https://use.fontawesome.com/e71eeac67c.js"></script>
    <script type="text/javascript" src="js/wow.js"></script>

    <!--Cookies-->
    <script type="text/javascript" src="js/js.cookie.js"></script>


    <script>
              new WOW().init();
    </script>

    <script type="text/javascript">
			$(document).ready(function(){
			    /* Get iframe src attribute value i.e. YouTube video url and store it in a variable */
			    var url = $("#video-muestra").attr('src');

			    /* Assign empty url value to the iframe src attribute when
			    modal hide, which stop the video playing */
			    $("#videoCampania").on('hide.bs.modal', function(){
			        $("#video-muestra").attr('src', '');
			    });

			    /* Assign the initially stored url back to the iframe src
			    attribute when modal is displayed again */
			    $("#videoCampania").on('show.bs.modal', function(){
			        $("#video-muestra").attr('src', url);
			    });
			});
</script>
