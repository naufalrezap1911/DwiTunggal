<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Keuangan;
use App\Models\Laporan;
use App\Models\ProdukDibuat;
use App\Models\ProdukTerjual;
use Illuminate\Http\Request;
use PDF;

class DownloadController extends Controller
{
    public function index()
    {
        return view('all.download.index');
    }

    public function bahanbaku()
    {
        $data = BahanBaku::all();
        view()->share('data', $data);
        $pdf = PDF::loadView('all.download.bahanbaku-pdf');
        return $pdf->download('data_bahanbaku.pdf');
    }
    public function produk_dibuat()
    {
        $data = ProdukDibuat::join('bahan_baku','produk_dibuat.bahanbaku_id','=','bahan_baku.id')->select('bahan_baku.nama_bahanbaku','produk_dibuat.tanggal','produk_dibuat.nama_produk','produk_dibuat.jumlah_bahanbaku','produk_dibuat.jumlah_produk_dibuat')->orderBy('produk_dibuat.tanggal','asc')->get();
        view()->share('data', $data);
        $pdf = PDF::loadView('all.download.produk_dibuat-pdf');
        return $pdf->download('data_produk-dibuat.pdf');
    }
    public function produk_terjual()
    {
        $data = ProdukTerjual::all();
        view()->share('data', $data);
        $pdf = PDF::loadView('all.download.produk_terjual-pdf');
        return $pdf->download('data_produk-terjual.pdf');
    }
    public function keuangan()
    {
        $data = Keuangan::all();
        $pengeluaran = Keuangan::select('pengeluaran')->sum('pengeluaran');
        $pendapatan = Keuangan::select('pendapatan')->sum('pendapatan');
        $total = intval($pendapatan) - intval($pengeluaran);
        view()->share('data', $data);
        $pdf = PDF::loadView('all.download.keuangan-pdf', compact('pengeluaran','pendapatan','total'));
        return $pdf->download('data_keuangan.pdf');
    }
    public function laporan()
    {
        $data = Laporan::leftjoin('bahan_baku','laporan.bahanbaku_id','=','bahan_baku.id')->leftjoin('produk_dibuat','laporan.produk_dibuat_id','=','produk_dibuat.id')->leftjoin('produk_terjual','laporan.produk_terjual_id','=','produk_terjual.id')->select('bahan_baku.nama_bahanbaku','produk_dibuat.nama_produk','produk_terjual.nama_produk','laporan.tanggal','laporan.jumlah_pemesanan','laporan.jumlah_produk_dibuat','laporan.jumlah_produk_tersisa','laporan.jumlah_produk_terjual')->get();

        view()->share('data', $data);
        $pdf = PDF::loadView('all.download.laporan-pdf');
        return $pdf->download('data_laporan.pdf');
    }
}
