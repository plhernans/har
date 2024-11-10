<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcTipoemb
 * 
 * @property int $idtipoemb
 * @property string $tipoembarque
 * @property string $codigo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class TcTipoemb extends Model
{
	protected $table = 'tc_tipoemb';
	protected $primaryKey = 'idtipoemb';

	protected $fillable = [
		'tipoembarque',
		'codigo'
	];
}
