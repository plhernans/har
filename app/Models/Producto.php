<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $idproducto
 * @property int $idorden
 * @property int $idarticulo
 * @property int $noproducto
 * @property string $descripcion
 * @property string|null $um
 * @property int|null $cantidad
 * @property float|null $largo
 * @property float|null $alto
 * @property float|null $ancho
 * @property float|null $mcubico
 * @property float|null $mcubico_total
 * @property float|null $pesovolumen
 * @property float|null $pesovolumen_total
 * @property float|null $vaduana
 * @property float|null $pesokg
 * @property float|null $pesokg_total
 * @property string|null $target
 * @property string|null $ow
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ArticuloDescrip $articulo_descrip
 * @property Ordene $ordene
 * @property Collection|Etiqueta[] $etiquetas
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	protected $primaryKey = 'idproducto';

	protected $casts = [
		'idorden' => 'int',
		'idarticulo' => 'int',
		'noproducto' => 'int',
		'cantidad' => 'int',
		'largo' => 'float',
		'alto' => 'float',
		'ancho' => 'float',
		'mcubico' => 'float',
		'mcubico_total' => 'float',
		'pesovolumen' => 'float',
		'pesovolumen_total' => 'float',
		'vaduana' => 'float',
		'pesokg' => 'float',
		'pesokg_total' => 'float'
	];

	protected $fillable = [
		'idorden',
		'idarticulo',
		'noproducto',
		'descripcion',
		'um',
		'cantidad',
		'largo',
		'alto',
		'ancho',
		'mcubico',
		'mcubico_total',
		'pesovolumen',
		'pesovolumen_total',
		'vaduana',
		'pesokg',
		'pesokg_total',
		'target',
		'ow'
	];

	public function articulo_descrip()
	{
		return $this->belongsTo(ArticuloDescrip::class, 'idarticulo');
	}

	public function ordene()
	{
		return $this->belongsTo(Ordene::class, 'idorden');
	}

	public function etiquetas()
	{
		return $this->hasMany(Etiqueta::class, 'idproducto');
	}
}
