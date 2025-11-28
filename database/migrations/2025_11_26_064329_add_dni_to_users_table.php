<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('dni', 8)->unique()->after('id');
        $table->string('nombres')->after('dni');
        $table->string('apellido_paterno')->after('nombres');
        $table->string('apellido_materno')->after('apellido_paterno');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['dni', 'nombres', 'apellido_paterno', 'apellido_materno']);
    });
}
};
