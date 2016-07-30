<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHumanOvertimeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('human_overtime', function($table){
			   $table->increments('id');
				 $table->string('mustrolls_main_id');
				 $table->string('mustrolls_human_id');
				 $table->string('wrkr_id');
				 $table->float('otHr');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('human_overtime');
	}

}
