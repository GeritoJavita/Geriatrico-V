<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidentePatologia extends Model
{
    protected $table = 'residente_patologia';

    protected $fillable = [
        'patologia_id',
        'residente_id',
    ];

    public function residente()
    {
        return $this->belongsTo(Residente::class, 'residente_id');
    }

    public function patologia()
    {
        return $this->belongsTo(Patologia::class, 'patologia_id');
    }
}
