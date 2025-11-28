<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->morphs('service'); // Esto crea service_type (string) y service_id (unsignedBigInteger)
            $table->timestamp('fecha_hora');
            $table->string('link_meet')->nullable();
            $table->enum('estado', ['Pendiente', 'Realizada', 'Cancelada'])->default('Pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};