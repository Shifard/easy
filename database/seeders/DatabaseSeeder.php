<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin account
        $adminRole = Role::create(['name' => 'admin']);
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@group2.com',
            'password' => bcrypt('adminadmin'),
        ])->assignRole($adminRole);

        // Create other user accounts
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
            'slug' => 'admin-blog-1' . '-' . uniqid(),
            'content' => 'Admin Content 1',
        ]);

        Blog::create([
            'user_id' => 1,
            'title' => 'Admin Blog 2',
            'description' => 'Admin Description 2',
            'slug' => 'admin-blog-2' . '-' . uniqid(),
            'content' => 'Admin Content 2',
        ]);

        Blog::create([
            'user_id' => 2,
            'title' => 'Test User Blog 1',
            'description' => 'Test Description 1',
            'slug' => 'test-blog-1' . '-' . uniqid(),
            'content' => 'Test Content 1',
        ]);
    }
}
