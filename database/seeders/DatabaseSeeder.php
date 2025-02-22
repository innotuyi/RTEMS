<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Call all the seeders
        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            ProductSeeder::class,
            BidSeeder::class,
            BidApplicationSeeder::class,
            RegulatoryApprovalSeeder::class,
            NotificationSeeder::class,
            // Add any other seeders here
        ]);
    }
}
