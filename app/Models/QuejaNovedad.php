<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuejaNovedad extends Model
{
    protected $table = 'queja_novedad';

    protected $fillable = [
        'tipo',
        'descripcion',
        'fecha',
        'familiar_id',
    ];

    public function familiar()
    {
        return $this->belongsTo(Familiar::class, 'familiar_id');
    }
}
