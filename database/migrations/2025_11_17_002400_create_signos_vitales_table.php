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
        Schema::create('signos_vitales', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->double('presion_sistolica')->nullable();
            $table->double('presion_diastolica')->nullable();
            $table->double('temperatura')->nullable();
            $table->double('frecuencia_resp')->nullable();
            $table->double('frecuencia_card')->nullable();
            $table->string('reporte_signos')->nullable();

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
        Schema::dropIfExists('signos_vitales');
    }
};
