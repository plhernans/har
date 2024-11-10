<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vlistadofactura
 *
 * @property int $id
 * @property string $no_embarque
 * @property string $no_orden
 * @property string $nofactura
 * @property string $cliente
 * @property string $concepto
 * @property float|null $subtotal
 * @property int|null $iva
 * @property float|null $total
 * @property string $formapago
 * @property string $estado
 * @property Carbon $emitida
 * @property Carbon $modificada
 * @property int $idorden
 * @property int $idfpago
 *
 * @package App\Models
 */
class Vlistadofactura extends Model
{
	protected $table = 'vlistadofacturas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'subtotal' => 'float',
		'iva' => 'int',
		'total' => 'float',
		'idorden' => 'int',
		'idfpago' => 'int'
	];

	protected $dates = [
		'emitida',
		'modificada'
	];

	protected $fillable = [
		'id',
		'embarque',
		'no_orden',
		'nofactura',
		'cliente',
		'concepto',
		'subtotal',
		'iva',
		'total',
		'formapago',
		'estado',
		'emitida',
		'modificada',
		'idorden',
		'idfpago'
	];

    public function scopeNofacturas($query,$nofacturas){
        if($nofacturas !=''){
            return $query->where('nofactura','like',"%$nofacturas%");
        }
    }

    public function scopeEstados($query,$estados){
        if($estados == "TODOS"){
            return $query->orderBy('id','Asc');
        }
        else{
            return $query->where('estado',$estados);
        }
    }

    public function scopeConceptos($query,$conceptos){
        if($conceptos == "TODOS"){
            return $query->orderBy('id','Asc');
        }
        else{
            return $query->where('concepto',$conceptos);
        }
    }

    public function scopeEmbarques($query,$embarques){
        if($embarques == "TODOS"){
            return $query->orderBy('id','Asc');
        }
        else{
            return $query->where('embarque',$embarques);
        }
    }
}
