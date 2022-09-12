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
Route::get('/jadwal', [LandingController::class, 'jadwal']);
Route::get('/login', [LandingController::class, 'login']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function(){
        return view('dashboard');
    });
    
    Route::apiResource('user', App\Http\Controllers\UserController::class)->except('show');
    Route::apiResource('paroki', App\Http\Controllers\ParokiController::class)->except('show');
    Route::apiResource('penyelenggara', App\Http\Controllers\PenyelenggaraController::class)->except('show');
    Route::apiResource('penayangan', App\Http\Controllers\PenayanganController::class)->except('show');
    
    Route::get('penayangan/all','App\Http\Controllers\PenayanganController@index')->name('penayangan.all');
    Route::get('penayangan/detail/{id}','App\Http\Controllers\PenayanganController@detail')->name('penayangan.detail');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
