<?php

namespace App\Http\Controllers\Etiqueta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Models\Ordene;
use App\Models\Producto;
use App\Models\Vetiqueta;
use App\Models\Vetiquetasmerge;
use App\Models\Vetiquetasresumen;

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
            $codigoenvio = $request->input("codigoenvio");
            $estado = $request->input("estado");

            $jsondata=array();
            $jsondata['data'] = Vetiqueta::where('fecha','>=',$fechadesde)->where('fecha','<=',$fechahasta)->NoBl($nobl)->Embarque($noembarque)->TipoEnvio($codigoenvio)->estado($estado)->get()->all();

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
        $customPaper = array(0,0,305.00,489.00);
        // $arrGuiaAerea=array();

        /*$ordenP = Producto::where('noproducto',$request->param)->get('idorden');
        $orden = Ordene::where('idorden',$ordenP[0]['idorden'])->get('no_orden');

        $etiquetasResumen=Vetiquetasresumen::where('no_orden',$orden[0]['no_orden'])->orderBy('codigobarra','ASC')->get();
        $etiquetas=vetiqueta::where('noproducto',$request->param)->orderBy('codigobarra','ASC')->get();*/

        $etiquetas = Vetiquetasmerge::where('noproducto',$request->param)->orderBy('codigobarra','ASC')->get();

        // foreach($etiquetas as $etires){
        //     array_push($arrGuiaAerea,"".$etires->codigoqr."");
        // }

        if(substr($etiquetas[0]['no_embarque'],3,2) == 'EA'){
            $pdf = PDF::loadView('etiquetas.etiquetaPdf',compact('etiquetas'))->setPaper($customPaper);
        }
        else{
            $pdf = PDF::loadView('etiquetas.etiquetaPdfM',compact('etiquetas'))->setPaper($customPaper);
        }

        $path = public_path('/pdf');
        $fileName = $etiquetas[0]->codigobarra.'.pdf' ;

        $pdf->save($path . '/' . $fileName);

        $pdf = public_path('pdf/'.$fileName);

        return response()->json([
            'success' => 'false',
            'message'=>'descargado',
            'data'=>$etiquetas[0]->codigobarra
        ]);
    }

    public function generatePDFResumen(Request $request)
    {
        $customPaper = array(0,0,305.00,489.00);
        $arrGuiaAerea=array();

        $etiquetas=Vetiquetasresumen::where('no_orden',$request->param)->orderBy('codigobarra','ASC')->get();
        $etiqueta_child=Vetiqueta::where('no_orden',$request->param)->where('no_orden','like','ENV%')->orderBy('codigobarra','ASC')->get(['qr','codigobarra','noblhouse']);
        $kgsitem = Vetiqueta::where('no_orden',$request->param)->sum('pesokg');

        foreach($etiquetas as $etires){
            array_push($arrGuiaAerea,"".$etires->qrresumen."/");
        }

        foreach($etiqueta_child as $eti){
            array_push($arrGuiaAerea,"".$eti->qr."");
        }

        if(substr($etiquetas[0]['no_embarque'],3,2) == 'EA'){
            $pdf = PDF::loadView('etiquetas.etiquetaResume',compact(['etiquetas','etiqueta_child','kgsitem','arrGuiaAerea']))->setPaper($customPaper);
        }
        else{
            $pdf = PDF::loadView('etiquetas.etiquetaResumeM',compact(['etiquetas','etiqueta_child','kgsitem','arrGuiaAerea']))->setPaper($customPaper);
        }

        $path = public_path('/pdf');
        $fileName =  $etiquetas[0]->codigobarra.'.pdf' ;
        $pdf->save($path . '/' . $fileName);
        $pdf = public_path('pdf/'.$fileName);
        // $cb =$etires->qrresumen;

        return response()->json([
            'success' => 'false',
            'message'=>'descargado',
            'data'=>$etiquetas[0]->codigobarra
        ]);
    }
}
