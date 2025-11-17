<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    protected $table = 'historia_clinica';

    protected $fillable = [
        'fecha',
        'antecedentes',
        'diagnostico',
        'tratamientos',
        'residente_id',
    ];

    public function residente()
    {
        return $this->belongsTo(Residente::class, 'residente_id');
    }
}
