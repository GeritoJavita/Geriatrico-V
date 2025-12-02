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
        Schema::create('resumen_atencion', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->string('actividades', 45)->nullable();
            $table->string('notas_enferme', 45)->nullable();
            $table->string('estado_general', 45)->nullable();
            $table->foreignId('empleado_id')->nullable()->constrained('empleado');
            $table->bigInteger('residente_id')->nullable();
            $table->foreign('residente_id')->references('id')->on('residente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumen_atencion');
    }
};
