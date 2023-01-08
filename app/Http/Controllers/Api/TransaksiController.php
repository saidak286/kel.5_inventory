<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Http\Resources\TransaksiResource;
use DB;
use Illuminate\Support\Facades\Validator;


class TransaksiController extends Controller
{
    public function Index()
    {
        //menampilkan seluruh data
        //$transaksi = transaksi::all();
        $transaksi = Transaksi::join('pegawai', 'pegawai.id', '=', 'transaksi.pegawai_id')
                ->select('transaksi.kode_trans', 'pegawai.nama', 'transaksi.nama_barang', 'transaksi.tanggal',
                'transaksi.jumlah','transaksi.status', 'transaksi.catatan')
                ->get();

        return new TransaksiResource(true, 'Data Transaksi', $transaksi);
    }

    public function show($id)
    {
        //menampilkan detail data seorang transaksi
        //$transaksi = transaksi::find($id);
        $transaksi = Transaksi::join('pegawai', 'pegawai.id', '=', 'transaksi.pegawai_id')
                    ->select('transaksi.kode_trans', 'pegawai.nama', 'transaksi.nama_barang', 'transaksi.tanggal',
                    'transaksi.jumlah','transaksi.status', 'transaksi.catatan')
                    ->where('transaksi.id', '=', $id) 
                    ->get();

        return new TransaksiResource(true, 'Detail Data Transaksi', $transaksi);
    }

    public function store(Request $request)
    {
        //proses input transaksi
        $validator = Validator::make($request -> all(), [
            'kode_trans' => 'required|unique:transaksi|max:10',
            'pegawai_id' => 'required|integer',
            'nama_barang' => 'required|max:45',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        //cek error atau tidak inputan data
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        //proses menyimpan data yg diinput
        $transaksi = Transaksi::create([
            'kode_trans' => $request->kode_trans,
            'pegawai_id' => $request->pegawai_id,
            'nama_barang' => $request->nama_barang,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return new TransaksiResource(true, 'Data Transaksi Berhasil Diinput', $transaksi);
    }

    public function update(Request $request, $id)
    {
        //proses input transaksi
        $validator = Validator::make($request -> all(), [
            // 'kode_trans' => 'required|unique:transaksi|max:10',
            'pegawai_id' => 'required|integer',
            'nama_barang' => 'required|max:45',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);
        
        //cek error atau tidak inputan data
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        
        //proses menyimpan data yg diinput
        $transaksi = Transaksi::whereId($id)->update([
            'kode_trans' => $request->kode_trans,
            'pegawai_id' => $request->pegawai_id,
            'nama_barang' => $request->nama_barang,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);
        
        return new TransaksiResource(true, 'Data Transaksi Berhasil Diubah', $transaksi);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::whereId($id)->first();
        $transaksi->delete();
        
        return new TransaksiResource(true, 'Data Transaksi Berhasil Dihapus', $transaksi);
    }
}
