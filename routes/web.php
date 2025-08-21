<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Frontend\HomePage;
use App\Livewire\Dashboard\AdminDashboard;
use App\Livewire\CreateQuestion;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend Route
Route::get('/', HomePage::class)->name('home');

// Authenticated Routes (Dashboard, Profile, etc.)
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
    Route::get('/questions', CreateQuestion::class)->name('questions');

   
});
 // Profile routes from Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// This line loads login, register, logout, etc. routes
require __DIR__.'/auth.php'; // 👈 Make sure this line exists