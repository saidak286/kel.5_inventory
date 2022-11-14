<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = [
        'pegawai_id',
        'kode_trans',
        'tanggal',
        'status',
        'catatan'
    ];
    public function barang(){
        return $this->hasMany(Barang::class);
    }
    public function pegawai() {
        return $this->belongsTo(Pegawai::class,'pegawai_id');
    }
}