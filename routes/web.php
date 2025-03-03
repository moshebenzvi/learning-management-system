<?php

// use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', [CourseController::class,'welcome'])->name('welcome');
Route::view('/', 'welcome')->name('welcome');

// VOLTED ROUTES
Volt::route('/dashboard', 'dashboard')->name('dashboard');

// VOLT ADMIN ROUTES
Volt::route('/admin', 'admin.index')->name('admin');




// Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::resource('/admin', AdminController::class);
    Route::resource('/course', CourseController::class);
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// Route::redirect('/dashboard', '/course');

// Route::resource('/admin', AdminController::class);
