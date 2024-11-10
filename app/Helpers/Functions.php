<?php

use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use App\Models\ValoresCont;

if (!function_exists('getNoBooking')) {


        function getNoBooking($origen,$tipoemb){
            printf("Now: %s", Carbon::now());

    }

}

function checkContainers($cont){

    $letraA = ValoresCont::where('letra',substr($cont,0,1))->get('valor')->last();
    $letraB = ValoresCont::where('letra',substr($cont,1,1))->get('valor')->last();
    $letraC = ValoresCont::where('letra',substr($cont,2,1))->get('valor')->last();
    $letraD = ValoresCont::where('letra',substr($cont,3,1))->get('valor')->last();

    $valor1 = substr($cont,4,1);
    $valor2 = substr($cont,5,1);
    $valor3 = substr($cont,6,1);
    $valor4 = substr($cont,7,1);
    $valor5 = substr($cont,8,1);
    $valor6 = substr($cont,9,1);
    $valorVerificador = substr($cont,10,1);


    $resultado1 = $letraA['valor']*(pow(2,0));
    $resultado2 = $letraB['valor']*(pow(2,1));
    $resultado3 = $letraC['valor']*(pow(2,2));
    $resultado4 = $letraD['valor']*(pow(2,3));
    $resultado5 = (int)$valor1*(pow(2,4));
    $resultado6 = (int)$valor2*(pow(2,5));
    $resultado7 = (int)$valor3*(pow(2,6));
    $resultado8 = (int)$valor4*(pow(2,7));
    $resultado9 = (int)$valor5*(pow(2,8));
    $resultado10 = (int)$valor6*(pow(2,9));

    $suma1 = ($resultado1+$resultado2+$resultado3+$resultado4+$resultado5+$resultado6+$resultado7+$resultado8+$resultado9+$resultado10);

    $divi = (intval($suma1/11));
    $suma2 = ($divi*11);
    $resultfinal = ($suma1-$suma2);

    if($resultfinal == (int)$valorVerificador){
        return true;
    }
	else{
        return false;
    }
}

?>
