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
        Schema::create('result_cvs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('archivo');
            $table->foreignId('convocatoria_id')->nullable()->constrained('convocatorias');
            $table->timestamps();
            //$table->foreign('convocatoria_id')->references('id')->on('convocatorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_cvs');
    }
};
