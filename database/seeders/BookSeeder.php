<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => $faker->text(25),
                'thumbnail' => $faker->text(50),
                'author' => $faker->text(20),
                'publisher' => $faker->text(20),
                'publication' => '2024-07-10',
                'price' => rand(10000, 1000000),
                'quantity' => rand(100, 200),
                'category_id' => rand(1, 5)
            ]);
        }
    }
}
