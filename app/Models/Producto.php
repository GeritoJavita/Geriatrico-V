<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaProducto;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto'; // nombre de la tabla
    protected $fillable = [
        'nombre',
        'precio',
        'fecha_caducidad',
        'dosis',
        'indicaciones',
        'lote',
        'presentacion',
        'stock',
        'categoria_id',
        'proveedor_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'categoria_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

   
}
