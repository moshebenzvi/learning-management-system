<?php

// use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Livewire\Enrollment;
use Illuminate\Support\Facades\Route;

// Route::get('/', [CourseController::class,'welcome'])->name('welcome');
Route::view('/', 'welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('/course', CourseController::class);

Route::get('enrollment', Enrollment::class)
    ->middleware(['auth'])->name('enrollment.index');

    //todo belajar cara membuat route dengan livewire

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::redirect('/dashboard', '/course');

// Route::resource('/admin', AdminController::class);
