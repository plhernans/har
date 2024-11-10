<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcProvMcpio
 * 
 * @property int $idprovmcpio
 * @property string $provincia
 * @property string $municipio
 * @property string|null $caracter
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|TcCp[] $tc_cps
 * @property Collection|TcRemDest[] $tc_rem_dests
 *
 * @package App\Models
 */
class TcProvMcpio extends Model
{
	protected $table = 'tc_prov_mcpio';
	protected $primaryKey = 'idprovmcpio';

	protected $fillable = [
		'provincia',
		'municipio',
		'caracter'
	];

	public function tc_cps()
	{
		return $this->hasMany(TcCp::class, 'idmcpio');
	}

	public function tc_rem_dests()
	{
		return $this->hasMany(TcRemDest::class, 'idprovmcpio');
	}
}
