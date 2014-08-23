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
            ['category_name' => 'Uncategorized', 'created_at' => new DateTime(),
                'updated_at' => new DateTime()],
            ['category_name' => 'Batteries', 'created_at' => new DateTime(),
                'updated_at' => new DateTime()],
            ['category_name' => 'Shavers', 'created_at' => new DateTime(),
                'updated_at' => new DateTime()],
            ['category_name' => 'Blenders', 'created_at' => new DateTime(),
                'updated_at' => new DateTime()],
            ['category_name' => 'Accessories', 'created_at' => new DateTime(),
                'updated_at' => new DateTime()]
        ];

        DB::table('categories')->insert($categories);
    }

}