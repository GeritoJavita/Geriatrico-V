<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100)->nullable();
            $table->string('correo', 100)->unique()->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('clave', 255);
            $table->foreignId('rol_id')->nullable()->constrained('rol');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
