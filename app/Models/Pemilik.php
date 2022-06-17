<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = 'pemilik';
    protected $fillable = [
        'user_id',
        'provinsi_id',
        'kabupaten_id',
        'nama_pemilik',
        'no_telp',
        'email',
        'password'
    ];
}
