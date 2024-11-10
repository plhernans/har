<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VprefactDato
 * 
 * @property int $idremdest
 * @property string|null $ci
 * @property string|null $nombre
 * @property string $telefono
 * @property string $nacionalidad
 * @property string|null $nopasaporte
 * @property string|null $dir
 *
 * @package App\Models
 */
class VprefactDato extends Model
{
	protected $table = 'vprefact_datos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idremdest' => 'int'
	];

	protected $fillable = [
		'idremdest',
		'ci',
		'nombre',
		'telefono',
		'nacionalidad',
		'nopasaporte',
		'dir'
	];
}
