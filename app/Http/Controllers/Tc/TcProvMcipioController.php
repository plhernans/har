<?php

namespace App\Http\Controllers\Tc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TcCp;
use App\Models\TcProvMcpio;
use Exception;

class TcProvMcipioController extends Controller
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
        //
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

    public function getMcipio(Request $request)
    {
        if($request->ajax()){
            $mcipios = TcProvMcpio::where('provincia',$request->param)->get();
            foreach($mcipios as $mcipio){
                $mcipioArray[$mcipio->idprovmcpio]=$mcipio->municipio;
            }
            return response()->json($mcipioArray);
        }
    }

    public function getCP(Request $request)
    {
        if($request->ajax()){
            $idmcpio = TcProvMcpio::where('municipio',$request->param)->get('idprovmcpio');
            $cps= TcCp::where('idmcpio',$idmcpio[0]['idprovmcpio'])->get();
            foreach($cps as $cp){
                $cpsArray[$cp->idcp]=$cp->cp;
            }
            return response()->json($cpsArray);
        }
    }
}
