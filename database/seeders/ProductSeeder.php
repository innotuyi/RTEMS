<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'company_id' => $faker->randomElement([1, 2, 3, 4]),
                'name' => $faker->word,
                'description' => $faker->sentence,
                'category' => $faker->randomElement(['software', 'hardware', 'consulting']),
                'price' => $faker->randomFloat(2, 100, 1000),
                'image' => $faker->imageUrl(),
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    }

