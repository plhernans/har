<?php
    namespace App\Services;

    use App\Models\TcNaviera;

    class Navieras
    {
        public function getNavieras()
        {
            $navieras = TcNaviera::orderBy('naviera','ASC')->get();
            $navieraArray['']='';
            foreach($navieras as $naviera){
                $navieraArray[$naviera->idnaviera]=$naviera->naviera;
            }
            return $navieraArray;
        }
    }
?>
