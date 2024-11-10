<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcPago
 * 
 * @property int $id_pago
 * @property string $pago
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Cargo[] $cargos
 *
 * @package App\Models
 */
class TcPago extends Model
{
	protected $table = 'tc_pagos';
	protected $primaryKey = 'id_pago';

	protected $fillable = [
		'pago'
	];

	public function cargos()
	{
		return $this->hasMany(Cargo::class, 'idpago');
	}
}
