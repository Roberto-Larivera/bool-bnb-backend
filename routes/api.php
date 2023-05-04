<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ViewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::name('api.')->group(function (){
    // Route::resource('apartments', PageController::class)->only([
    //     'index','show','home'
    // ]);
    Route::get('/home', [PageController::class, 'home'])->name('home');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/apartments', [PageController::class, 'index'])->name('apartments.index');
    Route::get('/apartments/services', [PageController::class, 'services'])->name('apartments.services');
    Route::get('/apartments/{slug}', [PageController::class, 'show'])->name('apartments.show');
    Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/view/store', [ViewController::class, 'store'])->name('view.store');
});