<?php

class SubCategoriesSeeder extends Seeder {

    public function run()
    {
        $subcategories = [
            ['parent_category' => 1, 'subcategory_name' => 'Panasonic Phone Battery', 'created_at' => new DateTime(),
                'updated_at' => new DateTime()],
            ['parent_category' => 1, 'subcategory_name' => 'Cell Phone Batteries', 'created_at' => new DateTime(),
                'updated_at' => new DateTime()],
            ['parent_category' => 1, 'subcategory_name' => 'Watch Batteries', 'created_at' => new DateTime(),
                'updated_at' => new DateTime()],
            ['parent_category' => 1, 'subcategory_name' => 'Cordless Phone Batteries','created_at' => new DateTime(),
                'updated_at' => new DateTime()],
            ['parent_category' => 2, 'subcategory_name' => 'Philips Shavers', 'created_at' => new DateTime(),
                'updated_at' => new DateTime()],
        ];

        DB::table('subcategories')->insert($subcategories);
    }

}