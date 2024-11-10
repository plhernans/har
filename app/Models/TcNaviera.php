<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcNaviera
 * 
 * @property int $idnaviera
 * @property string $naviera
 * 
 * @property Collection|Embarque[] $embarques
 *
 * @package App\Models
 */
class TcNaviera extends Model
{
	protected $table = 'tc_naviera';
	protected $primaryKey = 'idnaviera';
	public $timestamps = false;

	protected $fillable = [
		'naviera'
	];

	public function embarques()
	{
		return $this->hasMany(Embarque::class, 'idnaviera');
	}
}
