<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcProductoArt
 * 
 * @property int $idproductoart
 * @property int $idproductocap
 * @property string $descripcion
 * @property string $um
 * @property float|null $valor
 * @property int|null $cantidad
 * @property string|null $obs
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property TcProductoCap $tc_producto_cap
 * @property Collection|ArticuloDescrip[] $articulo_descrips
 *
 * @package App\Models
 */
class TcProductoArt extends Model
{
	protected $table = 'tc_producto_art';
	protected $primaryKey = 'idproductoart';

	protected $casts = [
		'idproductocap' => 'int',
		'valor' => 'float',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'idproductocap',
		'descripcion',
		'um',
		'valor',
		'cantidad',
		'obs'
	];

	public function tc_producto_cap()
	{
		return $this->belongsTo(TcProductoCap::class, 'idproductocap');
	}

	public function articulo_descrips()
	{
		return $this->hasMany(ArticuloDescrip::class, 'idproductoart');
	}
}
