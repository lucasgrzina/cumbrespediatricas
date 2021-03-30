<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPasswordToRegistradosTable extends Migration
{
    public function up()
    {
        Schema::table('registrados', function (Blueprint $table) {
            $table->string('password')->nullable();
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
            $table->dropColumn(['password']);
        });   
    }
}
