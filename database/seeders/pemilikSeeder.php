<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Admin DwiTunggal',
            'email' => 'admin@dwitunggal.com',
            'password' => bcrypt('admin')
        ]);

        DB::table('pemilik')->insert([
            'user_id' => 1,
            'nama_pemilik' => 'Admin DwiTunggal',
            'email' => 'admin@dwitunggal.com',
            'password' => 'admin'
        ]);
    }
}
