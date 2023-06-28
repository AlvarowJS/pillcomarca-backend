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
        Schema::create('gestiondetalles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('link');
            $table->foreignId('gestion_id')->nullable()->constrained('gestions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestiondetalles');
    }
};
