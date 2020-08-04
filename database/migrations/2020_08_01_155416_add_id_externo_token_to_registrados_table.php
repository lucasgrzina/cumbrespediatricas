<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdExternoTokenToRegistradosTable extends Migration
{
    public function up()
    {
        Schema::table('registrados', function (Blueprint $table) {
            $table->integer('id_externo')->nullable()->index();
            $table->string('token')->nullable()->index();
            $table->string('certificado')->nullable();

        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrados', function (Blueprint $table) {
            $table->dropColumn(['id_externo','token']);
            
        });        
    }
}
