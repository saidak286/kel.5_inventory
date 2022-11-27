<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Transaksi;
use App\Models\Pegawai;
use PDF;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        //$transaksi = Transaksi::all();
        $transaksi = Transaksi::orderBy('id', 'DESC')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_pegawai = Pegawai::all();
        $ar_status = ['masuk', 'keluar'];
        //arahkan ke form input data
        return view('transaksi.form', compact('ar_pegawai', 'ar_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses input transaksi
        $request->validate([
            'kode_trans' => 'required|unique:transaksi|max:10',
            'pegawai_id' => 'required|integer',
            'nama_barang' => 'required|max:45',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);
        //lakukan insert data dari request form
        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Data transaksi Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Transaksi::find($id);
        return view('transaksi.detail', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Transaksi::find($id);
        return view('transaksi.form_edit', compact('row'));
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
        //proses input transaksi
        $request->validate([
            // 'kode_trans' => 'required|unique:transaksi|max:10',
            'pegawai_id' => 'required|integer',
            'nama_barang' => 'required|max:45',
            'tanggal' => 'required',
            'jumlah' => 'required|integer',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);
        //lakukan insert data dari request form
        Transaksi::find($id)->update($request->all());

        return redirect('/transaksi' . '/' . $id)
            ->with('success', 'Data transaksi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = transaksi::find($id);
        //setelah itu baru hapus data transaksi
        transaksi::where('id', $id)->delete();
        return redirect()->route('transaksi.index')
            ->with('success', 'Data transaksi Berhasil Dihapus');
    }

    public function delete($id)
    {
        Transaksi::find($id)->delete();
        return back();
    }

    public function generatePDF()
    {
        $data = [
            'title' => 'Test Penggunaan Extensions PDF',
            'date' => date('m/d/Y'),
            'isi' => 'Menggunakan Pustaka barryvdh/laravel-dompdf'
        ];

        $pdf = PDF::loadView('transaksi.myPDF', $data);

        return $pdf->download('test_download.pdf');
    }

    public function transaksiPDF()
    {
        $transaksi = Transaksi::all();
        $pdf = PDF::loadView('transaksi.transaksiPDF', ['transaksi' => $transaksi]);
        return $pdf->download('data_transaksi.pdf');
    }

    public function transaksiExcel()
    {
        return Excel::download(new TransaksiExport, 'data_transaksi.xlsx');
    }
}
