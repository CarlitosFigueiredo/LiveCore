<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::livewire('counter', 'studies.counter')->name('counter');

    Route::livewire('posts', 'studies.posts.posts')->name('posts');
    Route::livewire('posts/create', 'studies.posts.create-post')->name('posts.create');
});

require __DIR__ . '/settings.php';

// continue - testing(3) - colocating test
