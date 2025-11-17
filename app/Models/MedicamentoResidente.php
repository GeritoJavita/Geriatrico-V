<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicamentoResidente extends Model
{
    protected $table = 'medicamento_residente';

    protected $fillable = [
        'nombre',
        'dosis',
        'frecuencia',
        'fecha_inicio',
        'fecha_fin',
        'producto_id',
        'residente_id',
    ];

    public function residente()
    {
        return $this->belongsTo(Residente::class, 'residente_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
