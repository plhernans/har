<?php
    namespace App\Services;

    use App\Models\Vbuqueviaje;

    class SVBuqueViaje
    {
        public function getBuques()
        {
            $vessels = Vbuqueviaje::orderBy('buque','ASC')->get();
            $vesselArray['']='';
            foreach($vessels as $vessel){
                $vesselArray[$vessel->idbuque]=$vessel->buque;
            }
            return $vesselArray;
        }
    }
?>
