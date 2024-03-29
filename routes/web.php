<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

//---------------routing landing page--------------
Route::get('/', function () {
    return view('landingpage.home');
});

Route::get('/home1', function () {
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


//---------------routing admin page--------------
Route::get('/administrator', [DashboardController::class, 'home']);

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('user', UserController::class)->middleware(['peran:Admin-Manager-Asisten Manager']);

Route::get('user-edit/{id}', [UserController::class, 'edit'])->middleware('peran:Admin');

Route::resource('transaksi', TransaksiController::class)->middleware('auth');

Route::get('transaksi-edit/{id}', [TransaksiController::class, 'edit'])->middleware(['peran:Admin-Operator']);

// Route::get('transaksi-delete/{id}', [TransaksiController::class, 'delete'])->middleware(['peran:admin-operator']);

Route::get('transaksi-pdf', [TransaksiController::class, 'transaksiPDF'])->middleware('auth');

Route::get('transaksi-excel', [TransaksiController::class, 'transaksiExcel'])->middleware('auth');


Route::resource('pegawai', PegawaiController::class)->middleware('auth');

Route::get('pegawai-edit/{id}', [PegawaiController::class, 'edit'])->middleware(['peran:Admin-Operator']);

Route::get('pegawai-pdf', [PegawaiController::class, 'pegawaiPDF'])->middleware('auth');

Route::get('pegawai-excel', [PegawaiController::class, 'pegawaiExcel'])->middleware('auth');


Route::resource('jabatan', JabatanController::class)->middleware(['peran:Admin-Manager-Asisten Manager']);

Route::get('jabatan-edit/{id}', [JabatanController::class, 'edit'])->middleware('peran:Admin');


Route::resource('barang', BarangController::class)->middleware('auth');

Route::get('barang-edit/{id}', [BarangController::class, 'edit'])->middleware(['peran:Admin-Operator']);

Route::get('barang-pdf', [BarangController::class, 'barangPDF'])->middleware('auth');

Route::get('barang-excel', [BarangController::class, 'barangExcel'])->middleware('auth');


Route::resource('jenis_barang', Jenis_BarangController::class)->middleware('auth');

Route::get('jenis_barang-edit/{id}', [Jenis_BarangController::class, 'edit'])->middleware(['peran:Admin-Operator']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/after_register', function () {
    return view('landingpage.after_register');
});

Route::get('/access-denied', function () {
    return view('admin.access_denied');
});

Route::get('/kelola_user', function () {
    return view('user');
})->middleware('peran:Admin');

//----belajar rest API-----
Route::get('/api-transaksi', [TransaksiController::class, 'apiTransaksi']);
Route::get('/api-transaksi/{id}', [TransaksiController::class, 'apiTransaksiDetail']);