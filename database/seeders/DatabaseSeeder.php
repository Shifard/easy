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
        // Create admin account
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@group2.com',
            'password' => bcrypt('adminadmin'),
        ]);

        // Create other user accounts
        User::create([
            'name' => 'Marcox Mediran',
            'username' => 'marcoxmediran',
            'email' => 'marcox@email.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@email.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
