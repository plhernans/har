<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FacturaDato
 * 
 * @property int $idfactura_dato
 * @property int $idorden
 * @property int $idfpago
 * @property string $nofactura
 * @property int $anno
 * @property int $consecutivo
 * @property string $cliente
 * @property string|null $telefono
 * @property string $direccion
 * @property string $estado
 * @property float|null $subtotal
 * @property int|null $iva
 * @property float|null $valoriva
 * @property float|null $total
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $fcancelado
 * @property string|null $motivocancelado
 * @property string|null $obs
 * 
 * @property TcFormapago $tc_formapago
 * @property Ordene $ordene
 * @property Collection|Cargo[] $cargos
 *
 * @package App\Models
 */
class FacturaDato extends Model
{
	protected $table = 'factura_datos';
	protected $primaryKey = 'idfactura_dato';

	protected $casts = [
		'idorden' => 'int',
		'idfpago' => 'int',
		'anno' => 'int',
		'consecutivo' => 'int',
		'subtotal' => 'float',
		'iva' => 'int',
		'valoriva' => 'float',
		'total' => 'float'
	];

	protected $dates = [
		'fcancelado'
	];

	protected $fillable = [
		'idorden',
		'idfpago',
		'nofactura',
		'anno',
		'consecutivo',
		'cliente',
		'telefono',
		'direccion',
		'estado',
		'subtotal',
		'iva',
		'valoriva',
		'total',
		'fcancelado',
		'motivocancelado',
		'obs'
	];

	public function tc_formapago()
	{
		return $this->belongsTo(TcFormapago::class, 'idfpago');
	}

	public function ordene()
	{
		return $this->belongsTo(Ordene::class, 'idorden');
	}

	public function cargos()
	{
		return $this->hasMany(Cargo::class, 'idfactura');
	}
}
