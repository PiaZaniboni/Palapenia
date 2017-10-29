<?php
require_once ('requests/mercadopago.php');

$mp = new MP('5948389012653210', 'zy8YXjEdOBEsHFadpOw4dvk1X9WvtHfa');

$preference_data = array(
	"items" => array(
		array(
			"title" => "The end",
			"quantity" => 2,
			"currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
			"unit_price" => 20.00
		)
	)
);

$preference = $mp->create_preference($preference_data);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pay</title>
	</head>
	<body>

		<a href="javascript:void(0)" class="add-to-cart">COMPRAR</a>
		<br />
		<br />

		<?php
		foreach($_COOKIE as $idProduct => $productCookie){
			echo 'hola';
		}?>
		jose

		<a href="<?php echo $preference['response']['init_point']; ?>">Paga bitch</a>

		<?php include 'footer.php';?>

	</body>
</html>
