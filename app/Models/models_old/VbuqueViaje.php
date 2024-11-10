<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TcVoyage
 *
 * @property int $idviaje
 * @property string $buque
 * @property string $viaje
 *
 * @property VbuqueViaje $vbuqueviaje
 *
 *
 * @package App\Models
 */

class VbuqueViaje extends Model
{
    protected $table = 'vbuqueviaje';
	protected $primaryKey = 'idviaje';

}
