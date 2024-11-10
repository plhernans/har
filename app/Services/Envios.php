<?php
    namespace App\Services;

    use App\Models\TcTipoenvio;

    class Envios
    {
        public function getEnvios()
        {
            $envios = TcTipoenvio::orderBy('categoria','ASC')->get();
            $envioArray['']='';
            foreach($envios as $envio){
                $envioArray[$envio->idtenvio]=$envio->categoria;
            }
            return $envioArray;
        }
    }
?>
