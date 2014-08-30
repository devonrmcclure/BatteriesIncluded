<?php

// ProductsSeeder class
class ProductsSeeder extends Seeder {

    public function run()
        {
            $products = [
                [
                'category_id' => 1,
                'subcategory_id' => 1,
                'product_name' => 'Samsung Galaxy S3',
                'product_description' => '3.7 Volt Lithium-Ion battery for Samsung Galaxy S3 phones.',
                'price' => 24.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 2,
                'product_name' => 'CR2032 3V Button Cell',
                'product_description' => '3V CR2032 Button Cell battery for Watches, Scales, and other items.',
                'price' => 4.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 2,
                'product_name' => 'CR2025 3V Button Cell',
                'product_description' => '3V CR2025 Button Cell battery for Watches, Scales, and other items.',
                'price' => 4.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 3,
                'product_name' => '2.4V 2AA Cordless Phone',
                'product_description' => '2.4V 2AA sized cordless phone battery.',
                'price' => 14.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 2,
                'subcategory_id' => 4,
                'product_name' => 'Philips RQ1260 Shaver',
                'product_description' => 'Philips RQ1260 Shaver unit.',
                'price' => 144.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 4,
                'subcategory_id' => 1,
                'product_name' => '1 Metre Cell Data Cable',
                'product_description' => 'One meter cell data cable for use with android phones and some other brands of phones.',
                'price' => 4.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 4,
                'subcategory_id' => 1,
                'product_name' => 'Apple iPhone 4 Data Cable',
                'product_description' => 'iPhone 4 data cable for use with iPhone 4 and earlier versions.',
                'price' => 4.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 4,
                'subcategory_id' => 1,
                'product_name' => 'Apple iPhone 5 Data Cable',
                'product_description' => 'iPhone 5 data cable for use with iPhone 5 models.',
                'price' => 4.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 1,
                'product_name' => '12v 5.0AH SLA Alarm System Battery',
                'product_description' => 'A 12 volt 5.0 amp hour SLA (sealed lead acid) battery for home alarm systems.',
                'price' => 30.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 3,
                'product_name' => 'SR626SW 1.55V Button Cell',
                'product_description' => 'SR626SW 1.55V button cell battery used in watches and other small items.',
                'price' => 4.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 3,
                'product_name' => '2.4V 2AAA Cordless Phone',
                'product_description' => '2.4V 2AAA sized cordless phone battery.',
                'price' => 14.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 1,
                'product_name' => 'Panasonic AA cell 2 Pack.',
                'product_description' => '2 pack of Panasonic AA batteries.',
                'price' => 3.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 1,
                'product_name' => 'Maxell AA cell 2 Pack',
                'product_description' => '2 pack of Maxell AA batteries.',
                'price' => 2.28,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 1,
                'product_name' => 'Maxell D cell 2 pack.',
                'product_description' => '2 pack of Maxell D cell batteries.',
                'price' => 3.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 2,
                'product_name' => 'SR621SW 1.55V Button Cell',
                'product_description' => 'SR621SW 1.55V button cell battery used in watches and other small items.',
                'price' => 14.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 1,
                'product_name' => 'Bug Zapper',
                'product_description' => 'A bug zapper.',
                'price' => 6.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 1,
                'product_name' => '14mm Watch Strap',
                'product_description' => 'A 14mm watch strap.',
                'price' => 14.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],

                [
                'category_id' => 1,
                'subcategory_id' => 1,
                'product_name' => 'Drinking Bird',
                'product_description' => 'Classic drinking bird.',
                'price' => 14.98,
                'image' => '',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ],
            ];

            DB::table('products')->insert($products);
        }

}
