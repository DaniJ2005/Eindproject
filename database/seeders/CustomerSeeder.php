<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      $faker = \Faker\Factory::create();

      for ($i = 0; $i < 10; $i++) {
        DB::table('customers')->insert([
          'name' => $faker->name,
          'email' => $faker->email,
          'address' => $faker->streetAddress,
          'postal_code' => $faker->postcode,
          'city' => $faker->city,
          'created_at' => now(),
          'updated_at' => now(),
        ]);
      }
    }
}
