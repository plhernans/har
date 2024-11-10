<!DOCTYPE HTML>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<title>Reporte de Facturas</title>
</head>

<body>
<table cellspacing="0" border="0">
	<tr>
        <td colspan=10 align="center" valign=bottom style="background-color: #1F497D; color: white"><b>LISTADO DE FACTURAS</b></td>
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
    <tr>
        <td align="left" valign=bottom></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" colspan=2 align="center" valign=bottom bgcolor="#F2F2F2"><b>FILTRO DE BUSQUEDA</b></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" colspan=2 align="center" valign=bottom bgcolor="#F2F2F2"><b>RESUMEN</b></td>
    </tr>
    <tr>
		<td align="left" valign=bottom></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">RANGO DE FECHAS</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom>{{$fechadesde." al ".$fechahasta}}</td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">CANTIDAD</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="right" valign=bottom>{{$cantTotal}}</td>
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
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">EMITIDAS</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="right" valign=bottom>{{$ctdEmitida}}</td>
	</tr>
	<tr>
		<td align="left" valign=bottom></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">NO. FACTURA</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom>{{$nfactura}}</td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">CANCELADAS</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="right" valign=bottom>{{$ctdCancelada}}</td>
	</tr>
	<tr>
		<td align="left" valign=bottom></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">ESTADO</td>
		<td style="border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom>{{$estado}}</td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
        <td align="left" valign=bottom></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom bgcolor="#F2F2F2">TOTAL FACTURADO</td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="right" valign=bottom>{{"$ ".$dataTotal}}</td>
	</tr>
	<tr>
		<td align="left" valign=bottom></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; font-size: 9px; border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#F2F2F2">CONCEPTO</td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000; font-size: 9px" align="left" valign=bottom>{{$concepto}}</td>
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
	</tr>
    <thead>
        <tr>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 75px; font-size: 8px; font-weight: bold; color: white">NO. FACTURA</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 107px; font-size: 8px; font-weight: bold; color: white">FACTURADO A</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 133px; font-size: 8px; font-weight: bold; color: white">CONCEPTO</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 70px; font-size: 8px; font-weight: bold; color: white">TOTAL</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 62px; font-size: 8px; font-weight: bold; color: white">F. PAGO</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 64px; font-size: 8px; font-weight: bold; color: white">ESTADO</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 60px; font-size: 8px; font-weight: bold; color: white">F. EMITIDA</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 60px; font-size: 8px; font-weight: bold; color: white">F.MODIF</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 104px; font-size: 8px; font-weight: bold; color: white">NO. ORDEN</th>
            <th align="center" valign=bottom bgcolor="#333F50" style="width: 95px; font-size: 8px; font-weight: bold; color: white">NO. EMBARQUE</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $fact)
        <tr>
            <td align="left" valign=bottom style="width: 75px; font-size: 8px">{{$fact->nofactura}}</td>
            <td align="left" valign=bottom style="width: 107px; font-size: 8px">{{$fact->cliente}}</td>
            <td align="center" valign=bottom style="width: 133px; font-size: 8px">{{$fact->concepto}}</td>
            <td align="right" valign=bottom style="width: 70px; font-size: 8px">{{number_format($fact->total,2)}}</td>
            <td align="center" valign=bottom style="width: 62px; font-size: 8px">{{$fact->formapago}}</td>
            <td align="left" valign=bottom style="width: 64px; font-size: 8px">{{$fact->estado}}</td>
            <td align="center" valign=bottom style="width: 60px; font-size: 8px">{{Carbon\Carbon::parse($fact->emitida)->format('Y-m-d')}}</td>
            <td align="center" valign=bottom style="width: 60px; font-size: 8px">{{Carbon\Carbon::parse($fact->modificada)->format('Y-m-d')}}</td>
            <td align="center" valign=bottom style="width: 104px; font-size: 8px">{{$fact->no_orden}}</td>
            <td align="center" valign=bottom style="width: 95px; font-size: 8px">{{$fact->embarque}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- ************************************************************************** -->
</body>

</html>
