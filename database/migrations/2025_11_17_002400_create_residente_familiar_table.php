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
            $table->bigInteger('residente_id')->nullable();
            $table->foreign('residente_id')->references('id')->on('residente');
            $table->string('parentesco', 20)->nullable();
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
        Schema::dropIfExists('residente_familiar');
    }
};
