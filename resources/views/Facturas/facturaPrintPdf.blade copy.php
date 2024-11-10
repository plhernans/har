<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body{
            break-after: always;
        }

        /* .container-factpdf {
            width: 200px;
            border: 2px black;
            padding: 0;
            margin: auto;
        } */

        .tablefactpdfprint {
            width: 105%;
            height: 600px;
            border: 1px solid #ccc;
            /* border-collapse: collapse; */
            margin-left: -15px;
            margin-top: -15px;
            padding: 0;
            table-layout: fixed;
        }

        .tbodydatosconceptos{
            height: 400px;
            border: 1px solid;
        }

        /* .tablefactpdfprint tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
        } */

        .tablefactpdfprint th, .tablefactpdfprint td {
            font-size: 11px;
            /* padding: 1px; */
        }

        .tablefactpdfprint thead th{
            text-transform: uppercase;
            /* background-color: #ddd; */
        }

        @media screen and (max-width: 550px) {
            .tablefactpdfprint {
                border: 0px;
            }

            .tablefactpdfprint thead {
                display: none;
            }
            .tablefactpdfprint tr {
                margin-bottom: 1px;
                border-bottom: 4px solid #ddd;
                display: block;
            }
            .tablefactpdfprint th, .table td {
                font-size: 11px;
            }
            .tablefactpdfprint td {
                display: block;
                border-bottom: 1px solid #ddd;
                text-align: right;
            }
            .tablefactpdfprint  td:last-child {
                border-bottom: 0px;
            }
            .tablefactpdfprint td::before {
                content: attr(data-label);
                font-weight: bold;
                text-transform: uppercase;
                float: left;

            }
        }


        .left {
            flex-basis : 50%;
            /* float: right !important; */
        }

        .right {
            flex-basis : 50%;
            float: right !important;
            text-align: right;
        }

        .tdrigth{
            text-align: right;
            text-transform: uppercase;
        }

        .tdleft{
            text-align: left;
        }

        .tdcenter{
            text-align: center;
        }

        .observaciones{
            width: 100%;
            height: 100px;
            border-style: solid;
            border-width: 1px;
            border-color: #ccc;
        }

        .datosfooter{
            background-color: #ccc;
            width: 98%;
            height:100px;
            margin-top: 10px;
            padding:2px;
            }
    </style>
</head>
    <body>
        <table class="tablefactpdfprint">
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
            @foreach ($datosgenerales as $datogeneral )
                <tbody>
                    <tr>
                        <td colspan="3" style="width: 70%"><img src="{{asset('images/logo-goshima-transparente-395x300.png')}}" height="140px"></td>
                        <td colspan="4" style="width: 30%" class="tdrigth" data-label="Compañ&iacute;a">
                            <b> FACTURA DE SERVICIOS<br /></b>
                            GLOSHIMA, REP.DOMINICANA<br />
                            1ER PISO, CAUCEDO, REP. DOMINICANA.<br />
                            CP: 3455200<br />
                            cliente@gloshima.com<br />
                            +55 6655 5454-5656
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h2>Factura</h2> <br /> <b>CLIENTE: <span id="clientePdfPrint">{{ $datogeneral->cliente}}</span></a></b>
                        </td>
                        <td colspan="4" class="tdrigth"></td>
                    </tr>
                    <tr>
                        <td colspan="3" data-label="Dir"><span id="datosclientePdfPrint">{{ $datogeneral->datoscliente }}</span></td>
                        <td colspan="2" class="tdrigth"><b>N&uacute;MERO</b></td>
                        <td colspan="2" class="tdrigth"><span id="nofacturaPdfPrint">{{ $datogeneral->nofactura}}</span></td>
                    </tr>
                    <tr>
                        {{-- <td colspan="3"><b>NIF:</b> H-11111 11111 --}}
                            <td colspan="3">
                        <td colspan="2" class="tdrigth"><b>Fecha</b></td>
                        <td colspan="2" class="tdrigth" colspan="2"><span id="fecha_facturaPdfPrint">{{ $datogeneral->fecha}}</span></td>
                    </tr>
                    <tr>
                        <td colspan="7"> &nbsp;</td>
                    </tr>

                </tbody>
            @endforeach
            <thead>
                <tr>
                    <th colspan="2" class="tdleft">Concepto</th>
                    <th>Precio/U</th>
                    <th>Cantidad</th>
                    <th>U/medida</th>
                    <th class="tdrigth">Precio</th>
                </tr>

            </thead>
            @foreach ($datosconceptos as $datosconcepto )
                <tbody>
                    {{-- se carga la tabla de los conceptos --}}
                    <tr>
                        <td colspan="2" class="tdleft">{{ $datosconcepto->concepto}}</td>
                        <td class="tdrigth">{{ $datosconcepto->importe}}</td>
                        <td class="tdrigth">{{ $datosconcepto->ctdad}}</td>
                        <td class="tdleft">{{ $datosconcepto->um}}</td>
                        <td class="tdrigth">{{ $datosconcepto->totalporconcepto}}</td>
                    </tr>
                </tbody>
            @endforeach
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
                @foreach ($datosgenerales as $datogeneralresume )
                <tbody>
                    <tr class="tdrigth">
                        <td colspan="6"><b>SUBTOTAL <span class="moneda"></span></b></td>
                        <td><span id="subtotalfpPdfPrint">{{ $datogeneralresume->subtotal}}</span></td>
                    </tr>
                    <tr class="tdrigth">
                        <td colspan="6"><b>IVA <span class="iva_percent">{{" ".$datogeneralresume->iva."%"}}</span></b></td>
                        <td><span id="ivafpPdfPrint">{{ $datogeneralresume->valoriva}}</span></td>
                    </tr>
                    <tr class="tdrigth">
                        <td colspan="6"><b>DESCUENTO <span class="moneda"></span></b></td>
                        <td><span id="descuentofpPdfPrint"></span></td>
                    </tr>
                    <tr class="tdrigth">
                        <td colspan="6"><b>TOTAL <span class="moneda"></span></b></td>
                        <td><span id="totalfpPdfPrint">{{ $datogeneralresume->totalacobrar}}</span></td>
                    </tr>
                </tbody>
                @endforeach
        </table>

        <div>
            <p> OBSERVACIONES:</p>
            <div class="observaciones">
                @foreach ($datosgenerales as $datogeneralresume )
                <span id="obsfpPdfPrint">{{ "FACTURA ".$datogeneralresume->estado}}</span>
                @endforeach
            </div>
        </div>
    </body>
</html>
