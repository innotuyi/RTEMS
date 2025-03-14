<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
    
        // Get an existing user ID for seeding (you can adjust this as needed)
        $userId = DB::table('users')->first()->id;
    
        for ($i = 0; $i < 10; $i++) {
            DB::table('companies')->insert([
                'name' => $faker->company,
                'email' => $faker->unique()->companyEmail,
                'phone' => $faker->phoneNumber,
                'website' => $faker->url,
                'industry' => $faker->randomElement(['Software', 'AI', 'Hardware']),
                'status' => $faker->randomElement(['pending', 'approved', 'rejected']),
                'address' => $faker->address,
                'service' => $faker->sentence,
                'mission' => $faker->sentence,
                'target' => $faker->sentence,
                'achievements' => $faker->sentence,
                'number_of_employees' => $faker->numberBetween(1, 100),
                'education_level' => $faker->sentence,
                'company_experience' => $faker->sentence,
                'partners' => $faker->sentence,
                'reason' => $faker->sentence,
                'registration_certificate' => $faker->randomElement([null, 'certificate_path']),
                'user_id' => $userId, // Assign the user_id here
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
}
