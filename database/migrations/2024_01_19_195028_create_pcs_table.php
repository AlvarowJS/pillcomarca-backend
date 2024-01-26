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
        Schema::create('pcs', function (Blueprint $table) {
            $table->id();
            $table->string('procesador');
            $table->string('tipo_procesador');
            $table->string('ram');
            $table->string('almacenamiento');
            $table->string('tipo');
            $table->string('ip');
            $table->string('cod_patrimonial');
            $table->unsignedBigInteger('dependencia_id')->nullable()->constrained('dependencias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcs');
    }
};
