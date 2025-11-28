<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CompanyService;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            // Usuario que solicita la cita
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

            // Servicio de empresa asociado
            $table->foreignId('company_service_id')
                ->nullable()
                ->constrained('company_services')
                ->onDelete('cascade');

            // Información adicional
            $table->text('mensaje_adicional')->nullable();

            // Relación polimórfica (OBLIGATORIO para evitar tu error)
            $table->string('service_type')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->index(['service_type', 'service_id']);

            // Fecha y hora de la cita
            $table->timestamp('fecha_hora');

            // Enlace de reunión (opcional)
            $table->string('link_meet')->nullable();

            // Estado de la cita
            $table->enum('estado', ['Pendiente', 'Realizada', 'Cancelada'])
                ->default('Pendiente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
