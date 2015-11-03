<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OcsOrderStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('ocs_order_status', function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->string('status_code')->unique();
		    $table->string('title');
		    $table->string('description');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('ocs_order_status');
    }
}
