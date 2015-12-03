<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OcsOrderHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('ocs_order_histories', function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->integer('order_id')->unsigned();
		    $table->foreign('order_id')->references('id')->on('ocs_orders')
		          ->onUpdate('cascade')->onDelete('cascade');
		    $table->integer('changed_by')->unsigned();
		    $table->foreign('changed_by')->references('id')->on('users')
		          ->onUpdate('cascade')->onDelete('cascade');
		    $table->integer('assigned_to')->unsigned();
		    $table->foreign('assigned_to')->references('id')->on('users')
		          ->onUpdate('cascade')->onDelete('cascade');
		    $table->integer('status_id')->unsigned();
		    $table->foreign('status_id')->references('id')->on('ocs_order_status')
		          ->onUpdate('cascade')->onDelete('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('ocs_order_histories');
    }
}
