<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OcsOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('ocs_order_details', function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->integer('order_id')->unsigned();
		    $table->foreign('order_id')->references('id')->on('ocs_orders')
		          ->onUpdate('cascade')->onDelete('cascade');
		    $table->integer('product_id')->unsigned();
		    $table->foreign('product_id')->references('id')->on('ocs_products')
		          ->onUpdate('cascade')->onDelete('cascade');
		    $table->integer('service_id')->unsigned();
		    $table->foreign('service_id')->references('id')->on('ocs_services')
		          ->onUpdate('cascade')->onDelete('cascade');
		    $table->integer('quantity');
		    $table->tinyInteger('is_fee')->default(0);
			$table->decimal('price', 10, 2);
		    $table->integer('created_by')->unsigned();
		    $table->foreign('created_by')->references('id')->on('users')
		          ->onUpdate('cascade')->onDelete('cascade');
			$table->string('note')->nullable();
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
	    Schema::drop('ocs_order_details');
    }
}
