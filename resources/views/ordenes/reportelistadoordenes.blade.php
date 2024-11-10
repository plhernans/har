<!DOCTYPE HTML>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<title>Reporte de Ordenes</title>
</head>

<body>
<table cellspacing="0" border="0">
	<tr>
        <td colspan=11 align="center" valign=bottom style="background-color: #1F497D; color: white"><b>LISTADO DE ORDENES</b></td>
	</tr>
    <tr>
		<td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
	</tr>
    <tr>
        <td align="left" valign=bottom></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" colspan=2 align="center" valign=bottom bgcolor="#F2F2F2"><b>FILTRO DE BUSQUEDA</b></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" colspan=2 align="center" valign=bottom bgcolor="#F2F2F2"><b>RESUMEN</b></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
    </tr>
    <tr>
		<td align="left" valign=bottom></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">NO. EMBARQUE</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom>{{$embarque}}</td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">CANTIDAD</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="right" valign=bottom>{{$cantTotal}}</td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
	</tr>
	<tr>
		<td align="left" valign=bottom></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">MAWB/MBL</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom>{{$master}}</td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">FACTURADAS</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="right" valign=bottom>{{$ctdFacturada}}</td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
	</tr>
	<tr>
		<td align="left" valign=bottom></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">FACTURAS</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom>{{$estadof}}</td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">PENDIENTES</td>
		<td style="border-right: 1px solid #000000; border-bottom: 1px solid #000000; font-size: 9px" align="right" valign=bottom>{{$rsPdtefactura}}</td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
	</tr>
	<tr>
		<td align="left" valign=bottom></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">ORDENES</td>
		<td style="border-right: 1px solid #000000; border-bottom: 1px solid #000000; font-size: 9px" align="left" valign=bottom>{{$estadoo}}</td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
	</tr>
	<tr>
		<td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
	</tr>
    <thead>
        <tr>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 95px; font-size: 8px; font-weight: bold; color: white">EMBARQUE</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 100px; font-size: 8px; font-weight: bold; color: white">MFTO</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 95px; font-size: 8px; font-weight: bold; color: white">MASTER</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 70px; font-size: 8px; font-weight: bold; color: white">NO. ORDEN</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 62px; font-size: 8px; font-weight: bold; color: white">F. ORDEN</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 120px; font-size: 8px; font-weight: bold; color: white">REMITENTE</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 120px; font-size: 8px; font-weight: bold; color: white">CONSIGNATARIO</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 80px; font-size: 8px; font-weight: bold; color: white">NO. FACTURA</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 104px; font-size: 8px; font-weight: bold; color: white">TOTAL FACTURADO</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 95px; font-size: 8px; font-weight: bold; color: white">ESTADO FACT</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 104px; font-size: 8px; font-weight: bold; color: white">ESTADO ORDEN</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $orden)
        <tr>
            <td align="left" valign=bottom style="width: 95px; font-size: 8px">{{$orden->embarque}}</td>
            <td align="left" valign=bottom style="width: 100px; font-size: 8px">{{$orden->nomfto}}</td>
            <td align="center" valign=bottom style="width: 95px; font-size: 8px">{{$orden->master}}</td>
            <td align="right" valign=bottom style="width: 70px; font-size: 8px">{{$orden->noorden}}</td>
            <td align="center" valign=bottom style="width: 62px; font-size: 8px">{{Carbon\Carbon::parse($orden->fechaorden)->format('Y-m-d')}}</td>
            <td align="left" valign=bottom style="width: 120px; font-size: 8px">{{$orden->remitente}}</td>
            <td align="center" valign=bottom style="width: 120px; font-size: 8px">{{$orden->consignatario}}</td>
            <td align="center" valign=bottom style="width: 80px; font-size: 8px">{{$orden->nofactura}}</td>
            <td align="center" valign=bottom style="width: 104px; font-size: 8px">{{$orden->totalfacturado}}</td>
            <td align="center" valign=bottom style="width: 95px; font-size: 8px">{{$orden->estadofactura}}</td>
            <td align="center" valign=bottom style="width: 104px; font-size: 8px">{{$orden->estadoorden}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
