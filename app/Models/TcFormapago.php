<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcFormapago
 * 
 * @property int $idfpago
 * @property string $formapago
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|FacturaDato[] $factura_datos
 *
 * @package App\Models
 */
class TcFormapago extends Model
{
	protected $table = 'tc_formapagos';
	protected $primaryKey = 'idfpago';

	protected $fillable = [
		'formapago'
	];

	public function factura_datos()
	{
		return $this->hasMany(FacturaDato::class, 'idfpago');
	}
}
