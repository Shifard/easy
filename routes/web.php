<?php

use App\Livewire\EditBlog;
use App\Livewire\UserProfile;
use App\Livewire\ViewBlog;
use App\Livewire\WriteBlog;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('/settings', 'profile')
    ->middleware(['auth'])
    ->name('settings');

require __DIR__.'/auth.php';

Route::get('/write', WriteBlog::class)
    ->middleware(['auth'])
    ->name('blog.write');

Route::get('/blog/{blog:slug}/edit', EditBlog::class)
    ->middleware(['auth'])
    ->name('blog.edit');

Route::get('/blog/{blog:slug}', ViewBlog::class)
    ->middleware(['auth'])
    ->scopeBindings()
    ->name('blog.view');

Route::get('/user/{user:username}', UserProfile::class)
    ->middleware(['auth'])
    ->name('profile');