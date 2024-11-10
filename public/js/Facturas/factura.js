$(document).ready(function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //abre modal factura y carga datos de factura
    $(".tablelistadoordenes tbody").on("click", ".btn-facturaorden",function(){

        var row=$(this).parents('tr');;
        var noorden=row.data("noorden");
        var cliente = row.data("remitente");
        listaFactura(noorden,cliente);
    });

    $(".tablaListadoFactura tbody").on("click", ".btn-verfact", function(){

        var row=$(this).parents('tr');;
        var noorden=row.data("noorden");
        var cliente = row.data("remitente");
        listaFactura(noorden,cliente);
    });


    $(".table_listaNofactura tbody").on("dblclick",".rownofactura", function(e){
        e.preventDefault();
        var row = $(this).parents('tr');
        var factura = row.data('nofactura');

        //obtiene datos de telef y direccion de existir el cliente
        $.ajax({
            type:"POST",
            url:"tofacturas",
            data:{
                identificador:"cargacliente",
                factura:factura
            },
            success:function(response){

                var jsonResults = JSON.parse(response);
                $.each(jsonResults.data, function( index, response ){
                    $("#txtclientefactura").val(response.cliente);
                    $("#txttelffactura").val(response.telefono);
                    $("#txtdirfactura").val(response.direccion);
                    $("#nofact").html(factura);
                    $("#txtobsfact").val(response.obs);

                    if(response.estado == "EMITIDA"){
                        $("#festadovalor").html(response.estado);
                        $("#fcancelado").html("");
                        $("#festadovalor").removeClass("bg-danger");
                        $("#festadovalor").addClass("bg-secondary");
                        $("#btnEditFactura").removeAttr("disabled");
                        $(".fa").addClass("enable");
                        $("#btnCancelFactura").removeAttr("disabled");
                        $("#btnFacturaPdf").removeAttr("disabled");
                    }
                    else{
                        $("#festadovalor").html(response.estado);
                        $("#fcancelado").html(moment(response.fcancelado).format('YYYY-MM-DD'));
                        $("#festadovalor").removeClass("bg-secondary");
                        $("#festadovalor").removeClass("text-black-50");
                        $("#festadovalor").addClass("bg-danger");
                        $("#festadovalor").addClass("text-white");
                        $("#btnEditFactura").attr("disabled",true);
                        $("#btnCancelFactura").attr("disabled",true);
                        $("#btnFacturaPdf").removeAttr("disabled");
                    }

                });

                $.ajax({
                    type:"POST",
                    url:"tofacturas",
                    data:{
                        identificador:"cargacargos",
                        factura:factura
                    },
                    success:function(response){

                        $(".table_listaitemfacturaBody tr").remove();
                        var jsonResults = JSON.parse(response);
                        if(jsonResults.success == true){
                            $.each(jsonResults.data, function( index, response ){
                                agregarFilaCargosFactura(response.tipocargo,response.pago,response.moneda,response.importe,response.um,response.ctdad,response.total,response.idcargo,response.idtipocargo,response.idpago,response.idmoneda);
                            });
                        }
                    }
                });

                $.ajax({
                    type:"POST",
                    url:"tofacturas",
                    data:{
                        identificador:"cargatotales",
                        factura:factura
                    },
                    success:function(response){

                        var jsonResults = JSON.parse(response);
                        $.each(jsonResults.data, function( index, response ){
                            if(response.iva == 0){
                                $("#switchiva").prop('checked',false);
                            }
                            else{
                                $("#switchiva").prop('checked',true);
                            }
                            $("#txtpreciosubtotalfact").val(response.subtotal.toFixed(2));
                            $("#txtivafact").val(response.iva);
                            $("#txtivavalor").val(response.valoriva.toFixed(2));
                            $("#txttotalfact").val(response.totalapagar.toFixed(2));
                        });
                    }
                });
            }
        });
    });

    //habilita campos para editar la factura
    $("#btnEditFactura").on("click", function(){
        $("#txtclientefactura").removeAttr("disabled");
        $("#txttelffactura").removeAttr("disabled");
        $("#txtdirfactura").removeAttr("disabled");
        $("#txtobsfact").removeAttr("disabled");
        $("#btn-actfactura").removeAttr("disabled");
        $("#btn-facturara").attr("disabled",true);
        $("#btnFacturaPdf").attr("disabled",true);
    });

    //Habilita campos para agregar cargos
    $("#btnNuevoCargo").on("click", function(){
        $("#txttipocargo").removeAttr("disabled");
        $("#txttipopago").removeAttr("disabled");
        $("#txtmoneda").removeAttr("disabled");
        $("#txtimporte").removeAttr("disabled");
        $("#txttipocobro").removeAttr("disabled");
    });

    //Agrega cargos a la factura
    $("#btn-addCargoToFactura").on("click", function(){
        var noblhouse=$("#txtblhousefactura").val();

        $("#txttelffactura").attr("disabled",false);
        $("#txtclientefactura").attr("disabled",false);
        $("#txtdirfactura").attr("disabled",false);
        $("#txttipopagofactura").attr("disabled",false);
        $("#txtobsfact").attr("disabled", false);
        $("#resetVtotal").attr("disabled",false);
        $("#btn-facturara").attr("disabled",false);
        $("#switchiva").attr("disabled",false);
        $("#btnEditFactura").attr("disabled",true);
        $("#btnCancelFactura").attr("disabled",true);
        $("#btn-actfactura").attr("disabled",true);
        $("#btnFacturaPdf").attr("disabled",true);
        $("#switchiva").prop('checked',false);
        $("#txtpreciosubtotalfact").val(0.00);
        $("#txtivafact").val(0);
        $("#txtivavalor").val(0.00);
        $("#txttotalfact").val(0.00);
        $(".table_listaitemfacturaBody tr").remove();

        $("#nofact").html("");
        $("#festadovalor").html("");
        $("#festadovalor").removeClass("bg-danger");
        $("#festadovalor").removeClass("text-white");
        $("#festadovalor").addClass("bg-secondary");
        $("#festadovalor").addClass("text-black-50");
        $("#txtdirfactura").val("");
        $("#txttelffactura").val("");
        $("#fcancelado").html("");

        $.ajax({
            type:"POST",
            url:"listadoItemCargos",
            data:{
                noblhouse: noblhouse
            },
            success:function(response){
                $(".table_listaitemfacturaBody tr").remove();
                var jsonResults = JSON.parse(response);
                if(jsonResults.success == true){
                    $.each(jsonResults.data, function( index, response ){
                        agregarFilaCargosFactura(response.tipo_cargo,response.tipo_pago,response.moneda,response.importe,response.um,response.ctdad,response.total,response.idcargo,response.idtipocargo,response.idpago,response.idmoneda);
                    });
                }
                else{
                    $("#txttelffactura").attr("disabled",true);
                    $("#txtclientefactura").attr("disabled",true);
                    $("#txtdirfactura").attr("disabled",true);
                    $("#txttipopagofactura").attr("disabled",true);
                    $("#txtobsfact").attr("disabled", false);
                    $("#resetVtotal").attr("disabled",true);
                    $("#btn-facturara").attr("disabled",true);
                    $("#switchiva").attr("disabled",true);
                    $("#switchiva").prop('checked',false);
                    $("#txtpreciosubtotalfact").val(0.00);
                    $("#txtivafact").val(0);
                    $("#txtivavalor").val(0.00);
                    $("#txttotalfact").val(0.00);
                    $(".table_listaitemfacturaBody tr").remove();

                    var message="La orden "+noblhouse+" no tiene productos asociados para la facturacion";
                    var title="Atencion !!!";
                    var error ='';
                    var win = 'error';
                    var reload=false;
                    showMessage(message,error,title,reload,win);
                }
            }
        });
    })

    //set valor null al precio cada vez que cambia
    $("#txtunidadfactura").on("change", function(){
        $("#txtpreciofactura").val("");
    });

    //carga inputo precio total
    $("#txtpreciofactura").on("focusout", function(){
        var um = $("#txtunidadfactura option:selected").val();
        var ctdad=$("#txtctdadfactura").val();
        var precio=$("#txtpreciofactura").val();
        var importe = 0;

        if(um == "KG"){
            importe = (ctdad*precio);
            $("#txtpreciototalfact").val(importe.toFixed(2));
        }
        else if(um == "LBS"){
            importe =(ctdad*2.2*precio);
            $("#txtpreciototalfact").val(importe.toFixed(2));
        }
        else{
            $("#txtpreciototalfact").val(precio.toFixed(2));
        }
    });

    //Cierra modal factura
    $("#btn-closeFactura").on("click", function(){
        $("#m-factura").modal("hide");
        $("#formFactura").trigger("reset");
        $("#txtctdadfactura").attr("disabled", true);
        $("#btnEditFactura").attr("disabled",true);
        $("#btnCancelFactura").attr("disabled",true);
        $("#btn-actfactura").attr("disabled",true);
        $("#btnFacturaPdf").attr("disabled",true);

        $("#txttelffactura").attr("disabled",true);
        $("#txtclientefactura").attr("disabled",true);
        $("#txtdirfactura").attr("disabled",true);
        $("#txttipopagofactura").attr("disabled",true);
        $("#txtobsfact").attr('disabled', true);
        $("#resetVtotal").attr("disabled",true);
        $("#btn-facturara").attr("disabled",true);
        $(".table_listaNofactura tbody tr").remove();
        $(".table_listaitemfacturaBody tr").remove();

        $("#nofact").html("");
        $("#festadovalor").html("");
        $("#fcancelado").html("");
        $("#festadovalor").removeClass("bg-danger");
        $("#festadovalor").removeClass("text-white");
        $("#festadovalor").addClass("bg-secondary");
        $("#festadovalor").addClass("text-black-50");
    });

    //agrega item factura
    $("#btn-addItemFact").on("click", function(){
        $("#txtctdadfactura").removeAttr("disabled");

    });

    //Abre modal de cargos
    $(".btn-cargos").on("click", function(){
        $("#m-cargos").modal({backdrop: 'static'});
        var noorden = $("#txtnoorden_prod").val();
        $("#txtorden_cargos").val(noorden);

        $.ajax({
            type: "POST",
            url: "listadoItemCargos",
            data:{
                noblhouse:noorden
            },
            success: function(response){
                $(".table_listaitemcargosBody tr").remove();
                var jsonResults = JSON.parse(response);
                $.each(jsonResults.data, function( index, response ){
                    agregarFilaCargos(response.no_orden,response.tipo_cargo,response.tipo_pago,response.moneda,response.importe,response.um,response.ctdad,response.total,response.tipocambio,response.idtipocargo,response.idpago,response.idmoneda,response.idcargo,response.fvencemoneda,response.facturado);
                });
            }
        });
    });

    //Cierra modal cargos
    $("#btn-closeCargos").on("click", function(){
        $("#m-cargos").modal("hide");
        $("#formCargos").trigger("reset");

        $("#btn-updItemCargos").attr("hidden",true);
        $("#btn-addItemCargos").removeAttr("hidden");

        $("#txttipocargo").attr("disabled",true);
        $("#txttipopago").attr("disabled",true);
        $("#txtimporte").attr("disabled",true);
        $("#txttipocobro").attr("disabled",true);
    });

    $(".btn-closefactpreview").on("click", function(){
        $("#facturaPDFView").modal("hide");
        $(".tbodydatosconceptos tr").remove();
    });

    $("#btncerrar-listadoFact").on("click", function(){
        $(".card-listadofactura").attr("hidden", true);
    });

    //carga tipo de cambio cuando se selecciona la moneda
    $("#txtmoneda").on("change", function(){
        var moneda = $("#txtmoneda  option:selected").val();
        $.get("tipocambio",{param: moneda}, function(response){

            $.each(response, function(index,value){
                $("#txttcambio").val(value.tipocambio.toFixed(2));
            });
        });
    })

    //Actualiza el valor total a cobrar
    $("#txtimporte").on("blur", function(){

        var importe =  $("#txtimporte").val();
        var tcambio = $("#txttcambio").val();
        var cantidad = $("#txtctdad").val();

        $("#txttotal").val((importe*tcambio*cantidad).toFixed(2));
    })

    //Carga valores a facturar
    $("#txttipocobro").on("change", function(){
        var orden = $("#txtnoorden_prod").val();
        var tipocobro = $.trim($("#txttipocobro option:selected").text());
        var valorcobro = parseInt($("#txttipocobro option:selected").val());
        var tcambio = $("#txttcambio").val();
        // var cantidad=$("#txtctdad");

        $("#txtimporte").val(valorcobro);
        var total = $("#txttotal");

        $.ajax({
            type: "POST",
            url: "tipocobroDetalle",
            data: {
                noblhouse: orden,
                tipocobro: tipocobro
            },
            success: function (response) {
                var jsonResults = JSON.parse(response);

                if(jsonResults.success == true){

                    if(tipocobro == "DOCUMENTO"){
                        $("#txtctdad").val("1");
                        var cantidad = $("#txtctdad").val();
                        total.val(parseInt(valorcobro*tcambio*cantidad));

                    }
                    else{
                        $.each(jsonResults.data, function( index, response ){

                            if(response.target == "PESO"){
                                $("#txtctdad").val(response.pesokg);
                                var cantidad = $("#txtctdad").val();
                                var resultado = parseInt(valorcobro*tcambio*cantidad).toFixed(2);
                                total.val(resultado);
                            }
                            else if(response.target == "BULTO 1.5KG" || response.target == "BULTO 3KG" || response.target == "BULTO 5KG" || response.target == "BULTO 10KG"){
                                $("#txtctdad").val(response.cantidad);
                                var cantidad = $("#txtctdad").val();
                                var resultado = parseInt(valorcobro*tcambio*cantidad).toFixed(2);
                                total.val(resultado);
                            }
                            else if(response.target == "M3"){
                                $("#txtctdad").val(response.mcubico);
                                var cantidad = $("#txtctdad").val();
                                var resultado = parseInt(valorcobro*tcambio*cantidad).toFixed(2);
                                total.val(resultado);
                            }
                            else if(response.target == "KG"){
                                $("#txtctdad").val(response.pvolumen);
                                var cantidad = $("#txtctdad").val();
                                var resultado = parseFloat(valorcobro*tcambio*cantidad).toFixed(2);
                                console.log(cantidad+"***"+resultado);
                                total.val(resultado);
                            }
                            else{
                                var message="Debe seleccionar la unidad por la que se calculara el importe total";
                                var title="Atencion";
                                var error ='';
                                var win = 'informacion';
                                var reload=false;
                                showMessage(message,error,title,reload,win);
                                $("#txtimporte").val("");
                                $("#txtctdad").val("");
                                $("#txttotal").val("");
                            }
                        });
                    }

                }
                else{
                    var message="La orden "+orden+" no tiene productos asociados para la facturacion";
                    var title="Atencion";
                    var error ='';
                    var win = 'informacion';
                    var reload=false;
                    showMessage(message,error,title,reload,win);

                    $("#txtimporte").val("");
                    $("#txtctdad").val("");
                    $("#txttotal").val("");
                }
            }
        });
    });

    //Carga formulario de cargos para editar alguno
    $(".table_listaitemcargos tbody").on("click",".btn-editprod", function(e){
        e.preventDefault();

        $("#btn-addItemCargos").attr("hidden",true);
        $("#btn-updItemCargos").removeAttr("hidden");

        var row = $(this).parents('tr');

        if(row.data('fvencemoneda') != ''){
            $("#txttipocargo option:selected").val(row.data("idtipocargo"));
            $("#txttipopago option:selected").val(row.data("idpago"));
            $("#txtmoneda option:selected").val(row.data("idmoneda"));
            $("#txttipocargo option:selected").text(row.data("tipocargo"));
            $("#txttipopago option:selected").text(row.data("tipopago"));
            $("#txtmoneda option:selected").text(row.data("moneda"));
            $("#txtimporte").val(row.data("importe"));
            $("#txttipocobro option:selected").val(row.data("importe"));
            $("#txttipocobro option:selected").text(row.data("um"));
            $("#txtctdad").val(row.data("ctdad"));
            $("#txttotal").val(row.data("total"));
            $("#txtidcargo").val(row.data("idcargo"));
            $("#txttcambio").val(row.data('tipocambio'));

            $("#txttipocargo").removeAttr("disabled");
            $("#txttipopago").removeAttr("disabled");
            $("#txtmoneda").removeAttr("disabled");
            $("#txtimporte").removeAttr("disabled");
            $("#txttipocobro").removeAttr("disabled");
        }
        else{
            
            $("#txttipocargo option:selected").val(row.data("idtipocargo"));
            $("#txttipopago option:selected").val(row.data("idpago"));
            $("#txtmoneda option:selected").val(row.data("idmoneda"));
            $("#txttipocargo option:selected").text(row.data("tipocargo"));
            $("#txttipopago option:selected").text(row.data("tipopago"));
            $("#txtmoneda option:selected").text(row.data("moneda"));
            $("#txtimporte").val(row.data("importe"));
            $("#txttipocobro option:selected").val(row.data("importe"));
            $("#txttipocobro option:selected").text(row.data("um"));
            $("#txtctdad").val(row.data("ctdad"));
            $("#txttotal").val(row.data("total"));
            $("#txtidcargo").val(row.data("idcargo"));
            $("#txttcambio").val("");

            $("#txttipocargo").removeAttr("disabled");
            $("#txttipopago").removeAttr("disabled");
            $("#txtmoneda").removeAttr("disabled");
            $("#txtimporte").removeAttr("disabled");
            $("#txttipocobro").removeAttr("disabled");
        }

        // $("#txttipocobro option[value="+ row.data("importe") +"]").attr("selected",true);
        // // $("#txttipocobro option[text="+ row.data("um") +"]").attr("selected",true);

    });

    //se va seleccionando los cargos a facturar
    $("#resetVtotal").on("click", function(e){
        e.preventDefault();
        $("#txtpreciosubtotalfact").val(0);
        $(".rowtotal").each(function(){
            //cada elemento seleccionado
            var vinicial = $("#txtpreciosubtotalfact").val();
            var total = parseFloat(vinicial)+parseFloat($(this).text());
            $("#txtpreciosubtotalfact").val(total.toFixed(2));
        });
        // $("input[name=checkboxfact]:checked").each(function(){

        //     //cada elemento seleccionado
        //     var vinicial = $("#txtpreciosubtotalfact").val();
        //     var total = parseFloat(vinicial)+parseFloat($(this).val());

        //     //alert(vinicial);
        //     $("#txtpreciosubtotalfact").val(total);
        // });

        if($("#switchiva").prop('checked')){
            $("#txtivafact").val("18");
            var iva = ($("#txtpreciosubtotalfact").val()*($("#txtivafact").val()/100)).toFixed(2);
            var subtotal = $("#txtpreciosubtotalfact").val();
            var total = (parseFloat(subtotal)+parseFloat(iva)).toFixed("2");
            $("#txttotalfact").val(total);
            $("#txtivavalor").val(iva);
        }
        else{
            var subtotal = $("#txtpreciosubtotalfact").val();
            $("#txttotalfact").val(subtotal);
            $("#txtivafact").val("0");
            $("#txtivavalor").val("0");
        }

    });

    //Genera los cargos a cobrar de forma automatica
    $("#btnGeneraCargosAutomaticos").on("click", function(e){
        e.preventDefault();
        var moneda = $.trim($("#txtmoneda option:selected").val());
        var noorden = $("#txtorden_cargos").val();
        $(".table_listaitemcargosBody tr").remove();

        if(moneda.length == 0){
            var message="El campo Moneda esta vacio";
            var title="Error";
            var error ='';
            var win = 'error';
            var reload=false;
            showMessage(message,error,title,reload,win);
        }
        else{
            $.ajax({
                type: "post",
                url: "generacargosautomatico",
                data: {
                    noorden:noorden,
                    moneda:moneda
                },
                success: function(data) {
                    if(data.success=="true"){
                        $.ajax({
                            type: "POST",
                            url: "listadoItemCargos",
                            data:{
                                noblhouse:noorden
                            },
                            success: function(response){
                                $(".table_listaitemcargosBody tr").remove();
                                var jsonResults = JSON.parse(response);
                                $.each(jsonResults.data, function( index, response ){
                                    agregarFilaCargos(response.no_orden,response.tipo_cargo,response.tipo_pago,response.moneda,response.importe,response.um,response.ctdad,response.total,response.tipocambio,response.idtipocargo,response.idpago,response.idmoneda,response.idcargo,response.fvencemoneda,response.facturado);
                                });
                            }
                        });
                    }
                    else{
                        $.ajax({
                            type: "POST",
                            url: "listadoItemCargos",
                            data:{
                                noblhouse:noorden
                            },
                            success: function(response){
                                $(".table_listaitemcargosBody tr").remove();
                                var jsonResults = JSON.parse(response);
                                $.each(jsonResults.data, function( index, response ){
                                    agregarFilaCargos(response.no_orden,response.tipo_cargo,response.tipo_pago,response.moneda,response.importe,response.um,response.ctdad,response.total,response.tipocambio,response.idtipocargo,response.idpago,response.idmoneda,response.idcargo,response.fvencemoneda,response.facturado);
                                });
                            }
                        });
                        var message="No existen productos pendientes de generar obligaciones de factura y cobro";
                        var title="Atencion";
                        var error ='';
                        var win = 'informacion';
                        var reload=false;
                        showMessage(message,error,title,reload,win);
                    }
                }
            });
        }
    });

    //Lista facturas segun formulario de busqueda
    $("#btn-fbuscar").on("click",function(e){
        e.preventDefault();
        var finicio = $('#txtfdesde').val();
        var ffin = $('#txtfhasta').val();
        var nofact= $("#txtnofact").val();
        var estado = $("#txtfestado option:selected").text();
        var concepto = $("#txtfconcepto option:selected").text();
        var embarque = $.trim($("#txtnoembarquelf option:selected").text());
        var fact;
        var desde;
        var hasta;

        if(nofact == ''){
            fact="SN";
        }
        else{
            fact=nofact
        }

        if(finicio == ''){
            desde="2022"+"-"+"01"+"-"+"01";
        }
        else{
            desde=finicio;
        }

        if(ffin == ''){
            hasta="3000"+"-"+"12"+"-"+"31";
        }
        else{
            hasta=ffin;
        }

        $("#btnFacturaExcel").attr("href","http://gloshima.localhost/excelf/"+embarque+"/"+desde+"/"+hasta+"/"+fact+"/"+estado+"/"+concepto+"");

        $(".tablaListadoFacturaBody tr").remove();
        $.ajax({
            type: "post",
            url: "listafacturas",
            data: {
                desde: desde,
                hasta: hasta,
                nofact:nofact,
                estado:estado,
                concepto:concepto,
                embarque:embarque
            },
            success: function (response) {
                var jsonResults = JSON.parse(response);

                if(jsonResults.success == true){

                    $.each(jsonResults.data, function( index, response ){
                        cargaListaFactura(response.id,response.nofactura,response.cliente,response.concepto,response.total,response.formapago,response.estado,response.emitida,response.modificada,response.idorden,response.idfpago,response.no_orden);
                    });
                    $(".ctdadFact").html(jsonResults.cantidad);
                    $(".factEmit").html(jsonResults.ctEmitida);
                    $(".factCancel").html(jsonResults.ctCancelada);
                    $(".importe").html(jsonResults.totalfact);
                }
                else{
                    var message="No existen facturas asociadas a los filtros de busqueda";
                    var title="Atencion";
                    var error ='';
                    var win = 'informacion';
                    var reload=false;
                    showMessage(message,error,title,reload,win);

                    $(".ctdadFact").html(jsonResults.cantidad);
                    $(".factEmit").html(jsonResults.ctEmitida);
                    $(".factCancel").html(jsonResults.ctCancelada);
                    $(".importe").html(jsonResults.totalfact);
                }
            }
        });
    });

    //Busca informacion en una tala html
    $("#findTablaFact").on("keyup", function() {
        var tabla = $(".tablaListadoFacturaBody tr");
        var query = $("#findTablaFact").val();
        buscarEnTabla(query,tabla);
    });
});


