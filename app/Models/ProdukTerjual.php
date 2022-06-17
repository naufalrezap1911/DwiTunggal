<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukTerjual extends Model
{
    use HasFactory;

    protected $table = 'produk_terjual';
    protected $fillable = [
        'tanggal',
        'nama_produk',
        'jumlah_produk',
        'harga_produk',
        'total'
    ];
}
