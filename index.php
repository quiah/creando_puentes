<?php 
require_once("./coneccion/conexion.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);

    $qry="SELECT * FROM beneficiario"; 
    $mysqli->real_query($qry);
    $resultado = $mysqli->store_result();

    /*while( $row = $resultado->fetch_assoc() ){
        echo $row['nombres'];
    }*/
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador de Creando puentes</title>
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
                    <img src="includes/rec/creando_puentes.png" alt="" class="img-responsive center-block" style=" max-width: 75px; max-height: 75px;"> 

                    </a>
                </li>
                <li class="t">
                    
                    <button id="salir" class="bnt btn-link" style="color:white">Salir</button>
                </li>
                <li>
                    <a href="#">Beneficiarios</a>
                </li>
                <li>
                    <a href="./newsletter.php">Maestros</a>
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
                    <div class="col-xs-12 col-md-12">
                        <button href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                        </button>
                        <h2 class="text-center">Alumnos Registrados</h2><br>
                        <button href="#" role="button" class="btn btn-default center-block" id="nueva">Agregar alumno</button>
                        <h3>Alumnos</h3>
                        <table class="table">
                        <thead>
                            <tr>
                                <th >Nombre</th>
                                <th class="hidden-xs">Fecha nacimiento</th>
                                <th class="hidden-xs">Telefono</th>
                                <th>Opciones</th>
                            </tr>
                            <?php while( $row = $resultado->fetch_assoc() ) {?>
                                <tr>
                                <th > <?php echo $row['nombres']; ?> </th>
                                <th class="hidden-xs"> <?php echo $row['fechaNac']; ?> </th>
                                <th class="hidden-xs"> <?php echo $row['telefono']; ?> </th>
                                <th> 
                                    <a id="link" href="php/editar/edit.php?id=<?php echo $row['beneficiario_id']; ?> ">Editar</a>
                                    
                                </th>
                                <th>
                                    <button class="btn btn-danger del" id="<?php echo $row['beneficiario_id'] ?>">Borrar</button>
                                </th>
                                
                              <?php } ?>
                        </thead>
                        <tbody>
                           
                       </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Menu Toggle Script -->
    <script type="text/javascript">
    
    <?php include_once('./includes/js/index.js'); ?>
    </script>

</body>

</html>
