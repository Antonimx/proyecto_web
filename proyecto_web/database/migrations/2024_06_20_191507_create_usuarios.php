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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('rut',15)->primary();
            $table->string('password');
            $table->string('nombre');
            $table->boolean('activo')->default(true);
            $table->unsignedInteger('perfil_id');
            $table->foreign('perfil_id')->references('id')->on('perfiles');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
