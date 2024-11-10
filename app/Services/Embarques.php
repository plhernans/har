<?php
    namespace App\Services;

    use App\Models\Vembarque;

    class Embarques
    {
        public function getEmbarquesT()
        {
            $vembarques = Vembarque::orderBy('fecha_est','Asc')->get();
            $vembarquesArray['']='TODOS';
            foreach($vembarques as $vembarque){
                $vembarquesArray[$vembarque->no_embarque]=$vembarque->no_embarque;
            }
            return $vembarquesArray;
        }

        public function getEmbarques()
        {
            $vembarques = Vembarque::orderBy('fecha_est','Asc')->get();
            $vembarquesArray['']='';
            foreach($vembarques as $vembarque){
                $vembarquesArray[$vembarque->no_embarque]=$vembarque->no_embarque;
            }
            return $vembarquesArray;
        }
    }
?>
