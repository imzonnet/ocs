<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OcsTowns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('ocs_towns', function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->string('name');
		    $table->integer('country_id')->unsigned()->nullable();
		    $table->foreign('country_id')->references('id')->on('ocs_countries')->onUpdate('cascade')->onDelete('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('ocs_towns');
    }
}
