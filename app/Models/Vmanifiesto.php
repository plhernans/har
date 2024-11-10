<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vmanifiesto
 * 
 * @property string $embarque
 * @property string $embarcador
 * @property string $pais
 * @property Carbon|null $fecha_est
 * @property string|null $contenedor
 * @property string|null $noblhouse
 * @property float|null $bultos
 * @property float|null $pesokg
 * @property float|null $m3
 * @property string $remitente
 * @property string|null $destinatario
 * @property string|null $dir
 * @property string $telefono
 * @property string $provincia
 * @property string $municipio
 * @property string|null $ci
 * @property string|null $producto
 * @property string|null $operacion
 * @property string|null $recibocarga
 * @property string|null $entradacliente
 *
 * @package App\Models
 */
class Vmanifiesto extends Model
{
	protected $table = 'vmanifiesto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'bultos' => 'float',
		'pesokg' => 'float',
		'm3' => 'float'
	];

	protected $dates = [
		'fecha_est'
	];

	protected $fillable = [
		'embarque',
		'embarcador',
		'pais',
		'fecha_est',
		'contenedor',
		'noblhouse',
		'bultos',
		'pesokg',
		'm3',
		'remitente',
		'destinatario',
		'dir',
		'telefono',
		'provincia',
		'municipio',
		'ci',
		'producto',
		'operacion',
		'recibocarga',
		'entradacliente'
	];
}
