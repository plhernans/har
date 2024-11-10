<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcVessel
 *
 * @property int $idvessel
 * @property string $name
 * @property string $noimo
 *
 * @property Collection|TcVoyage[] $tc_voyages
 *
 * @package App\Models
 */
class TcVessel extends Model
{
	protected $table = 'tc_vessels';
	protected $primaryKey = 'idvessel';
	public $timestamps = true;

	protected $guarded = ['idvessel','created_at','updated_at'];

	public function voyages()
	{
		return $this->hasMany(Voyage::class, 'idvessel');
	}
}
