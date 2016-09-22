<?php  
	
	include_once('../../includes/validacion.php');
	require_once("../../coneccion/conexion.php");

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

	$n = $_POST['number'];
	$c = $_POST['cat'];
	$t = $_POST['titulo'];
	$i = $_POST['in'];
	$prep = $_POST['prep'];

	$n = clear($n,"numero");
	$c = clear($c,"numero");
	$t = clear($t, "cadena");
	$i = clear($i, "cadena");
	$prep = clear($prep, "cadena");

	$upData = "UPDATE recetas SET nombre='" .$t. "', ingredientes='" .$i. "', preparacion='" .$prep. "', categoriaID='" .$c. "' WHERE recetaId='" .$n. "' ";
	/*echo $upData;*/

	if ($mysqli->real_query($upData)) {
		# code...
		echo "1";
	}else {
		# code...
		echo "0";
	}
?>