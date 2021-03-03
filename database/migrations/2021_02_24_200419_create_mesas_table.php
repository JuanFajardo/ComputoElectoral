<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->string('mesa')-> nullable();
            $table->integer('id_departamento')-> nullable();
            $table->integer('id_provincia')-> nullable();
            $table->integer('id_circ')-> nullable();
            $table->integer('id_municipio')-> nullable();
            $table->integer('id_distrito')-> nullable();
            $table->integer('id_zona')-> nullable();
            $table->integer('id_recinto')-> nullable();
            $table->integer('habilitados')-> nullable();
            $table->integer('contador')->comment('2 y no debe mostrarse')-> nullable();
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
        Schema::dropIfExists('mesas');
    }
}
