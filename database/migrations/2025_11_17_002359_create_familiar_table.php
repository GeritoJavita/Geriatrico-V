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
        Schema::create('familiar', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('nombre', 80);
            $table->string('apellido', 80);
            $table->string('correo', 80);
            $table->string('telefono', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiar');
    }
};
