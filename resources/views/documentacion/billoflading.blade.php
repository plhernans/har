<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BL - Bill of Landing</title>
    {{-- <link rel="stylesheet" href="/resources/views/documentacion/assets/css/styles.css">
    <link rel="stylesheet" href="/resources/views/documentacion/assets/css/tables.css"> --}}

    <style>
/*table style*/
    body {
        font-family: monospace;
    }

    .container-bl {
        width: 100%;
        max-width: 1000px;
        margin: auto;
        padding-top: 0;
    }

    img{
        /* display: flex; */
        justify-content: center;
        height: 100px;
        width: 45%;
    }

  /*  stylos personalizados para BL */

  .tittledrigth{
    text-align: right;
    font-size:10px !important;
    /* padding-top: 80px !important; */
  }


  .borderleft{
    border-top: 1px solid #7c7878;
    border-bottom: 1px solid #7c7878;
    border-right: 1px solid #7c7878;
  }

  .texttittle{
    font-size: 10px;
    /* font-size: 20px; */
    text-align: left;
    text-transform: uppercase;
    font-weight: bold;
  }

  .blnumber{
    /* font-size: 24px; */
    font-size: 10px;
    text-align: left;
    text-transform: uppercase;
    font-weight: bold;
  }

  .theadtabla{
    font-size: 10px;
    text-align: left;
    text-transform: uppercase;
    font-weight: bold;
    background-color: lightgrey;
  }

  .tdcenter{
    text-align: center;
    vertical-align: top;
  }

  .tdleft{
    text-align: left;
    vertical-align: top;
  }

  .tdrigth{
    font-size: 10px;
  }

  .tbodoydatos{
    font-size: 10px;
  }

  .subtittlebl{
    color: #7c7878;
    text-decoration: uppercase;
    font-size: 12px;
  }

  .subtittleblr{
    color: #7c7878;
    text-decoration: uppercase;
    margin-top: 0px !important;
    font-size: 12px;
  }

  .subtittleblr1{
    color: #524f4f;
    text-decoration: uppercase;
    margin-top: 0px !important;
    /* font-size: 18px; */
    font-size: 12px;
  }
  .subtittleblleft{
    color: #524f4f;
    text-decoration: uppercase;
    margin-top: 0px !important;
    text-align: right;
    font-size: 10px;
  }

  .tdrigthbl{
    text-align: left;
    border-top: 1px solid #7c7878;
    border-bottom: 1px solid #7c7878;
  }

  .divideborderf{
    border-top: 1px solid #7c7878;
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
</style>
</head>

<body>
    <div class="container-bl">
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
                    <td colspan="4"><img src="{{ asset('images/logo-goshima-transparente-395x300.png')}}"></td>
                    <td colspan="3" class="tittledrigth">
                        <b> ORIGINAL</b> BILL OF LANDING<br />
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="borderleft" data-label="SHIPPER">
                        <b class="subtittlebl">SHIPPER </b> <br />
                        <div class="texttittle" label="SHIPPER">FERNANDO GOMEZ ORDONEZ</div>
                        <div class="texttittle" label="ADDRESS">C/ SALVADOR ESPRIU, 31 08005 BARCELONA </div>
                        <div class="texttittle" label="PAIS">ESPAÑA</div>
                        <div class="texttittle" label="TELEF">Tlf.: +34 659428896</div>
                    </td>
                    <td colspan="3" class="tdrigthbl">
                        <div>
                            <b class="subtittleblr1">BILL OF LANDING</b> <br />
                            <b class="subtittleblr">B/L no.:</b>
                            <div class="blnumber" label="BL No.">GL210110 </div>


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
                        <div class="texttittle" label="CONSIGNEE">FERNANDO GOMEZ ORDONEZ <b>46080300606</b></div>
                        <div class="texttittle" label="ADDRESS">C/ 214. No. 1916, e/ 19 y 19a. Atabey PLAYA LA HABANA.
                        </div>
                        <div class="texttittle" label="PAIS">CUBA</div>
                        <div class="texttittle" label="TELEF">Tlf.: 540249001 / 72729935</div>
                    </td>
                    <td colspan="3" class="tdrigthbl">
                        <b class="subtittleblr">2ND NOTIFY</b> <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="borderleft" data-label="NOTIFY PARTY">
                        <b class="subtittlebl">NOTIFY PARTY</b> <br />
                        <div class="texttittle" label="NOTIFY PARTY">FERNANDO GOMEZ ORDONEZ <b>46080300606</b></div>
                        <div class="texttittle" label="ADDRESS">C/ 214. No. 1916, e/ 19 y 19a. Atabey PLAYA LA HABANA.
                        </div>
                        <div class="texttittle" label="PAIS">CUBA</div>
                        <div class="texttittle" label="TELEF">Tlf.: 540249001</div>
                    </td>
                    <td colspan="3" class="onlytopborder">
                        <b class="subtittleblr">FOR RELEAASE OF GOODS, PLEASE APLY TO.</b> <br />
                        <div class="texttittle" label="fOR RELEASE">TRANSCARGO</div>
                        <div class="texttittle" label="ADDRESS">SAN PEDRO No. 1, HABANA VIEJA. </br> LA HABANA. </div>

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
                        <div class="texttittle" label="VESSEL">XPRESS MACHU PICCHU v/. 21016</div>
                    </td>
                    <td colspan="2" class="borderleft">
                        <b class="subtittleblr">PORT OF LOADING</b> <br />
                        <div class="texttittle" label="PORT OF LOADING">BARCELONA, ESPAÑA</div>
                    </td>
                    <td colspan="3" class="tdrigth"></td>
                </tr>
                <tr>
                    <td colspan="2" class="borderleft">
                        <b class="subtittleblr">PORT OF DISCHARGE</b> <br />
                        <div class="texttittle" label="PORT OF DISCHARGE">XPRESS MACHU PICCHU v/. 21016</div>
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
            <br>
            <thead>
                <tr class="theadtabla">
                    <th>MARKS AND NUMBERS</th>
                    <th width="120px">No. OF PKGS</th>
                    <th colspan="3" class="tdleft">DESCRIPTION OF PACKAGES AND GOODS</th>
                    <th>GROSS WEIGHT</th>
                    <th>MEASUREMENT</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tbodoydatos">
                    <td class="tdleft" data-label="MARKS AND NUMBERS" style="height: 200px">LCL/LCL SHIPMENT TCLU6619114</td>
                    <td class="tdcenter" data-label="No. OF PKGS" style="height: 200px">14</td>
                    <td colspan="3" class="tdleft" data-label="DESCRIPTION OF PACKAGES AND GOODS" style="height: 200px">
                        S.T.C</br>
                        vENTALIDOR</br>
                        TUBERIAS DE AGUA </br>
                        MANGUERA TUO COMBUSTIBLE</br>
                        FIT DE VENTILADOR</br>
                        FILTRO DDE AGUA</br>
                        JUEGO DE PASTILLAS DE FRENO DELANTEROS</br>
                        JUEGO DE PASTILLAS DE FRENO TRASEROS</br>
                        EMBRAGUE DE VENTILADOR
                    </td>
                    <td class="tdcenter" data-label="GROSS WEIGHT" style="height: 200px">170,00</td>
                    <td class="tdcenter" data-label="MEASUREMENT" style="height: 200px">1000</td>
                </tr>

            </tbody>

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
                            <p class="tbodoydatos">RECEIVED by the Carrier in external apparent good order and condition unless otherwise stated the number of container, packages or other customary freight unit to be transported to such place as agreed.</p>
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
                            VALENCIA, 02/01/2022
                        </div>
                    </td>
                </tr>
                <tr class="tdrigth">
                    <td colspan="7">As agent for the carrier</td>
                </tr>

            </tbody>
        </table>


    </div>
</body>

</html>
