<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcVoyage
 *
 * @property int $idvoyage
 * @property int $idvessel
 * @property string $voyage
 *
 * @property TcVessel $tc_vessel
 * @property Collection|BlPort[] $bl_ports
 *
 * @package App\Models
 */
class Voyage extends Model
{
	protected $table = 'voyages';
	protected $primaryKey = 'idvoyage';
	public $timestamps = true;

	protected $casts = [
		'idvessel' => 'int'
	];

	protected $guarded = ['idvoyage','created_at','updated_at'];

	public function tc_vessel()
	{
		return $this->belongsTo(TcVessel::class, 'idvessel');
	}

	public function bl_ports()
	{
		return $this->hasMany(BlPort::class, 'idvoyage');
	}

}
