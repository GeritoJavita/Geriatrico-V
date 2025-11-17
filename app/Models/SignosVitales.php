<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignosVitales extends Model
{
    protected $table = 'signos_vitales';

    protected $fillable = [
        'fecha',
        'hora',
        'presion_sistolica',
        'presion_diastolica',
        'temperatura',
        'frecuencia_resp',
        'frecuencia_card',
        'reporte_signos',
        'residente_id',
        'empleado_id',
    ];

    public function residente()
    {
        return $this->belongsTo(Residente::class, 'residente_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
