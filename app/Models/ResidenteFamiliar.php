<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidenteFamiliar extends Model
{
    protected $table = 'residente_familiar';

    protected $fillable = [
        'residente_id',
        'familiar_id',
        'parentesco',
    ];
}
