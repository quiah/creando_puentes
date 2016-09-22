<?php 
	date_default_timezone_set('Etc/UTC');
	include_once('../../includes/validacion.php');
	require_once("../../coneccion/conexion.php"); 
	require_once("class.smtp.php");
	require_once("class.phpmailer.php");
	$t = $_POST["t"];
	$c = $_POST["c"];
	$l = $_POST["l"];

	$conMails = "SELECT * FROM emails";

	$mysqli->real_query($conMails);
    $resultado = $mysqli->store_result();

	

	$mail = new PHPMailer;

	$mail->setFrom('contacto@chianatura.org', 'Contacto');
	$mail->addReplyTo( 'contacto@chianatura.org' , 'Contacto');

	/*$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 2;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = "mail.chianatura.org";
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port = 587;
	//Whether to use SMTP authentication
	$mail->SMTPAuth = false;
	//Username to use for SMTP authentication
	//$mail->Username = "contacto@chianatura.org";
	//Password to use for SMTP authentication
	//$mail->Password = "contacto";*/

	while ($row = $resultado->fetch_assoc()) {

		# code...
		$mail->addAddress($row['mail'], '');
	}

	$mail->Subject = $t;

	$mail->IsHTML(true);
	$mail->Body ="<!DOCTYPE 'HTML PUBLIC -//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
	<html>
	<head>
	  <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
	  <meta charset='UTF-6'/>
	  <title>Chia natura</title>
	</head>
	<body>
	<div style=width: '640px; font-family: Arial, Helvetica, sans-serif;'>
	  <h1 style=''text-align:center;color:#c2bcbc>Chia natura.</h1>
	  <p style='font-size:30px;color:#82a540;text-align:center;text-transform: uppercase;'>".$c."</p><br>
	  <p style='font-size:30px;color:#82a540;text-align:center'>Visita el siguiente link para mas información: </p><br>
	  <p style='text-align:center;'><a href='".$l."' style='font-size:25px;color:#87294d;'>CHIA NATURA</a></p>
	  <div align='center'>
	    
	  </div>
	  <p>Enviado desde el formulario de <strong>CHIA NATURA</strong>.</p>
	  <p>ISO-8859-1  </p>
	  <a style='font-size:10px;' href='#'>Si quieres dejar de recibir correos sigue este enlace</a>
	  <p>Ó escribe a contacto@chianatura.org para dejar de recibir correos</p>
	</div>
	</body>
	</html>";
	if (!$mail->send()) {
    echo "0". $mail->ErrorInfo;
	} else {
	    echo "1";
	}

	

	



?>
