<?php

// ProductsSeeder class
class AdminSeeder extends Seeder {

    public function run()
        {
            $products = [
                [
                    'username' => 'Guildford',
                    'password' => Hash::make('root'),
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
                ],

                [
                    'username' => 'Richmond',
                    'password' => Hash::make('root'),
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
                ],

                [
                    'username' => 'White Rock',
                    'password' => Hash::make('root'),
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
                ],

            ];

            DB::table('users')->insert($products);
        }

}
