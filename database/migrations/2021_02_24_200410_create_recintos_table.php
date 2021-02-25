<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecintosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recintos', function (Blueprint $table) {
            $table->id();
            $table->string('recinto')-> nullable();
            $table->integer('id_departamento')-> nullable();
            $table->integer('id_provincia')-> nullable();
            $table->integer('id_circ')-> nullable();
            $table->integer('id_municipio')-> nullable();
            $table->integer('id_distrito')-> nullable();
            $table->integer('id_zona')-> nullable();
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
        Schema::dropIfExists('recintos');
    }
}
