<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vproducto
 * 
 * @property string $noorden
 * @property int $noproducto
 * @property string $capitulo
 * @property string $articulo
 * @property string $descripcion
 * @property string $categoria
 * @property string $um
 * @property int $cantidad
 * @property float $mcubico
 * @property float|null $mcubicototal
 * @property float $vaduana
 * @property float $vaduanatotal
 * @property float $pesokg
 * @property float|null $pesototal
 * @property int $idproducto
 * @property float $largo
 * @property float $alto
 * @property float $ancho
 * @property float $pesovolumen
 * @property string|null $ow
 *
 * @package App\Models
 */
class Vproducto extends Model
{
	protected $table = 'vproductos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'noproducto' => 'int',
		'cantidad' => 'int',
		'mcubico' => 'float',
		'mcubicototal' => 'float',
		'vaduana' => 'float',
		'vaduanatotal' => 'float',
		'pesokg' => 'float',
		'pesototal' => 'float',
		'idproducto' => 'int',
		'largo' => 'float',
		'alto' => 'float',
		'ancho' => 'float',
		'pesovolumen' => 'float'
	];

	protected $fillable = [
		'noorden',
		'noproducto',
		'capitulo',
		'articulo',
		'descripcion',
		'categoria',
		'um',
		'cantidad',
		'mcubico',
		'mcubicototal',
		'vaduana',
		'vaduanatotal',
		'pesokg',
		'pesototal',
		'idproducto',
		'largo',
		'alto',
		'ancho',
		'pesovolumen',
		'ow'
	];
}
