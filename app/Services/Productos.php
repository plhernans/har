<?php
    namespace App\Services;

    use App\Models\Vitemproducto;
use Carbon\Carbon;

class Productos
    {
        public function getProductos()
        {
            $productos = Vitemproducto::orderBy('producto','ASC')->get();
            $productosArray['']='';
            foreach($productos as $producto){
                $productosArray[$producto->idarticulo]=$producto->producto;
            }
            return $productosArray;
        }

        public function getProductosCombo()
        {
            $fechaActual=Carbon::now()->format('Y-m-d');
            $productos = Vitemproducto::whereNull('f_ffin')->orWhere('f_ffin','>',$fechaActual)->orderBy('producto','ASC')->get();
            $productosArray['']='';
            foreach($productos as $producto){
                $productosArray[$producto->idarticulo]=$producto->producto;
            }
            return $productosArray;
        }
    }
?>
