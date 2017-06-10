<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellers')->truncate();

        $faker = Faker::create();

        for($i=1; $i<=50; $i++) {

            $firstName = $faker->firstName();
            $lastName = $faker->lastName();
            $email = strtolower($firstName . '.' . $lastName) .'@'. $faker->freeEmailDomain();

            DB::table('sellers')->insert([
                'name' => $firstName . ' ' . $lastName,
                'email' => $email,
                'age' => rand(18, 60),
                'country' => $faker->country(),
            ]);
        }
    }
}
