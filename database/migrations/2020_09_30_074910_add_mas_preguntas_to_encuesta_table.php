<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMasPreguntasToEncuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('encuestas', function (Blueprint $table) {
            for($i = 9; $i <= 30; $i++) {
                $table->text('resp_'.$i)->nullable();
                
            }
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
            $columns = [];
            for($i = 9; $i <= 30; $i++) {
                $columns[] = 'resp_'.$i;
            }

            $table->dropColumn($columns);
            
        });        
    }
}
