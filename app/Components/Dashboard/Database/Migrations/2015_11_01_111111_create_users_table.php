<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{

            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password', 60);
			$table->date('birthday')->nullable();
			$table->tinyInteger('gender')->default(0);
			$table->string('job')->nullable();
			$table->string('phone')->nullable();
			$table->string('mobile')->nullable();
			$table->string('know_us')->nullable();
			$table->string('intro_person')->nullable();
			$table->string('address')->nullable();
			$table->string('city')->nullable();
			$table->string('country')->nullable();
            $table->string('activation_code')->nullable();
            $table->tinyInteger('activated')->default(0);
			$table->integer('group_id')->unsigned()->nullable();
			$table->foreign('group_id')->references('id')->on('ocs_customer_groups')->onUpdate('cascade')->onDelete('SET NULL');
			$table->integer('organize_id')->unsigned()->nullable();
			$table->foreign('organize_id')->references('id')->on('ocs_customer_organizes')->onUpdate('cascade')->onDelete('SET NULL');
            $table->rememberToken();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
