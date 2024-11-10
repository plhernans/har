<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* Class TcGoods
*
* @property int $idgoods
* @property string $description
*
* @property TcGoods $tc_goods
*
*/

class TcGoods extends Model
{
    protected $table = 'tc_goods';
	protected $primaryKey = 'idgoods';
	public $timestamps = true;

	protected $casts = [
		'idgoods' => 'int',
		'description' => 'string'
	];

	protected $guarded = ['idgoods','created_at','updated_at'];

    public function bl_equipment()
	{
		return $this->hasMany(BlEquipment::class, 'idgoods');
	}
}
