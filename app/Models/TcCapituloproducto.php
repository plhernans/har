<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcCapituloproducto
 * 
 * @property int $idcapituloproducto
 * @property string $capitulo
 * @property string $descripcion
 * @property string $articulo
 * @property string|null $categoria
 * @property string $um
 * @property float|null $valor
 * @property string|null $obs
 * 
 * @property Collection|ArticuloDescrip[] $articulo_descrips
 *
 * @package App\Models
 */
class TcCapituloproducto extends Model
{
	protected $table = 'tc_capituloproducto';
	protected $primaryKey = 'idcapituloproducto';
	public $timestamps = false;

	protected $casts = [
		'valor' => 'float'
	];

	protected $fillable = [
		'capitulo',
		'descripcion',
		'articulo',
		'categoria',
		'um',
		'valor',
		'obs'
	];

	public function articulo_descrips()
	{
		return $this->hasMany(ArticuloDescrip::class, 'idcapituloproducto');
	}
}
