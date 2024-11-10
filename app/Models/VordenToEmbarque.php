<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VordenToEmbarque
 * 
 * @property string $no_orden
 * @property string $no_embarque
 * @property string $remitente
 * @property string|null $destinatario
 * @property string|null $codigobarra
 * @property string|null $estado
 * @property string|null $ci
 * @property int $idorden
 * @property string $codigoenvio
 *
 * @package App\Models
 */
class VordenToEmbarque extends Model
{
	protected $table = 'vorden_to_embarque';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idorden' => 'int'
	];

	protected $fillable = [
		'no_orden',
		'no_embarque',
		'remitente',
		'destinatario',
		'codigobarra',
		'estado',
		'ci',
		'idorden',
		'codigoenvio'
	];
}
