<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OcsCustomerOrganizes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('ocs_customer_organizes', function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->string('name');
		    $table->string('website');
		    $table->string('phone');
		    $table->string('fax');
		    $table->string('email');
		    $table->string('job');
		    $table->string('tax_code');
		    $table->integer('contact_id');
		    $table->integer('member_care_id');
		    $table->string('address');
		    $table->string('city');
		    $table->string('country');
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
	    Schema::drop('ocs_customer_organizes');
    }
}
