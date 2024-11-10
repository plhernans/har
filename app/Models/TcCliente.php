<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcCliente
 * 
 * @property int $idcliente
 * @property string $nombre
 * @property string $dir
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Embarque[] $embarques
 *
 * @package App\Models
 */
class TcCliente extends Model
{
	protected $table = 'tc_clientes';
	protected $primaryKey = 'idcliente';

	protected $fillable = [
		'nombre',
		'dir'
	];

	public function embarques()
	{
		return $this->hasMany(Embarque::class, 'idembarcador');
	}
}
