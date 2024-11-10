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
                    <th style="width: 100px; height: 40px; font-weight: bold; font-size:11px;" colspan="10">SOCIEDAD COMERCIAL HAR LIMITED</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="width: 100px; height: 40px; font-weight: bold; font-size: 11px; vertical-align: middle;" colspan="2">TOTAL PACKAGE:</th>
                    <th style="width: 100px; height: 40px; font-weight: bold; text-align: left; font-size: 11px; vertical-align: middle;" colspan="2"><span style="margin-left: 5px; vertical-align: middle"> {{$ctd}}</span></th>
                    <th style="width: 100px; height: 40px;"></th>
                    <th style="width: 100px; height: 40px; font-weight: bold; font-size: 11px; vertical-align: middle" colspan="2">MANIFIESTO: <span style="margin-left: 5px; vertical-align: middle"></span></th>
                    <th style="width: 100px; height: 40px; font-weight: bold; font-size: 11px;" colspan="2"></th>
                    <th style="width: 100px; height: 40px; font-weight: bold; font-size: 11px;"></th>
                </tr>
                <tr>
                    <th style="width: 100px; font-size: 10px; height: 40px; font-weight: bold; vertical-align: middle;">MAWB</th>
                    <th style="width: 100px; font-size: 10px; height: 40px; font-weight: bold; vertical-align: middle;" colspan="3">{{ $mfto->mawb }}</th>
                    <th style="width: 100px; font-size: 10px; font-weight: bold; height: 40px; text-align: center;" colspan="2">Shispper's DATA</th>
                    <th style="height: 40px; font-size: 10px; font-weight: bold; text-align: center;" colspan="4">Consignee's Data</th>
                </tr>
                @break
            @endforeach
            <tr>
                <th style="width: 63px; height: 18px; text-align: left; font-size: 8px; font-weight: bold; word-wrap: break-word; vertical-align: center;">HOUSE AWB</th>
                <th style="width: 103px; height: 18px; text-align: left; font-size: 8px; font-weight: bold; word-wrap: break-word; vertical-align: center;">DETAILS OF PACKAGE</th>
                <th style="width: 59px; height: 18px; text-align: center; font-size: 8px; font-weight: bold; word-wrap: break-word; vertical-align: center;">Weight (Kg)</th>
                <th style="width: 47px; height: 18px; text-align: center; font-size: 8px; font-weight: bold; word-wrap: break-word; vertical-align: center;">Pieces</th>
                <th style="width: 100px; height: 18px; text-align: left; font-size: 8px; font-weight: bold; word-wrap: break-word; vertical-align: center;">Name</th>
                <th style="width: 44px; height: 18px; text-align: left; font-size: 8px; font-weight: bold; word-wrap: break-word; vertical-align: center;">Passport</th>
                <th style="width: 94px; height: 18px; text-align: left; font-size: 8px; font-weight: bold; word-wrap: break-word; vertical-align: center;">Name</th>
                <th style="width: 83px; height: 18px; text-align: left; font-size: 8px; font-weight: bold; word-wrap: break-word; vertical-align: center;">Carnet/Passport</th>
                <th style="width: 59px; height: 18px; text-align: left; font-size: 8px; font-weight: bold; word-wrap: break-word; vertical-align: center;">Phone</th>
                <th style="width: 181px; height: 20px; text-align: left; font-size: 8px; font-weight: bold; word-wrap: break-word; vertical-align: center;">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $mfto)
            <tr>
                <td style="width: 63px; height: 36px; text-align: justify; font-size: 7px; word-wrap: break-word; vertical-align: center;">{{ $mfto->noblhouse }}</td>
                <td style="width: 103px; height: 36px; text-align: justify; font-size: 7px; word-wrap: break-word; vertical-align: center;">{{ $mfto->producto }}</td>
                <td style="width: 59px; height: 36px; text-align: center; font-size: 7px; word-wrap: break-word; vertical-align: center;">{{ $mfto->pesokg }}</td>
                <td style="width: 47px; height: 36px; text-align: center; font-size: 7px; word-wrap: break-word; vertical-align: center;">{{ $mfto->bultos }}</td>
                <td style="width: 100px; height: 36px; text-align: justify; font-size: 7px; word-wrap: break-word; vertical-align: center;">{{ $mfto->remitente }}</td>
                <td style="width: 44px; height: 36px; text-align: justify; font-size: 7px; word-wrap: break-word; vertical-align: center;">{{ $mfto->nopasaporte }}</td>
                <td style="width: 94px; height: 36px; text-align: justify; font-size: 7px; word-wrap: break-word; vertical-align: center;">{{ $mfto->destinatario }}</td>
                <td style="width: 83px; height: 36px; text-align: justify; font-size: 7px; word-wrap: break-word; vertical-align: center;">{{ $mfto->ci }}</td>
                <td style="width: 59px; height: 36px; text-align: justify; font-size: 7px; word-wrap: break-word; vertical-align: center;">{{ $mfto->telefono }}</td>
                <td style="width: 181px; height: 36px; text-align: justify; font-size: 7px; word-wrap: break-word; vertical-align: center;">{{ $mfto->dir }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
