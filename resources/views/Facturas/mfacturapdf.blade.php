<div class="modal mt-5 fade" id="facturaPDFView">
    <div id="facturaPDFViewDialog" class="modal-dialog modal-lg-dialog facturaPDFView">
        <div class="modal-content">
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
            <link href="{{ asset('css/Factura/styles.css') }}" rel="stylesheet">
            <link href="{{ asset('css/Factura/tables.css') }}" rel="stylesheet">

            <div class="col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                @include('partials._session-msg')

                    <div class="col-md-12 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card contenedor-facturaPDFView">
                            <div class="card-header d-flex justify-content-between bg-primary text-white">
                                <h3 id="title-factura">{{ __('Factura')}}</h3>
                            </div>
                            <div class="card-body">

                                {{-- <div class="container-factpdf"> --}}

                                    <table class="tablefactpdf col-md-12 col-lg-12">
                                        {{-- <caption></caption> --}}
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>&nbsp;</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3"><img src="{{asset('images/logo-goshima-transparente-395x300.png')}}" height="160px"></td>
                                                <td colspan="4" class="tdrigth" data-label="Compañ&iacute;a">
                                                    <b> FACTURA DE SERVICIOS<br /></b>
                                                    GLOSHIMA AF CARGO SRL<br />
                                                    EDUARDO HERNANDEZ DIAZ <br />
                                                    COMERCIAL<br />
                                                    RESIDENCIAL LOS GUAYABOS. STO DOMINGO OESTE<br />
                                                    REPUBICA DOMINICANA <br />
                                                    CEL.: 829 835 4354<br />
                                                    MAIL: eduardohav@gloshima.com<br />
                                                    RNC: 130729328<br />
                                                    www.gloshima.com<br />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <h2>Factura</h2> <br /> <b>Cliente: <span id="cliente"></span></a></b>
                                                </td>
                                                <td colspan="4" class="tdrigth"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" data-label="Dir"><span id="datoscliente"></span></td>
                                                <td colspan="2" class="tdrigth"><b>N&uacute;mero</b></td>
                                                <td colspan="2" class="tdrigth"><span id="nofactura"></span></td>
                                            </tr>
                                            <tr>
                                                {{-- <td colspan="3"><b>NIF:</b> H-11111 11111 --}}
                                                    <td colspan="3">
                                                <td colspan="2" class="tdrigth"><b>Fecha</b></td>
                                                <td colspan="2" class="tdrigth" colspan="2"><span id="fecha_factura"></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="7"> &nbsp;</td>
                                            </tr>

                                        </tbody>

                                        <thead>
                                            <tr>
                                                <th>C&oacute;digo</th>
                                                <th colspan="2" class="tdleft">Concepto</th>
                                                <th>Precio/U</th>
                                                <th>Cantidad</th>
                                                <th>U/medida</th>
                                                <th class="tdrigth">Precio</th>
                                            </tr>

                                        </thead>
                                        <tbody class="tbodydatosconceptos">
                                            {{-- se carga la tabla desde js --}}
                                        </tbody>
                                        <thead class="tdrigth">
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tdrigth">
                                                <td colspan="6"><b>SUBTOTAL <span class="moneda"></span></b></td>
                                                <td><span id="subtotalfp"></span></td>
                                            </tr>
                                            <tr class="tdrigth">
                                                <td colspan="6"><b>IVA <span class="iva_percent"></span></b></td>
                                                <td><span id="ivafp"></span></td>
                                            </tr>
                                            <tr class="tdrigth">
                                                <td colspan="6"><b>DESCUENTO <span class="moneda"></span></b></td>
                                                <td><span id="descuentofp"></span></td>
                                            </tr>
                                            <tr class="tdrigth">
                                                 <td colspan="6"><b>TOTAL <span class="moneda"></span></b></td>
                                                <td><span id="totalfp"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p> OBSERVACIONES:</p>
                                        <div class="observaciones">
                                            <span id="obsfp"></span><br>
                                            <span id="motivo"></span>
                                        </div>
                                    </div>
                                    {{-- <div class="datosfooter">
                                        <div>N&uacute;meros de cuenta para ingresos y transferencia</div>
                                        <div><b>IBAN MX-XXX XXXXX XXXX XXXX</b></div>
                                    </div> --}}
                                    </div>
                                {{-- </div> --}}

                            </div>
                            <hr>
                            <div class="card-footer ml-auto mr-4">
                                <button type="button" class="btn btn-sm btn-danger mb-2 btn-closefactpreview">{{ __("Cerrar") }}</button>
                                <button type="button" id="btn-facturaPDF" class="btn btn-sm btn-outline-primary mb-2 btn-facturaPDF">{{ __("Imprimar PDF") }}</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
