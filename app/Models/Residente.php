<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Residente extends Model
{
    protected $table = 'residente';

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'telefono',
        'fecha_ingreso',
        'tipo_sangre',
        'genero',
        'telefono_emerg',
        'habitacion',
        'cama',
        'condicion_medica',
        'direccion',
        'altura',
        'eps',
    ];

    // Relaciones

    // Un residente tiene muchas historias clínicas
    public function historiasClinicas()
    {
        return $this->hasMany(HistoriaClinica::class, 'residente_id');
    }

    // Un residente tiene muchos familiares (muchos a muchos)
    public function familiares()
    {
        return $this->belongsToMany(Familiar::class, 'residente_familiar', 'residente_id', 'familiar_id');
    }

    // Un residente puede tener muchas alergias
    public function alergias()
    {
        return $this->belongsToMany(Alergia::class, 'residente_alergia', 'residente_id', 'alergia_id');
    }

    // Un residente puede tener muchas patologías
    public function patologias()
    {
        return $this->belongsToMany(Patologia::class, 'residente_patologia', 'residente_id', 'patologia_id');
    }

    // Signos vitales
    public function signosVitales()
    {
        return $this->hasMany(SignosVitales::class, 'residente_id');
    }

    // Resumen de atención
    public function resumenAtenciones()
    {
        return $this->hasMany(ResumenAtencion::class, 'residente_id');
    }

    // Quejas/Novedades
    public function quejas()
    {
        return $this->hasMany(QuejaNovedad::class, 'residente_id');
    }

    // Medicamentos
    public function medicamentos()
    {
        return $this->hasMany(MedicamentoResidente::class, 'residente_id');
    }
}
