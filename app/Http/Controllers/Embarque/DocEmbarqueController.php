<?php

namespace App\Http\Controllers\Embarque;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vmanifiesto;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class DocEmbarqueController extends Controller
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

    public function getManifiesto(Request $request)
    {
        $mfto = Vmanifiesto::where('no_embarque',$request['emb'])->get();
        Storage::disk('public/mfto')->put('mfto.json', $mfto);

        $data = json_encode($mfto);

        $jsongFile = '_file.json';

	    File::put(public_path('/public/mfto'.$jsongFile), $data);
	    return response()->download(public_path('upload'.$jsongFile));

        // return response()->json(
        //     array('success'=>true, 'users' => $mfto)
        // );

    }
}
