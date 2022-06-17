<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahan_baku';
    protected $fillable = [
        'pekerja_id',
        'tanggal',
        'nama_bahanbaku',
        'jumlah_bahanbaku',
        'harga_bahanbaku'
    ];
}
