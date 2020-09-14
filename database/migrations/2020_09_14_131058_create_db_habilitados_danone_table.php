<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbHabilitadosDanoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_habilitados_danoneday', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->index();
            $table->string('apellido')->index();
            $table->string('email')->index();
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
        Schema::dropIfExists('db_habilitados_danoneday');
    }
}
