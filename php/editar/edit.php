<?php 
	include_once('../../includes/validacion.php');
	require_once("../../coneccion/conexion.php");


	$id = $_GET['id'];
	function clear($dato,$tipo){
		$buscar = array('%','/','_','<','>','-u','and','AND','DROP');
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

		$id = clear($id,"numero");
		
		/*$con = "SELECT c.categoriaId,c.categoria, r.nombre, r.ingredientes,r.preparacion  FROM recetas r INNER JOIN cat_rec c  WHERE recetaId = '".$id.
		"' AND c.categoriaId = r.categoriaID";*/

		$con = "SELECT * FROM beneficiario WHERE beneficiario_id = '$id' ";
		
		$mysqli->real_query($con);
		if( $r = $mysqli->store_result() ){
			$ben=$r->fetch_assoc();
			//echo $col['categoria'].$col['nombre'];
		}else{
			echo "error";
		}


		

		


?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Beneficiario</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">

    
    <link rel="stylesheet" href="../../includes/css/theme.css" type="text/css">

    <script src="../../includes/js/jquery-1.7.2.js"></script>
    <script rel="stylesheet" href="../../includes/js/bootstrap.min.js" type="text/css">
    </script>
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
				<button href="#" role="button" class="btn btn-default" id="salir">regresar</button>
			</div>
			<div class="col-md-6">
				<form action="" method="post" enctype="multipart/form-data">
					<h2>Editar beneficiario</h2>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>

					<div class="form-goup">
						<label for="">Nombre</label><br>
						<input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre*" maxlength="100" value="<?php echo $ben['nombres']; ?>" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Apellido Paterno</label><br>
						<input class="form-control" type="text" name="apP" id="apP" placeholder="apellido paterno" value="<?php echo $ben['apPaterno']; ?>" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Apellido Materno</label><br>
						<input class="form-control" type="text" name="apM" id="apM" placeholder="apellido paterno" value=" <?php echo $ben['apMaterno']; ?> " required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Fecha nacimiento</label><br>
						<input class="form-control" type="date" name="fecha" id="fecha" value="<?php echo str_replace(" ", "", date('Y-m-d',strtotime($ben["fechaNac"]))); ?>" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Calle</label><br>
						<input class="form-control" type="text" name="calle" placeholder="Calle" id="calle" value="<?php echo $ben['calle']; ?>" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Numero de exterior</label><br>
						<input class="form-control" type="text" name="ex" placeholder="Numero exterior" id="ex"
						value="<?php echo $ben['numExt']; ?>" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Telefono</label><br>
						<input class="form-control" placeholder="telefono*" type="tel" name="tel" id="tel"  
						value="<?php echo $ben['telefono']; ?>"  required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Sexo</label><br>
						<select class="form-control" id="sexo" name="sexo">
								<option value="H" <?php if ($ben['sexo'] == "H" ) echo "selected"; ?>>Hombre</option>
								<option value="M" <?php if ($ben['sexo'] == "M" ) echo "selected"; ?> >Mujer</option>
					    </select>
					</div><br><br>

					<div class="form-goup">
						<label for="">Turmo</label><br>
						<select class="form-control" id="turno" name="turno">
								<option value="1" <?php if ($ben['turno_id'] == "1" ) echo "selected"; ?> >Matutino</option>
								<option value="2" <?php if ($ben['turno_id'] == "2" ) echo "selected"; ?> >Vespertino</option>
					    </select>
					</div><br><br>


					
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>
					<input type="hidden" name="ben_id" id="ben_id" value="<?php echo $ben['beneficiario_id']; ?>">
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

				if($("#titulo").val() == "" ){
					$("#titulo").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                	return false;
				}else{
					if ($("#in").val() == "") {
						$("#in").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                		return false;
					}else{
						if ($("#prep").val() == "") {
							$("#prep").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                			return false;
						}else{return true;}
					}
				}
			}//valid data
			//./addrec.php

			$btnAdd = $("#a");
			$btnAdd.click(function(){
				if(validData()){
					$parametros = {
						"ben_id" : $("#ben_id").val(),
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
						url: './modrec.php',
						type: 'post',
						success: function(r){
							if(r==1){
								alert("Beneficiafio editado");
								$('body').fadeOut(2000, function(){
                                    window.location.href = "../.././index.php";
                                });
							}
							else{
								alert(r);
							}
						}
					});
				}
				
			});

		});
		
	</script>	
</body>
</html>