<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = [
        'nip',
        'nama',
        'jabatan_id',
        'gender',
        'tmp_lahir',
        'tgl_lahir',
        'alamat',
        'telepon',
    ];

    public function transaksi() {
        return $this->hasOne(Transaksi::class);
    }
}