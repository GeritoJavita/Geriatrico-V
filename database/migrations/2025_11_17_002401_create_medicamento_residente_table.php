<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicamento_residente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->string('dosis', 45);
            $table->string('frecuencia', 45);
            $table->string('fecha_inicio', 45);
            $table->string('fecha_fin', 45);
            $table->foreignId('producto_id')->nullable()->constrained('producto');
            $table->foreignId('residente_id')->nullable()->constrained('residente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamento_residente');
    }
};
