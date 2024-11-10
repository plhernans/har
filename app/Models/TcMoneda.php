<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcMoneda
 * 
 * @property int $id_moneda
 * @property string $moneda
 * @property float $tipocambio
 * @property Carbon $finicio
 * @property Carbon|null $ffin
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Cargo[] $cargos
 *
 * @package App\Models
 */
class TcMoneda extends Model
{
	protected $table = 'tc_moneda';
	protected $primaryKey = 'id_moneda';

	protected $casts = [
		'tipocambio' => 'float'
	];

	protected $dates = [
		'finicio',
		'ffin'
	];

	protected $fillable = [
		'moneda',
		'tipocambio',
		'finicio',
		'ffin'
	];

	public function cargos()
	{
		return $this->hasMany(Cargo::class, 'idmoneda');
	}
}
