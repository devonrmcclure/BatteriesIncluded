<?php

// ProductsSeeder class
class ProductsSeeder extends Seeder {

    public function run()
        {
            $products = [
                [
                'category_id' => 2,
                'subcategory_id' => 2,
                'product_name' => 'Samsung Galaxy S3',
                'product_description' => '3.7 Volt Lithium-Ion battery for Samsung Galaxy S3 phones.',
                'price' => 24.98,
                'image' => ''
                ],

                [
                'category_id' => 2,
                'subcategory_id' => 3,
                'product_name' => 'CR2032 3V Button Cell',
                'product_description' => '3V CR2032 Button Cell battery for Watches, Scales, and other items.',
                'price' => 4.98,
                'image' => ''
                ],

                [
                'category_id' => 2,
                'subcategory_id' => 3,
                'product_name' => 'CR2025 3V Button Cell',
                'product_description' => '3V CR2025 Button Cell battery for Watches, Scales, and other items.',
                'price' => 4.98,
                'image' => ''
                ],

                [
                'category_id' => 2,
                'subcategory_id' => 4,
                'product_name' => '2.4V 2AA Cordless Phone',
                'product_description' => '2.4V 2AA sized cordless phone battery.',
                'price' => 14.98,
                'image' => ''
                ],
            ];

            DB::table('products')->insert($products);
        }

}
