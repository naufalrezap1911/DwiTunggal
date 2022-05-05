<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class pekerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pekerja')->insert([
            'nama' => 'pekerja',
            'no_telp' => '085123456789',
            'email' => 'pekerja@gmail.com',
            'alamat' => 'Planet Mars',
            'password' => 'pekerja123',
        ]);
    }
}
