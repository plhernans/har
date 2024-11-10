<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body{
            break-after: always;
        }

        .tablefactpdfprint,{
            width: 105%;
            height: auto;
            border: 0 solid #ccc;
            border-collapse: collapse;
            margin-left: -15px;
            margin-top: -40px;
            padding: 0;
            table-layout: fixed;
        }


        .tablaprincipal th, .tablaprincipal td, .tablatotales td, .obs, .firma {
            font-size: 11px;
            text-align: left;
        }

        .tablaprincipal, .tablaconcepto, .tablatotales, .obs, .firma{
            border: 1px solid #ccc;
            width: 100%;
            border-radius: 5px;
            margin-bottom: 5px;
            text-align: left;
            font-size: 11px;
        }

        .tablaconcepto{
            height: 400px;
            /* padding-top: 0; */
        }

        .tablaconcepto thead, .tablaconcepto tbody{
            font: 11px;
            text-transform: uppercase;
        }

        .tablaconcepto thead tr{
            background: lightgrey;
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

        .tdright{
            text-align: right;
            text-transform: uppercase;
        }

        .tdleft{
            text-align: left;
        }

        .tdcenter{
            text-align: center;
        }

        .obs, .firma{
            width: 105%;
            margin-left: -15px;
        }
    </style>
</head>
    <body>
        <div class="tablefactpdfprint">
            <table class="tablaprincipal">
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
                        <td colspan="4" style="width: 30%; text-align: right" class="tdrigth" data-label="Compania">
                          <b> FACTURA NO. <span>{{ $datogeneral->nofactura}}</span><br /><br /></b>
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
                        <td colspan="3" class="tdleft">
                            <b>CLIENTE: <span id="clientePdfPrint">{{ $datogeneral->cliente}}</span></a></b>
                        </td>
                        <td colspan="4" style="text-align: right" class="tdrigth"><span><strong>FECHA: </strong><span id="fecha_facturaPdfPrint">{{ Carbon\Carbon::parse($datogeneral->fecha)->format('Y-m-d')}}</span></td>
                    </tr>
                    <tr>
                        <td colspan="3" data-label="telef"><span id="telefclientePdfPrint" style="font-weight: bold">TELEF: </span><span>{{ $datogeneral->telefono }}</span></td>
                        <td colspan="4"></td>
                    </tr>
                    <tr>
                        <td colspan="3" data-label="telef"><span id="telefclientePdfPrint" style="font-weight: bold">DIR: </span><span>{{ $datogeneral->direccion }}</span></td>
                        <td colspan="4"></td>
                    </tr>
                    <tr>
                        <td colspan="7">&nbsp; </td>
                    </tr>

                </tbody>
                @endforeach
            </table>
            <table class="tablaconcepto">

              <thead>
                  <tr>
                    <th height="10" colspan="2" valign="top" class="tdleft" style="width: 100px">Concepto</th>
                    <th height="10" valign="top" class="tdright">Precio/U</th>
                    <th height="10" valign="top" class="tdright">Cantidad</th>
                    <th height="10" valign="top" class="tdcenter">U/medida</th>
                    <th height="10" valign="top" class="tdright">Precio</th>
                    <th height="10"></th>
                  </tr>
              </thead>
                <tbody>
				{{-- se carga la tabla de los conceptos --}}
									@foreach ($datosconceptos as $datosconcepto )
				<tr>
				  <td colspan="2" valign="top" bgcolor="#FFFFFF" class="tdleft" style="width: 100px">{{ $datosconcepto->concepto}}</td>
				  <td valign="top" bgcolor="#FFFFFF" class="tdright">{{  number_format($datosconcepto->importe,2)}}</td>
				  <td valign="top" bgcolor="#FFFFFF" class="tdright">{{  number_format($datosconcepto->ctdad,2)}}</td>
				  <td valign="top" bgcolor="#FFFFFF" class="tdcenter">{{ $datosconcepto->um}}</td>
				  <td valign="top" bgcolor="#FFFFFF" class="tdright">{{ number_format($datosconcepto->totalporconcepto,2)}}</td>
				  <td bgcolor="#FFFFFF"></td>
				</tr>
				@endforeach

            </table>
            <table width="100%" class="tablatotales">
                @foreach ($datosgenerales as $datogeneralresume )
                <tbody>
                    <tr>
                        <td width="72%">&nbsp;</td>
                        <td style="text-align: right" width="14%" bgcolor="#F4F4F4"><b>SUBTOTAL</b></td>
                        <td style="text-align: right" width="14%" bgcolor="#F4F4F4"><span id="subtotalfpPdfPrint">{{ number_format($datogeneralresume->subtotal,2)}}</span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td style="text-align: right" bgcolor="#F4F4F4"><b>IVA <span class="iva_percent">{{" ".$datogeneralresume->iva."%"}}</span></b></td>
                        <td style="text-align: right" bgcolor="#F4F4F4"><span id="ivafpPdfPrint">{{ $datogeneralresume->valoriva}}</span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td style="text-align: right" bgcolor="#F4F4F4"><b>DESCUENTO</b></td>
                        <td style="text-align: right" bgcolor="#F4F4F4"><span id="descuentofpPdfPrint">0.00</span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td style="text-align: right" bgcolor="#F4F4F4"><b>TOTAL</b></td>
                        <td style="text-align: right" bgcolor="#F4F4F4"><span id="totalfpPdfPrint">{{ $datogeneralresume->moneda."  ".number_format($datogeneralresume->totalacobrar,2)}}</span></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="obs">
            <p style="font: 11px">OBSERVACIONES</p>
            <div class="observaciones">
                @foreach ($datosgenerales as $datogeneralresume )
                <span style="margin-left: 5px; margin-top: 10px">{{ "FACTURA ".$datogeneralresume->estado}}</span><br />
                @if($datogeneralresume->estado == 'CANCELADA')
                    <span style="margin-left: 5px; margin-top: 10px">{{ "FECHA: ".Carbon\Carbon::parse($datogeneralresume->fcancelado)->format('Y-m-d') }}</span><br>
                    <span style="margin-left: 5px; margin-top: 10px">{{ "MOTIVO CANCELACION: ".$datogeneralresume->motivocancelado."" }}</span>
                @endif
                @endforeach
            </div>
        </div>
        <br>
        <div class="firma" style="height: 160px">
            <table>
                <tbody>
                    <tr>
                        <td style="height: 90px; width: 50px; text-align: left"></td>
                        <td style="height: 90px; width: 90px"></td>
                        <td style="height: 90px; width: 100px"></td>
                        <td style="height: 90px; width: 100px"></td>
                        <td style="height: 90px; width: 50px; text-align: right"></td>
                    </tr>
                    <tr>
                        <td style="width: 50px; text-align: left">_______________________________________</td>
                        <td style="width: 90px"></td>
                        <td style="width: 100px"></td>
                        <td style="width: 100px"></td>
                        <td style="width: 50px; text-align: right">_______________________________________</td>
                    </tr>
                    @foreach ($datosgenerales as $datogeneral )
                    <tr>
                        <td style="width: 50px; text-align: left; text-transform: uppercase">FIRMA COMERCIAL GLOSHIMA <br /> {{ Auth::user()->name}}</td>
                        <td style="width: 90px"></td>
                        <td style="width: 100px"></td>
                        <td style="width: 100px"></td>
                        <td style="width: 50px; text-align: left">FIRMA DEL CLIENTE <br /> {{  $datogeneral->cliente}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
