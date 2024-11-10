<?php

namespace App\Http\Controllers\Etiqueta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Models\Vetiqueta;

class EtiquetaController extends Controller
{
    //
    public function index()
    {
        return view('etiquetas.etiqueta');
    }

    //Obtiene el listado de etiquetas segun filtros de busquedas
    public function getListado(Request $request)
    {
        if ($request->isMethod('post')){
            $fechadesde = $request->input("desde");
            $fechahasta = $request->input("hasta");
            $nobl = $request->input("bl");
            $noembarque = $request->input("noembarque");
            $bulto = $request->input("bulto");
            $estado = $request->input("estado");

            $jsondata=array();
            $jsondata['data'] = Vetiqueta::where('fecha','>=',$fechadesde)->where('fecha','<=',$fechahasta)->NoBl($nobl)->embarque($noembarque)->bulto($bulto)->estado($estado)->get()->all();

            if($jsondata['data'] == null){
                $jsondata['success'] = false;
                $jsondata['message'] = 'Request made';
                echo json_encode($jsondata);

            }
            else{
                $jsondata['success'] = true;
                $jsondata['message'] = 'Request made';
                echo json_encode($jsondata);

            }
        }
    }

    //Genera etiquetas
    public function generatePDF(Request $request)
    {
        $etiquetas=vetiqueta::where('noproducto',$request->param)->orderBy('codigobarra','ASC')->get();
        $pdf = PDF::loadView('etiquetas.etiquetaPdf',compact('etiquetas'));
        // dd($etiquetas[0]->codigobarra);
        $path = public_path('/pdf');
        $fileName =  $etiquetas[0]->codigobarra.'.pdf' ;
        // $pdf->save($path . '/' . $fileName);
        $pdf->save($path . '/' . $fileName);
        $pdf = public_path('pdf/'.$fileName);
        $cb =$etiquetas[0]->codigobarra;

        // $pdf->download($pdf);

        return response()->json([
            'success' => 'false',
            'message'=>'descargado',
            'data'=>$cb
        ]);
    }
}
