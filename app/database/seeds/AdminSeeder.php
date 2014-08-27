<?php

// ProductsSeeder class
class AdminSeeder extends Seeder {

    public function run()
        {
            $products = [
                [
                    'username' => 'batteriesincluded',
                    'password' => Hash::make('root'),
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
                ]

            ];

            DB::table('users')->insert($products);
        }

}
