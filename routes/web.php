<?php

// use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use Database\Factories\LessonFactory;
use Illuminate\Support\Facades\Route;

// Route::get('/', [CourseController::class,'welcome'])->name('welcome');
Route::view('/', 'welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('/course', CourseController::class);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// Route::resource('/admin', AdminController::class);
