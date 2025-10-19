<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio', 10, 2);
            $table->string('nombre', 100)->nullable();
            $table->date('fecha');
            $table->string('tipo', 100)->nullable();
            $table->string('ruta', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
