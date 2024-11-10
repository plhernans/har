<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VBillofLading
 *
 * @property string $vessel
 * @property string $voyage
 * @property string $nobooking
 * @property string $shipper
 * @property string $bl
 * @property date $created_at
 *
 * @property VBillofLading $vbilloflading
 *
 *
 * @package App\Models
 */

class VBillofLading extends Model
{
    protected $table = 'vbilloflading';

}
