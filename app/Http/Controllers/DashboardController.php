<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Barang;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $ar_barang = DB::table('barang')->select('nama','stok')->get();
        return view('dashboard.index',compact('ar_barang'));
    }
}
