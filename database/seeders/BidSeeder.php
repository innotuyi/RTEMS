<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('bids')->insert([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'category' => $faker->randomElement(['software', 'hardware', 'consulting']),
                'deadline' => $faker->date(),
                'status' => $faker->randomElement(['open', 'closed', 'awarded']),
                'winner_company_id' => $faker->randomElement([1, 2, 3, null]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
