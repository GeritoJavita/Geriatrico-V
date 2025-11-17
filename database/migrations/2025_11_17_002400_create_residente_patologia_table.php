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
            $table->foreignId('patologia_id')->nullable()->constrained('patologia');
            $table->foreignId('residente_id')->nullable()->constrained('residente');
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
