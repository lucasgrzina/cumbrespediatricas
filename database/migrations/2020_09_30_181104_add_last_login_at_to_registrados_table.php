<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLastLoginAtToRegistradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrados', function (Blueprint $table) {
            $table->dateTime('last_login_at')->nullable()->index();
            $table->string('last_login_ip')->nullable();
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
            $table->dropColumn(['last_login_at','last_login_ip']);
        });   
    }
}
