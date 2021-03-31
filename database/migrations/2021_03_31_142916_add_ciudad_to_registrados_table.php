<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCiudadToRegistradosTable extends Migration
{
    public function up()
    {
        Schema::table('registrados', function (Blueprint $table) {
            $table->string('ciudad')->nullable();
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
            $table->dropColumn(['ciudad']);
        });   
    }
}
