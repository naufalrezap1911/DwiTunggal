<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role_id == '2') {
                return redirect('/pekerja/dashboard');
            } elseif (Auth::user()->role_id == '1') {
                return redirect('/pemilik/dashboard');
            } else {
                Alert::error('Terjadi Kesalahan', 'Silahkan periksa kembali email/password anda!');
                return back();
            }
        }
        Alert::error('Terjadi Kesalahan', 'Silahkan periksa kembali email/password anda!');
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
