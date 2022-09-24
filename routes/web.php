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
    
    Route::post('tiket','App\Http\Controllers\PenayanganController@storeTiket')->name('tiket.store');
    Route::put('tiket','App\Http\Controllers\PenayanganController@updateTiket')->name('tiket.update');
    Route::delete('tiket/{id}','App\Http\Controllers\PenayanganController@destroyTiket')->name('tiket.destroy');
    
    Route::post('promo','App\Http\Controllers\PenayanganController@storePromo')->name('promo.store');
    Route::put('promo','App\Http\Controllers\PenayanganController@updatePromo')->name('promo.update');
    Route::delete('promo/{id}','App\Http\Controllers\PenayanganController@destroyPromo')->name('promo.destroy');
    
    Route::get('penayangan/all','App\Http\Controllers\PenayanganController@index')->name('penayangan.all');
    Route::get('penayangan/detail/{id}','App\Http\Controllers\PenayanganController@detail')->name('penayangan.detail');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
