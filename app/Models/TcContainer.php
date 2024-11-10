<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcContainer
 * 
 * @property int $idcontainer
 * @property string $type
 * @property string $description
 * @property int $teus
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Embarque[] $embarques
 *
 * @package App\Models
 */
class TcContainer extends Model
{
	protected $table = 'tc_containers';
	protected $primaryKey = 'idcontainer';

	protected $casts = [
		'teus' => 'int'
	];

	protected $fillable = [
		'type',
		'description',
		'teus'
	];

	public function embarques()
	{
		return $this->hasMany(Embarque::class, 'idcontainer');
	}
}