function agregarFilaCargos(no_orden,tipo_cargo,tipo_pago,moneda,importe,um,ctdad,total,tipocambio,idtipocargo,idpago,idmoneda,idcargo,fvencemoneda,facturado){

    var htmlTags = '<tr data-noorden="'+no_orden+'"data-tipocargo="'+tipo_cargo+'" data-tipopago="'+tipo_pago+'" data-moneda="'+moneda+'" data-importe="'+importe+'" data-um="'+um+'" data-ctdad="'+ctdad+'" data-total="'+total+'" data-tipocambio="'+tipocambio+'" data-idtipocargo="'+idtipocargo+'" data-idpago="'+idpago+'" data-idmoneda="'+idmoneda+'" data-idcargo="'+idcargo+'" data-fvencemoneda="'+fvencemoneda+'"  data-facturado="'+facturado+'">' +
           '<td class="rowtdcargos" hidden>'+no_orden+'</td>'+
           '<td class="rowtdcargos">'+tipo_cargo+'</td>'+
           '<td class="rowtdcargos">'+tipo_pago+'</td>'+
           '<td class="rowtdcargos">'+moneda+'</td>'+
           '<td class="rowtdcargos">'+importe+'</td>'+
           '<td class="rowtdcargos">'+um+'</td>'+
           '<td class="rowtdcargos">'+ctdad+'</td>'+
           '<td class="rowtdcargos">'+total.toFixed(2)+'</td>'+
           '<td class="rowtdcargos" hidden>'+tipocambio+'</td>'+
           '<td class="rowtdcargos" hidden>'+idtipocargo+'</td>'+
           '<td class="rowtdcargos" hidden>'+idpago+'</td>'+
           '<td class="rowtdcargos" hidden>'+idmoneda+'</td>'+
           '<td class="rowtdcargos" hidden>'+idcargo+'</td>'+
           '<td class="rowtdcargos" hidden>'+fvencemoneda+'</td>'+
           '<td class="rowtdcargos">'+facturado+'</td>'+
           '<td class="rowtdnewproducto"><button type="button" class="btn btn-sm btn-warning rounded ml-auto mr-1 btn-editprod"><i class="far fa-edit"></i></button><button type="button" class="btn btn-sm btn-danger rounded ml-auto btn-deletecargo"><i class="fas fa-trash-alt" data-toggle="tooltip" title="Eliminar"></i></button></td>' +
           '</tr>';
    $('.table_listaitemcargos tbody').append(htmlTags);
    if(facturado=="Y"){
        $(".btn-editprod").addClass("disabled");
        $(".btn-deletecargo").addClass("disabled");
    }
    else{
        $(".btn-editprod").removeClass("disabled");
        $(".btn-deletecargo").removeClass("disabled");
    }
}

