/*Permite el envio de formulario ajax*/

$(document).ready(function () {

    $("#formulario1").bind("submit",function(){

        // Capturamnos el boton de envío
        var btnEnviar = $("#btnEnviar");

        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data:$(this).serialize(),

            beforeSend: function(){
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                // btnEnviar.text("Enviando"); Para button <button></button>
                btnEnviar.val("Guardando"); // Para input de tipo button

                btnEnviar.attr("disabled","disabled");
                $("#cargador").attr("style","display:block");
                $("#div_carga").attr("style","display:block");
                
            },
            complete:function(data){
                /*
                * Se ejecuta al termino de la petición
                * */
                btnEnviar.val("Guardar");
                btnEnviar.removeAttr("disabled");
            },
            success: function(data){
                /*
                * Se ejecuta cuando termina la petición y esta ha sido
                * correcta
                * */
                $("#mensaje").html(data);
                $("#mensaje").attr("style","display:block");
                 $("#cargador").attr("style","display:none");
                 $("#div_carga").attr("style","display:none");

            },
            error: function(data){
                /*
                * Se ejecuta si la peticón ha sido erronea
                * */
                alert("Problemas al tratar de guardar"+data);
            }
        });

        // Nos permite cancelar el envio del formulario
        return false;

    });
});