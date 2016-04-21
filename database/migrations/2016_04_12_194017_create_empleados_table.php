<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cedula');
            $table->string('rif');
            $table->date('fecha_ingreso');
            $table->string('email')->unique();
            $table->string('usuarioSlack')->unique();
            $table->text('path');
            $table->integer('cargo')->unsigned();
            $table->foreign('cargo')->references('id')->on('cargos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
