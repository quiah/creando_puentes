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

	$id = $_POST['numero'];
	$numero = clear($id,"numero");

	$qry="DELETE FROM emails WHERE emailId = '".$numero."'";
	//echo $qry;
	if ($mysqli->real_query($qry)) {
		# code...
		echo "1";
	}else {
		# code...
		echo "0";
	}
?>