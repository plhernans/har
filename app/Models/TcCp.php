<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcCp
 * 
 * @property int $idcp
 * @property int $idmcpio
 * @property string $cp
 * @property Carbon|null $created_at
 * @property string|null $updated_at
 * 
 * @property TcProvMcpio $tc_prov_mcpio
 * @property Collection|TcRemDest[] $tc_rem_dests
 *
 * @package App\Models
 */
class TcCp extends Model
{
	protected $table = 'tc_cp';
	protected $primaryKey = 'idcp';

	protected $casts = [
		'idmcpio' => 'int'
	];

	protected $fillable = [
		'idmcpio',
		'cp'
	];

	public function tc_prov_mcpio()
	{
		return $this->belongsTo(TcProvMcpio::class, 'idmcpio');
	}

	public function tc_rem_dests()
	{
		return $this->hasMany(TcRemDest::class, 'idcp');
	}
}
