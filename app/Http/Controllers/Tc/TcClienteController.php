<?php

namespace App\Http\Controllers\Tc;

use App\Http\Controllers\Controller;
use App\Models\TcCliente;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Exception;

class TcClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tccliente = TcCliente::orderBy('idcliente','Asc')->get();
        return view('tc._tccliente',compact('tccliente'));
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
            'clientename'=>'required',
            'clientedir'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $tccliente=TcCliente::create([
                'nombre'=>strtoupper($fields['clientename']),
                'dir'=>strtoupper($fields['clientedir'])
            ]);

            if($tccliente){

                DB::commit();
                return response()->json([
                    'success' => 'true',
                    'message'=>'Los datos han sido guardado correctamente'
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
            'idcliente'=>'required',
            'clientename'=>'required',
            'clienteaddress'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $tcCliente=TcCliente::where('idcliente',$id)->update([
                'nombre' => strtoupper($fields['clientename']),
                'dir'=> strtoupper($fields['clienteaddress'])
            ]);

            if($tcCliente){
                DB::commit();
                return response()->json([
                    'success' => 'true',
                    'message'=>'Los datos han sido actualizado correctamente'
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
