<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vprefactura
 * 
 * @property string $remitente
 * @property string $noorden
 * @property float|null $pesokg
 * @property float|null $cantidad
 * @property float|null $mcubico
 * @property float|null $pvolumen
 * @property string $target
 *
 * @package App\Models
 */
class Vprefactura extends Model
{
	protected $table = 'vprefactura';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'pesokg' => 'float',
		'cantidad' => 'float',
		'mcubico' => 'float',
		'pvolumen' => 'float'
	];

	protected $fillable = [
		'remitente',
		'noorden',
		'pesokg',
		'cantidad',
		'mcubico',
		'pvolumen',
		'target'
	];
}
