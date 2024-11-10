<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BlEquipment
 *
 * @property int $idblequipment
 * @property int $idcontainer
 * @property int $idbldatos
 * @property int $iddelivery
 * @property int $idgoods
 * @property string $nocont
 * @property string $tara
 * @property string $seal
 * @property float $gross
 * @property string|null $obs
 *
 * @property BlDato $bl_dato
 * @property TcContainer $tc_container
 * @property TcGoods $tc_goods
 * @property TcDelivercond $tc_delivercond
 *
 * @package App\Models
 */
class BlEquipment extends Model
{
	protected $table = 'bl_equipment';
	protected $primaryKey = 'idblequipment';
	public $timestamps = true;

	protected $casts = [
		'idcontainer' => 'int',
		'idbldatos' => 'int',
		'gross' => 'float'
	];

	protected $guarded = ['idblequipment','created_at','updated_at'];

	public function bl_cargoes()
	{
		return $this->hasMany(BlCargoes::class, 'idblequipment');
	}

    public function bl_dato()
	{
		return $this->belongsTo(BlDato::class, 'idbldatos');
	}

	public function tc_container()
	{
		return $this->belongsTo(TcContainer::class, 'idcontainer');
	}

    public function tc_goods()
	{
		return $this->belongsTo(TcGoods::class, 'idgoods');
	}

    public function tc_delivercond()
	{
		return $this->belongsTo(TcDelivercond::class, 'iddelivery');
	}
}
