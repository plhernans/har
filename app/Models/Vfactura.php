<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vfactura
 * 
 * @property int $idfactura_dato
 * @property string $orden
 * @property string $nofactura
 * @property string $cliente
 * @property string|null $telefono
 * @property string $direccion
 * @property string $estado
 * @property Carbon|null $fcancelado
 * @property float|null $subtotal
 * @property int|null $iva
 * @property float|null $valoriva
 * @property float|null $totalapagar
 * @property string $um
 * @property string $tipocargo
 * @property string $pago
 * @property string $moneda
 * @property float $importe
 * @property float $ctdad
 * @property float $total
 * @property Carbon $creada
 * @property Carbon $modificada
 * @property int $idcargo
 * @property int $idtipocargo
 * @property int $idpago
 * @property int $idmoneda
 * @property string|null $motivocancelado
 *
 * @package App\Models
 */
class Vfactura extends Model
{
	protected $table = 'vfactura';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idfactura_dato' => 'int',
		'subtotal' => 'float',
		'iva' => 'int',
		'valoriva' => 'float',
		'totalapagar' => 'float',
		'importe' => 'float',
		'ctdad' => 'float',
		'total' => 'float',
		'idcargo' => 'int',
		'idtipocargo' => 'int',
		'idpago' => 'int',
		'idmoneda' => 'int'
	];

	protected $dates = [
		'fcancelado',
		'creada',
		'modificada'
	];

	protected $fillable = [
		'idfactura_dato',
		'orden',
		'nofactura',
		'cliente',
		'telefono',
		'direccion',
		'estado',
		'fcancelado',
		'subtotal',
		'iva',
		'valoriva',
		'totalapagar',
		'um',
		'tipocargo',
		'pago',
		'moneda',
		'importe',
		'ctdad',
		'total',
		'creada',
		'modificada',
		'idcargo',
		'idtipocargo',
		'idpago',
		'idmoneda',
		'motivocancelado'
	];
}
