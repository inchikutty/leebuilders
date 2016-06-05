<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMustrollsOwnedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mustrolls_owned', function($table){
				 $table->increments('id');
				 $table->string('mustrolls_main_id');
				 $table->string('owned_equip_id');
				 $table->string('equipment');
				 $table->string('make');
				 $table->string('model');
				 $table->integer('count');
				 $table->mediumText('condition');
				 $table->float('maintenance_amount');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('mustrolls_owned');
	}

}
