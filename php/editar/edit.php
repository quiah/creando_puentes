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
		
		$con = "SELECT c.categoriaId,c.categoria, r.nombre, r.ingredientes,r.preparacion  FROM recetas r INNER JOIN cat_rec c  WHERE recetaId = '".$id.
		"' AND c.categoriaId = r.categoriaID";
		
		$mysqli->real_query($con);
		if( $r = $mysqli->store_result() ){
			$col=$r->fetch_assoc();
			//echo $col['categoria'].$col['nombre'];
		}else{
			echo "error";
		}

		

		


?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Receta</title>
	<meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Glucosa Comunicacion">

    
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
				<button href="#" role="button" class="btn btn-default" id="salir">regresar</button>
			</div>
			<div class="col-md-6">
				<form action="" method="post" enctype="multipart/form-data">
					<h2>Modificar receta</h2>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>

					<div class="form-goup">
						<input class="form-control" type="hidden" name="number" id="number" placeholder="Titulo*" maxlength="100" value="<?php echo $id; ?>" >
					</div><br><br>

					<div class="form-goup">
						<label for="">Categoria</label><br>
						<select class="form-control" id="cat" name="cat">
							<option value="<?php echo $col['categoria']; ?>"><?php echo $col['categoria']; ?></option>
							<?php 
								$cat = "SELECT * FROM cat_rec";
								$mysqli->real_query($cat);
								$re = $mysqli->store_result();
							?>

							<?php while( $colu = $re->fetch_assoc() ) {?>

								<?php if( strcmp($col['categoria'],$colu['categoria']) ){ ?>

	                                <option value="<?php echo $colu['categoriaId']; ?>">
	                                	<?php echo $colu['categoria']; ?>
	                                </option>
                                <?php } ?>
                            <?php } ?>
							
					        
					    </select>
					</div><br><br>

					<div class="form-goup">
						<label for="">Titulo</label><br>
						<input class="form-control" type="text" name="titulo" id="titulo" placeholder="Titulo*" maxlength="100" value="<?php echo $col['nombre']; ?>" required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Ingredientes (cada ingrediente separado por un "-" sin espacios)</label><br>
						<input class="form-control" type="text" name="in" id="in" placeholder="ej. agua-chia natura-nueces,almendras y pasas*" value="<?php echo $col['ingredientes']; ?>"required>
					</div><br><br>

					<div class="form-goup">
						<label for="">Preparación</label><br>
						<textarea class="form-control" rows="4" cols="100" placeholder="preparación*" id="prep" name="prep" style="max-width: 934px;max-height:110px;"><?php echo $col['preparacion'];?></textarea>
					</div>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>
					<div class="row"><div class="scol-md-12">&nbsp;</div></div>

					<input class="btn btn-default center-block" type="" id="a" value="Editar"></input>
					
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
						"number": $('#number').val(),
						"cat" : $("#cat").val(), 
						"titulo" : $("#titulo").val(),
						"in" : $("#in").val(),
						"prep": $("#prep").val()
					};
					//console.log($parametros);
					$.ajax({
						data: $parametros,
						url: './modrec.php',
						type: 'post',
						success: function(r){
							if(r==1){
								alert("La receta fue creada Correctamente");
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