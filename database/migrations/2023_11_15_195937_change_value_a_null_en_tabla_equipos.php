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
        Schema::table('equipos', function (Blueprint $table) {
           
            $table->string('serial')->nullable()->change();
            $table->string('marca')->nullable()->change();
            $table->enum('tipo_equipo', ['Propio', 'Alquilado'])->nullable()->change();
            $table->string('modelo')->nullable()->change();
            $table->string('anydesk')->nullable()->change();
            $table->string('tipo_ram')->nullable()->change();
            $table->string('cantidad_ram')->nullable()->change();
            $table->enum('tipo_alma', ['HDD', 'SSD'])->nullable()->change();
            $table->string('cantidad_alma')->nullable()->change();
            $table->string('licencia')->nullable()->change();
            $table->string('tipo_so')->nullable()->change();
            $table->enum('modo_bios', ['UEFI', 'LEGACY'])->nullable()->change();
            $table->string('version_procesador')->nullable()->change();
            $table->string('modelo_procesador')->nullable()->change();
            $table->string('gen_procesador')->nullable()->change();
            $table->string('direccionIP')->nullable()->change();
            $table->string('tarjeta_grafica')->nullable()->change();
            $table->string('ubicacion')->nullable()->change();
            $table->string('encargado')->nullable()->change();
            $table->enum('tipo_dispositivo', ['Portatil', 'Escritorio', 'Todo_en_uno'])->nullable()->change();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
