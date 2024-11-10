<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etiqueta
 * 
 * @property int $idetiqueta
 * @property int $idorden
 * @property int $idproducto
 * @property int $bulto
 * @property int|null $cantidad
 * @property int|null $noproducto
 * @property string|null $estado
 * @property string|null $noblhouse
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Ordene $ordene
 * @property Producto $producto
 *
 * @package App\Models
 */
class Etiqueta extends Model
{
	protected $table = 'etiquetas';
	protected $primaryKey = 'idetiqueta';

	protected $casts = [
		'idorden' => 'int',
		'idproducto' => 'int',
		'bulto' => 'int',
		'cantidad' => 'int',
		'noproducto' => 'int'
	];

	protected $fillable = [
		'idorden',
		'idproducto',
		'bulto',
		'cantidad',
		'noproducto',
		'estado',
		'noblhouse'
	];

	public function ordene()
	{
		return $this->belongsTo(Ordene::class, 'idorden');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'idproducto');
	}
}
