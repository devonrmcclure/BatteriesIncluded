<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AdminSeeder');
		//$this->call('CategoriesSeeder');
		//$this->call('SubCategoriesSeeder');
		//$this->call('ProductsSeeder');
	}

}
