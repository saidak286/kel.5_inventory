<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'kode_barang',
        'transaksi_id',
        'jenis_barang_id',
        'nama',
        'kondisi',
        'stok'
    ];
    public $timestamps = false;

    public function transaksi() {
        return $this->belongsTo(Transaksi::class,'transaksi_id');
    }

    public function jenis() {
        return $this->belongsTo(Jenis::class,'jenis_barang_id');
    }
}