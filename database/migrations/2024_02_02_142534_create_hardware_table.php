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
        Schema::create('hardware', function (Blueprint $table) {
            $table->id();
            $table->string('procesador')->nullable();
            $table->string('ram')->nullable();
            $table->string('almacenamiento')->nullable();
            $table->string('tipo_alma')->nullable();
            $table->string('ip')->nullable();
            $table->string('marca');
            $table->string('especif')->nullable();
            $table->string('cod_patri')->unique();
            $table->unsignedBigInteger('dependencia_id')->nullable()->constrained('dependencias');
            $table->unsignedBigInteger('tipo_id')->nullable()->constrained('tipos');
            $table->unsignedBigInteger('user_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware');
    }
};
