<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RegulatoryApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('regulatory_approvals')->insert([
                'company_id' => $faker->randomElement([1, 2, 3]),
                'product_id' => $faker->randomElement([1, 2, 3, null]),
                'status' => $faker->randomElement(['pending', 'approved', 'rejected']),
                'comment' => $faker->sentence,
                'approved_by' => $faker->randomElement([1, 2, 3]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
