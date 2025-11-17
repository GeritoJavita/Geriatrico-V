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
        Schema::create('residente', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('nombre', 45);
            $table->string('apellido', 45);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 45);
            $table->date('fecha_ingreso');
            $table->string('tipo_sangre', 45);
            $table->string('genero', 45);
            $table->string('telefono_emerg', 45);
            $table->string('habitacion', 10);
            $table->integer('cama');
            $table->string('condicion_medica', 45);
            $table->string('direccion', 45);
            $table->double('altura');
            $table->string('eps', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residente');
    }
};
