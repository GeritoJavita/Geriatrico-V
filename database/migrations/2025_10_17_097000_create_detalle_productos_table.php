<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_productos', function (Blueprint $table) {
            $table->id();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->foreignId('id_factura')->nullable()->constrained('facturas');
            $table->foreignId('id_producto')->nullable()->constrained('productos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_productos');
    }
};
