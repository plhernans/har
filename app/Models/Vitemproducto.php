<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vitemproducto
 * 
 * @property int $idarticulo
 * @property int $idcapitulo
 * @property string|null $capitulo
 * @property string|null $articulo
 * @property string $producto
 * @property string|null $categoria
 * @property string|null $um
 * @property float|null $valor
 * @property Carbon $f_inicio
 * @property Carbon|null $f_ffin
 *
 * @package App\Models
 */
class Vitemproducto extends Model
{
	protected $table = 'vitemproducto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idarticulo' => 'int',
		'idcapitulo' => 'int',
		'valor' => 'float'
	];

	protected $dates = [
		'f_inicio',
		'f_ffin'
	];

	protected $fillable = [
		'idarticulo',
		'idcapitulo',
		'capitulo',
		'articulo',
		'producto',
		'categoria',
		'um',
		'valor',
		'f_inicio',
		'f_ffin'
	];
}
