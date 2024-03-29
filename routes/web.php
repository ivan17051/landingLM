<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Auth::routes();
Route::get('/', [LandingController::class, 'index']);
Route::get('/jadwal', [LandingController::class, 'jadwal']);
Route::get('/login', [LandingController::class, 'login']);
Route::get('cektiket/{id}','App\Http\Controllers\TamuController@cekTiket')->name('tamu.cekTiket');
Route::post('/pay','App\Http\Controllers\TamuController@pay')->name('pay.pay');
Route::get('/testmail','App\Http\Controllers\TamuController@email')->name('test.mail');

Route::middleware(['auth'])->middleware('admin')->group(function () {

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

    Route::get('transaksi/{id}','App\Http\Controllers\TransaksiController@show')->name('transaksi.show');
    Route::get('getPromo/{kode}ti{tiket}pa{paroki}', 'App\Http\Controllers\TransaksiController@getPromo');
    Route::get('konfirmasi/', 'App\Http\Controllers\KonfirmasiController@index');

    Route::post('gettoken', 'App\Http\Controllers\TransaksiController@gettoken')->name('get.token');

});

Route::middleware(['auth'])->group(function () {
    Route::get('akun/','App\Http\Controllers\TamuController@index')->name('tamu.akun');
    Route::post('checkout1/','App\Http\Controllers\TamuController@checkout1')->name('tamu.checkout1');
    Route::post('checkout2/','App\Http\Controllers\TamuController@checkout2')->name('tamu.checkout2');
    Route::get('orderFinal/{id}','App\Http\Controllers\TamuController@checkout3')->name('tamu.order');
    Route::get('cetakTiket/{id}','App\Http\Controllers\TamuController@cetakTiket')->name('tamu.cetakTiket');
    Route::post('verifikasi/','App\Http\Controllers\TamuController@verifikasi')->name('tamu.verifikasi');
    //Route::get('tiketku','App\Http\Controllers\TiketkuController@index');
});

Auth::routes();
Route::get('/welcome', 'App\Http\Controllers\TransaksiController@coba');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
