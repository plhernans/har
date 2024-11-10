<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcTipocobro
 * 
 * @property int $idtipocobro
 * @property string $tipocobro
 * @property float $importe
 * @property Carbon $finicio
 * @property Carbon|null $ffin
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Cargo[] $cargos
 *
 * @package App\Models
 */
class TcTipocobro extends Model
{
	protected $table = 'tc_tipocobro';
	protected $primaryKey = 'idtipocobro';

	protected $casts = [
		'importe' => 'float'
	];

	protected $dates = [
		'finicio',
		'ffin'
	];

	protected $fillable = [
		'tipocobro',
		'importe',
		'finicio',
		'ffin'
	];

	public function cargos()
	{
		return $this->hasMany(Cargo::class, 'idtipocobro');
	}
}
