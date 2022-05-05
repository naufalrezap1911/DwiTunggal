<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class pemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pemilik')->insert([
            'nama' => 'admin',
            'no_telp' => '089123456789',
            'email' => 'admin@gmail.com',
            'alamat' => 'Planet Bumi',
            'password' => 'admin123',
        ]);
    }
}
