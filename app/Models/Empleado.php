<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $fillable = [
        'fecha_ingreso',
        'salario',
        'fecha_salida',
        'usuario_id',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function signosVitales()
    {
        return $this->hasMany(SignosVitales::class, 'empleado_id');
    }

    public function resumenAtenciones()
    {
        return $this->hasMany(ResumenAtencion::class, 'empleado_id');
    }
}
