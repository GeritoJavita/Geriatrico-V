<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    protected $table = 'alergia';

    protected $fillable = [
        'nombre',
        'fecha_diagnostico',
    ];

    public function residentes()
    {
        return $this->belongsToMany(Residente::class, 'residente_alergia', 'alergia_id', 'residente_id');
    }
}
