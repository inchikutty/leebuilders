<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMustrollMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mustroll_main', function($table){
			   $table->increments('id');
				 $table->date('date');
				 $table->date('created_date');
		 		 $table->time('created_time');
				 $table->string('site_id');
				 $table->string('site_incharge');
				 $table->string('reporter');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('mustroll_main');
	}

}
