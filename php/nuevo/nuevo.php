<?php 
	include_once('../../includes/validacion.php');
	require_once("../../coneccion/conexion.php");
	error_reporting(E_ALL);
	ini_set("display_errors", 1);


    $qry="SELECT * FROM cat_rec c "; 
    $mysqli->real_query($qry);
    $resultado = $mysqli->store_result();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nuevo beneficiario</title>
	<meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">

    
    <link rel="stylesheet" href="../../includes/css/theme.css" type="text/css">
    <script src="../../includes/js/jquery-1.7.2.js"></script>
    <link rel="stylesheet" href="../../includes/js/bootstrap.min.js" type="text/css">
</head>
<body style=" font-size: 18px; ">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-md-2">
				<div class="row">
	                <div class="scol-md-12">
	                     &nbsp;
	                </div>
	            </div>
	            <div class="row">
	                <div class="scol-md-12">
	                     &nbsp;
	                </div>
	            </div>
	            <div class="row">
	                <div class="scol-md-12">
	                     &nbsp;
	                </div>
	            </div>
				<button href=".././index.php" role="button" class="btn btn-default" id="salir">regresar</button>
			</div>
			<div class="col-md-6">
				<form action="" method="post" enctype="multipart/form-data">
					<h2>Crear un nuevo beneficiario</h2>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>

					<div class="form-goup">
						<label for="">Nombre</label><br>
						<input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre*" maxlength="100" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Apellido Paterno</label><br>
						<input class="form-control" type="text" name="apP" id="apP" placeholder="apellido paterno" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Apellido Materno</label><br>
						<input class="form-control" type="text" name="apM" id="apM" placeholder="apellido paterno" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Fecha nacimiento</label><br>
						<input class="form-control" type="date" name="fecha" id="fecha" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Calle</label><br>
						<input class="form-control" type="text" name="calle" placeholder="Calle" id="calle" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Numero de exterior</label><br>
						<input class="form-control" type="text" name="ex" placeholder="Numero exterior" id="ex" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Telefono</label><br>
						<input class="form-control" placeholder="telefono*" type="tel" name="tel" id="tel" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Sexo</label><br>
						<select class="form-control" id="sexo" name="sexo">
								<option value="H" >Hombre</option>
								<option value="M" >Mujer</option>
					    </select>
					</div><br><br>

					<div class="form-goup">
						<label for="">Turmo</label><br>
						<select class="form-control" id="turno" name="turno">
								<option value="1" >Matutino</option>
								<option value="2" >Vespertino</option>
					    </select>
					</div><br><br>


					
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>

					<input class="btn btn-default center-block" type="" id="a" value="Añadir"></input>

					<div class="row"><div class="scol-md-12">&nbsp;</div></div>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>
					
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>

	</div>
	<script language = javascript>
		//alert("error al crear alumno")
		$(document).ready( function(){
			$("#salir").click(function(){
				$('body').fadeOut(1000, function(){
                window.location.href = "../.././index.php";
            });
		});


			function validData(){

				if($("#nombre").val() == "" ){
					$("#nombre").focus();   
                	return false;
				}else{
					if ($("#apP").val() == "") {
						$("#apP").focus(); 
                		return false;
					}else{
						if ($("#apM").val() == "") {
							$("#apM").focus(); 
                			return false;
						}else{
							if ($("#calle").val() == ""){
								$("#calle").focus();
								return false;
							}else{
								if ($("#ex").val() == ""){
									$("#ex").focus();
									return false;
								}else{
									if ($("#tel").val() == ""){
										$("#tel").focus();
										return false;
									}else{
										return true;
									}
								}
							}
						}//else
					}//else 
				}//else
			}//valid data
			//./addrec.php

			$btnAdd = $("#a");
			$btnAdd.click(function(){
				if(validData()){
					$parametros = {
						"nombre" : $("#nombre").val(), 
						"apP" : $("#apP").val(),
						"apM" : $("#apM").val(),
						"fecha": $("#fecha").val(),
						"calle": $("#calle").val(),
						"ex": $("#ex").val(),
						"tel": $("#tel").val(),
						"sexo": $("#sexo").val(),
						"turno": $("#turno").val()
					};
					//console.log($parametros);
					$.ajax({
						data: $parametros,
						url: './addrec.php',
						type: 'post',
						success: function(r){
							if(r==1){
								alert("Beneficiario creado");
								$('body').fadeOut(2000, function(){
                                    window.location.href = "../.././index.php";
                                });
							}
							else{
								alert("Ocurrio un problema en el servicio intenta de nuevo");
							}
						}
					});
				}//if
				
			});//btn

		});//ready function
		
	</script>	
</body>
</html>