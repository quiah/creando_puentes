<?php 

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos']=0;
}

$user="";
$pass="";
$mensaje="";

?>
 <!DOCTYPE html>
 <html >
     <head>
         <title>Login</title>
         
         <?php include_once('./includes/css.php'); ?>
     </head>

     <body style="">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                     &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     &nbsp;
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-4"></div>
                <div class="col-xs-12 col-md-5">
                    <h3 class="text-center">
                    Bienvenido al administrador <br>
                    Creando Puentes
                    </h3>
                    <div class="row">
                        <div class="col-md-12">
                             &nbsp;
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                             &nbsp;
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                             &nbsp;
                        </div>
                    </div>

                    <img src="includes/rec/creando_puentes.png" alt="" class="img-responsive center-block"> 
                    <div class="row">
                        <div class="col-md-12">
                             &nbsp;
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                             &nbsp;
                        </div>
                    </div>

                    <h4 class="text-center" >Iniciar sesión</h4>
                    
                    <form action="" method="post" id="form">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre*" name="usuario" id="usuario" value="<?php echo $user; ?>">
                        </div>
                            <br><br>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="password*"  name="contrasena" id="contrasena" value="<?php echo $pass; ?>">
                            <br><br>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default center-block" value="Iniciar sesión" id="btnIniciar"></input>
                        </div>
                        

                        
                    </form>

                    <span style="color:white"> <?php echo  $mensaje?> </span>

                    <div class="row">
                        <div class="col-md-12">
                             &nbsp;
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                             &nbsp;
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3"></div>
            </div>
        </div>



        <script type="text/javascript">
            <?php include_once('./includes/js/login.js'); ?>
        </script>
     </body>

 </html>