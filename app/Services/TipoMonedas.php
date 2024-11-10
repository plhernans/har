<?php
    namespace App\Services;

    use App\Models\TcMoneda;
    use Carbon\Carbon;

    class TipoMonedas
    {
        public function getTipoMonedas()
        {
            $fechaActual=Carbon::now()->format('Y-m-d');
            $monedas = TcMoneda::whereNull('ffin')->orWhere('ffin','>',$fechaActual)->orderBy('id_moneda','ASC')->get();
            $monedaArray['']='';
            foreach($monedas as $moneda){
                $monedaArray[$moneda->id_moneda]=$moneda->moneda;
            }
            return $monedaArray;
        }
    }
?>