function agregarFilaCargosFactura(tipocargo,tipopago,moneda,importe,um,ctdad,total,idcargo,idtipocargo,idpago,idmoneda){

    var htmlTags = '<tr data-tipocargo="'+tipocargo+'" data-tipopago="'+tipopago+'" data-moneda="'+moneda+'" data-importe="'+importe+'" data-um="'+um+'" data-ctdad="'+ctdad+'" data-total="'+total+'" data-idtipocargo="'+idtipocargo+'" data-idpago="'+idpago+'" data-idmoneda="'+idmoneda+'" data-idcargo="'+idcargo+'" >'+
        '<td class="rowtcargo">'+tipocargo+'</td>'+
        '<td class="rowtpago">'+tipopago+'</td>'+
        '<td class="rowtmoneda">'+moneda+'</td>'+
        '<td class="rowimporte">'+importe.toFixed("2")+'</td>'+
        '<td class="rowum">'+um+'</td>'+
        '<td class="rowctdad">'+ctdad+'</td>'+
        '<td class="rowtotal">'+total.toFixed(2)+'</td>'+
        '<td class="rowidtcargo" hidden>'+idtipocargo+'</td>'+
        '<td class="rowidpago" hidden>'+idpago+'</td>'+
        '<td class="rowidmoneda" hidden>'+idmoneda+'</td>'+
        '<td class="rowidcargo" hidden>'+idcargo+'</td>'+
        '</tr>';
    $('.table_listaitemfactura tbody').append(htmlTags);
}

