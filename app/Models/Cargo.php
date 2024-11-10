<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargo
 * 
 * @property int $idcargo
 * @property int $idorden
 * @property int $idtipocargo
 * @property int $idpago
 * @property int $idmoneda
 * @property int|null $idtipocobro
 * @property int|null $idfactura
 * @property float $importe
 * @property string $um
 * @property float $ctdad
 * @property float $total
 * @property string $facturado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property FacturaDato|null $factura_dato
 * @property Ordene $ordene
 * @property TcTipocargo $tc_tipocargo
 * @property TcTipocobro|null $tc_tipocobro
 * @property TcMoneda $tc_moneda
 * @property TcPago $tc_pago
 *
 * @package App\Models
 */
class Cargo extends Model
{
	protected $table = 'cargos';
	protected $primaryKey = 'idcargo';

	protected $casts = [
		'idorden' => 'int',
		'idtipocargo' => 'int',
		'idpago' => 'int',
		'idmoneda' => 'int',
		'idtipocobro' => 'int',
		'idfactura' => 'int',
		'importe' => 'float',
		'ctdad' => 'float',
		'total' => 'float'
	];

	protected $fillable = [
		'idorden',
		'idtipocargo',
		'idpago',
		'idmoneda',
		'idtipocobro',
		'idfactura',
		'importe',
		'um',
		'ctdad',
		'total',
		'facturado'
	];

	public function factura_dato()
	{
		return $this->belongsTo(FacturaDato::class, 'idfactura');
	}

	public function ordene()
	{
		return $this->belongsTo(Ordene::class, 'idorden');
	}

	public function tc_tipocargo()
	{
		return $this->belongsTo(TcTipocargo::class, 'idtipocargo');
	}

	public function tc_tipocobro()
	{
		return $this->belongsTo(TcTipocobro::class, 'idtipocobro');
	}

	public function tc_moneda()
	{
		return $this->belongsTo(TcMoneda::class, 'idmoneda');
	}

	public function tc_pago()
	{
		return $this->belongsTo(TcPago::class, 'idpago');
	}
}
