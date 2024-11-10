<?php
    namespace App\Services;

    use App\Models\TcPort;

    class Paises
    {
        public function getPaises()
        {
            $paises = TcPort::orderBy('port','ASC')->get();
            $paisArray['']='';
            foreach($paises as $pais){
                $paisArray[$pais->port]=$pais->code;
            }
            return $paisArray;
        }
    }
?>
