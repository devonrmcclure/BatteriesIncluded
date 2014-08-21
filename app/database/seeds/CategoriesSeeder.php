<?php

class CategoriesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category_name' => 'Uncategorized'],
            ['category_name' => 'Batteries'],
            ['category_name' => 'Shavers'],
            ['category_name' => 'Blenders'],
            ['category_name' => 'Accessories']
        ];

        DB::table('categories')->insert($categories);
    }

}