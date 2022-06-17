<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    
    protected $table = 'laporan';
    protected $fillable = [
        'bahanbaku_id',
        'produk_dibuat_id',
        'produk_terjual_id',
        'tanggal',
        'jumlah_pemesanan',
        'jumlah_produk_dibuat',
        'jumlah_produk_tersisa',
        'jumlah_produk_terjual'
    ];
}
