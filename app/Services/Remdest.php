<?php
    namespace App\Services;

    use App\Models\TcRemDest;

    class Remdest
    {
        public function getRemdest()
        {
            $remdests = TcRemDest::orderBy('idremdest','ASC')->get();
            $remdestArray['']='';
            foreach($remdests as $remdest){

                $remdestArray[$remdest->idremdest]=$remdest->nombre." ".$remdest->apellidop." ".$remdest->apellidom;
            }
            return $remdestArray;
        }
    }
?>
