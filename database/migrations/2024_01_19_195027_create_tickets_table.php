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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('detalle');
            $table->unsignedInteger('estado')->default(1);
            $table->date('fecha');
            $table->date('fecha_atencion')->nullable();
            $table->date('fecha_conclu')->nullable();
            $table->string('conclusion')->nullable();
            $table->integer('urgencia');
            $table->integer('urgencia_verdad')->nullable();
            $table->time('hora');
            $table->time('hora_atencion')->nullable();
            $table->time('hora_conclu')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->constrained('users');
            $table->unsignedBigInteger('pc_id')->nullable()->constrained('pcs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
