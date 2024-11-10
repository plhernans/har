<?php

namespace App\Http\Controllers\CargoFactura;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\FacturaDato;
use App\Models\Ordene;
use App\Models\TcFormapago;
use App\Models\Vfactura;
use App\Models\Vfacturapreview;
use App\Models\Vlistadofactura;
use App\Models\VprefactDato;
use App\Models\Vprefactura;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listadoFacts = Vlistadofactura::distinct()->orderBy('emitida','Asc')->get();
        return view('Facturas.listadoFactura',compact('listadoFacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        global $consecutivo,$numfactura,$num;

        $fields = request()->validate([
            'noorden'=>'required',
            'telefono'=>'required',
            'cliente'=>'required',
            'direccion'=>'required',
            'fpago'=>'required',
            'subtotal'=>'required',
            'iva'=>'required',
            'ivavalor' => 'required',
            'total'=>'required'
        ]);

        DB::beginTransaction();
        try{

            $orden=Ordene::where('no_orden',$fields['noorden'])->get('idorden');
            $fpago=TcFormapago::where('formapago',$fields['fpago'])->get('idfpago');
            $year = substr(Carbon::now('Y'),0,4);
            $sequencia = FacturaDato::where('anno',$year)->get('consecutivo')->last();

            if($sequencia != null){
                $num = $sequencia['consecutivo']+1;
                $consecutivo = str_pad($num, 6, '0', STR_PAD_LEFT);
                $numfactura = 'F'.$year.'-'.$consecutivo;
            }
            else{
                $num=1;
                $consecutivo = str_pad($num, 6, '0', STR_PAD_LEFT);
                $numfactura='F'.$year.'-'.$consecutivo;
            }

            FacturaDato::create([
                'idorden'=>$orden[0]['idorden'],
                'idfpago'=>$fpago[0]['idfpago'],
                'nofactura'=>$numfactura,
                'anno' => $year,
                'consecutivo' => $num,
                'cliente'=>$fields['cliente'],
                'telefono'=>$fields['telefono'],
                'direccion'=>strtoupper($fields['direccion']),
                'estado' => 'EMITIDA',
                'subtotal'=>$fields['subtotal'],
                'iva'=> $fields['iva'],
                'valoriva'=> $fields['ivavalor'],
                'total'=>$fields['total'],
                'obs'=>strtoupper($request['obs'])
            ]);

            $factura=FacturaDato::where('idorden',$orden[0]['idorden'])->get('idfactura_dato')->last();
            foreach($request->datos as $dato){
                Cargo::where('idcargo',$dato['idcargo'])->update([
                    'idfactura'=>$factura['idfactura_dato'],
                    'facturado'=>'Y'
                ]);

            }

            DB::commit();
            return response()->json([
                'success' => 'true',
                'message'=>'Los datos han sido guardado correctamente'
            ]);
        }
        catch(Exception $e){
            Db::rollBack();
            $error = $e->getMessage();
            return response()->json([
                'success' => 'false',
                'message'=>''.$error.''
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nofactura)
    {
        $fields = request()->validate([
            'telefono'=>'required',
            'cliente'=>'required',
            'direccion'=>'required'
        ]);

        DB::beginTransaction();
        try{
            FacturaDato::where('nofactura',$nofactura)->update([
                'cliente'=>strtoupper($fields['cliente']),
                'telefono'=>$fields['telefono'],
                'direccion'=>strtoupper($fields['direccion']),
                'obs'=>strtoupper($request['obs'])
            ]);

            DB::commit();
            return response()->json([
                'success' => 'true',
                'message'=>'Los datos han sido actualizados correctamente'
            ]);
        }
        catch(Exception $e){
            Db::rollBack();
            $error = $e->getMessage();
            return response()->json([
                'success' => 'false',
                'message'=>''.$error.''
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $nofactura)
    {
        DB::beginTransaction();
        try{

            $today = substr(Carbon::now('Y'),0,10);
            FacturaDato::where('nofactura',$nofactura)->update([
                'estado'=>'CANCELADA',
                'fcancelado'=> $today,
                'motivocancelado' =>strtoupper($request['motivo'])
            ]);
            $facturacancelada = FacturaDato::where('nofactura',$nofactura)->where('estado','CANCELADA')->get('idfactura_dato');
            Cargo::where('idfactura',$facturacancelada[0]['idfactura_dato'])->update([
                'facturado'=>'YC'
            ]);

            DB::commit();
                return response()->json([
                    'success' => 'true',
                    'message'=>'La Factura '.$nofactura.' ha sido cancelada'
            ]);
        }
        catch(Exception $e){
            Db::rollBack();
            $error = $e->getMessage();
            return response()->json([
                'success' => 'false',
                'message'=>''.$error.''
            ]);
        }

    }

    public function getDatosFactura(Request $request)
    {
        $jsondata=array();
        $jsondata['data'] = Vprefactura::where('noblhouse',$request['noblhouse'])->get()->all();
        // dd(count($jsondata['data']));
        if($jsondata['data'] == null){
            $jsondata['success'] = false;
            $jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
        else{
            $jsondata['success'] = true;
            $jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
    }

    public function getTipocobroDetalle(Request $request)
    {
        $jsondata=array();

        if($request['tipocobro']=='DOCUMENTO'){

            $jsondata['success'] = true;
            $jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
        else if($request['tipocobro']=='MISCELANEA' || $request['tipocobro']=='KG'){

            $jsondata['data'] = Vprefactura::where('noorden',$request['noblhouse'])->where('target','KG')->get()->all();

            if($jsondata['data'] == null){
                $jsondata['success'] = false;
                $jsondata['message'] = 'Request made';
                echo json_encode($jsondata);
            }
            else{
                $jsondata['success'] = true;
                $jsondata['message'] = 'Request made';
                echo json_encode($jsondata);
            }
        }
        // else if($request['tipocobro']=='KG'){

        //     $jsondata['data'] = Vprefactura::where('noorden',$request['noblhouse'])->where('target','KG')->get()->all();

        //     if($jsondata['data'] == null){
        //         $jsondata['success'] = false;
        //         $jsondata['message'] = 'Request made';
        //         echo json_encode($jsondata);
        //     }
        //     else{
        //         $jsondata['success'] = true;
        //         $jsondata['message'] = 'Request made';
        //         echo json_encode($jsondata);
        //     }
        // }
        else if($request['tipocobro']=='M3'){

            $jsondata['data'] = Vprefactura::where('noorden',$request['noblhouse'])->where('target','M3')->get()->all();

            if($jsondata['data'] == null){
                $jsondata['success'] = false;
                $jsondata['message'] = 'Request made';
                echo json_encode($jsondata);
            }
            else{
                $jsondata['success'] = true;
                $jsondata['message'] = 'Request made';
                echo json_encode($jsondata);
            }
        }
        else{

            $jsondata['data'] = Vprefactura::where('noorden',$request['noblhouse'])->where('target',$request['tipocobro'])->get()->all();

            if($jsondata['data'] == null){
                $jsondata['success'] = false;
                $jsondata['message'] = 'Request made';
                echo json_encode($jsondata);
            }
            else{
                $jsondata['success'] = true;
                $jsondata['message'] = 'Request made';
                echo json_encode($jsondata);
            }
        }
    }

    //Concatena nombres
    public function getDatosFacturaDetalle(Request $request)
    {
        $jsondata=array();
        $jsondata['data'] = VprefactDato::where('nombre',$request['cliente'])->get()->all();

        $jsondata['success'] = true;
        $jsondata['message'] = 'Request made';
        echo json_encode($jsondata);
    }

    //Obtiene listado de faturas en el sistema
    public function listaFacturas(Request $request){

        if ($request->isMethod('post')){
            $finicio = $request->input("desde");
            $ffin = $request->input("hasta");
            $nofactura = $request->input("nofact");
            $estado = $request->input("estado");
            $concepto = $request->input("concepto");
            $embarque = $request->input("embarque");

            if($finicio == ''){
                $fechadesde="2022"."-"."01"."-"."01";
            }
            else{
                $fechadesde=$finicio;
            }

            if($ffin == ''){
                $fechahasta="3000"."-"."12"."-"."31";
            }
            else{
                $fechahasta=$ffin;
            }

            $jsondata=array();

            if($estado != 'TODOS' && $estado == 'EMITIDA'){
                $jsondata['data'] = Vlistadofactura::where('emitida','>=',$fechadesde)->where('emitida','<=',$fechahasta)->nofacturas($nofactura)->estados($estado)->conceptos($concepto)->embarques($embarque)->get()->all();
                $jsondata['ctEmitida']= Vlistadofactura::where('emitida','>=',$fechadesde)->where('emitida','<=',$fechahasta)->where('estado','EMITIDA')->nofacturas($nofactura)->conceptos($concepto)->embarques($embarque)->count();
                $jsondata['totalfact']= Vlistadofactura::where('emitida','>=',$fechadesde)->where('emitida','<=',$fechahasta)->where('estado','EMITIDA')->nofacturas($nofactura)->conceptos($concepto)->embarques($embarque)->sum('total');
                $jsondata['ctCancelada']= 0;
            }
            else if($estado != 'TODOS' && $estado == 'CANCELADA'){
                $jsondata['data'] = Vlistadofactura::where('emitida','>=',$fechadesde)->where('emitida','<=',$fechahasta)->nofacturas($nofactura)->estados($estado)->conceptos($concepto)->embarques($embarque)->get()->all();
                $jsondata['ctEmitida']= 0;
                $jsondata['totalfact']= Vlistadofactura::where('emitida','>=',$fechadesde)->where('emitida','<=',$fechahasta)->where('estado','EMITIDA')->nofacturas($nofactura)->conceptos($concepto)->embarques($embarque)->sum('total');
                $jsondata['ctCancelada']= Vlistadofactura::where('emitida','>=',$fechadesde)->where('emitida','<=',$fechahasta)->where('estado','CANCELADA')->nofacturas($nofactura)->conceptos($concepto)->embarques($embarque)->count();
            }
            else{
                $jsondata['data'] = Vlistadofactura::where('emitida','>=',$fechadesde)->where('emitida','<=',$fechahasta)->nofacturas($nofactura)->estados($estado)->conceptos($concepto)->embarques($embarque)->get()->all();
                $jsondata['ctEmitida']= Vlistadofactura::where('emitida','>=',$fechadesde)->where('emitida','<=',$fechahasta)->where('estado','EMITIDA')->nofacturas($nofactura)->conceptos($concepto)->embarques($embarque)->count();
                $jsondata['totalfact']= Vlistadofactura::where('emitida','>=',$fechadesde)->where('emitida','<=',$fechahasta)->where('estado','EMITIDA')->nofacturas($nofactura)->conceptos($concepto)->embarques($embarque)->sum('total');
                $jsondata['ctCancelada']= Vlistadofactura::where('emitida','>=',$fechadesde)->where('emitida','<=',$fechahasta)->where('estado','CANCELADA')->nofacturas($nofactura)->conceptos($concepto)->embarques($embarque)->count();
            }

            if($jsondata['data'] == null){
                $jsondata['success'] = false;
                $jsondata['message'] = 'Request made';
                $jsondata['cantidad']= 0;
                echo json_encode($jsondata);

            }
            else{
                $jsondata['success'] = true;
                $jsondata['message'] = 'Request made';
                $jsondata['cantidad']= count($jsondata['data']);
                echo json_encode($jsondata);

            }
        }

    }

    public function getFacturas(Request $request)
    {
        if ($request->isMethod('post')){
            if($request['identificador'] == 'carganofactura'){
                $jsondata=array();
                $jsondata['data'] = Vfactura::distinct()->where('orden',$request['noorden'])->get('nofactura')->all();
            }
            else if($request['identificador'] == 'cargacliente'){
                $jsondata=array();
                $jsondata['data'] = Vfactura::distinct()->where('nofactura',$request['factura'])->get(['cliente','direccion','telefono','estado','fcancelado','obs'])->all();
            }
            else if($request['identificador'] == 'cargacargos'){
                $jsondata=array();
                $jsondata['data'] = Vfactura::where('nofactura',$request['factura'])->get(['tipocargo','pago','moneda','importe','um','ctdad','total','idtipocargo','idpago','idmoneda','idcargo'])->all();
            }
            else{
                $jsondata=array();
                $jsondata['data'] = Vfactura::distinct()->where('nofactura',$request['factura'])->get(['subtotal','iva','valoriva','totalapagar'])->all();
            }

            $jsondata['success'] = true;
            $jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
    }

    public function getFacturaPreview(Request $request){
        if($request->ajax()){
            $jsondata=array();

            $jsondata['data']=Vfacturapreview::where('nofactura',$request->factura)->get();

            $jsondata['success'] = true;
            $jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
    }

    public function facturaPdf(Request $request){

        $datosgenerales = Vfacturapreview::distinct()->where('nofactura',$request->param)->orderBy('fecha','ASC')->get(['fecha','nofactura','cliente','telefono','direccion','moneda','subtotal','iva','valoriva','totalacobrar','estado','fcancelado','motivocancelado','obs']);
        $datosconceptos=Vfacturapreview::where('nofactura',$request->param)->orderBy('fecha','ASC')->get(['concepto','importe','ctdad','um','totalporconcepto']);
        // return view('welcome', compact('datos', 'etiqueta'));
        $pdf = PDF::loadView('Facturas.facturaPrintPdf',compact('datosgenerales','datosconceptos'));
        // dd($etiquetas[0]->codigobarra);
        $path = public_path('/factura');
        $fileName =  $request->param.'.pdf' ;
        $pdf->save($path . '/' . $fileName);
        $pdf = public_path('factura/'.$fileName);

        // $pdf->download($pdf);

        return response()->json([
            'success' => 'false',
            'message'=>'descargado',
            // 'data'=>$cb
        ]);
    }
}
