<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcOrigen
 *
 * @property int $idorigen
 * @property string $origen
 *
 * @package App\Models
 */
class TcOrigen extends Model
{
	protected $table = 'tc_origen_emb';
	protected $primaryKey = 'idorigen';
	public $timestamps = true;

	protected $guarded = ['idorigen','created_at','updated_at'];

}
