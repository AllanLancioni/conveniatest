<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sales')->truncate();

        $faker = Faker::create();

        for($i=1; $i<=5; $i++) {

            DB::table('sales')->insert([
                'price' => rand(100, 5000),
                'title' => ucfirst(implode(' ', $faker->words(3))),
                'describe' => $faker->paragraph(),
                'seller_id' => rand(1, 50),
            ]);
        }
    }
}