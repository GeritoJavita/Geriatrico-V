<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = 'familiar';

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'correo',
        'telefono',
    ];

    public function residentes()
    {
        return $this->belongsToMany(Residente::class, 'residente_familiar', 'familiar_id', 'residente_id');
    }

    public function quejas()
    {
        return $this->hasMany(QuejaNovedad::class, 'familiar_id');
    }
}
