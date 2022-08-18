<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [LandingController::class, 'index']);
Route::get('/login', [LandingController::class, 'login']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function(){
        return view('dashboard');
    });
    
    Route::apiResource('user', App\Http\Controllers\UserController::class)->except('show');
    Route::apiResource('paroki', App\Http\Controllers\ParokiController::class)->except('show');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
