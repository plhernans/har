<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcViaje
 * 
 * @property int $idviaje
 * @property int $idbuque
 * @property string $viaje
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property TcBuque $tc_buque
 * @property Collection|Embarque[] $embarques
 *
 * @package App\Models
 */
class TcViaje extends Model
{
	protected $table = 'tc_viajes';
	protected $primaryKey = 'idviaje';

	protected $casts = [
		'idbuque' => 'int'
	];

	protected $fillable = [
		'idbuque',
		'viaje'
	];

	public function tc_buque()
	{
		return $this->belongsTo(TcBuque::class, 'idbuque');
	}

	public function embarques()
	{
		return $this->hasMany(Embarque::class, 'idviaje');
	}
}
