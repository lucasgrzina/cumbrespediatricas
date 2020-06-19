<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEncuestasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resp_1')->nullable();
            $table->string('resp_2')->nullable();
            $table->string('resp_3')->nullable();
            $table->string('resp_4')->nullable();
            $table->integer('registrado_id')->nullable();
            $table->timestamps();
        });

        /*Schema::create('SINGULAR_NAME_translations', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('foreign_id')->unsigned(); //Cambiar por id
            $table->string('locale')->index();

            //$table->string('name')->unique();

            $table->unique(['foreign_id','locale']);
        });*/         

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('encuestas');
        //Schema::drop('SINGULAR_NAME_translations'); //Cambiar por nombre de tabla
    }
}
