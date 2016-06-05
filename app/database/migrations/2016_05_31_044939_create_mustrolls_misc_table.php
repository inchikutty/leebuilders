<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMustrollsMiscTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mustrolls_misc', function($table){
				 $table->increments('id');
				 $table->string('mustrolls_main_id');
				 $table->mediumText('comment');
				 $table->float('amount');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('mustrolls_misc');
	}

}
