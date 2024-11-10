<?php
    namespace App\Services;

    use App\Models\TcDelivercond;

    class Delivery
    {
        public function getDeliveries()
        {
            $deliveries = TcDelivercond::orderBy('iddelivery','ASC')->get();
            $deliveryArray['']='';
            foreach($deliveries as $delivery){
                $deliveryArray[$delivery->iddelivery]=$delivery->delivery;
            }
            return $deliveryArray;
        }
    }
?>
