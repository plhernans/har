<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VcapituloProducto
 * 
 * @property string $no
 * @property int $idcapitulo
 * @property string $capitulo
 * @property string $articulo
 * @property string|null $categoria
 * @property string $um
 * @property float|null $valor
 * @property string|null $obs
 *
 * @package App\Models
 */
class VcapituloProducto extends Model
{
	protected $table = 'vcapitulo_producto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idcapitulo' => 'int',
		'valor' => 'float'
	];

	protected $fillable = [
		'no',
		'idcapitulo',
		'capitulo',
		'articulo',
		'categoria',
		'um',
		'valor',
		'obs'
	];
}
