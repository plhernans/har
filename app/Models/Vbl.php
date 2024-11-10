<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vbl
 * 
 * @property string $no_embarque
 * @property string $shipper
 * @property string|null $dirshipper
 * @property string|null $consignee
 * @property string|null $ci
 * @property string $telefono
 * @property string|null $direccion
 * @property string $municipio
 * @property string $provincia
 * @property string|null $buque
 * @property string|null $pol
 * @property string|null $pod
 * @property string $nombre
 * @property string $dir
 * @property string|null $contenedor
 * @property string|null $descripcion
 * @property string|null $cantidadpiezas
 * @property float|null $bulto
 * @property float|null $cantidad
 * @property float|null $gross
 * @property float|null $m3
 * @property string|null $noblhouse
 * @property int $idorden
 * @property string|null $estado
 * @property Carbon $fecha
 * @property string $codigoenvio
 * @property string $naviera
 *
 * @package App\Models
 */
class Vbl extends Model
{
	protected $table = 'vbl';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'bulto' => 'float',
		'cantidad' => 'float',
		'gross' => 'float',
		'm3' => 'float',
		'idorden' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'no_embarque',
		'shipper',
		'dirshipper',
		'consignee',
		'ci',
		'telefono',
		'direccion',
		'municipio',
		'provincia',
		'buque',
		'pol',
		'pod',
		'nombre',
		'dir',
		'contenedor',
		'descripcion',
		'cantidadpiezas',
		'bulto',
		'cantidad',
		'gross',
		'm3',
		'noblhouse',
		'idorden',
		'estado',
		'fecha',
		'codigoenvio',
		'naviera'
	];
}
