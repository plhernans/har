<?php
    namespace App\Services;

    use App\Models\TcGoods;

    class TypeGoods
    {
        public function getTypeGoods()
        {
            $typegoods = TcGoods::orderBy('description','ASC')->get();
            $typegoodArry['']='';
            foreach($typegoods as $typegood){
                $typegoodArray[$typegood->idgoods]=$typegood->description;
            }
            return $typegoodArray;
        }
    }
?>
