<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('university_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nombre_universidad');
            $table->string('area_facultad');
            $table->string('persona_contacto');
            $table->string('email');
            $table->string('telefono');
            $table->enum('tipo_servicio', ['Por horas', 'Evento', 'Permanente']);
            $table->date('fecha_estimada');
            $table->text('comentarios')->nullable();
            $table->timestamp('fecha_cita')->nullable();
            $table->string('link_meet')->nullable();
            $table->enum('estado', ['Pendiente', 'En Revisión', 'Aceptada', 'Rechazada', 'Completada'])->default('Pendiente');
            $table->text('comentarios_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('university_services');
    }
};