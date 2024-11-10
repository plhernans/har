<?php

namespace App\Http\Controllers\Tc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TcTipocargo;
use Illuminate\Support\Facades\DB;
use Exception;

class TipoCargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemcargos = TcTipocargo::Orderby('id_tipocargo','Asc')->get();
        return view('tc._tccargos',compact('itemcargos'));
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
            'cargo'=>'required',
            'finicio'=>'required'
        ]);

        DB::beginTransaction();
            try{
                $producto=TcTipocargo::create([
                    'tipo_cargo'=>strtoupper("".$fields['cargo'].""),
                    'finicio'=>$fields['finicio'],
                    'ffin'=>$request['ffin']
                ]);

                if($producto){
                    DB::commit();
                    return response()->json([
                        'success' => 'true',
                        'message'=>'El Cargo ha sido creado con exito'
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
    public function update(Request $request, $idcargo)
    {
        $fields = request()->validate([

            'cargo'=>'required',
            'finicio'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $producto = TcTipocargo::where('id_tipocargo',$idcargo)->update([

                'tipo_cargo'=>strtoupper("".$fields['cargo'].""),
                'finicio'=>$fields['finicio'],
                'ffin'=>$request['ffin']
            ]);

            if($producto){
                DB::commit();
                return response()->json([
                    'success' => 'true',
                    'message'=>'El Cargo ha sido actualizado con exito'
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
