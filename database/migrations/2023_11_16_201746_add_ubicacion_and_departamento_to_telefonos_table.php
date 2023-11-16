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
        Schema::table('telefonos', function (Blueprint $table) {
            $table->string('ubicacion')->nullable();
            $table->string('departamento')->nullable();//
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('telefonos', function (Blueprint $table) {
            $table->dropColumn('ubicacion');
            $table->dropColumn('departamento'); //
        });
    }
};
