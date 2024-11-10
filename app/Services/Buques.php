<?php
    namespace App\Services;

    use App\Models\TcBuque;

    class Buques
    {
        public function getBuques()
        {
            $buques = TcBuque::orderBy('buque','ASC')->get();
            $buqueArray['']='';
            foreach($buques as $buque){
                $buqueArray[$buque->idbuque]=$buque->buque;
            }
            return $buqueArray;
        }
    }
?>
