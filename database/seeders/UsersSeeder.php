<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'full_name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Correct usage
            'role' => 'admin'
        ]);
        \App\Models\User::factory()->create([
            'full_name' => 'Regular User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('motdepasse'), // Changed to bcrypt
            'role' => 'user'
        ]);
        \App\Models\User::factory()->create([
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('johndoe'), // Changed to bcrypt
            'role' => 'user',
        ]);

    }
}
