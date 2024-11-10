<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcTipocargo
 * 
 * @property int $id_tipocargo
 * @property string $tipo_cargo
 * @property Carbon|null $finicio
 * @property Carbon|null $ffin
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Cargo[] $cargos
 *
 * @package App\Models
 */
class TcTipocargo extends Model
{
	protected $table = 'tc_tipocargos';
	protected $primaryKey = 'id_tipocargo';

	protected $dates = [
		'finicio',
		'ffin'
	];

	protected $fillable = [
		'tipo_cargo',
		'finicio',
		'ffin'
	];

	public function cargos()
	{
		return $this->hasMany(Cargo::class, 'idtipocargo');
	}
}
