<?php
    namespace App\Services;

    use App\Models\VcapituloProducto;

    class CapituloArticulo
    {
        public function getCapitulo()
        {
            $cap_prods = VcapituloProducto::distinct()->orderBy('no','ASC')->get(['no','capitulo']);
            $cap_prodsArray['']='';
            foreach($cap_prods as $cap_prod){
                $cap_prodsArray[$cap_prod->no]=$cap_prod->capitulo;
            }
            return $cap_prodsArray;
        }
    }
?>
