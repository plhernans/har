$(document).ready(function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $("#btnSaveMoneda").on("click", function(e){
        e.preventDefault();

        var validaFormulario = $(".formMoneda").validate({
            rules:{
                txtmoneda:"required",
                txtipocambio:"required",
                txtfinicioMoneda:"required"
            },
            messages:{
                txtmoneda:"Este campo es obligatorio",
                txtipocambio:"Este campo es obligatorio",
                txtfinicioMoneda:"Este campo es obligatorio"
            }
        });

        if(validaFormulario.form()){
            var moneda = $("#txtmoneda").val();
            var tipocambio = $("#txtipocambio").val();
            var finicio = $("#txtfinicioMoneda").val();
            var ffin = $("#txtffinMoneda").val();

            var url = $("#formMoneda").attr("action");
            var method ="POST";

            $.ajax({
                type:method,
                url:url,
                data:{
                    moneda:moneda,
                    tipocambio:tipocambio,
                    finicio:finicio,
                    ffin:ffin
                },
                success:function(data){
                    if(data.success=="true"){
                        $("#msgsession").attr("hidden",true);
                        var message=data.message;
                        var title="Success!!!";
                        var error ='';
                        var reload = true;
                        var window="informacion";
                        showMessage(message,error,title,reload,window);
                        $(".formMoneda").trigger("reset");
                        $("#mMoneda").modal('hide');

                        $("#txtmoneda").attr("disabled", true);
                        $("#txtipocambio").attr("disabled", true);
                        $("#txtfinicioMoneda").attr("disabled", true);
                        $("#txtffinMoneda").attr("disabled", true);
                        $("#btnUpdateMoneda").attr("hidden",true);
                        $("#btnSaveMoneda").removeAttr("hidden");
                    }
                    else{
                        var sms = data.message;
                        $(".msgsession").attr("hidden",false);
                        $(".msg").html(sms).fadeOut(8000);
                    }
                },
                error:function(){
                    var sms = "Error, por favor contactar su Administrador de sistema";
                    $(".msgsession").attr("hidden",false);
                    $(".msg").html(sms).fadeOut(8000);
                }
            });
        }
    });
});
