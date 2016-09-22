<?php 
//require_once("includes/settings.php");
require_once("./includes/validacion.php");
/*$link=URL;*/
session_unset();
session_destroy();
//echo "string cerrar";
header("Location: ./login.php");

?>