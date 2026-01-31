<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Create an admin user for accessing admin panel
        if (!User::where('email', 'admin@local')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@local',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]);
        }

        // Create second admin user
        if (!User::where('email', 'admin2@local')->exists()) {
            User::create([
                'name' => 'Administrator 2',
                'email' => 'admin2@local',
                'password' => bcrypt('admin123'),
                'is_admin' => true,
            ]);
        }
    }
}
