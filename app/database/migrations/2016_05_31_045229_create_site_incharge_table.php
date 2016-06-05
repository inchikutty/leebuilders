<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteInchargeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site_incharge', function($table){
			   $table->increments('id');
				 $table->string('site_id');
				 $table->string('worker_id');
				 $table->date('incharge_date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
			Schema::dropIfExists('site_incharge');
	}

}
