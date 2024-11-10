<?php
    namespace App\Services;

    use App\Models\TcContainer;

    class TypeCont
    {
        public function getTypeCont()
        {
            $typeconts = TcContainer::orderBy('type','ASC')->get();
            $typecontArray['']='';
            foreach($typeconts as $typecont){
                $typecontArray[$typecont->type]=$typecont->description;
            }
            return $typecontArray;
        }
    }
?>
