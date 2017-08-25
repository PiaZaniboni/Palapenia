
<?php

/**
 * Replace all the characters for their correspondent code.
 *
 * @param string $s
 * @return string
 */
function replaceCharacters($s){
	
	//$s = utf8_decode($s);
	//$s = utf8_encode($s);
	
	$s = str_replace("á", "&aacute;", $s);
	$s = str_replace("Á", "&Aacute;", $s);
	$s = str_replace("é", "&eacute;", $s);
	$s = str_replace("É", "&Eacute;", $s);
	$s = str_replace("í", "&iacute;", $s);
	$s = str_replace("Í", "&Iacute;", $s);
	$s = str_replace("ó", "&oacute;", $s);
	$s = str_replace("Ó", "&Oacute;", $s);
	$s = str_replace("ú", "&uacute;", $s);
	$s = str_replace("Ú", "&Uacute;", $s);
	$s = str_replace("ñ", "&ntilde;", $s);
	$s = str_replace("Ñ", "&Ntilde;", $s);
	$s = str_replace("¿", "&iquest;", $s);
	$s = str_replace("'", "&prime;", $s);
	$s = str_replace('"', "&quot;", $s);
	$s = str_replace('“', "&quot;", $s);
	$s = str_replace('”', "&quot;", $s);
	$s = str_replace('?', "&quot;", $s);
	$s = str_replace("º", "&deg;", $s);
	$s = str_replace("°", "&deg;", $s);
	$s = str_replace("ü", "&uuml;", $s);
	$s = str_replace("Ü", "&Uuml;", $s);
	$s = str_replace("´", "&prime;", $s);

	return $s;

}

/**
 * Get the ID of the last element just added to a certain table.
 *
 * @param string $tableName
 * @return integer
 */
function getLastId($tableName){
	$sql = "SELECT * FROM " . $tableName . " ORDER BY id_" . $tableName . " DESC LIMIT 0, 1";
	$res = DB::query($sql);
	$row = mysqli_fetch_assoc($res);
	return $row["id_" . $tableName];
}

/**
 * Summarize a text to a certain length of characters.
 *
 * @param string $txt
 * @param integer $charactersCount
 * @return string
 */
function summarize($txt, $charactersCount = 100){
	if(strlen($txt) > $charactersCount){
		return substr($txt, 0, strrpos(substr($txt, 0, $charactersCount), ' ')) . "...";
	} else {
		return $txt;
	}	
}

/**
 * Generate the url's to redirect.
 *
 * @return string
 */
function generateURL($controller, $action){
    if(ACTIVATE_URL_FRIENDLY){
    	return APP_PATH . "/login";
    } else {
        return APP_PATH . "/index.php?c=" . $controller . "&a=" . $action;
    }
}

?>
