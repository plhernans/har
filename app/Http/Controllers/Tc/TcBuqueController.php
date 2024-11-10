<?php

namespace App\Http\Controllers\Tc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TcBuque;
use Illuminate\Support\Facades\DB;
use Exception;

class TcBuqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tcbuque=TcBuque::orderBy('idbuque','Asc')->get();
        return view('tc._tcbuque',compact('tcbuque'));
    }

    // public function indexa()
    // {
    //     $tcbuque=TcBuque::orderBy('idbuque','Asc')->get();
    //     return view('reserva.panelBooking',compact('tcbuque'));
    // }

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
            'buque'=>'required'
        ]);
        DB::beginTransaction();
        try{
            $tcbuque=TcBuque::create([
                'buque'=>strtoupper($fields['buque'])
            ]);

            if($tcbuque){

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
            'buque'=>'required'
        ]);

        DB::beginTransaction();
        try{
            if($request['buqueimo'] != ''){
                $tcCont=TcBuque::where('idbuque',$id)->update([
                    'buque' => strtoupper($fields['buque'])
                ]);
            }
            else{
                $tcCont=TcBuque::where('idbuque',$id)->update([
                    'buque' => strtoupper($fields['buque']),
                    'noimo'=> ''
                ]);
            }
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
