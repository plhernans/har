<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vfacturapreview
 * 
 * @property Carbon $fecha
 * @property string $nofactura
 * @property string $cliente
 * @property string|null $telefono
 * @property string $direccion
 * @property string $moneda
 * @property float|null $subtotal
 * @property int|null $iva
 * @property float|null $valoriva
 * @property float|null $totalacobrar
 * @property string $concepto
 * @property float $importe
 * @property float $ctdad
 * @property string $um
 * @property float $totalporconcepto
 * @property string $estado
 * @property Carbon|null $fcancelado
 * @property string|null $motivocancelado
 *
 * @package App\Models
 */
class Vfacturapreview extends Model
{
	protected $table = 'vfacturapreview';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'subtotal' => 'float',
		'iva' => 'int',
		'valoriva' => 'float',
		'totalacobrar' => 'float',
		'importe' => 'float',
		'ctdad' => 'float',
		'totalporconcepto' => 'float'
	];

	protected $dates = [
		'fecha',
		'fcancelado'
	];

	protected $fillable = [
		'fecha',
		'nofactura',
		'cliente',
		'telefono',
		'direccion',
		'moneda',
		'subtotal',
		'iva',
		'valoriva',
		'totalacobrar',
		'concepto',
		'importe',
		'ctdad',
		'um',
		'totalporconcepto',
		'estado',
		'fcancelado',
		'motivocancelado'
	];
}
