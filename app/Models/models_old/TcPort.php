<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcPort
 *
 * @property int $idport
 * @property string $country
 * @property string $port
 * @property string $code
 *
 * @property Collection|BlPort[] $bl_ports
 *
 * @package App\Models
 */
class TcPort extends Model
{
	protected $table = 'tc_ports';
	protected $primaryKey = 'idport';
	public $timestamps = true;

	protected $guarded = ['idport','created_at','updated_at'];

	public function bl_ports()
	{
		return $this->hasMany(BlPort::class, 'id_por');
	}
}
