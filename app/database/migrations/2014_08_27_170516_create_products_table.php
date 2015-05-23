<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->string('product_name');
			$table->text('product_description');
			$table->string('brand');
			$table->integer('quantity');
			$table->decimal('price', 5, 2); // Price with max 5 digits, 2 of which must be decimal. Max price: $999.99
			$table->string('image');
			$table->timestamps();

			// Map Foreign Key
			$table->foreign('category_id')->references('id')->on('categories');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