function cargaListaFactura(id,nofactura,cliente,concepto,total,formapago,estado,emitida,modificada,idorden,idfpago,noorden){

    var htmlTags = '<tr data-id="'+id+'" data-nofactura="'+nofactura+'" data-cliente="'+cliente+'" data-concepto="'+concepto+'" data-total="'+total+'" data-formapago="'+formapago+'" data-estado="'+estado+'" data-emitida="'+emitida+'" data-modificada="'+modificada+'" data-idorden="'+idorden+'" data-idfpago="'+idfpago+'" data-noorden="'+noorden+'">' +
    '<td class="celdachkbox"><input type="checkbox" class="chkboxItemF" disabled></td>'+
    '<td class="tdfacturaid">'+id+'</td>'+
        '<td class="tdnofactura">'+nofactura+'</td>'+
        '<td class="tdfacturacliente">'+cliente+'</td>'+
        '<td class="tdconceptocliente">'+concepto+'</td>'+
        '<td class="tdfacturatotal">'+total.toFixed(2)+'</td>'+
        '<td class="tdfacturafpago">'+formapago+'</td>'+
        '<td class="tdfacturaestado">'+estado+'</td>'+
        '<td class="tdfacturafc">'+moment(emitida).format('DD/MM/YYYY')+'</td>'+
        '<td class="tdfacturafm">'+moment(modificada).format('DD/MM/YYYY')+'</td>'+
        '<td class="tdfacturaidorden" hidden>'+idorden+'</td>'+
        '<td class="rdfacturaidfpago" hidden>'+idfpago+'</td>'+
        '<td class="rdfacturaidfpago">'+noorden+'</td>'+
        '<td class="rowtdfact" style="text-align: center"><button class="btn btn-sm btn-secondary mr-auto btn-verfact"><i class="far fa-eye mr-1" data-toggle="tooltip" title="Ver Factura"></i>Ver</button><button class="btn btn-sm btn-second mr-auto btn-pdfFact btnPdf ml-1"><i class="fas fa-file-pdf mr-1" data-toggle="tooltip" title="Imprimir PDF"></i>Vista Previa</button></td>'
        '</tr>';
    $('.tablaListadoFactura tbody').append(htmlTags);
}

