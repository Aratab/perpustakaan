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

Route::prefix('anggota')->group(function () {
    Route::get('/login', 'Auth\AnggotaLoginController@showLoginForm')->name('anggota.login');
    Route::post('/login', 'Auth\AnggotaLoginController@login')->name('anggota.login');
    Route::get('logout/', 'Auth\AnggotaLoginController@logout')->name('anggota.logout');
    Route::get('/', 'Auth\AnggotaController@index')->name('anggota.dashboard');

    Route::get('/buku', 'Auth\AnggotaController@showBuku')->name('anggota.buku');
    Route::get('/peminjaman', 'Auth\AnggotaController@showPeminjaman')->name('anggota.peminjaman');
});

Route::prefix('petugas')->group(function () {
    Route::get('/login', 'Auth\PetugasLoginController@showLoginForm')->name('petugas.login');
    Route::post('/login', 'Auth\PetugasLoginController@login')->name('petugas.login');
    Route::get('logout/', 'Auth\PetugasLoginController@logout')->name('petugas.logout');
    Route::get('/', 'Auth\PetugasController@index')->name('petugas.dashboard');

    //Tambah Buku
    Route::get('/buku/addBuku', 'Auth\PetugasController@addBuku')->name('petugas.addBuku');
    Route::post('/buku/addBuku/sukses', 'Auth\PetugasController@storeBuku')->name('petugas.storeBuku');
    //Edit Buku
    Route::get('/buku/editBook/{idbuku}', 'Auth\PetugasController@editBook')->name('petugas.editBook');
    Route::post('/buku/editBook', 'Auth\PetugasController@updateBook')->name('petugas.updateBook');
    //Delete Buku
    Route::get('/buku/hapus/{idbuku}', 'Auth\PetugasController@deleteBook')->name('petugas.deleteBook');

    //Tambah Anggota
    Route::get('/data_anggota/addAnggota', 'Auth\PetugasController@addAnggota')->name('petugas.addAnggota');
    Route::post('/data_anggota/addAnggota/sukses', 'Auth\PetugasController@storeAnggota')->name('petugas.storeAnggota');
    // Mengedit Anggota
    Route::get('/data_anggota/editCustomer/{nim}', 'Auth\PetugasController@editCustomer')->name('petugas.editCust');
    Route::post('/data_anggota/update', 'Auth\PetugasController@updateCust')->name('petugas.updateCust');

    //Hapus Anggota
    Route::get('/data_anggota/hapus/{nim}', 'Auth\PetugasController@deleteAnggota')->name('petugas.deleteAnggota');

    //Menambah Kategori
    Route::get('/kategori/addKategori', 'Auth\PetugasController@addKategori')->name('petugas.addKategori');
    Route::post('/kategori/addKategori/sukses', 'Auth\PetugasController@storeKategori')->name('petugas.storeKategori');
    //Mengedit Kategori
    Route::get('/kategori/editKategori/{idkategori}', 'Auth\PetugasController@editKategori')->name('petugas.editKategori');
    Route::post('/kategori/update', 'Auth\PetugasController@updateKategori')->name('petugas.updateKategori');
    //Menghapus Kategori
    Route::get('/kategori/hapus/{id}', 'Auth\PetugasController@deleteKategori')->name('petugas.deleteKategori');

    //Halaman Kategori. Anggota, Buku dari Petugas
    Route::get('/kategori', 'Auth\PetugasController@showKategori')->name('petugas.kategori');
    Route::get('/data_anggota', 'Auth\PetugasController@showDataAnggota')->name('petugas.dataanggota');

    Route::get('/buku', 'Auth\PetugasController@showBuku')->name('petugas.buku');

    Route::get('/peminjaman', 'Auth\PetugasController@showPeminjaman')->name('petugas.peminjaman');

    Route::get('/tambahdatapinjam', 'Auth\PetugasController@showFormTambahDataPinjam')->name('petugas.tambahdatapinjam');
    Route::post('/addpeminjaman', 'Auth\PetugasController@addPeminjaman')->name('petugas.addpeminjaman');

    Route::get('/pengembalian', 'Auth\PetugasController@pengembalian')->name('petugas.pengembalian');
  
});

// Route untuk melihat detail buku berdasarkan judul
Route::get('/viewbook/{judul}', [App\Http\Controllers\HomeController::class, 'viewbook'])->name('viewbook');

// Route Search Buku
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
