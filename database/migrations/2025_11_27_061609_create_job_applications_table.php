<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nombre_completo');
            $table->integer('edad');
            $table->string('distrito');
            $table->enum('cargo', ['Educadora', 'Auxiliar', 'Practicante']);
            $table->string('disponibilidad');
            $table->text('experiencia');
            $table->string('cv_path');
            $table->string('telefono');
            $table->string('email');
            $table->timestamp('fecha_entrevista')->nullable();
            $table->string('link_entrevista')->nullable();
            $table->enum('estado', ['Pendiente', 'Entrevista', 'Aceptado', 'Rechazado'])->default('Pendiente');
            $table->text('comentarios_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};