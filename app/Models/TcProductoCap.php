<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcProductoCap
 * 
 * @property int $idproductocap
 * @property string $capitulo
 * @property string $descripcion
 * @property string|null $catogoria_capitulo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|ArticuloDescrip[] $articulo_descrips
 * @property Collection|TcProductoArt[] $tc_producto_arts
 *
 * @package App\Models
 */
class TcProductoCap extends Model
{
	protected $table = 'tc_producto_cap';
	protected $primaryKey = 'idproductocap';

	protected $fillable = [
		'capitulo',
		'descripcion',
		'catogoria_capitulo'
	];

	public function articulo_descrips()
	{
		return $this->hasMany(ArticuloDescrip::class, 'idproductocap');
	}

	public function tc_producto_arts()
	{
		return $this->hasMany(TcProductoArt::class, 'idproductocap');
	}
}