function agregarFilaFacturas(nofactura){
    var htmlTags = '<tr data-nofactura="'+nofactura+'">'+
        '<td class="rownofactura">'+nofactura+'</td>'+
        '</tr>';
    $('.table_listaNofactura tbody').append(htmlTags);
}

function estaFacturado(tabla,index){
    var MyRows = tabla.find('tbody').find('tr');
    for (var i = 0; i < MyRows.length; i++) {
        var MyIndexValue = $(MyRows[i]).find(index).text();

        if(MyIndexValue == "Y"){
            $(MyRows[i]).addClass("green");
            // $(MyRows[i]).find('td:input[type=checkbox]').attr("disabled",true);
            $(".table_listaitemfactura tbody tr td input[type=checkbox]").attr("disabled", "true");
        }
    }

}

function listaFactura(noorden,cliente){

    // var row=$(this).parents('tr');;
    // var noorden=row.data("noorden");
    // var cliente = row.data("remitente");
    // console.log(noorden);
    $.ajax({
        type:"POST",
        url:"tofacturas",
        data:{
            identificador:"carganofactura",
            noorden: noorden
        },
        success:function(response){
            var jsonResults = JSON.parse(response);

            if(jsonResults.success == true){
                $.each(jsonResults.data, function( index, response ){
                    agregarFilaFacturas(response.nofactura);
                });
                $("#m-factura").modal({backdrop: 'static'});
                $("#txtblhousefactura").val(noorden);
                $("#txtclientefactura").val(cliente);
            }
            else{
                var message="La orden "+row.data('noblhouse')+" no tiene productos asociados para la facturacion";
                var title="Atencion";
                var error ='';
                var win = 'informacion';
                var reload=false;
                showMessage(message,error,title,reload,win);
            }
        }
    });
}

