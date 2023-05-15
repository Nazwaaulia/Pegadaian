<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }


    public function auth(Request $request)
     //Request $request utk mengambil data dr imputannya. data disimpen di csrf
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // ambil data dan simpen d variable
        $user = $request->only('email', 'password');
        // simpen data ke auth pk Auth::attempt
        // cek proses penyimpanan ke auth berhasil ato g pke if else

        if (Auth::attempt($user)) {
            // nesting if, if bersarang, if dalam if
            // kalau data login udh masuk ke fitur Auth, dcek pke if-else
            // kalau data Auth rolenya admin maka ke route data
            // kalau data Auth rolenya petugas maka ke route petugas
            if (Auth::user()->role == 'admin') {
                Alert::success('Selamat', 'Anda berhasil Login!');
                return redirect('/admin');
            }elseif (Auth::user()->role == 'petugas') {
                Alert::success('Selamat', 'Anda berhasil Login!');
                return redirect('/petugas');
            }
        }else {
            return redirect()->back()->with('gagal', 'Email atau Password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // melakukan logout dari aplikasi
        $request->session()->invalidate(); // menghapus sesi user
        $request->session()->regenerateToken(); // menghasilkan token baru untuk sesi user
        Alert::success('Selamat', 'Anda berhasil Logout!');
        return redirect('/'); // mengarahkan pengguna kembali ke halaman awal aplikasi
    }
}
