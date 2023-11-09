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
            Schema::create('historial', function (Blueprint $table) {
                $table->id();
                $table->date('fecha');
                $table->string('descripcion');
                $table->string('serial'); // Campo de clave externa
                $table->timestamps();
            });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial');
    }
};
