<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumenAtencion extends Model
{
    protected $table = 'resumen_atencion';

    protected $fillable = [
        'fecha',
        'actividades',
        'notas_enferme',
        'estado_general',
        'empleado_id',
        'residente_id',
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
