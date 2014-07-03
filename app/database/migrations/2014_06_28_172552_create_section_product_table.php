<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_section', function($t) {
      $t->increments('id');
      $t->integer('capacity');
      $t->integer('stock');
      $t->integer('fk_product');
      $t->integer('fk_section');

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
		Schema::drop('product_section');
	}

}
