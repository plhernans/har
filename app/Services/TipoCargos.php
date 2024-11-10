<?php
    namespace App\Services;

    use App\Models\TcTipocargo;

    class TipoCargos
    {
        public function getTipoCargos()
        {
            $cargos = TcTipocargo::orderBy('id_tipocargo','ASC')->get();
            $cargoArray['']='';
            foreach($cargos as $cargo){
                $cargoArray[$cargo->id_tipocargo]=$cargo->tipo_cargo;
            }
            return $cargoArray;
        }
    }
?>
