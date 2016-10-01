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
	$id = $_POST['ben_id'];
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

	$upData = "UPDATE beneficiario SET 
				nombres = '$nombre' , apPaterno='$apP' , 
				apMaterno='apM' , fechaNac='$fecha', calle='$calle', 
				numExt='$ex', telefono='$tel', 
				sexo='$sexo', turno_id='$turno' WHERE beneficiario_id='$id' ";
	//echo $upData;

	if ($mysqli->real_query($upData)) {
		# code...
		echo "1";
	}else {
		# code...
		echo "0";
	}
?>