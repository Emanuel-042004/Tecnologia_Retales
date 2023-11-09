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
            $table->enum('tipo_dispositivo', ['Portatil', 'Escritorio', 'Todo_en_uno'])->change();
            $table->enum('tipo_alma', ['HDD', 'SSD'])->change();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipos', function (Blueprint $table) {
            $table->string('tipo_dispositivo')->change();
            $table->string('tipo_alma')->change();
        });
        //
    }
};
