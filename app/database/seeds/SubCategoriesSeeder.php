<?php

class SubCategoriesSeeder extends Seeder {

    public function run()
    {
        $subcategories = [
            ['parent_category' => 1, 'subcategory_name' => 'Uncategorized'],
            ['parent_category' => 2, 'subcategory_name' => 'Cell Phone Batteries'],
            ['parent_category' => 2, 'subcategory_name' => 'Watch Batteries'],
            ['parent_category' => 2, 'subcategory_name' => 'Cordless Phone Batteries'],
            ['parent_category' => 3, 'subcategory_name' => 'Philips Shavers'],
        ];

        DB::table('subcategories')->insert($subcategories);
    }

}