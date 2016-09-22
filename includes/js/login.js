$(document).ready( function(){

    function validFrm(){
    // Campos de texto
    if($("#usuario").val() == "" || $("#contrasena").val() == ""){
        alert("completa este campo");
        $("#nombre").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    return true; // Si todo está correcto    
    }

    //---------------------------


    $("#btnIniciar").click(function() {
        if (validFrm()) {
            $params =  {"u" : $("#usuario").val() , "c" : $("#contrasena").val()};
            //console.log($params);
            /*
            $.ajax({
                data: $params,
                url: './login2.php',
                type: 'post',
                beforeSend: function(){
                    //alert('iniciando sesión');
                },
                success: function(res){
                    //alert(res);
                    if (res == 1) {
                        alert('Bienvenido')
                        $('body').fadeOut(2000, function(){
                            window.location.href = "./index.php";
                        });
                        
                    }else{
                        alert('Error de loggin');
                    }
                }

            });*/
            if ( $params["u"] == "quia" && $params["c"] == "123"){
                $('body').fadeOut(2000, function(){
                            window.location.href = "./index.php";
                        });
            }        
        }else{
            //console.log("completa los datos");
        }
    });
    //**************
});