<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreguntasToEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('encuestas', function (Blueprint $table) {
            $table->string('resp_5')->nullable();
            $table->string('resp_6')->nullable();
            $table->string('resp_7')->nullable();
            $table->string('resp_8')->nullable();

        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('encuestas', function (Blueprint $table) {
            $table->dropColumn(['resp_5','resp_6','resp_7','resp_8']);
            
        });        
    }
}
