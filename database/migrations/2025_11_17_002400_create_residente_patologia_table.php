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
        Schema::create('residente_patologia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('residente_id')->nullable(); // coincide con residente.id manual
            $table->foreign('residente_id')->references('id')->on('residente');
            $table->foreignId('patologia_id')->nullable()->constrained('patologia'); // autoincremental
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residente_patologia');
    }
};
