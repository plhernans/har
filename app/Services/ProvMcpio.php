<?php
    namespace App\Services;

    use App\Models\TcProvMcpio;

    class ProvMcpio
    {
        public function getProvMcpios()
        {
            $provmcpios = TcProvMcpio::orderBy('provincia','ASC')->get()->all();
            $provmcpiosArray['']='';
            foreach($provmcpios as $provmcpio){
                $provmcpiosArray[$provmcpio->provincia]=$provmcpio->municipio;
            }
            return $provmcpiosArray;
        }
    }
?>
