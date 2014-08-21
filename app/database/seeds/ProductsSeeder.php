<?php

// ProductsSeeder class
class ProductsSeeder extends Seeder {

    public function run()
        {
            $products = [
                [
                'category_id' => 1,
                'subcategory_id' => 1,
                'product_name' => 'CR2032 3V Button Cell',
                'product_description' => '3V CR2032 Button Cell battery for Watches, Scales, and other items.',
                'price' => 4.99,
                'image' => ''
                ]
            ];

            DB::table('products')->insert($products);
        }

}
