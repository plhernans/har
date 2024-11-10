<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vetiquetasresumen
 *
 * @property string $no_orden
 * @property string $no_embarque
 * @property string $remitente
 * @property string|null $destinatario
 * @property string|null $ci
 * @property string $telefono
 * @property string|null $direccion
 * @property string $provincia
 * @property string $municipio
 * @property string|null $codigobarra
 * @property string|null $mawb
 * @property int $canthouse
 * @property float|null $pesokg
 * @property string|null $qrresumen
 * @property string $estado
 *
 * @package App\Models
 */
class Vetiquetasresumen extends Model
{
	protected $table = 'vetiquetasresumen';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'canthouse' => 'int',
		'pesokg' => 'float'
	];

	protected $fillable = [
		'no_orden',
		'no_embarque',
		'remitente',
		'destinatario',
		'ci',
		'telefono',
		'direccion',
		'provincia',
		'municipio',
		'codigobarra',
		'mawb',
		'canthouse',
		'pesokg',
		'qrresumen',
		'estado'
	];
}
