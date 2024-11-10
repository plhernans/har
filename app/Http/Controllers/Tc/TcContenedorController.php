<?php

namespace App\Http\Controllers\Tc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TcContainer;
use Illuminate\Support\Facades\DB;
use Exception;

class TcContenedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tccont = TcContainer::orderBy('idcontainer','Asc')->get();
        return view("tc._tccontenedor", compact('tccont'));
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
            'type'=>'required',
            'description'=>'required',
            'teus'=>'required'
        ]);

        DB::beginTransaction();
        try{

            $tcCont = TcContainer::create([
                'type'  =>   strtoupper($fields['type']),
                'description'     =>   strtoupper($fields['description']),
                'teus'      =>   $fields['teus']
            ]);

            if($tcCont){

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
            'id'=>'required',
            'type'=>'required',
            'description'=>'required',
            'teus'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $tcCont=TcContainer::where('idcontainer',$id)->update([
                'type' => strtoupper($fields['type']),
                'description'=> strtoupper($fields['description']),
                'teus' => $fields['teus']
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
}
