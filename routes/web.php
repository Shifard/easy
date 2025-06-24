<?php

use App\Livewire\UserProfile;
use App\Livewire\ViewBlog;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('/settings', 'profile')
    ->middleware(['auth'])
    ->name('settings');

require __DIR__.'/auth.php';

Route::get('/{user:username}', UserProfile::class)
    ->middleware(['auth'])
    ->name('profile');

Route::get('/{user:username}/{blog:slug}', ViewBlog::class)
    ->middleware(['auth'])
    ->scopeBindings()
    ->name('blog');