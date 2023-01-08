<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Pegawai;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ar_transaksi = DB::table('transaksi')->selectRaw('count(status) as jumlah')->get();
        // $ar_keluar = DB::table('transaksi')->selectRaw('count(status = "keluar") as keluar')->get();
        $ar_barang = DB::table('barang')->select('nama', 'stok')->get();
        $ar_gender = DB::table('pegawai')
            ->selectRaw('gender, count(gender) as jumlah')  
            ->groupBy('gender')
            ->get();
        return view('dashboard.index', compact('ar_barang', 'ar_gender', 'ar_transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        // $ar_masuk = DB::table('transaksi')->selectRaw('status, count("masuk") as masuk')->get();
        // $ar_keluar = DB::table('transaksi')->selectRaw('status, count("keluar") as keluar')->get();
        $ar_barang = DB::table('barang')->select('nama', 'stok')->get();
        $ar_gender = DB::table('pegawai')
            ->selectRaw('gender, count(gender) as jumlah')
            ->groupBy('gender')
            ->get();
        return view('admin.home', compact('ar_barang', 'ar_gender'));
    }
}

