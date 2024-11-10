<?php

namespace App\Http\Controllers\Producto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArticuloDescrip;
use App\Models\Cargo;
use App\Models\Etiqueta;
use App\Models\Ordene;
use App\Models\Producto;
use App\Models\TcProductoArt;
use App\Models\TcProductoCap;
use App\Models\Vitemproducto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;

class ProductoController extends Controller
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
        $fields = request()->validate([
            'producto'=>'required',
            'articulo'=>'required',
            'categoria'=>'required',
            'um'=>'required',
            'cantidad'=>'required',
            'mcubico'=>'required',
            'largo'=>'required',
            'alto'=>'required',
            'ancho'=>'required',
            'vaduana'=>'required',
            'pesokg'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $year = substr(Carbon::now('Y'),0,10);
            $idorden = Ordene::where('no_orden',$request->noorden)->get('idorden')->last();
            $articulo = ArticuloDescrip::where('descripcion',$fields['producto'])->get(['idarticulo','idproductocap']);
            $capitulo = TcProductoCap::where('idproductocap',$articulo[0]['idproductocap'])->get('categoria_capitulo');

            if($capitulo[0]['categoria_capitulo'] == 'VALOR'){

                global $pesoton, $mcubico, $pvolumen, $pesokgs;

                $em = substr($request->embarque,3,2);
                if( $em == 'EM'){
                    $mcubico=$request->mcubico;
                    $pesoton=$request->pesokg/1000;
                }
                else{
                    $pvolumen=$request->pvolumen;
                    $pesokgs=$fields['pesokg'];
                }

                if($em == 'EM' && $mcubico > $pesoton){

                    $producto = Producto::create([
                        'idorden'  =>   $idorden['idorden'],
                        'idarticulo'     =>   $articulo[0]['idarticulo'],
                        'noproducto'      =>   $request->noproducto,
                        'descripcion' => $fields['producto'],
                        'um'      =>   $fields['um'],
                        'cantidad' => $fields['cantidad'],
                        'mcubico' => $fields['mcubico'],
                        // 'pesovolumen' => $request->pvolumen,
                        'pesovolumen' => $fields['pesokg'],
                        'largo' => $fields['largo'],
                        'alto' => $fields['alto'],
                        'ancho' => $fields['ancho'],
                        'vaduana'      =>   $fields['vaduana'],
                        'pesokg' => $fields['pesokg'],
                        'target' => 'PESO/VOLUMEN M3'
                    ]);
                }
                else{
                    if($em == 'EM' && $mcubico < $pesoton){
                        $producto = Producto::create([
                            'idorden'  =>   $idorden['idorden'],
                            'idarticulo'     =>   $articulo[0]['idarticulo'],
                            'noproducto'      =>   $request->noproducto,
                            'descripcion' => $fields['producto'],
                            'um'      =>   $fields['um'],
                            'cantidad' => $fields['cantidad'],
                            'mcubico' => $fields['mcubico'],
                            // 'pesovolumen' => $request->pvolumen,
                            'pesovolumen' => $fields['pesokg'],
                            'largo' => $fields['largo'],
                            'alto' => $fields['alto'],
                            'ancho' => $fields['ancho'],
                            'vaduana'      =>   $fields['vaduana'],
                            'pesokg' => $fields['pesokg'],
                            'target' => 'PESO/VOLUMEN KG'
                        ]);
                    }
                    else{
                        if($em == 'EA' && $pvolumen > $pesokgs){
                            $producto = Producto::create([
                                'idorden'  =>   $idorden['idorden'],
                                'idarticulo'     =>   $articulo[0]['idarticulo'],
                                'noproducto'      =>   $request->noproducto,
                                'descripcion' => $fields['producto'],
                                'um'      =>   $fields['um'],
                                'cantidad' => $fields['cantidad'],
                                'mcubico' => $fields['mcubico'],
                                'pesovolumen' => $request->pvolumen,
                                'largo' => $fields['largo'],
                                'alto' => $fields['alto'],
                                'ancho' => $fields['ancho'],
                                'vaduana'      =>   $fields['vaduana'],
                                'pesokg' => $fields['pesokg'],
                                'target' => 'PESO/VOLUMEN M3'
                            ]);
                        }
                        else{
                            $producto = Producto::create([
                                'idorden'  =>   $idorden['idorden'],
                                'idarticulo'     =>   $articulo[0]['idarticulo'],
                                'noproducto'      =>   $request->noproducto,
                                'descripcion' => $fields['producto'],
                                'um'      =>   $fields['um'],
                                'cantidad' => $fields['cantidad'],
                                'mcubico' => $fields['mcubico'],
                                'pesovolumen' => $request->pvolumen,
                                'largo' => $fields['largo'],
                                'alto' => $fields['alto'],
                                'ancho' => $fields['ancho'],
                                'vaduana'      =>   $fields['vaduana'],
                                'pesokg' => $fields['pesokg'],
                                'target' => 'PESO/VOLUMEN KG'
                            ]);
                        }
                    }
                }
            }
            else{
                $producto = Producto::create([
                    'idorden'  =>   $idorden['idorden'],
                    'idarticulo'     =>   $articulo[0]['idarticulo'],
                    'noproducto'      =>   $request->noproducto,
                    'descripcion' => $fields['producto'],
                    'um'      =>   $fields['um'],
                    'cantidad' => $fields['cantidad'],
                    'mcubico' => $fields['mcubico'],
                    'pesovolumen' => $request->pvolumen,
                    'largo' => $fields['largo'],
                    'alto' => $fields['alto'],
                    'ancho' => $fields['ancho'],
                    'vaduana'      =>   $fields['vaduana'],
                    'pesokg' => $fields['pesokg'],
                    'target' => $capitulo[0]['categoria_capitulo']
                ]);
            }


            $codorden = substr($request->noorden,0,3);
            $idproducto = Producto::where('idorden',$idorden['idorden'])->get('idproducto')->last();

            if($codorden == 'ENA' || $codorden == 'MNJ'){

                $ordenEtiqueta = Etiqueta::where('idorden',$idorden['idorden'])->get('idorden')->last();
                if($ordenEtiqueta){
                    // $etibulto = Etiqueta::where('idorden',$idorden['idorden'])->count();
                    $etibulto = Etiqueta::where('idorden',$idorden['idorden'])->count();
                    $cantproducto = Producto::where('idorden',$idorden['idorden'])->count();
                    // $cantidadActual=$etibulto+$fields['cantidad'];
                    $cantidadActual=$etibulto+1;
                    // $bulto=$etibulto+1;
                    do {
                        Etiqueta::create([
                            'idorden'  =>   $idorden['idorden'],
                            'idproducto'     =>   $idproducto['idproducto'],
                            'bulto'      =>   $cantidadActual,
                            'cantidad' => $cantproducto,
                            'noproducto' => $request->noproducto
                        ]);
                        $bulto=$cantidadActual+1;

                    } while ($bulto <= $cantproducto);

                    $eticantidad = Etiqueta::where('idorden',$idorden['idorden'])->count();
                    Etiqueta::where('idorden', $idorden['idorden'])->update([
                        'cantidad'  =>   $eticantidad
                    ]);
                }

                else{
                    $bulto=1;
                    $cantproducto = Producto::where('idorden',$idorden['idorden'])->count();
                    do {
                        Etiqueta::create([
                            'idorden'  =>   $idorden['idorden'],
                            'idproducto'     =>   $idproducto['idproducto'],
                            'bulto'      =>   $bulto,
                            'noproducto' => $request->noproducto
                        ]);
                        $bulto=$bulto+1;

                    } while ($bulto <= $cantproducto);

                    $eticantidad = Etiqueta::where('idorden',$idorden['idorden'])->count();
                    Etiqueta::where('idorden', $idorden['idorden'])->update([
                        'cantidad'  =>   $eticantidad
                    ]);
                }
            }

            else{
                //Agregamos productos a etiquetas
                $bulto=1;
                do {
                    $etiqueta = Etiqueta::create([
                        'idorden'  =>   $idorden['idorden'],
                        'idproducto'     =>   $producto['idproducto'],
                        'bulto'      =>   $bulto,
                        'cantidad' => $fields['cantidad']
                    ]);
                    $bulto=$bulto+1;

                } while ($bulto <= $fields['cantidad']);
            }

            DB::commit();
            return response()->json([
                'success' => 'true',
                'message'=>'Los datos han sido guardado correctamente'
            ]);
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
            'articulo'=>'required',
            'categoria'=>'required',
            'um'=>'required',
            'cantidad'=>'required',
            'mcubico'=>'required',
            'largo'=>'required',
            'alto'=>'required',
            'ancho'=>'required',
            'vaduana'=>'required',
            'pesokg'=>'required'
        ]);

        $year = substr(Carbon::now('Y'),0,10);
        $articulo = ArticuloDescrip::whereNull('f_ffin')->where('descripcion',$fields['producto'])->get(['idarticulo','idproductocap']);
        $capitulo = TcProductoCap::where('idproductocap',$articulo[0]['idproductocap'])->get('categoria_capitulo');
        $idorden = Ordene::where('no_orden',$request->noorden)->get('idorden')->last();
        $codorden = substr($request->noorden,0,3);

        DB::beginTransaction();
        try{

            if($codorden == 'ENA' || $codorden == 'MNJ'){

                // $countbefore=Producto::where('idproducto',$idproducto)->get('cantidad');
                // dd($countbefore);
                if($capitulo[0]['categoria_capitulo'] == 'VALOR'){

                    global $pesoton, $mcubico, $pvolumen, $pesokgs;

                    $em = substr($request->embarque,3,2);
                    if( $em == 'EM'){
                        $mcubico=$request->mcubico;
                        $pesoton=$request->pesokg/1000;
                    }
                    else{
                        $pvolumen=$request->pvolumen;
                        $pesokgs=$fields['pesokg'];
                    }
                    if($em == 'EM' && $mcubico > $pesoton){

                        Producto::where('idproducto',$idproducto)->update([
                            'idorden'  =>   $idorden['idorden'],
                            'idarticulo'     =>   $articulo[0]['idarticulo'],
                            'noproducto'      =>   $request->noproducto,
                            'descripcion' => $fields['producto'],
                            'um'      =>   $fields['um'],
                            'cantidad' => $fields['cantidad'],
                            'mcubico' => $fields['mcubico'],
                            'pesovolumen' => $request->pvolumen,
                            'largo' => $fields['largo'],
                            'alto' => $fields['alto'],
                            'ancho' => $fields['ancho'],
                            'vaduana'      =>   $fields['vaduana'],
                            'pesokg' => $fields['pesokg'],
                            'target' => 'PESO/VOLUMEN M3'
                        ]);
                    }
                    else{
                        if($em == 'EM' && $mcubico < $pesoton){
                            Producto::where('idproducto',$idproducto)->update([
                                'idorden'  =>   $idorden['idorden'],
                                'idarticulo'     =>   $articulo[0]['idarticulo'],
                                'noproducto'      =>   $request->noproducto,
                                'descripcion' => $fields['producto'],
                                'um'      =>   $fields['um'],
                                'cantidad' => $fields['cantidad'],
                                'mcubico' => $fields['mcubico'],
                                'pesovolumen' => $request->pvolumen,
                                'largo' => $fields['largo'],
                                'alto' => $fields['alto'],
                                'ancho' => $fields['ancho'],
                                'vaduana'      =>   $fields['vaduana'],
                                'pesokg' => $fields['pesokg'],
                                'target' => 'PESO/VOLUMEN KG'
                            ]);
                        }
                        else{
                            if($em == 'EA' && $pvolumen > $pesokgs){
                                Producto::where('idproducto',$idproducto)->update([
                                    'idorden'  =>   $idorden['idorden'],
                                    'idarticulo'     =>   $articulo[0]['idarticulo'],
                                    'noproducto'      =>   $request->noproducto,
                                    'descripcion' => $fields['producto'],
                                    'um'      =>   $fields['um'],
                                    'cantidad' => $fields['cantidad'],
                                    'mcubico' => $fields['mcubico'],
                                    'pesovolumen' => $request->pvolumen,
                                    'largo' => $fields['largo'],
                                    'alto' => $fields['alto'],
                                    'ancho' => $fields['ancho'],
                                    'vaduana'      =>   $fields['vaduana'],
                                    'pesokg' => $fields['pesokg'],
                                    'target' => 'PESO/VOLUMEN M3'
                                ]);
                            }
                            else{
                                Producto::where('idproducto',$idproducto)->update([
                                    'idorden'  =>   $idorden['idorden'],
                                    'idarticulo'     =>   $articulo[0]['idarticulo'],
                                    'noproducto'      =>   $request->noproducto,
                                    'descripcion' => $fields['producto'],
                                    'um'      =>   $fields['um'],
                                    'cantidad' => $fields['cantidad'],
                                    'mcubico' => $fields['mcubico'],
                                    'pesovolumen' => $request->pvolumen,
                                    'largo' => $fields['largo'],
                                    'alto' => $fields['alto'],
                                    'ancho' => $fields['ancho'],
                                    'vaduana'      =>   $fields['vaduana'],
                                    'pesokg' => $fields['pesokg'],
                                    'target' => 'PESO/VOLUMEN KG'
                                ]);
                            }
                        }
                    }
                }
                else{
                    Producto::where('idproducto',$idproducto)->update([
                        'idorden'  =>   $idorden['idorden'],
                        'idarticulo'     =>   $articulo[0]['idarticulo'],
                        'noproducto'      =>   $request->noproducto,
                        'descripcion' => $fields['producto'],
                        'um'      =>   $fields['um'],
                        'cantidad' => $fields['cantidad'],
                        'mcubico' => $fields['mcubico'],
                        'pesovolumen' => $request->pvolumen,
                        'largo' => $fields['largo'],
                        'alto' => $fields['alto'],
                        'ancho' => $fields['ancho'],
                        'vaduana'      =>   $fields['vaduana'],
                        'pesokg' => $fields['pesokg'],
                        'target' => $capitulo[0]['categoria_capitulo']
                    ]);
                }
                // $countafter=Producto::where('idproducto',$idproducto)->get('cantidad');

                // if($countbefore[0]['cantidad'] < $countafter[0]['cantidad']){
                //     $dif=($countafter[0]['cantidad']-$countbefore[0]['cantidad']);

                //     Etiqueta::where('idproducto',$idproducto)->delete();
                //     //Crea el registro en etiquetas
                //     $bulto=1;
                //     do {
                //         Etiqueta::create([
                //             'idorden'  =>   $idorden['idorden'],
                //             'idproducto'     =>   $idproducto,
                //             'bulto'      =>   $bulto,
                //             'noproducto' => $request->noproducto
                //         ]);
                //         $bulto=$bulto+1;
                //     } while ($bulto <= $countafter[0]['cantidad']);

                //     //Actualiza cantidad
                //     $count=Etiqueta::where('idorden',$idorden['idorden'])->count();
                //     Etiqueta::where('idorden', $idorden['idorden'])->update([
                //         'cantidad'  => $count
                //     ]);
                //     DB::select("CALL obtenerSeqBulto(".$idorden['idorden'].")");
                // }
                // else{
                //     if($countbefore[0]['cantidad'] > $countafter[0]['cantidad']){

                //         $dif=($countbefore[0]['cantidad']-$countafter[0]['cantidad']);

                //         Etiqueta::orderBy('idetiqueta','DESC')->where('idproducto',$idproducto)->limit($dif)->delete();

                //         $count=Etiqueta::where('idorden',$idorden['idorden'])->count();
                //         Etiqueta::where('idorden', $idorden['idorden'])->update([
                //             'cantidad'  => $count
                //         ]);

                //         DB::select("CALL obtenerSeqBulto(".$idorden['idorden'].")");
                //     }
                //     else{

                //     }
                // }
            }
            else{
                $idorden = Ordene::where('no_orden',$request->noorden)->get('idorden')->last();
                Etiqueta::where('idproducto',$idproducto)->delete();

                if($capitulo[0]['categoria_capitulo'] == 'VALOR'){

                    global $pesoton, $mcubico, $pvolumen, $pesokgs;

                    $em = substr($request->embarque,3,2);
                    if( $em == 'EM'){
                        $mcubico=$request->mcubico;
                        $pesoton=$request->pesokg/1000;
                    }
                    else{
                        $pvolumen=$request->pvolumen;
                        $pesokgs=$fields['pesokg'];
                    }
                    if($em == 'EM' && $mcubico > $pesoton){

                        Producto::where('idproducto',$idproducto)->update([
                            'idorden'  =>   $idorden['idorden'],
                            'idarticulo'     =>   $articulo[0]['idarticulo'],
                            'noproducto'      =>   $request->noproducto,
                            'descripcion' => $fields['producto'],
                            'um'      =>   $fields['um'],
                            'cantidad' => $fields['cantidad'],
                            'mcubico' => $fields['mcubico'],
                            'pesovolumen' => $request->pvolumen,
                            'largo' => $fields['largo'],
                            'alto' => $fields['alto'],
                            'ancho' => $fields['ancho'],
                            'vaduana'      =>   $fields['vaduana'],
                            'pesokg' => $fields['pesokg'],
                            'target' => 'PESO/VOLUMEN M3'
                        ]);
                    }
                    else{
                        if($em == 'EM' && $mcubico < $pesoton){
                            Producto::where('idproducto',$idproducto)->update([
                                'idorden'  =>   $idorden['idorden'],
                                'idarticulo'     =>   $articulo[0]['idarticulo'],
                                'noproducto'      =>   $request->noproducto,
                                'descripcion' => $fields['producto'],
                                'um'      =>   $fields['um'],
                                'cantidad' => $fields['cantidad'],
                                'mcubico' => $fields['mcubico'],
                                'pesovolumen' => $request->pvolumen,
                                'largo' => $fields['largo'],
                                'alto' => $fields['alto'],
                                'ancho' => $fields['ancho'],
                                'vaduana'      =>   $fields['vaduana'],
                                'pesokg' => $fields['pesokg'],
                                'target' => 'PESO/VOLUMEN KG'
                            ]);
                        }
                        else{
                            if($em == 'EA' && $pvolumen > $pesokgs){
                                Producto::where('idproducto',$idproducto)->update([
                                    'idorden'  =>   $idorden['idorden'],
                                    'idarticulo'     =>   $articulo[0]['idarticulo'],
                                    'noproducto'      =>   $request->noproducto,
                                    'descripcion' => $fields['producto'],
                                    'um'      =>   $fields['um'],
                                    'cantidad' => $fields['cantidad'],
                                    'mcubico' => $fields['mcubico'],
                                    'pesovolumen' => $request->pvolumen,
                                    'largo' => $fields['largo'],
                                    'alto' => $fields['alto'],
                                    'ancho' => $fields['ancho'],
                                    'vaduana'      =>   $fields['vaduana'],
                                    'pesokg' => $fields['pesokg'],
                                    'target' => 'PESO/VOLUMEN M3'
                                ]);
                            }
                            else{
                                Producto::where('idproducto',$idproducto)->update([
                                    'idorden'  =>   $idorden['idorden'],
                                    'idarticulo'     =>   $articulo[0]['idarticulo'],
                                    'noproducto'      =>   $request->noproducto,
                                    'descripcion' => $fields['producto'],
                                    'um'      =>   $fields['um'],
                                    'cantidad' => $fields['cantidad'],
                                    'mcubico' => $fields['mcubico'],
                                    'pesovolumen' => $request->pvolumen,
                                    'largo' => $fields['largo'],
                                    'alto' => $fields['alto'],
                                    'ancho' => $fields['ancho'],
                                    'vaduana'      =>   $fields['vaduana'],
                                    'pesokg' => $fields['pesokg'],
                                    'target' => 'PESO/VOLUMEN KG'
                                ]);
                            }
                        }
                    }
                }
                else{
                    Producto::where('idproducto',$idproducto)->update([
                        'idorden'  =>   $idorden['idorden'],
                        'idarticulo'     =>   $articulo[0]['idarticulo'],
                        'noproducto'      =>   $request->noproducto,
                        'descripcion' => $fields['producto'],
                        'um'      =>   $fields['um'],
                        'cantidad' => $fields['cantidad'],
                        'mcubico' => $fields['mcubico'],
                        'pesovolumen' => $request->pvolumen,
                        'largo' => $fields['largo'],
                        'alto' => $fields['alto'],
                        'ancho' => $fields['ancho'],
                        'vaduana'      =>   $fields['vaduana'],
                        'pesokg' => $fields['pesokg'],
                        'target' => $capitulo[0]['categoria_capitulo']
                    ]);
                }

                $bulto=1;
                do {
                    Etiqueta::create([
                        'idorden'  =>   $idorden['idorden'],
                        'idproducto'     =>   $idproducto,
                        'bulto'      =>   $bulto,
                        'cantidad' => $fields['cantidad'],
                        'noproducto' => $request->noproducto
                    ]);
                    $bulto=$bulto+1;
                } while ($bulto <= $fields['cantidad']);
            }
            DB::commit();
            return response()->json([
                'success' => 'true',
                'message'=>'Los datos han sido actualizado correctamente'
            ]);
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
    public function destroy(Request $request, $idproducto)
    {
        // dd($request->producto);
        $idorden = Ordene::where('no_orden',$request->noorden)->get('idorden');
        $codorden = substr($request->noorden,0,3);
        $prod = Producto::where('idproducto',$request->producto)->get('target');
        $cargo = Cargo::where('idorden',$idorden[0]['idorden'])->where('facturado','Y')->where('um',$prod[0]['target'])->get('idcargo');

        DB::beginTransaction();
        try{
            if($codorden == 'ENA' || $codorden == 'MNJ'){

                if($cargo->isEmpty()){
                    // cuando no tiene factura
                    $cargodelete = Cargo::where('idorden',$idorden[0]['idorden'])->where('um',$prod[0]['target'])->get('idcargo');
                    if($cargodelete->isEmpty()){
                        //cuando no tiene cargos ni factura
                        Etiqueta::where('idproducto',$request->producto)->delete();
                        $countEtiqueta = Etiqueta::where('idorden',$idorden[0]['idorden'])->count();
                        Etiqueta::where('idorden', $idorden[0]['idorden'])->update([
                            'cantidad'  => $countEtiqueta
                        ]);
                        DB::select("CALL obtenerSeqBulto(".$idorden[0]['idorden'].")");
                        Producto::where('idproducto',$request->producto)->delete();
                    }
                    else{
                        //cuando tiene cargos y no factura
                        Cargo::where('idcargo',$cargodelete[0]['idcargo'])->delete();
                        Etiqueta::where('idproducto',$request->producto)->delete();

                        $countEtiqueta = Etiqueta::where('idorden',$idorden[0]['idorden'])->count();
                        Etiqueta::where('idorden', $idorden[0]['idorden'])->update([
                            'cantidad'  => $countEtiqueta
                        ]);
                        DB::select("CALL obtenerSeqBulto(".$idorden[0]['idorden'].")");
                        Producto::where('idproducto',$request->producto)->delete();
                    }
                    DB::commit();
                    return response()->json([
                        'success' => 'true',
                        'message'=>'El producto ha sido eliminado'
                    ]);
                }
                else{
                    //cuando tiene factura
                    return response()->json([
                        'success' => 'false',
                        'message'=>'No se puede eliminar, hay facturas asociadas a este producto'
                    ]);
                }

            }
            else{
                if($cargo->isEmpty()){
                    $cargodelete = Cargo::where('idorden',$idorden[0]['idorden'])->where('um',$prod[0]['target'])->get('idcargo');

                    if($cargodelete->isEmpty()){
                        // $cargodelete = Cargo::where('idorden',$idorden[0]['idorden'])->where('um',$prod[0]['target'])->get('idcargo');
                        // Cargo::where('idcargo',$cargodelete[0]['idcargo'])->delete();
                        Etiqueta::where('idproducto',$request->producto)->delete();
                        Producto::where('idproducto',$request->producto)->delete();
                    }
                    else{
                        $cargodelete = Cargo::where('idorden',$idorden[0]['idorden'])->where('um',$prod[0]['target'])->get('idcargo');
                        Cargo::where('idcargo',$cargodelete[0]['idcargo'])->delete();
                        Etiqueta::where('idproducto',$request->producto)->delete();
                        Producto::where('idproducto',$request->producto)->delete();
                    }
                    DB::commit();
                    return response()->json([
                        'success' => 'true',
                        'message'=>'El producto han sido eliminado'
                    ]);
                }
                else{
                    return response()->json([
                        'success' => 'false',
                        'message'=>'No se puede eliminar, hay facturas asociadas a este producto'
                    ]);
                }

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

    public function getNoProducto(Request $request)
    {
        global $seq;
        // if($request->ajax()){

            $noproducto = Producto::orderBy('noproducto','Asc')->get('noproducto')->last();

            if($noproducto != ''){
                $seq = $noproducto['noproducto']+1;
            }
            else{
                $seq=1;
            }
            return response()->json($seq);
        // }
    }

    public function getArticulosCap(Request $request){

        $idorden=Ordene::where('no_orden',$request->orden)->get('idorden');
        $descripcion = Producto::where('idorden',$idorden[0]['idorden'])->where('idarticulo',$request->idproducto)->get('idproducto');

        if($descripcion->isEmpty()){
            $jsondata=array();
            $jsondata['data'] = Vitemproducto::where('idarticulo',$request->idproducto)->get();

            $jsondata['success'] = true;
            $jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
        else{
            $jsondata['success'] = false;
            // $jsondata['message'] = 'Request made';
            // echo json_encode($jsondata);
            return response()->json($jsondata);
        }
    }
}
