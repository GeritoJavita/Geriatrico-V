<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->decimal('precio', 10, 2);
            $table->date('fecha_caducidad')->nullable();
            $table->string('dosis', 100)->nullable();
            $table->string('indicaciones', 100)->nullable();
            $table->string('lote', 100)->nullable();
            $table->string('presentacion', 100)->nullable();
            $table->foreignId('categoria_id')->nullable()->constrained('categoria_producto');
            $table->foreignId('proveedor_id')->nullable()->constrained('proveedor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
