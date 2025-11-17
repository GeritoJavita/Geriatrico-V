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
        Schema::create('residente_familiar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('residente_id')->nullable()->constrained('residente');
            $table->string('parentesco', 20)->nullable();
            $table->foreignId('familiar_id')->nullable()->constrained('familiar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residente_familiar');
    }
};
