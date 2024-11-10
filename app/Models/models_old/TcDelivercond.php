<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcDelivercond
 *
 * @property int $iddelivery
 * @property string $delivery
 *
 * @property Collection|BlEquipment[] $bl_equipment
 *
 * @package App\Models
 */
class TcDelivercond extends Model
{
	protected $table = 'tc_deliverconds';
	protected $primaryKey = 'iddelivery';
	public $timestamps = true;

	protected $guarded = ['iddelivery','created_at','updated_at'];

	public function bl_equipment()
	{
		return $this->hasMany(BlEquipment::class, 'iddelivery');
	}
}
