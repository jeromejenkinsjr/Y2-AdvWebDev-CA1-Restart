<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Replace with a secure password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'admin',
        ]);

        // Example regular user
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Replace with a secure password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'user',
        ]);

        // Additional users can be added similarly
    }
}
