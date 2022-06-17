<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukDibuat extends Model
{
    use HasFactory;

    protected $table = 'produk_dibuat';
    protected $fillable = [
        'bahanbaku_id',
        'tanggal',
        'nama_produk',
        'jumlah_bahanbaku',
        'jumlah_produk_dibuat'
    ];
}
