<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
    
        for ($i = 0; $i < 10; $i++) {
            DB::table('notificatons')->insert([
                'user_id' => $faker->randomElement([1, 2, 3]), // Example user IDs
                'message' => $faker->sentence,
                'type' => $faker->randomElement(['bid_update', 'approval_status', 'general_alert']), // Correct enum values
                'read_at' => $faker->randomElement([now(), null]), // Optional read_at timestamp
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
}
