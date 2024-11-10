<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcPort
 * 
 * @property int $idport
 * @property string $country
 * @property string|null $estado
 * @property string $port
 * @property string $code
 * @property string|null $hub
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Embarque[] $embarques
 *
 * @package App\Models
 */
class TcPort extends Model
{
	protected $table = 'tc_ports';
	protected $primaryKey = 'idport';

	protected $fillable = [
		'country',
		'estado',
		'port',
		'code',
		'hub'
	];

	public function embarques()
	{
		return $this->hasMany(Embarque::class, 'idpol');
	}
}
