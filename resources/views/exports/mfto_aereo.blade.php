<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            @foreach($data as $mfto)
                <tr>
                    <th class="cabeceraleft" style="width: 100px; height: 40px; font-weight: bold">Agencia Origen</th>
                    <th class="datosleft" style="width: 100px; height: 40px;" colspan="2">{{ __("GLOSHIMA") }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="font-size: 16px; font-weight: bold; text-align: center" colspan="2">MANIFIESTO</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th class="cabeceraleft" style="width: 100px; height: 40px; font-weight: bold">Cantidad de Bultos MAWB</th>
                    <th class="datosleft" style="width: 100px; height: 40px;" colspan="2">{{ $mfto->pais }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th class="cabeceraleft" style="width: 100px; height: 40px; font-weight: bold">No. M_AWB</th>
                    <th class="datosleft" style="width: 100px; height: 40px;" colspan="2">{{ $mfto->no_blhouse }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="font-size: 16px; font-weight: bold; text-align: center">MBL:</th>
                    <th style="font-size: 16px; font-weight: bold; text-align: right" colspan="2"></th>
                </tr>
                <tr>
                    <th class="cabeceraleft" style="width: 100px; height: 40px; font-weight: bold">Fecha</th>
                    <th class="datosleft" style="width: 100px; height: 40px;" colspan="2">{{ Carbon\Carbon::parse($mfto->fecha_est)->format('Y-m-d') }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                @break
            @endforeach
            <tr>
                <th style="width: 120px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">HBL Numero</th>
                <th style="width: 80px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Bultos (Cant.)</th>
                <th style="width: 60px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Peso (Kg)</th>
                <th style="width: 60px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">M3</th>
                <th style="width: 180px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Nombre y Apellidos del REMITENTE</th>
                <th style="width: 180px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Nombre y Apellidos del DESTINATARIO</th>
                <th style="width: 170px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Direccion del DESTINATARIO</th>
                <th style="width: 100px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Telefono del DESTINATARIO</th>
                <th style="width: 100px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Provincia</th>
                <th style="width: 100px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Municipio</th>
                <th style="width: 100px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">No. de Carnet de Identidad:</th>
                <th style="width: 50px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Correo electronico</th>
                <th style="width: 200px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Contenido del paquete (Descripcion)</th>
                <th style="width: 80px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Categoria/Operacion</th>
                <th style="width: 100px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Entregado en bodega</th>
                <th style="width: 100px; height: 40px; text-align: center; font-weight: bold; word-wrap: break-word; vertical-align: center">Entrada al pais</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $mfto)
            <tr>
                <td style="width: 120px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->noblhouse }}</td>
                <td style="width: 80px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->bultos }}</td>
                <td style="width: 60px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->pesokg }}</td>
                <td style="width: 60px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->m3 }}</td>
                <td style="width: 180px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->remitente }}</td>
                <td style="width: 170px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->destinatario }}</td>
                <td style="width: 180px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->dir }}</td>
                <td style="width: 100px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->telefono }}</td>
                <td style="width: 100px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->provincia }}</td>
                <td style="width: 100px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->municipio }}</td>
                <td style="width: 100px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->ci }}</td>
                <td style="width: 60px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ __("N/A")}}</td>
                <td style="width: 200px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->producto }}</td>
                <td style="width: 80px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->operacion }}</td>
                <td style="width: 100px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->recibocarga }}</td>
                <td style="width: 100px; height: 80px; text-align: center; font-size: 11px; word-wrap: break-word; vertical-align: center">{{ $mfto->entradacliente }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
