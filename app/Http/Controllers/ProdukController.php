<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\ProdukDibuat;
use Illuminate\Http\Request;
use Alert;
use Validator;
use App\Models\Laporan;
use App\Models\ProdukTerjual;
use App\Models\TotalProduk;
use Illuminate\Support\Facades\Redis;

class ProdukController extends Controller
{
    public function index()
    {
        return view('all.produk.index');
    }

    public function produk_dibuat(Request $request)
    {
        $singkong = ProdukDibuat::select('nama_produk','jumlah_produk_dibuat')->where('nama_produk','=','Singkong')->sum('jumlah_produk_dibuat');
        $sukun = ProdukDibuat::select('nama_produk','jumlah_produk_dibuat')->where('nama_produk','=','Sukun')->sum('jumlah_produk_dibuat');
        $pisang = ProdukDibuat::select('nama_produk','jumlah_produk_dibuat')->where('nama_produk','=','Pisang')->sum('jumlah_produk_dibuat');
        $ketela = ProdukDibuat::select('nama_produk','jumlah_produk_dibuat')->where('nama_produk','=','Ketela')->sum('jumlah_produk_dibuat');
        $talas = ProdukDibuat::select('nama_produk','jumlah_produk_dibuat')->where('nama_produk','=','Talas')->sum('jumlah_produk_dibuat');

        if ($request->has('search')) {
            $data = ProdukDibuat::where('nama_produk', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $data = ProdukDibuat::all();
        }
        return view('all.produk.dibuat.index', compact('data','singkong','sukun','pisang','ketela','talas'));
    }

    public function produk_dibuat_create()
    {
        $data = BahanBaku::all();
        return view('all.produk.dibuat.create', compact('data'));
    }

    public function produk_dibuat_insert(Request $request)
    {
        $limit = BahanBaku::select('id', 'jumlah_bahanbaku')->where('id', $request->bahanbaku_id)->first();
        $limit = $limit['jumlah_bahanbaku'];

        if (!isset($request->bahanbaku_id)) {
            toast('Kolom Bahan Baku tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->tanggal)) {
            toast('Tanggal tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->nama_produk)) {
            toast('Nama Produk tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_bahanbaku)) {
            toast('Jumlah Bahan Baku tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_produk_dibuat)) {
            toast('Jumlah Produksi tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'nama_produk' => 'required|string|min:3',
                'jumlah_bahanbaku' => 'required|numeric',
                'jumlah_produk_dibuat' => 'required|numeric',
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data tidak valid!', 'error', 'top-right');
                return back()->withInput();
            }
            if ($request->jumlah_bahanbaku <= $limit) {
                ProdukDibuat::create([
                    'bahanbaku_id' => $request->bahanbaku_id,
                    'tanggal' => $request->tanggal,
                    'nama_produk' => $request->nama_produk,
                    'jumlah_bahanbaku' => $request->jumlah_bahanbaku,
                    'jumlah_produk_dibuat' => $request->jumlah_produk_dibuat
                ]);

                $bahanbaku = BahanBaku::select('id','jumlah_bahanbaku')->where('id', $request->bahanbaku_id)->first();
                $bahanbaku_awal = $bahanbaku['jumlah_bahanbaku'];

                $dataakhir = Bahanbaku::where('id', $request->bahanbaku_id)->update([
                    'jumlah_bahanbaku' => intval($bahanbaku_awal) - intval($request->jumlah_bahanbaku)
                ]);

                $produk_dibuat_id = ProdukDibuat::select('id')->orderBy('id', 'desc')->first();
                $produk_dibuat_id = $produk_dibuat_id['id'];
                Laporan::create([
                    'bahanbaku_id' => $request->bahanbaku_id,
                    'produk_dibuat_id' => $produk_dibuat_id,
                    'tanggal' => $request->tanggal,
                    'jumlah_pemesanan' => $request->jumlah_bahanbaku,
                    'jumlah_produk_dibuat' => $request->jumlah_produk_dibuat
                ]);

                $total_awal = TotalProduk::select('id','nama_produk','total_produk')->where('nama_produk', '=', $request->nama_produk)->first();
                $total_awal = $total_awal['total_produk'];
                TotalProduk::select('id','nama_produk','total_produk')->where('nama_produk','=',$request->nama_produk)->update([
                    'total_produk' => intval($total_awal) + $request->jumlah_produk_dibuat
                ]);

                Alert::success('Sukses', 'Data produk berhasil ditambahkan!');
                return redirect('/produk/dibuat');
            } else {
                Alert::Error('Terjadi Kesalahan', 'Data permintaan Bahan Baku melebihi kapasitas yang tersedia!');
                return back()->withInput();
            }
        }
    }

    public function produk_dibuat_edit($id)
    {
        $data = ProdukDibuat::where('id', $id)->first();
        return view('all.produk.dibuat.edit', compact('data'));
    }

    public function produk_dibuat_update(Request $request, $id)
    {
        if (!isset($request->nama_produk)) {
            toast('Nama Produk tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->tanggal)) {
            toast('Tanggal tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_produk_dibuat)) {
            toast('Jumlah Produksi tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'nama_produk' => 'required|string|min:3',
                'jumlah_produk_dibuat' => 'required|numeric',
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data tidak valid!', 'error', 'top-right');
                return back()->withInput();
            }
            $data = ProdukDibuat::where('id', $id)->update([
                'tanggal' => $request->tanggal,
                'nama_produk' => $request->nama_produk,
                'jumlah_produk_dibuat' => $request->jumlah_produk_dibuat
            ]);
            Alert::success('Sukses', 'Data produk berhasil diubah!');
            return redirect('/produk/dibuat');
        }
    }

    public function produk_terjual(Request $request)
    {
        $singkong = ProdukTerjual::select('nama_produk','jumlah_produk')->where('nama_produk','=','Singkong')->sum('jumlah_produk');
        $sukun = ProdukTerjual::select('nama_produk','jumlah_produk')->where('nama_produk','=','Sukun')->sum('jumlah_produk');
        $pisang = ProdukTerjual::select('nama_produk','jumlah_produk')->where('nama_produk','=','Pisang')->sum('jumlah_produk');
        $ketela = ProdukTerjual::select('nama_produk','jumlah_produk')->where('nama_produk','=','Ketela')->sum('jumlah_produk');
        $talas = ProdukTerjual::select('nama_produk','jumlah_produk')->where('nama_produk','=','Talas')->sum('jumlah_produk');
        $uang_singkong = ProdukTerjual::select('nama_produk','total')->where('nama_produk','=','Singkong')->sum('total');
        $uang_sukun = ProdukTerjual::select('nama_produk','total')->where('nama_produk','=','Sukun')->sum('total');
        $uang_pisang = ProdukTerjual::select('nama_produk','total')->where('nama_produk','=','Pisang')->sum('total');
        $uang_ketela = ProdukTerjual::select('nama_produk','total')->where('nama_produk','=','Ketela')->sum('total');
        $uang_talas = ProdukTerjual::select('nama_produk','total')->where('nama_produk','=','Talas')->sum('total');

        if ($request->has('search')) {
            $data = ProdukTerjual::where('nama_produk', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $data = ProdukTerjual::all();
        }
        return view('all.produk.terjual.index', compact('data','singkong','sukun','pisang','ketela','talas','uang_singkong','uang_sukun','uang_pisang','uang_ketela','uang_talas'));
    }

    public function produk_terjual_create()
    {
        return view('all.produk.terjual.create');
    }

    public function produk_terjual_insert(Request $request)
    {
        if (!isset($request->tanggal)) {
            toast('Tanggal tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->nama_produk)) {
            toast('Nama Produk tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_produk)) {
            toast('Jumlah Produk tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->harga_produk)) {
            toast('Harga Produk tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'nama_produk' => 'required|string|min:3',
                'jumlah_produk' => 'required|numeric',
                'harga_produk' => 'required|numeric'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data tidak valid!', 'error', 'top-right');
                return back()->withInput();
            }
            ProdukTerjual::create([
                'tanggal' => $request->tanggal,
                'nama_produk' => $request->nama_produk,
                'jumlah_produk' => $request->jumlah_produk,
                'harga_produk' => $request->harga_produk,
                'total' => intval($request->jumlah_produk) * intval($request->harga_produk)
            ]);
            $produk_terjual_id = ProdukTerjual::select('id')->orderBy('id', 'desc')->first();
            $produk_terjual_id = $produk_terjual_id['id'];
            Laporan::create([
                'produk_terjual_id' => $produk_terjual_id,
                'tanggal' => $request->tanggal,
                'jumlah_produk_terjual' => $request->jumlah_produk
            ]);

            $total_awal = TotalProduk::select('id','nama_produk','total_produk')->where('nama_produk','=',$request->nama_produk)->first();
            $total_awal = $total_awal['total_produk'];

            TotalProduk::select('id','nama_produk','total_produk')->where('nama_produk', $request->nama_produk)->update([
                'total_produk' => intval($total_awal) - intval($request->jumlah_produk)
            ]);

            Alert::success('Sukses', 'Data penjualan produk berhasil ditambahkan!');
            return redirect('/produk/terjual');
        }
    }

    public function produk_terjual_edit($id)
    {
        $data = ProdukTerjual::where('id', $id)->first();
        return view('all.produk.terjual.edit', compact('data'));
    }

    public function produk_terjual_update(Request $request, $id)
    {
        if (!isset($request->tanggal)) {
            toast('Tanggal tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->nama_produk)) {
            toast('Nama Produk tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_produk)) {
            toast('Jumlah Produk tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->harga_produk)) {
            toast('Harga Produk tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'nama_produk' => 'required|string|min:3',
                'jumlah_produk' => 'required|numeric',
                'harga_produk' => 'required|numeric'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data tidak valid!', 'error', 'top-right');
                return back()->withInput();
            }
            $data = ProdukTerjual::where('id', $id)->update([
                'tanggal' => $request->tanggal,
                'nama_produk' => $request->nama_produk,
                'jumlah_produk' => $request->jumlah_produk,
                'harga_produk' => $request->harga_produk,
                'total' => intval($request->jumlah_produk) * intval($request->harga_produk)
            ]);

            $laporan = Laporan::where('produk_terjual_id', $id)->update([
                'jumlah_produk_terjual' => $request->jumlah_produk
            ]);
            Alert::success('Sukses', 'Data penjualan produk berhasil diubah!');
            return redirect('/produk/terjual');
        }
    }
}
