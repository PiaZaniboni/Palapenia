
<?

require_once("_main.php");

$waists = getWaistsPorIdCategory($_GET['id_category']);
$html = "";

if(count($waists) === 2){
	$html .= '
    <div class="col-md-6">
        <p>'. $waists[0]->getWaist() . '</p>
        <input name="quantity_' . $waists[0]->getIdWaist() . '" type="text" value="0">
    </div>
    <div class="col-md-6">
        <p>'. $waists[1]->getWaist() . '</p>
        <input name="quantity_' . $waists[1]->getIdWaist() . '" type="text" value="0">
    </div>';
} else if(count($waists) === 3){
    $html .= '<div class="col-md-4">
        <p>'. $waists[0]->getWaist() . '</p>
        <input name="quantity_' . $waists[0]->getIdWaist() . '" type="text" value="0">
    </div>
    <div class="col-md-4">
        <p>'. $waists[1]->getWaist() . '</p>
        <input name="quantity_' . $waists[1]->getIdWaist() . '" type="text" value="0">
    </div>
    <div class="col-md-4">
        <p>'. $waists[2]->getWaist() . '</p>
        <input name="quantity_' . $waists[2]->getIdWaist() . '" type="text" value="0">
    </div>';
}

$status = "Success";
echo (json_encode(array(
	"status" => $status,
	"html_waists" => $html
	)
));
