<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\TransaksiController;
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
// Route::get('/administrator', function () {
//     return view('admin.home');
// });

//---------------routing Controllers--------------

Route::resource('barang',BarangController::class);
Route::delete('barang/{id}',[BarangController::class,'delete'])->name('barang.delete');
Route::resource('jenis',JenisController::class);
Route::resource('transaksi',TransaksiController::class);
Route::get('generate-pdf',[BarangController::class,'generatePDF']);
Route::get('barang-pdf',[BarangController::class,'barangPDF']);
Route::get('barang-excel',[BarangController::class,'barangExcel']);
Route::get('dashboard',[DashboardController::class,'index']);