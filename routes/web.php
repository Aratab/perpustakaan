<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('anggota')->group(function() {
    Route::get('/login','Auth\AnggotaLoginController@showLoginForm')->name('anggota.login')->middleware('api');
    Route::post('/login', 'Auth\AnggotaLoginController@login')->name('anggota.login');
    Route::get('logout/', 'Auth\AnggotaLoginController@logout')->name('anggota.logout');
    Route::get('/', 'Auth\AnggotaController@index')->name('anggota.dashboard');

    Route::get('/buku', 'HomeController@showBuku')->name('anggota.buku');
});

Route::prefix('petugas')->group(function() {
    Route::get('/login','Auth\PetugasLoginController@showLoginForm')->name('petugas.login')->middleware('api');
    Route::post('/login', 'Auth\PetugasLoginController@login')->name('petugas.login');
    Route::get('logout/', 'Auth\PetugasLoginController@logout')->name('petugas.logout');
    Route::get('/', 'Auth\PetugasController@index')->name('petugas.dashboard');

    Route::get('/buku','HomeController@showBuku')->name('petugas.buku');
    Route::get('/kategori','HomeController@showKategori')->name('petugas.kategori');
    Route::get('/data_anggota','HomeController@showDataAnggota')->name('petugas.dataanggota');
});
 