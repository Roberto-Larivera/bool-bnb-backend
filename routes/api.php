<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Api\PageController;

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

// Route::prefix('/apartments')->name('api.apartments.')->group(function (){
//     // Route::resource('apartments', PageController::class)->only([
//     //     'index','show','home'
//     // ]);
//     Route::get('/home', [PageController::class, 'home'])->name('home');
//     Route::get('/index', [PageController::class, 'index'])->name('index');
//     Route::get('/{slug}', [PageController::class, 'show'])->name('show');
// });

Route::name('api.')->group(function (){
    // Route::resource('apartments', PageController::class)->only([
    //     'index','show','home'
    // ]);
    Route::get('/home', [PageController::class, 'home'])->name('home');
    Route::get('/apartments', [PageController::class, 'index'])->name('apartments.index');
    Route::get('/apartments/{slug}', [PageController::class, 'show'])->name('apartments.show');
});