<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $table = 'jenis_barang';
    protected $fillable = ['jenis'];
    public $timestamps = false;

    public function barang() {
        return $this->hasOne(Barang::class);
    }
}