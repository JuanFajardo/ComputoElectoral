<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mesa')->unique();
            $table->integer('id_persona')-> nullable();
            val id_mesa:Int,
            val id_persona:Int,

            val als:Int,

            val cc:Int,
            val mas:Int,
            val adn:Int,
            val jap:Int,
            val mcp:Int,
            val ucs:Int,
            val puka:Int,
            val mds:Int,
            val mts:Int,
            val fpv:Int,
            val mop:Int,
            //aqui PAN-BOL
            val nulo:Int,
            val blanco:Int,
            val total:(SUMA TOTAL DE TODOS LOS PARTIDOS BLANCOS Y NULOS),

            val acta:(Cambbie el nombre)
            val observacion:'nada',
            val aceptado='1',
            val tipo'ALCALDE/CONCEJAL'

            $table->integer('als')->commet('RENE JOAQUINO CABRERA')-> nullable();
            $table->integer('pan')->commet('Nose')-> nullable();
            $table->integer('cc')->commet('RAFAEL FELIPE MONTOYA RIVERA')-> nullable();
            $table->integer('mas')->commet('MARCELINO CHOQUEHUANCA IBARRA')-> nullable();
            $table->integer('adn')->commet('WILLIAMS MIGUEL VILLA DAVIS')-> nullable();
            $table->integer('jap')->commet('EDILBERTO CHAMBI MONTAÑO')-> nullable();
            $table->integer('mcp')->commet('JHONNY LLALLY')-> nullable();
            $table->integer('ucs')->commet('ROLANDO BEJARANO MANCHACA')-> nullable();
            $table->integer('puka')->commet('RUTH VELASCO GARRON')-> nullable();
            $table->integer('mds')->commet('GONZALO GUILLERMO BARRIENTOS ALVARADO')-> nullable();
            $table->integer('mts')->commet('EDUARDO HUMBERTO MALDONADO IPORRE')-> nullable();
            $table->integer('fpv')->commet('OSCAR ISAL GARNICA')-> nullable();
            $table->integer('mop')->commet('WILBERT RAMIREZ CHUQUISEA')-> nullable();

            $table->integer('nulo')->nullable();
            $table->integer('blanco')->nullable();

            $table->integer('total')->nullable();

            $table->string('codigo_celular');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('acta');

            $table->string('observacion')->comment('para alguna observacion')->nullable();
            $table->string('aceptado')->comment('papeleta Aceptada 0/1')->nullable();

            $table->string('tipo')->comment('ALCALDE/CONCEJAL/GOBERNADOR/ASAMBLEISTA');
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
        Schema::dropIfExists('votos');
    }
}
