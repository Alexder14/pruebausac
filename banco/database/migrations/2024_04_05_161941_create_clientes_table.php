<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // o $table->increments('id') si estás utilizando una versión anterior de Laravel
            $table->string('tipo_documento', 10);
            $table->string('numero_identificacion', 20)->unique();
            $table->string('nombres', 50);
            $table->string('apellidos', 50)->nullable(); // Suponiendo que el apellido puede ser nulo
            $table->string('razon_social', 100)->nullable(); // Suponiendo que la razón social puede ser nula
            $table->string('municipio', 50);
            $table->string('departamento', 50);
            $table->string('email', 100)->unique();
            $table->string('contraseña', 255);
            $table->foreignId('rol_id')->constrained('roles'); // Esto creará una clave foránea que referencia a la tabla roles
            $table->timestamps(); // Crea las columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}