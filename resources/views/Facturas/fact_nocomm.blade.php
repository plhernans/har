<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura No Comercial</title>
    {{-- <link rel="stylesheet" href="../../../public/css/Factura/styles.css">
    <link rel="stylesheet" href="../../../public/css/Factura/tables.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/css/tables.css"> --}}

    <style>


            /*table style*/

    body {
        font-family: monospace;
    }

    .container {
        width: 100%;
        max-width: 800px;
        margin: auto;
    }

    .table {
        width: 100%;
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        table-layout: fixed;
    }

    .table caption {
        font-size: 28px;
        text-transform: uppercase;
        font-weight: bold;
        margin: 8px 0px;
    }

    .table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
    }

    .table th, .table td {
        font-size: 11px;
        padding: 8px;
        /*//text-align: center;*/
    }

    .table thead th{
        text-transform: uppercase;
        background-color: #ddd;
    }

    .table tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .table tbody td:hover {
        background-color: rgba(0, 0, 0, 0.3);
    }

    @media screen and (max-width: 550px) {
        .table {
            border: 0px;
        }
        .table caption {
            font-size: 12px;
        }
        .table thead {
            display: none;
        }
        .table tr {
            margin-bottom: 0px;
            border-bottom: 4px solid #ddd;
            display: block;
        }
        .table th, .table td {
            font-size: 11px;
        }
        .table td {
            display: block;
            border-bottom: 1px solid #ddd;
            text-align: right;
        }
        .table  td:last-child {
            border-bottom: 0px;
        }
        .table td::before {
            content: attr(data-label);
            font-weight: bold;
            text-transform: uppercase;
            float: left;
        }
    }


    .top_bar{
        background-color: #DDDDDD;
        height:40px;
        top: 0;
    }

    .logo_fnc{
        background-image: url("/assets/img/logo-af-cargo-gloshima2.jpg");
        background-repeat: no-repeat;
        height:180px;
        width: auto;
        margin-top:30px;
    }

    .flexContainer {

        margin: 2px 10px;
        display: flex;
    }

    .left {
        flex-basis : 50%;
    /*  float: right !important;*/
    }

    .right {
        flex-basis : 50%;
        float: right !important;
        text-align: right;
    }

    .tdrigth{
        text-align: right;
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
        height:80px;
        margin-top: 30px;
        padding:10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <!--  <div class="top_bar"></div>


            <div class="flexContainer">
              <div class="left"> </div>
              <div class="right">must have a name</div>
            </div>-->

        <table class="table">
            <caption></caption>
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
                        <b> Factura de Servicios<br /></b>
                        C/ Velazquez No 16, Oficina 0<br />
                        1er piso, Veracruz, Mexico.<br />
                        CP: 3455200<br />
                        cliente@gloshima.com.mx<br />
                        +55 6655 5454-5656
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h2>Factura</h2> <br /> <b>Cliente </b>
                    </td>
                    <td colspan="4" class="tdrigth"></td>
                </tr>
                <tr>
                    <td colspan="3" data-label="Dir">

                        Veracruz, Ave 5ta, # 334 Camcun, Mexico </td>
                    <td colspan="2" class="tdrigth"><b>N&uacute;mero</b></td>
                    <td colspan="2" class="tdrigth">F-00125566/2022</td>
                </tr>
                <tr>
                    <td colspan="3"><b>NIF:</b> H-11111 11111
                    <td colspan="2" class="tdrigth"><b>Fecha</b></td>
                    <td colspan="2" class="tdrigth" colspan="2">10/05/2022</td>
                </tr>
                <tr>
                    <td colspan="7"> &nbsp;</td>
                </tr>

            </tbody>
            <thead>
                <tr>
                    <th>C&oacute;digo</th>
                    <th colspan="2" class="tdleft">Descripci&oacute;n</th>
                    <th>Precio/U</th>
                    <th>Cantidad</th>
                    <th>U/medida</th>
                    <th class="tdrigth">Precio</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td class="tdleft" data-label="C&oacute;digo">TTNU124950</td>
                    <td colspan="2" class="tdleft" data-label="Descripci&oacute;n">TRANSCARGO SA</td>
                    <td class="tdcenter" data-label="Precio Unitario">75</td>
                    <td class="tdcenter" data-label="Cantidad">2</td>
                    <td class="tdcenter" data-label="Unidad de medida">2</td>
                    <td class="tdrigth" data-label="Precio">150,00</td>
                </tr>
                <tr>
                    <td class="tdleft" data-label="C&oacute;digo">QSS3233980</td>
                    <td colspan="2" class="tdleft" data-label="Descripci&oacute;n"> THC / Manipulación Destino</td>
                    <td class="tdcenter" data-label="Precio Unitario">38</td>
                    <td class="tdcenter" data-label="Cantidad">10</td>
                    <td class="tdcenter" data-label="Unidad de medida">m³</td>
                    <td class="tdrigth" data-label="Precio">380,00</td>
                </tr>
                <tr>
                    <td class="tdleft" data-label="C&oacute;digo">DDSD324350</td>
                    <td colspan="2" class="tdleft" data-label="Descripci&oacute;n">DOCUMENT FEE</td>
                    <td class="tdcenter" data-label="Precio Unitario">30</td>
                    <td class="tdcenter" data-label="Cantidad">4</td>
                    <td class="tdcenter" data-label="Unidad de medida">m³</td>
                    <td class="tdrigth" data-label="Precio">120,00</td>
                </tr>
                <tr>
                    <td class="tdleft" data-label="C&oacute;digo">GEU1WEEE50</td>
                    <td colspan="2" class="tdleft" data-label="Descripci&oacute;n">HANDLING SA</td>
                    <td class="tdcenter" data-label="Precio Unitario">90</td>
                    <td class="tdcenter" data-label="Cantidad">2</td>
                    <td class="tdcenter" data-label="Unidad de medida">KG</td>
                    <td class="tdrigth" data-label="Precio">180,00</td>
                </tr>
                <tr>
                    <td class="tdleft" data-label="C&oacute;digo">TSSA498430</td>
                    <td colspan="2 class=" tdleft" data-label="Descripci&oacute;n">CERTIFICACION TRANSCARGO SA</td>
                    <td class="tdcenter" data-label="Precio Unitario">50</td>
                    <td class="tdcenter" data-label="Cantidad">1</td>
                    <td class="tdcenter" data-label="Unidad de medida">1</td>
                    <td class="tdrigth" data-label="Precio">50,00</td>
                </tr>
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
                    <td colspan="6"><b>SUBTOTAL</b></td>
                    <td>$880,00</td>
                </tr>
                <tr class="tdrigth">
                    <td colspan="6"><b>IVA</b></td>
                    <td>$88,00</td>
                </tr>
                <tr class="tdrigth">
                    <td colspan="6"><b>DESCUENTO</b></td>
                    <td>$120,00</td>
                </tr>
                <tr class="tdrigth">
                     <td colspan="6"><b>TOTAL</b></td>
                    <td>$848,00</td>
                </tr>
            </tbody>
        </table>

        <div>
            <p> OBSERVACIONES:</p>
            <div class="observaciones">
            </div>
        </div>
        <div class="datosfooter">
            <div>N&uacute;meros de cuenta para ingresos y transferencia</div>
            <div><b>IBAN MX-XXX XXXXX XXXX XXXX</b></div>
        </div>
        </div>
    </div>
</body>

</html>
