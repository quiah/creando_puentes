<?php  
	include_once('../../includes/validacion.php');
	require_once("../../coneccion/conexion.php");

	//filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH,);

	function clear($dato,$tipo){
		$buscar = array('%','/','_','<','>','-u','and','AND','DROP','CREATE','drop','create','SELECT','select');
		$remplazar = "";
		

		switch ($tipo) {
			case 'cadena':
				# code...
				$dato = str_replace($buscar,$remplazar,$dato);
				return $dato;
				break;
			case 'numero':
				# code...

				return filter_var ( $dato, FILTER_SANITIZE_NUMBER_INT);
				break;

			case 'float':
				# code...
				return filter_var ( $dato, FILTER_SANITIZE_NUMBER_FLOAT);
				break;
			
			default:
				# code...
				return "nulo";
				break;
		}
	}
	$c = $_POST['cat'];
	$t = $_POST['titulo'];
	$i = $_POST['in'];
	$prep = $_POST['prep'];

	$c = clear($c,"numero");
	$t = clear($t, "cadena");
	$i = clear($i, "cadena");
	$prep = clear($prep, "cadena");

	$insertar = "INSERT INTO recetas  (nombre, ingredientes, preparacion, categoriaID)  VALUES ('" .$t. "','" .$i. "','" .$prep. "','" .$c. "')";

	/*echo $insertar;*/
	if ($mysqli->real_query($insertar)) {
		# code...
		echo "1";
	}else {
		# code...
		echo "0";
	}




?>