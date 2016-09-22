<?php  
	$usuario = array("user" => "admin","pass" => "1234");
	if ($usuario["user"]=="admin" && $usuario['pass'] == "1234") {
		# code...
		echo $usuario["user"];
		echo $usuario["pass"];
	}
?>