<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>

	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<title></title>
	<meta name="AWB" />
	<meta name="author" content="Jota"/>
	<meta name="created" content="2006-06-30T20:22:58"/>
	<meta name="changedby" content="Jaen"/>
	<meta name="changed" content="2022-07-22T00:58:15"/>

	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:9px }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  }
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  }
		comment { display:none;  }
		.sorttable_sorted,.sorttable_sorted_reverse,table.sortable thead td:not(.sorttable_sorted):not(.sorttable_sorted_reverse):not(.sorttable_nosort) { white-space: nowrap; cursor: pointer; }
		table.sortable thead td:not(.sorttable_sorted):not(.sorttable_sorted_reverse):not(.sorttable_nosort):after { content:" \25B4\25BE"; min-width: 1010px;}
	</style>

</head>

<body>
<table cellspacing="0" border="0" class="sortable">
	<colgroup width="22"></colgroup>
	<colgroup width="37"></colgroup>
	<colgroup width="31"></colgroup>
	<colgroup span="2" width="16"></colgroup>
	<colgroup width="26"></colgroup>
	<colgroup width="13"></colgroup>
	<colgroup span="2" width="16"></colgroup>
	<colgroup width="62"></colgroup>
	<colgroup width="28"></colgroup>
	<colgroup width="11"></colgroup>
	<colgroup width="26"></colgroup>
	<colgroup width="25"></colgroup>
	<colgroup width="13"></colgroup>
	<colgroup width="25"></colgroup>
	<colgroup width="13"></colgroup>
	<colgroup width="16"></colgroup>
	<colgroup width="13"></colgroup>
	<colgroup width="31"></colgroup>
	<colgroup width="28"></colgroup>
	<colgroup width="26"></colgroup>
	<colgroup span="2" width="28"></colgroup>
	<colgroup width="13"></colgroup>
	<colgroup width="96"></colgroup>
	<colgroup width="105"></colgroup>

    @foreach ($awbs as $awb )
	<tr>
		{{-- <td height="17" align="left" bgcolor="red"><b><br></b></td> --}}
		<td style="border-bottom: 1px solid #000000" align="left" sdnum="1033;0;@"><b>{{substr($awb->mawb,0,3)}}</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" sdnum="1033;0;@"><b>SDQ</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=6 align="left" bgcolor="#FFFFFF" sdnum="1033;0;@"><b>{{$awb->mawb}}</b></td>
		<td style="border-bottom: 1px solid #000000" colspan=13 align="center" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000" align="center" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000" colspan=2 align="right" bgcolor="#FFFFFF"><b>{{$awb->mawb}}</b></td>
	</tr>
	<tr>
		{{-- <td height="12" align="left" bgcolor="red"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=9 align="left" bgcolor="#FFFFFF"><font sizze=8px>Shipper&acute;s  Name and Address</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 align="left" valign=top bgcolor="#FFFFFF"><font sizze=8px>Account No.</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=7 align="left" bgcolor="#FFFFFF"><font sizze=8px>Not Negotiable</font></td>
		<td style="border-top: 1px solid #000000" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
	</tr>
	<tr>
		{{-- <td height="21" align="left" bgcolor="red"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000" colspan=14 align="left" bgcolor="#FFFFFF"><b>{{$awb->shipper}}</b></td>
		<td style="border-bottom: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="left" valign=top bgcolor="#FFFFFF"><b><i><font size=3>{{$awb->aerolinea}}</font></i></b></td>
	</tr>
	<tr>
		{{-- <td height="38" align="left" bgcolor="red"><font sizze=8px></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; min-width: 3500px;" colspan=16 rowspan=2 align="left" valign=top><b>{{$awb->dirshipper}}</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="left" valign=middle bgcolor="#FFFFFF">{{$awb->aerolinea}}</td>
	</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="left"><font sizze=8px>Copies 1,2 and 3 of this Air WayBill are originals and have the same validity</font></td>
		</tr>
	<tr>
		{{-- <td height="19" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=9 align="left" valign=top bgcolor="#FFFFFF"><font sizze=8px>Consignee&acute;s Name and Address</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; max-height: 25px" colspan=7 align="left" valign=top bgcolor="#FFFFFF"><font sizze=8px>Account No.</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=5 align="justify" valign=top><font sizze=8px>It is agreed that the goods described herein are accepted in apparent good order and condition (except as noted) for carriage  SUBJECT TO THE CONDITIONS OF CONTRACT ON THE REVERSE HEREOF ALL GOODS MAY BE CARRIER UNLESS SPECIFIC CONTRARY INSTRUCTIONS ARE GIVEN HEREON BY THE SHIPPER, AND SHIPPER AGREES THAT THE SHIPMENT MAY BE CARRIED VIA INTERMEDIATE STOPPING PLACES WHICH THE CARRIER DEEMS APPROPIATE  THE LIABILITY. Shipper may increase such limitation of liability by declaring a higher value for carriage and paying a supplemental charge  if required</font></td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b>{{$awb->consignee}}</b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" bgcolor="#FFFFFF"><b>{{$awb->direccion}}</b></td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" bgcolor="#FFFFFF"></td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" valign=top></td>
		</tr>
	<tr>
		{{-- <td height="15" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" valign=top bgcolor="#FFFFFF"><font sizze=8px>Issuing Carrier&acute;s Agent Name and City</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="left" bgcolor="#FFFFFF"><font sizze=8px>Accounting Information</font></td>
		</tr>
	<tr>
		{{-- <td height="48" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; min-width: 550px;" colspan=16 align="left" valign=middle bgcolor="#FFFFFF"><b>{{"GLOSHIMA SRL, DOMINICANA"}}</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=5 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="13" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="left" valign=top bgcolor="#FFFFFF"><font sizze=8px>Agent&acute;s IATA Code</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="left" bgcolor="#FFFFFF"><font sizze=8px>Account No.</font></td>
		</tr>
	<tr>
		{{-- <td height="16" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="left" bgcolor="#FFFFFF"><b>NULL</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="left" bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="14" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" bgcolor="#FFFFFF"><font sizze=8px>Airport of Departure (Addr. Of First Carrier) and Requested Routing</font></td>
		</tr>
	<tr>
		{{-- <td height="18" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" bgcolor="#FFFFFF"><b>{{$awb->portorigen}}</b></td>
		</tr>
	<tr>
		{{-- <td height="11" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF"><font sizze=8px>To</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" bgcolor="#FFFFFF"><font size=8px>By First Carrier</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" bgcolor="#FFFFFF"><font size=8px>Routing and destination</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" bgcolor="#FFFFFF"><font size=8px>to</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF"><font sizze=8px>by</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" bgcolor="#FFFFFF"><font size=8px>to</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" bgcolor="#FFFFFF"><font size=8px>by</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" bgcolor="#FFFFFF"><font size=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><font sizze=8px>CHGS </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" bgcolor="#FFFFFF"><font size=8px>WT / VAL</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" bgcolor="#FFFFFF"><font size=8px>Others</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" bgcolor="#FFFFFF"><font size=8px>Declared Value for carriage</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><font size=8px>Declare Value for customs</font></td>
	</tr>
	<tr>
		{{-- <td height="13" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" bgcolor="#FFFFFF"><b>{{$awb->destino}}AV</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 rowspan=2 align="left" bgcolor="#FFFFFF"><b>{{$awb->aerolinea}}</b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" bgcolor="#FFFFFF"><b>USD</b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><font sizze=8px>CODE</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><font size=8px>PPD</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><font size=8px>COLL</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><font size=8px>PPD</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><font size=8px>COLL</font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" bgcolor="#FFFFFF"><b>N.V.D</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
	</tr>
	<tr>
		{{-- <td height="16" align="left" bgcolor="#FFFFFF"><br></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><b>PP</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><b>x</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><b>x</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="17" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>Airport of Destination</font></td>
		<td style="border-top: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>Flight / Date</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>For Carrier Use Only</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>Flight / Date</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>Amount of Insurance</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="justify" valign=top bgcolor="#FFFFFF"><font sizze=8px>INSURANCE: If carriers offers insurance, and such insurance is requested in accordance with the conditions thereof, indicate amount to be insured in figures in box marked. &quot;Amount of Insurance&quot;</font></td>
		</tr>
	<tr>
		{{-- <td height="26" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="center" bgcolor="#FFFFFF"><b>{{$awb->destino}}</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" bgcolor="#FFFFFF"><b>{{$awb->aeronave." / ".$awb->vuelo}}</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" bgcolor="#FFFFFF" sdnum="1033;1033;D-MMM"><b>{{$awb->fecha}}</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center" bgcolor="#FFFFFF"><b>NIL</b></td>
		</tr>
	<tr>
		{{-- <td height="16" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=26 align="left" valign=top bgcolor="#FFFFFF"><font sizze=8px>Handling Information </font></td>
		</tr>
	<tr>
		{{-- <td height="18" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=26 align="left" bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="18" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF"><b><br></b></td>
	</tr>
	<tr>
		{{-- <td height="18" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=26 align="left" bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=26 align="left" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="18" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" bgcolor="#FFFFFF"><font sizze=8px>No. Of Pieces RCP</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px>Gross       Weight</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px>kg  lb </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=10 align="center" bgcolor="#C0C0C0"><font sizze=8px color="#FF0000"><br></font></td>
		<td style="border-top: 1px solid #000000" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px>Rate Class</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=9 align="center" bgcolor="#C0C0C0"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>Chargeable  weight </font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=9 align="center" bgcolor="#C0C0C0"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>Rate  /  Charge </font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=10 align="center" bgcolor="#C0C0C0"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 rowspan=2 align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>Total </font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=10 align="center" bgcolor="#C0C0C0"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>Nature and Quantity of Goods</font></td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-right: 1px solid #000000" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px>Commodity                         Item   No.</font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>(incl. Dimensions of Volume)</font></td>
		</tr>
	<tr>
		{{-- <td height="17" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-top: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=middle bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="18" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF" sdval="42" sdnum="1033;"><b>{{$awb->cantidad}}</b></td>
		<td colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b>{{$awb->gross}} KG</b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b>GCR</b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle bgcolor="#FFFFFF" sdval="178" sdnum="1033;"><b>{{$awb->gross}}</b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF" sdval="2.08" sdnum="1033;"><b>{{$awb->precio}}</b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=middle bgcolor="#FFFFFF" sdval="370.24" sdnum="1033;0;#,##0.00"><b>{{$awb->pagado}}</b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=top bgcolor="#FFFFFF"><b>{{$awb->descripcion}}</b></td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=top bgcolor="#FFFFFF">null</td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=top bgcolor="#FFFFFF"><b>null</b></td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top><b><br></b></td>
		<td style="border-left: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="23" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top sdval="42" sdnum="1033;"><b>{{$awb->cantidad}}</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=top><b>{{$awb->gross}} K</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td align="left" bgcolor="#C0C0C0"><font sizze=8px><br></font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" bgcolor="#C0C0C0"><font sizze=8px><br></font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdval="370.24" sdnum="1033;0;&quot;$&quot;#,##0.00"><b>{{$awb->pagado}}</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=top bgcolor="#FFFFFF"><b>{{$awb->cantidad}} BULTOS </b></td>
		</tr>
	<tr>
		{{-- <td height="17" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center"><font sizze=8px>Prepaid</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center"><font sizze=8px>Weight Charge</font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center"><font sizze=8px>Collect </font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" bgcolor="#FFFFFF"><font sizze=8px>Other Charges </font></td>
		</tr>
	<tr>
		{{-- <td height="21" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdval="370.24" sdnum="1033;0;&quot;$&quot;#,##0.00"><b>${{$awb->pagado}}</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
		<td style="border-left: 1px solid #000000" colspan=10 align="left" valign=top bgcolor="#FFFFFF"><b>AWB FEE&hellip;&hellip;&hellip;..            10.00</b></td>
		<td align="left" valign=top bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
		<td align="left" valign=top bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
		<td align="left" valign=top bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
		<td align="left" valign=top bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
		<td align="left" valign=top bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><b><br></b></td>
		<td style="border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
	</tr>
	<tr>
		{{-- <td height="16" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center"><font sizze=8px>Valuation Charge</font></td>
		<td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000" colspan=10 align="left" valign=top bgcolor="#FFFFFF"><b>P.S.C&hellip;&hellip;&hellip;&hellip;&hellip;.             14.24</b></td>
		<td colspan=4 align="right" valign=top bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
		<td align="left" valign=top bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><b><br></b></td>
		<td style="border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
	</tr>
	<tr>
		{{-- <td height="17" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=5 align="center" sdnum="1033;0;#,##0.00"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdnum="1033;0;#,##0.00"><b><br></b></td>
		<td style="border-left: 1px solid #000000" colspan=10 align="left" valign=top bgcolor="#FFFFFF"><b>F.S.C&hellip;&hellip;&hellip;&hellip;&hellip;.             35.60</b></td>
		<td colspan=4 align="right" valign=top bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
		<td align="left" valign=top bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><b><br></b></td>
		<td style="border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
	</tr>
	<tr>
		{{-- <td height="22" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center"><font sizze=8px>Tax</font></td>
		<td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000" colspan=10 align="left" valign=top bgcolor="#FFFFFF"><b>M.X.C. &hellip;&hellip;&hellip;.&hellip;.              3.00</b></td>
		<td style="border-bottom: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=top bgcolor="#FFFFFF" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000" rowspan=2 align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=top bgcolor="#FFFFFF"><b><br></b></td>
	</tr>
	<tr>
		{{-- <td height="27" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=5 align="center"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center"><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=9 align="left" valign=top bgcolor="#FFFFFF"><b><br></b></td>
		<td align="left" valign=top bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="21" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="center"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="center"><font sizze=8px>Total Others Charges Due Agent</font></td>
		<td style="border-top: 1px solid #000000" align="center"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 rowspan=2 align="justify" valign=top bgcolor="#FFFFFF"><font sizze=8px>Shipper certifies that the particulars on the face hereof  are correct and that insofar as any part of the consignment contains dangerous goods, such part is properly described by name and is in proper condition for carriage by air according to the applic</font></td>
		</tr>
	<tr>
		{{-- <td height="25" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=5 align="center" sdval="75.94" sdnum="1033;0;#,##0.00"><b>null</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=5 align="center" sdnum="1033;0;#,##0.00"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="13" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" rowspan=2 align="center"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 rowspan=2 align="center"><font sizze=8px>Total Others Charges Due Carrier</font></td>
		<td style="border-top: 1px solid #000000" rowspan=2 align="center"><font sizze=8px><br></font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 rowspan=2 align="center" bgcolor="#FFFFFF"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="11" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		</tr>
	<tr>
		{{-- <td height="20" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdval="62.84" sdnum="1033;0;#,##0.00"><b>null</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=5 align="center" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="center" bgcolor="#FFFFFF"><b>GLOSHIMA AF CARGO S.R.L</b></td>
		</tr>
	<tr>
		{{-- <td height="13" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" bgcolor="#C0C0C0"><font sizze=8px><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=5 align="center" bgcolor="#C0C0C0"><font sizze=8px><br></font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="center" valign=top bgcolor="#FFFFFF"><font sizze=8px>Signature of Shippers or his Agent</font></td>
		</tr>
	<tr>
		{{-- <td height="17" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center"><font sizze=8px>Total Prepaid</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center"><font sizze=8px>Total Collect</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 rowspan=2 align="center"><font sizze=8px><br></font></td>
		</tr>
	<tr>
		{{-- <td height="25" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdval="509.02" sdnum="1033;0;&quot;$&quot;#,##0.00"><b>NULL</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdnum="1033;0;&quot;$&quot;#,##0.00"><b><br></b></td>
		</tr>
	<tr>
		{{-- <td height="17" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center"><font sizze=8px>Currency Coversion Rates</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center"><font sizze=8px>CC Charges in Dest. Currency</font></td>
		<td style="border-bottom: 1px dotted #000000; border-left: 1px solid #000000" colspan=6 align="center" bgcolor="#FFFFFF" sdnum="1033;1033;D-MMM-YY"><b>{{$awb->fecha}}</b></td>
		<td style="border-bottom: 1px dotted #000000" colspan=7 align="center" bgcolor="#FFFFFF"><b>SDQ.</b></td>
		<td style="border-bottom: 1px dotted #000000; border-right: 1px solid #000000" colspan=3 align="center" bgcolor="#FFFFFF"><b>I. MICHES M.</b></td>
		</tr>
	<tr>
		{{-- <td height="17" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdnum="1033;0;#,##0.00"><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdnum="1033;0;#,##0.00"><b><br></b></td>
		<td style="border-top: 1px dotted #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left"><font sizze=8px>      Executed on (date)                                     at (place)                                              Signature of issuing Carrier or its Agent</font></td>
		</tr>
	<tr>
		{{-- <td height="17" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 rowspan=2 align="center" valign=middle><font sizze=8px>For Carrier Use Only  at Destination</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center"><font sizze=8px>Charges at Destination</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center"><font sizze=8px>Total Collect Charges</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=11 align="center" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		</tr>
	<tr>
		{{-- <td height="19" align="left" bgcolor="#FFFFFF"><font sizze=8px><br></font></td> --}}
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdnum="1033;0;#,##0.00"><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" sdnum="1033;0;#,##0.00"><b><br></b></td>
		<td style="border-left: 1px solid #000000" colspan=9 align="center" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		<td colspan=2 align="right" bgcolor="#FFFFFF"><b>{{$awb->mawb}}</b></td>
		</tr>
	<tr>
		<td colspan=27 height="17" align="center" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
		</tr>
	<tr>
		<td colspan=27 height="13" align="center" bgcolor="#FFFFFF"><font sizze=8px><br></font></td>
	</tr>
    @endforeach
</table>
<!-- ************************************************************************** -->
<script>var stIsIE=!1;if(sorttable={init:function(){arguments.callee.done||(arguments.callee.done=!0,_timer&&clearInterval(_timer),document.createElement&&document.getElementsByTagName&&(sorttable.DATE_RE=/^(\d\d?)[\/\.-](\d\d?)[\/\.-]((\d\d)?\d\d)$/,forEach(document.getElementsByTagName("table"),function(t){-1!=t.className.search(/\bsortable\b/)&&sorttable.makeSortable(t)})))},makeSortable:function(t){if(0==t.getElementsByTagName("thead").length&&(the=document.createElement("thead"),the.appendChild(t.rows[0]),t.insertBefore(the,t.firstChild)),null==t.tHead&&(t.tHead=t.getElementsByTagName("thead")[0]),1==t.tHead.rows.length){sortbottomrows=[];for(var e=0;e<t.rows.length;e++)-1!=t.rows[e].className.search(/\bsortbottom\b/)&&(sortbottomrows[sortbottomrows.length]=t.rows[e]);if(sortbottomrows){null==t.tFoot&&(tfo=document.createElement("tfoot"),t.appendChild(tfo));for(e=0;e<sortbottomrows.length;e++)tfo.appendChild(sortbottomrows[e]);delete sortbottomrows}headrow=t.tHead.rows[0].cells;for(e=0;e<headrow.length;e++)headrow[e].className.match(/\bsorttable_nosort\b/)||(mtch=headrow[e].className.match(/\bsorttable_([a-z0-9]+)\b/),mtch&&(override=mtch[1]),mtch&&"function"==typeof sorttable["sort_"+override]?headrow[e].sorttable_sortfunction=sorttable["sort_"+override]:headrow[e].sorttable_sortfunction=sorttable.guessType(t,e),headrow[e].sorttable_columnindex=e,headrow[e].sorttable_tbody=t.tBodies[0],dean_addEvent(headrow[e],"click",sorttable.innerSortFunction=function(t){if(-1!=this.className.search(/\bsorttable_sorted\b/))return sorttable.reverse(this.sorttable_tbody),this.className=this.className.replace("sorttable_sorted","sorttable_sorted_reverse"),this.removeChild(document.getElementById("sorttable_sortfwdind")),sortrevind=document.createElement("span"),sortrevind.id="sorttable_sortrevind",sortrevind.innerHTML=stIsIE?'&nbsp<font face="webdings">5</font>':"&nbsp;&#x25B4;",void this.appendChild(sortrevind);if(-1!=this.className.search(/\bsorttable_sorted_reverse\b/))return sorttable.reverse(this.sorttable_tbody),this.className=this.className.replace("sorttable_sorted_reverse","sorttable_sorted"),this.removeChild(document.getElementById("sorttable_sortrevind")),sortfwdind=document.createElement("span"),sortfwdind.id="sorttable_sortfwdind",sortfwdind.innerHTML=stIsIE?'&nbsp<font face="webdings">6</font>':"&nbsp;&#x25BE;",void this.appendChild(sortfwdind);theadrow=this.parentNode,forEach(theadrow.childNodes,function(t){1==t.nodeType&&(t.className=t.className.replace("sorttable_sorted_reverse",""),t.className=t.className.replace("sorttable_sorted",""))}),sortfwdind=document.getElementById("sorttable_sortfwdind"),sortfwdind&&sortfwdind.parentNode.removeChild(sortfwdind),sortrevind=document.getElementById("sorttable_sortrevind"),sortrevind&&sortrevind.parentNode.removeChild(sortrevind),this.className+=" sorttable_sorted",sortfwdind=document.createElement("span"),sortfwdind.id="sorttable_sortfwdind",sortfwdind.innerHTML=stIsIE?'&nbsp<font face="webdings">6</font>':"&nbsp;&#x25BE;",this.appendChild(sortfwdind),row_array=[],col=this.sorttable_columnindex,rows=this.sorttable_tbody.rows;for(var e=0;e<rows.length;e++)row_array[row_array.length]=[sorttable.getInnerText(rows[e].cells[col]),rows[e]];row_array.sort(this.sorttable_sortfunction),tb=this.sorttable_tbody;for(e=0;e<row_array.length;e++)tb.appendChild(row_array[e][1]);delete row_array}))}},guessType:function(t,e){sortfn=sorttable.sort_alpha;for(var r=0;r<t.tBodies[0].rows.length;r++)if(text=sorttable.getInnerText(t.tBodies[0].rows[r].cells[e]),""!=text){if(text.match(/^-?[£$¤]?[\d,.]+%?$/))return sorttable.sort_numeric;if(possdate=text.match(sorttable.DATE_RE),possdate){if(first=parseInt(possdate[1]),second=parseInt(possdate[2]),first>12)return sorttable.sort_ddmm;if(second>12)return sorttable.sort_mmdd;sortfn=sorttable.sort_ddmm}}return sortfn},getInnerText:function(t){if(!t)return"";if(hasInputs="function"==typeof t.getElementsByTagName&&t.getElementsByTagName("input").length,null!=t.getAttribute("sorttable_customkey"))return t.getAttribute("sorttable_customkey");if(void 0!==t.textContent&&!hasInputs)return t.textContent.replace(/^\s+|\s+$/g,"");if(void 0!==t.innerText&&!hasInputs)return t.innerText.replace(/^\s+|\s+$/g,"");if(void 0!==t.text&&!hasInputs)return t.text.replace(/^\s+|\s+$/g,"");switch(t.nodeType){case 3:if("input"==t.nodeName.toLowerCase())return t.value.replace(/^\s+|\s+$/g,"");case 4:return t.nodeValue.replace(/^\s+|\s+$/g,"");case 1:case 11:for(var e="",r=0;r<t.childNodes.length;r++)e+=sorttable.getInnerText(t.childNodes[r]);return e.replace(/^\s+|\s+$/g,"");default:return""}},reverse:function(t){newrows=[];for(var e=0;e<t.rows.length;e++)newrows[newrows.length]=t.rows[e];for(e=newrows.length-1;e>=0;e--)t.appendChild(newrows[e]);delete newrows},sort_numeric:function(t,e){return aa=parseFloat(t[0].replace(/[^0-9.-]/g,"")),isNaN(aa)&&(aa=0),bb=parseFloat(e[0].replace(/[^0-9.-]/g,"")),isNaN(bb)&&(bb=0),aa-bb},sort_alpha:function(t,e){return t[0]==e[0]?0:t[0]<e[0]?-1:1},sort_ddmm:function(t,e){return mtch=t[0].match(sorttable.DATE_RE),y=mtch[3],m=mtch[2],d=mtch[1],1==m.length&&(m="0"+m),1==d.length&&(d="0"+d),dt1=y+m+d,mtch=e[0].match(sorttable.DATE_RE),y=mtch[3],m=mtch[2],d=mtch[1],1==m.length&&(m="0"+m),1==d.length&&(d="0"+d),dt2=y+m+d,dt1==dt2?0:dt1<dt2?-1:1},sort_mmdd:function(t,e){return mtch=t[0].match(sorttable.DATE_RE),y=mtch[3],d=mtch[2],m=mtch[1],1==m.length&&(m="0"+m),1==d.length&&(d="0"+d),dt1=y+m+d,mtch=e[0].match(sorttable.DATE_RE),y=mtch[3],d=mtch[2],m=mtch[1],1==m.length&&(m="0"+m),1==d.length&&(d="0"+d),dt2=y+m+d,dt1==dt2?0:dt1<dt2?-1:1},shaker_sort:function(t,e){for(var r=0,o=t.length-1,n=!0;n;){n=!1;for(var s=r;s<o;++s)if(e(t[s],t[s+1])>0){var a=t[s];t[s]=t[s+1],t[s+1]=a,n=!0}if(o--,!n)break;for(s=o;s>r;--s)if(e(t[s],t[s-1])<0){a=t[s];t[s]=t[s-1],t[s-1]=a,n=!0}r++}}},document.addEventListener&&document.addEventListener("DOMContentLoaded",sorttable.init,!1),/WebKit/i.test(navigator.userAgent))var _timer=setInterval(function(){/loaded|complete/.test(document.readyState)&&sorttable.init()},10);function dean_addEvent(t,e,r){if(t.addEventListener)t.addEventListener(e,r,!1);else{r.$$guid||(r.$$guid=dean_addEvent.guid++),t.events||(t.events={});var o=t.events[e];o||(o=t.events[e]={},t["on"+e]&&(o[0]=t["on"+e])),o[r.$$guid]=r,t["on"+e]=handleEvent}}function removeEvent(t,e,r){t.removeEventListener?t.removeEventListener(e,r,!1):t.events&&t.events[e]&&delete t.events[e][r.$$guid]}function handleEvent(t){var e=!0;t=t||fixEvent(((this.ownerDocument||this.document||this).parentWindow||window).event);var r=this.events[t.type];for(var o in r)this.$$handleEvent=r[o],!1===this.$$handleEvent(t)&&(e=!1);return e}function fixEvent(t){return t.preventDefault=fixEvent.preventDefault,t.stopPropagation=fixEvent.stopPropagation,t}window.onload=sorttable.init,dean_addEvent.guid=1,fixEvent.preventDefault=function(){this.returnValue=!1},fixEvent.stopPropagation=function(){this.cancelBubble=!0},Array.forEach||(Array.forEach=function(t,e,r){for(var o=0;o<t.length;o++)e.call(r,t[o],o,t)}),Function.prototype.forEach=function(t,e,r){for(var o in t)void 0===this.prototype[o]&&e.call(r,t[o],o,t)},String.forEach=function(t,e,r){Array.forEach(t.split(""),function(o,n){e.call(r,o,n,t)})};var forEach=function(t,e,r){if(t){var o=Object;if(t instanceof Function)o=Function;else{if(t.forEach instanceof Function)return void t.forEach(e,r);"string"==typeof t?o=String:"number"==typeof t.length&&(o=Array)}o.forEach(t,e,r)}};</script>
</body>

</html>
