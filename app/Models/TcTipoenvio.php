<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcTipoenvio
 * 
 * @property int $idtenvio
 * @property string $categoria
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Ordene[] $ordenes
 *
 * @package App\Models
 */
class TcTipoenvio extends Model
{
	protected $table = 'tc_tipoenvio';
	protected $primaryKey = 'idtenvio';

	protected $fillable = [
		'categoria'
	];

	public function ordenes()
	{
		return $this->hasMany(Ordene::class, 'idtenvio');
	}
}
