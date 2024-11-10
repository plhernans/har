<?php

namespace App\Http\Controllers\Tc;

use App\Http\Controllers\Controller;
use App\Models\TcMoneda;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

use function PHPUnit\Framework\isEmpty;

class TcMonedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechaActual=Carbon::now()->format('Y-m-d');
        $monedas = TcMoneda::distinct()->whereNull('ffin')->orWhere('ffin','>',$fechaActual)->orderBy('id_moneda','Asc')->get();
        return view("tc._tcmoneda", compact('monedas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields=request()->validate([
            'moneda' => 'required',
            'tipocambio'=>'required',
            'finicio'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $tcmoneda = TcMoneda::where('moneda',$request['moneda'])->get('id_moneda');

            if(!$tcmoneda->isEmpty()){
                return response()->json([
                    'success' => 'true',
                    'message'=>'Esta moneda ya tiene un registro activo'
                ]);
            }
            else{
                $newtcmoneda = TcMoneda::create([
                    'moneda' => strtoupper($fields['moneda']),
                    'tipocambio'=>$fields['tipocambio'],
                    'finicio' => $fields['finicio']
                ]);

                if($newtcmoneda){
                    DB::commit();
                    return response()->json([
                        'success' => 'true',
                        'message'=>'El registro ha sido creado'
                    ]);
                }
            }
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
        $fields=request()->validate([
            'tipocambio'=>'required',
            'finicio'=>'required',
            'ffin'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $tcmoneda = TcMoneda::where('id_moneda',$id)->update([
                'ffin' => $fields['ffin']
            ]);

            $newtcmoneda = TcMoneda::create([
                'moneda' => $request['moneda'],
                'tipocambio'=>$fields['tipocambio'],
                'finicio' => $fields['ffin']
            ]);

            if($tcmoneda && $newtcmoneda){
                DB::commit();
                return response()->json([
                    'success' => 'true',
                    'message'=>'El registro ha sido modificado'
                ]);
            }

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
    public function destroy($id)
    {
        //
    }

    public function getTipoCambio(Request $request){

        if($request->ajax()){
            $fechaActual=Carbon::now()->format('Y-m-d');
            $moneda = TcMoneda::where('id_moneda',$request->param)->whereNull('ffin')->orWhere('ffin','>',$fechaActual)->get('tipocambio');
            return response()->json($moneda);
        }
    }
}
