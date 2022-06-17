<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Pemilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use Validator;

class KeuanganController extends Controller
{
    public function index()
    {
        $data = Keuangan::select('id', 'tanggal', 'pengeluaran', 'pendapatan')->orderBy('tanggal', 'desc')->get();
        $keuntungan = Keuangan::sum('keuntungan');
        return view('pemilik.keuangan.index', compact('data', 'keuntungan'));
    }

    public function create()
    {
        return view('pemilik.keuangan.create');
    }

    public function insert(Request $request)
    {
        if (!isset($request->tanggal)) {
            toast('Tanggal tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->pengeluaran)) {
            toast('Kolom Pengeluaran tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->pendapatan)) {
            toast('Kolom Pendapatan tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'pengeluaran' => 'required|numeric',
                'pendapatan' => 'required|numeric'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data tidak valid!', 'error', 'top-right');
                return back()->withInput();
            }
            $pemilik_id = Pemilik::select('id', 'user_id')->where('user_id', Auth::user()->id)->first();
            $pemilik_id = $pemilik_id['id'];
            Keuangan::create([
                'pemilik_id' => $pemilik_id,
                'tanggal' => $request->tanggal,
                'pengeluaran' => $request->pengeluaran,
                'pendapatan' => $request->pendapatan,
                'keuntungan' => intval($request->pendapatan)-intval($request->pengeluaran)
            ]);
            Alert::success('Sukses', 'Data keuangan berhasil ditambahkan!');
            return redirect('/keuangan');
        }
    }

    public function edit($id)
    {
        $data = Keuangan::where('id', $id)->first();
        return view('pemilik.keuangan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if(!isset($request->tanggal)){
            toast('Tanggal tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        }elseif(!isset($request->pengeluaran)){
            toast('Kolom Pengeluaran tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        }elseif(!isset($request->pendapatan)){
            toast('Kolom Pendapatan tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        }
        $input = $request->all();
        $validasi = [
            'pengeluaran' => 'required|numeric',
            'pendapatan' => 'required|numeric'
        ];
        $validation = Validator::make($input, $validasi);
        if($validation->fails()){
            toast('Data tidak valid!', 'error', 'top-right');
            return back()->withInput();
        }
        $data = Keuangan::where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'pengeluaran' => $request->pengeluaran,
            'pendapatan' => $request->pendapatan
        ]);
        Alert::success('Sukses', 'Data keuangan berhasil diubah!');
        return redirect('/keuangan');
    }
}
