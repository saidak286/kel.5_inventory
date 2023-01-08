<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Exports\PegawaiExport;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        //$pegawai = Pegawai::all();
        $pegawai = Pegawai::orderBy('id', 'DESC')->get();
        return view('pegawai.index', compact('pegawai'));
    }

    public function apiPegawai()
    {
        //menampilkan seluruh data
        //$pegawai = Pegawai::all();
        $pegawai = Pegawai::join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
                ->select('pegawai.nip','pegawai.nama', 'jabatan.nama AS posisi', 'pegawai.gender',
                 'pegawai.tmp_lahir','pegawai.tgl_lahir', 'pegawai.alamat', 'pegawai.telepon')
                ->get();
        return response()->json(
            [
                'success'=>true,
                'message'=>'Data Pegawai',
                'data'=>$pegawai,
            ],200);
    }

    public function apiPegawaiDetail($id)
    {
        //menampilkan detail data seorang pegawai
        //$pegawai = Pegawai::find($id);
        $pegawai = Pegawai::join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
        ->select('pegawai.nip','pegawai.nama', 'jabatan.nama AS posisi', 'pegawai.gender',
         'pegawai.tmp_lahir','pegawai.tgl_lahir', 'pegawai.alamat', 'pegawai.telepon')
        ->where('pegawai.id', '=', $id) 
        ->get();
        
        if($pegawai){ //jika data pegawai ditemukan
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Detail Pegawai',
                    'data'=>$pegawai,
                ],200);
        }
        else{ //jika data pegawai tidak ditemukan
            return response()->json(
                [
                    'success'=>false,
                    'message'=>'Detail Pegawai Tidak ditemukan',
                ],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_jabatan = Jabatan::all();
        $ar_gender = ['L', 'P'];
        //arahkan ke form input data
        return view('pegawai.form', compact('ar_jabatan', 'ar_gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses input pegawai
        $request->validate(
            [
                'nip' => 'required|unique:pegawai|max:5',
                'nama' => 'required|max:45',
                'jabatan_id' => 'required|integer',
                'gender' => 'required',
                'tmp_lahir' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'telepon' => 'required|string|min:16',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ],
            //custom pesan errornya
            [
                'nip.required' => 'NIP Wajib Diisi',
                'nip.unique' => 'NIP Sudah Ada (Terduplikasi)',
                'nip.max' => 'NIP Maksimal 5 karakter',
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 karakter',
                'jabatan_id.required' => 'Jabatan Wajib Diisi',
                'jabatan_id.integer' => 'Jabatan Wajib Diisi Berupa dari Pilihan yg Tersedia',
                'gender.required' => 'Jenis Kelamin Wajib Diisi',
                'tmp_lahir.required' => 'Tempat Lahir Wajib Diisi',
                'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi',
                'alamat.required' => 'Alamat Wajib Diisi',
                'telepon.required' => 'Telepon Wajib Diisi',
                'telepon.min' => 'Telepon Minimal 16 karakter',
            ]
        );
        //Pegawai::create($request->all());
        //------------apakah user  ingin upload foto-----------
        if (!empty($request->foto)) {
            $fileName = 'foto-' . $request->nip . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = '';
        }
        //lakukan insert data dari request form
        DB::table('pegawai')->insert(
            [
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan_id,
                'gender' => $request->gender,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'foto' => $fileName,
                'created_at' => now(),
            ]
        );

        return redirect()->route('pegawai.index')
            ->with('success', 'Data Pegawai Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Pegawai::find($id);
        return view('pegawai.detail', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Pegawai::find($id);
        return view('pegawai.form_edit', compact('row'));
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
        //proses input pegawai
        $request->validate([
            // 'nip' => 'required|unique:pegawai|max:5',
            'nama' => 'required|max:45',
            'jabatan_id' => 'required|integer',
            'gender' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|',
            'telepon' => 'required|string|min:16',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        //------------foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('pegawai')->select('foto')->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user ingin ganti foto lama-----------
        if (!empty($request->foto)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($f->foto)) unlink('admin/img/' . $f->foto);
            //proses foto lama ganti foto baru
            $fileName = 'foto-' . $request->nip . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/img'), $fileName);
        }
        //------------tidak berniat ganti ganti foto lama-----------
        else {
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('pegawai')->where('id', $id)->update(
            [
                // 'nip' => $request->nip,
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan_id,
                'gender' => $request->gender,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'foto' => $fileName,
                'updated_at' => now(),
            ]
        );

        return redirect('/pegawai' . '/' . $id)
            ->with('success', 'Data Pegawai Berhasil Diubah');
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
        $row = Pegawai::find($id);
        if (!empty($row->foto)) unlink('admin/img/' . $row->foto);

        if ($row ['code'] != 0) {

            return redirect()->route('pegawai.index')
                ->with('alert', 'Data Pegawai Tidak Dapat Dihapus');
        }
        else {
            //setelah itu baru hapus data pegawai
            Pegawai::where('id', $id)->delete();
            return redirect()->route('pegawai.index')
                ->with('success', 'Data Pegawai Berhasil Dihapus');
        }
    }

    public function pegawaiPDF()
    {
        $pegawai = Pegawai::all();
        $pdf = PDF::loadView('pegawai.pegawaiPDF', ['pegawai' => $pegawai]);
        return $pdf->download('data_pegawai.pdf');
    }

    public function pegawaiExcel()
    {
        return Excel::download(new PegawaiExport, 'data_pegawai.xlsx');
    }
}
