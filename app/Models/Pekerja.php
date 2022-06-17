<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerja extends Model
{
    use HasFactory;

    protected $table = 'pekerja';
    protected $fillable = [
        'user_id',
        'provinsi_id',
        'kabupaten_id',
        'nama_pekerja',
        'no_telp',
        'email',
        'password'
    ];
}
