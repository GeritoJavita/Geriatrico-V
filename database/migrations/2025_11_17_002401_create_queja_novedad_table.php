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
        Schema::create('queja_novedad', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 45)->nullable();
            $table->string('descripcion', 45)->nullable();
            $table->date('fecha')->nullable();
            $table->bigInteger('familiar_id')->nullable();
            $table->foreign('familiar_id')->references('id')->on('familiar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queja_novedad');
    }
};
