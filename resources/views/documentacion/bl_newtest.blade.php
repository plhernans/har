<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BL - Bill of Landing</title>

    <style>
        /*table style*/

body {
    font-family: monospace;
}


.container-bl {
  width: 100%;
  max-width: 1000px;
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

.tittledrigth{
  text-align: right;
  font-size:16px !important;
  padding-top: 80px !important;
}

.borderleft{
  border-top: 1px solid #7c7878;
  border-bottom: 1px solid #7c7878;
  border-right: 1px solid #7c7878;
}

.tdrigthbl{
  text-align: left;
  border-top: 1px solid #7c7878;
  border-bottom: 1px solid #7c7878;
}

.tdcenter{
    font-size: 12px;
    text-align: center;
}

.subtittlebl{
  color: #7c7878;
  text-decoration: uppercase;
  font-size: 12px;
 }

.subtittleblr1{
  color: #524f4f;
  text-decoration: uppercase;
  margin-top: 0px !important;
  font-size: 12px;
}

.subtittleblr{
  color: #7c7878;
  text-decoration: uppercase;
  margin-top: 0px !important;
  font-size: 12px;
}

.subtittleblleft{
    font-size: 12px;
}

.texttittle{
  font-size: 12px;
  text-align: left;
  text-transform: uppercase;
  font-weight: bold;
}

.blnumber{
  font-size: 14px;
  text-align: center;
  text-transform: uppercase;
  font-weight: bold;
}

.divideborderf{
  border-top: 1px solid #7c7878;
  font-size: 12px;
}

.onlytopborder{
  border-top: 1px solid #7c7878;
}

.onlybottonborder{
  border-bottom: 1px solid #7c7878;
}

.onlyrightborder{
  border-right: 1px solid #7c7878;
}

.onlytoprightborder{
  border-right: 1px solid #7c7878;
  border-top: 1px solid #7c7878;
}

.onlybottomrightborder{
  border-right: 1px solid #7c7878;
  border-bottom: 1px solid #7c7878;
}

.onlytopbottomborder{
  border-top: 1px solid #7c7878;
  border-bottom: 1px solid #7c7878;
}

.tdleft{
  text-align: left;
  font-size: 12px;
}

.table thead th{
  text-transform: uppercase;
  background-color: #ddd;
  border: 1px solid #373737;
}

/* .tbodydescrip{
    height: 250px;
    min-height: 220px;
} */

.tbodydescrip tr td{
    height: 250px;
    min-height: 120px;
    vertical-align: top;
    padding-top: 0px;
}

.tdrigth{
  text-align: right;
  font-size: 12px;
}

.page_break {
  page-break-before: always;
}

    </style>
</head>

<body>
    <div class="container-bl">

        <table class="table">
            <caption></caption>
            <thead>

            </thead>
            @foreach ($bls as $bl)
            <tbody>
                <tr>
                    <td colspan="4"><img src="{{ asset('images/logo-goshima-transparente-395x300.png')}}" height="90px"></td>
                    <td colspan="3" class="tittledrigth" data-label="Compania">
                        <b>{{$tipobl}}</b> BILL OF LADING<br />
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="borderleft" data-label="SHIPPER">
                        <b class="subtittlebl">SHIPPER </b> <br />
                        <div class="texttittle" label="SHIPPER">{{$bl->shipper}}</div>
                        <div class="texttittle" label="ADDRESS">{{$bl->dirshipper}}</div>
                        {{-- <div class="texttittle" label="PAIS">ESPAÑA</div>
                        <div class="texttittle" label="TELEF">Tlf.: +34 659428896</div> --}}
                    </td>
                    <td colspan="3" class="tdrigthbl">
                        <div>
                            <b class="subtittleblr1">BILL OF LADING</b> <br />
                            <b class="subtittleblr">B/L no.:</b>
                            <div class="blnumber" label="BL No.">{{$bl->noblhouse}}</div>


                        </div>
                        <div class="divideborderf" label="">
                            <b class="subtittleblr">SHIPPERS REFERENCE</b> <br />
                            <div class="texttittle" label="SHIPPERS REFERENCE">GLOSHIMA</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="borderleft" data-label="CONSIGNEE">
                        <b class="subtittlebl">CONSIGNEE </b> <br />
                        <div class="texttittle" label="CONSIGNEE">{{$bl->consignee}}</div>
                        <div class="texttittle" label="ADDRESS">{{$bl->direccion}}
                        </div>
                        {{-- <div class="texttittle" label="PAIS">CUBA</div>
                        <div class="texttittle" label="TELEF">Tlf.: 540249001 / 72729935</div> --}}
                    </td>
                    <td colspan="3" class="tdrigthbl">
                        <b class="subtittleblr">2ND NOTIFY</b> <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="borderleft" data-label="NOTIFY PARTY">
                        <b class="subtittlebl">NOTIFY PARTY</b> <br />
                        <div class="texttittle" label="NOTIFY PARTY">{{$bl->consignee}}</div>
                        <div class="texttittle" label="ADDRESS">{{$bl->direccion}}
                        </div>
                        {{-- <div class="texttittle" label="PAIS">CUBA</div>
                        <div class="texttittle" label="TELEF">Tlf.: 540249001</div> --}}
                    </td>
                    <td colspan="3" class="onlytopborder">
                        <b class="subtittleblr">FOR RELEAASE OF GOODS, PLEASE APLY TO.</b> <br />
                        <div class="texttittle" label="fOR RELEASE">{{$bl->nombre}}</div>
                        <div class="texttittle" label="ADDRESS">{{$bl->dir}}</div>

                    </td>
                </tr>
                <tr>
                    <td class="borderleft" colspan="4" data-label="PLACE OF RECEIPT">
                        <b class="subtittleblr">PLACE OF RECEIPT</b> <br />
                        <div class="texttittle" label="PLACE OF RECEIPT">LA HABANA</div>
                    <td colspan="1" class="tdrigth"></td>
                    <td colspan="2" class="tdrigth"></td>
                </tr>
                <tr>
                    <td colspan="2" class="borderleft">
                        <b class="subtittleblr">VESSEL</b> <br />
                        <div class="texttittle" label="VESSEL">{{$bl->buque}}</div>
                    </td>
                    <td colspan="2" class="borderleft">
                        <b class="subtittleblr">PORT OF LOADING</b> <br />
                        <div class="texttittle" label="PORT OF LOADING">{{$bl->pol}}</div>
                    </td>
                    <td colspan="3" class="tdrigth"></td>
                </tr>
                <tr>
                    <td colspan="2" class="borderleft">
                        <b class="subtittleblr">PORT OF DISCHARGE</b> <br />
                        <div class="texttittle" label="PORT OF DISCHARGE">{{$bl->pod}}</div>
                    </td>
                    <td colspan="2" class="borderleft">
                        <b class="subtittleblr">PLACE OF DELIVERY</b> <br />
                        <div class="texttittle" label="PORT OF DISCHARGE"></div>
                    </td>
                    <td colspan="3" class="onlybottonborder"></td>
                </tr>
                <tr>
                    <td colspan="7" class="onlybottonborder"></td>
                </tr>
            </tbody>
            {{-- @break
            @endforeach --}}
            {{-- <table class="table"> --}}
            <thead>
                <tr>
                    <th class="tdleft">&nbsp;MARKS AND NUMBERS</th>
                    <th class="tdleft">&nbsp;No. OF PKGS</th>
                    <th colspan="3" class="tdleft">&nbsp;DESCRIPTION OF PACKAGES AND GOODS</th>
                    <th class="tdleft">&nbsp;GROSS WEIGHT</th>
                    <th class="tdleft">&nbsp;MEASUREMENT</th>
                </tr>
            </thead>

            <tbody class="tbodydescrip">
                {{-- @foreach ($bls as $bl) --}}
                    <tr>
                        <td class="tdleft" data-label="MARKS AND NUMBERS">LCL/LCL SHIPMENT {{$bl->contenedor}}</td>
                        <td class="tdcenter" data-label="No. OF PKGS">{{$bl->cantidadpiezas}}</td>
                        <td colspan="3" class="tdleft" data-label="DESCRIPTION OF PACKAGES AND GOODS">
                            {{$bl->descripcion}}
                        </td>
                        <td class="tdcenter" data-label="GROSS WEIGHT">{{number_format($bl->gross,2)}}</td>
                        <td class="tdcenter" data-label="MEASUREMENT">{{number_format($bl->m3,5)}}</td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
            {{-- </table> --}}
            <tbody>
                <tr style="height:80px;">
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="2" class="onlytoprightborder">
                        <b class="subtittlebl">FREIGTH AND CHARGES:</b> <br />

                    </td>
                    <td  class="onlytoprightborder">
                        <b class="subtittlebl">PREPAID <br />

                    </td>
                    <td  class="onlytoprightborder">
                        <b class="subtittlebl">COLLECT</b> <br />

                    </td>
                    <td colspan="3"  class="onlytopborder">
                        <b class="subtittlebl">EXCESS VALUE DECLARATION </b><br />

                    </td>
                </tr>
                <tr style="height:80px;">
                    <td colspan="2" class="onlyrightborder">
                        <div class="texttittle" label="PLACE AND DATE OF ISSUE">
                            AS AGREED
                        </div>
                    </td>
                    <td  class="onlyrightborder"></td>
                    <td  class="onlyrightborder"></td>
                    <td colspan="3">
                        <div class="divideborderf" style="height:40px">

                        </div>
                        <div class="divideborderf" label="">
                            <p>RECEIVED by the Carrier in external apparent good order and condition unless otherwise stated the number of container, packages or other customary freight unit to be transported to such place as agreed.</p>
                        </div>
                        <div class="divideborderf" label="">
                            <b class="subtittleblr">NUMBER OF ORIGINAL BILL OF LAND</b> <br />
                            <div class="texttittle" label="NUMBER OF ORIGINAL BILL OF LAND">THREE (3)</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="onlybottomrightborder">
                        <b class="subtittleblleft">TOTAL AMOUNT DUE <br />
                    </td>
                    <td class="borderleft">&nbsp;</td>
                    <td class="borderleft">&nbsp;</td>
                    <td colspan="3" class="onlytopbottomborder">
                        <b class="subtittlebl">PLACE AND DATE OF ISSUE</b><br />
                        <div class="texttittle" label="PLACE AND DATE OF ISSUE">
                            {{$bl->pol}}, {{Carbon\Carbon::parse($bl->fecha)->format('Y-m-d') }}

                        </div>
                    </td>
                </tr>
                <tr class="tdrigth">
                    <td colspan="7">As agent for the carrier {{$bl->naviera}}</td>
                </tr>

            </tbody>

            @endforeach
        </table>

    </div>
    {{-- <div class="page_break"></div> --}}
</body>

</html>
