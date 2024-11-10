<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcBuque
 * 
 * @property int $idbuque
 * @property string $buque
 * @property string|null $noimo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Embarque[] $embarques
 * @property Collection|TcViaje[] $tc_viajes
 *
 * @package App\Models
 */
class TcBuque extends Model
{
	protected $table = 'tc_buques';
	protected $primaryKey = 'idbuque';

	protected $fillable = [
		'buque',
		'noimo'
	];

	public function embarques()
	{
		return $this->hasMany(Embarque::class, 'idbuque');
	}

	public function tc_viajes()
	{
		return $this->hasMany(TcViaje::class, 'idbuque');
	}
}
