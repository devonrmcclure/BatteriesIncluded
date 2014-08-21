<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubcategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcategories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_category')->unsigned();
			$table->string('subcategory_name');
			$table->timestamps();

			$table->foreign('parent_category')->references('id')->on('categories');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subcategories');
	}

}
