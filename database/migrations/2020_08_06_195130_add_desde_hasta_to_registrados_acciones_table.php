<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDesdeHastaToRegistradosAccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrados_acciones', function (Blueprint $table) {
            $table->dateTime('desde')->after('accion')->index();
            $table->dateTime('hasta')->after('desde')->nullable()->index();

        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrados_acciones', function (Blueprint $table) {
            $table->dropColumn(['desde','hasta']);
            
        }); 
    }
}
