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
            $table->foreignId('residente_id')->nullable()->constrained('residente');
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
