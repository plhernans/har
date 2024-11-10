<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vbuqueviaje
 * 
 * @property int $idbuque
 * @property int $idviaje
 * @property string $buque
 * @property string $viaje
 *
 * @package App\Models
 */
class Vbuqueviaje extends Model
{
	protected $table = 'vbuqueviajes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idbuque' => 'int',
		'idviaje' => 'int'
	];

	protected $fillable = [
		'idbuque',
		'idviaje',
		'buque',
		'viaje'
	];
}
