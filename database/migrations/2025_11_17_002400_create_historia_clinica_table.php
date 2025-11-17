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
        Schema::create('historia_clinica', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('antecedentes', 45)->nullable();
            $table->string('diagnostico', 256)->nullable();
            $table->string('tratamientos', 256)->nullable();

            // Columna FK que coincide con el tipo de residente.id
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
        Schema::dropIfExists('historia_clinica');
    }
};
