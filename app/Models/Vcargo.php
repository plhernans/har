<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vcargo
 * 
 * @property string $no_orden
 * @property string $tipo_cargo
 * @property string $tipo_pago
 * @property string $moneda
 * @property float $importe
 * @property string $um
 * @property float $ctdad
 * @property float $total
 * @property int $idtipocargo
 * @property int $idpago
 * @property int $idmoneda
 * @property int $idcargo
 * @property string $facturado
 * @property float $tipocambio
 * @property Carbon|null $fvencemoneda
 *
 * @package App\Models
 */
class Vcargo extends Model
{
	protected $table = 'vcargos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'importe' => 'float',
		'ctdad' => 'float',
		'total' => 'float',
		'idtipocargo' => 'int',
		'idpago' => 'int',
		'idmoneda' => 'int',
		'idcargo' => 'int',
		'tipocambio' => 'float'
	];

	protected $dates = [
		'fvencemoneda'
	];

	protected $fillable = [
		'no_orden',
		'tipo_cargo',
		'tipo_pago',
		'moneda',
		'importe',
		'um',
		'ctdad',
		'total',
		'idtipocargo',
		'idpago',
		'idmoneda',
		'idcargo',
		'facturado',
		'tipocambio',
		'fvencemoneda'
	];
}
