<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function nilaiMahasiswa()
    {
        $no = 1;
        //array scalar
        $s1 = ['nama' => 'Fawwaz', 'nilai' => 85];
        $s2 = ['nama' => 'Bedu', 'nilai' => 58];
        $s3 = ['nama' => 'Siti', 'nilai' => 95];
        $s4 = ['nama' => 'Deden', 'nilai' => 30];
        $judul = ['No', 'Nama', 'Nilai', 'Keterangan'];
        //array assocative
        $siswa = [$s1, $s2, $s3, $s4];

        return view(
            'nilai_mahasiswa',
            compact('judul', 'siswa', 'no')
        );
    }
}
