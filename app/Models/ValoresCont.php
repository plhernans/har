<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ValoresCont
 * 
 * @property int $idvalor
 * @property string|null $letra
 * @property int|null $valor
 *
 * @package App\Models
 */
class ValoresCont extends Model
{
	protected $table = 'valores_cont';
	protected $primaryKey = 'idvalor';
	public $timestamps = false;

	protected $casts = [
		'valor' => 'int'
	];

	protected $fillable = [
		'letra',
		'valor'
	];
}
