<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VBillofLadings
 *
 * @property string $vessel
 * @property string $voyage
 * @property string $nobooking
 * @property string $shipper
 * @property string $consignee
 * @property string $notify
 * @property string $notifys
 * @property string $bl
 * @property string $reference_shipper
 *
 * @property string $pol
 * @property string $pod
 * @property string $pd
 * @property string $por
 * @property string $nocont
 * @property string $type
 * @property string $teus
 * @property int $tara
 *
 * @property string $seal
 * @property string $delivery
 * @property string $typeofgoods
 * @property numeric $gross
 * @property string $obs
 * @property date $created_at
 *
 * @property VBillofLadings $vbillofladings
 *
 *
 * @package App\Models
 */

class VBillofLadings extends Model
{
    protected $table = 'vbillofladings';

}
