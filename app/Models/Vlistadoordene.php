<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vlistadoordene
 *
 * @property string $embarque
 * @property string|null $nomfto
 * @property string|null $master
 * @property string $noorden
 * @property Carbon $fechaorden
 * @property string $remitente
 * @property string|null $consignatario
 * @property string|null $nofactura
 * @property float|null $totalfacturado
 * @property string|null $estadofactura
 * @property string $estadoorden
 *
 * @package App\Models
 */
class Vlistadoordene extends Model
{
	protected $table = 'vlistadoordenes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'totalfacturado' => 'float'
	];

	protected $dates = [
		'fechaorden'
	];

	protected $fillable = [
		'embarque',
		'nomfto',
		'master',
		'noorden',
		'fechaorden',
		'remitente',
		'consignatario',
		'nofactura',
		'totalfacturado',
		'estadofactura',
		'estadoorden'
	];

    // public function scopeEmbarques($query,$embarques){
    //     if($embarques == "TODOS"){
    //         return $query->orderBy('fechaorden','Asc');
    //     }
    //     else{
    //         return $query->where('embarque',$embarques);
    //     }
    // }

    public function scopeDoc($query,$nomaster){
        if($nomaster == "SN"){
            return $query->orderBy('fechaorden','Asc');
            
        }
        else{
            return $query->where('master','LIKE',"%$nomaster%");
        }
    }

    public function scopeEstadoF($query,$estadof){
        if($estadof == "TODOS"){
            return $query->orderBy('fechaorden','Asc');
        }
        else{
            return $query->where('estadofactura',$estadof);
        }
    }

    public function scopeEstadoO($query,$estadoo){
        if($estadoo == "TODOS"){
            return $query->orderBy('fechaorden','Asc');
        }
        else{
            return $query->where('estadoorden',$estadoo);
        }
    }
}
