<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMustrollsRentedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mustrolls_rented', function($table){
			   $table->increments('id');
				 $table->string('mustrolls_main_id');
				 $table->string('rented_equipment');
				 $table->string('make');
				 $table->string('model');
				 $table->string('owner');
				 $table->mediumText('condition');
				 $table->integer('count');
				 $table->float('rent_per_unit_for_day');
				 $table->float('total_rent');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('mustrolls_rented');
	}

}
