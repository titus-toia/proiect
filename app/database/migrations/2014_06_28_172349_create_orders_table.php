<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('orders', function($t) {
      $t->increments('id');
      $t->string('address');
      $t->string('phone');
      $t->string('state');
      $t->integer('quantity');
      $t->string('notes');
      $t->integer('fk_product');
      $t->timestamps();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
