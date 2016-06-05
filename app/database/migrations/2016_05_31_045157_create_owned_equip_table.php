<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnedEquipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('owned_equip', function($table){
			   $table->increments('id');
				 $table->string('equipment');
				 $table->string('make');
				 $table->string('model');
				 $table->integer('count');
				 $table->string('last_used_site');
				 $table->mediumText('condition');
				 $table->float('last_maintenance_amount');
				 $table->date('last_maintenance_date');
				 $table->string('last_maintenance_serviced_at');
				 $table->string('last_maintenance_serviced_by');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('owned_equip');
	}

}
