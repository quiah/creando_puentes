<?php 
require_once("./includes/validacion.php"); 
require_once("./coneccion/conexion.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);


    $qry="SELECT * FROM emails"; 
    $mysqli->real_query($qry);
    $resultado = $mysqli->store_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador de Chia Natura</title>
    <?php include_once('./includes/css.php'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Chia Natura
                    </a>
                </li>
                <li class="t">
                    
                    <button id="salir" class="bnt btn-link" style="color:white">Salir</button>
                </li>
                <li>
                    <a href="./index.php">Recetas</a>
                </li>
                <li>
                    <a href="#">Newsletter</a>
                </li>
                <!--<li>
                    <a href="#">Vista Rapida de los Cambios</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>-->
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <button href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                        </button>
                        <h2 class="text-center">Correos inscritos</h2>
                        
                        <h3>Correos</h3>
                        <table class="table">
                        <thead>
                            <tr>
                                <!--<th class="hidden-xs"><input type="checkbox" id="all">Seleccionar todo</th>-->
                                <th></th>
                                <th>Correos</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php while( $row = $resultado->fetch_assoc() ) {?>
                                <tr>
                                <th></th>
                                <!--<th> <input type="checkbox" name="optradio" class="ch"> </th>-->
                                <th class="mails"> <?php echo $row['mail']; ?> </th>
                                <th><button class="btn btn-danger del" id="<?php echo $row['emailId']; ?>" role="button">Borrar</button></th>
                                </tr>
                              <?php } ?>
                        </tbody>
                    </table>
                    </div>
                    <div class="col-xs-12 col-md-4"></div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Titulo del correo*" name="t" id="t">
                            <br><br>
                            <input type="text" class="form-control" placeholder="Cuerpo*"  name="c" id="c">
                            <br><br>
                            <input type="text" class="form-control" placeholder="Link de la pagina a promocionar*"  name="l" id="l">
                            <br><br>
                            <button class="btn btn-success center-block" id="btnMail">Enviar mail</button>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4"></div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Menu Toggle Script -->
    <script>
    $(document).ready( function(){
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $btn = $("#salir");
        console.log($btn);
        $("#nueva").click(function(){
            
            $('body').fadeOut(1000, function(){
                window.location.href = "./php/nuevo/nuevo.php";
            });
        });
        $("#all").click(function () {
            $(".ch").prop('checked', $(this).prop('checked'));
        });
        $btn.click(function() {
            $('body').fadeOut(2000, function(){
                window.location.href = "./cerrar.php";
            });
        });

        $('.del').click(function(){
            $numero = {numero : $(this).attr("id")}
            r = confirm("¿Borrar email?" + $numero["numero"]);
            if(r){

                $.ajax({
                        data: $numero,
                        url: './php/borrar/borrar-mail.php',
                        type: 'post',
                        success: function(r){
                            if(r==1){
                                //alert("borrado"+r);
                                location.reload();
                            }
                            else{
                                alert("Ocurrio un problema en el servicio intenta de nuevo");
                            }
                        }
                    });
            }
        });
        $btnMail = $('#btnMail')
        $btnMail.click(function(){
            $btnMail.prop("disabled",true);
            $mails = $(".mails");

            $parametros = {
                "t" : $("#t").val(),
                "c" : $("#c").val(),
                "l": $("#l").val()
            };
        
            $.ajax({
                data: $parametros,
                url: './php/correo/envio.php',
                type: 'post',
                success: function(r){
                    if(r==1){
                        alert("El correo se envio correctamente" + r);
                        location.reload();
                        /*$('body').fadeOut(2000, function(){
                            window.location.href = "./index.php";
                        });*/
                    }
                    else{
                        alert("Ocurrio un problema en el servicio intenta de nuevo"+r);
                        $btnMail.prop("disabled",false);
                    }
                }
            });

        });
    });
    

    </script>

</body>

</html>
