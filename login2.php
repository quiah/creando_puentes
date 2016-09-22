<?php 
    require_once("./includes/validacion.php");
    require_once("./coneccion/conexion.php"); 
    $user='';
    $pass='';
    $mensaje='';
    if (!function_exists("GetSQLValueString")) {
        function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
            if (PHP_VERSION < 6) {
                $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
            }
            $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);
            switch ($theType) {

            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
            }
            return $theValue;
        }
    }
    $user=$_POST['u'];
    $pass=$_POST['c'];
    //echo $user.$pass;
    $qry="SELECT * FROM usuario WHERE nombre = '".$user."'"." and cont = '".$pass."'"; 
    $mysqli->real_query($qry);



    if ($resultado = $mysqli->store_result()) {
        //printf("La selección devolvió %d filas.\n", $resultado->num_rows);
        while($row = $resultado->fetch_assoc()){
           //echo $row["nombre"].$row["cont"];
            $_SESSION['usuarioAdmin']=$user;
            echo "1";
        }
    }else{
        echo "0";
    }
    


?>