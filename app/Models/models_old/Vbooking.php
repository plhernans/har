<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vbooking
 *
 * @property string $vessel
 * @property string $voyage
 * @property string $nobooking
 * @property string $shipper
 * @property string $bl
 * @property date $created_at
 *
 * @property Vbooking $vbooking
 *
 *
 * @package App\Models
 */

class Vbooking extends Model
{
    protected $table = 'vbooking';

}
