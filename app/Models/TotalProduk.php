<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalProduk extends Model
{
    use HasFactory;

    protected $table = 'total_produk';
    protected $fillable = [
        'nama_produk',
        'total_produk',
    ];
}
