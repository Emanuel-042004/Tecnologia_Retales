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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('marca');
            $table->enum('tipo_equipo',['Propio','Alquilado'])->nullable();
            $table->string('modelo');
            $table->string('anydesk');
            $table->string('tipo_ram');
            $table->string('cantidad_ram');
            $table->string('tipo_alma');
            $table->string('cantidad_alma');
            $table->string('licencia');
            $table->string('tipo_so');
            $table->string('arquitectura');
            $table->string('modo_bios');
            $table->string('version_procesador');
            $table->string('modelo_procesador');
            $table->string('gen_procesador');
            $table->string('direccionIP');
            $table->string('tarjeta_grafica');
            $table->string('ubicacion');
            $table->string('encargado');
         
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
