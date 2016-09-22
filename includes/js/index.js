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
    $btn.click(function() {
        $('body').fadeOut(2000, function(){
            window.location.href = "./index.php";
        });
    });
    /*$('.del').click(function(){
        
        
        
        $numero = {numero : $(this).attr("id")}
        r = confirm("¿Borrar Receta?" );
        if(r){

            $.ajax({
                    data: $numero,
                    url: './php/borrar/borrar.php',
                    type: 'post',
                    success: function(r){
                        if(r==1){
                            //alert("La receta fue creada Correctamente"+r);
                            location.reload();
                        }
                        else{
                            alert("Ocurrio un problema en el servicio intenta de nuevo");
                        }
                    }
                });
        }
    });*/
});