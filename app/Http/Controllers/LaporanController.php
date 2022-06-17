<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Alert;
use Validator;
use App\Models\ProdukDibuat;
use App\Models\ProdukTerjual;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Laporan::select('id', 'tanggal', 'jumlah_pemesanan', 'jumlah_produk_dibuat', 'jumlah_produk_tersisa', 'jumlah_produk_terjual')->orderBy('id', 'desc')->get();
        return view('all.laporan.index', compact('data'));
    }

    public function create()
    {
        $data = ProdukDibuat::all();

        return view('all.laporan.create', compact('data'));
    }

    public function insert(Request $request)
    {
        if (!isset($request->tanggal)) {
            toast('Tanggal tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_pemesanan)) {
            toast('Jumlah Pemesanan Bahan Baku tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_produk_tersisa)) {
            toast('Jumlah Produk Tersisa tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_produk_dibuat)) {
            toast('Jumlah Produk Dibuat tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_produk_terjual)) {
            toast('Jumlah Produk Terjual tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'jumlah_pemesanan' => 'required|numeric',
                'jumlah_produk_dibuat' => 'required|numeric',
                'jumlah_produk_tersisa' => 'required|numeric',
                'jumlah_produk_terjual' => 'required|numeric',
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data tidak valid!', 'error', 'top-right');
                return back()->withInput();
            }
            $data = ProdukDibuat::select('nama_produk', 'bahanbaku_id', 'jumlah_bahanbaku', 'jumlah_produk_dibuat')->where('id', $request->produk_dibuat_id)->first();
            $bahanbaku_id = $data['bahanbaku_id'];
            $jumlah_bahanbaku = $data['jumlah_bahanbaku'];
            $jumlah_produk_dibuat = $data['jumlah_produk_dibuat'];

            if ($request->jumlah_produk_terjual > $jumlah_produk_dibuat) {
                Alert::error('Terjadi Kesalahan', 'Jumlah Produk Terjual melebihi kapasitas pada data yang telah ada!');
                return back();
            } elseif ($request->jumlah_pemesanan > $jumlah_bahanbaku) {
                Alert::error('Terjadi Kesalahan', 'Jumlah Pemesanan Bahan Baku melebihi kapasitas pada data yang telah ada!');
                return back();
            } else {

                Laporan::create([
                    'bahanbaku_id' => $bahanbaku_id,
                    'produk_dibuat_id' => $request->produk_dibuat_id,
                    'tanggal' => $request->tanggal,
                    'jumlah_pemesanan' => $request->jumlah_pemesanan,
                    'jumlah_produk_dibuat' => $request->jumlah_produk_dibuat,
                    'jumlah_produk_tersisa' => $request->jumlah_produk_tersisa,
                    'jumlah_produk_terjual' => $request->jumlah_produk_terjual
                ]);
                Alert::success('Sukses', 'Data laporan berhasil ditambah!');
                return redirect('/laporan');
            }
        }
    }

    public function edit($id)
    {
        $data = Laporan::findorfail($id);
        return view('all.laporan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Laporan::where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'jumlah_pemesanan' => $request->jumlah_pemesanan,
            'jumlah_produk_dibuat' => $request->jumlah_produk_dibuat,
            'jumlah_produk_tersisa' => $request->jumlah_produk_tersisa,
            'jumlah_produk_terjual' => $request->jumlah_produk_terjual
        ]);

        $produk = ProdukTerjual::rightjoin('laporan','produk_terjual.id','=','laporan.produk_terjual_id')->select('laporan.produk_terjual_id','produk_terjual.id','produk_terjual.jumlah_produk')->where('laporan.id', $id)->update(['produk_terjual.jumlah_produk' => $request->jumlah_produk_terjual]);

        Alert::success('Sukses', 'Data laporan berhasil diubah!');
        return redirect('/laporan');
    }
}
