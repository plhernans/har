<?php
    namespace App\Services;

    use App\Models\TcTipocobro;
    use Illuminate\Support\Carbon;

    class TipoCobro
    {
        public function getTipoCobro()
        {
            $fechaActual = Carbon::now()->format('Y-m-d');
            $tcobros = TcTipocobro::whereNull('ffin')->orWhere('ffin','>',$fechaActual)->orderBy('tipocobro','ASC')->get();
            // $tcobrosArray['']='';
            foreach($tcobros as $tcobro){
                $tcobrosArray[$tcobro->tipocobro]=$tcobro->importe;
            }
            return $tcobrosArray;
        }
    }
?>
