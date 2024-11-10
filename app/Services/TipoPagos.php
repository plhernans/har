<?php
    namespace App\Services;

    use App\Models\TcPago;

    class TipoPagos
    {
        public function getTipoPagos()
        {
            $tipopagos = TcPago::orderBy('id_pago','ASC')->get();
            $tipopagoArray['']='';
            foreach($tipopagos as $tipopago){
                $tipopagoArray[$tipopago->id_pago]=$tipopago->pago;
            }
            return $tipopagoArray;
        }
    }
?>
