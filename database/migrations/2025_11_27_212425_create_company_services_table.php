<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('company_services', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa');
            $table->integer('num_colaboradores');
            $table->string('persona_contacto');
            $table->string('cargo');
            $table->string('email');
            $table->string('telefono');
            $table->enum('tipo_servicio', ['Permanente', 'Por evento']);
            $table->text('mensaje_adicional')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_services');
    }
};