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
        Schema::create('usuarios_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_entrega');
            $table->time('hora_entrega');
            $table->string('imagen_entrega');
            $table->string('rut_cliente',15);
            $table->string('patente');
            $table->foreign('rut_cliente')->references('rut')->on('usuarios');
            $table->foreign('patente_vehiculo')->references('patente')->on('vehiculos');
            
            
            
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_vehiculos');
    }
};
