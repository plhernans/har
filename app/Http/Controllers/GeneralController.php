<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vproducto;
use App\Models\Vproductoresume;

class GeneralController extends Controller
{
    public function getListadoProducto(Request $request){

        if($request->ajax()){

            $jsondata=array();
            $jsondata['data'] = Vproductoresume::where('noorden',$request->param)->get()->all();

            $jsondata['success'] = true;
            $jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
    }

    public function getProductoDetalle(Request $request){

        if($request->ajax()){

            $jsondata=array();
            $jsondata['data'] = Vproducto::where('noproducto',$request->param)->get()->all();

            $jsondata['success'] = true;
            $jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
    }

    public function generaMfto(){
        dd("para generar mfto");
    }

}
