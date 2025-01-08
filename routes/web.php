<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// todo https://spatie.be/docs/laravel-permission/v3/basic-usage/basic-usages sanget terakhir
// todo create courses, lessons, etc

Route::resource('/courses', \App\Http\Controllers\CourseController::class);
Route::resource('/lessons', \App\Http\Controllers\LessonController::class);
