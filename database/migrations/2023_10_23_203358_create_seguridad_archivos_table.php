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
        Schema::create('seguridad_archivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_archivo');
            $table->longText('documento');
            $table->unsignedBigInteger('seguridad_coleccion_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguridad_archivos');
    }
};
