<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TctipoEmb
 *
 * @property int $idtipoemb
 * @property string $tipoemb
 *
 * @package App\Models
 */
class TctipoEmb extends Model
{
	protected $table = 'tc_tipo_emb';
	protected $primaryKey = 'idtipoemb';
	public $timestamps = true;

	protected $guarded = ['idtipoemb','created_at','updated_at'];

}
