<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patologia extends Model
{
    protected $table = 'patologia';

    protected $fillable = [
        'nombre',
        'fecha_diagnostico',
    ];

    public function residentes()
    {
        return $this->belongsToMany(Residente::class, 'residente_patologia', 'patologia_id', 'residente_id');
    }
}
