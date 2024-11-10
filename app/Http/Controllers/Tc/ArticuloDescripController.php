<?php

namespace App\Http\Controllers\Tc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArticuloDescrip;
use App\Models\TcCapituloproducto;
use App\Models\VcapituloProducto;
use App\Models\Vitemproducto;
use Illuminate\Support\Facades\DB;
use Exception;

class ArticuloDescripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemprod = Vitemproducto::Orderby('idarticulo','Asc')->get();
        return view('tc._itemproducto',compact('itemprod'));
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
            'producto'=>'required',
            'capitulo'=>'required',
            'articulo'=>'required',
            'finicio'=>'required'
        ]);

        DB::beginTransaction();
            try{
                $detalle = TcCapituloproducto::where('idcapituloproducto',$request['idcapitulo'])->get(['categoria','um','valor']);

                $producto=ArticuloDescrip::create([
                    'idcapituloproducto'=>$request['idcapitulo'],
                    'capitulo'=>$fields['capitulo'],
                    'articulo'=>$fields['articulo'],
                    'descripcion'=>strtoupper("".$fields['producto'].""),
                    'categoria' => $detalle[0]['categoria'],
                    'um' => $detalle[0]['um'],
                    'valor' => $detalle[0]['valor'],
                    'f_inicio'=>$fields['finicio'],
                    'f_ffin'=>$request['ffin']
                ]);

                if($producto){
                    DB::commit();
                    return response()->json([
                        'success' => 'true',
                        'message'=>'El Producto ha sido creado con exito'
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
    public function update(Request $request, $idproducto)
    {
        $fields = request()->validate([
            'producto'=>'required',
            'capitulo'=>'required',
            'articulo'=>'required',
            'finicio'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $detalle = TcCapituloproducto::where('idcapituloproducto',$request['idcapitulo'])->get(['categoria','um','valor']);

            $producto = ArticuloDescrip::where('idarticulo',$idproducto)->update([
                'idcapituloproducto'=>$request['idcapitulo'],
                'capitulo'=>$fields['capitulo'],
                'articulo'=>$fields['articulo'],
                'descripcion'=>strtoupper("".$fields['producto'].""),
                'categoria' => $detalle[0]['categoria'],
                'um' => $detalle[0]['um'],
                'valor' => $detalle[0]['valor'],
                'f_inicio'=>$fields['finicio'],
                'f_ffin'=>$request['ffin']
            ]);

            if($producto){
                DB::commit();
                return response()->json([
                    'success' => 'true',
                    'message'=>'El Producto ha sido actualizado con exito'
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

    public function getArticulos(Request $request)
    {
        if($request->ajax()){
            $articulos = VcapituloProducto::where('no',$request->param)->get(['idcapitulo','articulo']);

            foreach($articulos as $articulo){
                $articulosArray[$articulo->idcapitulo]=$articulo->articulo;
            }
            return response()->json($articulosArray);
        }
    }
}