function facturaPdf(nofactura){
    $.ajax({
        type: "post",
        url: "cargadatopreviewfactura",
        data: {
            factura:nofactura
        },
        success:function(response){
            var jsonResults = JSON.parse(response);
            if(jsonResults.success == true){
                $.each(jsonResults.data, function( index, response ){
                    $("#cliente").html(response.cliente);
                    $("#datoscliente").html(response.datoscliente);
                    $("#nofactura").html(response.nofactura);
                    $("#fecha_factura").html((response.fecha).substr(0,10));
                    $(".moneda").html("("+response.moneda+")");
                    $("#subtotalfp").html(response.subtotal.toFixed(2));
                    $(".iva_percent").html(" "+response.iva+"%");
                    $("#ivafp").html(response.valoriva.toFixed(2));
                    $("#descuentofp").html("0.00");
                    $("#totalfp").html(response.totalacobrar.toFixed(2));
                    if(response.estado == 'EMITIDA'){
                        $("#obsfp").html("FACTURA "+response.estado+"<br />"+response.obs);
                    }
                    else{
                        $("#obsfp").html("FACTURA "+response.estado+"<br /> FECHA CANCELADA: "+(response.fcancelado).substr(0,10)+"<br />"+response.obs);
                        $("#motivo").html("MOTIVO CANCELACION: "+response.motivocancelado);
                    }

                    cargatablafacturapreview(response.concepto,response.importe,response.ctdad,response.um,response.totalporconcepto);
                })
            }
        }
    })
    $("#facturaPDFView").modal({backdrop: 'static'});
}
