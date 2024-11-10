$(document).ready(function(){

    var idmoneda;
    //carga el modal de embarque para modificar informacion
    $("#tableMoneda tbody").on("click",".btnEditarMoneda",function(){

        var row = $(this).parents('tr');
        idmoneda = (row.data("id_moneda"));
        var moneda = (row.data("moneda"));
        var tipocambio = (row.data("tipocambio"));
        var finicio = (row.data("finicio"));
        // var ffin = moment().format('YYYY-MM-DD');

        $("#mMoneda").modal({backdrop: 'static'});
        $("#btnUpdateMoneda").removeAttr("hidden");
        $("#btnSaveMoneda").attr("hidden",true);

        $(".txtipocambio").val(tipocambio);
        $(".txtmoneda").val(moneda);
        $("#txtfinicioMoneda").val(moment(finicio).format('YYYY-MM-DD'));
        $("#txtffinMoneda").val(moment().format('YYYY-MM-DD'));

        $(".txtipocambio").removeAttr("disabled");

        //Actualizamos el cargo
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#btnUpdateMoneda").on("click", function(e){
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

                idmoneda = idmoneda;
                var tipocambio = $("#txtipocambio").val();
                var finicio = $("#txtfinicioMoneda").val();
                var ffin = $("#txtffinMoneda").val();

                var action = $("#urlmonedadupdate").attr("href");
                var method = 'PATCH';
                var url = action+"/"+idmoneda;

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

                            $(".txtipocambio").attr("disabled",true);
                            $(".txtmoneda").attr("disabled",true);
                            $(".txtfinicioMoneda").attr("disabled",true);
                            $(".txtffinMoneda").attr("disabled",true);

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
                })
            }
        })
    })
})
