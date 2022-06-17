<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use Validator;
use App\Models\Pekerja;
use Illuminate\Support\Facades\DB;

class BahanBakuController extends Controller
{
    public function index()
    {
        $data = DB::table('bahan_baku')
            ->select('nama_bahanbaku', DB::raw('count(nama_bahanbaku) as nama'))
            ->groupBy('nama_bahanbaku')
            ->orderBy('id')
            ->get();
        return view('all.bahan_baku.index', compact('data'));
    }

    public function create()
    {
        return view('all.bahan_baku.create');
    }

    public function insert(Request $request)
    {
        $input = $request->all();
        $validasi = [
            'nama_bahanbaku' => 'required|string|min:3',
            'jumlah_bahanbaku' => 'required|numeric',
            'jumlah_bahanbaku' => 'required|numeric'
        ];
        $validation = Validator::make($input, $validasi);
        if (!isset($request->tanggal)) {
            toast('Tanggal tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->nama_bahanbaku)) {
            toast('Nama Bahan Baku tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_bahanbaku)) {
            toast('Jumlah Bahan Baku tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->harga_bahanbaku)) {
            toast('Harga Bahan Baku tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } else {
            if ($validation->fails()) {
                toast('Data tidak valid!', 'error', 'top-right');
                return back()->withInput();
            }
            $pekerja_id = Pekerja::select('id', 'user_id')->where('user_id', Auth::user()->id)->first();
            $pekerja_id = $pekerja_id['id'];
            BahanBaku::create([
                'pekerja_id' => $pekerja_id,
                'tanggal' => $request->tanggal,
                'nama_bahanbaku' => $request->nama_bahanbaku,
                'jumlah_bahanbaku' => $request->jumlah_bahanbaku,
                'harga_bahanbaku' => $request->harga_bahanbaku,
            ]);

            Alert::success('Sukses', 'Data bahan baku berhasil ditambahkan!');
            return redirect('/bahan_baku');
        }
    }

    public function detail($nama_bahanbaku)
    {
        $item = BahanBaku::select('nama_bahanbaku')->where('nama_bahanbaku', $nama_bahanbaku)->first();
        $persediaan = BahanBaku::select('jumlah_bahanbaku')->where('nama_bahanbaku', $nama_bahanbaku)->sum('jumlah_bahanbaku');
        $data = BahanBaku::where('nama_bahanbaku', $nama_bahanbaku)->get();
        return view('all.bahan_baku.detail', compact('item', 'data', 'persediaan'));
    }

    public function edit($nama_bahanbaku, $id)
    {
        $data = BahanBaku::where([['nama_bahanbaku', $nama_bahanbaku], ['id', $id]])->first();

        return view('all.bahan_baku.edit', compact('data'));
    }

    public function update(Request $request, $nama_bahanbaku, $id)
    {
        $input = $request->all();
        $validasi = [
            'nama_bahanbaku' => 'required|string|min:3',
            'jumlah_bahanbaku' => 'required|numeric',
            'jumlah_bahanbaku' => 'required|numeric'
        ];
        $validation = Validator::make($input, $validasi);
        if (!isset($request->tanggal)) {
            toast('Tanggal tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->nama_bahanbaku)) {
            toast('Nama Bahan Baku tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->jumlah_bahanbaku)) {
            toast('Jumlah Bahan Baku tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->harga_bahanbaku)) {
            toast('Harga Bahan Baku tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $data = BahanBaku::where([['nama_bahanbaku', $nama_bahanbaku], ['id', $id]])->update([
                'tanggal' => $request->tanggal,
                'nama_bahanbaku' => $request->nama_bahanbaku,
                'jumlah_bahanbaku' => $request->jumlah_bahanbaku,
                'harga_bahanbaku' => $request->harga_bahanbaku,
            ]);
            
            Alert::success('Sukses', 'Data bahan baku berhasil diubah!');
            return redirect('/bahan_baku');
        }
    }
}
