<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Jenis_BarangController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/hello', function () {
//     return 'Hello World';
// });

// Route::get('/nilaimahasiswa', 'App\Http\Controllers\MahasiswaController@nilaiMahasiswa');

//---------------routing landing page--------------
Route::get('/', function () {
    return view('landingpage.home');
});

Route::get('/home', function () {
    return view('landingpage.home');
});

Route::get('/about', function () {
    return view('landingpage.about');
});

Route::get('/pricing', function () {
    return view('landingpage.pricing');
});

Route::get('/team', function () {
    return view('landingpage.team');
});

Route::get('/contact', function () {
    return view('landingpage.contact');
});

Route::get('/signin', function () {
    return view('landingpage.signin');
});

Route::get('/signup', function () {
    return view('landingpage.signup');
});

//---------------routing admin page--------------
Route::get('/administrator', function () {
    return view('admin.home');
});

Route::get('dashboard', [DashboardController::class, 'index']);


Route::resource('transaksi', TransaksiController::class);

Route::get('transaksi-edit/{id}', [TransaksiController::class, 'edit']);

Route::get('transaksi-delete/{id}', [TransaksiController::class, 'delete']);

Route::get('transaksi-pdf', [TransaksiController::class, 'transaksiPDF']);

Route::get('transaksi-excel', [TransaksiController::class, 'transaksiExcel']);


Route::resource('pegawai', PegawaiController::class);

Route::get('pegawai-edit/{id}', [PegawaiController::class, 'edit']);

Route::get('pegawai-pdf', [PegawaiController::class, 'pegawaiPDF']);

Route::get('pegawai-excel', [PegawaiController::class, 'pegawaiExcel']);


Route::resource('jabatan', JabatanController::class);

Route::get('jabatan-edit/{id}', [JabatanController::class, 'edit']);


Route::resource('barang', BarangController::class);

Route::get('barang-edit/{id}', [BarangController::class, 'edit']);

Route::get('barang-pdf', [BarangController::class, 'barangPDF']);

Route::get('barang-excel', [BarangController::class, 'barangExcel']);


Route::resource('jenis_barang', Jenis_BarangController::class);

Route::get('jenis_barang-edit/{id}', [Jenis_BarangController::class, 'edit']);


Route::get('generate-pdf', [TransaksiController::class, 'generatePDF']);
