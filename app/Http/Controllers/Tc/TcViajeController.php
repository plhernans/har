<?php

namespace App\Http\Controllers\Tc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TcViaje;
use App\Models\Vbuqueviaje;
use Illuminate\Support\Facades\DB;
USE Exception;


class TcViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vbuqueviaje=Vbuqueviaje::orderBy('idviaje','Desc')->get();
        return view('viaje.frameViaje',compact('vbuqueviaje'));
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
            'buque'=>'required',
            'viaje'=>'required'
        ]);
        DB::beginTransaction();
        try{

            $tcviaje=TcViaje::create([
                'idbuque'=>$fields['buque'],
                'viaje'=>strtoupper($fields['viaje'])
            ]);

            if($tcviaje){
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
            'idviaje'=>'required',
            'idbuque'=>'required',
            'viaje'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $tcCont=TcViaje::where('idviaje',$id)->where('idbuque',$fields['idbuque'])->update([
                'viaje' => strtoupper($fields['viaje'])
            ]);

            if($tcCont){
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

    public function getVoyage(Request $request)
    {
        if($request->ajax()){
            $voyages = VbuqueViaje::where('idbuque',$request->param)->get();
            foreach($voyages as $voyage){
                $voyageArray[$voyage->idviaje]=$voyage->viaje;
            }
            return response()->json($voyageArray);
        }
    }
}
