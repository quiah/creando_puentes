<?php


/*define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','basechia');*/
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','puentes');


global $conexion;
global $mysqli;
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/* comprobar la conexión */
if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
    exit();
}

?>
