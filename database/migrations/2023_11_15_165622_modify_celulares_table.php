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
        Schema::table('celulares', function (Blueprint $table) {
        $table->string('serial')->nullable()->change();
        $table->string('marca')->nullable()->change();
        $table->string('modelo')->nullable()->change();
        $table->string('imei_1')->nullable()->change();
        $table->string('imei_2')->nullable()->change();
        $table->string('sim')->nullable()->change();
        $table->string('ubicacion')->nullable()->change();
        $table->string('departamento')->nullable()->change();
        $table->string('encargado')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('celulares', function (Blueprint $table) {
            //
        });
    }
};
