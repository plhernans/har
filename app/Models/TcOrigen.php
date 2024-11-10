<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcOrigen
 * 
 * @property int $idorigen
 * @property string $origen
 * @property string $codigo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class TcOrigen extends Model
{
	protected $table = 'tc_origen';
	protected $primaryKey = 'idorigen';

	protected $fillable = [
		'origen',
		'codigo'
	];
}
