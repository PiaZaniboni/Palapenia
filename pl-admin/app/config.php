
<?php

define("DEFAULT_CONTROLLER", "product");

define("APP_NAME", "PALAPENIA");

define("TITLE_TEXT", "Administrador");
define("GO_TO_SITE_TEXT", "Ir al sitio");
define("CLOSE_SESSION_TEXT", "Cerrar sesi&oacute;n");
define("CONFIRMATION_TEXT", "¿Desea continuar?");
define("YES_TEXT", "Si");
define("NO_TEXT", "No");
define("REQUIRED_FIELDS_TEXT", "Los campos con * son obligatorios.");

if($_SERVER["HTTP_HOST"] === "localhost"){
	define("WEB_PATH", "http://localhost/palapenia");
	define("APP_PATH", "http://localhost/palapenia/pl-admin");

	define("DB_NAME", "palapenia-db");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");

	define("ACTIVATE_URL_FRIENDLY", false);
} else {
	define("WEB_PATH", "http://www.unbarco.com/palapenia");
	define("APP_PATH", "http://www.unbarco.com/palapenia/pl-admin");

	define("DB_NAME", "cw000502_ensimis");
	define("DB_USER", "cw000502_ensimis");
	define("DB_PASSWORD", "valaleSE92");

	define("ACTIVATE_URL_FRIENDLY", false);
}

?>