<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticuloDescrip
 * 
 * @property int $idarticulo
 * @property int $idcapituloproducto
 * @property string $capitulo
 * @property string $articulo
 * @property string $descripcion
 * @property string $categoria
 * @property string $um
 * @property float|null $valor
 * @property Carbon $f_inicio
 * @property Carbon|null $f_ffin
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property TcCapituloproducto $tc_capituloproducto
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class ArticuloDescrip extends Model
{
	protected $table = 'articulo_descrip';
	protected $primaryKey = 'idarticulo';

	protected $casts = [
		'idcapituloproducto' => 'int',
		'valor' => 'float'
	];

	protected $dates = [
		'f_inicio',
		'f_ffin'
	];

	protected $fillable = [
		'idcapituloproducto',
		'capitulo',
		'articulo',
		'descripcion',
		'categoria',
		'um',
		'valor',
		'f_inicio',
		'f_ffin'
	];

	public function tc_capituloproducto()
	{
		return $this->belongsTo(TcCapituloproducto::class, 'idcapituloproducto');
	}

	public function productos()
	{
		return $this->hasMany(Producto::class, 'idarticulo');
	}
}
