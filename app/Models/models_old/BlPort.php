<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BlPort
 *
 * @property int $idport
 * @property int $idvoyage
 * @property int $idbldatos
 * @property int $id_pol
 * @property int $id_pod
 * @property int|null $id_pd
 * @property int|null $id_por
 *
 * @property TcPort|null $tc_port
 * @property BlDato $bl_dato
 * @property TcVoyage $tc_voyage
 *
 * @package App\Models
 */
class BlPort extends Model
{
	protected $table = 'bl_ports';
	protected $primaryKey = 'idport';
	public $timestamps = true;

	protected $casts = [
		'idvoyage' => 'int',
		'idbldatos' => 'int',
		'id_pol' => 'int',
		'id_pod' => 'int',
		'id_pd' => 'int',
		'id_por' => 'int'
	];

	protected $guarded = ['idport','created_at','updated_at'];

	public function tc_port()
	{
		return $this->belongsTo(TcPort::class, 'id_por');
	}

	public function bl_dato()
	{
		return $this->belongsTo(BlDato::class, 'idbldatos');
	}

	public function voyages()
	{
		return $this->belongsTo(Voyage::class, 'idvoyage');
	}
}
