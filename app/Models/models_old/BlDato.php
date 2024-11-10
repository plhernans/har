<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BlDato
 *
 * @property int $idbldatos
 * @property int $idconsignee
 * @property int $idshipper
 * @property int|null $id_notify
 * @property int|null $id_notifys
 * @property string $bl
 * @property string|null $reference_shipper
 * @property string|null $obs
 * @property date $created_at
 * @property date $updated_at
 *
 * @property TcCustomer $tc_customer
 * @property Collection|BlPort[] $bl_ports
 * @property Collection|BlEquipment[] $bl_equipment
 *
 * @package App\Models
 */
class BlDato extends Model
{
	protected $table = 'bl_datos';
	protected $primaryKey = 'idbldatos';
	public $timestamps = true;

	protected $casts = [
		'idconsignee' => 'int',
		'iddelivery' => 'int',
		'idshipper' => 'int',
		'id_notify' => 'int',
		'id_notifys' => 'int'
	];

    protected $guarded=['idbldatos','created_at','updated_at'];

	public function tc_customer()
	{
		return $this->belongsTo(TcCustomer::class, 'idcustomers');
	}

	public function tc_shipper()
	{
		return $this->belongsTo(TcShipper::class, 'idshipper');
	}

	public function bl_ports()
	{
		return $this->hasMany(BlPort::class, 'idbldatos');
	}

	public function bl_equipment()
	{
		return $this->hasMany(BlEquipment::class, 'idbldatos');
	}

    public function bl_cargoes()
	{
		return $this->hasMany(BlCargoes::class, 'idbldatos');
	}
}
