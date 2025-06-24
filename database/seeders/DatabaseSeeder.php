<?php

namespace Database\Seeders;

use App\Models\Blog;
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

        // Create blogs
        Blog::create([
            'user_id' => 1,
            'title' => 'Admin Blog 1',
            'description' => 'Admin Description 1',
            'slug' => 'admin-blog-1',
            'content' => 'Admin Content 1',
        ]);

        Blog::create([
            'user_id' => 1,
            'title' => 'Admin Blog 2',
            'description' => 'Admin Description 2',
            'slug' => 'admin-blog-2',
            'content' => 'Admin Content 2',
        ]);

        Blog::create([
            'user_id' => 2,
            'title' => 'Marcox Blog 1',
            'description' => 'Marcox Description 1',
            'slug' => 'marcox-blog-1',
            'content' => 'Marcox Content 1',
        ]);
    }
}
