<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Keuangan;
use App\Models\ProdukDibuat;
use App\Models\ProdukTerjual;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function index()
    {
        return view('all.grafik.index');
    }

    public function keuangan()
    {
        $total_pendapatan = Keuangan::select(DB::raw("CAST(SUM(pendapatan) as int) as total_pendapatan"))->GroupBy(DB::raw("Month(tanggal)"))->pluck('total_pendapatan');

        $total_pengeluaran = Keuangan::select(DB::raw("CAST(SUM(pengeluaran) as int) as total_pengeluaran"))->GroupBy(DB::raw("Month(tanggal)"))->pluck('total_pengeluaran');

        $bulan = Keuangan::select(DB::raw("MONTHNAME(tanggal) as bulan"))->GroupBy(DB::raw("MONTHNAME(tanggal)"))->pluck('bulan');

        return view('all.grafik.grafik_keuangan', compact('total_pendapatan', 'total_pengeluaran', 'bulan'));
    }

    public function bahan_baku()
    {
        $singkong = BahanBaku::select(DB::raw("CAST(SUM(jumlah_bahanbaku) as int) as jumlah_singkong"))->where('nama_bahanbaku', '=', 'Singkong')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_singkong');

        $sukun = BahanBaku::select(DB::raw("CAST(SUM(jumlah_bahanbaku) as int) as jumlah_sukun"))->where('nama_bahanbaku', '=', 'Sukun')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_sukun');

        $pisang = BahanBaku::select(DB::raw("CAST(SUM(jumlah_bahanbaku) as int) as jumlah_pisang"))->where('nama_bahanbaku', '=', 'Pisang')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_pisang');

        $ketela = BahanBaku::select(DB::raw("CAST(SUM(jumlah_bahanbaku) as int) as jumlah_ketela"))->where('nama_bahanbaku', '=', 'Ketela')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_ketela');

        $talas = BahanBaku::select(DB::raw("CAST(SUM(jumlah_bahanbaku) as int) as jumlah_talas"))->where('nama_bahanbaku', '=', 'Talas')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_talas');

        $bulan = Keuangan::select(DB::raw("MONTHNAME(tanggal) as bulan"))->GroupBy(DB::raw("MONTHNAME(tanggal)"))->pluck('bulan');

        return view('all.grafik.grafik_bahanbaku', compact('singkong', 'sukun', 'pisang', 'ketela', 'talas', 'bulan'));
    }

    public function produk_dibuat()
    {
        $singkong = ProdukDibuat::select(DB::raw("CAST(SUM(jumlah_produk_dibuat) as int) as jumlah_singkong"))->where('nama_produk', '=', 'Singkong')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_singkong');

        $sukun = ProdukDibuat::select(DB::raw("CAST(SUM(jumlah_produk_dibuat) as int) as jumlah_sukun"))->where('nama_produk', '=', 'Sukun')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_sukun');

        $pisang = ProdukDibuat::select(DB::raw("CAST(SUM(jumlah_produk_dibuat) as int) as jumlah_pisang"))->where('nama_produk', '=', 'Pisang')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_pisang');

        $ketela = ProdukDibuat::select(DB::raw("CAST(SUM(jumlah_produk_dibuat) as int) as jumlah_ketela"))->where('nama_produk', '=', 'Ketela')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_ketela');

        $talas = ProdukDibuat::select(DB::raw("CAST(SUM(jumlah_produk_dibuat) as int) as jumlah_talas"))->where('nama_produk', '=', 'Talas')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_talas');

        $bulan = Keuangan::select(DB::raw("MONTHNAME(tanggal) as bulan"))->GroupBy(DB::raw("MONTHNAME(tanggal)"))->pluck('bulan');

        return view('all.grafik.grafik_produkdibuat', compact('singkong', 'sukun', 'pisang', 'ketela', 'talas', 'bulan'));
    }

    public function produk_terjual()
    {
        $singkong = ProdukTerjual::select(DB::raw("CAST(SUM(jumlah_produk) as int) as jumlah_singkong"))->where('nama_produk', '=', 'Singkong')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_singkong');

        $sukun = ProdukTerjual::select(DB::raw("CAST(SUM(jumlah_produk) as int) as jumlah_sukun"))->where('nama_produk', '=', 'Sukun')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_sukun');

        $pisang = ProdukTerjual::select(DB::raw("CAST(SUM(jumlah_produk) as int) as jumlah_pisang"))->where('nama_produk', '=', 'Pisang')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_pisang');

        $ketela = ProdukTerjual::select(DB::raw("CAST(SUM(jumlah_produk) as int) as jumlah_ketela"))->where('nama_produk', '=', 'Ketela')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_ketela');

        $talas = ProdukTerjual::select(DB::raw("CAST(SUM(jumlah_produk) as int) as jumlah_talas"))->where('nama_produk', '=', 'Talas')->GroupBy(DB::raw("Month(tanggal)"))->pluck('jumlah_talas');

        $bulan = Keuangan::select(DB::raw("MONTHNAME(tanggal) as bulan"))->GroupBy(DB::raw("MONTHNAME(tanggal)"))->pluck('bulan');

        return view('all.grafik.grafik_produkterjual', compact('singkong', 'sukun', 'pisang', 'ketela', 'talas', 'bulan'));
    }
}
