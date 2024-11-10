<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vprefacturacargo
 * 
 * @property int $idorden
 * @property int $tipocargo
 * @property int $tipopago
 * @property int $moneda
 * @property int $tipocobro
 * @property string $target
 * @property float|null $pesokgtotal
 * @property float|null $mcubicototal
 * @property float $precio_u
 * @property float|null $totalacobrar
 * @property string $facturado
 *
 * @package App\Models
 */
class Vprefacturacargo extends Model
{
	protected $table = 'vprefacturacargos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idorden' => 'int',
		'tipocargo' => 'int',
		'tipopago' => 'int',
		'moneda' => 'int',
		'tipocobro' => 'int',
		'pesokgtotal' => 'float',
		'mcubicototal' => 'float',
		'precio_u' => 'float',
		'totalacobrar' => 'float'
	];

	protected $fillable = [
		'idorden',
		'tipocargo',
		'tipopago',
		'moneda',
		'tipocobro',
		'target',
		'pesokgtotal',
		'mcubicototal',
		'precio_u',
		'totalacobrar',
		'facturado'
	];
}
