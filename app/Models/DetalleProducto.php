<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleProducto extends Model
{
    use HasFactory;

    protected $table = 'detalle_producto';

    protected $fillable = [
        'id_factura',
        'id_producto',
        'subtotal',
    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'id_factura');
    }
    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
