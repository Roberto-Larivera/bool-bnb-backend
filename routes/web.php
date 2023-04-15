<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Admin\ApartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'] )->name('dashboard');
    Route::resource('apartments', ApartmentController::class);
});

Route::prefix('admin')->name('admin.')->middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'] )->name('dashboard');
    Route::resource('messages', MessageController::class);
});

require __DIR__.'/auth.php';
