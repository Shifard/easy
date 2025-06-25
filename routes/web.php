<?php

use App\Livewire\EditBlog;
use App\Livewire\HomeFeed;
use App\Livewire\UserProfile;
use App\Livewire\ViewBlog;
use App\Livewire\WriteBlog;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

require __DIR__.'/auth.php';

Route::view('/settings', 'profile')
    ->middleware(['auth'])
    ->name('settings');

Route::get('/home', HomeFeed::class)
    ->middleware(['auth'])
    ->name('home');

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