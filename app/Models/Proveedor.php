<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'correo'
    ];
      public function productos()
    {
        return $this->hasMany(Producto::class, 'proveedor_id'); // 'proveedor_id' es la FK en la tabla productos
    }
}
