<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangExport implements FromCollection, WithHeadings
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_barang = DB::table('barang')
        ->join('transaksi','transaksi.id','=','barang.transaksi_id')
        ->join('jenis_barang','jenis_barang.id','=','barang.jenis_barang_id')
        ->select('barang.kode_barang','transaksi.kode_trans','jenis_barang.jenis',
        'barang.nama','barang.kondisi','barang.stok')->get();

        return $ar_barang;
    }

    public function headings(): array
    {
        return["Kode Barang","Kode Transaksi","Jenis","Nama","Kondisi","Stok"];
    }
}