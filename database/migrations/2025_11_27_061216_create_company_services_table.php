<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nombre_empresa');
            $table->string('persona_contacto');
            $table->string('cargo');
            $table->string('email');
            $table->string('telefono');
            $table->integer('num_colaboradores');
            $table->enum('tipo_servicio', ['Permanente', 'Por evento']);
            $table->text('mensaje_adicional')->nullable();
            $table->timestamp('fecha_cita')->nullable();
            $table->string('link_meet')->nullable();
            $table->enum('estado', ['Pendiente', 'En Revisión', 'Aceptada', 'Rechazada', 'Completada'])->default('Pendiente');
            $table->text('comentarios_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_services');
    }
};