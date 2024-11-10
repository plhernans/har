<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vairport
 * 
 * @property int $idport
 * @property string $country
 * @property string|null $estado
 * @property string $port
 * @property string $code
 * @property string|null $hub
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Vairport extends Model
{
	protected $table = 'vairports';
	public $incrementing = false;

	protected $casts = [
		'idport' => 'int'
	];

	protected $fillable = [
		'idport',
		'country',
		'estado',
		'port',
		'code',
		'hub'
	];
}
