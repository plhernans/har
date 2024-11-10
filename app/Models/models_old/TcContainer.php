<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcContainer
 *
 * @property int $idcontainer
 * @property string $type
 * @property string $description
 * @property int $teus
 *
 * @property Collection|BlEquipment[] $bl_equipment
 *
 * @package App\Models
 */
class TcContainer extends Model
{
	protected $table = 'tc_containers';
	protected $primaryKey = 'idcontainer';
	public $timestamps = true;

	protected $casts = [
		'teus' => 'int'
	];

	protected $guarded = ['idcontainer','created_at','updated_at'
	];

	public function bl_equipment()
	{
		return $this->hasMany(BlEquipment::class, 'idcontainer');
	}
}
