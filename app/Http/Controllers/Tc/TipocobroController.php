<?php

namespace App\Http\Controllers\Tc;

use app\Http\Controllers\Controller;
use App\Models\TcTipocobro;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;

class TipocobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipocobros=TcTipocobro::orderBy('idtipocobro','Asc')->get();
        return view('tc._tctipocobro',compact('tipocobros'));
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
        $fields=request()->validate([
            'importe'=>'required',
            'finicio'=>'required',
            'ffin'=>'required'
        ]);
        DB::beginTransaction();
        try{
            TcTipocobro::where('idtipocobro',$request['idcobro'])->update([
                'ffin'=>$request['ffin']
            ]);

            $tipocobrobefore=TcTipocobro::where('idtipocobro',$request['idcobro'])->get('ffin');

            if($tipocobrobefore[0]['ffin'] == null){
                return response()->json([
                    'success' => 'false',
                    'message'=>'No se puede crear un nuevo registro.  Existe un registro vigente'
                ]);
            }
            else{
                TcTipocobro::create([
                    'tipocobro'=>$request['tipocobro'],
                    'importe'=>$fields['importe'],
                    'finicio'=>$fields['ffin']
                ]);

                DB::commit();
                    return response()->json([
                        'success' => 'true',
                        'message'=>'Se ha creado el nuevo registro'
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
            'importe'=>'required',
            'finicio'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $tcobro = TcTipocobro::where('idtipocobro',$id)->update([
                'importe' => $fields['importe'],
                'finicio' => $fields['finicio'],
                'ffin' => $request['ffin']
            ]);

            if($tcobro){
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
}
