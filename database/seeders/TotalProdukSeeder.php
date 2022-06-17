<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TotalProduk;

class TotalProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'nama_produk' => 'Singkong', 'total_produk' => 0],
            ['id' => 2, 'nama_produk' => 'Sukun', 'total_produk' => 0],
            ['id' => 3, 'nama_produk' => 'Pisang', 'total_produk' => 0],
            ['id' => 4, 'nama_produk' => 'Ketela', 'total_produk' => 0],
            ['id' => 5, 'nama_produk' => 'Talas', 'total_produk' => 0]
        ];

        foreach($data as $item){
            TotalProduk::create($item);
        }
    }
}
