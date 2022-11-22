<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Console\View\Components\Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrTransaksi = Transaksi::all();
        $arrJenis = Jenis::all();

        return view('barang.form',compact('arrTransaksi','arrJenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'transaksi_id' => 'required|integer',
            'jenis_barang_id' => 'required|integer',
            'nama' => 'required',
            'kondisi' => 'required|string',
            'stok' => 'required|integer'
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')
                            ->with('success','Barang Sukes Ditambah!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brg = Barang::find($id);
        return view('barang.detail',compact('brg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $arrTransaksi = Transaksi::all();
        $arrJenis = Jenis::all();

        return view('barang.formEdit',compact('barang','arrTransaksi','arrJenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'transaksi_id' => 'required|integer',
            'jenis_barang_id' => 'required|integer',
            'nama' => 'required',
            'kondisi' => 'required|string',
            'stok' => 'required|integer'
        ]);

        // update data barang
        DB::table('barang')->where('id',$id)->update([
            'kode_barang' => $request->kode_barang,
            'transaksi_id' => $request->transaksi_id,
            'jenis_barang_id' => $request->jenis_barang_id,
            'nama' => $request->nama,
            'kondisi' => $request->kondisi,
            'stok' => $request->stok,
        ]);

        return redirect('/barang'.'/'.$id)
                        ->with('success','Data barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::where('id',$id)->delete();
        return redirect()->route('barang.index')
                        ->with('success','Barang berhasil dihapus');
    }

    public function delete($id)
    {
        Barang::find($id)->delete();
        return back();
    }

    public function generatePDF(){

        $data = [
            'title' => 'Penggunaan Extensions PDF',
            'date' => date('m/d/Y'),
            'isi' => 'Menggunakan Pustaka barryvdh/laravel-dompdf'
        ];

        $pdf = PDF::loadView('barang.myPDF', $data);

        return $pdf->download('test_download.pdf');
    }

    public function barangPDF(){

        $barang = Barang::all();
        $pdf = PDF::loadView('barang.barangPDF', ['barang'=>$barang]);

        return $pdf->download('data_barang.pdf');
    }

    public function barangExcel(){
        return Excel::download(new BarangExport,'data_barang.xlsx');
    }
}