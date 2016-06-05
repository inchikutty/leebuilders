<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMustrollsPurchaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mustrolls_purchase', function($table){
				 $table->increments('id');
				 $table->string('mustrolls_main_id');
				 $table->string('item');
				 $table->string('unit');
				 $table->integer('count');
				 $table->float('price_per_unit');
				 $table->float('total_price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('mustrolls_purchase');
	}

}
