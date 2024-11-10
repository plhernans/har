<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class BlCargoes
 *
 * @property int $idblcargoes
 * @property int $idblequipment
 * @property int $idbldatos
 * @property int $pkgs
 * @property string $pkgs_type
 * @property string $bl
 * @property string $cbms
 * @property string $goods_descr
 * @property date $created_at
 * @property date $updated_at
 *
 * @property Collection|BlDato[] $bl_datos
 * @property Collection|BlEquipment[] $bl_equipment
 *
 * @package App\Models
 */

class BlCargoes extends Model
{
    use HasFactory;
    protected $table = 'bl_cargoes';
	protected $primaryKey = 'idblcargoes';
	public $timestamps = true;

    protected $guarded=['idblcargoes','created_at','updated_at'];


    public function bl_datos()
	{
		return $this->belongsTo(BlDato::class, 'idbldatos');
	}

    public function bl_equipment()
	{
		return $this->belongsTo(BlEquipment::class, 'idblequipment');
	}

}
