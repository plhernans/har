<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vproductosresume
 * 
 * @property string $noorden
 * @property int $noproducto
 * @property float|null $cantidad
 * @property float|null $mcubico
 * @property float|null $vaduana
 * @property float|null $pesokg
 *
 * @package App\Models
 */
class Vproductosresume extends Model
{
	protected $table = 'vproductosresume';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'noproducto' => 'int',
		'cantidad' => 'float',
		'mcubico' => 'float',
		'vaduana' => 'float',
		'pesokg' => 'float'
	];

	protected $fillable = [
		'noorden',
		'noproducto',
		'cantidad',
		'mcubico',
		'vaduana',
		'pesokg'
	];
}
