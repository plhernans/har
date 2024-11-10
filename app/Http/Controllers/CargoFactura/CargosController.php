<?php

namespace App\Http\Controllers\CargoFactura;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Ordene;
use App\Models\TcMoneda;
use App\Models\Vcargo;
use App\Models\Vprefacturacargo;
use App\Services\TipoCargos;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $fields = request()->validate([
            'noorden'=>'required',
            'tipocargo'=>'required',
            'tipopago'=>'required',
            'moneda'=>'required',
            'importe'=>'required',
            'um'=>'required',
            'ctdad'=>'required',
            'total'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $orden = Ordene::where('no_orden',$fields['noorden'])->get('idorden');

            Cargo::create([
                'idorden'=>$orden[0]['idorden'],
                'idtipocargo'=>$fields['tipocargo'],
                'idpago' => $fields['tipopago'],
                'idmoneda' => $fields['moneda'],
                'importe' => $fields['importe'],
                'um' => $fields['um'],
                'ctdad' => $fields['ctdad'],
                'total' => $fields['total'],
                'facturado' => 'N'
            ]);

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
    public function update(Request $request, $id)
    {
        $fields = request()->validate([
            'noorden'=>'required',
            'tipocargo'=>'required',
            'tipopago'=>'required',
            'moneda'=>'required',
            'importe'=>'required',
            'um'=>'required',
            'ctdad'=>'required',
            'total'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $orden = Ordene::where('no_orden',$fields['noorden'])->get('idorden');

            Cargo::where('idcargo',$id)->update([
                'idorden'=>$orden[0]['idorden'],
                'idtipocargo'=>$fields['tipocargo'],
                'idpago' => $fields['tipopago'],
                'idmoneda' => $fields['moneda'],
                'importe' => $fields['importe'],
                'um' => $fields['um'],
                'ctdad' => $fields['ctdad'],
                'total' => $fields['total'],
                'facturado' => 'N'
            ]);

            DB::commit();
            return response()->json([
                'success' => 'true',
                'message'=>'Los datos han sido actualizados'
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
    public function destroy($idcargo)
    {

        DB::beginTransaction();
        try{
            Cargo::where('idcargo',$idcargo)->delete();

            DB::commit();
            return response()->json([
                'success' => 'true',
                'message'=>'El cargo han sido eliminado'
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

    public function getItemCargos(Request $request){

        $jsondata=array();
        $jsondata['data'] = Vcargo::where('no_orden',$request['noblhouse'])->where('facturado','N')->get(['no_orden','tipo_cargo','tipo_pago','moneda','importe','um','ctdad','total','tipocambio','idtipocargo','idpago','idmoneda','idcargo','fvencemoneda'])->all();

        if($jsondata['data'] == null){
            $jsondata['success'] = false;
            $jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
        else{
            $jsondata['success'] = true;
            $jsondata['count'] = count($jsondata['data']);
            $jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
    }

    public function generaCargos(Request $request){

        $fechaActual=Carbon::now()->format('Y-m-d');
        $orden = Ordene::where('no_orden',$request['noorden'])->get('idorden');
        $rs = Vprefacturacargo::where('idorden',$orden[0]['idorden'])->get();
        $moneda = TcMoneda::where('id_moneda',$request['moneda'])->whereNull('ffin')->orWhere('ffin','>',$fechaActual)->get(['moneda','tipocambio']);

        // dd($request['moneda']."++".$moneda[0]['tipocambio']);

        DB::beginTransaction();
        try{
            foreach($rs as $record){
                Cargo::create([
                    'idorden'=>$record->idorden,
                    'idtipocargo'=>$record->tipocargo,
                    'idpago' => $record->tipopago,
                    'idmoneda' => $request['moneda'],
                    'idtipocobro'=>$record->tipocobro,
                    'importe' => $record->precio_u*$moneda[0]['tipocambio'],
                    'um' => $record->target,
                    'ctdad' => $record->pesokgtotal,
                    'total' => $record->totalacobrar*$moneda[0]['tipocambio'],
                    'facturado' => $record->facturado
                ]);
            }

            DB::commit();
            return response()->json([
                'success' => 'true',
                'message'=>'Se han generado los cargos a facturar'
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
}
