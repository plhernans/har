<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcCustomer
 *
 * @property int $idcustomers
 * @property string $name
 * @property string $address
 * @property string $zipcode
 * @property string $state
 *
 * @property Collection|BlDato[] $bl_datos
 *
 * @package App\Models
 */
class TcCustomer extends Model
{
	protected $table = 'tc_customers';
	protected $primaryKey = 'idcustomers';
	public $timestamps = true;

	protected $guarded = ['idcustomers','created_at','updated_at'];

	public function bl_datos()
	{
		return $this->hasMany(BlDato::class, 'idconsignee');
        return $this->hasMany(BlDato::class, 'idshipper');
        return $this->hasMany(BlDato::class, 'idnotif');
        return $this->hasMany(BlDato::class, 'idnotifs');
	}
}
