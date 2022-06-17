<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;
use Validator;

class PekerjaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Pekerja::where('nama_pekerja', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $data = Pekerja::all();
        }
        return view('pemilik.pekerja.index', compact('data'));
    }

    public function create()
    {
        return view('pemilik.pekerja.create');
    }

    public function insert(Request $request)
    {
        if (!isset($request->name)) {
            toast('Nama Pekerja tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->no_telp)) {
            toast('Nomor Telepon tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->alamat)) {
            toast('Alamat tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->email)) {
            toast('Email tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->password)) {
            toast('Password tidak boleh kosong!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'name' => 'required|string|min:3',
                'email' => 'required|string|email|min:3',
                'password' => 'required|string|min:8',
                'no_telp' => 'required|numeric|digits_between:9,13',
                'alamat' => 'required|string|min:3'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data tidak valid!', 'error', 'top-right');
                return back()->withInput();
            }
            User::create([
                'role_id' => 2,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $newestUser = User::select('id')->orderBy('id', 'desc')->first();
            $newestUser = $newestUser['id'];
            Pekerja::insert([
                'user_id' => $newestUser,
                'nama_pekerja' => $request->name,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'password' => $request->password
            ]);

            Alert::success('Sukses', 'Data pekerja berhasil ditambahkan!');
            return redirect('/pekerja');
        }
    }

    public function edit($id)
    {
        $data = Pekerja::findOrFail($id)->first();
        return view ('pemilik.pekerja.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pekerja::findOrFail($id)->update([
            'nama_pekerja' => $request->nama_pekerja,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => $request->password
        ]);
        Alert::success('Sukses', 'Data pekerja berhasil diubah!');
            return redirect('/pekerja');
    }
}
