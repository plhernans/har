<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlPort;
use App\Models\BlEquipment;
use App\Models\BlDato;
use App\Models\Voyage;
use App\Models\TcContainer;
use App\Models\TcCustomer;
use App\Models\TcGoods;
use App\Models\TcOrigen;
use App\Models\TcPort;
use App\Models\TctipoEmb;
use App\Models\TcVessel;
use App\Models\VBillofLadings;
use App\Models\Vbooking;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Exception;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $vbooking=Vbooking::orderBy('created_at','Asc')->get();
        return view('booking.panelBooking',compact('vbooking'));
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

        global $resultado;


        $fields = request()->validate([
            'bkbuque'=>'required',
            'bkviaje'=>'required',
            'txtorigen'=>'required',
            'txtembarque'=>'required',
            'bkshipper'=>'required',
            'bkconsignee'=>'required',
            'bknotify'=>'required',
            'txtpol'=>'required',
            'txtpod'=>'required',
            'txtpd'=>'required',
            'txtidpol'=>'required',
            'txtidpod'=>'required',
            'txtidpd'=>'required',

        ]);

       // $idBuque = TcVessel::where('name',$fields['bkbuque'])->get('idvessel')->last();
       // $idVoyage = Voyage::where('idvessel',$idBuque['idvessel'])->get(['idvoyage'])->last();

        $idShipper = TcCustomer::where('name',$fields['bkshipper'])->get(['idcustomers'])->last();
        $idConsignee = TcCustomer::where('name',$fields['bkconsignee'])->get(['idcustomers'])->last();
        $idNotify = TcCustomer::where('name',$fields['bknotify'])->get(['idcustomers'])->last();
        $idNotifys = TcCustomer::where('name',$request->input('bknotifys'))->get(['idcustomers'])->last();

        $idPol = TcPort::where('idport',$fields['txtidpol'])->get(['idport'])->last();
        $idPod = TcPort::where('idport',$fields['txtidpod'])->get(['idport'])->last();
        $idPd = TcPort::where('idport',$fields['txtidpd'])->get(['idport'])->last();
        $idPor = TcPort::where('idport',$request->input('txtidpor'))->get(['idport'])->last();

        $year = substr(Carbon::now('Y'),2,2);
        $noseq = BlDato::where('origen',$fields['txtorigen'])->where('tipoembarque',$fields['txtembarque'])->where('anno',$year)->get('noseq')->last();
            //dd($idNotifys['idcustomers']);
        if($noseq == ''){
            $resultado = 1;
        }
        else{
            //dd($noseq['noseq']);
            $valor=$noseq['noseq']+1;
            $resultado = $valor;
            //dd($resultado);
        }


        if($request['bkbuque']!='' && $request['bkviaje']!='' && $idShipper!='' && $idConsignee!='' && $idNotify!='' && $idPol!='' && $idPod!='' && $idPd!=''){

            if($idNotifys==''){
                $idNotifys=null;
            }
            else{
                $idNotifys=$idNotifys['idcustomers'];
            }

            if($idPor==''){
                $idPor=null;
            }
            else{
                $idPor=$idPor['idport'];
            }

            DB::beginTransaction();
            try{

               $consecutivo = str_pad($resultado, 4, '0', STR_PAD_LEFT);
               $bldatos= BlDato::create([
                    'idconsignee'=> $idConsignee['idcustomers'],
                    'idshipper'=> $idShipper['idcustomers'],
                    'id_notify'=> $idNotify['idcustomers'],
                    'id_notifys'=> $idNotifys,
                    'origen' => $fields['txtorigen'],
                    'tipoembarque'=>$fields['txtembarque'],
                    'anno' => $year,
                    'noseq' => $resultado,
                    'nobooking'=> $year.$fields['txtorigen'].'-'.$fields['txtembarque'].$consecutivo
                ]);

                $idBlDatos= BlDato::where('origen',$fields['txtorigen'])->where('tipoembarque',$fields['txtembarque'])->where('noseq',$resultado)->get()->last();

                $blptos= BlPort::create([
                    'idvoyage' => $request['bkviaje'],
                    'idbldatos' => $idBlDatos['idbldatos'],
                    'id_pol' => $idPol['idport'],
                    'id_pod' => $idPod['idport'],
                    'id_pd' => $idPd['idport'],
                    'id_por' => $idPor
                ]);


                foreach($request->datos as $dato){

                    $equipment = $dato['equipment'];
                    $tara=$dato['tara'];
                    $type=$dato['type'];
                    $goods = $dato['goods'];
                    $idgoods = $dato['idgoods'];
                    $gross=$dato['gross'];
                    $seals=$dato['seals'];
                    $movement = $dato['movement'];
                    $idmovement = $dato['idmovement'];

                    $idtypecont=TcContainer::where('type',$type)->get('idcontainer')->last();

                    $blcarga = BlEquipment::create([
                        'idcontainer'=>$idtypecont['idcontainer'],
                        'idbldatos' => $idBlDatos['idbldatos'],
                        'idgoods' =>$idgoods,
                        'iddelivery' => $idmovement,
                        'nocont' => $equipment,
                        'tara' => $tara,
                        'seal' => $seals,
                        'gross' =>$gross,

                    ]);

                }

                if($bldatos && $blptos && $blcarga){

                    DB::commit();
                    return response()->json([
                        'success' => 'true',
                        'message'=>'Your booking have been created, Succesfully'
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
        else{
            Db::rollBack();
            $error = "There is an error. Please, be in touch with your Admin";
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
        //
    }

    public function getBooking(Request $request){
        //dd($request);
        if($request->ajax()){

            $jsondata['data']=array();

            $jsondata['success'] = true;
            $jsondata['message'] = 'Request made';

            foreach($request->param as $dato){
                $data=VBillofLadings::where('nobooking',$dato['nobooking'])->Where('nocont',$dato['nocont'])->get()->last();

                if($data){
                    array_push($jsondata['data'],$data);
                }

            }
            echo json_encode($jsondata);
        }
        else{
            echo("There isn't bookings pendants");
        }
    }

    public function getFromBooking(Request $request)
    {
        if($request->ajax()){

            $jsondata=array();

            $jsondata['data']= Vbooking::where('bl',null)->get();
            $jsondata['success'] = true;
	    	$jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
        else{
            echo("There isn't bookings pendants");
        }
    }

    //newww.....
    public function getContFromBooking(Request $request)
    {
        if($request->ajax()){

            $jsondata=array();

            $jsondata['data']= VBillofLadings::where('nobooking', $request->param)->get();
            $jsondata['success'] = true;
	    	$jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
        }
        else{
            echo("There isn't bookings pendants");
        }
    }

    public function getBookingOld(Request $request)
    {
        if($request->ajax()){

            $jsondata=array();

            $jsondata['data'] = VBillofLadings::where('nobooking',$request->param)->get();
            $jsondata['success'] = true;
	    	$jsondata['message'] = 'Request made';
            echo json_encode($jsondata);
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
