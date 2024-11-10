<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vordene
 * 
 * @property string $no_embarque
 * @property string $no_orden
 * @property Carbon $fecha
 * @property string $remitente
 * @property string $nombre
 * @property string|null $apellidop
 * @property string|null $apellidom
 * @property string $estado
 *
 * @package App\Models
 */
class Vordene extends Model
{
	protected $table = 'vordenes';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'no_embarque',
		'no_orden',
		'fecha',
		'remitente',
		'nombre',
		'apellidop',
		'apellidom',
		'estado'
	];
}
