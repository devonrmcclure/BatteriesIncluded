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
            ['category_name' => 'Batteries'],
            ['category_name' => 'Shaver Parts'],
            ['category_name' => 'Blender Parts'],
            ['category_name' => 'Banana']
        ];

        DB::table('categories')->insert($categories);
    }

}