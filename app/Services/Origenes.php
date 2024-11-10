<?php
    namespace App\Services;

    use App\Models\TcOrigen;

    class Origenes
    {
        public function getOrigenes()
        {
            $origenes = TcOrigen::orderBy('idorigen','ASC')->get();
            $origenArray['']='';
            foreach($origenes as $origen){
                $origenArray[$origen->codigo]=$origen->origen;
            }
            return $origenArray;
        }
    }
?>
