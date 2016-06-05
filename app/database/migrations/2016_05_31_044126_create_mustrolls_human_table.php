<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMustrollsHumanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mustrolls_human', function($table){
			   $table->increments('id');
				 $table->string('mustrolls_main_id');
				 $table->integer('number_of_workers');
				 $table->float('wageHr');
				 $table->float('workHr');
				 $table->float('wage_per_person');
				 $table->float('total_wage');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('mustrolls_human');
	}

}
