<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MasterController extends Controller
{
    public function Login() {
        if (Session::has('Login')) { return redirect()->route('Dashboard'); }
        return view('Login');
    }
    public function AuthLogin(Request $req) {
        $Pemilik = DB::table('pemilik')->where('email', $req->email);
        $Pekerja = DB::table('pekerja')->where('email', $req->email);
        if ($Pemilik->count() == 1) {
            if ($Pemilik->first()->password == $req->password) {
                Session::put('Login', TRUE);
                Session::put('Email', $req->email);
                Session::put('Level', 'Pemilik');
                return redirect()->route('Dashboard');
            } else {
                Session::flash('alertInfo', 'Password Salah');
                return back();
            }
        } elseif ($Pekerja->count() == 1) {
            if ($Pekerja->first()->password == $req->password) {
                Session::put('Login', TRUE);
                Session::put('Email', $req->email);
                Session::put('Level', 'Pekerja');
                return redirect()->route('Dashboard');
            } else {
                Session::flash('alertInfo', 'Password Salah');
                return back();
            }
        } else {
            Session::flash('alertInfo', 'Username Belum Terdaftar');
            return back();
        }
    }
    public function Logout() {
        Session::forget('Login');
        Session::forget('Email');
        Session::forget('Level');
        return redirect()->route('Login');
    }
    public function Dashboard() {
        return view('Dashboard');
    }
    public function Profil() {
        if (Session::get('Level') == 'Pemilik') {
            $Profil = DB::table('pemilik')->where('email', Session::get('Email'))->first();
        } else {
            $Profil = DB::table('pekerja')->where('email', Session::get('Email'))->first();
        }
        return view('Profil', compact('Profil'));
    }
    public function EditProfil() {
        if (Session::get('Level') == 'Pemilik') {
            $Profil = DB::table('pemilik')->where('email', Session::get('Email'))->first();
        } else {
            $Profil = DB::table('pekerja')->where('email', Session::get('Email'))->first();
        }
        return view('EditProfil', compact('Profil'));
    }
    public function AuthEditProfil(Request $req) {
        if (Session::get('Level') == 'Pemilik') {
            $Profil = DB::table('pemilik')->where('email', Session::get('Email'));
        } else {
            $Profil = DB::table('pekerja')->where('email', Session::get('Email'));
        }
        $Profil->update([
            'nama' => $req->nama,
            'no_telp' => $req->noTelp,
            'alamat' => $req->alamat,
            'password' => $req->password
        ]);
        Session::flash('alertSuccess', 'Profil Berhasil Diubah');
        return back();
    }
    public function DataPekerja() {
        $Pekerja = DB::table('pekerja')->get();
        return view('DataPekerja', compact('Pekerja'));
    }
    public function TambahPekerja() {
        return view('TambahPekerja');
    }
    public function AuthTambahPekerja(Request $req) {
        $Pemilik = DB::table('pemilik')->where('email', $req->email)->count();
        $Pekerja = DB::table('pekerja')->where('email', $req->email)->count();
        if ($Pemilik == 0 && $Pekerja == 0) {
            DB::table('pekerja')->insert([
                'nama' => $req->nama,
                'no_telp' => $req->noTelp,
                'email' => $req->email,
                'alamat' => $req->alamat,
                'password' => $req->password
            ]);
            Session::flash('alertSuccess', 'Data Pekerja Berhasil Ditambah');
            return back();
        } else {
            Session::flash('alertError', 'Email Telah Digunakan');
            return back();
        }
    }
    public function DataBahanBaku() {
        $BahanBaku = DB::table('bahanbaku')->orderBy('tanggal', 'DESC')->get();
        return view('DataBahanBaku', compact('BahanBaku'));
    }
    public function TambahBahanBaku() {
        return view('TambahBahanBaku');
    }
    public function AuthTambahBahanBaku(Request $req) {
        $Tanggal = explode('-', $req->tanggal);
        DB::table('bahanbaku')->insert([
            'tanggal' => mktime(12, 0, 0, $Tanggal[1], $Tanggal[2], $Tanggal[0]),
            'nama' => $req->nama,
            'jumlah' => $req->jumlah,
            'harga' => $req->harga
        ]);
        Session::flash('alertSuccess', 'Data Bahan Baku Berhasil Ditambah');
        return back();
    }
    public function EditBahanBaku($id) {
        $BahanBaku = DB::table('bahanbaku')->where('id_bahanbaku', $id)->first();
        return view('EditBahanBaku', compact('BahanBaku'));
    }
    public function AuthEditBahanBaku(Request $req) {
        $Tanggal = explode('-', $req->tanggal);
        DB::table('bahanbaku')->where('id_bahanbaku', $req->id)->update([
            'tanggal' => mktime(12, 0, 0, $Tanggal[1], $Tanggal[2], $Tanggal[0]),
            'nama' => $req->nama,
            'jumlah' => $req->jumlah,
            'harga' => $req->harga
        ]);
        Session::flash('alertSuccess', 'Data Bahan Baku Berhasil Diubah');
        return back();
    }
}
