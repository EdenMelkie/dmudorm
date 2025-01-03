<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'UserName' => 'admin',
            'Password' => bcrypt('eden'),  // You can add a password if necessary
            'UserType' => 'Admin',  // Example value for UserType
            'Status' => 'Active',  // Example value for Status
        ]);
    }
}
