<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nombre_evento');
            $table->enum('tipo_evento', ['Feria', 'Conferencia', 'Congreso', 'Apertura', 'Otro']);
            $table->date('fecha_evento');
            $table->string('duracion');
            $table->string('lugar');
            $table->integer('cantidad_ninos');
            $table->string('persona_contacto');
            $table->string('telefono');
            $table->string('email');
            $table->text('necesidades_especiales')->nullable();
            $table->timestamp('fecha_cita')->nullable();
            $table->string('link_meet')->nullable();
            $table->enum('estado', ['Pendiente', 'En Revisión', 'Aceptada', 'Rechazada', 'Completada'])->default('Pendiente');
            $table->text('comentarios_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_services');
    }
};