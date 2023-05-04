<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UserDataController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\ImageGalleryController;
use App\Http\Controllers\Admin\PaymentController;

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
    return redirect()->route('admin.dashboard');
});
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::prefix('admin')->name('admin.')->middleware('auth', 'verified')->group(function () {
    Route::match(['get', 'post'], '/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::any('/payment/token', [PaymentController::class, 'token'])->name('payment.token');
    Route::get('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
    Route::resource('apartments', ApartmentController::class);
    Route::resource('messages', MessageController::class)->only(['index']);
    Route::resource('user_datas', UserDataController::class)->only(['update', 'edit', 'index']);
    Route::resource('sponsors', SponsorController::class)->only(['index', 'show']);
    Route::resource('image_gallery', ImageGalleryController::class)->only(['store', 'destroy']);
});

Route::post('/login-data', function (Illuminate\Http\Request $request) {
    // Qui puoi gestire i dati che arrivano tramite POST
    $login = $request->input('login');
    $auth = $request->input('auth');

    // Inserisci qui la logica per salvare i dati o fare altro

    // Ritorna la risposta, ad esempio un messaggio di successo
    return response()->json(['message' => 'Dati ricevuti con successo']);
});

require __DIR__.'/auth.php';
