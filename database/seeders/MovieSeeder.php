<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->text(25),
                'poster' => 'ảnh đây',
                'intro' => $faker->text(20),
                'release_date' => $faker->dateTime(),
                'gene_id' => rand(1, 4),
            ]);
        }
    }
}
