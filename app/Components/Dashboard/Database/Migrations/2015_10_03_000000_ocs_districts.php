<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OcsDistricts extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ocs_districts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('town_id')->unsigned()->nullable();
			$table->foreign('town_id')->references('id')->on('ocs_towns')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ocs_districts');
	}
}
