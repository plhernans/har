<?php
    namespace App\Services;

    use App\Models\TcTipoemb;

    class TipoEmbarques
    {
        public function getTipoEmbarques()
        {
            $embarques = TcTipoemb::orderBy('idtipoemb','ASC')->get();
            $embarqueArray['']='';
            foreach($embarques as $embarque){
                $embarqueArray[$embarque->codigo]=$embarque->tipoembarque;
            }
            return $embarqueArray;
        }
    }
?>
