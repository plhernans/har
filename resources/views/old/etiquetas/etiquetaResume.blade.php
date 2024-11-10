<html lang="en" id="global">
    {{-- @include('modals.modalSuccess') --}}
	<head>
		<meta charset="UTF-8">
		{{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <link rel="stylesheet" href="../../css/app.css"> --}}
        {{-- <title>Etiquetas</title> --}}

        <style>
            .etiqueta{
                width: 375px;
                height: 558px;
                margin-left: -40px;
                margin-top: -30px;
                padding-top: 5px;
                padding-left: 10px;
                padding-right: 5px;
                background: white;
                border: 2px solid black;
                border-radius: 5px;
                box-shadow: opx opx 2px gray;
                break-after: always;
                /* display: block; */
            }

            .etiqueta div{
                width: 100%;
            }

            .titulo-cabecera{
                width: 350px;
                height: 100px;
                /* background-size: 100px; */
            }

            img{
                display: flex;
                justify-content: center;
                height: 100px;
                width: 45%;
            }

            /* .detalles-header{
                width: 90%;
                margin-bottom: -5px;
            } */

            /* .etiquetaBody{
                padding-left: 25;
            } */
            .etiqueta-bl, .bulto{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 14px;
                /* margin-bottom: 10px; */
            }

            .tagReceived, .tagSend, .tagDir, .tagArticulos{
                padding: 0;
                margin-top: 10px;
                margin-bottom: 5px;
                text-align: left;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 14px;
            }

            .etiquetachild{
                padding: 0;
                /* margin-top: 10px;
                margin-bottom: 5px; */
                text-align: left;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 10px;
            }

            .etiqueta-dir{
                text-align: justify;
                text-size-adjust: unset;
            }

            .etiqueta-footer{
                width: 90%;
                display: flex;
                justify-content: center;
                margin-bottom: -15px;
                margin-left: 130px;
                padding: 0px;
                /* background: red; */
            }

            .etiqueta-subfooter{
                width: 90%;
                text-align: center;
                margin-top: -5px;
                display: flex
            }

            .cbtext{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 14px;
            }
        </style>
    </head>


	<body style="background: white">
            <div class="etiqueta">
                <table style="height: 60px">
                    <tbody>
                        <tr>
                            <td class="titulo-cabecera"> <img src="{{ asset('images/logo-goshima-transparente-395x300.png')}}"></td>
                        </tr>
                    </tbody>
                </table>
                @foreach ($etiquetas as $etiqueta )
                <table width="100%">
                    <tbody style="height: auto">
                        <tr>
                            <td style="width: 75%; text-align: left"><span class="etiqueta-bl">No. Orden: </span><span class="etiqueta-bl">{{$etiqueta->no_orden}}</span></td>
                            <td style="width: 25%; text-align: left">{{ Str::limit($etiqueta->no_orden,3)}}</td>
                        </tr>
                    </tbody>
                </table>
                <hr width="100%">

                <table class="etiqueta-body mb-1" width="100%">
                    <tbody>
                        <tr class="tagSend">
                            <td width="25%" style="text-align: left"><span>Remitente:</span></td>
                            <td width="70%" style="text-align: left">{{$etiqueta->remitente}}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="etiqueta-body" width="100%">
                    <tbody>
                        <tr class="tagReceived mb-2">
                            <td width="25%" style="text-align: left"><span>Destinatario:</span></td>
                            <td width="70%" style="text-align: left">{{$etiqueta->destinatario}}</td>
                        </tr>
                    </tbody>
                </table>
                <table style="height: 5px">

                </table>
                <table class="etiqueta-body" width="100%">
                    <tbody>
                        <tr class="tagReceived">
                            <td width="50%" style="text-align: left"><span>CI: </span>{{$etiqueta->ci}}</td>
                            <td width="50%" style="text-align: left" colspan="2"><span>Telef: </span><span>{{$etiqueta->telefono}}</span></td>
                        </tr>
                    </tbody>
                </table>
                <table style="height: 5px">

                </table>
                <table class="etiqueta-body" width="96%">
                    <tbody>
                        <tr class="tagReceived">
                            <td width="25%" style="vertical-align: top"><span>DIRECCION: </span></td>
                            <td width="70%" colspan="2" class="etiqueta-dir">{{$etiqueta->direccion}}</td>
                        </tr>
                    </tbody>
                </table>
                <table style="height: 5px">

                </table>
                <table class="etiqueta-body" width="100%">
                    <tbody>
                        <tr class="tagReceived">
                            <td width="50%"><span>PROVINCIA</span></td>
                            <td width="50%" ><span>MUNICIPIO</span></td>
                        </tr>
                        <tr class="tagReceived">
                            <td width="50%"><strong>{{$etiqueta->provincia}}</strong></td>
                            <td width="50%" ><strong>{{$etiqueta->municipio}}</strong></td>
                        </tr>
                    </tbody>
                </table>
                <table style="height: 5px">

                </table>
                @endforeach
                    <span class="tagReceived"><strong>No. de Bultos</strong></span>
                    @php
                        // echo('<table class="etiqueta-body"><tr class="etiquetachild">');
                        // $i = 0;
                        // foreach( $etiqueta_child as $etiquetaCh )
                        // {
                        //     $i++;
                        //     echo '<td>'.$etiquetaCh->codigobarra .'</td>';
                        //     if($i % 3==0)
                        //     {
                        //         echo '</tr><tr class="etiquetachild">';
                        //     }
                        // }
                        // echo'</tr></table>';

                        echo('<table class="etiqueta-body"><tr class="etiquetachild">');
                        $i = 0;
                        foreach( $etiqueta_child as $etiquetaChd )
                        {
                            $i++;
                            echo '<td>'.$etiquetaChd->noblhouse .'</td>';
                            if($i % 3==0)
                            {
                                echo '</tr><tr class="etiquetachild">';
                            }
                        }
                        echo'</tr></table>';
                    @endphp
                    <hr>
                @foreach ($etiquetas as $etiqueta )
               <div class="etiqueta-footer">  {{-- style="padding: 0px; margin-bottom:0px" --}}
                    <div style="margin-top: -15px; text-align: center"><h4>{!! DNS1D::getBarcodeHTML($etiqueta->codigobarra, 'C128', 1,60, 'black','567') !!}</h4></div>
                </div>
                <div class="etiqueta-subfooter" style="padding: 0px; margin-top:0px">
                    <h6 class="codigobarra cbtext" style="padding: 0px; margin-top:0px">{{$etiqueta->codigobarra}}</h6>
                </div>
                <br>
                @endforeach
            </div>
  	</body>

</html>


