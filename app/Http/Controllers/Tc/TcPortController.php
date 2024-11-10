<?php

namespace App\Http\Controllers\Tc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TcPort;
use App\Models\Vairport;
use App\Models\Vport;
use Illuminate\Support\Facades\DB;
use Exception;

class TcPortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tcport = TcPort::orderBy('country','Asc')->simplePaginate();
        return view('tc._tcport',compact('tcport'));
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
        DB::beginTransaction();
        try{
            foreach($request->datos as $dato){

                $country=$dato['country'];
                $port=$dato['port'];
                $code = $dato['code'];

                $tcPort = TcPort::create([
                    'country'  =>   strtoupper($country),
                    'port'     =>   strtoupper($port),
                    'code'      =>   $code
                ]);
            }
            if($tcPort){

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
    public function show(Request $request)
    {
        // dd($request->t_embarque);
        // if($request->t_embarque == 'EXPORTACION MARITIMA'){
        //     $jsondata=array();
        //     dd("holaaa");
        //     $jsondata['data'] = TcPort::where('hub','PORT')->where('code', 'like', '%'.strtoupper($request->valor).'%')
        //                     ->orwhere('port', 'like', '%'.strtoupper($request->valor).'%')
        //                     ->get();
        //     //$result=TcPort::Where('code','like','%'.$param.'%')->get()->all();
        //     $jsondata['success'] = true;
        //     $jsondata['message'] = 'Request made';
        //     echo json_encode($jsondata);
        // }
        // else{
        //     $jsondata=array();

        //     $jsondata['data'] = TcPort::where('hub','AIRPORT')->where('code', 'like', '%'.strtoupper($request->valor).'%')
        //                     ->orwhere('port', 'like', '%'.strtoupper($request->valor).'%')
        //                     ->get();
        //     //$result=TcPort::Where('code','like','%'.$param.'%')->get()->all();
        //     $jsondata['success'] = true;
        //     $jsondata['message'] = 'Request made';
        //     echo json_encode($jsondata);
        // }
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
        //
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

    public function getAir_Port(Request $request){

        if($request->ajax()){

            if($request->t_embarque == 'EXPORTACION MARITIMA'){
                // dd($request->t_embarque);
                $jsondata=array();

                $jsondata['data'] = Vport::where('code', 'like', '%'.strtoupper($request->valor).'%')
                                ->orwhere('port', 'like', '%'.strtoupper($request->valor).'%')
                                ->get();

                $jsondata['success'] = true;
                $jsondata['message'] = 'Request made';
                echo json_encode($jsondata);
            }
            else{
                // dd("aereo".$request->t_embarque);
                $jsondata=array();

                $jsondata['data'] = Vairport::where('code', 'like', '%'.strtoupper($request->valor).'%')
                        ->orwhere('port', 'like', '%'.strtoupper($request->valor).'%')
                        ->get();
                $jsondata['success'] = true;
                $jsondata['message'] = 'Request made';
                echo json_encode($jsondata);
            }
        }
        else{
            echo("There isn't port");
        }
    }
}
