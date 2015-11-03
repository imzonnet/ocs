<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OcsOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('ocs_orders', function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->string('order_code')->unique();
		    $table->integer('customer_id')->unsigned();
		    $table->foreign('customer_id')->references('id')->on('users')
		          ->onUpdate('cascade')->onDelete('cascade');
		    $table->integer('organize_id')->unsigned();
		    $table->foreign('organize_id')->references('id')->on('ocs_customer_organizes')
		          ->onUpdate('cascade')->onDelete('cascade');
		    $table->string('order_address');
		    $table->timestamp('created_date');
		    $table->timestamp('process_date');
		    $table->timestamp('finish_date');
		    $table->integer('created_by')->unsigned();
		    $table->foreign('created_by')->references('id')->on('users')
		          ->onUpdate('cascade')->onDelete('cascade');
		    $table->integer('manager_by')->unsigned();
		    $table->foreign('manager_by')->references('id')->on('users')
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
	    Schema::drop('ocs_orders');
    }
}
