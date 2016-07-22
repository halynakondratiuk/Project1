<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Join extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals_helpers', function (Blueprint $table) {
            $table->integer('animal_id')->unsigned();
            $table->integer('helper_id')->unsigned();
            
        });


        Schema::table('animals_helpers', function (Blueprint $table) {
            $table->foreign('helper_id')
                ->references('id')->on('helpers')
                ->onDelete('cascade');
        });
        
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('animals_helpers');
    }
}
