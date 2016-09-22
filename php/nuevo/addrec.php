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

	$nombre = $_POST['nombre'];
	$apP = $_POST['apP'];
	$apM = $_POST['apM'];
	$fecha = $_POST['fecha'];
	$calle = $_POST['calle'];
	$ex = $_POST['ex'];
	$tel = $_POST['tel'];
	$sexo = $_POST['sexo'];
	$turno = $_POST['turno'];

	
	$nombre = clear($nombre, "cadena");
	$apP = clear($apP, "cadena");
	$apM = clear($apM, "cadena");
	$calle = clear($calle, "cadena");
	$tel = clear($tel, "numero");
	$ex = clear($ex, "numero");
	$sexo = clear($sexo, "cadena");

	$insertar = "INSERT INTO beneficiario 
	(nombres, apPaterno , apMaterno , fechaNac, calle, numExt, telefono, 
	sexo, turno_id, usuario_id)  
	VALUES 
	('$nombre','$apP','$apM','$fecha','$calle','$ex','$tel','$sexo','$turno','QUIA')";
	//('" .$t. "','" .$i. "','" .$prep. "','" .$c. "')";

	if ($mysqli->real_query($insertar)) {
		# code...
		echo "1";
	}else {
		# code...
		echo "0";
	}




?>