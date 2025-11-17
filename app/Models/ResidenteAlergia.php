<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidenteAlergia extends Model
{
    protected $table = 'residente_alergia';

    protected $fillable = [
        'residente_id',
        'alergia_id',
    ];
}
